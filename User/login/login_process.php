<?php

	include("connection1.php");

	session_start();
	
	if(isset($_POST['login']))
	{				
		$username=$_POST['username'];
		$password=$_POST['password'];

		if(isset($_POST['remember_me']))
		{
			setcookie('remember_me',$username);
		}
		
		$query=mysql_query("select * from user where user_email='$username' and user_password='$password'");
		$result=mysql_fetch_array($query);
		$cnt=mysql_num_rows($query);
		$u_id = $result['user_id'];
		
		
		if($cnt==1)
		{
			$_SESSION['loginid']=$result['user_id'];
			$_SESSION['email']=$result['user_email'];
			$otp = $_SESSION['otp'];
			
			if($otp==$password)
			{
				$_SESSION['uid'] = $u_id;
				
				header("location:change_pass.php");
			}
			else
			{
				$_SESSION['uid'] = $u_id;
			
				// echo $_SESSION['uid'];
				
				if(isset($_SESSION['cart1']) && $_SESSION['cart1']!="")
				{
					unset($_SESSION['cart1']);
					
					header("location:../cart/index.php");					
				}
			
				else if(isset($_SESSION['myprofile']) && $_SESSION['myprofile']!="")
				{
					unset($_SESSION['myprofile']);
					
					header("location:../my-profile/index.php");					
				}
			
				else if(isset($_SESSION['member']) && $_SESSION['member']!="")
				{
					unset($_SESSION['member']);
					
					header("location:../member/index.php");					
				}
				
				else if(isset($_SESSION['staff']) && $_SESSION['staff']!="")
				{
					unset($_SESSION['staff']);
					
					header("location:../our-team/index.php");					
				}
				
				else if(isset($_SESSION['appointment']) && $_SESSION['appointment']!="")
				{
					unset($_SESSION['appointment']);
					
					header("location:../booking/appointment/index.php");					
				}
			
				else
				{
					header("location:../index.php");					
				}
			}
		}

		else
		{
			$_SESSION['error'] = "<script>alert('Invalid E-mail ID or Password');</script>";
	
			header("location:index.php");
		}
	}
	
	else
	{
		header("location:change_pass.php");
	}
?>
	