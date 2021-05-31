<?php

	session_start();

	include("connection1.php");

	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{	
	
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
							
						$import = "insert into ratings(ratings_id,staff_id,user_id,ratings,ratings_date) values('$item1','$item2','$item3','$item4','$item5')";
							
						mysql_query($import);
					}
					
					fclose($handle);
						
					print "Import done";
				}
			}
		}
		
		if(isset($_POST['update']))
		{
			$id=$_POST['editid'];
			echo $id;
			
			$rid=$_POST['ratings_id'];
			$sid=$_POST['staff_id'];
			$uid=$_POST['user_id'];
			$ratings=$_POST['ratings'];
			
			mysql_query("update ratings set staff_id='$sid',user_id='$uid',ratings='$ratings' where ratings_id='$id'");
			
			header("location:ratings_display.php");
		}
		
		if(isset($_GET['del']) && $_GET['del']!="")
		{	
			$del_id=$_GET['del'];
			
			mysql_query("delete from ratings where ratings_id = '$del_id' ");
			
			$_SESSION['delete_ratings'] = "<script>alert('Rating Deleted Successfully') ;</script>";
			
			header("location:ratings_display.php");	
		}
	}
?>