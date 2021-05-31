<?php

	include("connection1.php");
	
	session_start();
	
	if(isset($_SESSION['sid']) && $_SESSION['sid']!="")
	{
		if(isset($_POST['change_pass']))
		{
			$curr_pass = $_POST['curr_pass'];
			$new_pass = $_POST['new_pass'];
			$confirm_pass = $_POST['confirm_pass'];
			
			$id=$_SESSION['sid'];
		
			$ans = mysql_query("select * from staff where staff_id = '$id'");
			
			$result=mysql_fetch_array($ans);
			
			$pass = $result['staff_password'];
					

			if($pass == $curr_pass)
			{
				if($new_pass==$confirm_pass)
				{
					mysql_query("update staff set staff_password = '$new_pass' where staff_id = '$id' ");
					
					$_SESSION['update_msg'] = "<script>alert('Password Updated Successfully.!');</script>";
					
					header("location:home.php");
				}
				
				else
				{
					$_SESSION['update_msg'] = "<script>alert('New Password isn't matching to Re-Type Password..!') ;</script>";
					
					header("location:staff_pass_change.php");
				}
			}
			
			else
			{
				$_SESSION['update_msg1'] = "<script>alert('Incorrect Current password!!') ;</script>";
				
				header("location:staff_pass_change.php");
			}
		
		}
	}
	
	else
	{
		header("location:index.php");
	}
?>