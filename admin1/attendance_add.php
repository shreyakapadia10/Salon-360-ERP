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

?>
<div class="clearfix"></div>
	
  <div class="content-wrapper" >
    <div class="container-fluid" >
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9" >
		    <h4 class="page-title">Add Attendance</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="attendance.php">Attendance Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Attendance</li>
         </ol>
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
	     <div class="col-lg-6">
			<div class="card">
				<div class="card-body" >
				<form action = "attendance_process.php" method = "post" >

			<div class="form-group">
            <label for="input-1">Staff Name</label>

				<?php
					
					$tbl_name="staff";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='staff_id' class='form-control form-control-rounded' id='basic-select' required/>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['staff_id'] ."'>" . $row['staff_name']."</option>";
					}
					
					echo "</select>";
				?>
			
			</div>
			
			<div class="form-group">
            <label for="input-2">Total Day Attended</label>
				  <input type="text" class="form-control form-control-rounded" id="input-2" placeholder="Enter Total Day Attended" name = "t_day" required/>
			</div>
			
			<div class="form-group">
            <label for="input-3">Total Leave</label>
				  <input type="text" class="form-control form-control-rounded" id="input-3" placeholder="Enter Total Leave" name = "t_leave" required/>
			</div>
			
			<div class="form-group">
            <label for="input-4">Leave Reason</label>
				  <input type="text" class="form-control form-control-rounded" id="input-4" placeholder="Enter Leave Reason" name = "l_reason">
			</div>
			
			<div class="form-group">
            <label for="input-4">Leave Date</label>
				  <input type="text" class="form-control form-control-rounded" id="datetimepicker" placeholder="Enter Leave Date" name = "datetime">
			</div>
				
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "add_attendance" ><i class="icon-lock"></i> Add Attendance</button>
			<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"><i class="icon-refresh"></i> Reset</button>

		</form>
		
		</div>
	</div>
</div>


<?php

		include("footer.php");
	}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="jquery.datetimepicker.full.js"></script>
<script>

	$("#datetimepicker").datetimepicker();
	$("#datetimepicker1").datetimepicker();

</script>