<?php 
	
	include("connection1.php");
	
	session_start();
	
	$uid=$_SESSION['uid'];
		
	require "PHPMailerAutoload.php";
	
	if(isset($_POST['submit']) && $_POST['submit']!="")
	{ 
		$ptype=$_POST['Option1'];
		
		$mid = $_SESSION['mid'];
		
		$today=date('d-m-Y');

		$select = mysql_query("select * from membership where membership_id = '$mid'");
		
		if($mid == 1)
		{
			$end_date= date('d-m-Y', strtotime($today. ' + 30 days'));
		}
		
		else if($mid == 2)
		{
			$end_date= date('d-m-Y', strtotime($today. ' + 180 days'));
		}
		
		else if($mid == 3) 
		{
			$end_date= date('d-m-Y', strtotime($today. ' + 365 days'));
		}
		
		else
		{
		}
	
		$query3=mysql_query("select * from user where user_id='$uid'");
		
		$result3=mysql_fetch_array($query3);
		
		$email=$result3['user_email'];
		
		$name=$result3['user_name'];
		
		$msg = "<table> 

		<tr>

			<th> Dear $name, </th>
		
		</tr>
		
		<tr>
		
			<td> Your membership starts from $today to $end_date. Enjoy Beauty! </td> 
		
		</tr>
		
		<tr>
	
			<td> Thank you for paying using $ptype. Have a Nice Day.! </td>
		
		</tr>
		
		</table>";
	
		 echo $msg;
		
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
		$mail->Subject='Membership Confirmation';
		$mail->Body=$msg;
		
		if($mail->send())
		{
			$dt= date('Y-m-d', strtotime($end_date));
			
			echo $dt;
			
			$update = mysql_query("update user set membership='Yes', membership_end_date = '$dt' where user_id = '$uid'");
			
			$_SESSION['membership'] = "<script>alert('Thank you for taking membership');</script>";
			
			if($update==TRUE)
			{
				header("location:index.php");
				echo "Message has been sent.<br>";
			}
		}

		else
		{
			echo "Message could not be sent";
			echo "Mailer Error".$mail->ErrorInfo ;
			header("location:index.php");
		}
	}
?>