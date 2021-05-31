<?php

	session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{
	
		include("connection1.php");

		if(isset($_POST['add_appointment']) && $_POST['add_appointment']!="")
		{
			$u_id = $_POST['user_id'];
			$a_details = $_POST['appointment_details'];
			$a_datetime = $_POST['datetime'];
			$s_id = $_POST['staff_id'];
			$p_type = $_POST['pay_type'];
			$a_city = $_POST['appointment_city'];
					
			$add = mysql_query("insert into appointment (user_id, appointment_details, appointment_date,appointment_time, appointment_city, staff_id,payment_type) values ('$u_id', '$a_details', '$a_datetime', '$a_datetime','$a_city', '$s_id', '$p_type')");
			
			$add1 = mysql_query("insert into notification(admin_id,notification_title,notification,notification_date,notification_time) values('$id','Appointment Added', 'Appointment added for $a_details',CURDATE(),CURTIME())");
			
			$add2 = mysql_query("insert into notification_staff(staff_id,notification_title,notification,notification_date,notification_time) values('$s_id','Appointment Added', 'Appointment added for $a_details',CURDATE(),CURTIME())");
			
			if($add == FALSE)
			{
				$_SESSION['add_appointment'] = "<script>alert('Appointment Cannot Booked Successfully') ;</script>";
				
				header("location:appointment_list.php");
			}
			
			else
			{
				$_SESSION['add_appointment'] = "<script>alert('Appointment Booked Successfully') ;</script>";
				
				header("location:appointment_list.php");
			}
		}		
		
		else
		{
			header("location:appointment_list.php");
		}
	}
?>