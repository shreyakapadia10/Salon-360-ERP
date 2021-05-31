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
	
		$("#add_supplier1").click(function(){
			
			var name,contact,add,email;

			name = test_name("#name","#msgname");

			contact = test_no("#contact","#msgcontact");

			add = test_add("#add","#msgadd");
			
			email = test_email("#email","#msgemail");

			if(name == true && contact == true && add == true && email == true)
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
		    <h4 class="page-title">Add Supplier</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="supplier.php">Supplier Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Supplier</li>
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

		  <form action = "supplier_process.php" method = "post" >

			<div class="form-group">
					  <label for="input-1">Supplier Name</label>
				  <input type="text" class="form-control form-control-rounded" id="name" placeholder="Enter Supplier Name" name = "supplier_name" required/>
			<span id="msgname"></span>
			</div>
			
			<div class="form-group">
					  <label for="input-2">Supplier Contact</label>
				  <input type="tel" minlength = "10" maxlength = "10" class="form-control form-control-rounded" id="contact" placeholder="Enter Supplier Contact" name = "supplier_contact" pattern = "[0-9]{10}" required/>
				  <span id="msgcontact"></span>
			</div>
			
			<div class="form-group">
					  <label for="input-4">Supplier Address</label>
				  <input type="text" class="form-control form-control-rounded" id="add" placeholder="Enter Supplier Address" name = "supplier_add" required/> 
				  <span id="msgadd"></span>
			</div>
			
			<div class="form-group">
					  <label for="input-3">Supplier Email ID</label>
				  <input type="email" class="form-control form-control-rounded" id="email" placeholder="Enter Supplier Email-ID" name = "supplier_email" required/>
				  <span id="msgemail"></span>
			</div>
				
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "add_supplier" id = "add_supplier1"><i class="icon-lock"></i> Add Supplier</button>
			<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset">
			<i class="icon-refresh"></i> Reset</button>

		</form>
		
		</div>
	</div>
</div>


<?php

		include("footer.php");
	}
?>