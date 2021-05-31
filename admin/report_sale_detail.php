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
	
	if(isset($_SESSION['update_msg']) && $_SESSION['update_msg']!="")
	{
		echo $_SESSION['update_msg'];
		unset($_SESSION['update_msg']);	
	}

?>
<div class="clearfix"></div>
	
  <div class="content-wrapper" >
    <div class="container-fluid" >
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9" >
		    <h4 class="page-title">Home</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="sale_details.php">Sale Detail</a></li>
            <li class="breadcrumb-item"><a href="report_sale_detail.php">Sale Report</a></li>
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
		  <div class="card">
		  
		  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		 
		   <div id="dateragne-picker" >
                 <div class="input-daterange input-group" style="width:60%;margin-left:20%">
                  <input type="text" class="form-control" name="start" placeholder="Enter Start Date" autocomplete="off"/>
                  <div class="input-group-prepend">
                   <span class="input-group-text">to</span>
                  </div>
                  <input type="text" class="form-control" name="end" placeholder="Enter End Date" autocomplete="off"/>
			&nbsp; &nbsp; &nbsp;<button type="submit" name="submit" class="btn btn-primary waves-effect waves-light m-1">Submit</button>
                 </div>
               </div>
			
		  
		  </form>
		  
		  <?php if(isset($_POST['submit']) && isset($_POST['submit'])!="")
				{
					$start=strtotime($_POST['start']);
					$start1 = date('y-m-d',$start);
					$end=strtotime($_POST['end']);
					 $end1 = date('y-m-d',$end);
					$query=mysql_query("select * from sale_detail where sale_date between '$start1' and '$end1'");
			?>
			<div class="table-responsive">
									<table id="example" class="table table-bordered" >
								<thead>
									<tr>
										<th> Sale Detail ID </th>
										<th> Sale ID </th>
										<th> Sale Item Name </th>
										<th> Quantity </th>
										<th> Price </th>
										<th> Type </th>
										<th> Date </th>
										<th> Time </th>
										<th> Order Status </th>
									</tr>
								</thead>
						<tbody>	
			
			<?php			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				<td> <?php echo $result['sale_detail_id']; ?> </td>
				<td> <?php echo $result['sale_id']; ?> </td>
				<td> <?php echo $result['sale_item_name']; ?> </td>
				<td> <?php echo $result['sale_item_quantity']; ?> </td>
				<td> <?php echo $result['sale_item_price']; ?> </td>
				<td> <?php echo $result['sale_item_type']; ?> </td>
				<td> <?php echo $result['sale_date']; ?> </td>
				<td> <?php echo $result['sale_time']; ?> </td>
				<td> <?php echo $result['order_status']; ?> </td>				
			</tr>

			<?php
			
				}
				
			?>
			</tbody>
            
			<tfoot>
				<tr>
					<th> Sale Detail ID </th>
					<th> Sale ID </th>
					<th> Sale Item Name </th>
					<th> Quantity </th>
					<th> Price </th>
					<th> Type </th>
					<th> Date </th>
					<th> Time </th>
					<th> Order Status </th>
				</tr>
			</tfoot>
		</table><br>
	
	</div>
			<?php
				}
			?>		
		 </div>
        </div>
      </div>

    </div>
    <!-- End container-fluid-->

   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<?php
	
		include("footer.php");
	}
	?>

<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script>
 $('#dateragne-picker .input-daterange').datepicker({
       });
 

</script>