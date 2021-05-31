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

		if(isset($_SESSION['add_city']) && $_SESSION['add_city']!="")
		{
			echo $_SESSION['add_city'];
			
			unset($_SESSION['add_city']);
		}
		
		if(isset($_SESSION['delete_city']) && $_SESSION['delete_city']!="")
		{
			echo $_SESSION['delete_city'];
			
			unset($_SESSION['delete_city']);
		}
		
		if(isset($_SESSION['update_city']) && $_SESSION['update_city']!="")
		{
			echo $_SESSION['update_city'];
			
			unset($_SESSION['update_city']);
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
				<li class="breadcrumb-item"><a href="city.php">City Details</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> City Details</div>
						<div class="card-body">
							&nbsp <a href = "city_add.php"><button type="button" class="btn btn-danger waves-effect waves-light m-1"> Add City</button></a>
								<div class="table-responsive">
									<table id="example" class="table table-bordered" >
								<thead>	
									<tr>
										<th> City ID </th>
										<th> User Name </th>
										<th> City Name </th>
										<th> Action </th>
									</tr>
								</thead>
						<tbody>	
			
			<?php
			
				$query = mysql_query("select * from city,user where city.user_id=user.user_id");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total City : $cnt <br>";			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				<td> <?php echo $result['city_id']; ?> </td>
				<td> <?php echo $result['user_name']; ?> </td>
				<td> <?php echo $result['city_name']; ?> </td>
				<td> 
				<!--<a href = "city_update.php?editid=<?php echo $result['city_id']; ?>"> <button type="button" class="btn btn-icons btn-rounded btn-outline-primary" style = "text-decoration:none;">
                          <i class="mdi mdi-account-edit mdi-18px"></i></button></a> &nbsp;
				-->
				
				<a href = "city_process.php?del=<?php echo $result['city_id']; ?>" onclick="return confirm('Are You Sure?');"><center><i class="zmdi zmdi-delete"></i></a> </center>
				
				</a> &nbsp;
				</td>
				
			</tr>

			<?php
			
				}
				
			?>
</tbody>
            
			<tfoot>
				<tr>
					<th> City ID </th>
					<th> User Name </th>
					<th> City Name </th>
					<th> Action </th>
				</tr>
			</tfoot>
		</table><br>
	
	</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "city_process.php" method = "post" enctype = "multipart/form-data">
				
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