<?php 

	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	
	else
	{
		if(isset($_POST['add_city']))
	{
		$c_name = $_POST['city_name'];
		$u_id = $_POST['u_id'];
		
		$add = mysql_query("insert into city(city_name,user_id) values ('$c_name','$u_id')");
		
		if($add == TRUE)
		{
			$_SESSION['add_city'] = "<script>alert('City Added Successfully') ;</script>";
			
			header("location:city.php");
		}
		
		else
		{
			$_SESSION['add_city'] = "<script>alert('City Can't Be Added') ;</script>";
			
			header("location:city.php");
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
									
					$import = "insert into city(city_id, city_name, user_id) values('$item1','$item2','$item3')";
						
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
			
			$city_id=$_POST['city_id'];
			$city_name=$_POST['city_name'];
			
			if(mysql_query("update city set city_id='$city_id',city_name='$city_name' where city_id='$id'"))
			{
				$_SESSION['update_city']="<script>alert('City Updated Successfully') ;</script>";
				
				header("location:city.php");
			}
		}
		
		if(isset($_GET['del']) && $_GET['del']!="")
		{
			$id=$_GET['del'];
			
			mysql_query("delete from city where city_id='$id'");
			
			$_SESSION['delete_city']="<script>alert('City Deleted Successfully') ;</script>";
			
			header("location:city.php");
		}
	}








?>