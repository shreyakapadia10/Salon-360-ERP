<?php
	
	session_start();
		
	if(isset($_SESSION['adminid']) && $_SESSION['adminid']!="")
	{
		session_destroy();
		
		header("location:index.php");		
	}
	
?>