<?php

	include("connection1.php");
	
	session_start();
	
	$nid = $_SESSION['nid'];
	
	$del = mysql_query("delete from notification where notification_id = '$nid'");

	header("location:home.php");

?>