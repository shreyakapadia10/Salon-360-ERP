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
			
			$query=mysql_query("select * from staff where staff_id='$id'");
			$result=mysql_fetch_array($query);
?>

<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Update Staff</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="staff.php">Staff</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Staff</li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Update Staff</div> <hr>

			<form class="forms-sample" action = "staff_process.php" method = "post" >

			<div class="form-group">
					<label for="input-6">Staff ID</label>
						<input type="text" class="form-control form-control-rounded" name = "s_id" value="<?php echo $result['staff_id']; ?>" disabled> 
			</div>

			<div class="form-group">
					<label for="input-6">Staff Name</label>
						<input type="text" class="form-control form-control-rounded" name = "s_name" value="<?php echo $result['staff_name']; ?>"> 
			</div>

			<div class="form-group">
				  <label>Staff Gender</label>
					<select class="form-control form-control-rounded single-select" name = "s_gender">
							<option value = "Male" <?php if($result['staff_gender']=="Male") { echo "selected"; } ?>>Male</option>
							<option value = "Female" <?php if($result['staff_gender']=="Female") { echo "selected"; } ?>>Female</option>
					</select>
			</div>
				
			<div class="form-group">
					<label for="input-6">Staff Address</label>
						<input type="text" class="form-control form-control-rounded" name = "s_add" value="<?php echo $result['staff_address']; ?>"> 
			</div>

			<div class="form-group">
					<label for="input-6">Staff Contact No</label>
						<input type="tel" class="form-control form-control-rounded" minlength = "10" maxlength = "10" name = "s_contact" pattern = "[0-9]{10}" value="<?php echo $result['staff_contact']; ?>">
			</div>
			
			<div class="form-group">
					<label for="input-6">Staff DOB</label>
						<input type="text" class="form-control form-control-rounded" id = "datetimepicker" name = "s_dob" value="<?php echo $result['staff_dob']; ?>"> 
			</div>

			<div class="form-group">
				<label for="input-6">Staff Email-ID</label>
					<input type="email" class="form-control form-control-rounded" name = "s_email" value="<?php echo $result['staff_email']; ?>"> 
			</div>

			<div class="form-group">
				<label for="input-6">Staff Salary</label>
					<input type="text" class="form-control form-control-rounded" name = "s_salary" value="<?php echo $result['staff_salary']; ?>">
			</div>
			
			<div class="form-group">
				<label for="input-6">Staff Commission</label>
					<input type="text" class="form-control form-control-rounded" name = "s_commission" value="<?php echo $result['staff_commission']; ?>"> 
			</div>
			
			<div class="form-group">
				<label for="input-6">Staff Specialization</label>
					<input type="text" class="form-control form-control-rounded" name = "s_specialization" 
					value="<?php echo $result['staff_specialization']; ?>">
			</div>
			
			<div class="form-group">
				<label for="input-6">Total Customer Handled</label>
					<input type="text" class="form-control form-control-rounded" name = "s_customer" value="<?php echo $result['staff_cus_handled']; ?>">
			</div>
			
			<input type="hidden" value="<?php echo $result['staff_id']; ?>" name="editid">
		
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "update" value = "Update staff">Update Staff</button>
		
			<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset">Reset</button>
		  </form>
		</div>
	</div>
</div>
</div>
</div>
</div>

<?php
		}
		include("footer.php");
	}
?>