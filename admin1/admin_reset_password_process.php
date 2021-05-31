<?php 

	session_start();
	
	include("connection1.php");
	
	if(isset($_POST['reset_password']))
	{
		$email=$_POST['email'];
		$mo=$_POST['contact'];
		
		$result=mysql_query("select * from admin where admin_email='$email' and admin_contact='$mo'");
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
				$_SESSION['error']="<script>alert('Message not sent!');</script>";	
				echo "Mailer Error".$mail->ErrorInfo ;
				
				header("location:admin_reset_password.php");
			}
			else
			{
				
				$_SESSION['msg']="<script>alert('Message has been sent!');</script>";	
				header("location:admin_update_pass.php");
			}
		 }
		 else
		 {	
			$_SESSION['error']="<script>alert('Invalid Email-ID or Contact Number.!');</script>";	
			 header("location:admin_reset_password.php");
		 }	
	}
	
	else
	{
		header("location:admin_reset_password.php");
	}


?>