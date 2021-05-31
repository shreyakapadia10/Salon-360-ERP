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
	
		if(isset($_SESSION['message']) && $_SESSION['message']!="")
		{
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}

		if(isset($_SESSION['message1']) && $_SESSION['message1']!="")
		{
			echo $_SESSION['message1'];
			unset($_SESSION['message1']);
		}
		
		if(isset($_SESSION['add_appointment']) && $_SESSION['add_appointment']!="")
		{
			echo $_SESSION['add_appointment'];
			unset($_SESSION['add_appointment']);
		}
		
	
?>
<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
		<div class="row pt-2 pb-2">
			<div class="col-sm-9">
			<h4 class="page-title">Salon 360 ERP</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="admin_dashboard.php">Salon 360 ERP</a></li>
				<li class="breadcrumb-item"><a href="appointment_list.php">Pending Appointment List</a></li>
			</ol>
	   </div>
	   
	   <div class="col-xs-3">
       <div class="btn-group float-sm-right">
		</div>
	   </div>
	   </div>
	   
		<div class="row" >
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header" style="font-size:20px;"><i class="fa fa-table fa-lg"></i> Pending Appointment List</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th> Appointment ID </th>
										<th> User Name </th>
										<th> Appointment Details </th>
										<th> Appointment Date </th>
										<th> Appointment Time </th>
										<th> Payment Type </th>
										<th> Action </th>
									</tr>
								</thead>
							<tbody>
			
			<?php
		
				$id = $_SESSION['sid'];
		
				$query = mysql_query("select * from appointment, user, staff where appointment.user_id=user.user_id && appointment.staff_id=staff.staff_id && appointment.staff_id = '$id'");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Appointment : $cnt <br>";	
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
				
			<tr>
			
				<td> <?php echo $result['appointment_id']; ?> </td>
				<td> <?php echo $result['user_name']; ?> </td>
				<td> <?php echo $result['appointment_details']; ?> </td>
				<td> <?php echo $result['appointment_date']; ?> </td>
				<td> <?php echo $result['appointment_time']; ?> </td>
				<td> <?php echo $result['payment_type']; ?> </td>
				<td> <center> <a href = "appointment_list_process.php?confirmid=<?php echo $result['appointment_id']; ?>" style = "text-decoration:none;"> 
				<i class="zmdi zmdi-check"></i></a>&nbsp; &nbsp;
								
			<!--	<a href = "appointment_update.php?editid=<?php echo $result['appointment_id']; ?>">
				<button type="button" class="btn btn-icons btn-rounded btn-outline-primary" style = "text-decoration:none;">
                          <i class="mdi mdi-account-edit mdi-18px"></i></button></a> &nbsp;
			-->	
				<a href = "canceled_appointment.php?cancelid=<?php echo $result['appointment_id']; ?>"  onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-close"></i></a></center>
				</td>
			
			</tr>
			
			<?php
			
				}

			?>
			</tbody>
				<tfoot>
					<tr>
						<th> Appointment ID </th>
						<th> User Name </th>
						<th> Appointment Details </th>
						<th> Appointment Date </th>
						<th> Appointment Time </th>
						<th> Payment Type </th>
						<th> Action </th>
					</tr>
				</tfoot>
		</table><br>
	</div>
            <br>
		
		  </div>
		</div>
		 </div>
        </div>
      </div><!-- End Row-->
      </div><!-- End Row-->
   

    <!-- End container-fluid-->
    
    <!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
<?php

	}
	include("footer.php");
	
?>