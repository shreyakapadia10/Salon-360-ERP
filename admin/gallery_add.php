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

?>

<script type="text/javascript" src="jquery-1.10.2.js">
</script>
<script type="text/javascript" src="validate.js"></script>
<script>
		
	$("document").ready(function(){
	
		$("#add").click(function(){
			
			var iname,pic,itype;

			iname = test_name("#iname","#msginame");
			
			itype = test_name("#vname","#msgvname");

			pic = test_file("#pic","#msgpic");
			
			if(iname == true && pic == true && itype == true)
			{
				return true;
				
			}
			else
			{
				return false;
			}
		});
	
	});
</script>

<div class="clearfix"></div>
	
  <div class="content-wrapper" >
    <div class="container-fluid" >
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9" >
		    <h4 class="page-title">Add Gallery</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="gallery.php">Gallery</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Gallery</li>
         </ol>
         </ol>
	   </div>
	   <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <button type="button" class="btn btn-light waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
        <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <div class="dropdown-menu">
          <a href="javaScript:void();" class="dropdown-item">Action</a>
          <a href="javaScript:void();" class="dropdown-item">Another action</a>
          <a href="javaScript:void();" class="dropdown-item">Something else here</a>
          <div class="dropdown-divider"></div>
          <a href="javaScript:void();" class="dropdown-item">Separated link</a>
        </div>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->

<div class="row">
       <div class="col-lg-12">
	     <div class="col-lg-6">
			<div class="card">
				<div class="card-body" >
		  <form action = "gallery_process.php" method = "post" enctype = "multipart/form-data" >

			<div class="form-group">
            <label for="input-1">Image Name</label>
				  <input type="text" class="form-control form-control-rounded" id="iname" placeholder="Enter Image Name" name = "i_name" required/>
				  <span id="msginame"></span>
			</div>
			
			<div class="form-group">
            <label for="input-2">Image Type</label>
				  <input type="text" class="form-control form-control-rounded" id="vname" id="input-1" placeholder="Enter Image Type" name = "v_name" required/>
				  <span id="msgvname"></span>
			</div>
			
			<div class="form-group">
            <label for="input-1">Salon Pics</label>
			 <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class=" form-control custom-file-input" id="pic" name="s_pics">
                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
				  <span id="msgpic"></span>
			</div>
			
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" id = "add" name = "add_image" ><i class="icon-lock"></i> Add Image</button>
			<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"><i class="icon-refresh"></i> Reset</button>

		</form>
		
		</div>
	</div>
</div>

<?php

		include("footer.php");
	}
?>