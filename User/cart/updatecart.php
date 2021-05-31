<?php 
include_once("connection1.php");
session_start();
if(isset($_GET['pid']) && $_GET['pid']!="")
{
	
	if(isset($_SESSION['cart']) && is_array($_SESSION['cart']))
	{
		
		$max=count($_SESSION['cart']);
		for($i = 0; $i <$max; $i++)
		{
			if($_SESSION['cart'][$i]['productid'] == $_GET['pid'])
			{
				if($_SESSION['cart'][$i]['qty'] == 1 && $i == 0 && $max == 1)
				{
					unset($_SESSION['cart']);
				}
				else if($_SESSION['cart'][$i]['qty'] == 1)
				{
					unset($_SESSION['cart'][$i]);
				}
				else
				{
					$_SESSION['cart'][$i]['qty']  -= 1;
				}
			}
		}
		if($max > 1)
			$_SESSION['cart'] = array_values($_SESSION['cart']);
	}
	header("location:index.php");
}
?>
