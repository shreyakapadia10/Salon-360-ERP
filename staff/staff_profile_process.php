<?php

	include("connection1.php");
	
	include("header.php");
	
	session_start();
	
	if(!isset($_SESSION['sid']) && $_SESSION['sid']=="")
	{
		header("location:index.php");
	}

	else
	{
		if(isset($_POST['update']) && $_POST['update']!="")
		{
			$id = $_SESSION['sid'];
			
			$name = $_POST['name'];
			$contact = $_POST['contact'];
			$email = $_POST['email'];
			$add = $_POST['add'];
			
			if(isset($_FILES['img']['name']) && $_FILES['img']['name']!="")
			{		
				$image = $_FILES['img']['name'];
				$tmpimage = $_FILES['img']['tmp_name'];	
				
				move_uploaded_file($tmpimage,"pics/".$image);
				
				$update = mysql_query("update staff set staff_name = '$name', staff_contact = '$contact', staff_email = '$email', staff_address = '$add', staff_pic = '$image' where staff_id = '$id'");
				
								
				if($update==TRUE)
				{
						$_SESSION['msg'] = "<script>alert('Data Updated Successfully.!');</script>";
						header("location:staff_profile.php");
				}
					
				else
				{
					$_SESSION['msg'] = "<script>alert('Data Updation Failed.!');</script>";
					header("location:staff_profile.php");
				}
			}
			
			else
			{
				$update1 = mysql_query("update staff set staff_name = '$name', staff_contact = '$contact', staff_email = '$email', staff_address = '$add' where staff_id = '$id'");
				
				if($update1==TRUE)
				{
						$_SESSION['msg'] = "<script>alert('Data Updated Successfully.!');</script>";
						header("location:staff_profile.php");
				}
					
				else
				{
					$_SESSION['msg'] = "<script>alert('Data Updation Failed.!');</script>";
					header("location:staff_profile.php");
				}
			}
		}
		
		else
		{
			header("location:staff_profile.php");
		}
		
		include("footer.php");
	}
	
?>