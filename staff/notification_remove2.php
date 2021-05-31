<?php

	include("connection1.php");
	
	session_start();

		if(isset($_SESSION['feedback_notification']))
		{
			$nid=$_SESSION['feedback_notification'];

			$del = mysql_query("delete from notification_staff where notification_staff_id = '$nid'");
			
			header("location:feedback.php");

		}
	?>