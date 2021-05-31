<?php

	include("connection1.php");
	
	session_start();

		if(isset($_SESSION['product_notification']))
		{
			$nid=$_SESSION['product_notification'];

			$del = mysql_query("delete from notification where notification_id = '$nid'");
			
			header("location:product.php");

		}
	?>