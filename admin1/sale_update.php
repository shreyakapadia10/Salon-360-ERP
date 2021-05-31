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
		
			$query=mysql_query("select * from sale where sale_id='$id'");
			$result=mysql_fetch_array($query);

?>
<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Update Sold Product</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="sale.php">Sales</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Sale</li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Update Sold Product</div> <hr>

		  <form class="forms-sample" action = "sale_process.php" method = "post" >
			
			<div class="form-group">
					<label for="input-6">Sale ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "sale_id" value="<?php echo $result['sale_id'];?>" disabled>
			</div>
			
			<div class="form-group">
					<label for="input-6">User ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "user_id" value="<?php echo $result['user_id']; ?>" disabled>
			</div>
			
			<div class="form-group">
					<label for="input-6">Address ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "add_id" value="<?php echo $result['address_id']; ?>" disabled>
			</div>
			
			<div class="form-group">
					<label for="input-6">Payment ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "pay_id" value="<?php echo $result['payment_id'];?>" disabled>
			</div>
			
			<div class="form-group">
					<label for="input-6">Product ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "product_id" value="<?php echo $result['product_id'];?>" disabled> 
			</div>
			
			<div class="form-group">
					<label for="input-6">Sold Item Name</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "sale_name" value="<?php echo $result['sale_item_name'];?>"> 
			</div>
				
			<div class="form-group">
					<label for="input-6">Sold Item Quantity</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "sale_quantity" value="<?php echo $result['sale_item_quantity'];?>"> 
			</div>
					
			<div class="form-group">
					<label for="input-6">Sold Item Price</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "sale_price" value="<?php echo $result['sale_item_price'];?>"> 
			</div>
		
			<div class="form-group">
					<label for="input-6">Sold Item Date</label>
						<input type="text" class="form-control form-control-rounded" id = "datetimepicker" name="date" class="form-control" value="<?php echo $result['sale_date'];?>">
			</div>
			
			<div class="form-group">
				<label for="input-6">Sold Item Time</label>
					<input type="text" class="form-control form-control-rounded" id = "datetimepicker1" name="time" class="form-control" value="<?php echo $result['sale_time'];?>">
			</div>
			
			<div class="form-group">
					<label for="input-6">Sold Item Type</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "sale_type" value="<?php echo $result['sale_item_type'];?>"> 
			</div>
				
			<div class="form-group">
				  <label>Payment Type</label>
					<select class="form-control form-control-rounded single-select" name="pay_type">
						<option value="COD" <?php if($result['pay_type']=="COD") { echo "selected"; } ?>>Cash On Delivery</option>
						<option value="Credit Card" <?php if($result['pay_type']=="Credit Card") { echo "selected"; } ?>>Credit Card</option>
						<option value="Debit Card" <?php if($result['pay_type']=="Debit Card") { echo "selected"; } ?>>Debit Card</option>
						<option value="Net Banking" <?php if($result['pay_type']=="Net Banking") { echo "selected"; } ?>>Net Banking</option>
					</select>
			</div>
		
			<input type="hidden" name="editid" value="<?php echo $result['sale_id'];?>">
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "update"> <i class="zmdi zmdi-edit"></i> Update Sold Product</button>
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