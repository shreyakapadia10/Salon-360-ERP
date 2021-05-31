<?php include('connection.php'); include('functions/functions.php'); 	include("connection1.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link rel="stylesheet" href="custom.css" />
</head>
<body style="background: #fff;">
<div class="event_wrapper">

	<form method = "POST" action = "booking_process.php">
		
		Appointment Details : <?php
					
					$tbl_name="treatment_details";
					
					$sql="select * from $tbl_name";

					$result=mysql_query($sql);

					echo "<select name='details'>";
					
					echo "<option value='Select'>Select</option>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['treatment_id'] ."'>" . $row['treatment_name']."</option>";
					}
					
					echo "</select>";
				?>
		
		<br><br>
		
		Appointment City : <select name="city">
							<option value="Select">Select</option>
							<option value="Surat">Surat</option>
							<option value="Ahmedabad">Ahmedabad</option>
							<option value="Baroda">Baroda</option>
						</select>
		
		<br><br>
		
		Payment Type : <select name="pay_type">
							<option value="Select">Select</option>
							<option value="COD">Cash On Delivery</option>
							<option value="Credit Card">Credit Card</option>
							<option value="Debit Card">Debit Card</option>
							<option value="Net Banking">Net Banking</option>
						</select>
		
		<br><br>
		
		Select Staff : <?php
					
					$tbl_name="staff";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='staff_id'>";
					
					echo "<option value='Select'>".Select."</option>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['staff_id'] ."'>" . $row['staff_name']."</option>";
					}
					
					echo "</select>";
				?>
		
		<button type="submit" name = "book" value = "Book Appointment">Book Appointment</button>
	
	</form>
	<?php $day = $_GET['day']; $month = $_GET['month']; $year = $_GET['year']; list_events($day,$month,$year);?>
</div>
</body> 
</html>