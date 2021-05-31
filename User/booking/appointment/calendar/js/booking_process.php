<?php

	include("connection1.php");
	
	session_start();
	
	if(isset($_POST['action']) && $_POST['action']=="insert")
	{
		$uid = $_SESSION['uid'];
		$details = $_POST['detail'];
		$city = $_POST['loc'];
		$date = $_POST['timest'];
		$time = $_POST['timest'];
		$staff = $_POST['staff'];
		$payment = $_POST['payment'];
					
		if($details=="Select" || $city=="Select" || $date=="Select" || $time=="Select" ||$staff=="Select" || $payment=="Select") 
		{
			echo "Please Select Appropriate Option";
		}
		
		else
		{
			$select2 = mysql_query("select * from treatment_details where treatment_name = '$details'");
			
			$ans2 = mysql_fetch_array($select2);
			
			$amt = $ans2['treatment_price'];
			
			$insert2 = mysql_query("insert into payment_user(user_id,payment_date,payment_time,payment_details,payment_type, payment_amount) values('$uid',CURDATE(),CURTIME(),'$details','$payment','$amt')");
			
			$pay_id = mysql_insert_id();
			
			$insert1 = mysql_query("insert into appointment(user_id,appointment_details, appointment_date, appointment_time, appointment_city, payment_type, staff_id, payment_user_id) values ('$uid','$details', '$date', '$time', '$city', '$payment', '$staff','$pay_id')");
			
			if($insert1 == TRUE)
			{
				$aid = mysql_insert_id();
				
				mysql_query("update payment_user set appointment_id = '$aid' where payment_user_id = '$pay_id'");
				
				$select1 = mysql_query("select * from appointment where appointment_id = '$aid'");
				
				$ans1 = mysql_fetch_array($select1);
				
				$dt = $ans1['appointment_date'];
				
				$tm = $ans1['appointment_time'];
			
				$sid = $ans1['staff_id'];
				
				if($dt<date('Y-m-d'))
				{
					mysql_query("delete from appointment where appointment_id = '$aid' ");	
					
					mysql_query("delete from payment_user where payment_user_id = '$pay_id' ");	
						
					echo  "Please Select Appropriate Date.";
				}
				
				else
				{
					$query = mysql_query("select * from user where user_id = '$uid'");
				
					$result1 = mysql_fetch_array($query);
					
					$name = $result1['user_name'];
					
					$email = $result1['user_email'];
					
					$query2 = mysql_query("select * from staff where staff_id = '$sid'");
					
					$result2 = mysql_fetch_array($query2);
					
					$sname = $result2['staff_name'];
									
					
					$est_time = $ans2['treatment_estimated_time'];
					
					$secs = strtotime($tm)-strtotime("00:00:00");
					$result = date("H:i:s",strtotime($est_time)+$secs);

					//Appointment Table

					$select4 = mysql_query("select * from appointment where staff_id='$sid' && appointment_date='$dt' && appointment_time between '$tm' and '$result'");
					
					while($ans4 = mysql_fetch_array($select4))
					{
						if(count($ans4['appointment_id'])==1 && $ans4['appointment_id']==$aid)
						{
							//Confirm Appointment Table
							
							$select5 = mysql_query("select * from confirm_appointment where staff_id='$sid' && appointment_date='$dt' && appointment_time between '$tm' and '$result'");
							
							echo "Appointment Booked Successfully! Estimated time for your $details will be $est_time. ";
							
							$msg = "<table> 

							<tr>

								<th> Dear $name, </th>
							
							</tr>
							
							<tr>
							
								<td> Your Appointment For $details on $dt at $tm with staff $sname has been Successfully Booked. You'll receive a confirmation mail shortly. Have a nice day.!</td> 
							
							</tr>
							
							</table>";
						
							// echo $msg;
						
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
							$mail->Subject='Appointment Booked Successfully';
							$mail->Body=$msg;
							
							if($mail->send())
							{
								header("location:index.php");
								
								mysql_query("insert into notification(notification_title, notification, notification_date, notification_time) values ('Appointment Request','$name has booked appointment for $details with staff $sname.', CURDATE(), CURTIME())");
								
								echo "Message has been sent.<br>";
							}

							else
							{
								echo "Message could not be sent";
								echo "Mailer Error".$mail->ErrorInfo ;
								header("location:index.php");
							}
							
							while($ans5 = mysql_fetch_array($select5))
							{
								if(count($ans5['confirm_appointment_id'])==0)
								{
									$msg = "<table> 

									<tr>

										<th> Dear $name, </th>
									
									</tr>
									
									<tr>
									
										<td> Your Appointment For $details on $dt at $tm with staff $sname has been Successfully Booked. You'll receive a confirmation mail shortly. Have a nice day.!</td> 
									
									</tr>
									
									</table>";
								
									// echo $msg;
								
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
									$mail->Subject='Appointment Booked Successfully';
									$mail->Body=$msg;
									
									if($mail->send())
									{
										// header("location:index.php");
										echo "Message has been sent.<br>";
										
										mysql_query("insert into notification(notification_title, notification, notification_date, notification_time) values ('Appointment Request','$name has booked appointment for $details with staff $sname.', CURDATE(), CURTIME())");
									}

									else
									{
										echo "Message could not be sent";
										echo "Mailer Error".$mail->ErrorInfo ;
										// header("location:index.php");
									}
									
									echo "Appointment Booked Successfully! Estimated time for your $details will be $est_time. ";
									
									break;
								}
								
								else
								{
									mysql_query("delete from appointment where appointment_id = '$aid' ");
									
									mysql_query("delete from payment_user where payment_user_id = '$pay_id' ");	
									
									echo "Please select another time or staff,an appointment at this time and staff is already booked. Sorry for inconvenience.";
									
									break;
								}
							}
					
							//Confirm Appointment Table Over
						}
											
						else
						{
							mysql_query("delete from appointment where appointment_id = '$aid' ");
							
							echo "Please select another time or staff,an appointment at this time and staff is already booked. Sorry for inconvenience.";
							
							break;
						}
					}
				}
				//Appointment Table Over
			}
			
			else
			{
				echo "There was an error trying to book the appointment.".mysqli_error($con);
			}
		}
	}

	else
	{
		header("location:index.php");
	}
?>