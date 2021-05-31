<?php	
	
	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{	
		if(isset($_POST['update']))
		{
			$id=$_POST['editid'];
			echo $id;
			$u_name = $_POST['user_name'];
			$u_gender = $_POST['gender'];
			$u_add = $_POST['user_add'];
			$u_contact = $_POST['user_contact'];
			$u_dob = $_POST['user_dob'];
			$u_email = $_POST['user_email'];
			$u_greetings = $_POST['user_greetings'];
			$u_points = $_POST['user_points'];
			$u_purchased_items = $_POST['user_purchased_items'];
			$u_membership = $_POST['user_membership'];
			$u_membership_date =  $_POST['user_end_date'];
			
			mysql_query("update user set user_name='$u_name',user_gender='$u_gender',user_address='$u_add',user_contact='$u_contact',user_dob='$u_dob',user_email='$u_email',user_greetings='$u_greetings',user_points='$u_points',user_purchase_items='$u_purchased_items',membership='$u_membership',membership_end_date='$u_membership_date' where user_id='$id'");
			
			header("location:user_details.php");
		}
		
		if(isset($_GET['deleteid']) && $_GET['deleteid']!="")
		{
			$del_id=$_GET['deleteid'];
			
			mysql_query("delete from user where user_id = '$del_id' ");
			
			$_SESSION['delete_user'] = "<script>alert('User Deleted Successfully');</script>";
			
			header("location:user_details.php");	
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
						
						$import = "insert into user(user_id, user_name, user_password , user_gender, user_address, user_contact, user_dob, user_email, user_greetings, user_points, user_purchase_items, membership, membership_end_date) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6', '$item7', '$item8', '$item9', '$item10', '$item11', '$item12', '$item13')";
							
						mysql_query($import);
					}
					
					fclose($handle);
						
					header("location:user_details.php");
				}
			}
		}
	}
?>