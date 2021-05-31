<?php
	
	session_start();
	
	include("header.php");
	
	include("connection1.php");

	if(!isset($_SESSION['sid']) && $_SESSION['sid']=="")
	{
		header("location:index.php");
	}
	
	else
	{		
		if(isset($_SESSION['msg']) && $_SESSION['msg']!="")
		{
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		$id = $_SESSION['sid'];
			
		$query = mysql_query("select * from staff where staff_id = '$id'");
				
		while($details = mysql_fetch_array($query))		
		{
?>
<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Staff Details</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="staff_profile.php">Staff Details</a></li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Staff Details</div> <hr>
				<table id="example" class="table table-bordered" cellspacing="0" width="100%">
								<thead>
		<tr>
							
			<div class="form-group">		
			
				<img src = "pics/<?php echo $details['staff_pic']; ?>" width = "100" height = "150">
				
			</div>
			
			
		</tr>	
			
		<tr>
							
			<div class="form-group">		
					<input type="text" name = "aid" class="form-control form-control-rounded"  value = "<?php echo $details['staff_id']; ?>" disabled>
					</div>
			</tr>	
			
		<tr>
							
			<div class="form-group">		
	
				<input type="text" name = "name" class="form-control form-control-rounded"  value = "<?php echo $details['staff_name']; ?>" disabled>
			</div>
			
		</tr>
	
		<tr>
							
			<div class="form-group">		
					<input type="text" name = "add" class="form-control form-control-rounded"  value = "<?php echo $details['staff_address']; ?>" disabled>
			</div>
			
		</tr>
	
		<tr>
							
			<div class="form-group">		
					<input type="tel" name = "contact" class="form-control form-control-rounded"  value = "<?php echo $details['staff_contact']; ?>" minlength = "10" maxlength = "10" disabled>
			</div>
		</tr>
				
		<tr>
							
			<div class="form-group">		
					<input type="email" name = "email" class="form-control form-control-rounded"  value = "<?php echo $details['staff_email']; ?>" disabled>
			</div>
		</tr>

	
		<?php
		
			}
			
		?>
		
		</table>
		
		<center><font size = "4">
	
	
		<a href = "staff_profile_update.php">Update Profile</a> </center> </font></a>
	
	</div>

	</div>
	
</div>  
			  
</div>
</div>

<?php

		include("footer.php");
	}
?>