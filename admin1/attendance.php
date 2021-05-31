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
	
		if(isset($_SESSION['add_attendance']) && $_SESSION['add_attendance']!="")
		{
			echo $_SESSION['add_attendance'];
			unset($_SESSION['add_attendance']);
		}
		
		if(isset($_SESSION['update']) && $_SESSION['update']!="")
		{
			echo $_SESSION['update'];
			unset($_SESSION['update']);
		}
		
		if(isset($_SESSION['delete']) && $_SESSION['delete']!="")
		{
			echo $_SESSION['delete'];
			unset($_SESSION['delete']);
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
				<li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
				<li class="breadcrumb-item"><a href="attendance.php">Attendance Details</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Attendance Details</div>
						<div class="card-body">
							 
								<div class="table-responsive">
									<table id="example" class="table table-bordered" >
								<thead>	           
									<tr>
										<th> Attendance ID </th>
										<th> Staff Name </th>
										<th> Attendance Time </th>
										<th> Total Day Attended </th>
										<th> Total Leave Taken</th>
										<th> Leave Reason </th>
										<th> Leave Date </th>
										<th> Action </th>
									</tr>
								</thead>
						<tbody>	
			<?php
				
				if(isset($_SESSION['filesuccess']) && $_SESSION['filesuccess']!="")
				{
					echo $_SESSION['filesuccess'];
					unset($_SESSION['filesuccess']);
				}
	
				$query = mysql_query("select * from attendance, staff where attendance.staff_id=staff.staff_id");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Attendance : $cnt <br>";	
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
				
			<tr>
			
				<td> <?php echo $result['attendance_id']; ?> </td>
				<td> <?php echo $result['staff_name']; ?> </td>
				<td> <?php echo $result['attendance_time']; ?> </td>
				<td> <?php echo $result['total_day_attended']; ?> </td>
				<td> <?php echo $result['total_leave']; ?> </td>
				<td> <?php echo $result['leave_reason']; ?> </td>
				<td> <?php echo $result['leave_date']; ?> </td>
				<td> <center><!-- <a href = "attendance_update.php?editid=<?php echo $result['attendance_id']; ?>">
				<i class="zmdi zmdi-edit"></i></a>&nbsp; &nbsp;
						  -->
				<a href = "attendance_process.php?del=<?php echo $result['attendance_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-delete"></i></a></center>
				</td>
			
			</tr>
			
			<?php
			
				}

			?>
			
			</tbody>
            
			<tfoot>
			
			<tr>
				<th> Attendance ID </th>
				<th> Staff Name </th>
				<th> Attendance Time </th>
				<th> Total Day Attended </th>
				<th> Total Leave Taken</th>
				<th> Leave Reason </th>
				<th> Leave Date </th>
				<th> Action </th>
			</tr>
			
			</tfoot>
		</table><br>
	
	</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "attendance_process.php" method = "post" enctype = "multipart/form-data">
				
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

		include("footer.php");
	}
?>