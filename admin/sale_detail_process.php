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
							
						$import = "insert into sale_detail (sale_detail_id, sale_id, sale_item_name, sale_item_quantity, sale_item_price, sale_item_type, sale_date, sale_time, , product_id, order_status) values('$item1','$item2', '$item3' , '$item4', '$item5', '$item6', '$item7', '$item8', '$item9', '$item10' )";
							
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
			
			$o_status = $_POST['order_status'];
			
			
			
				if(mysql_query("update sale_detail set order_status='$o_status' where sale_detail_id='$id'"))
				{
					$_SESSION['update_sale']="<script>alert('Sale Details Updated Successfully');</script>";
					
					header("location:sale_details.php");
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