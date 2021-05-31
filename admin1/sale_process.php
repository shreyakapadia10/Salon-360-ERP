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
						$item6 = $data[5];
						$item7 = $data[6];
						$item8 = $data[7];
						$item9 = $data[8];
						$item10 = $data[9];
						$item11 = $data[10];
						$item12 = $data[11];
							
						$import = "insert into sale (sale_id, product_id, user_id, payment_id, sale_item_name, sale_item_quantity, sale_item_price, sale_item_type, sale_date, sale_time, pay_type, address_id) values('$item1','$item2', '$item3' , '$item4', '$item5', '$item6', '$item7', '$item8', '$item9', '$item10', '$item11', '$item12')";
							
						mysql_query($import);
					}
					
					fclose($handle);
						
					print "Import done";
				}
			}
		}

		if(isset($_POST['add_sale']))
		{
			$s_name = $_POST['sale_name'];
			$s_quantity = $_POST['sale_quantity'];
			$s_price = $_POST['sale_price'];
			$s_type = $_POST['sale_type'];
			$p_type = $_POST['pay_type'];
			$p_id = $_POST['pay_id'];
			$u_id = $_POST['user_id'];
			$pro_id = $_POST['product_id'];
			$a_id = $_POST['add_id'];
			
			if(mysql_query("insert into sale (sale_item_name, sale_item_quantity, sale_item_price, sale_item_type, sale_date, sale_time, product_id, user_id, payment_id, pay_type,address_id) values ('$s_name','$s_quantity','$s_price','$s_type',CURDATE(),CURTIME(),'$pro_id','$u_id','$p_id','$p_type','$a_id')"))
			{
				$_SESSION['add_sale'] = "<script>alert('Sale Item Added Successfully');</script>";
				
				$insert = mysql_insert_id();
				
				if(mysql_query("insert into payment_user(user_id,payment_date, payment_time, payment_details, payment_type, payment_amount) values('$u_id',CURDATE(),CURTIME(),'$s_name','$p_type','$s_price')"))
				{
					$_SESSION['add_payment_user'] = "<script>alert('User Payment Added Successfully');</script>";
				}
				
				else
				{
					$_SESSION['add_payment_user'] = "<script>alert('User Payment Can't Be Added');</script>";
				}
				
				header("location:sale.php");
			}
			
		}		
			
		if(isset($_POST['update']))
		{
			$id=$_POST['editid'];
			
			$s_name = $_POST['sale_name'];
			$s_quantity = $_POST['sale_quantity'];
			$s_price = $_POST['sale_price'];
			$s_type = $_POST['sale_type'];
			$p_type = $_POST['pay_type'];
			$s_date = $_POST['date'];
			$s_time = $_POST['time'];
			
			if((isset($s_date) && $s_date!="") || (isset($s_time) && $s_time!="") )
			{
				if(mysql_query("update sale set sale_item_name='$s_name',sale_item_quantity='$s_quantity',sale_item_price='$s_price',sale_item_type='$s_type',sale_date = '$s_date', sale_time = '$s_time',pay_type='$p_type' where sale_id='$id'"))
				{
					$_SESSION['update_sale']="<script>alert('Sale Item Updated Successfully') ;</script>";
					
					header("location:sale.php");
				}
			}
			
			else
			{
				if(mysql_query("update sale set sale_item_name='$s_name',sale_item_quantity='$s_quantity',sale_item_price='$s_price',sale_item_type='$s_type',pay_type='$p_type' where sale_id='$id'"))
				{
					$_SESSION['update_sale']="<script>alert('Sale Item Updated Successfully') ;</script>";
					
					header("location:sale.php");
				}
			}
		}
		
		if(isset($_GET['del']) && $_GET['del']!=" ")
		{
			$del_id=$_GET['del'];
			
			mysql_query("delete from sale where sale_id = '$del_id' ");
			
			$_SESSION['delete_sale'] = "<script>alert('Sale Item Deleted Successfully') ;</script>";
			
			header("location:sale.php");	
		}
	}
?>