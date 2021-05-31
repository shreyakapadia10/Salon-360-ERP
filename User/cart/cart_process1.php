<?php 
include_once("connection1.php");
session_start();
if(isset($_GET['pid']) && $_GET['pid']!="")
{
	//echo "<pre>";
	//print_r($_POST);
	$query = mysql_query("select * from product where product_id=".$_GET['pid']);
	$res = mysql_fetch_array($query);
	
	if($res['product_current_quantity']>1)
	{

	if(isset($_SESSION['cart']) && is_array($_SESSION['cart']))
	{
		
		$max=count($_SESSION['cart']);
		$data = 0;
		for($i = 0; $i <$max; $i++)
		{
			if($_SESSION['cart'][$i]['productid'] == $res['product_id'])
			{
				if($_SESSION['cart'][$i]['qty'] < 100)
				{
					$_SESSION['cart'][$i]['qty']  += 1;
				}
				$data =1;
			}
		}
		if($data == 0)
		{
				
			$_SESSION['cart'][$max]['productid']=$res['product_id'];
			$_SESSION['cart'][$max]['name']=$res['product_name'];
			$_SESSION['cart'][$max]['qty']=1;
			$_SESSION['cart'][$max]['price']=$res['product_price'];
			$_SESSION['cart'][$max]['image']=$res['product_image'];
		}
		
	}
	else
	{
		$_SESSION['cart']=array();
		
		$_SESSION['cart'][0]['productid']=$res['product_id'];
		$_SESSION['cart'][0]['name']=$res['product_name'];
		$_SESSION['cart'][0]['qty']=1;
		$_SESSION['cart'][0]['price']=$res['product_price'];
		$_SESSION['cart'][0]['image']=$res['product_image'];
	}
		$_SESSION['added']="<script>alert('Item added into your cart');</script>";

			if(isset($_SESSION['cart3']))
			{
				unset($_SESSION['cart3']);
				header("location:../cart/index.php");
			}

			else
			{
			header("location:../shop/index.php");
			}
		}
	
	else
	{
		$_SESSION['added']="<script>alert('Product is not available');</script>";
		header("location:../shop/index.php");
	}
}
?>
