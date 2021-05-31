<?php  

	if(isset($_POST['submit']))
	{
		$p_id=$_POST['product_id'];
		
		//$email=$_POST['email'];
		$rate=$_POST['rating'];
		$comment=$_POST['comment'];
		
		if(mysql_query("insert into product_feedback(product_id,user_id,rate,review,date) values('$p_id','$uid','$rate','$comment')"))
		{
			
			$_SESSION['review']="<script>alert('Thank you for your review!!');</script>";
			header("location:index.php");
		}
		else
		{
			$_SESSION['review']="<script>alert('Review does not sent!!');</script>";
			header("location:index.php");
		}
	}


?>