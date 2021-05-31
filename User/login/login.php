<!DOCTYPE html>
<?php
	session_start(); 
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>User Login</title>
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
			
		if(isset($_SESSION['error']) && $_SESSION['error']!="")
		{
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		}
	?>

		<div class="container">
        
	  <form class="form-signin" role="form" method = "post" action="login_process.php">
        <h3 class="form-signin-heading"><center><font color = "black"> <u> User Login </u></font> </h3> </center>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
			
			<input type="text" class="form-control" name="username" id="username" placeholder="User Email-ID" autocomplete="on" required style = "background-color:white; color:black;" required/>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class=" glyphicon glyphicon-lock "></i>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" style = "background-color:white; color:black;" required/>
			

          </div>
		  <br>
		  <label class="checkbox">
          <input type="checkbox" value="remember-me" name = "remember_me"> Remember me
        </label>
		  		
		<font color = "red" size = "4" style = "padding-left:62px ;">
		
		<b> <u>
		
		
		</b> </u>
		
	</font>	  
			    <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
				
				<a href="forgetpass.php" style="padding-left:275px; font-size:14px;"><u>Forget Password?</u></a>
				
				<br>
				
				<a href = "registration.php" style = "padding-left:235px; font-size:14px; "> New User? Register Now </a>
        </div>
		</form>
    
    <div class="clearfix"></div>
    <br><br>
    
	</div>
	
	</body>
</html>

<?php

	if(isset($_SESSION['success']) && $_SESSION['success']!="")
	{
		echo "<script>alert('Registered successfully');</script>";
		unset($_SESSION['success']);
	}
	
	if(isset($_COOKIE['remember_me']))
	{
		header("location:getting-started.php");
	}

?>
