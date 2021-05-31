<?php

	include("connection1.php");
	
	session_start();
	
	$sid=$_SESSION['sid'];
	
	if(isset($_POST['update']))
	{
		$id=$_POST['editid'];
		$uid=$_POST['uid'];
		
		$status=$_POST['status'];
		
		if(mysql_query("update confirm_appointment set appointment_status='$status' where confirm_appointment_id='$id'"))
		{
			$_SESSION['update']="<script>alert('Status Changed');</script>";
			
			$query=mysql_query("select * from user where user_id='$uid'");
			$result=mysql_fetch_array($query);
			
			$query1=mysql_query("select * from confirm_appointment where confirm_appointment_id='$id'");
			$result1=mysql_fetch_array($query1);
			
			
			$name=$result['user_name'];
			$email=$result['user_email'];
			$point=$result['user_points'];
			$appointment=$result1['appointment_details'];
			
			$query2=mysql_query("select * from treatment_details where treatment_name='$appointment'");
			$result2=mysql_fetch_array($query2);
			
			$time=$result2['treatment_estimated_time'];
			
			require "PHPMailerAutoload.php";
			
			if($status=="started")
			{
				$msg = "<table> 

			<tr>

				<th> Dear $name, </th>
			
			</tr>
			
			<tr>
			
				<td> You appointment for $appointment has been started and will take about $time time. Enjoy Service. </td> 
			
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
			$mail->Subject='Service Status';
			$mail->Body=$msg;
			
			if($mail->send())
			{
				header("location:confirm_appointment_list.php");
				echo "Message has been sent.<br>";
			}

			else
			{
				echo "<script>alert('Mail not sent..try again later');</script>";
				echo "Mailer Error".$mail->ErrorInfo ;
				//header("location:cart.php");
		}}
			
		
			if($status=="complete")
			{
				$msg = "<table> 

			<tr>

				<th> Dear $name, </th>
			
			</tr>
			
			<tr>
			
				<td> Your appointment for $appointment has ended. Thank you. We have added 10 points in your account. Enjoy your day. </td> 
			
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
			$mail->Subject='Service Status';
			$mail->Body=$msg;
			
			if($mail->send())
			{
				echo "Message has been sent.<br>";
				$point+=10;
				mysql_query("update user set user_points='$point' where user_id='$uid'");
				
				//$select=mysql_query("select * from staff ")
				
				header("location:confirm_appointment_list.php");
			}

			else
			{
				echo "<script>alert('Mail not sent..try again later');</script>";
				echo "Mailer Error".$mail->ErrorInfo ;
				//header("location:cart.php");
		}}
		
		
			if($status=="in execution")
			{
				$msg = "<table> 

			<tr>

				<th> Dear $name, </th>
			
			</tr>
			
			<tr>
			
				<td> You appointment for $appointment is in execution. Enjoy Service. </td> 
			
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
			$mail->Subject='Service Status';
			$mail->Body=$msg;
			
			if($mail->send())
			{
				echo "Message has been sent.<br>";
				header("location:confirm_appointment_list.php");
			}

			else
			{
				echo "<script>alert('Mail not sent..try again later');</script>";
				echo "Mailer Error".$mail->ErrorInfo ;
				//header("location:cart.php");
		}}
			
			
		}
		else
		{
			$_SESSION['update']="<script>alert('Status not Changed');</script>";
			header("location:status_update.php");
		}
		
	}



?>