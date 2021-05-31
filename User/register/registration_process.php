<?php
	
	session_start();
	
	include("connection1.php");

	//if(isset($_POST['submit']))
	//{
		//$txtotp=$_POST['otp'];	
		
		$otp=$_SESSION['otp'];
		
		/*if($txtotp == $_SESSION['otp'])
		{*/
			$name = $_SESSION['name'];
			$num = $_SESSION['num'];
			$email = $_SESSION['email'];
			$add = $_SESSION['add'];
			$dob = $_SESSION['dob'];
			$gender = $_SESSION['gender'];
			$city = $_SESSION['city'];
			$image = $_SESSION['img'];
			//$password = $_SESSION['password'];	
					
			$insert = mysql_query("insert into user (user_name,user_password,user_gender,user_address,user_contact,user_dob,user_email, user_pic, user_city) values ('$name','$otp','$gender','$add','$num','$dob','$email','$image','$city')");

			if($insert == TRUE)
			{
				$_SESSION['success']="<script>alert('Registered Successfully.! Please Login Now With The Password Sent To Your Given E-mail ID.');</script>";
				
				header("location:../login/index.php");
				
				unset($_SESSION['name']);
				unset($_SESSION['num']);
				unset($_SESSION['add']);
				unset($_SESSION['city']);
				unset($_SESSION['img']);
				unset($_SESSION['dob']);
				//unset($_SESSION['email']);
				//unset($_SESSION['password']);
			}
	
			else
			{
				$_SESSION['fail']="<script>alert('Registeration Failed.!');</script>";
				header("location:index.php");
			}
		//}
	//}
		
	/*else
	{
		header("location:registration_confirmation.php");
	}
*/
?>