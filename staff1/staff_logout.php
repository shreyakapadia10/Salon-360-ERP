<?php
	
	session_start();

	if((isset($_COOKIE['a_name']) && $_COOKIE['a_name']!="") && (isset($_COOKIE['a_pass']) && $_COOKIE['a_pass']!=""))
	{
		setcookie("a_name","");
		setcookie("a_pass","");
	}
		
	if(isset($_SESSION['sid']) && $_SESSION['sid']!="")
	{
		unset($_SESSION['sid']);
		
		header("location:index.php");		
	}
	
?>