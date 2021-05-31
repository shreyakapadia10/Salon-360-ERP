<?php

	session_start();
		
		include("connection1.php");

		if(isset($_POST['submit']))
		{
			
			$n_pass=$_POST['txt2'];
			$c_pass=$_POST['txt3'];
			$email=$_SESSION['email'];
			
			echo $email;
			
			//if($otp==$_SESSION['otp'])
			//{
			mysql_query("select * from user where user_email='$email'");
	
			if($n_pass==$c_pass)
			{		
				mysql_query("update user set user_password='$n_pass' where user_email='$email'");
				
				header("location:../index.php");
				
				$_SESSION['updated']="<script>alert('Password Updated Successfully..!');</script>";
				
			//	unset($_SESSION['email']);
				//	unset($_SESSION['otp']);
			}
		
			else
			{
				$_SESSION['updated']="<script>alert('Passwords are not matching.!');</script>";
			
				header("location:change_pass.php");
			}	
		}	
		
		else
		{
			header("location:index.php");
		}
		//}		
?>