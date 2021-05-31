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
			
			$query=mysql_query("select * from payment_supplier where payment_supplier_id='$id'");
			$result=mysql_fetch_array($query);
?>

<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Update Supplier Payment</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="payment_supplier.php">Supplier Payment</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Supplier Payment</li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Update Supplier Payment</div> <hr>
			
			<form class="forms-sample" action = "payment_supplier_process.php" method = "post" >

			<div class="form-group">
					<label for="input-6">Payment ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "pay_id" value="<?php echo $result['payment_supplier_id']; ?>" disabled>
			</div>
			
			<div class="form-group">
					<label for="input-6">Supplier ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "supplier_id" value="<?php echo $result['supplier_id']; ?>" disabled>
			</div>
		
			<div class="form-group">
					<label for="input-6">Payment Date</label>
						<input type="text" class="form-control form-control-rounded" id = "datetimepicker" name = "pay_date" value="<?php echo $result['payment_date']; ?>" >
			</div>
			
			<div class="form-group">
				<label for="input-6">Payment Time</label>
					<input type="text" class="form-control form-control-rounded" id = "datetimepicker1" name = "pay_time" class="form-control" value="<?php echo $result['payment_time']; ?>">
			</div>
				
			<div class="form-group">
					<label for="input-6">Payment Details</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "pay_details" value="<?php echo $result['payment_details']; ?>"> 
			</div>
			
			<div class="form-group">
				  <label>Payment Type</label>
					<select class="form-control form-control-rounded single-select" name="pay_type">
						<option value="COD" <?php if($result['payment_type']=="COD") { echo "selected"; } ?>>Cash On Delivery</option>
						<option value="Credit Card" <?php if($result['payment_type']=="Credit Card") { echo "selected"; } ?>>Credit Card</option>
						<option value="Debit Card" <?php if($result['payment_type']=="Debit Card") { echo "selected"; } ?>>Debit Card</option>
						<option value="Net Banking" <?php if($result['payment_type']=="Net Banking") { echo "selected"; } ?>>Net Banking</option>
					</select>
			</div>

		<div class="form-group">
					<label for="input-6">Payment Amount</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "pay_amt" value="<?php echo $result['payment_amount']; ?>">
		</div>
		
		<input type="hidden" name="editid" value="<?php echo $result['payment_supplier_id']; ?>">
		
		<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "update"> <i class="zmdi zmdi-edit"></i> Update Supplier</button>
		
		<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"><i class="zmdi zmdi-refresh"></i> Reset</button>

		</form>
		
		</div>
	</div>
</div>


<?php
		}
		include("footer.php");
	}
?>