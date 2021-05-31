<?php

	session_start();
	
	include("connection1.php");
	
	if(isset($_POST['add_cart']))
	{
		if(!isset($_SESSION['uid']) && $_SESSION['uid']=="")
		{
			header("location:../../login/index.php");
		}
		
		else
		{
			$pid = $_SESSION['pid'];
			$uid = $_SESSION['uid'];
			$quantity = $_POST['quantity'];
			
			$query=mysql_query("select * from cart where product_id='$pid' && user_id='$uid'");
			$result=mysql_fetch_array($query);
			$cnt=mysql_num_rows($query);
			
			if($cnt==1)
			{
				$cid=$result['cart_id'];
				$qun=$result['product_quantity'];
				$t_quantity=$qun+$quantity;
				$query1=mysql_query("update cart set product_quantity='$t_quantity' where cart_id='$cid' ");
				
				$_SESSION['cart'] = "<script>alert('Product is Added To Cart Successfully.!')</script>";
				header("location:index.php?p_id=$pid");
			}
			else
			{
				$insert = mysql_query("insert into cart(user_id, product_id,product_quantity) values ('$uid','$pid','$quantity')");
				
				if($insert==TRUE)
				{
					$_SESSION['cart'] = "<script>alert('Product is Added To Cart Successfully.!')</script>";
					
					header("location:index.php?p_id=$pid");
				}
				
				else
				{
					$_SESSION['cart'] = "<script>alert('Product Can't Be Added To Cart.!')</script>";
					
					header("location:index.php?p_id=$pid");
				}
			}
		}
	}

?>