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

		if(isset($_SESSION['add_cart']) && $_SESSION['add_cart']!="")
		{
			echo $_SESSION['add_cart'];
			
			unset($_SESSION['add_cart']);
		}
		
		if(isset($_SESSION['delete_cart']) && $_SESSION['delete_cart']!="")
		{
			echo ($_SESSION['delete_cart']);
			
			unset($_SESSION['delete_cart']);
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
				<li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Cart</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered" >
								<thead>
									<tr>
										<th> Cart ID </th>
										<th> Product Name </th>
										<th> User Name </th>
										<th> Price </th>
										<th> Quantity </th>
										<th> Date </th>
										<th> Total Amount </th>
										<th> Order Status </th>
										<th> Payment Type </th>
										<th> Action </th>
									</tr>
								</thead>
						<tbody>	
			
			<?php
			
				$query = mysql_query("select * from cart c,user u where c.user_id=u.user_id");
				
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Cart Items : $cnt <br>";			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				<td> <?php echo $result['cart_id']; ?> </td>
				<td> <?php echo $result['p_name']; ?> </td>
				<td> <?php echo $result['user_name']; ?> </td>
				<td> <?php echo $result['p_price']; ?> </td>
				<td> <?php echo $result['quantity']; ?> </td>
				<td> <?php echo $result['date']; ?> </td>
				<td> <?php echo $result['total_amount']; ?> </td>
				<td> <?php echo $result['order_status']; ?> </td>
				<td> <?php echo $result['payment_type']; ?> </td>
				<td colspan="2"> <center> 
				<a href = "cart_update.php?editid=<?php echo $result['cart_id']; ?>"><i class="zmdi zmdi-edit"></i></a>
				&nbsp; &nbsp;
				<a href = "cart_process.php?del=<?php echo $result['cart_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-delete"></i></a></center>
				</td>
				
			</tr>

			<?php
			
				}
				
			?>
			</tbody>
            
			<tfoot>
				<tr>
					<th> Cart ID </th>
					<th> Product Name </th>
					<th> User Name </th>
					<th> Price </th>
					<th> Quantity </th>
					<th> Date </th>
					<th> Total Amount </th>
					<th> Order Status </th>
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