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
			
			var sid,aid,name,type,price,pay;
			
			aid = test_drop("#aid","#msgaid");
			
			sid = test_drop("#sid","#msgsid");
			
			name = test_name("#name","#msgname");

			type = test_name("#type","#msgtype");

			price = test_num("#price","#msgprice");

			pay = test_drop("#pay","#msgpay");

			if(name == true && uid == true && sid == true && price == true && type == true && pay == true)
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
		    <h4 class="page-title">Add Purchase</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="Purchase.php">Purchase Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Purchase</li>
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

		  <form action = "purchase_process.php" method = "post" >
		
		<div class="form-group">
            <label for="input-2">Admin Name</label>
			 <?php
						
					$tbl_name="admin";
					
					$sql="select * from $tbl_name";

					$result=mysql_query($sql);

					echo "<select name='admin_id' class='form-control form-control-rounded' id='aid' required/>";
					
					echo "<option value='Select'>".Select."</option>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['admin_id'] ."'>" . $row['admin_name']."</option>";
					}
					
					echo "</select>";
				?>
		<span id="msgaid"></span>
		</div>
		
		<div class="form-group">
            <label for="input-3">Supplier Name</label>
			  <?php
						
					$tbl_name="supplier";
					
					$sql="select * from $tbl_name";

					$result=mysql_query($sql);

					echo "<select name='supplier_id' class='form-control form-control-rounded' id='sid' required/>";
					
					echo "<option value='Select'>".Select."</option>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['supplier_id'] ."'>" . $row['supplier_name']."</option>";
					}
					
					echo "</select>";
				?>
		<span id="msgsid"></span>
		</div>
		
			<div class="form-group">
            <label for="input-4">Purchased Item Name</label>
				  <input type="text" class="form-control form-control-rounded" id="name" placeholder="Enter Purchased Item Name" name = "p_name" required/>
			<span id="msgname"></span>
			</div>

			<div class="form-group">
            <label for="input-5">Purchased Item Price</label>
				  <input type="text" class="form-control form-control-rounded" id="price" placeholder="Enter Purchased Item Price" name = "p_price" required/>
				  <span id="msgprice"></span>
			</div>
			
			<div class="form-group">
            <label for="input-6">Purchased Item Type</label>
				  <input type="text" class="form-control form-control-rounded" id="type" placeholder="Enter Purchased Item Type" name = "p_type" required/>
				  <span id="msgtype"></span>
			</div>
			
			<div class="form-group">
            <label for="input-6">Quantity</label>
				  <input type="text" class="form-control form-control-rounded" id="type" placeholder="Enter Quantity" name = "p_quantity" required/>
				  <span id="msgtype"></span>
			</div>
			
		
		<div class="form-group">
			<label for="basic-select">Payment Type</label>
				<div class="col-sm-13">
				  <select class="form-control form-control-rounded" id="basic-select" name="pay_type">
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
			<label for="basic-select">Payment Status</label>
				<div class="col-sm-13">
				  <select class="form-control form-control-rounded" id="basic-select" name="pay_status">
							<option value="Select">Select</option>
							<option value="pending">Pending</option>
							<option value="done">Done</option>
		    		</select>
					<span id="msgpay"></span>
		</div>
		</div>
				
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "add_purchase" id = "add"><i class="icon-lock"></i> Add Purchased Item</button>
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