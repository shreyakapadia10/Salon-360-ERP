<?php 

	include("connection1.php");
	
	session_start();
	
	$id=$_SESSION['sid'];
	
	if(isset($_POST['add_leave']))
	{
		$date=strtotime($_POST['date']);
		$reason=$_POST['l_reason'];
		$days=$_POST['days'];
		
		$date1=date('Y-m-d',$date);
		
		$today=date('Y-m-d');
		
		// echo $date1;
		// echo $today;
		
		if($today==$date1)
		{
			$_SESSION['add3']="<script>alert('Please Select Another Date.');</script>";
			header("location:leave.php");
			// echo $_SESSION['add3'];
		}
		
		else if(mysql_query("insert into attendance(staff_id,total_leave,leave_reason,leave_date) values('$id','$days','$reason','$date1')"))
		{
			$_SESSION['add']="<script>alert('Your Leave is Requested');</script>";
			
			$add=mysql_query("select * from staff where staff_id='$id'");
			$res=mysql_fetch_array($add);
			
			$name=$res['staff_name'];
			
			mysql_query("insert into notification(notification_title,notification,notification_date,notification_time) values('Leave Request','$name requested for leave of $days days',CURDATE(),CURTIME())");
			
			header("location:home.php");
		}
		else
		{
			$_SESSION['add']="<script>alert('Your Leave details is no added');</script>";
			header("location:leave.php");
		}
	}


?>