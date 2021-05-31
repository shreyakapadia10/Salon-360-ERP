<?php

	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['sid']) && $_SESSION['sid']=="")
	{
		header("location:index.php");
	}
	
	else
	{
		include("header.php");
		
		if(isset($_SESSION['update_msg']) && $_SESSION['update_msg']!="")
		{
			echo $_SESSION['update_msg'];
			unset($_SESSION['update_msg']);	
		}
		
		if(isset($_SESSION['update_msg1']) && $_SESSION['update_msg1']!="")
		{
			echo $_SESSION['update_msg1'];
			unset($_SESSION['update_msg1']);	
		}
?>

<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Change Password</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Change Password</div> <hr>

		  <form class="forms-sample" action = "staff_pass_change_process.php" method = "post">

			<div class="form-group">
					<label for="input-6">Current Password</label>
						<input type="password" class="form-control form-control-rounded" id="input-6" name="curr_pass" id="password" placeholder="Enter Current Password" autocomplete="off" required/>
			</div>

			<div class="form-group">
					<label for="input-6">New Password</label>
						<input type="password" class="form-control form-control-rounded" id="input-6" name="new_pass" id="password" placeholder="Enter New Password" autocomplete="off" minlength="8"  required/>
			</div>

			<div class="form-group">
					<label for="input-6">Re-Type Password</label>
						<input type="password" class="form-control form-control-rounded" id="input-6" name="confirm_pass" placeholder="Reenter New Password" autocomplete="off"  minlength="8" required/>
			</div>

			<input type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name="change_pass"value = "Change Password"></button>
			
		<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset">Reset</button>
		</form>
		
		</div>
	</div>
</div>


<?php

		include("footer.php");
	}
?>