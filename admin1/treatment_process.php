<?php 

	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{	
			if(isset($_POST['add_treatment']))
	{
		$t_name = $_POST['t_name'];
		$t_type = $_POST['t_type'];
		$t_price = $_POST['t_price'];
		$t_gender = $_POST['gender'];
		$t_time = $_POST['t_time'];
		
		$add = mysql_query("insert into treatment_details(treatment_name, treatment_type, treatment_price, treatment_gender, treatment_estimated_time) values ('$t_name','$t_type','$t_price','$t_gender','$t_time')");
		
		if($add == TRUE)
		{
			$_SESSION['add_treatment'] = "<script>alert('Treatment Added Successfully') ;</script>";
			
			header("location:treatment_details.php");
		}
		
		else
		{
			$_SESSION['add_treatment'] = "<script>alert('Treatment Can't Be Added') ;</script>";
			
			header("location:treatment_details.php");
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
						
						$import = "insert into treatment(treatment_id, treatment_name, treatment_type, treatment_price, treatment_gender, treatment_estimated_time) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6')";
							
						mysql_query($import);
					}
					
					fclose($handle);
						
					print "Import done";
				}
			}
		}
		
		if(isset($_POST['update']) && $_POST['update']!="")
		{
			$id=$_POST['editid'];
			
			$t_id = $_POST['t_id'];
			$t_name = $_POST['t_name'];
			$t_type = $_POST['t_type'];
			$t_price = $_POST['t_price'];
			$t_gender = $_POST['t_gender'];
			$t_time = $_POST['t_time'];
			
			if(mysql_query("update treatment_details set treatment_name='$t_name',treatment_type='$t_type',treatment_price='$t_price',treatment_gender='$t_gender',treatment_estimated_time='$t_time' where treatment_id='$id'"))
			{
				$_SESSION['update_treatment']="<script>alert('Treatment Details Updated Successfully');</script>";
				
				header("location:treatment_details.php");
			}
			
		}
	}
?>