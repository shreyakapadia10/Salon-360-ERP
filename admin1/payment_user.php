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

		if(isset($_SESSION['add_payment']) && $_SESSION['add_payment']!="")
		{
			echo $_SESSION['add_payment'];
			
			unset($_SESSION['add_payment']);
		}
		
		if(isset($_SESSION['delete']) && $_SESSION['delete']!="")
		{
			echo $_SESSION['delete'];
			
			unset($_SESSION['delete']);
		}
		
		if(isset($_SESSION['update']) && $_SESSION['update']!="")
		{
			echo $_SESSION['update'];
			
			unset($_SESSION['update']);
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
				<li class="breadcrumb-item"><a href="payment_user.php">User Payment Details</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> User Payment Details</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered" >
								<thead>
									<tr>
										<th> User Payment ID </th>
										<th> User Name </th>
										<th> Date </th>
										<th> Time </th>
										<th> Payment Details </th>
										<th> Payment Type </th>
										<th> Amount </th>
										<th> Action </th>
									</tr>
								</thead>
						<tbody>	
			
			<?php
			
				$query = mysql_query("select * from payment_user, user where payment_user.user_id = user.user_id");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Payment_user : $cnt <br>";			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				<td> <?php echo $result['payment_user_id']; ?> </td>
				<td> <?php echo $result['user_name']; ?> </td>
				<td> <?php echo $result['payment_date']; ?> </td>
				<td> <?php echo $result['payment_time']; ?> </td>
				<td> <?php echo $result['payment_details']; ?> </td>
				<td> <?php echo $result['payment_type']; ?> </td>
				<td> <?php echo $result['payment_amount']; ?> </td>
				<td> <center> <a href = "payment_user_update.php?editid=<?php echo $result['payment_user_id']; ?>"> 
					<i class="zmdi zmdi-edit"></i></a>&nbsp; &nbsp;
				<a href = "payment_user_process.php?del=<?php echo $result['payment_user_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-delete"></i></a></center>
				</td>
				
			</tr>

			<?php
			
				}
				
			?>
			
			</tbody>
            
			<tfoot>
				<tr>
						<th> User Payment ID </th>
						<th> User Name </th>
						<th> Date </th>
						<th> Time </th>
						<th> Payment Details </th>
						<th> Payment Type </th>
						<th> Amount </th>
						<th> Action </th>
				</tr>
			</tfoot>
		</table><br>
	
	</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "payment_user_process.php" method = "post" enctype = "multipart/form-data">
				
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