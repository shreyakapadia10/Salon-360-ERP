<?php

	include("connection1.php");
	
	session_start();
	
	if(isset($_SESSION['uid']) && $_SESSION['uid']!="")
	{
		if(isset($_POST['change_pass']))
		{
			$curr_pass = $_POST['curr_pass'];
			$new_pass = $_POST['new_pass'];
			$confirm_pass = $_POST['confirm_pass'];
			
			$id=$_SESSION['uid'];
		
			$ans = mysql_query("select * from user where user_id = '$id'");
			
			$result=mysql_fetch_array($ans);
			
			$pass = $result['user_password'];
					
			if($pass == $curr_pass)
			{
				if($new_pass==$confirm_pass)
				{
					mysql_query("update user set user_password = '$new_pass' where user_id = '$id' ");
					
					$_SESSION['update_msg'] = "<script>alert('Password Updated Successfully.!');</script>";
					
					header("location:../services/index.php");
				}
				
				else
				{
					$_SESSION['update_msg'] = "<script>alert('New Password isn't matching to Re-Type Password..!') ;</script>";
					
					header("location:index.php");
				}
			}
			
			else
			{
				$_SESSION['update_msg1'] = "<script>alert('Incorrect Current password!!') ;</script>";
				
				header("location:index.php");
			}
		
		}
	}
	
	else
	{
		header("location:index.php");
	}
?>