<?php

	include("connection1.php");
	
	session_start();
	
	if(isset($_SESSION['adminid']) && $_SESSION['adminid']!="")
	{
		if(isset($_POST['change_pass']))
		{
			$curr_pass = $_POST['curr_pass'];
			$new_pass = $_POST['new_pass'];
			$confirm_pass = $_POST['confirm_pass'];
			
			$id=$_SESSION['adminid'];
		
			$ans = mysql_query("select * from admin where admin_id = '$id'");
			
			$result=mysql_fetch_array($ans);
			
			$pass = $result['admin_password'];
					

			if($pass == $curr_pass)
			{
				if($new_pass==$confirm_pass)
				{
					mysql_query("update admin set admin_password = '$new_pass' where admin_id = '$id' ");
					
					$_SESSION['update_msg'] = "<script>alert('Password Updated Successfully.!');</script>";
					
					header("location:home.php");
				}
				
				else
				{
					$_SESSION['update_msg'] = "<script>alert('New Password isn't matching to Re-Type Password..!') ;</script>";
					
					header("location:admin_pass_change.php");
				}
			}
			
			else
			{
				$_SESSION['update_msg1'] = "<script>alert('Incorrect Current password!!') ;</script>";
				
				header("location:admin_pass_change.php");
			}
		
		}
	}
	
	else
	{
		header("location:index.php");
	}
?>