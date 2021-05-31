<?php

	include("connection1.php");
	
	session_start();

		$id=$_SESSION['product_id'];
		if(isset($_SESSION['order_notification']))
		{
			$nid=$_SESSION['order_notification'];

			$del = mysql_query("delete from notification where notification_id = '$nid'");
			
			header("location:cart.php");
	
		}
	?>