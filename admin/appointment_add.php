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
	
		$("#book_app").click(function(){
			
			var uid,sid,city,pay,details;
			
			uid = test_drop("#uid1","#msguid1");
			
			sid = test_drop("#sid1","#msgsid1");

			city = test_drop("#city","#msgcity");

			pay = test_drop("#pay","#msgpay");

			details = test_name("#details","#msgdetails");

			if(uid == true && sid == true && city == true && pay == true && details == true)
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
		    <h4 class="page-title">Add Appointment</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="appointment.php">Appointment Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Appointment</li>
         </ol>
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->

	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				<div class="card">
				<div class="card-body" >
          
            <form action="appointment_process.php" method="post">

			<div class="form-group">
            <label for="input-1">User Name</label>

				<?php
					
					$tbl_name="user";
					
					$sql="select * from $tbl_name";

					$result=mysql_query($sql);

					echo "<select id = 'uid1' name='user_id' class='form-control form-control-rounded'  >";
					
					echo "<option value='Select'>Select</option>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['user_id'] ."'>" . $row['user_name']."</option>";
					}
					
					echo "</select>";
				?>
				<span id="msguid1"></span>
			</div>
			
			<div class="form-group">
            <label for="input-1">Staff Name</label>

				<?php
					
					$tbl_name="staff";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select id = 'sid1' name='staff_id' class='form-control form-control-rounded'  required/>";
					
					echo "<option value='Select'>".Select."</option>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['staff_id'] ."'>" . $row['staff_name']."</option>";
					}
					
					echo "</select>";
				?>
			<span id="msgsid1"></span>
			</div>

			<div class="form-group">
				<label for="input-2">Appointment Details</label>
					<input type="text" class="form-control form-control-rounded" placeholder="Enter Appointment Details" id = "details" name = "appointment_details" required/>
					<span id="msgdetails"></span>
			</div>
			
			<div class="form-group">
				<label for="input-3">Appointment Date and Time</label>
					<input type = "text" class="form-control form-control-rounded" id="datetimepicker" placeholder="Enter Date and Time" name="datetime" required/>
			</div>

			<div class="form-group">
				  <label for="basic-select">City</label>
					<div class="col-sm-13">
						<select class="form-control form-control-rounded" id="city" name="appointment_city">
							<option value="Select">Select</option>
							<option value="Surat">Surat</option>
							<option value="Ahmedabad">Ahmedabad</option>
							<option value="Baroda">Baroda</option>
						</select>
						<span id="msgcity"></span>
			</div>
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
		
			
			<button type="submit" id = "book_app" class="btn btn-success btn-round waves-effect waves-light m-1" name = "add_appointment" value = "Book Appointment"><i class="icon-lock"></i> Book Appointment</button>
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

</script>