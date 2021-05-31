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
			
			$query=mysql_query("select * from salary s,staff st where salary_id='$id' && s.staff_id=st.staff_id");
			$result=mysql_fetch_array($query);
			
?>

<div class="clearfix"></div>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Update Salary</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Salon 360 ERP</a></li>
            <li class="breadcrumb-item"><a href="salary.php">Salary</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Salary</li>
         </ol>
	   </div>
   </div>
   
<div class="row">
<div class="col-lg-6">
	<div class="card">
	   <div class="card-body">
			<div class="card-title">Update Salary</div> <hr>

			<form class="forms-sample" action = "salary_process.php" method = "post" >

			<div class="form-group">
					<label for="input-6">Salary ID</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "sal_id" value="<?php echo $result['salary_id']; ?>" disabled>
			</div>

			<div class="form-group">
					<label for="input-6">Staff name</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "s_id" value="<?php echo $result['staff_name']; ?>" disabled>
			</div>
			
			<div class="form-group">
					<label for="input-6">Salary</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "sal" value="<?php echo $result['salary']; ?>">
			</div>
				
			<div class="form-group">
					<label for="input-6">Commission</label>
						<input type="text" class="form-control form-control-rounded" id="input-6" name = "com" value="<?php echo $result['commission']; ?>">
			</div>
				
			<div class="form-group">
					<label for="input-6">Salary Date</label>
						<input type="text" class="form-control form-control-rounded" id = "datetimepicker" name = "s_date" value="<?php echo $result['salary_date']; ?>">
			</div>
						
			<input type="hidden" name="editid" value="<?php echo $result['salary_id']; ?>">
			<button type="submit" class="btn btn-success btn-round waves-effect waves-light m-1" name = "update"> <i class="zmdi zmdi-edit"></i> Update Salary</button>
			<button class="btn btn-danger btn-round waves-effect waves-light m-1" type = "reset"> <i class="zmdi zmdi-refresh"></i> Reset</button>

		</form>
		
		</div>
	</div>
</div>
</div>
</div>
</div>

<?php
		}
		include("footer.php");
	}
?>