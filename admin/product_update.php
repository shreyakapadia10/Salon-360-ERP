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
		
			$query=mysql_query("select * from product p,purchase pu,supplier s where product_id='$id' && p.purchase_id=pu.purchase_id && p.supplier_id=s.supplier_id");
			$result=mysql_fetch_array($query);
?>
<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Update Product</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="product.php">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Product</li>
         </ol>
	   </div>
   </div>
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Update Product</div> <hr>
				<form class="forms-sample" action = "product_process.php" method = "post" enctype = "multipart/form-data">

			    <div class="form-group">
					<label for="input-6">Product ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "product_id" value="<?php echo $result['product_id'];?>" disabled>
				</div>
					
				<div class="form-group">
					<label for="input-6">Purchased Item</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "purchase_id" value="<?php echo $result['purchase_item_name'];?>" disabled>
				</div>
					
				<div class="form-group">
					<label for="input-6">Supplier Name</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "supplier_id" value="<?php echo $result['supplier_name'];?>" disabled>
				</div>
			
				<div class="form-group">
					<label for="input-6">Product Name</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "product_name" value="<?php echo $result['product_name'];?>">
				</div>
					
				<div class="form-group">
					<label for="input-6">Product Type</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "product_type" value="<?php echo $result['product_type'];?>">
				</div>
			
				<div class="form-group">
					<label for="input-6">Product Total Quantity</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "product_quantity" value="<?php echo $result['product_total_quantity'];?>">
				</div>
			
				<div class="form-group">
					<label for="input-6">Product Price</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "product_price" value="<?php echo $result['product_price'];?>">
				</div>
			
				<div class="form-group">
					<label for="input-6">Product Purchase Date</label>
						<input type="text" class="form-control form-control-rounded" id = "datetimepicker" name="date" class="form-control" value="<?php echo $result['product_purchase_date'];?>">
				</div>
			
				<div class="form-group">
					<label for="input-6">Product Purchase Time</label>
						<input type="text" class="form-control form-control-rounded" id = "datetimepicker1" name="time" class="form-control" value="<?php echo $result['product_purchase_time'];?>">
				</div>
			
			
				<div class="form-group">
            <label for="input-1">Product Pics</label>
			 <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class=" form-control custom-file-input" id="pic" name="p_pics">
                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
				  <span id="msgpic"></span>
			</div>
			<input type = "hidden" name = "editid" value = "<?php echo $result['product_id'] ?>">
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "update"> <i class="zmdi zmdi-edit"></i> Update Product</button>
			<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"> <i class="zmdi zmdi-refresh"></i> Reset</button>

		</form>
		
		</div>
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