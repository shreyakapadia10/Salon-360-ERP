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
	
		$("#add_address1").click(function(){
			
			var name,contact,email,city,address1,address2,uid,pincode;

			name = test_name("#a_name1","#msgname");

			contact = test_no("#contact","#msgcontact");

			// pincode = test_pincode("#pincode","#msgpincode");

			address1 = test_add("#add1","#msgaddress1");

			address2 = test_add("#add2","#msgaddress2");

			email = test_email("#email","#msgemail");

			city = test_name("#city","#msgcity");

			uid = test_drop("#uid","#msguid");
						
			if(name == true && contact == true && address1 == true && address2 == true && email == true && city == true && uid == true )
			{
				return true;
				
			}
			else
			{
				//alert("hi......");
				return false;
			}
		});
	
	});
</script>

<div class="clearfix"></div>
	
  <div class="content-wrapper" >
    <div class="container-fluid">
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9" >
		    <h4 class="page-title">Add Address</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="address.php">Address Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Address</li>
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
          
            <form action="address_process.php" method="post">
           
		   <div class="form-group">
            <label for="input-1">User Name</label>

				<?php
					
					$tbl_name="user";
					
					$sql="select * from $tbl_name";

					$result=mysql_query($sql);

					echo "<select id = 'uid' name='user_id' class='form-control form-control-rounded'  required/>";
					
					echo "<option value='Select'>".Select."</option>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['user_id'] ."'>" . $row['user_name']."</option>";
					}
					
					echo "</select>";
				?>
				<span id="msguid"></span>
			</div>
		   
		   <div class="form-group">
            <label for="input-1">Address Name</label>
            <input type="text" id = "a_name1" class="form-control form-control-rounded" id="input-1" name = "a_name" placeholder="Enter Address Name" required/><span id="msgname"></span>
           </div>
           
		   <div class="form-group">
            <label for="input-2">Pincode</label>
            <input type="tel" id = "pincode" minlength = "6" maxlength = "6" pattern = "[0-9]{6}"  class="form-control form-control-rounded" name = "a_code" placeholder="Enter Pincode" required/>
			<span id="msgpincode"></span>
           </div>
           
		   <div class="form-group">
            <label for="input-3">Address Line 1</label>
            <input type="text" id = "add1" class="form-control form-control-rounded" id="input-3" placeholder="Enter Address" name = "a_line1" required/>
			<span id="msgaddress1"></span>
           </div>
           
		   <div class="form-group">
            <label for="input-4">Address Line 2</label>
            <input type="text" id = "add2" class="form-control form-control-rounded" id="input-4" placeholder="Enter Address" name = "a_line2" required/>
           <span id="msgaddress2"></span>
		   </div>
           
		   <div class="form-group">
            <label for="input-5">Contact No</label>
            <input type="tel" id = "contact" minlength = "10" maxlength = "10" pattern = "[0-9]{10}" class="form-control form-control-rounded" id="input-5" name = "a_contact" placeholder="Enter Contact" required/>
			<span id="msgcontact"></span>
           </div>
           
		   <div class="form-group">
            <label for="input-6">Email</label>
            <input type="email" id = "email" class="form-control form-control-rounded" id="input-6" name = "a_email" placeholder="Enter Email" required/>
			<span id="msgemail"></span>
           </div>
		   
		   <div class="form-group">
            <label for="input-7">City</label>
			<input type="text" id = "city" class="form-control form-control-rounded" id="input-7" name = "a_city" placeholder="Enter City" required/>
			<span id="msgcity"></span>
           </div>
		   
            <button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" id = "add_address1"  name="add_address"><i class="icon-lock"></i> Add Address</button>
			<button type="reset" class="btn btn-danger btn-round waves-effect waves-light m-1"><i class="icon-refresh"></i> Reset</button>
			
          
          </form>
        
         </div>
      </div>
    </div>
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