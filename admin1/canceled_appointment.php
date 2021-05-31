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
	
		if(isset($_SESSION['message']) && $_SESSION['message']!="")
		{
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}

		if(isset($_SESSION['message1']) && $_SESSION['message1']!="")
		{
			echo $_SESSION['message1'];
			unset($_SESSION['message1']);
		}
		
		if(isset($_SESSION['add_appointment']) && $_SESSION['add_appointment']!="")
		{
			echo $_SESSION['add_appointment'];
			unset($_SESSION['add_appointment']);
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
				<li class="breadcrumb-item"><a href="admin_dashboard.php">Salon 360 ERP</a></li>
				<li class="breadcrumb-item"><a href="canceled_appointment_list.php">Canceled Appointments</a></li>
			</ol>
	   </div>
	   
	   <div class="col-xs-3">
       <div class="btn-group float-sm-right">
		</div>
	   </div>
	   </div>
	   
	


	<div class="col-lg-8 grid-margin stretch-card" style = "padding-right:190px ; padding-left:0px; ">
              <div class="card">
 
                <div class="card-body" class="content-wrapper" class="main-panel" >
                     <h3><u> Cancel Reason</h3> </u><br>
                  <div class="table-responsive">
    		
			
			<?php
	
				$_SESSION['cancelid'] = $_GET['cancelid'];
	
			?>
				
	
		<form method = "post" action = "appointment_cancel_process.php">
		
			Cancel Reason : <input type="text" name="cancel_reason" > <br><br>
			 <input type="submit" name="submit" value = "Confirm Cancel"> <br>
		<br>
			
		</form>	
				
              </div>
            </div>
            </div>
            </div>
<?php
	
		include("footer.php");
	}
?>

