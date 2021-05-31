<?php 

	session_start();
	
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User Registration</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="icons8-user-filled-100.png"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="dist/js/site.min.js"></script>
    <style>
      body 
	  {
        color: black;
		background-image: url("background1.jpg");	
		background-repeat:no-repeat;		
      }
	 
    </style>
  </head>
  <body>
	
	<?php
	
		if(isset($_SESSION['dup_email']) && $_SESSION['dup_email']!="")
		{
			echo $_SESSION['dup_email']= "<script>alert('Email ID already exists.!');</script>";;
			unset($_SESSION['dup_email']);
		}
		
		if(isset($_SESSION['fail']) && $_SESSION['fail']!="")
		{
			$_SESSION['fail']="<script>alert('Registeration Failed.!');</script>";
			unset($_SESSION['fail']);
		}
	
	?>
	
	<u><a href = "login.php" style = "font-size:14px; padding-left:1090px; font-size:15px;"><b>Already Have An Account? Sign in</b></a> </u>
    <div class="container">
      <form class="form-signin" role="form" method = "post" action ="registration_confirmation_process.php">
							
		
        <h3 class="form-signin-heading"><center>Sign Up</h3> </center>
        
		<div class="panel-options">
                        <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
                        <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
                        <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
        </div>
	
		<form role="form">

					<div class="form-group">
							 <div class="input-group">
						<div class="input-group-addon"style="background-color:#ECF0F1;">
						<i class=" glyphicon glyphicon-user" style="color:black;"></i>
								</div>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" style = "background-color:white; color:black;" required>
                    </div></div>
					<div class="form-group">
							<div class="input-group">
						<div class="input-group-addon"style="background-color:#ECF0F1;">
						<i class=" glyphicon glyphicon-phone" style="color:black;"></i>
								</div>
                          <input type="tel" minlength="10" maxlength = "10"  class="form-control" name="contact"  placeholder="Enter contact no" style = "background-color:white; color:black;" required>
                    </div>
					</div>
                    <div class="form-group">
							<div class="input-group">
						<div class="input-group-addon"style="background-color:#ECF0F1;">
						<i class=" glyphicon glyphicon-envelope" style="color:black;"></i>
								</div>
                          <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" style = "background-color:white; color:black;" required>
                    </div></div>
					
					<div class="form-group">
						<div class="input-group">
						<div class="input-group-addon"style="background-color:#ECF0F1 ;">
						<i class=" glyphicon glyphicon-home" style="color:black;"></i>
								</div>
                          <input type="text" class="form-control" name="address" placeholder="Enter address" rows="3" cols="20" style = "background-color:white; color:black;" required>
                    </div></div>
					
					<div class="row">
                    <div class="col-md-3">
					<font color="black">
					
                    <select name="date" class="selecter_1" >
                        <option value="0">Date</option><option value="1" selected="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
                      </select>
					</div>  
					
					<div class="row">
                    <div class="col-md-3">
                    <select name="month" class="selecter_1">
					  <option value="0">Month</option><option value="1" selected="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
					  </select>
					</div>
					
					<div class="row">
                    <div class="col-md-3">
                    <select name="year" class="selecter_1" >
					  <option value="0">Year</option><option value="2018"selected="1">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option></select>
                    </div>
					</div>
					</font>
					</div>
					</div>
					
					<br>
				
					
					<div class="row" style = "color:black;">
                    <div class="col-md-3">
                    <select name="gender" class="selecter_1" >
					  <option value="Male">Male</option>
					  <option value="Female">Female</option>
					  </select>
					 </div>
					</div>
					  
					<br>
					
					<!-- <div class="form-group">
                          <div class="input-group">
						<div class="input-group-addon"style="background-color:#ECF0F1;">
						<i class=" glyphicon glyphicon-lock" style="color:black;"></i>
								</div>
                          <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" style = "background-color:white; color:black;" minlength="8" maxlength="30" required>
                    </div> -->
				
		<br>
        
        <button type="submit" class="btn btn-primary btn-block" name="register" value = "Sign Up" >Sign Up</button>
			
      </form>
	</div>
   
    <div class="clearfix"></div>
    <br><br>
    </body>
</html>
