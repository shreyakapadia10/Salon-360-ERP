<?php

	include("connection1.php");
	
	session_start();
	
	
	if(isset($_SESSION['user_notification']))
	{
		$nid=$_SESSION['user_notification'];
		
		$del = mysql_query("delete from notification where notification_id = '$nid'");
		
		header("location:user_details.php");
	}
?>