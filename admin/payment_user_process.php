<?php 

	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	
	else
	{
	if(isset($_POST['add_payment']))
	{
		$p_id = $_POST['pay_id'];
		$u_id = $_POST['user_id'];
		$p_details = $_POST['pay_details'];
		$p_type = $_POST['pay_type'];
		$p_amount = $_POST['pay_amount'];
		$quantity = $_POST['quantity'];
		
		$add = mysql_query("insert into payment_user(user_id,payment_date, payment_time, payment_details, payment_type, payment_amount,product_quantity) values ('$u_id',CURDATE(),CURTIME(),'$p_details','$p_type','$p_amount','$quantity')");
		
		if($add == TRUE)
		{
			$_SESSION['add_payment'] = "<script>alert('Payment Added Successfully') ;</script>";
			
			header("location:payment_user.php");
		}
		
		else
		{
			$_SESSION['add_payment'] = "<script>alert('Payment Can't Be Added') ;</script>";
			
			header("location:payment_user.php");
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
						
						$import = "insert into payment_user(payment_user_id,user_id, payment_date, payment_time, payment_details, payment_type, payment_amount,product_quantity) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6', '$item6','$item8')";
							
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
			echo $id;
			$pay_id=$_POST['pay_id'];
			$u_id=$_POST['user_id'];
			$pay_date=$_POST['pay_date'];
			$pay_time=$_POST['pay_time'];
			$pay_details=$_POST['pay_details'];
			$pay_type=$_POST['pay_type'];
			$pay_amt=$_POST['pay_amt'];
			$quantity=$_POST['quantity'];
			echo $quantity;
			
			if(mysql_query("update payment_user set payment_date='$pay_date',payment_time='$pay_time',payment_details='$pay_details',payment_type='$pay_type',payment_amount='$pay_amt',product_quantity='$quantity' where payment_user_id='$id'"))
			{
				$_SESSION['update']="<script>alert('User Payment Updated Successfully') ;</script>";
				
				header("location:payment_user.php");
			}
		}
		
		if(isset($_GET['del']) && $_GET['del']!="")
		{
			$id=$_GET['del'];
			
			mysql_query("delete from payment_user where payment_user_id='$id'");
			
			$_SESSION['delete']="<script>alert('User Payment Deleted Successfully') ;</script>";
			
			header("location:payment_user.php");
		}
	}








?>