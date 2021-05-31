<?php

include("connection1.php");

session_start();

		if(isset($_POST['update']))
		{
			$id=$_POST['editid'];
			$uid=$_POST['uid'];
			
			$o_status = $_POST['order_status'];
			
				if(mysql_query("update cart set order_status='$o_status' where cart_id='$id'"))
				{
					$_SESSION['update_cart']="<script>alert('Cart Updated Successfully');</script>";
					
					header("location:cart.php");
				}
				
			$query=mysql_query("select * from user where user_id='$uid'");
			$result=mysql_fetch_array($query);
			
			$query1=mysql_query("select * from cart where cart_id='$id'");
			$result1=mysql_fetch_array($query1);
			
			$email=$result['user_email'];
			$name=$result['user_name'];
			$pname=$result1['p_name'];
		
			require "PHPMailerAutoload.php";
			
			if($o_status!="Delivered")
			{
			$msg = "<table> 

			<tr>

				<th> Dear $name, </th>
			
			</tr>
			
			<tr>
			
				<td> You order for $pname has been $o_status and will be placed soon. </td> 
			
			</tr>
			
			<tr>
		
				<td> For further query visit:www.Salon360ERP.com </td>
			
			</tr>
			
			</table>";
		
		
		//	echo $msg;
			
		
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
			$mail->Subject='Order Status';
			$mail->Body=$msg;
			
			if($mail->send())
			{
				header("location:cart.php");
				echo "Message has been sent.<br>";
			}

			else
			{
				echo "<script>alert('Can't Confirm Your Order due to Network Problem');</script>";
				echo "Mailer Error".$mail->ErrorInfo ;
				//header("location:cart.php");
		}}
			
			if($o_status=="Delivered" || $o_status=="Cancled")
			{
				$msg = "<table> 

			<tr>

				<th> Dear $name, </th>
			
			</tr>
			
			<tr>
			
				<td> You order for $pname has been $o_status. </td> 
			
			</tr>
			
			<tr>
		
				<td> For further query visit:www.Salon360ERP.com </td>
			
			</tr>
			
			</table>";
		
		
		//	echo $msg;
			
		
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
			$mail->Subject='Order Status';
			$mail->Body=$msg;
			
			if($mail->send())
			{
				header("location:cart.php");
				echo "Message has been sent.<br>";
			}

			else
			{
				echo "<script>alert('Can't Confirm Your Order due to Network Problem');</script>";
				echo "Mailer Error".$mail->ErrorInfo ;
				//header("location:../index.php");
			}
			
			
			$ptype=$result1['payment_type'];
			$price=$result1['total_amount'];
			$qty=$result1['quantity'];
			$aid=$result1['address_id'];
			$pid=$result1['product_id'];
			
			if(mysql_query("insert into payment_user(user_id,payment_date,payment_time,payment_details,payment_type,payment_amount) values('$uid',CURDATE(),CURTIME(),'$pname','$ptype','$price')"))
			{
				$query=mysql_query("select * from payment_user where user_id='$uid'");
				$result=mysql_fetch_array($query);
				
				$pay_id=$result['payment_user_id'];
				
				mysql_query("insert into sale(user_id,payment_id,pay_type,address_id) values('$uid','$pay_id','$ptype','$aid')");
				
				$query1=mysql_query("select * from sale where user_id='$uid'");
				$result1=mysql_fetch_array($query1);
				
				$s_id=$result1['sale_id'];
				
				mysql_query("insert into sale_detail(sale_id,sale_item_name,sale_item_quantity,sale_item_price,sale_date,sale_time,product_id,address_id,order_status) values('$s_id','$pname','$qty','$price',CURDATE(),CURTIME(),'$pid','$aid','$o_status')");
				
				mysql_query("delete from cart where cart_id='$id'");
				
				$select1 = mysql_query("select * from product where product_id = '$pid'");
				
				$result3 = mysql_fetch_array($select1);
				
				$tqty = $result3['product_total_quantity'];
				
				$tqty = $tqty - $qty;
				
				mysql_query("update product set product_current_quantity='$tqty' where product_id='$pid'");
				
			}}
			
		}	
		
		
		if(isset($_GET['del']))
		{
			$id=$_GET['del'];
			
			mysql_query("delete from cart where cart_id='$id'");
			
			$_SESSION['delete_cart']="<script>alert('Product Deleted Successfully');</script>";
			
			header("location:cart.php");
		}
?>