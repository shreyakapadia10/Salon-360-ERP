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
		
		if(isset($_GET['editid']))
		{
			$id=$_GET['editid'];
			
			$query=mysql_query("select * from attendance where attendance_id='$id'");
			$result=mysql_fetch_array($query);
?>

<div class="col-12 grid-margin">
  <div class="card">
	<div class="card-body">
	  <h2><u>Update Attendance</h2></u>

		  <form class="forms-sample" action = "attendance_process.php" method = "post" >

			<div class="row">
				  <div class="col-md-6">
					<div class="form-group row">
					  <label class="col-sm-3 col-form-label">Staff ID</label>
					  <div class="col-sm-9">
				  <input type="text" class="form-control" id="exampleInputName1" name = "s_id" value="<?php echo $result['staff_id']; ?>" disabled>
			</div>
			</div>
			</div>
			</div>

			<div class="row">
				  <div class="col-md-6">
					<div class="form-group row">
					  <label class="col-sm-3 col-form-label">Attendance Time</label>
					  <div class="col-sm-9">
				  <input type="time" class="form-control" id="exampleInputName1" name = "a_time" value="<?php echo $result['attendance_time']; ?>" >
			</div>
			</div>
			</div>
			</div>
			
			<div class="row">
				  <div class="col-md-6">
					<div class="form-group row">
					  <label class="col-sm-3 col-form-label">Total Day Attended</label>
					  <div class="col-sm-9">
				  <input type="text" class="form-control" id="exampleInputName1" name = "t_day" value="<?php echo $result['total_day_attended']; ?>" >
			</div>
			</div>
			</div>
			</div>
			
			<div class="row">
				  <div class="col-md-6">
					<div class="form-group row">
					  <label class="col-sm-3 col-form-label">Leave Date</label>
					  <div class="col-sm-9">
				  <input type="text" class="form-control" id="exampleInputName1" name = "l_date" value="<?php echo $result['leave_date'];?>">
			</div>
			</div>
			</div>
			</div>

		<div class="row">
			  <div class="col-md-6">
				<div class="form-group row">
				  <label class="col-sm-3 col-form-label">Total Leave</label>
				  <div class="col-sm-9">
			  <input type="text" class="form-control" id="exampleInputName1" name = "t_leave" value="<?php echo $result['total_leave']; ?>">
		</div>
		</div>
		</div>
		</div>

		<div class="row">
			  <div class="col-md-6">
				<div class="form-group row">
				  <label class="col-sm-3 col-form-label">Leave Reason</label>
				  <div class="col-sm-9">
			  <input type="text" class="form-control" id="exampleInputName1" name = "l_reason" value="<?php echo $result['leave_reason']; ?>" >
		</div>
		</div>
		</div>
		</div>
		
		<input type="hidden" name="editid" value="<?php echo $result['attendance_id']; ?>">
		<input type="submit" class="btn btn-success mr-2" name = "update" value = "Update Attendance"></button>
		<button class="btn btn-danger" type = "reset">Reset</button>

		</form>
		
		</div>
	</div>
</div>


<?php
		}
		include("footer.php");
	}
?>