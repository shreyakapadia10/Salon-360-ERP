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
<div class="clearfix"></div>
	
  <div class="content-wrapper" >
    <div class="container-fluid" >
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9" >
		    <h4 class="page-title">Add Sale Detail</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="sale_details.php">Sale Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Sale Details</li>
         </ol>
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

		  <form action = "sale_detail_process.php" method = "post" >
			
				<div class="form-group">
					  <label for="input-1">Sale Name</label>
						<?php
						
					$tbl_name="sale";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='sale_id' class='form-control form-control-rounded' id='basic-select' required/>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['sale_id'] ."'>" . $row['sale_item_name']."</option>";
					}
					
					echo "</select>";
				?>
		
				</div>
			
			<div class="form-group">
					  <label for="input-2">User Name</label>
						<?php
						
					$tbl_name="user";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='user_id' class='form-control form-control-rounded' id='basic-select' required/>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['user_id'] ."'>" . $row['user_name']."</option>";
					}
					
					echo "</select>";
				?>
		
			</div>
				
				<div class="form-group">
					  <label for="input-3">User's Payment Name</label>
				  <?php
						
					$tbl_name="payment_user, user";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='pay_id' class='form-control form-control-rounded' id='basic-select' required/>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['payment_user_id'] ."'>" . $row['user_name']."</option>";
					}
					
					echo "</select>";
				?>
		
				</div>
	
			<div class="form-group">
				<label for="input-4">Product Name</label>
				 <?php
						
					$tbl_name="product";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='product_id' class='form-control form-control-rounded' id='basic-select' required/>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['product_id'] ."'>" . $row['product_name']."</option>";
					}
					
					echo "</select>";
				?>
		
			</div>
	
			<div class="form-group">
				<label for="input-5">Address Name</label>
				 <?php
						
					$tbl_name="address";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='add_id' class='form-control form-control-rounded' id='basic-select' required/>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['address_id'] ."'>" . $row['address_name']."</option>";
					}
					
					echo "</select>";
				?>
		
			</div>
	
			<div class="form-group">
				<label for="input-6">Sold Item Name</label>
				  <input type="text" class="form-control form-control-rounded" id="input-6" placeholder="Enter Sold Item Name"  name = "sale_name" required/> 
			</div>
	
			<div class="form-group">
				<label for="input-7">Sold Item Quantity</label>
				  <input type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Sold Item Quantity"  name = "sale_quantity" required/> 
			</div>
	
			<div class="form-group">
				<label for="input-8">Sold Item Price</label>
				  <input type="text" class="form-control form-control-rounded" id="input-8" placeholder="Enter Sold Item Price"  name = "sale_price" required/> 
			</div>
	
			<div class="form-group">
				<label for="input-9">Sold Item Type</label>
				  <input type="text" class="form-control form-control-rounded" id="input-9" placeholder="Enter Sold Item Type"  name = "sale_type" required/> 
			</div>

		
		<div class="form-group">
				  <label for="basic-select">Payment Type</label>
					<div class="col-sm-13">
				  <select class="form-control form-control-rounded" id="basic-select" name="pay_type">
							<option value="COD">Cash On Delivery</option>
							<option value="Credit Card">Credit Card</option>
							<option value="Debit Card">Debit Card</option>
							<option value="Net Banking">Net Banking</option>
						</select>
		</div>
		</div>
		
		<div class="form-group">
					  <label for="basic-select">Order Status</label>
						<select class="form-control form-control-rounded" id="basic-select" name="order_status">
							<option value="On The Way">On The Way</option>
							<option value="Delivered">Delivered</option>
							<option value="Canceled">Canceled</option>
							<option value="Shipped">Shipped</option>
						</select>
		</div>
				
		<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "add_sale" ><i class="icon-lock"></i> Add Sold Product</button>
		<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"><i class="icon-refresh"></i> Reset</button>
	
		</div>	
	</form>

	</div>
	</div>
	</div>
	</div>
<?php

		include("footer.php");
	}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="jquery.datetimepicker.full.js"></script>
<script>

	$("#datetimepicker").datetimepicker();

</script>