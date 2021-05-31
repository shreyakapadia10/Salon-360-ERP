<?php 

	include("connection1.php");

	session_start();
	
	if(!isset($_SESSION['sid']) && $_SESSION['sid']=="")
	{
		header("location:index.php");
	}
	else
	{
		include("header.php");
			
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
				<li class="breadcrumb-item"><a href="salary.php">Salary Details</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Salary Details</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered">
								<thead>	
									<tr>
									<th> Salary ID </th>
									<th> Staff Name </th>
									<th> Salary </th>
									<th> Commission </th>
									<th> Total Salary </th>
									<th> Salary Date</th>
									
								</tr>
							</thead>
						<tbody>	
			<?php
			
				$id = $_SESSION['sid'];
			
				$query = mysql_query("select * from salary,staff where salary.staff_id = '$id' && salary.staff_id =staff.staff_id");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Salary : $cnt <br>";			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				<td> <?php echo $result['salary_id']; ?> </td>
				<td> <?php echo $result['staff_name']; ?> </td>
				<td> <?php echo $result['salary']; ?> </td>
				<td> <?php echo $result['commission']; ?> </td>
				<td> <?php echo $result['total_salary']; ?> </td>
				<td> <?php echo $result['salary_date']; ?> </td>
				
			</tr>

			<?php
			
				}
				
			?>	
			
					</tbody>
            
			<tfoot>
				<tr>
					<th> Salary ID </th>
					<th> Staff Name </th>
					<th> Salary </th>
					<th> Commission </th>
					<th> Total Salary </th>
					<th> Salary Date</th>
				</tr>
			</tfoot>
		</table><br>
	
	</div>
            <br>
		
		  </div>
		</div>
		 </div>
        </div>
      </div><!-- End Row-->
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