<u><b><font color = "red">

<?php 
session_start();

if(isset($_SESSION['updated']) && $_SESSION['updated']!="")
{
	echo "<center><h2>";
	echo $_SESSION['updated'];
	unset($_SESSION['updated']);
	echo "</h2></center>";
}

if(isset($_SESSION['forget_pass']) && $_SESSION['forget_pass']!="")
{
	
?>
</font>
</b> </u>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Password </title>
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
		<div class="container">
			<form class="form-signin" role="form" method = "post" action="pass_process.php" role = "form">
			<br>
			<br>
		<div class="panel-options">
                        <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
                        <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
                        <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
        </div>
		
		<div class="form-group">
		  <div class="input-group">
			<div class="input-group-addon"style="background-color:#ECF0F1;">
				<i class=" glyphicon glyphicon-lock" style="color:black;"></i>
			</div>
				<input type="text" name="txt1" class="form-control" id="exampleInputEmail1" placeholder="Enter OTP" style = "background-color:white; color:black;" required>
			</div>	
		</div>
		
		<div class="form-group">
		  <div class="input-group">
			<div class="input-group-addon"style="background-color:#ECF0F1;">
				<i class=" glyphicon glyphicon-lock" style="color:black;"></i>
			</div>
				<input type="password" name="txt2" class="form-control" id="exampleInputEmail1" placeholder="Enter New Password" style = "background-color:white; color:black;" minlength="8" maxlength="30" required>
			</div>	
		</div>
			
		<div class="form-group">
		  <div class="input-group">
			<div class="input-group-addon"style="background-color:#ECF0F1;">
				<i class=" glyphicon glyphicon-lock" style="color:black;"></i>
			</div>
				<input type="password" name="txt3" class="form-control" id="exampleInputEmail1" placeholder="Re-Type New Password" style = "background-color:white; color:black;" minlength="8" maxlength="30" required>
			</div>	
		</div>
		
		<br>
        
        <button type="submit" class="btn btn-primary btn-block" name="submit" value = "Submit" >Submit</button>
	
			
			</form>
		
	</body>
	
</html>

<?php
	
}

else
{
	header("location:forgetpass.php");
}
?>