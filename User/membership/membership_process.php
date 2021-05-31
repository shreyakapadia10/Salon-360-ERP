<?php 
	
	include("connection1.php");
	
	session_start();
	
	$uid=$_SESSION['uid'];
		
	require "PHPMailerAutoload.php";
	
	if(isset($_POST['submit']) && $_POST['submit']!="")
	{ 
		$ptype=$_POST['Option1'];
		
		$today=date('d-m-Y');
		
		$query3=mysql_query("select * from user where user_id='$uid'");
		
		$result3=mysql_fetch_array($query3);
		
		$email=$result3['user_email'];
		$name=$result3['user_name'];
		
		$msg = "<table> 

		<tr>

			<th> Dear $name, </th>
		
		</tr>
		
		<tr>
		
			<td> Your membership starts from $today to $ptype. Enjoy Beauty! </td> 
		
		</tr>
		
		<tr>
	
			<td> Have a Nice Day.! </td>
		
		</tr>
		
		</table>";
	
		 echo $msg;
		
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
		$mail->Subject='Membership Confirmation';
		$mail->Body=$msg;
		
		if($mail->send())
		{
			$update = mysql_query("update user set membership='Yes', membership_end_date = '$ptype' where user_id = '$uid'");
			
			if($update==TRUE)
			{
				header("location:../index.php");
				echo "Message has been sent.<br>";
			}
		}

		else
		{
			echo "Message could not be sent";
			echo "Mailer Error".$mail->ErrorInfo ;
			header("location:../index.php");
		}
	
	}
?>