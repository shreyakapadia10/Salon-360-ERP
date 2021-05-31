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
		
		if(isset($_GET['editid']))
		{
			
			$id=$_GET['editid'];
			
			$query=mysql_query("select * from gallery where image_id='$id'");

			$result=mysql_fetch_array($query);
?>

<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Update Gallery</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="gallery.php">Gallery</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Gallery</li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Update Gallery</div> <hr>

			<form class="forms-sample" action = "gallery_process.php" method = "post" enctype = "multipart/form-data" >

			<div class="form-group">
					<label for="input-6">Image ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6"  value="<?php echo $result['image_id']; ?>" disabled>
			</div>
		
			<div class="form-group">
					<label for="input-6">Image Name</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "i_name" value="<?php echo $result['image_name']; ?>">
			</div>
		
			<div class="form-group">
            <label for="input-1">Salon Pics</label>
					<br><img src = "gallery/<?php echo $result['salon_pics']; ?>" height = "100" width = "100"> </img> 
			 <div class="input-group mb-3">
                  <div class="custom-file">
				  <br> <input type="file" class=" form-control custom-file-input" id="inputGroupFile02" name="s_pics">
                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                  </div>
                   <div class="input-group-append">
						<button class="btn btn-white" type="button">Button</button>
					</div>
                </div>
			</div>
	
						
			<input type="hidden" name="editid" value="<?php echo $result['image_id']; ?>">
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "update" ><i class="zmdi zmdi-edit"></i> Update Gallery</button>
			<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"><i class="zmdi zmdi-refresh"></i> Reset</button>

		</form>
		
		</div>
	</div>
</div>

<?php
		}
		include("footer.php");
	}
?>