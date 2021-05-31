<?php  

	include("connection1.php");
	
	session_start();

	if(isset($_POST['submit']))
	{
		$uid=$_SESSION['uid'];
		
		$rate=$_POST['rating'];
		$comment=$_POST['comment'];
		$sid = $_POST['staff_id'];
		
		$insert = mysql_query("insert into feedback(user_id,staff_id,feedback,ratings,feedback_date) values('$uid','$sid','$comment','$rate',CURDATE())");
		
		mysql_query("insert into notification_staff(staff_id, user_id, notification_title, notification, notification_date, notification_time) values ('$sid','$uid','New Feedback Received', '$comment', CURDATE(), CURTIME())");
		
		if($insert == TRUE)
		{
			$_SESSION['review']="<script>alert('Thank you for your review!!');</script>";
			header("location:index.php");
		}
		else
		{
			$_SESSION['review']="<script>alert('Review cannot be sent!!');</script>";
			header("location:index.php");
		}
	}


?>