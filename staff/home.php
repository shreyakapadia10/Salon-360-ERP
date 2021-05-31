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
	
	$date=date('Y-m-d');
	
	if(isset($_SESSION['update_msg']) && $_SESSION['update_msg']!="")
	{
		echo $_SESSION['update_msg'];
		unset($_SESSION['update_msg']);	
	}
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
		if(isset($_SESSION['attend']) && $_SESSION['attend']!="")
		{
			echo $_SESSION['attend'];
			unset($_SESSION['attend']);
		}
		if(isset($_SESSION['msg']) && $_SESSION['msg']!="")
		{
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		if(isset($_SESSION['attend1']) && $_SESSION['attend1']!="")
		{
			echo $_SESSION['attend1'];
			unset($_SESSION['attend1']);
		}
		if(isset($_SESSION['add']) && $_SESSION['add']!="")
		{
			echo $_SESSION['add'];
			unset($_SESSION['add']);
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
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->
     <div class="row" >
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header" style="font-size:20px;"><i class="fa fa-table fa-lg"></i> Today's Appointment List</div>
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
									</tr>
								</thead>
							<tbody>
			
			<?php
		
				$id = $_SESSION['sid'];
				
				$date=date('Y-m-d');
		
				$query = mysql_query("select * from confirm_appointment, user, staff where confirm_appointment.user_id=user.user_id && confirm_appointment.staff_id=staff.staff_id && confirm_appointment.staff_id = '$id' && appointment_date='$date'");
				
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
					</tr>
				</tfoot>
		</table><br>
	</div>
            <br>
		
		  </div>
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