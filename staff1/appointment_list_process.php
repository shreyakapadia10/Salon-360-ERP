<?php

	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['sid']) && $_SESSION['sid']=="")
	{
		header("location:index.php");
	}
	else
	{	
		if(isset($_GET['confirmid']) && $_GET['confirmid']!=" ")
		{
			$confirmid = $_GET['confirmid'];
			$query = mysql_query("select * from appointment where appointment_id = '$confirmid' ");
			$result = mysql_fetch_array($query);
			
			$s_id = $result['staff_id'];
			
			$uid = $result['user_id'];
			$app_det = $result['appointment_details'];
			$app_city = $result['appointment_city'];
			$app_date = $result['appointment_date'];
			$app_time = $result['appointment_time'];
			$app_id = $result['appointment_id'];
			$p_type = $result['payment_type'];
			$query1 = mysql_query("select * from user where user_id = '$uid' ");
			$result1 = mysql_fetch_array($query1);
			
			$email = $result1['user_email'];
			
			$_SESSION['email']=$email;
			
			$uname = $result1['user_name'];
			$msg = "<table> 

			<tr>

				<th> Dear $uname, </th>
			
			</tr>
			<tr>
			</tr>
			<tr>
			
				<td> We're Happy To Inform You That Your Appointment For <b> $app_det </b> is Confirmed.! </td> 
			
			</tr>
			<tr>
			</tr>
			<tr>
			
			
				<td> Appointment Date : <b> $app_date </b> </td>
			
			</tr>
			<tr>
			</tr>
			<tr>
			
				<td> Appointment ID : <b> $app_id </b> </td>
			
			</tr>
			<tr>
			</tr>
			<tr>
			
				<td> Appointment Time : <b> $app_time </b> </td>
			
			</tr>
			<tr>
			</tr>
			<tr>
			
				<td> Have A Nice Day.!  </td>
			
			</tr> 
			
			</table>";

			require "PHPMailerAutoload.php";
				
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
			$mail->Subject='Appointment Confirmed';
			$mail->Body=$msg;
			
			if(!$mail->send())
			{
				$_SESSION['message'] =  "<script>alert('Message could not be sent.');</script>";
				echo "Mailer Error".$mail->ErrorInfo ;
			}
			else
			{
				mysql_query("insert into confirm_appointment(appointment_id, user_id, staff_id, appointment_details, appointment_date, appointment_time, appointment_city, payment_type) values('$app_id','$uid','$s_id','$app_det','$app_date','$app_time','$app_city','$p_type')");
				
				mysql_query("delete from appointment where appointment_id = '$app_id'");
				
				$_SESSION['message'] =  "<script>alert('Appointment Confirmed.');</script>";
				
				header("location:appointment_list.php");
			}
		}
	}
	
	if(isset($_POST['update']))
	{
		$id=$_POST['editid'];
		
		$uid = $_POST['user_id'];
		$app_det = $_POST['appointment_details'];
		$app_date = $_POST['date'];
		$app_time = $_POST['appointment_time'];
		$staff_id = $_POST['staff_id'];
			
		mysql_query("update appointment set user_id='$uid',appointment_details='$app_det',appointment_date='$app_date',appointment_time='$app_time',appointment_city='$app_city', staff_id = '$staff_id' where appointment_id='$id' ");
			
		header("location:appointment_list.php");
	}		
?>