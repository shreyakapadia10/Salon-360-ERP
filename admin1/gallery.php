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

		if(isset($_SESSION['add_gallery']) && $_SESSION['add_gallery']!="")
		{
			echo $_SESSION['add_gallery'];
			
			unset($_SESSION['add_gallery']);
		}
		
		if(isset($_SESSION['delete_gallery']) && $_SESSION['delete_gallery']!="")
		{
			echo $_SESSION['delete_gallery'];
			
			unset($_SESSION['delete_gallery']);
		}
		
		if(isset($_SESSION['update_gallery']) && $_SESSION['update_gallery']!="")
		{
			echo $_SESSION['update_gallery'];
			
			unset($_SESSION['update_gallery']);
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
				<li class="breadcrumb-item"><a href="gallery.php">Gallery Details</a></li>
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
					<div class="card-header" style="font-size:20px"><i class="fa fa-table fa-lg"></i> Gallery Details</div>
						<div class="card-body">
							
								<div class="table-responsive">
									<table id="example" class="table table-bordered" >
								<thead>	
									<tr>
										<th>Image ID</th>
										<th>Image Name</th>
										<th>Image Type</th>
										<th>Salon Pics</th>
										<th>Video</th>
										<th>Video Name</th>
										<th>Video Type</th>
										<th>Action</th>
									</tr>
							</thead>
					<tbody>	
			
			<?php
			
				$query = mysql_query("select * from gallery");
				$cnt = mysql_num_rows($query);
				
				echo "<br> &nbsp &nbsp Total Images : $cnt <br>";			
				
				while($result = mysql_fetch_array($query))
				{
			
			?>
			
			<tr>
			
				<td> <?php echo $result['image_id']; ?> </td>
				<td> <?php echo $result['image_name']; ?> </td>
				<td> <?php echo $result['image_type']; ?> </td>
				<td> <br> <img src = "gallery/<?php echo $result['salon_pics']; ?>" width = "100px" height = "100" alt = "Salon Pic"> </img> </td>
				<td> <video src = "gallery/<?php echo $result['video']; ?>" width = "100px" height = "150" alt = "video" > </video> </td>
				<td> <?php echo $result['video_name']; ?> </td>
				<td> <?php echo $result['video_type']; ?> </td>
				<td> <center> <a href = "gallery_update.php?editid=<?php echo $result['image_id']; ?>">
				<i class="zmdi zmdi-edit"></i></a>&nbsp; &nbsp;
						  
				<a href = "gallery_process.php?del=<?php echo $result['image_id']; ?>" onclick="return confirm('Are You Sure?');"><i class="zmdi zmdi-delete"></i></a></center>
				</td>
				
			</tr>

			<?php
			
				}
				
			?>
			
			</tbody>
            
			<tfoot>
				<tr>
					<th>Image ID</th>
					<th>Image Name</th>
					<th>Image Type</th>
					<th>Salon Pics</th>
					<th>Video</th>
					<th>Video Name</th>
					<th>Video Type</th>
					<th>Action</th>
				</tr>
			</tfoot>
		</table><br>
	
	</div>
            <br>
		<div class="col-lg-6">
		<div class="input-group">
		  <div class="custom-file">
				
				<form action = "gallery_process.php" method = "post" enctype = "multipart/form-data">
				
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