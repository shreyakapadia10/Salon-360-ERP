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
		
		if(isset($_GET['editid']))
		{
			$id=$_GET['editid'];
			
			$query=mysql_query("select * from city where city_id='$id'");
			$result=mysql_fetch_array($query);
?>

<div class="col-12 grid-margin">
         <div class="card">
	<div class="card-body">
	  <h2><u>Update Payment</h2></u>

		  <form class="forms-sample" action = "city_process.php" method = "post" >

			<div class="row">
				  <div class="col-md-6">
					<div class="form-group row">
					  <label class="col-sm-3 col-form-label">City ID</label>
					  <div class="col-sm-9">
				  <input type="text" class="form-control" id="exampleInputName1" name = "city_id" value="<?php echo $result['city_id']; ?>" disabled>
			</div>
			</div>
			</div>
			</div>

			<div class="row">
				  <div class="col-md-6">
					<div class="form-group row">
					  <label class="col-sm-3 col-form-label">City Name</label>
					  <div class="col-sm-9">
				  <input type="text" class="form-control" id="exampleInputName1" name = "city_name" value="<?php echo $result['city_name']; ?>" >
			</div>
			</div>
			</div>
			</div>
			
		<input type="hidden" name="editid" value="<?php echo $result['city_id']; ?>">
		<input type="submit" class="btn btn-success mr-2" name = "update" value = "Update City"></button>
		<button class="btn btn-danger" type = "reset">Reset</button>

		</form>
		
		</div>
	</div>
</div>


<?php
		}
		include("footer.php");
	}
?>
?>