<?php

	include("connection1.php");

	session_start();
	
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
						$item6 = $data[5];
						$item7 = $data[6];
						$item8 = $data[7];
						$item9 = $data[8];
						$item10 = $data[9];
						$item11 = $data[10];
						$item12 = $data[11];
						
						$import = "insert into staff(staff_id, staff_name, staff_password , staff_gender, staff_address, staff_contact, staff_dob, staff_email, staff_salary, staff_specialization, staff_commission, staff_cus_handled) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6', '$item7', '$item8', '$item9', '$item10', '$item11', '$item12')";
							
						mysql_query($import);
					}
					
					fclose($handle);
						
					print "Import done";
				}
			}
		}

		if(isset($_POST['add_staff']))
		{
			//$s_id= $_POST['s_id'];
			$s_name = $_POST['s_name'];
			//$s_pass = $_POST['s_pass'];
			$s_gender = $_POST['s_gender'];
			$s_add = $_POST['s_add'];
			$s_contact = $_POST['s_contact'];
			$s_dob = $_POST['datetime'];
			$s_email = $_POST['s_email'];
			$s_salary = $_POST['s_salary'];
			$s_commission = $_POST['s_commission'];
			$s_specialization = $_POST['s_specialization'];
			$s_customer = $_POST['s_customer'];					
			
			$select = mysql_query("select * from staff where staff_email = '$s_email'");

			$cnt = mysql_num_rows($select);

			if($cnt>=1)
			{	
				$_SESSION['dup_email'] = "<script>alert('Email ID already exists.!');</script>";
				header("location:staff_add.php");
			}
				
			else
			{						
				$add = mysql_query("insert into staff(staff_name, staff_gender, staff_address, staff_contact, staff_dob, staff_email, staff_salary, staff_specialization, staff_commission, staff_cus_handled) values ('$s_name','$s_gender','$s_add','$s_contact','$s_dob','$s_email','$s_salary','$s_specialization','$s_commission','$s_customer')");	
								
				if($add == TRUE)
				{
					$_SESSION['add_staff'] = "<script>alert('Staff Added Successfully') ;</script>";
				
					header("location:staff.php");
				}
		
				else
				{
					$_SESSION['add_staff_fail'] = "<script>alert('Staff Cannot Be Added') ;</script>";
					
					header("location:staff.php");
				}
				
			}
		}
				
		if(isset($_POST['update']))
		{
			$id=$_POST['editid'];
			
			$s_id = $_POST['s_id'];
			$s_name = $_POST['s_name'];
			$s_gender = $_POST['s_gender'];
			$s_add = $_POST['s_add'];
			$s_contact = $_POST['s_contact'];
			$s_dob = $_POST['s_dob'];
			$s_email = $_POST['s_email'];
			$s_salary = $_POST['s_salary'];
			$s_commission = $_POST['s_commission'];
			$s_specialization = $_POST['s_specialization'];
			$s_customer = $_POST['s_customer'];
			
			$select1 = mysql_query("select * from staff where staff_email = '$s_email'");

			$cnt1 = mysql_num_rows($select);

			if($cnt1>=1)
			{	
				$_SESSION['dup_email'] = "<script>alert('Email ID already exists.!');</script>";
				//header("location:add_staff.php");
			}
				
			else
			{
				if(mysql_query("update staff set staff_name='$s_name',staff_gender='$s_gender',staff_address='$s_add',staff_contact='$s_contact',staff_dob='$s_dob',staff_email='$s_email',staff_salary='$s_salary',staff_commission='$s_commission',staff_specialization='$s_specialization',staff_cus_handled='$s_customer' where staff_id='$id'"))
				{
					$_SESSION['updated']="<script>alert('Staff Updated Succesfully');</script>";
					
					header("location:staff.php");
				}
			}
		}
		if(isset($_GET['del']) && $_GET['del']!="")
		{
			$id=$_GET['del'];
			
			mysql_query("delete from staff where staff_id='$id'");
			
			$_SESSION['delete']="<script>alert('Staff Deleted Succesfully');</script>";
			
			header("location:staff.php");
		}
	}
?>