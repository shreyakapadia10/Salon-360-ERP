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
			
			var name,amt,details,type,pay;

			name = test_drop("#name","#msgname");
			
			amt = test_num("#amt","#msgamt");
			
			details = test_name("#details","#msgdetails");
			
			type = test_drop("#type","#msgtype");
			
			pay = test_drop("#pay","#msgpay");

			if(name == true && amt == true && details == true && type == true && pay == true)
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
		    <h4 class="page-title">Add User Payment</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="payment_user.php">User Payment Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add User Payment</li>
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

		  <form action = "payment_user_process.php" method = "post" >

			
			<div class="form-group">
            <label for="input-1">User Name</label>

				<?php
					
					$tbl_name="user";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='user_id' class='form-control form-control-rounded' id='name' required/>";
					
					echo "<option value='Select'>".Select."</option>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['user_id'] ."'>" . $row['user_name']."</option>";
					}
					
					echo "</select>";
				?>
			<span id="msgname"></span>
			</div>

			<div class="form-group">
				<label for="input-5">Payment Details</label>
				  <input type="text" class="form-control form-control-rounded" id="details" placeholder="Enter Payment Details" name = "pay_details" required/>
				  <span id="msgdetails"></span>
			</div>
			
			<div class="form-group">
				  <label for="basic-select">Payment Type</label>
					<div class="col-sm-13">
				  <select class="form-control form-control-rounded" id="pay" name="pay_type">
							<option value="Select">Select</option>
							<option value="COD">Cash On Delivery</option>
							<option value="Credit Card">Credit Card</option>
							<option value="Debit Card">Debit Card</option>
							<option value="Net Banking">Net Banking</option>
						</select>
						<span id="msgpay"></span>
		</div>
		</div>
			
			<div class="form-group">
				<label for="input-5">Payment Amount</label>
				  <input type="text" class="form-control form-control-rounded" id="amt" name = "pay_amount" placeholder="Enter Payment Amount" required/>
				  <span id="msgamt"></span>
			</div>
					
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" id = "add" name = "add_payment" ><i class="icon-lock"></i> Add Payment</button>
			<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"><i class="icon-refresh"></i> Reset</button>

		</form>
		
		</div>
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
	$("#datetimepicker1").datetimepicker();

</script>