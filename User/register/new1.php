<?php 

	session_start();
		
	if(isset($_SESSION['dup_email']) && $_SESSION['dup_email']!="")
	{
		echo $_SESSION['dup_email']= "<script>alert('Email ID already exists.!');</script>";;
		unset($_SESSION['dup_email']);
	}
	
	if(isset($_SESSION['fail']) && $_SESSION['fail']!="")
	{
		echo $_SESSION['fail'];
		unset($_SESSION['fail']);
	}

	include("header.php");
	
?>

<div id="pagetitle" class="page-title bg-overlay"> <div class="container"> <div class="page-title-inner"> <h1 class="page-title">Header 4</h1> <ul class="ct-breadcrumb"><li><a class="breadcrumb-entry" href="../index.html">Home</a></li><li><span class="breadcrumb-entry">Header 4</span></li></ul> </div> </div></div>

<div id="content" class="site-content"> <div class="content-inner"> <div class="container content-container"> <div class="row content-row"> <div id="primary" class="content-area content-full-width col-12"> 

<main id="main" class="site-main"> 

<article id="post-598" class="post-598 page type-page status-publish hentry">

<div class="entry-content clearfix"> 

<div class="vc_row wpb_row vc_row-fluid bg-image-ps-inherit">

<div class="wpb_column vc_column_container vc_col-sm-12">

<div class="vc_column-inner"><div class="wpb_wrapper">

<div class="user-press user-press-default">

<div class="user-press-header">

<h3 style = "margin-top:50px;">Create An Account</h3></div>

<div class="user-press-primary"><div class="user-press-meta">

<h4>PERSONAL INFORMATION</h4>

<p>If you have an account with us, please log in.</p></div>

<div class="user-press-body user-press-register">

<div class="register-form"><div class="fields-content">

<form class="form-signin" role="form" method = "post" action ="registration_confirmation_process.php" enctype = "multipart/form-data">

<div class="field-group"><label>Name *</label>
<input id="name1" name="name" type="text" class="input" placeholder="Enter Your Name" data-validate="Required Field" data-user-length="Username too short. At least 4 characters is required." data-special-char="The value of text field can&#039;t contain any of the following characters: \ / : * ? &quot; &lt; &gt; space"><span id="msgname"></span></div>

<div class="field-group"><label>Contact Number *</label><input id="contact1" name="contact" type="tel" class="input" placeholder="Enter Contact No" data-validate="Required Field"  minlength="10" maxlength = "10"><span id="msgcontact"></span></div>

<div class="field-group"><label>Email Address *</label><input id="email1" type="email" name="email" class="input" placeholder="Enter Email Address" data-validate="Required Field" data-email-format="The Email address is incorrect!"><span id="msgemail"></span></div>

<div class="field-group"><label>Address *</label><input id="address1" type="text" class="input" placeholder="Enter Address" data-validate="Required Field" name="address"><span id="msgaddress"></span></div>

<div class="field-group"><label>Date Of Birth *</label><input id="datepicker" type="date" class="input" placeholder="Enter Date Of Birth" data-validate="Required Field" name="dob"><span id="msgdob"></span></div>

<div class="field-group" ><label>Gender *</label>
	<select name="gender" class="input" id = "gender1">
		<option value="--Select--">--Select--</option>
		<option value="Male" class="input" >Male</option>
		<option value="Female" class="input" >Female</option>
	</select><span id="msggender"></span>
</div>

<div class="field-group" ><label>City *</label>
	<select name="city" class="input" id = "city1">
		<option value="--Select--">--Select--</option>
		<option value="Surat" class="input" >Surat</option>
		<option value="Ahmedabad" class="input" >Ahmedabad</option>
		<option value="Baroda" class="input" >Baroda</option>
	</select><span id="msgcity"></span>
</div>

<div class="field-group"><label>Upload Profile Picture *</label><input id="img1" name = "img" type="file" class="input"  data-validate="Required Field" name="pic"><br><span id="msgimg"></span></div>

<div class="field-group">

<button type="submit" id = "register1" name = "register" class="btn btn-primary btn-block-xs">Create Account</button>

</form>

</div></div></div></div><div class="user-press-footer">Already have an account? <a href="../login/index.html" target="_self">Log In</a></div></div></div></div></div></div></div> </div> 

</article> </main> </div> </div> </div></div></div>

<?php

	include("footer.php");

?>