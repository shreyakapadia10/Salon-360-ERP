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
			$pay_id = $_POST['pay_id'];
			$admin_id = $_POST['admin_id'];
			$s_id = $_POST['supplier_id'];
			$pay_details = $_POST['pay_type'];
					
			$add = mysql_query("insert into purchase (purchase_item_name, purchase_item_price, purchase_item_type, purchase_date, purchase_time, admin_id, payment_id, payment_type,supplier_id) values ('$p_name','$p_price','$p_type',CURDATE(),CURTIME(),'$admin_id','$pay_id','$pay_details','$s_id' )");
			
			if($add == TRUE)
			{
				$_SESSION['add_purchase'] = "<script>alert('Purchased Item Added Successfully') ;</script>";
				
				header("location:purchase.php");
			}
			
			else
			{
				$_SESSION['add_purchase'] = "<script>alert('Purchased Item Cannot Be Added Successfully') ;</script>";
				
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
						
					$import = "insert into purchase(purchase_id,purchase_item_name,purchase_item_price,purchase_item_type,purchase_date,purchase_time,admin_id,payment_id, payment_details, supplier_id) values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10')";
						
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
			
			$item=$_POST['item'];
			$price=$_POST['price'];
			$type=$_POST['type'];
			$date=$_POST['date'];
			$time=$_POST['time'];
			$pay_details=$_POST['pay_type'];
			
			if((isset($date) && $date!="") || (isset($time) && $time!="") )
			{
				if(mysql_query("update purchase set purchase_item_name='$item',purchase_item_price='$price',purchase_item_type='$type',purchase_date='$date',purchase_time='$time',payment_type='$pay_details' where purchase_id='$id'"))
				{
					$_SESSION['update_purchase'] = "<script>alert('Item Updated Successfully') ;</script>";
					
					header("location:purchase.php");
				}
			}
			
			else
			{
				if(mysql_query("update purchase set purchase_item_name='$item',purchase_item_price='$price',purchase_item_type='$type',payment_type='$pay_details' where purchase_id='$id'"))
				{
					$_SESSION['update_purchase'] = "<script>alert('Item Updated Successfully') ;</script>";
					
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