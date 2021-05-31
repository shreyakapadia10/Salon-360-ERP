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
						$item11	= $data[10];
							
						$import = "insert into product(product_id, purchase_id,supplier_id, product_name, product_type, product_total_quantity, product_current_quantity, product_price, payment_type, product_purchase_date, product_purchase_time) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6', '$item7', '$item8', '$item9', '$item10', '$item11')";
							
						mysql_query($import);
					}
					
					fclose($handle);
						
					print "Import done";
				}
			}
		}
		
		if(isset($_POST['add_product']))
		{
			$p_id = $_POST['purchase_id'];
			$s_id = $_POST['supplier_id'];
			$p_name = $_POST['product_name'];
			$p_quantity = $_POST['product_quantity'];
			$p_price = $_POST['product_price'];
			$p_type = $_POST['product_type'];
			$pay_type = $_POST['payment_type'];
			
			$add = mysql_query("insert into product(purchase_id, supplier_id, product_name, product_type, product_total_quantity, product_current_quantity, product_price, payment_type, product_purchase_date, product_purchase_time) values ('$p_id','$s_id', '$p_name','$p_type','$p_quantity','$p_quantity','$p_price','$pay_type', CURDATE(), CURTIME())");
			
			$add1 = mysql_query("insert into notification(notification_title,notification) values('Product Added', '$p_quantity $p_name is added')");
			
			if($add == TRUE)
			{
				$_SESSION['add_product'] = "<script>alert('Product Added Successfully') ;</script>";
				
				header("location:product.php");
			}
		}		
		
		if(isset($_POST['update']))
		{
			$id=$_POST['editid'];
			
			$s_id = $_POST['sale_id'];
			$p_id = $_POST['purchase_id'];
			$p_name = $_POST['product_name'];
			$p_quantity = $_POST['product_quantity'];
			$p_price = $_POST['product_price'];
			$p_type = $_POST['product_type'];
			$pay_type = $_POST['pay_type'];
			$p_date = $_POST['date'];
			$p_time = $_POST['time'];
			
		if((isset($p_date) && $p_date!="") || (isset($p_time) && $p_time!="") )
			{
				if(mysql_query("update product set product_name='$p_name',product_total_quantity='$p_quantity',product_price='$p_price',product_type='$p_type',payment_type='$pay_type', product_purchase_date = '$p_date', product_purchase_time = '$p_time' where product_id='$id'"))
				{
					$_SESSION['update_product'] = "<script>alert('Product Updated Successfully') ;</script>";
				
					header("location:product.php");
				}
			}
			
			else
			{
				if(mysql_query("update product set product_name='$p_name',product_total_quantity='$p_quantity',product_price='$p_price',product_type='$p_type',payment_type='$pay_type' where product_id='$id'"))
				{
					$_SESSION['update_product'] = "<script>alert('Product Updated Successfully') ;</script>";
				
					header("location:product.php");
				}
			}
		}
		
		if(isset($_GET['del']) && $_GET['del']!=" ")
		{
			$del_id=$_GET['del'];
			
			mysql_query("delete from product where product_id = '$del_id' ");
			
			$_SESSION['delete_product'] = "<script>alert('Product Deleted Successfully') ;</script>";
			
			header("location:product.php");	
		}
	}
?>