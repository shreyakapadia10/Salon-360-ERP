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
<script type="text/javascript" src="jquery-1.10.2.js">
</script>
<script type="text/javascript" src="validate.js"></script>
<script>
		
	$("document").ready(function(){
	
		$("#add_s").click(function(){
			
			var name,gender,add,contact,dob, email, sal, comm, spec, cust;

			name = test_name("#name","#msgname");
			
			gender = test_drop("#gender","#msggender");
			
			add = test_add("#add","#msgadd");
			
			contact = test_no("#contact","#msgcontact");

			email = test_email("#email","#msgemail");

			sal = test_num("#sal","#msgsal");

			comm = test_num("#comm","#msgcomm");
			
			spec = test_name("#spec","#msgspec");

			cust = test_num("#cust","#msgcust");

			if(name == true && gender == true && add == true && contact == true && email == true && sal == true && comm == true && spec == true && cust == true)
			{
				return true;
				
			}
			else
			{
				return false;
			}
		});
	
	});
</script>

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

			<form action = "staff_process.php" method = "post" >
			
				<div class="form-group">
					  <label for="input-1">Staff Name</label>
						<input type="text" class="form-control form-control-rounded" id="name" placeholder="Enter Staff Name" name = "s_name" required/> 
				<span id="msgname"></span>
				</div>
				
				<div class="form-group">
					  <label for="basic-select">Gender</label>
							<div class="col-sm-13">
						<select class="form-control form-control-rounded" id="gender" name = "s_gender">
						  <option value = "Select">Select</option>
						  <option value = "Male">Male</option>
						  <option value = "Female">Female</option>
						</select>
						<span id="msggender"></span>
				</div>
				</div>
				
				<div class="form-group">
					  <label for="input-2">Staff Address</label>
						<input type="text" class="form-control form-control-rounded" id="add" placeholder="Enter Staff Address" name = "s_add" required/> 
				<span id="msgadd"></span>
				</div>
				
				<div class="form-group">
					  <label for="input-3">Staff Contact No</label>
						<input type="tel" class="form-control form-control-rounded" id="contact" placeholder="Enter Contact Number" minlength = "10" maxlength = "10" name = "s_contact" pattern = "[0-9]{10}" required/>
				<span id="msgcontact"></span>
				</div>
			
			<div class="form-group">
					<label for="input-4">Staff DOB</label>
							<input type = "text"  class="form-control form-control-rounded" id="datetimepicker" placeholder="Enter Date of Birth" name="datetime" required/>
			</div>
			
				
			<div class="form-group">
					<label for="input-5">Staff Email-ID</label>
					<input type="email" class="form-control form-control-rounded" id="email" placeholder="Enter Email-ID" name = "s_email" required/> 
					<span id="msgemail"></span>
			</div>
			
			<div class="form-group">
					<label for="input-6">Staff Salary</label>
						<input type="num" class="form-control form-control-rounded" id="sal" placeholder="Enter Salary"  name = "s_salary" required/>
						<span id="msgsal"></span>
			</div>
				
			<div class="form-group">
					<label for="input-7">Staff Commission</label>
						<input type="num" class="form-control form-control-rounded" id="comm" placeholder="Enter Commission"  name = "s_commission" required/> 
			<span id="msgcomm"></span>
			</div>
				
			<div class="form-group">
					<label for="input-8">Staff Specialization</label>
					<input type="text" class="form-control form-control-rounded" id="spec" placeholder="Enter Staff Specialization" name = "s_specialization" required/>
					<span id="msgspec"></span>
			</div>
				
			<div class="form-group">
					<label for="input-9">Total Customer Handled</label>
						<input type="text" class="form-control form-control-rounded" id="cust" placeholder="Enter Customer Handled" name = "s_customer" required/>
						<span id="msgcust"></span>
			</div>
				
		<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "add_staff" id = "add_s"><i class="icon-lock"></i> Add Staff</button>
		
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