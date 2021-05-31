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
			echo $id;
			
			$query=mysql_query("select * from supplier where supplier_id='$id'");
			$result=mysql_fetch_array($query);
?>

<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Update Supplier</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="supplier.php">Supplier</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Supplier</li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Update Supplier</div> <hr>

			<form class="forms-sample" action = "supplier_process.php" method = "post" >

			<div class="form-group">
					<label for="input-6">Supplier ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "sup_id" value="<?php echo $result['supplier_id']; ?>" disabled>
			</div>
			
			<div class="form-group">
					<label for="input-6">Supplier Name</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "sup_name" value="<?php echo $result['supplier_name']; ?>" >
			</div>
			
			<div class="form-group">
					<label for="input-6">Supplier Contact</label>
						<input type="tel" class="form-control form-control-rounded" id="input-6" name = "sup_contact" pattern = "[0-9]{10}" value="<?php echo $result['supplier_contact']; ?>" minlength = "10" maxlength = "10" >
			</div>
			
			<div class="form-group">
					<label for="input-6">Supplier Address</label>
						<input type="text" class="form-control form-control-rounded" id="input-6"  name = "sup_add" value="<?php echo $result['supplier_address']; ?>" >
			</div>
			
			<div class="form-group">
					<label for="input-6">Supplier Email-ID</label>
						<input type="email" class="form-control form-control-rounded" id="input-6"  name = "sup_email" value="<?php echo $result['supplier_email']; ?>">
			</div>
			
			<input type="hidden" name="editid" value="<?php echo $result['supplier_id']; ?>">
			
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "update" > <i class="zmdi zmdi-edit"></i> Update Supplier</button>
			
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