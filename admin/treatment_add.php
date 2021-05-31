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
	
		$("#add").click(function(){
			
			var name,type,price,gender,datetimepicker;

			name = test_name("#name","#msgname");
			
			type = test_name("#type","#msgtype");
			
			price = test_num("#price","#msgprice");
			
			gender = test_drop("#gender","#msggender");

			time = test_time("#datetimepicker","#msgtime");
			
			if(name == true && type == true && price == true && gender == true && time == true)
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
		    <h4 class="page-title">Add Treatments</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="treatment.php">Treatment Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Treatment</li>
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

		  <form action = "treatment_process.php" method = "post" >

			<div class="form-group">
					  <label for="input-1">Treatment Name</label>
				  <input type="text" class="form-control form-control-rounded" id="name" placeholder="Enter Treatment Name" name = "t_name" required/>
			<span id="msgname"></span>
			</div>
						
			<div class="form-group">
					  <label for="input-2">Treatment Type</label>
				  <input type="text" class="form-control form-control-rounded" id="type" placeholder="Enter Treatment Type" name = "t_type" required/>
				  <span id="msgtype"></span>
			</div>
						
			<div class="form-group">
					  <label for="input-3">Treatment Price</label>
				  <input type="text" class="form-control form-control-rounded" id="price" placeholder="Enter Treatment Price" name = "t_price" required/>
				  <span id="msgprice"></span>
			</div>
					
			<div class="form-group">
					  <label for="basic-select">Gender</label>
							<div class="col-sm-13">
						<select class="form-control form-control-rounded" id="gender" name = "gender">
						  <option value = "Select">Select</option>
						  <option value = "Male">Male</option>
						  <option value = "Female">Female</option>
						</select>
				<span id="msggender"></span>
				</div>
				</div>
					
			<div class="form-group">
					  <label for="input-4">Treatment Estimated Time</label>
				  <input type="text" class="form-control form-control-rounded" id="datetimepicker" placeholder="Enter Estimated Time" name = "t_time" required/>
				  <span id="msgtime"></span>
			</div>
			
			<button type="submit" id = "add" class="btn btn-success btn-round waves-effect waves-light m-1" name = "add_treatment"><i class="icon-lock"></i> Add Treatment </button>
			<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"><i class="icon-refresh"></i> Reset</button>

		</form>
		
		</div>
	</div>
</div>

<?php

		include("footer.php");
	}
?>