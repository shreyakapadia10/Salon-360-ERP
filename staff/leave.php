<?php

	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['sid']) && $_SESSION['sid']=="")
	{
		header("location:index.php");
	}
	else
	{
		if(isset($_SESSION['add3']))
		{
			echo $_SESSION['add3'];
			unset($_SESSION['add3']);
		}
		
		include("header.php");
		
?>



<div class="clearfix"></div>
	
  <div class="content-wrapper" >
    <div class="container-fluid">
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9" >
		    <h4 class="page-title">Request A Leave</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Request Leave</li>
         </ol>
	   </div>

     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
		  
		     <div class="col-lg-6">
        <div class="card">
           <div class="card-body" >
          
            <form action="leave_process.php" method="post">
           
		   <div class="form-group">
            <label for="input-1">Select Date</label>
				<input type="text" id="autoclose-datepicker" class="form-control form-control-rounded" name="date" autocomplete="off" placeholder="Select Date" required/>
			</div>
		   
		   <div class="form-group">
            <label for="input-1">Leave Reason</label>
            <input type="text"  class="form-control form-control-rounded" id="input-1" name = "l_reason" placeholder="Enter Leave Reason" required/>
           </div>
		   
		   <div class="form-group">
            <label for="input-1">Total Days</label>
            <input type="text"  class="form-control form-control-rounded" id="input-1" name = "days" placeholder="Enter Total Days For Leave" required/>
           </div>
           
            <button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name="add_leave"><i class="icon-lock"></i> Request Leave</button>
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
	<!--Date Time Picker-->
	<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>
	      $('#autoclose-datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
      });
</script>