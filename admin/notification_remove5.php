<?php

	include("connection1.php");
	
	session_start();

		if(isset($_SESSION['leave_notification']))
		{
			$nid=$_SESSION['leave_notification'];

			$del = mysql_query("delete from notification where notification_id = '$nid'");
			
			header("location:leave_list.php");

		}
	?>