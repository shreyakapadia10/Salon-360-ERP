<?php

	session_start();

	include("connection1.php");
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{
		if(isset($_POST['add_purchase']))
		{
			$p_name = $_POST['p_name'];
			$p_price = $_POST['p_price'];
			$p_type = $_POST['p_type'];
			$pay_type = $_POST['pay_type'];
			$p_quantity = $_POST['p_quantity'];
			$admin_id = $_POST['admin_id'];
			$s_id = $_POST['supplier_id'];
			$p_status = $_POST['pay_status'];
			echo $p_status;
					
			$add = mysql_query("insert into purchase (purchase_item_name, purchase_item_price, purchase_item_type, payment_type, purchase_date, purchase_time, admin_id, supplier_id, purchase_item_quantity, payment_status) values ('$p_name','$p_price','$p_type','$pay_type',CURDATE(),CURTIME(),'$admin_id','$s_id','$p_quantity','$p_status')");
			
			if($add == TRUE)
			{
				$_SESSION['add_purchase'] = "<script>alert('Purchased Item Added Successfully') ;</script>";
				
				if($p_status=='done')
				{
				mysql_query("insert into payment_supplier(supplier_id,payment_date, payment_time, payment_details, payment_type, payment_amount,product_quantity) values ('$s_id',CURDATE(),CURTIME(),'$p_details','$p_type','$p_amount','$quantity')");
				}
				
				header("location:purchase.php");
			}
			
			else
			{
				$_SESSION['add_purchase'] = "<script>alert('Purchased Item Cannot Be Added') ;</script>";
				
				header("location:purchase.php");
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
				$handle = fopen($tmp,"r");
			
				while(($data=fgetcsv($handle,1000,","))!==FALSE) 
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
						
					$import = "insert into purchase (purchase_id,purchase_item_name,purchase_item_price,purchase_item_type,purchase_date,purchase_time,admin_id,supplier_id,purchase_item_quantity,payment_status) values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10')";
						
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
			$sid=$_POST['sid'];
			$item=$_POST['item'];
			$price=$_POST['price'];
			$type=$_POST['type'];
			$quantity=$_POST['quantity'];
			$date=$_POST['date'];
			$time=$_POST['time'];
			$p_status=$_POST['pay_status'];
			$p_type=$_POST['pay_type'];
			
			if((isset($date) && $date!="") || (isset($time) && $time!="") )
			{
				if(mysql_query("update purchase set purchase_item_name='$item',purchase_item_price='$price',purchase_item_type='$type',purchase_date='$date',purchase_time='$time',purchase_item_quantity='$quantity',payment_status='$p_status',payment_type='$p_type' where purchase_id='$id'"))
				{
					$_SESSION['update_purchase'] = "<script>alert('Item Updated Successfully') ;</script>";
			//echo $p_status;
					
					if($p_status=='done')
					{
					mysql_query("insert into payment_supplier(supplier_id,payment_date, payment_time, payment_details, payment_type, payment_amount,product_quantity) values ('$sid',CURDATE(),CURTIME(),'$type','$p_type','$price','$quantity')");
					}
					header("location:purchase.php");
				}
			}
			
			else
			{
				if(mysql_query("update purchase set purchase_item_name='$item',purchase_item_price='$price',purchase_item_type='$type',payment_type='$pay_details',payment_status='$p_status' where purchase_id='$id'"))
				{
					$_SESSION['update_purchase'] = "<script>alert('Item Updated Successfully') ;</script>";
					if($p_status=='done')
					{
					mysql_query("insert into payment_supplier(supplier_id,payment_date, payment_time, payment_details, payment_type, payment_amount,product_quantity) values ('$sid',CURDATE(),CURTIME(),'$type','$p_type','$price','$quantity')");
					}
					header("location:purchase.php");
				}
			}
		}
		
		if(isset($_GET['del']) && $_GET['del']!=" ")
		{
			$del_id=$_GET['del'];
			
			mysql_query("delete from purchase where purchase_id = '$del_id' ");
			
			$_SESSION['delete_purchase'] = "<script>alert('Item Deleted Successfully') ;</script>";
			
			header("location:purchase.php");	
		}
	}
?>