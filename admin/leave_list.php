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
	
		if(isset($_SESSION['confirmation']) && $_SESSION['confirmation']!="")
		{
			echo $_SESSION['confirmation'];
			unset($_SESSION['confirmation']);
		}
		
		if(isset($_SESSION['cancel']) && $_SESSION['cancel']!="")
		{
			echo $_SESSION['cancel'];
			unset($_SESSION['cancel']);
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
				<li class="breadcrumb-item"><a href="leave_list.php">Leave Requests List</a></li>
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
					<div class="card-header" style="font-size:20px;"><i class="fa fa-table fa-lg"></i> Leave Request List</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th> SR No. </th>
										<th> Staff Name </th>
										<th> Leave Reason </th>
										<th> Leave Date </th>
										<th> Total Leave Days </th>
										<th> Action </th>
									</tr>
								</thead>
							<tbody>
			
			<?php                                                                 
							
	
				$query = mysql_query("select * from attendance a,staff s where total_leave>0 && a.staff_id=s.staff_id");
				
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Appointment : $cnt <br>";	
				
				$i=1;
				
				while($result = mysql_fetch_array($query))
				{
					if(isset($_GET['lid']))
					{
						$lid = $_GET['lid'];
						
						$a=array($lid);

						$counter = count($a);

						if($result['attendance_id']!=$lid )
						{	
					
					// echo "hi";
						
			?>
				
			<tr>
			 
				<td> <?php echo $i; ?> </td>
				<td> <?php echo $result['staff_name']; ?> </td>
				<td> <?php echo $result['leave_reason']; ?> </td>
				<td> <?php echo $result['leave_date']; ?> </td>
				<td> <?php echo $result['total_leave']; ?> </td>
				<td> <center> <a href = "leave_list_process.php?confirmid=<?php echo $result['attendance_id']; ?>" style = "text-decoration:none;"> 
				<i class="zmdi zmdi-check"></i></a>&nbsp; &nbsp;
							
				<a href = "leave_list_process.php?cancelid=<?php echo $result['attendance_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-close"></i></a></center>
				</td>
			
			</tr>
			
			<?php
			
					$i+=1;
					}
					
						else
						{
							
							continue;
						}
					}
					
					else
					{
						
						?>

			<tr>
			 
				<td> <?php echo $i; ?> </td>
				<td> <?php echo $result['staff_name']; ?> </td>
				<td> <?php echo $result['leave_reason']; ?> </td>
				<td> <?php echo $result['leave_date']; ?> </td>
				<td> <?php echo $result['total_leave']; ?> </td>
				<td> <center> <a href = "leave_list_process.php?confirmid=<?php echo $result['attendance_id']; ?>" style = "text-decoration:none;"> 
				<i class="zmdi zmdi-check"></i></a>&nbsp; &nbsp;
							
				<a href = "leave_list_process.php?cancelid=<?php echo $result['attendance_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-close"></i></a></center>
				</td>
			
			</tr>					
					
					<?php 
					
						$i+=1;
					}
				}
				
			?>
			</tbody>
				<tfoot>
					<tr>
						<th> SR No. </th>
						<th> Staff Name </th>
						<th> Leave Reason </th>
						<th> Leave Date </th>
						<th> Total Leave Days </th>
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
   

    <!-- End container-fluid-->
    
    <!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
<?php

	}
	include("footer.php");
	
?>