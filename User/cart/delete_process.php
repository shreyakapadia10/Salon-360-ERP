<?php 
include_once("connection1.php");
session_start();
if(isset($_GET['pid']) && $_GET['pid']!="")
{

	
	if(isset($_SESSION['cart']) && is_array($_SESSION['cart']))
	{
		$max = count($_SESSION['cart']);
		
		if($max == 1)
		{
			unset($_SESSION['cart']);
		}
		else
		{
			for($i = 0; $i < $max; $i++)
			{
				if($_SESSION['cart'][$i]['productid'] == $_GET['pid'])
				{
					unset($_SESSION['cart'][$i]);
					break;
				}
			}
			$_SESSION['cart'] = array_values($_SESSION['cart']);
		}
	}
	$_SESSION['delete']="<script>alert('Product Deleted');</script>";
	
	header("location:index.php");
}
?>
