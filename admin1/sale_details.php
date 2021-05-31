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

		if(isset($_SESSION['add_sale']) && $_SESSION['add_sale']!="")
		{
			echo "<script>alert('Sale Added Successfully') ;</script>";
			
			unset($_SESSION['add_sale']);
		}
		
		if(isset($_SESSION['delete_sale']) && $_SESSION['delete_sale']!="")
		{
			echo ($_SESSION['delete_sale']);
			
			unset($_SESSION['delete_sale']);
		}
		
		if(isset($_SESSION['update_sale']) && $_SESSION['update_sale']!="")
		{
			echo ($_SESSION['update_sale']);
			
			unset($_SESSION['update_sale']);
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
				<li class="breadcrumb-item"><a href="sale_detail.php">Sale Detail</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Sale Detail</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered" >
								<thead>
									<tr>
										<th> Sale Detail ID </th>
										<th> Product ID </th>
										<th> User Name </th>
										<th> Payment ID </th>
										<th> Sale Item Name </th>
										<th> Quantity </th>
										<th> Price </th>
										<th> Type </th>
										<th> Date </th>
										<th> Time </th>
										<th> Payment Type </th>
										<th> Order Status </th>
										<th> Action </th>

									</tr>
								</thead>
						<tbody>	
			
			<?php
			
				$query = mysql_query("select * from sale_detail, user where sale_detail.user_id=user.user_id");
				
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Sale Items : $cnt <br>";			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				<td> <?php echo $result['sale_detail_id']; ?> </td>
				<td> <?php echo $result['product_id']; ?> </td>
				<td> <?php echo $result['user_name']; ?> </td>
				<td> <?php echo $result['payment_id']; ?> </td>
				<td> <?php echo $result['sale_item_name']; ?> </td>
				<td> <?php echo $result['sale_item_quantity']; ?> </td>
				<td> <?php echo $result['sale_item_price']; ?> </td>
				<td> <?php echo $result['sale_item_type']; ?> </td>
				<td> <?php echo $result['sale_date']; ?> </td>
				<td> <?php echo $result['sale_time']; ?> </td>
				<td> <?php echo $result['payment_type']; ?> </td>
				<td> <?php echo $result['order_status']; ?> </td>
				<td colspan="2"> <center> <a href = "sale_detail_update.php?editid=<?php echo $result['sale_detail_id']; ?>"> <i class="zmdi zmdi-edit"></i></a>&nbsp; &nbsp;
				
				<a href = "sale_detail_process.php?del=<?php echo $result['sale_detail_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-delete"></i></a></center>
				</td>
				
			</tr>

			<?php
			
				}
				
			?>
			</tbody>
            
			<tfoot>
				<tr>
					<th> Sale Detail ID </th>
					<th> Product ID </th>
					<th> User Name </th>
					<th> Payment ID </th>
					<th> Sale Item Name </th>
					<th> Quantity </th>
					<th> Price </th>
					<th> Type </th>
					<th> Date </th>
					<th> Time </th>
					<th> Payment Type </th>
					<th> Order Status </th>
					<th> Action </th>
				</tr>
			</tfoot>
		</table><br>
	
	</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "sale_detail_process.php" method = "post" enctype = "multipart/form-data">
				
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

		include("footer.php");
	}
?>