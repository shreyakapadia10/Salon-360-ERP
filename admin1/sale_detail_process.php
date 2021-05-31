<?php 

	include("connection1.php");
	
	session_start();

	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{	
		if(isset($_POST['add_sale']))
		{
			$s_id = $_POST['sale_id'];
			$s_name = $_POST['sale_name'];
			$s_quantity = $_POST['sale_quantity'];
			$s_price = $_POST['sale_price'];
			$s_type = $_POST['sale_type'];
			$s_date = $_POST['datetime'];
			$p_type = $_POST['pay_type'];
			$p_id = $_POST['pay_id'];
			$u_id = $_POST['user_id'];
			$a_id = $_POST['add_id'];
			$pro_id = $_POST['product_id'];
			$o_status = $_POST['order_status'];
			
			if(mysql_query("insert into sale_detail (sale_id, sale_item_name, sale_item_quantity, sale_item_price, sale_item_type, sale_date, sale_time, product_id, user_id, payment_id, payment_type, address_id,order_status) values ('$s_id','$s_name','$s_quantity','$s_price','$s_type',CURDATE(),CURTIME(),'$pro_id','$u_id','$p_id','$p_type','$a_id','o_status')"))
			{
				$_SESSION['add_sale'] = "<script>alert('Sale Item Added Successfully');</script>";
				
				header("location:sale_details.php");
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
						$item10 = $data[9];
						$item11 = $data[10];
						$item12 = $data[11];
						$item13 = $data[12];
						$item14 = $data[13];
							
						$import = "insert into sale_detail (sale_detail_id, sale_id, sale_item_name, sale_item_quantity, sale_item_price, sale_item_type, sale_date, sale_time, , product_id, user_id, payment_id, payment_type, address_id, order_status) values('$item1','$item2', '$item3' , '$item4', '$item5', '$item6', '$item7', '$item8', '$item9', '$item10', '$item11', '$item12', '$item13', '$item14' )";
							
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
			echo $id;
			$sd_id = $_POST['sd_id'];
			$s_id = $_POST['sale_id'];
			$s_name = $_POST['sale_name'];
			$s_quantity = $_POST['sale_quantity'];
			$s_price = $_POST['sale_price'];
			$s_type = $_POST['sale_type'];
			$s_date = $_POST['sale_date'];
			$s_time = $_POST['sale_time'];
			$p_type = $_POST['pay_type'];
			$p_id = $_POST['pay_id'];
			$u_id = $_POST['user_id'];
			$a_id = $_POST['add_id'];
			$o_status = $_POST['order_status'];
			$pro_id = $_POST['product_id'];
			
			if((isset($s_date) && $s_date!="") || (isset($s_time) && $s_time!="") )
			{
				if(mysql_query("update sale_detail set sale_item_name='$s_name',sale_item_quantity='$s_quantity',sale_item_price='$s_price',sale_item_type='$s_type',sale_date='$s_date',sale_time='$s_time',payment_type='$p_type',order_status='$o_status' where sale_detail_id='$id'"))
				{
					$_SESSION['update_sale']="<script>alert('Sale Details Updated Successfully');</script>";
					
					//header("location:sale_details.php");
				}
			}
			
			else
			{
				if(mysql_query("update sale_detail set sale_item_name='$s_name',sale_item_quantity='$s_quantity',sale_item_price='$s_price',sale_item_type='$s_type',payment_type='$p_type',order_status='$o_status' where sale_detail_id='$id'"))
				{
					$_SESSION['update_sale']="<script>alert('Sale Details Updated Successfully');</script>";
					
					//header("location:sale_details.php");
				}
			}
		}
		if(isset($_GET['del']) && $_GET['del']!="")
		{
			$id=$_GET['del'];
			
			mysql_query("delete from sale_detail where sale_detail_id='$id'");
			
			$_SESSION['delete_sale']="<script>alert('Sale Details Deleted Successfully');</script>";
			
			header("location:sale_details.php");
		}
	}	
?>