<?php

	// session_start();
	
	if(!isset($_SESSION['sid']) && $_SESSION['sid']=="")
	{
		header("location:index.php");
	}
	else
	{
		include("connection1.php");

		// session_start();
		
		$id = $_SESSION['sid'];
			
		$query = mysql_query("select * from staff where staff_id = '$id' ");
				
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
  <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
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
      <a href="home.php">
      <!--<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">-->
       <h5 class="logo-text">Salon360ERP</h5>
     </a>
   </div>
   <div class="user-details">
	  <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
	    <div class="avatar"><img class="mr-3 side-user-img" src="pics/<?php echo $details['staff_pic']; ?>" alt="Profile"></div>
	     <div class="media-body">
	     <h6 class="side-user-name"><?php echo $details['staff_name']; ?></h6>
	    </div>
       </div>
	   <div id="user-dropdown" class="collapse">
		  <ul class="user-setting-menu">
            <li><a href="staff_profile.php"><i class="icon-user"></i>  My Profile</a></li>
            <li><a href="staff_pass_change.php"><i class="icon-settings"></i> Change Password</a></li>
			<li><a href="staff_logout.php"><i class="icon-power"></i> Logout</a></li>
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
          <i class="zmdi zmdi-card-travel"></i>
          <span>Appointment Details</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
		  <li><a href="appointment_list.php"><i class="zmdi zmdi-long-arrow-right"></i> Pending Appointment </a> </li>
         
		  <li><a href="canceled_appointment_list.php"><i class="zmdi zmdi-long-arrow-right"></i> Canceled Appointment</a>
			</li>
          
		  <li><a href="confirm_appointment_list.php"><i class="zmdi zmdi-long-arrow-right"></i> Confirm Appointment </a>
			</li>
        </ul>
      </li>
	   <li><a href="attendance.php"><i class="zmdi zmdi-long-arrow-right"></i> Attendance Details</a>
			
		  </li>
		   <li><a href="feedback.php"><i class="zmdi zmdi-long-arrow-right"></i> Feedback</a></li>
		  <li><a href="salary.php"><i class="zmdi zmdi-long-arrow-right"></i> Salary</a></li>
		  <li><a href="leave.php"><i class="zmdi zmdi-long-arrow-right"></i> Leave</a></li>
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
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
       <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
	  <?php 
			$query=mysql_query("select * from notification_staff where staff_id='$id' ORDER BY notification_id DESC");
			
			$cnt=mysql_num_rows($query);
	  
	  ?>
    <i class="fa fa-bell-o"></i><span class="badge badge-info badge-up"><?php echo $cnt; ?></span></a>
      <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
          You have <?php echo $cnt; ?> Notifications
          <span class="badge badge-info"><?php echo $cnt; ?></span>
          </li>
		  <?php while($result=mysql_fetch_array($query)){
			  $title=$result['notification_title'];
		  $id=$result['notification_staff_id'];
			  ?>
		  
          <li class="list-group-item">
          <?php 
		  if($title=="Appoinment Reminder")
		  {
				$_SESSION['app_notification']=$id;  
				echo "<a href='notification_remove1.php'>";
		  } 
		  if($title=="New Feedback Received")
		  {
				$_SESSION['feedback_notification']=$id;  
				echo "<a href='notification_remove2.php'>";
		  }
		  if($title=="Salary Added")
		  {
				$_SESSION['salary_notification']=$id;  
				echo "<a href='notification_remove3.php'>";
		  }
		  if($title=="Leave Confirmed" || $title=="Leave Canceled")
		  {
				$_SESSION['leave_notification']=$id;  
				echo "<a href='notification_remove4.php'>";
		  }
		   ?>
           <div class="media">
             <i class="zmdi zmdi-notifications-active fa-2x mr-3 text-danger"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title"><?php echo $result['notification_title']; ?></h6>
            <p class="msg-info"><?php echo $result['notification']; ?></p>
            </div>
          </div>
          </a>
          </li>
		  <?php 
		  
		  } ?>
          
        </ul>
      </div>
    </li>
    <li class="nav-item language">
    
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="pics/<?php echo $details['staff_pic']; ?>" alt="Profile" class="img-circle"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="pics/<?php echo $details['staff_pic']; ?>" alt="Profile"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $details['staff_name']; ?></h6>
            <p class="user-subtitle"><?php echo $details['staff_email']; ?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i><a href = "staff_logout.php"> Logout</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<?php
	
	}

?>