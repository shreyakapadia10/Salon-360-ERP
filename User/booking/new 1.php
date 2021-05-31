<?php

	include("connection1.php");
	
	session_start();
	
	if(isset($_POST['action']) && $_POST['action']=="insert")
	{
		//$uid = $_SESSION['uid'];
		$details = $_POST['detail'];
		$city = $_POST['loc'];
		$date = $_POST['timest'];
		$time = $_POST['timest'];
		$staff = $_POST['staff'];
		$payment = $_POST['payment'];
		
		$insert = mysql_query("insert into appointment1(appointment_details, appointment_date, appointment_time, appointment_city, payment_type, staff_id) values ('$details', '$date', '$time', '$city', '$payment', '$staff')");
		
		if($insert == TRUE)
		{
			$aid = mysql_insert_id();
			
			$select1 = mysql_query("select * from appointment1 where appointment_id = '$aid'");
			
			$ans1 = mysql_fetch_array($select1);
			
			$dt = $ans1['appointment_date'];
			
			$tm = $ans1['appointment_time'];
		
			$sid = $ans1['staff_id'];
			
			$select2 = mysql_query("select * from treatment_details where treatment_name = '$details'");
			
			$ans2 = mysql_fetch_array($select2);
			
			$est_time = $ans2['treatment_estimated_time'];
			
			$secs = strtotime($tm)-strtotime("00:00:00");
			$result = date("H:i:s",strtotime($est_time)+$secs);

			//Appointment Table
			
			$select3 = mysql_query("select * from appointment1 appointment_date = '$dt' && staff_id = '$staff' ");
			
			$cnt = count($select3);
			
			if($cnt==0 || $cnt==1)
			{
				$select4 = mysql_query("select * from appointment1 where appointment_time between '$tm' and '$result'");
				
				while($ans4 = mysql_fetch_array($select4))
				{
					if(count($ans4['appointment_id'])==1 && $ans4['appointment_id']==$aid)
					{
						echo "Appointment Booked Successfully! Estimated time for your $detail will be $est_time."
						
						break;
					}
					
					else
					{
						mysql_query("delete from appointment1 where appointment_id = '$aid' ");
						
						echo "Please select another time or staff,an appointment at this time and staff is already booked. Sorry for inconvenience.";
											
						break;
					}
				}
			}
			
			else
			{
				mysql_query("delete from appointment1 where appointment_id = '$aid' ");
				
				echo "Please select another time or staff,an appointment at this time and staff is already booked. Sorry for inconvenience.";
			}
		}
		
		else
		{
			echo "There was an error trying to add the event.".mysqli_error($con );
		}
	}

	else
	{
		header("location:index.html");
	}
?>