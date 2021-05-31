<?php 

	include("connection1.php");

	session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
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
				<li class="breadcrumb-item"><a href="canceled_appointment_list.php">Canceled Appointment List</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Canceled Appointment List</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered">
								<thead>
									<tr>
										<th> Cancel ID </th>
										<th> User Name </th>
										<th> Staff Name </th>
										<th> Cancel Reason </th>
										<th> Appointment Date </th>
										<th> Appointment Time </th>
										<th> Payment Type </th>
									</tr>
								</thead>
								<tbody>
								
			<?php
				
				if(isset($_SESSION['filesuccess']) && $_SESSION['filesuccess']!="")
				{
					echo $_SESSION['filesuccess'];
					unset($_SESSION['filesuccess']);
				}
	
				$query = mysql_query("select * from canceled_appointments, user, staff where canceled_appointments.user_id=user.user_id && canceled_appointments.staff_id=staff.staff_id");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Appointment : $cnt <br>";	
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
				
			<tr>
			
				<td> <?php echo $result['appointment_cancel_id']; ?> </td>
				<td> <?php echo $result['user_name']; ?> </td>
				<td> <?php echo $result['staff_name']; ?> </td>
				<td> <?php echo $result['cancel_reason']; ?> </td>
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
							<th> Cancel ID </th>
							<th> User Name </th>
							<th> Staff Name </th>
							<th> Cancel Reason </th>
							<th> Appointment Date </th>
							<th> Appointment Time </th>
							<th> Payment Type </th>
						</tr>
					</tfoot>
			</table><br>
	</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "appointment_cancel_process.php" method = "post" enctype = "multipart/form-data">
				
				<input type="file" class="custom-file-input" id="inputGroupFile04" name = "file1">
				
                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                  </div>
				  
                  <div class="input-group-append">
                    <input class="btn btn-white" type="submit" name = "upload" value = "Upload"> </button>
					
                  </div>
				  </form>
                </div>
			</div>
		  </div>
		</div>
		 </div>
        </div>
      </div><!-- End Row-->
    </div>
    </div>
    </div>
    </div>

    <!-- End container-fluid-->
    
    <!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
<?php

	}
	include("footer.php");
	
?>