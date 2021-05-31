<?php 
	
	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{
		if(isset($_POST['add_address']))
		{
			$u_id = $_POST['u_id'];
			$a_code = $_POST['a_code'];
			$a_name = $_POST['a_name'];
			$a_line1 = $_POST['a_line1'];
			$a_line2 = $_POST['a_line2'];
			$a_contact = $_POST['a_contact'];
			$a_city = $_POST['a_city'];
			$a_email = $_POST['a_email'];
					
			$add = mysql_query("insert into address (address_pincode, address_line1, address_line2, address_contact, address_name, address_email, address_city, user_id) values ('$a_code', '$a_line1','$a_line2','$a_contact','$a_name','$a_email','$a_city','$u_id')");
			
			if($add == FALSE)
			{
				$_SESSION['add_address'] = "<script>alert('Address Cannot Added') ;</script>";
				
				header("location:address.php");
			}
			
			else
			{
				$_SESSION['add_address'] = "<script>alert('Address Added Successfully') ;</script>";
				
				header("location:address.php");
			}
		}		
		
		else
		{
			header("location:address.php");
		}
		
		if(isset($_POST['update']))
		{
			$id=$_POST['editid'];
			
			$u_id = $_POST['u_id'];
			$a_id = $_POST['a_id'];
			$a_code = $_POST['a_code'];
			$a_name = $_POST['a_name'];
			$a_line1 = $_POST['a_line1'];
			$a_line2 = $_POST['a_line2'];
			$a_contact = $_POST['a_contact'];
			$a_city = $_POST['a_city'];
			$a_email = $_POST['a_email'];
			
			if(mysql_query("update address set address_id='$a_id',address_pincode='$a_code',address_line1='$a_line1',address_line2='$a_line2',address_contact='$a_contact',address_name='$a_name',address_email='$a_email',address_city='$a_city',user_id='$u_id' where address_id='$id'"))
			{
				$_SESSION['update']="<script>alert('Address Updated successfully');</script>";
				
				header("location:address.php");
			}
		}
		
		if(isset($_GET['del']) && $_GET['del']!="")
		{
			$id=$_GET['del'];
			
			mysql_query("delete from address where address_id='$id'");
			
			$_SESSION['delete_address']="<script>alert('Address Deleted successfully');</script>";
			
			header("location:address.php");
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
					$item7 = $data[6];
					$item8 = $data[7];
					$item9 = $data[8];
						
					$import = "insert into address(address_id, address_pincode, address_line1, address_line2, address_contact, address_name, address_email, address_city,  user_id) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6', '$item7', '$item8', '$item9')";
						
					mysql_query($import);
				}
				
				fclose($handle);	

				header("location:address.php");				
			}
		}
	}
?>