<?php 

	session_start();

	if(isset($_SESSION['uid']) && $_SESSION['uid'])
	{
		session_destroy();
		
		header("location:../index.php");	
	}
	
	else
	{
		header("location:../login/index.php");	
	}

?>