<?php

	include("connection1.php");
	
	session_start();

	if(isset($_POST['submit']) && $_POST['submit']!= "")
	{
		$uid = $_SESSION['uid'];
		$uname = $_POST['uname'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$add = $_POST['add'];
		$dob = $_POST['dob'];
		$city = $_POST['city'];
		$contact = $_POST['contact'];
		$image = $_FILES['img']['name'];
		$tmpimage = $_FILES['img']['tmp_name'];	

		move_uploaded_file($tmpimage,"gallery/".$image);

		if(isset($image) && $image!="")
		{
			$update = mysql_query("update user set user_name = '$uname',user_gender = '$gender', user_email = '$email', user_address = '$add', user_dob = '$dob', user_city = '$city', user_contact = '$contact', user_pic = '$image'  where user_id = '$uid'");
			
			if($update == TRUE) 
			{
				$_SESSION['update'] = "<script>alert('Profile Updated Successfully!') ;</script>";
				
				header("location:index.php");
			}
			
			else
			{
				$_SESSION['update'] = "<script>alert('Profile Updation Failed!') ;</script>";
				
				header("location:index.php");
			}
		}
		
		else
		{
			$update = mysql_query("update user set user_name = '$uname',user_gender = '$gender', user_email = '$email', user_address = '$add', user_dob = '$dob', user_city = '$city', user_contact = '$contact'  where user_id = '$uid'");
			
			if($update == TRUE) 
			{
				$_SESSION['update'] = "<script>alert('Profile Updated Successfully!') ;</script>";
				
				header("location:index.php");
			}
			
			else
			{
				$_SESSION['update'] = "<script>alert('Profile Updation Failed!') ;</script>";
				
				header("location:index.php");
			}
		}
	}
	
	else
	{
		header("location:index1.php");
	}
?>