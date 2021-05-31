<?php 

	include("connection1.php");
	
	session_start();

	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{		
		if(isset($_POST['add_attendance']) )
		{
			$s_id = $_POST['staff_id'];
			$t_day = $_POST['t_day'];
			$t_leave = $_POST['t_leave'];
			$l_reason = $_POST['l_reason'];
			$l_date = $_POST['datetime'];
			
			if($t_leave=="0")
			{
				$add = mysql_query("insert into attendance(staff_id, attendance_time, total_day_attended, total_leave, leave_reason) values ('$s_id',CURTIME(),'$t_day','$t_leave','$l_reason')");
				
				if($add == TRUE)
				{
					$_SESSION['add_attendance'] = "<script>alert('Attendance Added Successfully') ;</script>";
					
					header("location:attendance.php");
				}
				
				else
				{
					$_SESSION['add_attendance'] = "<script>alert('Attendance Can't Be Added');</script>";
					
					header("location:attendance.php");
				}
			}
			
			else
			{
				$add = mysql_query("insert into attendance(staff_id, attendance_time, total_day_attended, total_leave, leave_reason, leave_date) values ('$s_id',CURTIME(),'$t_day','$t_leave','$l_reason','$l_date')");
				
				if($add == TRUE)
				{
					$_SESSION['add_attendance'] = "<script>alert('Attendance Added Successfully') ;</script>";
					
					header("location:attendance.php");
				}
				
				else
				{
					$_SESSION['add_attendance'] = "<script>alert('Attendance Can't Be Added');</script>";
					
					header("location:attendance.php");
				}
			}
		}

		if(isset($_POST['upload']))
		{
			if($_FILES['file1']['name'])
			{
				$fname = $_FILES['file1']['name'];
				$arrFileName = explode('.',$_FILES['file1']['name']);
				$tmp = $_FILES['file1']['tmp_name'];
				
				if($arrFileName[1] == 'csv')
				{
					$handle = fopen($tmp, "r");
				
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
					{
						$item1 = $data[0];
						$item2 = $data[1];
						$item3 = $data[2];
						$item4 = $data[3];
						$item5 = $data[4];
						$item6 = $data[5];
						$item7 = $data[6];
							
						$import = "insert into attendance(attendance_id, staff_id, attendance_time, total_day_attended, total_leave, leave_reason , leave_date ) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6', '$item7')";
							
						$success = mysql_query($import);
						
						if($success == TRUE)
						{
							echo "<script>alert('Import Done'); <script>";
						}
					}
					
					fclose($handle);
				}
			}
		}
		
		if(isset($_POST['update']) && $_POST['update']!="")
		{
			$id=$_POST['editid'];
			echo $id;
			$a_id = $_POST['a_id'];
			$s_id = $_POST['s_id'];
			$a_time = $_POST['a_time'];
			$t_day = $_POST['t_day'];
			
			$t_leave = $_POST['t_leave'];
			$l_reason = $_POST['l_reason'];
			$l_date = $_POST['l_date'];
			
			if(mysql_query("update attendance set attendance_time='$a_time',total_day_attended='$t_day',total_leave='$t_leave',leave_reason='$l_reason',leave_date='$l_date' where attendance_id='$id'"))
			{
				$_SESSION['update']="<script>alert('Attendance Updated Successfully');</script>";
				
				header("location:attendance.php");
			}
		}
		
		if(isset($_GET['del']) && $_GET['del']!="")
		{
			$id=$_GET['del'];
			
			mysql_query("delete from attendance where attendance_id='$id'");
			
			$_SESSION['delete']="<script>alert('Attendance Deleted Successfully');</script>";
			
			header("location:attendance.php");
		}
	}
?>