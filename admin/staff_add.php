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
	
	if(isset($_SESSION['dup_email']) && $_SESSION['dup_email']!="")
	{
		echo $_SESSION['dup_email'];
		unset($_SESSION['dup_email']);
	}

?>
<div class="clearfix"></div>
	
  <div class="content-wrapper" >
    <div class="container-fluid" >
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9" >
		    <h4 class="page-title">Add Staff</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="staff.php">Staff Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Staff</li>
         </ol>
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->
	
<div class="row">
       <div class="col-lg-12">
	     <div class="col-lg-6">
			<div class="card">
				<div class="card-body" >

			<form action = "staff_process.php" method = "post" >
			
				<div class="form-group">
					  <label for="input-1">Staff Name</label>
						<input type="text" class="form-control form-control-rounded" id="input-1" placeholder="Enter Staff Name" name = "s_name" required/> 
				</div>
				
				<div class="form-group">
					  <label for="basic-select">Gender</label>
							<div class="col-sm-13">
						<select class="form-control form-control-rounded" id="basic-select" name = "s_gender">
						  <option value = "Male">Male</option>
						  <option value = "Female">Female</option>
						</select>
				</div>
				</div>
				
				<div class="form-group">
					  <label for="input-2">Staff Address</label>
						<input type="text" class="form-control form-control-rounded" id="input-2" placeholder="Enter Staff Address" name = "s_add" required/> 
				</div>
				
				<div class="form-group">
					  <label for="input-3">Staff Contact No</label>
						<input type="tel" class="form-control form-control-rounded" id="input-3" placeholder="Enter Contact Number" minlength = "10" maxlength = "10" name = "s_contact" pattern = "[0-9]{10}" required/>
				</div>
			
			<div class="form-group">
					<label for="input-4">Staff DOB</label>
							<input type = "text"  class="form-control form-control-rounded" id="datetimepicker" placeholder="Enter Date of Birth" name="datetime" required/>
			</div>
			
				
			<div class="form-group">
					<label for="input-5">Staff Email-ID</label>
					<input type="email" class="form-control form-control-rounded" id="input-5" placeholder="Enter Email-ID" name = "s_email" required/> 
			</div>
			
			<div class="form-group">
					<label for="input-6">Staff Salary</label>
						<input type="num" class="form-control form-control-rounded" id="input-6" placeholder="Enter Salary"  name = "s_salary" required/>
			</div>
				
			<div class="form-group">
					<label for="input-7">Staff Commission</label>
						<input type="num" class="form-control form-control-rounded" id="input-7" placeholder="Enter Commission"  name = "s_commission" required/> 
			</div>
				
			<div class="form-group">
					<label for="input-8">Staff Specialization</label>
					<input type="text" class="form-control form-control-rounded" id="input-8" placeholder="Enter Staff Specialization" name = "s_specialization" required/>
			</div>
				
			<div class="form-group">
					<label for="input-9">Total Customer Handled</label>
						<input type="text" class="form-control form-control-rounded" id="input-9" placeholder="Enter Customer Handled" name = "s_customer" required/>
			</div>
				
		<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "add_staff"><i class="icon-lock"></i> Add Staff</button>
		
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