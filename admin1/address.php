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

		if(isset($_SESSION['delete_address']) && $_SESSION['delete_address']!="")
		{
			echo $_SESSION['delete_address'];
			unset($_SESSION['delete_address']);
		}
		
		if(isset($_SESSION['add_address']) && $_SESSION['add_address']!="")
		{
			echo $_SESSION['add_address'];
			unset($_SESSION['add_address']);
		}

		if(isset($_SESSION['filesuccess']) && $_SESSION['filesuccess']!="")
		{
			echo $_SESSION['filesuccess'];
			unset($_SESSION['filesuccess']);
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
				<li class="breadcrumb-item"><a href="address.php">Address List</a></li>
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
					<div class="card-header" style="font-size:20px;"><i class="fa fa-table fa-lg"></i> Address List</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered" cellspacing="0" width="100%">
								<thead>
								<tr>
						<th> Address ID </th>
						<th> Address Pincode </th>
						<th> User Name </th>
						<th> Address Name </th>
						<th> Address Line1 </th>
						<th> Address Line2 </th>
						<th> Contact </th>
						<th> City </th>
						<th> Action </th>						
					</tr>
				</thead>
			<tbody>
			<?php
				
				$query = mysql_query("select * from address, user where address.user_id=user.user_id");
				
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Addresses : $cnt <br>";	
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
				
			<tr>
			
				<td> <?php echo $result['address_id']; ?> </td>
				<td> <?php echo $result['address_pincode']; ?> </td>
				<td> <?php echo $result['user_name']; ?> </td>
				<td> <?php echo $result['address_name']; ?> </td>
				<td> <?php echo $result['address_line1']; ?> </td>
				<td> <?php echo $result['address_line2']; ?> </td>
				<td> <?php echo $result['address_contact']; ?> </td>
				<td> <?php echo $result['address_city']; ?> </td>
				<td> 
					<!-- 
					<a href = "address_update.php?editid=<?php echo $result['address_id']; ?>"><button type="button"class="btn  btn-icons btn-rounded btn-outline-primary " style = "text-decoration:none;"> 
                    <i class="mdi mdi-account-edit mdi-18px"></i></button></a> &nbsp; 
					-->
					<center>
					<a href = "address_process.php?del=<?php echo $result['address_id']; ?>"onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-delete"></i></a></center>
				</td>
			
			</tr>
			
			<?php
			
				}

			?>
		
			</tbody>
            
			<tfoot>
				<tr>
					<th> Address ID </th>
					<th> Address Pincode </th>
					<th> User Name </th>
					<th> Address Name </th>
					<th> Address Line1 </th>
					<th> Address Line2 </th>
					<th> Contact </th>
					<th> City </th>
					<th> Action </th>						
				</tr>
			</tfoot>

			</table><br>
			</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "address_process.php" method = "post" enctype = "multipart/form-data">
				
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

	}
		include("footer.php");
	
?>