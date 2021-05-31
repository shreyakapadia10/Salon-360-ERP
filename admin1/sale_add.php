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
			
			var aid,uid,pid,sname,squantity,stype,sprice,spay;

			aid = test_drop("#aid","#msgaid");
			
			uid = test_drop("#uid","#msguid");
			
			pid = test_drop("#pid","#msgpid");
			
			sname = test_name("#sname","#msgsname");

			stype = test_name("#stype","#msgstype");

			squantity = test_num("#squantity","#msgsquantity");
			
			sprice = test_num("#sprice","#msgsprice");

			spay = test_drop("#spay","#msgspay");

			if(sname == true && aid == true && uid == true && pid == true && sprice == true && stype == true && squantity == true && spay == true)
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
		    <h4 class="page-title">Add Sale</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="sale.php">Sale Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Sale </li>
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

		  <form action = "sale_process.php" method = "post" >
			
				<div class="form-group">
					  <label for="input-1">User Name</label>
				<?php
						
					$tbl_name="user";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='user_id' class='form-control form-control-rounded' id='uid' required/>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['user_id'] ."'>" . $row['user_name']."</option>";
					}
					
					echo "</select>";
				?>
				<span id="msguid"></span>
				</div>
	
			<div class="form-group">
					  <label for="input-3">Product Name</label>
				<?php
						
					$tbl_name="product";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='product_id' class='form-control form-control-rounded' id='pid' required/>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['product_id'] ."'>" . $row['product_name']."</option>";
					}
					
					echo "</select>";
				?>
				<span id="msgpid"></span>
			</div>
			
			<div class="form-group">
					  <label for="input-3">Address Name</label>
				 <?php
						
					$tbl_name="address";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='add_id' class='form-control form-control-rounded' id='aid' required/>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['address_id'] ."'>" . $row['address_name']."</option>";
					}
					
					echo "</select>";
				?>
			<span id="msgaid"></span>
			</div>
			
			<div class="form-group">
					  <label for="input-4">Sold Item Name</label>
				  <input type="text" class="form-control form-control-rounded" id="sname" placeholder="Enter Sold Item Name"  name = "sale_name" required/> 
				  <span id="msgsname"></span>
			</div>
	
			<div class="form-group">
					  <label for="input-5">Sold Item Quantity</label>
				  <input type="text" class="form-control form-control-rounded" id="squantity" placeholder="Enter Sold Item Quantity"  name = "sale_quantity" required/> 
			<span id="msgsquantity"></span>
			</div>
	
			<div class="form-group">
					  <label for="input-6">Sold Item Price</label>
				  <input type="text" class="form-control form-control-rounded" id="sprice" placeholder="Enter Sold Item Price"  name = "sale_price" required/> 
			<span id="msgsprice"></span>
			</div>
	
			<div class="form-group">
					  <label for="input-7">Sold Item Type</label>
				  <input type="text" class="form-control form-control-rounded" id="stype" placeholder="Enter Sold Item Type"  name = "sale_type" required/> 
			<span id="msgstype"></span>	  
			</div>

		
		<div class="form-group">
				  <label for="basic-select">Payment Type</label>
					<div class="col-sm-13">
				  <select class="form-control form-control-rounded" id="spay" name="pay_type">
							<option value="Select">Select</option>
							<option value="COD">Cash On Delivery</option>
							<option value="Credit Card">Credit Card</option>
							<option value="Debit Card">Debit Card</option>
							<option value="Net Banking">Net Banking</option>
						</select>
						<span id="msgspay"></span>
		</div>
		</div>
		
				
		<button type="submit" id = "add" class="btn btn-success btn-round waves-effect waves-light m-1" name = "add_sale" ><i class="icon-lock"></i> Add Sold Product</button>
		<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"><i class="icon-refresh"></i> Reset</button>
	
	</form>

	</div>
	
	</div>
<?php

		include("footer.php");
	}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="jquery.datetimepicker.full.js"></script>
<script>

	$("#datetimepicker").datetimepicker();

</script>