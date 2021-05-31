<?php

	// session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{
		include("connection1.php");

		// session_start();
		
		$id = $_SESSION['adminid'];
			
		$query = mysql_query("select * from admin where admin_id = '$id' ");
				
		$details = mysql_fetch_array($query);	
?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/dashtreme/demo/pages-blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Dec 2018 13:49:53 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Salon360ERP</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  <!--Datetimepicker-->	
  <link href="jquery.datetimepicker.css" rel="stylesheet">
  <!--Data Tables -->
  <link href="assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
  
</head>

<body class="bg-theme bg-theme1">

<!-- Start wrapper-->
 <div id="wrapper">

  <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
 
 <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.php">
      <!--<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">-->
       <h5 class="logo-text">Salon360ERP</h5>
     </a>
   </div>
   <div class="user-details">
	  <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
	    <div class="avatar"><img class="mr-3 side-user-img" src="pics/<?php echo $details['admin_pic']; ?>" alt="Profile"></div>
	     <div class="media-body">
	     <h6 class="side-user-name"><?php echo $details['admin_name']; ?></h6>
	    </div>
       </div>
	   <div id="user-dropdown" class="collapse">
		  <ul class="user-setting-menu">
            <li><a href="admin_profile.php"><i class="icon-user"></i>  My Profile</a></li>
            <li><a href="admin_pass_change.php"><i class="icon-settings"></i> Change Password</a></li>
			<li><a href="admin_logout.php"><i class="icon-power"></i> Logout</a></li>
		  </ul>
	   </div>
      </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="home.php" class="waves-effect">
          <i class="zmdi zmdi-home" ></i> <span>Home</span>
        </a>
		
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-account"></i>
          <span>User Management</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
		<li><a href="user_details.php"><i class="zmdi zmdi-long-arrow-right"></i> User Details</a></li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Address <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="address.php"><i class="ti-list"></i> Address Details</a></li>
                  <li><a href="address_add.php"><i class="zmdi zmdi-plus"></i> Add Address</a></li>
			</ul>
			</li>
		<li><a href="feedback_display.php"><i class="zmdi zmdi-long-arrow-right"></i> Feedback Details</a></li>
        <li><a href="ratings_display.php"><i class="zmdi zmdi-long-arrow-right"></i> Ratings Details</a></li>
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel"></i>
          <span>Appointment Details</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
		  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Pending Appointment 
		  <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="appointment_list.php"><i class="ti-list"></i> Pending List</a></li>
                  <li><a href="appointment_add.php"><i class="zmdi zmdi-plus"></i> Add Appointment</a></li>
			</ul>
			</li>
         
		  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Canceled Appointment 
		  <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="canceled_appointment_list.php"><i class="ti-list"></i> Canceled List</a></li>
                  
			</ul>
			</li>
          
		  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Confirm Appointment 
		  <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="confirm_appointment_list.php"><i class="ti-list"></i> Confirmed List</a></li>
                  
			</ul>
			</li>
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-shopping-basket"></i> <span>Product Management</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
		 <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Product 
		  <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="product.php"><i class="ti-list"></i> Product Details</a></li>
                  <li><a href="product_add.php"><i class="zmdi zmdi-plus"></i> Add Product</a></li>
			</ul>
		</li>
		  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Sale  
		  <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="sale.php"><i class="ti-list"></i> Sale Details</a></li>
                  <li><a href="sale_add.php"><i class="zmdi zmdi-plus"></i> Add Sale</a></li>
			</ul>
		</li>
          <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Sale Details<i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="sale_details.php"><i class="ti-list"></i> Sale Details</a></li>
                  <li><a href="sale_detail_add.php"><i class="zmdi zmdi-plus"></i> Add Sale Detail</a></li>
			</ul>
		  </li>
		  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Purchase<i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="purchase.php"><i class="ti-list"></i> Purchase Details</a></li>
                  <li><a href="purchase_add.php"><i class="zmdi zmdi-plus"></i> Add Purchase</a></li>
			</ul>
		  </li>
        </ul>
       </li>
	   <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-accounts"></i> <span>Staff Management</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
		  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i>Staff <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="staff.php"><i class="ti-list"></i> Staff Details</a></li>
                  <li><a href="staff_add.php"><i class="zmdi zmdi-plus"></i> Add Staff</a></li>
			</ul>
		  </li>
		   <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Attendance Details<i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="attendance.php"><i class="ti-list"></i> Attendance Details</a></li>
                  <li><a href="attendance_add.php"><i class="zmdi zmdi-plus"></i> Add Attendance</a></li>
			</ul>
		  </li>
		  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Salary<i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="salary.php"><i class="ti-list"></i> Salary Details</a></li>
                  <li><a href="salary_add.php"><i class="zmdi zmdi-plus"></i> Add Salary</a></li>
			</ul>
		  </li>
        </ul>
      </li>
       <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-money"></i> <span>Payment</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
		  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> User Payment<i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="payment_user.php"><i class="ti-list"></i> User Payment Details</a></li>
                  <li><a href="payment_user_add.php"><i class="zmdi zmdi-plus"></i> Add User Payment</a></li>
			</ul>
		  </li>
		  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Supplier Payment<i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="payment_supplier.php"><i class="ti-list"></i> Supplier Payment Details</a></li>
                  <li><a href="payment_supplier_add.php"><i class="zmdi zmdi-plus"></i> Add Supplier Payment</a></li>
			</ul>
		  </li>
        </ul>
      </li>
    
     <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-collection-folder-image"></i> <span>Gallery Management</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
		  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Gallery<i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="gallery.php"><i class="ti-list"></i> Gallery Details</a></li>
                  <li><a href="gallery_add.php"><i class="zmdi zmdi-plus"></i> Add Gallery</a></li>
			</ul>
		  </li>
		  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Treatments<i class="fa fa-angle-left pull-right"></i></a>
			<ul class="sidebar-submenu">
                  <li><a href="treatment_details.php"><i class="ti-list"></i> Treatment Details</a></li>
                  <li><a href="treatment_add.php"><i class="zmdi zmdi-plus"></i> Add Treatment</a></li>
			</ul>
		  </li>
        </ul>
      </li>
      
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-male-female"></i> <span>Supplier</span><i class="fa fa-angle-left float-right"></i>
        </a>
			<ul class="sidebar-submenu">
                  <li><a href="supplier.php"><i class="ti-list"></i> Supplier Details</a></li>
                  <li><a href="supplier_add.php"><i class="zmdi zmdi-plus"></i> Add Supplier</a></li>
			</ul>
      </li>

      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-city"></i> <span>City</span><i class="fa fa-angle-left float-right"></i>
        </a>
		<ul class="sidebar-submenu">
                  <li><a href="city.php"><i class="ti-list"></i> City Details</a></li>
                  <li><a href="city_add.php"><i class="zmdi zmdi-plus"></i> Add City</a></li>
			</ul>
      </li>

    </ul>
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i><span class="badge badge-light badge-up">12</span></a>
      <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
         <li class="list-group-item d-flex justify-content-between align-items-center">
          You have 12 new messages
          <span class="badge badge-light">12</span>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-5.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Jhon Deo</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            <small>Today, 4:10 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-6.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Sara Jen</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            <small>Yesterday, 8:30 AM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-7.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Dannish Josh</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
             <small>5/11/2018, 2:50 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-8.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Katrina Mccoy</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet.</p>
            <small>1/11/2018, 2:50 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item text-center"><a href="javaScript:void();">See All Messages</a></li>
        </ul>
        </div>
    </li>
	
	<!-- notification -->
	
	<?php
	
		$query1 = mysql_query("select * from notification");
		
		while($result = mysql_fetch_array($query1))
		{
	
	?>
	
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
    <i class="fa fa-bell-o"></i><span class="badge badge-info badge-up"><?php echo count($result['notification_id']); ?></span></a>
      <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
          You have <?php echo count($result['notification_id']); ?> Notifications
          <span class="badge badge-info"><?php echo count($result['notification_id']); $_SESSION['nid'] = $result['notification_id']; ?></span>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media"> 
             <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title"><?php echo $result['notification_title']; ?></h6>
            <p class="msg-info"><?php echo $result['notification']; ?></p>
            <a href = "notification_remove.php"></div><i class="zmdi zmdi-check"><i class="zmdi zmdi-check">Read</i></i></a>
          </div>
          </a>
          </li>
        </ul>
      </div>
    </li>
	
	<?php
		}
	?>
	
    <li class="nav-item language">
      <!--<a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
      <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
        </ul>-->
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="pics/<?php echo $details['admin_pic']; ?>" alt="Profile" class="img-circle"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="pics/<?php echo $details['admin_pic']; ?>" alt="Profile"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $details['admin_name']; ?></h6>
            <p class="user-subtitle"><?php echo $details['admin_email']; ?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i><a href = "admin_logout.php"> Logout</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<?php
	
	}

?>