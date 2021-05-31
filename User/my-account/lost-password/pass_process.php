<?php 

	session_start();
		
	include("connection1.php");

	if(isset($_POST['submit']))
	{
		$otp=$_POST['txt1'];
		$n_pass=$_POST['txt2'];
		$c_pass=$_POST['txt3'];
		$email=$_SESSION['email'];
		
		if($otp==$_SESSION['otp'])
		{
				mysql_query("select * from user where user_email='$email'");
		
				if($n_pass==$c_pass)
				{
				
				mysql_query("update user set user_password='$n_pass' where user_email='$email'");
				
				unset($_SESSION['otp']);
				unset($_SESSION['email']);
				
				$_SESSION['updated']="<script>alert('Password Updated Successfully..!');</script>";
				
				header("location:../../login/index.php");
				}

		
				else
				{
				$_SESSION['updated']="<script>alert('Passwords are not matching.!');</script>";
			
				header("location:update_pass.php");
				}	
		}	
		
		else
		{
			header("location:update_pass.php");
		}
	}		

?>