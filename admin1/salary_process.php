<?php

	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{	
		if(isset($_POST['add_salary']))
		{
			$s_id = $_POST['s_id'];
			$sal = $_POST['sal'];
			$com = $_POST['com'];
			$t_sal = $com+$sal;
			
			
			$add = mysql_query("insert into salary (salary, commission, total_salary, salary_date) values ('$sal','$com','$t_sal',CURDATE())");
			
			if($add == TRUE)
			{
				$_SESSION['add_salary'] = "<script>alert('Salary Added Successfully') ;</script>";
				
				header("location:salary.php");
			}
			
			else
			{
				$_SESSION['add_salary'] = "<script>alert('Salary Can't Be Added') ;</script>";
				
				header("location:salary.php");
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
							
						$import = "insert into salary(salary_id, staff_id, salary, commission, total_salary, salary_date) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6')";
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
			
			$sal_id = $_POST['sal_id'];
			$s_id = $_POST['s_id'];
			$sal = $_POST['sal'];
			$com = $_POST['com'];
			$t_sal = $sal+$com;
			$s_date = $_POST['s_date'];
			
			if(isset($s_date) && $s_date!="")
			{
				if(mysql_query("update salary set salary='$sal',commission='$com',total_salary='$t_sal',salary_date='$s_date' where salary_id='$id'"))
				{
					$_SESSION['update']="<script>alert('Salary Updated Successfully');</script>";
					
					header("location:salary.php");
				}
			}
			
			else
			{
				if(mysql_query("update salary set salary='$sal',commission='$com',total_salary='$t_sal' where salary_id='$id'"))
				{
					$_SESSION['update']="<script>alert('Salary Updated Successfully');</script>";
					
					header("location:salary.php");
				}
			}
			
			
		}
		
		if(isset($_GET['del']) && $_GET['del']!="")
		{
			$id=$_GET['del'];
			
			mysql_query("delete from salary where salary_id='$id'");
			
			$_SESSION['delete']="<script>alert('Salary Updated Successfully');</script>";
			
			header("location:salary.php");
		}
	}
 ?>