<?php 

	session_start();
	
	include("connection1.php");
	
	if(isset($_POST['submit']))
	{
		$_SESSION['forget_pass'] = "forgot password";
		
		$email=$_POST['email'];
		$mo=$_POST['mo'];
		
		$result=mysql_query("select * from user where user_email='$email' and user_contact='$mo'");
		$cnt=mysql_num_rows($result);
		$result1=mysql_fetch_array($result);
		 
		 if($cnt==1)
		 {
			$otp=rand(1111,9999);
			$_SESSION['otp']=$otp;
			$_SESSION['email']=$email;
			
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
			$mail->FromName='Forget';
			$mail->addAddress($email);
			$mail->WordWrap=50;
			$mail->isHTML(true);
			$mail->Subject='Forget Password';
			$mail->Body='Your One Time Password is:'.$otp;
			
			if(!$mail->send())
			{
				echo "Message could not be sent";
				echo "Mailer Error".$mail->ErrorInfo ;
				
				header("location:forgetpass.php");
			}
			else
			{
				header("location:update_pass.php");
				echo "Message has been sent.<br>";
			}
		 }
		 else
		 {	
			$_SESSION['error']="Invalid Email-ID or Contact Number.!";	
			 header("location:forgetpass.php");
		 }	
	}
	
	else
	{
		header("location:forgetpass.php");
	}


?>