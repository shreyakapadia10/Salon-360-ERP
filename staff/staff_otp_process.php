<?php

	include("connection1.php");
	session_start();

	if(isset($_POST['submit']))
	{
		$otp=$_POST['otp'];
		$otp1=$_SESSION['otp'];
		$id=$_SESSION['sid'];
		// $date=$_SESSION['date'];
		
		// if($date==date('Y-m-d'))
		// {
			if($otp==$otp1)
			{
				$add=mysql_query("insert into attendance(staff_id,attendance_time,attendance_date) values('$id',CURTIME(),CURDATE())");
				
				if($add==TRUE)
				{
					$_SESSION['attend']="<script>alert('Attendance done');</script>";
					header("location:home.php");
				}
				else
				{
					$_SESSION['attend1']="<script>alert('Attendance can not be done');</script>";
					header("location:staff_otp.php");
				}

			}
			else
			{
				$_SESSION['attend1']="<script>alert('OTP Does not match');</script>";
				header("location:staff_otp.php");
			}
	/*	}
		else
		{
			$cnt=0;
		}*/
	}

?>	