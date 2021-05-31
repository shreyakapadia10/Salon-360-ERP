<?php

	include("connection1.php");
	
	/*if(isset($_POST['submit']) && $_POST['submit'])
	{/*
		$name = $_POST['name'];
		$email = $_POST['email'];
		$ph = $_POST['phone'];
		$msg1 = $_POST['message'];
		
		$msg = "<table>
			
			<tr>
			
				<td> $msg1 </td> 
			
			</tr>
			
			<tr>
		
				<td> From : <b> $name </b> </td>
				<td> Email-ID : <b> $email </b> </td>
			
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
			$mail->FromName='$name';
			$mail->addAddress($email);
			$mail->WordWrap=50;
			$mail->isHTML(true);
			$mail->Subject='Query';
			$mail->Body=$msg;
			
			if($mail->send())
			{
				header("location:index.php");
				echo "Message has been sent.<br>";
			}

			else
			{
				echo "Message could not be sent";
				echo "Mailer Error".$mail->ErrorInfo ;
				header("location:index.php");
			}
		
	}
	
	else
	{
		header("location:index.php");
	}*/
	
	echo "hi";

?>