<?php 

	session_start();
	
	include("connection1.php");
	
	if(isset($_POST['register']))
	{
		$name = $_POST['name'];
		$num = $_POST['contact'];
		$email = $_POST['email'];
		$add = $_POST['address'];
		$dob=$_POST['dob'];
		$gender = $_POST['gender'];
		$city = $_POST['city'];
		
		/*if(isset($_FILES['img']['name']) && $_FILES['img']['name']!="")
		{*/		
			$image = $_FILES['img']['name'];
			$tmpimage = $_FILES['img']['tmp_name'];	
			
			move_uploaded_file($tmpimage,"pics/".$image);
		// }
		
		//$password = $_POST['password'];
		
		$_SESSION['name'] = $name;
		$_SESSION['num'] = $num;
		$_SESSION['email'] = $email;
		$_SESSION['add'] = $add;
		$_SESSION['dob'] = $dob;
		$_SESSION['gender'] = $gender;
		$_SESSION['city'] = $city;
		$_SESSION['img'] = $image;
		
		//$_SESSION['password'] = $password;
		
		$select = mysql_query("select * from user where user_email = '$email'");
	
		$cnt = mysql_num_rows($select);

		if($cnt>=1)
		{	
			$_SESSION['dup_email'] = "<script>alert('Email ID Already Exists.! Please Enter Different Email ID.');</script>";
			header("location:index.php");
		}
		
		else
		{
		
			$otp=rand(111111,999999);
			
			$_SESSION['otp'] = $otp;
			
			$msg = "<table> 

			<tr>

				<th> Dear $name, </th>
			
			</tr>
			
			<tr>
			
				<td> We've received your request for registration in <b> Salon 360 ERP </b>, if you've done this please confirm your Email ID by entering OTP given below, if you've not done this ignore this mail. </td> 
			
			</tr>
			
			<tr>
		
				<td> Your One Time Password : <b> $otp </b> </td>
				<td> Login Link : <b> <a href = 'http://localhost/Salon360ERP/login.php'> Login Here </a> </b> </td>
			
			</tr>
			
			</table>";
		
			require "PHPMailerAutoload.php";
			
			$mail=new PHPMailer;
			$mail->isSMTP();
			$mail->Host='smtp.gmail.com';
			$mail->SMTPAuth=true;
			$mail->Username='salon360erp@gmail.com';
			$mail->Password='Salon360erp@123';
			$mail->SMTPSecure='ssl';
			$mail->Port=465;
			$mail->From='salon360erp@gmail.com';
			$mail->FromName='Salon 360 ERP';
			$mail->addAddress($email);
			$mail->WordWrap=50;
			$mail->isHTML(true);
			$mail->Subject='Confirm Your Email';
			$mail->Body=$msg;
			
			if($mail->send())
			{
				header("location:registration_process.php");
				echo "Message has been sent.<br>";
			}

			else
			{
				echo "Message could not be sent";
				echo "Mailer Error".$mail->ErrorInfo ;
				header("location:index.php");
			}
		}
	}
	
	else
	{
		header("location:index.php");
	} 
?>