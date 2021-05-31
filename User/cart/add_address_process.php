<?php

	session_start();
	
	include("connection1.php");
	
	if(isset($_POST['add_address']))
	{
		if(!isset($_SESSION['uid']) && $_SESSION['uid']=="")
		{
			header("location:../../login/index.php");
		}
		
		else
		{
			$u_id = $_SESSION['uid'];
			$a_code = $_POST['a_code'];
			$a_name = $_POST['a_name'];
			$a_line1 = $_POST['a_line1'];
			$a_line2 = $_POST['a_line2'];
			$a_contact = $_POST['a_contact'];
			$a_city = $_POST['a_city'];
			$a_email = $_POST['a_email'];
			
			$_SESSION['a_name'] = $a_name;
			$_SESSION['a_code'] = $a_code;
			$_SESSION['a_line1'] = $a_line1;
			$_SESSION['a_line2'] = $a_line2;
			$_SESSION['a_city'] = $a_city;
			
			
			echo $u_id ;
			echo $a_code;
			echo $a_name ;
			echo $a_line1 ;
			echo $a_line2 ;
			echo $a_contact ;
			echo $a_city ;
			echo $a_email ;
						
			$add = mysql_query("insert into address (address_pincode, address_line1, address_line2, address_contact, address_name, address_email, address_city, user_id) values ('$a_code', '$a_line1','$a_line2','$a_contact','$a_name','$a_email','$a_city','$u_id')");
			
			if($add == FALSE)
			{
				$_SESSION['add_address'] = "<script>alert('Address Cannot Be Added') ;</script>";
				
				header("location:add_address.php");
			}
			
			else
			{
				$_SESSION['add_address'] = "<script>alert('Address Added Successfully') ;</script>";
				
				header("location:index2.php");
			}
		}
	}
?>