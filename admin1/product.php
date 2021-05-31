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

		if(isset($_SESSION['add_product']) && $_SESSION['add_product']!="")
		{
			echo $_SESSION['add_product'];
			
			unset($_SESSION['add_product']);
		}
		
		if(isset($_SESSION['delete_product']) && $_SESSION['delete_product']!="")
		{
			echo $_SESSION['delete_product'];
			
			unset($_SESSION['delete_product']);
		}
		
		if(isset($_SESSION['update_product']) && $_SESSION['update_product']!="")
		{
			echo $_SESSION['update_product'];
			
			unset($_SESSION['update_product']);
		}			
?>	

<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
		<div class="row pt-2 pb-2">
			<div class="col-sm-9">
			<h4 class="page-title">Salon 360 ERP</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
				<li class="breadcrumb-item"><a href="product.php">Product Details</a></li>
			</ol>
	   </div>
	   
	   <div class="col-xs-3">
       <div class="btn-group float-sm-right">
		 </div>
	   </div>
	   </div>
	   
		<div class="row" >
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Product Details</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered" >
								<thead>
									<tr>
										<th> Product ID </th>
										<th> Purchase ID </th>
										<th> Supplier Name </th>
										<th> Product Name </th>
										<th> Product Type </th>
										<th> Product Total Quantity </th>
										<th> Product Current Quantity Available </th>
										<th> Product Price </th>
										<th> Product Purchase Date </th>
										<th> Product Purchase Time </th>
										<th> Payment Type </th>
										<th> Action </th>				
									</tr>
							</thead>
						<tbody>
			<?php
			
				$query = mysql_query("select * from product,supplier where product.supplier_id=supplier.supplier_id");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Product : $cnt <br>";			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				<td> <?php echo $result['product_id']; ?> </td>
				<td> <?php echo $result['purchase_id']; ?> </td>
				<td> <?php echo $result['supplier_name']; ?> </td>
				<td> <?php echo $result['product_name']; ?> </td>
				<td> <?php echo $result['product_type']; ?> </td>
				<td> <?php echo $result['product_total_quantity']; ?> </td>
				<td> <?php echo $result['product_current_quantity']; ?> </td>
				<td> <?php echo $result['product_price']; ?> </td>
				<td> <?php echo $result['product_purchase_date']; ?> </td>
				<td> <?php echo $result['product_purchase_time']; ?> </td>
				<td> <?php echo $result['payment_type']; ?> </td>
				<td> <center> <a href = "product_update.php?editid=<?php echo $result['product_id']; ?>">
				<i class="zmdi zmdi-edit"></i></a>&nbsp; &nbsp;
				
				<a href = "product_process.php?del=<?php echo $result['product_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-delete"></i></a></center>
				</td>
				
			</tr>

			<?php
			
				}
				
			?>
			
			
			</tbody>
            
			<tfoot>
				<tr>
					<th> Product ID </th>
					<th> Purchase ID </th>
					<th> Supplier Name </th>
					<th> Product Name </th>
					<th> Product Type </th>
					<th> Product Total Quantity </th>
					<th> Product Current Quantity Available </th>
					<th> Product Price </th>
					<th> Product Purchase Date </th>
					<th> Product Purchase Time </th>
					<th> Payment Type </th>
					<th> Action </th>				
				</tr>
			</tfoot>

			</table><br>
			</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "product_process.php" method = "post" enctype = "multipart/form-data">
				
				<input type="file" class="custom-file-input" id="inputGroupFile04" name = "file1">
				
                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                  </div>
				  
                  <div class="input-group-append">
                    <input class="btn btn-white" type="submit" name = "upload" value = "Upload"> </button>
					
                  </div>
				  </form>
                </div>
			</div>
		  </div>
		</div>
		 </div>
        </div>
      </div><!-- End Row-->
    </div>
    </div>
    </div>
    </div>

    <!-- End container-fluid-->
    
    <!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
<?php	
	
	}
	include("footer.php");
?>