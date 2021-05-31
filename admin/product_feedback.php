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

		if(isset($_SESSION['delete_feedback']) && $_SESSION['delete_feedback']!="")
		{
			echo $_SESSION['delete_feedback'];
			
			unset($_SESSION['delete_feedback']);
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
				<li class="breadcrumb-item"><a href="product_feedback.php">Product Feedback</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Product Feedback</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered">
								<thead>
									<tr>
										<th> Feedback ID </th>
										<th> Product Name </th>
										<th> User Name </th>
										<th> Rate </th>
										<th> Review </th>
										<th> Date </th>
										<th> Action </th>
									</tr>
							</thead>
						<tbody>			
			<?php
			
				$query = mysql_query("select * from product_feedback pr,user u,product p where pr.user_id=u.user_id && pr.product_id=p.product_id");
				
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Sale Items : $cnt <br>";			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				<td> <?php echo $result['product_feedback_id']; ?> </td>
				<td> <?php echo $result['product_name']; ?> </td>
				<td> <?php echo $result['user_name']; ?> </td>
				<td> <?php echo $result['rate']; ?> </td>
				<td> <?php echo $result['review']; ?> </td>
				<td> <?php echo $result['date']; ?> </td>
				<td colspan="2"> <center> 
					
					<a href = "product_feedback_process.php?del=<?php echo $result['product_feedback_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-delete"></i></a></center>
				</td>
				
			</tr>

			<?php
			
			
				}
				
			?>
			
			</tbody>
            
			<tfoot>
				<tr>
					<th> Feedback ID </th>
					<th> Product Name </th>
					<th> User Name </th>
					<th> Rate </th>
					<th> Review </th>
					<th> Date </th>
					<th> Action </th>
				</tr>
			</tfoot>

			</table><br>
			</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "product_feedback_process.php" method = "post" enctype = "multipart/form-data">
				
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