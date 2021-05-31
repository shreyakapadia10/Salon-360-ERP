<?php

	include("connection1.php");

	session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	
	else
	{
		if(isset($_POST['update']))
		{
			$id=$_POST['editid'];
			
			$feedbackid=$_POST['feedback_id'];
			$user_id=$_POST['user_id'];
			$feedback=$_POST['feedback'];
			$date=$_POST['datetime'];
			
			mysql_query("update feedback set user_id='$user_id',feedback='$feedback',feedback_date='$date' where feedback_id='$id'");
			
			header("location:feedback_display.php");
		}
		
		if(isset($_GET['del']) && $_GET['del']!="")
		{	
			$del_id=$_GET['del'];
			
			mysql_query("delete from feedback where feedback_id = '$del_id' ");
			
			$_SESSION['delete_feedback'] = "<script>alert('feedback Deleted Successfully') ;</script>";
			
			header("location:feedback_display.php");	
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
												
						$import = "insert into feedback(feedback_id ,user_id,staff_id,feedback,feedback_date) values('$item1','$item2','$item3','$item4','$item5')";
					
						mysql_query($import);
					}
					
					fclose($handle);
						
					print "Import done";
				}
			}
		}	
	}
?>