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

		if(isset($_SESSION['add_staff']) && $_SESSION['add_staff']!="")
		{
			echo "<script>alert('Staff Added Successfully') ;</script>";
			
			unset($_SESSION['add_staff']);
		}
		
		if(isset($_SESSION['delete']) && $_SESSION['delete']!="")
		{
			echo "<script>alert('Staff Deleted Successfully') ;</script>";
			
			unset($_SESSION['delete']);
		}
		
		if(isset($_SESSION['updated']) && $_SESSION['updated']!="")
		{
			echo "<script>alert('Staff Updated Successfully') ;</script>";
			
			unset($_SESSION['updated']);
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
				<li class="breadcrumb-item"><a href="staff.php">Staff Details</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Staff Details</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered">
								<thead>	
									<tr>
										<th> Staff ID </th>
										<th> Staff Name </th>
										<th> Staff Gender </th>
										<th> Staff Address </th>
										<th> Staff Contact </th>
										<th> Staff Email </th>
										<th> Staff Salary </th>
										<th> Staff Commission </th>
										<th> Staff Specialization </th>
										<th> Total Customers Handled </th>
										<th> Action </th>
									</tr>
								</thead>
						<tbody>	
			<?php
			
				$query = mysql_query("select * from staff");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Staff : $cnt <br>";			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				<td> <?php echo $result['staff_id']; ?> </td>
				<td> <?php echo $result['staff_name']; ?> </td>
				<td> <?php echo $result['staff_gender']; ?> </td>
				<td> <?php echo $result['staff_address']; ?> </td>
				<td> <?php echo $result['staff_contact']; ?> </td>
				<td> <?php echo $result['staff_email']; ?> </td>
				<td> <?php echo $result['staff_salary']; ?> </td>
				<td> <?php echo $result['staff_commission']; ?> </td>
				<td> <?php echo $result['staff_specialization']; ?> </td>
				<td> <?php echo $result['staff_cus_handled']; ?> </td>
				<td> <center> <a href = "staff_update.php?editid=<?php echo $result['staff_id']; ?>"> 
				<i class="zmdi zmdi-edit"></i></a>&nbsp; &nbsp;
				
				<a href = "staff_process.php?del=<?php echo $result['staff_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-delete"></i></a></center>
				</td>
				
			</tr>

			<?php
			
				}
				
			?>
			</tbody>
            
			<tfoot>
				<tr>
					<th> Staff ID </th>
					<th> Staff Name </th>
					<th> Staff Gender </th>
					<th> Staff Address </th>
					<th> Staff Contact </th>
					<th> Staff Email </th>
					<th> Staff Salary </th>
					<th> Staff Commission </th>
					<th> Staff Specialization </th>
					<th> Total Customers Handled </th>
					<th> Action </th>
				</tr>
			</tfoot>
		</table><br>
	
	</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "staff_process.php" method = "post" enctype = "multipart/form-data">
				
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