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
			
			var sid,uid,name,type,price,pay;
			
			uid = test_drop("#uid","#msguid");
			
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
		    <h4 class="page-title">Add City</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="city.php">City Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add City</li>
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

			<form action = "city_process.php" method = "post" >
		
			<div class="form-group">
            <label for="input-1">City Name</label>
				  <input type="text" class="form-control form-control-rounded" id="input-1" placeholder="Enter City" name = "city_name" required/>
			</div>
			
			<div class="form-group">
            <label for="input-1">User Name</label>

				<?php
					
					$tbl_name="user";
					
					$sql="select * from $tbl_name";

					$result=mysql_query($sql);

					echo "<select id = 'uid1' name='u_id' class='form-control form-control-rounded'  >";
					
					echo "<option value='Select'>Select</option>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['user_id'] ."'>" . $row['user_name']."</option>";
					}
					
					echo "</select>";
				?>
				<span id="msguid1"></span>
			</div>
			
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "add_city" ><i class="icon-lock"></i> Add City</button>
			<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"><i class="icon-refresh"></i> Reset</button>

		</form>
		
		</div>
	</div>
</div>

<?php

		include("footer.php");
	}
?>