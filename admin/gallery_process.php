<?php 

	include("connection1.php");
	
	session_start();

	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{		
		if(isset($_POST['add_image']))
		{
			$i_name = $_POST['i_name'];
			$i_type = $_POST['v_name'];
			
			$s_name = $_FILES['s_pics']['name'];
			$s_tmpname = $_FILES['s_pics']['tmp_name'];
			$s_type = $_FILES['s_pics']['type'];
					
			move_uploaded_file($s_tmpname,"gallery/".$s_name);
			
			$add = mysql_query("insert into gallery(image_name, image_type, salon_pics) values ('$i_name','$i_type','$s_name')");
			
			if($add == TRUE)
			{
				$_SESSION['add_gallery'] = "<script>alert('Image Added Successfully') ;</script>";
				
				header("location:gallery.php");
			}
			
			else
			{
				$_SESSION['add_gallery'] = "<script>alert('Image Can't Be Added') ;</script>";
				
				header("location:gallery.php");
			}
		}

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
						$item7 = $data[6];
						
						$import = "insert into gallery(image_id, image_name, image_type, salon_pics, video, video_name, video_type) values('$item1','$item2', '$item3' , '$item4' , '$item5', '$item6', '$item7')";
							
						mysql_query($import);
					}
					
					fclose($handle);
						
					print "Import done";
				}
			}
		}
		
		if(isset($_POST['update']) )
		{
			$id=$_POST['editid'];
			
			// $i_id = $_POST['i_id'];
			$i_name = $_POST['i_name'];
			// $v_name = $_POST['v_name'];
			
			if(isset($_FILES['s_pics']['name']) && $_FILES['s_pics']['name']!="")
			{
				$s_name = $_FILES['s_pics']['name'];
				$s_tmpname = $_FILES['s_pics']['tmp_name'];
				$s_type = $_FILES['s_pics']['type'];
						
				move_uploaded_file($s_tmpname,"gallery/".$s_name);
				
				if(mysql_query("update gallery set image_name='$i_name',salon_pics='$s_name' where image_id='$id'"))
				{
					$_SESSION['update_gallery']="<script>alert('Image Updated Successfully');</script>";
				
					header("location:gallery.php");
				}
			}
		}
		if(isset($_GET['del']) && $_GET['del']!="")
		{
			$id=$_GET['del'];
			
			mysql_query("delete from gallery where image_id='$id'");
			
			$_SESSION['delete_gallery']="<script>alert('Image Deleted Successfully');</script>";
			
			header("location:gallery.php");
		}
	}
?>