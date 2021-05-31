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
	
		if(isset($_SESSION['update_supplier']) && $_SESSION['update_supplier']!="")
		{
			echo $_SESSION['update_supplier'];
			unset($_SESSION['update_supplier']);
		}

		if(isset($_SESSION['delete_supplier']) && $_SESSION['delete_supplier']!="")
		{
			echo $_SESSION['delete_supplier'];
			unset($_SESSION['delete_supplier']);
		}
		
		if(isset($_SESSION['add_supplier']) && $_SESSION['add_supplier']!="")
		{
			echo $_SESSION['add_supplier'];
			unset($_SESSION['add_supplier']);
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
				<li class="breadcrumb-item"><a href="supplier.php">Supplier Details</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Supplier Details</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered" >
								<thead>	
									<tr>
										<th> Supplier ID </th>
										<th> Supplier Name </th>
										<th> Supplier Contact </th>
										<th> Supplier Address </th>
										<th> Supplier Email </th>
										<th> Action </th>
									</tr>
								</thead>
						<tbody>	
			
			<?php
				
				if(isset($_SESSION['filesuccess']) && $_SESSION['filesuccess']!="")
				{
					echo $_SESSION['filesuccess'];
					unset($_SESSION['filesuccess']);
				}
	
				$query = mysql_query("select * from supplier");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Suppliers : $cnt <br>";	
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
				
			<tr>
			
				<td> <?php echo $result['supplier_id']; ?> </td>
				<td> <?php echo $result['supplier_name']; ?> </td>
				<td> <?php echo $result['supplier_contact']; ?> </td>
				<td> <?php echo $result['supplier_address']; ?> </td>
				<td> <?php echo $result['supplier_email']; ?> </td>
				<td><center> <a href = "supplier_update.php?editid=<?php echo $result['supplier_id']; ?>">
				<i class="zmdi zmdi-edit"></i></a> &nbsp; &nbsp;
				
				<a href = "supplier_process.php?del=<?php echo $result['supplier_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-delete"></i></a> </center>
				</td>
			
			</tr>
			
			<?php
			
				}

			?>	
			</tbody>
            
			<tfoot>
				<tr>
					<th> Supplier ID </th>
					<th> Supplier Name </th>
					<th> Supplier Contact </th>
					<th> Supplier Address </th>
					<th> Supplier Email </th>
					<th> Action </th>
				</tr>
			</tfoot>
		</table><br>
	
	</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "supplier_process.php" method = "post" enctype = "multipart/form-data">
				
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