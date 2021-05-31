<?php
	include("connection1.php");

	session_start();

	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{	
		if(isset($_POST['upload']))
		{
			if($_FILES['file1']['name'])
			{
				$fname = $_FILES['file1']['name'];
				$arrFileName = explode('.',$_FILES['file1']['name']);
				$tmp = $_FILES['file1']['tmp_name'];
				
				

				if($arrFileName[1] == 'csv')
				{
					$handle = fopen($tmp, "r");
				
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
					{
						$item1 = $data[0];
						$item2 = $data[1];
						$item3 = $data[2];
						$item4 = $data[3];
						$item5 = $data[4];
						$item6 = $data[5];
						$item7 = $data[6];
						$item8 = $data[7];
						$item9 = $data[8];
						$item10 = $data[9];
							
						$import = "insert into canceled_appointments(appointment_cancel_id,appointment_id, user_id, staff_id, appointment_details, cancel_reason, appointment_date, appointment_time, appointment_city, payment_type) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6', '$item7', '$item8', '$item9', '$item10')";
							
						$success = mysql_query($import);
						
						if($success == TRUE)
						{
							echo "<script>alert('Import Done'); <script>";
						}
					}
					
					fclose($handle);
				}
			}
		}
			
			if(isset($_SESSION['cancelid']) && $_SESSION['cancelid']!="")
			{
				echo $_SESSION['cancelid'];
				
				$cancelid = $_SESSION['cancelid'];
				$query = mysql_query("select * from appointment where appointment_id = '$cancelid' ");
				$result = mysql_fetch_array($query);
				
				$uid = $result['user_id'];
				$app_det = $result['appointment_details'];
				$app_city = $result['appointment_city'];
				$app_date = $result['appointment_date'];
				$app_time = $result['appointment_time'];
				$app_id = $result['appointment_id'];
				$s_id = $result['staff_id'];
				$p_type = $result['payment_type'];
				$c_reason = $_POST['cancel_reason'];
				
				$query1 = mysql_query("select * from user where user_id = '$uid' ");
				$result1 = mysql_fetch_array($query1);
				
				$email = $result1['user_email'];
				
				$_SESSION['email']=$email;

				$uname = $result1['user_name'];
				$msg = "<table align='left'> 

				<tr>

					<th> Dear $uname, </th>
				
				</tr>
				
				<tr>
				
					<td> We're Sorry To Inform You That, Your Appointment For <b> $app_det </b> is Canceled...! </td> 
				
				</tr>
				
				<tr>
				
					<td> Appointment Date : <b> $app_date </b> </td>
				
				</tr>
				
				<tr>
				
					<td> Appointment ID : <b> $app_id </b> </td>
				
				</tr>
				
				<tr>
				
					<td> Appointment Time : <b> $app_time </b> </td>
				
				</tr>
				
				<tr>
				
					<td> Cancel Reason : <b> $c_reason </b>  </td>
				
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
				$mail->Subject='Appointment Canceled';
				$mail->Body=$msg;
				
				if(!$mail->send())
				{
					$_SESSION['message1'] =  "<script>alert('Message could not be sent.');</script>";
					echo "Mailer Error".$mail->ErrorInfo ;
						//header("location:appointment_list.php");
				}
				else
				{		
					$del_id=$_SESSION['cancelid'];
				
					mysql_query("insert into canceled_appointments(appointment_id, user_id, staff_id, appointment_details,cancel_reason, appointment_date, appointment_time, appointment_city, payment_type) values ('$app_id','$uid', '$s_id','$app_det','$c_reason','$app_date','$app_time','$app_city', '$p_type')");
					
					mysql_query("delete from appointment where appointment_id = '$del_id' ");
				
					$_SESSION['message1'] = "<script>alert('Appointment Canceled.') ;</script>";
				
					header("location:appointment_list.php");
				}
			}
		unset($_SESSION['cancelid']);
	}
?>