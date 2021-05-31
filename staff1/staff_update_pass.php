<?php 
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/dashtreme/demo/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Dec 2018 13:48:51 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Staff Reset Password</title>
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>
<?php
if(isset($_SESSION['msg']) && $_SESSION['msg']!="")
{
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}

if(isset($_SESSION['update_pass']) && $_SESSION['update_pass']!="")
{
	echo $_SESSION['update_pass'];
	unset($_SESSION['update_pass']);
}
?>

<body class="bg-theme bg-theme1">

<!-- Start wrapper-->
 <div id="wrapper">

  <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
  
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		  <div class="card-title text-uppercase pb-2">Reset Password</div>
		   
		    <form action="staff_update_pass_process.php" method="post">
			  <div class="form-group">
			  <label for="exampleInputEmailAddress" class="">OTP</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputEmailAddress" class="form-control input-shadow" placeholder="Enter OTP" name="otp">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			  
			  <div class="form-group">
			  <label for="exampleInputEmailAddress" class="">Enter New Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="exampleInputEmailAddress" class="form-control input-shadow" placeholder="New Password" name="new_pass">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			  
			  <div class="form-group">
			  <label for="exampleInputEmailAddress" class="">Re-Enter New Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="exampleInputEmailAddress" class="form-control input-shadow" placeholder="Re-Enter Password" name="re_pass">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			 
			  <button type="submit" class="btn btn-light btn-block mt-3" name="reset_password">Reset Password</button>
			 </form>
		   </div>
		  </div>
		   <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Return to the <a href="index.php"> Sign In</a></p>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
      </ul>
      
     </div>
   </div>
  <!--end color cwitcher-->
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  
	
</body>

<!-- Mirrored from codervent.com/dashtreme/demo/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Dec 2018 13:48:51 GMT -->
</html>
