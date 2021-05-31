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
			
			$query=mysql_query("select * from treatment_details where treatment_id='$id'");
			$result=mysql_fetch_array($query);
?>

<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Update Treatment Details</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="treatment_details.php">Treatment Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Treatment Details</li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Update Treatment Details</div> <hr>

		  <form class="forms-sample" action = "treatment_process.php" method = "post" >

			<div class="form-group">
					<label for="input-6">Treatment ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "t_id" value="<?php echo $result['treatment_id']; ?>" disabled>
			</div>
		  
			<div class="form-group">
					<label for="input-6">Treatment Name</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "t_name" value="<?php echo $result['treatment_name']; ?>">
			</div>
		  
			<div class="form-group">
					<label for="input-6">Treatment Type</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "t_type" value="<?php echo $result['treatment_type']; ?>">
			</div>
		  			
			<div class="form-group">
				<label for="input-6">Treatment Price</label>
					<input type="text" class="form-control form-control-rounded" id="input-6" name = "t_price" value="<?php echo $result['treatment_price']; ?>">
			</div>
		  					
			<div class="form-group">
				  <label>Treatment Gender</label>
					<select class="form-control form-control-rounded single-select" name = "t_gender">
							<option value = "Male" <?php if($result['treatment_gender']=="Male") { echo "selected"; } ?>>Male</option>
							<option value = "Female" <?php if($result['treatment_gender']=="Female") { echo "selected"; } ?>>Female</option>
					</select>
			</div>
			
			<div class="form-group">
				<label for="input-6">Treatment Estimated Time</label>
					<input type="text" class="form-control form-control-rounded" id="input-6" name = "t_time" value="<?php echo $result['treatment_estimated_time']; ?>">
			</div>
						
			<input type="hidden" value="<?php echo $result['treatment_id']; ?>" name="editid">
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "update" > <i class="zmdi zmdi-edit"></i> Update Treatment Details</button>
			<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"> <i class="zmdi zmdi-refresh"></i> Reset</button>

		</form>
		
		</div>
	</div>
</div>

<?php
		}
		include("footer.php");
	}
?>