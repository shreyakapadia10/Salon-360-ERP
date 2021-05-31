<?php

	include("connection1.php");

	session_start();

	if(isset($_POST['login']))
	{
		$name=$_POST['name'];
		$password=$_POST['password'];
		$remember  = $_POST['remember_me'];
				
		$query=mysql_query("select * from staff where staff_email='$name' and staff_password='$password'");
	
		$result=mysql_fetch_array($query);
		$cnt=mysql_num_rows($query);
		
		if($cnt==1)
		{
			$_SESSION['sid']=$result['staff_id'];
			
			$id = $result['staff_id'];
			
			$today = date('Y-m-d');
			
			$select = mysql_query("select * from attendance where staff_id = '$id' && attendance_date = '$today' ");

			$r = mysql_fetch_array($select);

			if(mysql_num_rows($select)==0)
			{
				$otp=rand(1111,9999);
				$_SESSION['otp']=$otp;
				$_SESSION['email']=$name;
				// $date=date('Y-m-d');
				// $_SESSION['date']=$date;			
				
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
				$mail->FromName='OTP';
				$mail->addAddress($name);
				$mail->WordWrap=50;
				$mail->isHTML(true);
				$mail->Subject='OTP';
				$mail->Body='Your One Time Password is:'.$otp;
				
				if(!$mail->send())
				{
					$_SESSION['msg']="<script>alert('Message not sent!');</script>";	
					echo "Mailer Error".$mail->ErrorInfo ;
					header("location:index.php");
				}
	
				else
				{				
					$_SESSION['msg']="<script>alert('OTP has been sent!');</script>";	
					header("location:staff_otp.php");
				}
			}
				
			else
			{
				echo count($r);
				// echo $today;
				echo $r['attendance_date'];
				header("location:home.php");
			}
		}
		
		else
		{
			$_SESSION['msg']="<script>alert('Email-ID or Password is Incorrect!');</script>";
			header("location:index.php");
		}	
	}
	
	else
	{
		header("location:index.php");
	}
?>