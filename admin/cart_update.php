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
			
			$query=mysql_query("select * from cart where cart_id='$id'");
			$result=mysql_fetch_array($query);
?>

<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Update Cart</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Cart</li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Update Cart</div> <hr>

			<form class="forms-sample" action = "cart_process.php" method = "post" >
			
			
			<div class="form-group">
					<label for="input-6">Cart ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" value="<?php  echo $result['cart_id'];?>" disabled>
			</div>
			
			<div class="form-group">
					<label for="input-6">Product Name</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" value="<?php echo $result['p_name']; ?>" disabled>
			</div>
			
			<div class="form-group">
				  <label>Order Status</label>
					<select class="form-control form-control-rounded single-select" name="order_status">
					
							<option value="On The Way" <?php if($result['order_status']=="On The Way") { echo "selected"; } ?>>On The Way</option>
							<option value="Delivered" <?php if($result['order_status']=="Delivered") { echo "selected"; } ?>>Delivered</option>
							<option value="Canceled" <?php if($result['order_status']=="Canceled") { echo "selected"; } ?>>Canceled</option>
							<option value="Shipped" <?php if($result['order_status']=="Shipped") { echo "selected"; } ?>>Shipped</option>
						</select>
		</div>
		
		<input type="hidden" name="uid" value="<?php echo $result['user_id']; ?>">
		<input type="hidden" name="editid" value="<?php echo $result['cart_id']; ?>">
		<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "update"> <i class="zmdi zmdi-edit"></i> Update Cart</button>
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