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
		
		if(isset($_SESSION['delete_purchase']) && $_SESSION['delete_purchase']!="")
		{
			echo $_SESSION['delete_purchase'];
			unset($_SESSION['delete_purchase']);
		}
			
		if(isset($_SESSION['add_purchase']) && $_SESSION['add_purchase']!="")
		{
			echo $_SESSION['add_purchase'];
			unset($_SESSION['add_purchase']);
		}

		if(isset($_SESSION['update_purchase']) && $_SESSION['update_purchase']!="")
		{
			echo $_SESSION['update_purchase'];
			unset($_SESSION['update_purchase']);
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
				<li class="breadcrumb-item"><a href="purchase.php">Purchased Items Detail</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Purchased Items</div>
						<div class="card-body">
								&nbsp;&nbsp;<a href="report_purchase.php"><Button type="submit" name="report" class="btn btn-primary waves-effect waves-light m-1">Get Report</button></a><br>
								<div class="table-responsive">
									<table id="example" class="table table-bordered" >
								<thead>
									<tr>
										<th> Purchase ID </th>
										<th> Admin Name </th>
										<th> Supplier Name </th>
										<th> Purchase Item Name </th>
										<th> Purchase Item Price </th>
										<th> Purchase Item Type </th>
										<th> Quantity </th>
										<th> Purchase Date </th>
										<th> Purchase Time </th>
										<th> Payment Type </th>
										<th> Payment Status </th>
										<th> Action </th>
										
									</tr>
								</thead>
						<tbody>	
			
			<?php
			
				$query = mysql_query("select * from purchase,supplier,admin where purchase.supplier_id=supplier.supplier_id  ");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Purchased Product : $cnt <br>";			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				<td> <?php echo $result['purchase_id']; ?> </td>
				<td> <?php echo $result['admin_name']; ?> </td>
				<td> <?php echo $result['supplier_name']; ?> </td>
				<td> <?php echo $result['purchase_item_name']; ?> </td>
				<td> <?php echo $result['purchase_item_price']; ?> </td>
				<td> <?php echo $result['purchase_item_type']; ?> </td>
				<td> <?php echo $result['purchase_item_quantity']; ?> </td>
				<td> <?php echo $result['purchase_date']; ?> </td>
				<td> <?php echo $result['purchase_time']; ?> </td>
				<td> <?php echo $result['payment_type']; ?> </td>
				<td> <?php echo $result['payment_status']; ?> </td>
				<td colspan="2"> <center> <a href = "purchase_update.php?editid=<?php echo $result['purchase_id']; ?>"> 
				<i class="zmdi zmdi-edit"></i></a>&nbsp; &nbsp;
				
				<a href = "purchase_process.php?del=<?php echo $result['purchase_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-delete"></i></a></center>
				</td>
				
			</tr>

			<?php
			
				}
				
			?>
			</tbody>
            
			<tfoot>
		
				<tr>
					<th> Purchase ID </th>
					<th> Admin Name </th>
					<th> Supplier Name </th>
					<th> Purchase Item Name </th>
					<th> Purchase Item Price </th>
					<th> Purchase Item Type </th>
					<th> Quantity </th>
					<th> Purchase Date </th>
					<th> Purchase Time </th>
					<th> Payment Type </th>
					<th> Payment Status </th>
					<th> Action </th>
				</tr>
			</tfoot>
		</table><br>
	
	</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "purchase_process.php" method = "post" enctype = "multipart/form-data">
				
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