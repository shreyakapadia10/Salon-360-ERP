<?php 
	include("connection1.php");
	
	session_start();
	$aid=$_SESSION['address_id'];
	$uid=$_SESSION['uid'];
	require "PHPMailerAutoload.php";
	
		
		$count = count($_SESSION['cart']);

		$tot_amount=0;

		for($i=0; $i<$count; $i++)
		{
			$pid = $_SESSION['cart'][$i]['productid'];
			$pname = $_SESSION['cart'][$i]['name'];
			$price = $_SESSION['cart'][$i]['price'];
			$qty = $_SESSION['cart'][$i]['qty'];
			$img = $_SESSION['cart'][$i]['image'];
			$tot = $price * $qty;
			$tot_amount += $tot;
			
			
			$add=mysql_query("insert into cart(product_id,user_id,address_id,p_name,p_price,total_amount,quantity,date,payment_type) values('$pid','$uid','$aid','$pname','$price','$tot_amount','$qty',CURDATE(),'Cash On Delivery')");
			
			if($add==TRUE)
			{
				mysql_query("insert into notification(notification_title,notification,notification_date,notification_time) values('Product Ordered','$pname of $qty quantity is ordered',CURDATE(),CURTIME())");
				
			}
			
	
			$query3=mysql_query("select * from user where user_id='$uid'");
			$result3=mysql_fetch_array($query3);
			
			$email=$result3['user_email'];
			$name=$result3['user_name'];
		
		
			$msg = "<table> 

			<tr>

				<th> Dear $name, </th>
			
			</tr>
			
			<tr>
			
				<td> You order for $pname of rupees $price has been confirmed and will be placed soon. </td> 
			
			</tr>
						
			</table>";
		
		
			//echo $msg;
			
		
			$mail=new PHPMailer;
			$mail->isSMTP();
			$mail->Host='smtp.gmail.com';
			$mail->SMTPAuth=true;
			$mail->Username='salon360erp@gmail.com';
			$mail->Password='Salon360erp@123';
			$mail->SMTPSecure='ssl';
			$mail->Port=465;
			$mail->From='salon360erp@gmail.com';
			$mail->FromName='Salon 360 ERP';
			$mail->addAddress($email);
			$mail->WordWrap=50;
			$mail->isHTML(true);
			$mail->Subject='Order Confirmation';
			$mail->Body=$msg;
			
			if($mail->send())
			{
				$_SESSION['order'] = "<script>alert('Product Ordered Successfully.!'); </script>";
				
				header("location:../shop/index.php");
				echo "Message has been sent.<br>";
			}

			else
			{
				echo "<script>alert('Can't Confirm Your Order due to Network Problem');</script>";
				echo "Mailer Error".$mail->ErrorInfo ;
				header("location:../shop/index.php");
			}
		}
		
		
?>

<?php
	// unset($_SESSION['cart']);
?>