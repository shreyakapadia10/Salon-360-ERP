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
		
		if(isset($_GET['editid']))
		{
			$id=$_GET['editid'];
			
			$query=mysql_query("select * from confirm_appointment c,user u where confirm_appointment_id='$id' && c.user_id=u.user_id");
			$result=mysql_fetch_array($query);
?>

<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Update Appointment Status</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="confirm_appointment_list.php">Confirm Appointment</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Appointment Status</li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Update Appointment Status</div> <hr>

			<form class="forms-sample" action = "status_update_process.php" method = "post" >
			
			
			<div class="form-group">
					<label for="input-6">Appointment ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" value="<?php  echo $result['confirm_appointment_id'];?>" disabled>
			</div>
			
			<div class="form-group">
					<label for="input-6">User Name</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" value="<?php echo $result['user_name']; ?>" disabled>
			</div>
			
			<div class="form-group">
				  <label>Service Status</label>
					<select class="form-control form-control-rounded single-select" name="status">
					
							<option value="started" <?php if($result['appointment_status']=="started") { echo "selected"; } ?>>Started</option>
							<option value="in execution" <?php if($result['appointment_status']=="in execution") { echo "selected"; } ?>>In Execution</option>
							<option value="complete" <?php if($result['appointment_status']=="complete") { echo "selected"; } ?>>Complete</option>
							
						</select>
		</div>
		
		<input type="hidden" name="editid" value="<?php echo $result['confirm_appointment_id']; ?>">
		<input type="hidden" name="uid" value="<?php echo $result['user_id']; ?>">
		<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "update"> <i class="zmdi zmdi-edit"></i> Update</button>
		<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"> <i class="zmdi zmdi-refresh"></i> Reset</button>
	
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