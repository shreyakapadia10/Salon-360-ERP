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
	
	if(isset($_SESSION['update_msg']) && $_SESSION['update_msg']!="")
	{
		echo $_SESSION['update_msg'];
		unset($_SESSION['update_msg']);	
	}

?>
<div class="clearfix"></div>
	
  <div class="content-wrapper" >
    <div class="container-fluid" >
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9" >
		    <h4 class="page-title">Salon 360 ERP</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="confirm_appointment_list.php">Confirm appointment</a></li>
            <li class="breadcrumb-item"><a href="">Confirm Appointment Report</a></li>
         </ol>
	   </div>
	  
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
		  <div class="card">
		  <br>
		  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		 
		   <div id="dateragne-picker" >
                 <div class="input-daterange input-group" style="width:60%;margin-left:20%">
                  <input type="text" class="form-control" name="start" placeholder="Enter Start Date" autocomplete="off"/>
                  <div class="input-group-prepend">
                   <span class="input-group-text">to</span>
                  </div>
                  <input type="text" class="form-control" name="end" placeholder="Enter End Date" autocomplete="off"/>
			&nbsp; &nbsp; &nbsp;<button type="submit" name="submit" class="btn btn-primary waves-effect waves-light m-1">Submit</button>
                 </div>
               </div>
			
		  <br><br>
		  </form>
		  
		  <?php if(isset($_POST['submit']) && isset($_POST['submit'])!="")
				{
					$start=strtotime($_POST['start']);
					$start1 = date('y-m-d',$start);
					$end=strtotime($_POST['end']);
					 $end1 = date('y-m-d',$end);
					$query=mysql_query("select * from confirm_appointment, user, staff where appointment_date between '$start1' and '$end1' && confirm_appointment.user_id=user.user_id && confirm_appointment.staff_id=staff.staff_id ");
			?>
			<div class="table-responsive">
							<table id="example" class="table table-bordered" >
								<thead>
									<tr>
										<th> Appointment ID </th>
										<th> User Name </th>
										<th> Staff Name </th>
										<th> Appointment Details </th>
										<th> Appointment Date </th>
										<th> Appointment Time </th>
										<th> Payment Type </th>

									</tr>
								</thead>
						<tbody>	
			
			<?php			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				
				<td> <?php echo $result['appointment_id']; ?> </td>
				<td> <?php echo $result['user_name']; ?> </td>
				<td> <?php echo $result['staff_name']; ?> </td>
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
					<th> Staff Name </th>
					<th> Appointment Details </th>
					<th> Appointment Date </th>
					<th> Appointment Time </th>
					<th> Payment Type </th>
				</tr>
			</tfoot>
		</table><br>
	
	</div>
			<?php
				}
			?>		
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

<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script>
 $('#dateragne-picker .input-daterange').datepicker({
       });
 

</script>