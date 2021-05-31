<?php

	include("connection1.php");
	
	session_start();
	
	if(isset($_POST['book']))
	{
		// $uid = $_SESSION['uid'];
		$details = $_POST['details'];
		// $date = $_POST['date'];
		// $time = $_POST['time'];
		$city = $_POST['city'];
		$pay_type = $_POST['pay_type'];
		$sid = $_POST['sid'];
		
		// $insert = mysql_query("insert into appointment(user_id, appointment_details, appointment_date, appointment_time, appointment_city, payment_type, staff_id) values ('$uid', '$details', '$date', '$time', '$city', '$pay_type', '$sid') ");
		
		$insert = mysql_query("insert into appointment(appointment_details, appointment_city, payment_type, staff_id) values ( '$details', '$city', '$pay_type', '$sid') ");
		
		if($insert == TRUE)
		{
			$_SESSION['book'] = "<script>alert('Appointment is Booked Successfully.!');</script>";
			header("location:index.php");
		}
		
		else
		{
			$_SESSION['book'] = "<script>alert('Appointment Cannot Be Booked.!');</script>";
			header("location:index.php");
		}
	}

	else
	{
		header("location:index.php");
	}
?>