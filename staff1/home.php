<?php
	
	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['sid']) && $_SESSION['sid']=="")
	{
		header("location:index.php");
	}
	else
	{
		include("header.php");
		
			// Notifications
		
	$today = date('Y-m-d');
	
	$select = mysql_query("select * from appointment a, staff s, user u where a.staff_id = s.staff_id && a.user_id=u.user_id && a.appointment_date='$today'");
	
	$cnt = mysql_num_rows($select);

	while($ans = mysql_fetch_array($select))
	{
		$aid = $ans['appointment_id'];
		
		$time = $ans['appointment_time'];
		
		$app = $ans['appointment_details'];
		
		$sid = $ans['staff_id'];
		
		$uid = $ans['user_id'];
		
		$name = $ans['user_name'];

		$sname = $ans['staff_name'];
		
		$email = $ans['staff_email'];
		
		$select1 = mysql_query("select * from notification_staff where appointment_id = '$aid'");

		$cnt1 = mysql_num_rows($select1);

		if($cnt1==0)
		{
			$msg = "<table> 

					<tr>

						<th> Dear $sname, </th>
					
					</tr>
					
					<tr>
					
						<td> You Have Appointment Today At $time for $app with user $name.  </td> 
					
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
					$mail->Subject='Appoinment Reminder';
					$mail->Body=$msg;
					
					echo $msg;
					
					if($mail->send())
					{
						$insert = mysql_query("insert into notification_staff(staff_id, user_id,appointment_id, notification_title, notification, notification_date, notification_time) values ('$sid','$uid','$aid', 'Appoinment Reminder', 'You Have Appointment Today At $time for $app with user $name.', CURDATE(), CURTIME())");
						
						mysql_query("update notification_staff set notification_status = 'Yes' where staff_id ='$sid'");
						
						header("location:home.php");
						
						echo "Message has been sent.<br>";
					}

					else
					{
						echo "Message could not be sent";
						echo "Mailer Error".$mail->ErrorInfo ;
						header("location:home.php");
					}
		}

		else
		{
			while($ans1 = mysql_fetch_array($select1))
			{
				if($ans1['notification_status']=='Yes')
				{
				}
				
				else
				{
					$msg = "<table> 

					<tr>

						<th> Dear $sname, </th>
					
					</tr>
					
					<tr>
					
						<td> You Have Appointment Today At $time for $app with user $name.  </td> 
					
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
					$mail->Subject='Appoinment Reminder';
					$mail->Body=$msg;
					
					echo $msg;
					
					if($mail->send())
					{
						$insert = mysql_query("insert into notification_staff(staff_id ,user_id, appointment_id, notification_title, notification, notification_date, notification_time) values ('$sid','$uid','$aid', 'Appoinment Reminder', 'You Have Appointment Today At $time for $app with user $name.', CURDATE(), CURTIME())");
						
						mysql_query("update notification_staff set notification_status = 'Yes' where staff_id ='$sid'");
						
						header("location:home.php");
						
						echo "Message has been sent.<br>";
					}

					else
					{
						echo "Message could not be sent";
						echo "Mailer Error".$mail->ErrorInfo ;
						header("location:home.php");
					}
				}
			}
		}
	}
	
		
	if(isset($_SESSION['update_msg']) && $_SESSION['update_msg']!="")
	{
		echo $_SESSION['update_msg'];
		unset($_SESSION['update_msg']);	
	}

	$today = date('Y-m-d');
	
	$select = mysql_query("select * from confirm_appointment a, staff s, user u where a.staff_id = s.staff_id && a.user_id=u.user_id && a.appointment_date='$today'");
	
	$cnt = mysql_num_rows($select);

	while($ans = mysql_fetch_array($select))
	{
		$aid = $ans['appointment_id'];
		
		$time = $ans['appointment_time'];
		
		$app = $ans['appointment_details'];
		
		$sid = $ans['staff_id'];
		
		$uid = $ans['user_id'];
		
		$name = $ans['user_name'];

		$sname = $ans['staff_name'];
		
		$email = $ans['staff_email'];
		
		$select1 = mysql_query("select * from notification_staff where appointment_id = '$aid'");

		$cnt1 = mysql_num_rows($select1);

		if($cnt1==0)
		{
			$msg = "<table> 

					<tr>

						<th> Dear $sname, </th>
					
					</tr>
					
					<tr>
					
						<td> You Have Appointment Today At $time for $app with user $name.  </td> 
					
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
					$mail->Subject='Appoinment Reminder';
					$mail->Body=$msg;
					
					echo $msg;
					
					if($mail->send())
					{
						$insert = mysql_query("insert into notification_staff(staff_id, user_id,appointment_id, notification_title, notification, notification_date, notification_time) values ('$sid','$uid','$aid', 'Appoinment Reminder', 'You Have Appointment Today At $time for $app with user $name.', CURDATE(), CURTIME())");
						
						mysql_query("update notification_staff set notification_status = 'Yes' where staff_id ='$sid'");
						
						header("location:home.php");
						
						echo "Message has been sent.<br>";
					}

					else
					{
						echo "Message could not be sent";
						echo "Mailer Error".$mail->ErrorInfo ;
						header("location:home.php");
					}
		}

		else
		{
			while($ans1 = mysql_fetch_array($select1))
			{
				if($ans1['notification_status']=='Yes')
				{
				}
				
				else
				{
					$msg = "<table> 

					<tr>

						<th> Dear $sname, </th>
					
					</tr>
					
					<tr>
					
						<td> You Have Appointment Today At $time for $app with user $name.  </td> 
					
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
					$mail->Subject='Appoinment Reminder';
					$mail->Body=$msg;
					
					echo $msg;
					
					if($mail->send())
					{
						$insert = mysql_query("insert into notification_staff(staff_id ,user_id, appointment_id, notification_title, notification, notification_date, notification_time) values ('$sid','$uid','$aid', 'Appoinment Reminder', 'You Have Appointment Today At $time for $app with user $name.', CURDATE(), CURTIME())");
						
						mysql_query("update notification_staff set notification_status = 'Yes' where staff_id ='$sid'");
						
						header("location:home.php");
						
						echo "Message has been sent.<br>";
					}

					else
					{
						echo "Message could not be sent";
						echo "Mailer Error".$mail->ErrorInfo ;
						header("location:home.php");
					}
				}
			}
		}
	}
	
	


?>
<div class="clearfix"></div>
	
  <div class="content-wrapper" >
    <div class="container-fluid" >
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9" >
		    <h4 class="page-title">Home</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <button type="button" class="btn btn-light waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
        <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <div class="dropdown-menu">
          <a href="javaScript:void();" class="dropdown-item">Action</a>
          <a href="javaScript:void();" class="dropdown-item">Another action</a>
          <a href="javaScript:void();" class="dropdown-item">Something else here</a>
          <div class="dropdown-divider"></div>
          <a href="javaScript:void();" class="dropdown-item">Separated link</a>
        </div>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
		  <div style="height:600px"> <!--Please remove the height before using this page-->
		      <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
		  </div>
        </div>
      </div>

    </div>
    <!-- End container-fluid-->

   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<?php
	
		include("footer.php");
	}
	?>