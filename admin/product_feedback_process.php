<?php
	include("connection1.php");
	
	session_start();

	if(isset($_POST['upload']))
	{
			if($_FILES['file1']['name'])
			{
				$fname = $_FILES['file1']['name'];
				$arrFileName = explode('.',$_FILES['file1']['name']);
				$tmp = $_FILES['file1']['tmp_name'];
			
				if($arrFileName[1] == 'csv')
				{
					$handle = fopen($tmp, "r");
				
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
					{
						$item1 = $data[0];
						$item2 = $data[1];
						$item3 = $data[2];
						$item4 = $data[3];
						$item5 = $data[4];
						$item6 = $data[5];
						
						$import = "insert into product_feedback(product_feedback_id, product_id, user_id, rate, review, date) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6')";
							
						mysql_query($import);
					}
					
					fclose($handle);
						
					print "Import done";
				}
			}
		}


	if(isset($_GET['deleteid']) && $_GET['deleteid']!="")
		{
			$del_id=$_GET['deleteid'];
			
			mysql_query("delete from product_feedback where product_feedback_id = '$del_id' ");
			
			$_SESSION['delete_feedback'] = "<script>alert('User Deleted Successfully');</script>";
			
			header("location:product_feedback.php");	
		}
		
?>