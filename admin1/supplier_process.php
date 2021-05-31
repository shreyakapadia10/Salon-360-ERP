<?php

	include("connection1.php");

	session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	
	else
	{
		if(isset($_POST['add_supplier']))
		{
			$s_name = $_POST['supplier_name'];
			$s_con = $_POST['supplier_contact'];
			$s_add = $_POST['supplier_add'];
			$s_email = $_POST['supplier_email'];
							
			$add = mysql_query("insert into supplier (supplier_name, supplier_contact, supplier_address, supplier_email) values ('$s_name', '$s_con', '$s_add', '$s_email')");
			
			if($add == FALSE)
			{
				$_SESSION['add_supplier'] = "<script>alert('Supplier Can't be Added') ;</script>";
				
				header("location:supplier.php");
			}
			
			else
			{
				$_SESSION['add_supplier'] = "<script>alert('Supplier Added Successfully.!') ;</script>";
				
				header("location:supplier.php");
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
							
						$import = "insert into supplier(supplier_id, supplier_name, supplier_contact, supplier_address, supplier_email) values('$item1','$item2', '$item3' , '$item4' , '$item5')";
							
						$success = mysql_query($import);
						
						if($success == TRUE)
						{
							echo "<script>alert('Import Done'); <script>";
						}
					}
					
					fclose($handle);
				}
			}
		}	
		
		if(isset($_POST['update']))
		{
			$id=$_POST['editid'];
			
			$sup_id=$_POST['sup_id'];
			$sup_name=$_POST['sup_name'];
			$sup_contact=$_POST['sup_contact'];
			$sup_add=$_POST['sup_add'];
			$sup_email=$_POST['sup_email'];
			
			if(mysql_query("update supplier set supplier_name='$sup_name',supplier_contact='$sup_contact',supplier_address='$sup_add',supplier_email='$sup_email' where supplier_id='$id'"))
			{
				$_SESSION['update_supplier']="<script>alert('Supplier Updated Successfully') ;</script>";
				
				header("location:supplier.php");
			}
		}
		
		if(isset($_GET['del']) && $_GET['del']!="")
		{	
			$del_id=$_GET['del'];
			
			mysql_query("delete from supplier where supplier_id = '$del_id' ");
			
			$_SESSION['delete_supplier'] = "<script>alert('Supplier Deleted Successfully') ;</script>";
			
			header("location:supplier.php");	
		}
	}
?>