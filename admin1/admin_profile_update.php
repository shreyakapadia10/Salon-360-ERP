<?php

	session_start();

	include("header.php");
	
	include("connection1.php");

	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}

	else
	{
		$id = $_SESSION['adminid'];

		$query = mysql_query("select * from admin where admin_id = '$id'");
		
		while($details = mysql_fetch_array($query))		
		{
?>
<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Update Profile</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="admin_profile.php">My Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Update Profile</div> <hr>

		<form method = "post" action = "admin_profile_process.php" enctype = "multipart/form-data">		
										
				<div class="form-group">
				<label for="input-1">Admin Profile Picture</label>
						<br><img src = "pics/<?php echo $details['admin_pic']; ?>" width = "150px" height = "230"> </img> 
				 <div class="input-group mb-3">
					  <div class="custom-file">
					  <br> <input type="file" class=" form-control custom-file-input" id="inputGroupFile02" name="img">
						<label class="custom-file-label" for="inputGroupFile02">Choose file</label>
					  </div>
					 <div class="input-group-append">
						<button class="btn btn-white" type="submit">Upload</button>
					</div>
					</div>
				</div>
					
				<div class="form-group">
					<label for="input-6">Admin ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "aid" value = "<?php echo $details['admin_id']; ?>" disabled>
				</div>
				
				<div class="form-group">
					<label for="input-6">Admin Name</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "name" value = "<?php echo $details['admin_name']; ?>" >
				</div>
					
				<div class="form-group">
					<label for="input-6">Admin Address</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "add" value = "<?php echo $details['admin_address']; ?>" >
				</div>
				
				<div class="form-group">
					<label for="input-6">Admin Contact</label>
						<input type="tel" class="form-control form-control-rounded" id="input-6" name = "contact" value = "<?php echo $details['admin_contact']; ?>" minlength = "10" maxlength = "10" >
				</div>
				
				<div class="form-group">
					<label for="input-6">Admin Email-ID</label>
						<input type="email" class="form-control form-control-rounded" id="input-6" name = "email" value = "<?php echo $details['admin_email']; ?>" >
				</div>
						
				<?php
				
					}
					
				?>
				
				<input type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "update" value = "Update Profile"></button>
				
				<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"> Reset</button>
				
            </form><br>
		 <font color = "white"> * Note : You can upload image upto 2 MB </font>
			
			</div>

			</div>

		</div>  
					  
        </div>
      </div>
	  
	  
<?php

		include("footer.php");
	}
?> 