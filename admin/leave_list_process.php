<?php

	include("connection1.php");
	
	session_start();
	
	if(isset($_GET['confirmid']))
	{
		$id=$_GET['confirmid'];
		
		$query=mysql_query("select * from attendance where attendance_id='$id'");
		$res=mysql_fetch_array($query);
		$sid=$res['staff_id'];
		
		mysql_query("insert into notification_staff(staff_id,notification_title,notification,notification_date,notification_time) values('$sid','Leave Confirmed','Your leave has been confirmed',CURDATE(),CURTIME())");
		
		$_SESSION['confirmation']="<script>alert('Leave Confirmed Successfully!');<script>";
		
		header("location:leave_list.php?lid=$id");
	}
	
	if(isset($_GET['cancelid']))
	{
		$id=$_GET['cancelid'];
		
		$query=mysql_query("select * from attendance where attendance_id='$id'");
		$res=mysql_fetch_array($query);
		$sid=$res['staff_id'];
		
		mysql_query("insert into notification_staff(staff_id,notification_title,notification,notification_date,notification_time) values('$sid','Leave Canceled','Your leave is canceled',CURDATE(),CURTIME())");
		
		// mysql("delete from attendance where attendance_id='$id'");
		
		$_SESSION['cancel']="<script>alert('Leave Canceled Successfully!');<script>";
		
		header("location:leave_list.php?lid=$id");
	}

?>