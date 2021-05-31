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
				<li class="breadcrumb-item"><a href="confirm_appointment_list.php">Confirmed Appointment List</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Confirmed Appointment List</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered">
								<thead>
									<tr>
										<th> Appointment ID </th>
										<th> User Name </th>
										<th> Staff Name </th>
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
	
				$query = mysql_query("select * from confirm_appointment, user, staff where confirm_appointment.user_id=user.user_id && confirm_appointment.staff_id=staff.staff_id");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Appointments : $cnt <br>";	
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
				
			<tr>
			
				<td> <?php echo $result['appointment_id']; ?> </td>
				<td> <?php echo $result['user_name']; ?> </td>
				<td> <?php echo $result['staff_name']; ?> </td>
				<td> <?php echo $result['appointment_date']; ?> </td>
				<td> <?php echo $result['appointment_time']; ?> </td>
				<td> <?php echo $result['payment_type']; ?> </td>
			<?php
			
				}

			?>
				</tbody>
				
					<tfoot>
						<tr>
							<th> Appointment ID </th>
							<th> User Name </th>
							<th> Staff Name </th>
							<th> Appointment Date </th>
							<th> Appointment Time </th>
							<th> Payment Type </th>
						</tr>
				</tfoot>
			</table><br>
	</div>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "post" enctype = "multipart/form-data">
				
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
						
					$import = "insert into confirm_appointment(confirm_appointment_id,appointment_id, user_id, staff_id, appointment_details, appointment_date, appointment_time, appointment_city, payment_type) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6', '$item7', '$item8', '$item9')";
						
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
	
		include("footer.php");
	}
?>