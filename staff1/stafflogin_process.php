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
			if(isset($remember) && $remember!="")
			{
				setcookie("a_name",$name);
				setcookie("a_pass",$password);
			}
			$_SESSION['sid']=$result['staff_id'];
			
			header("location:home.php");
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