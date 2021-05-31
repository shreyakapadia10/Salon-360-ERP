 <?php 

	session_start();

		
		include("connection1.php");

		if(isset($_POST['reset_password']))
		{
			$otp=$_POST['otp'];
			$n_pass=$_POST['new_pass'];
			$r_pass=$_POST['re_pass'];
			$email=$_SESSION['email'];
			echo $email;
			echo $otp;
			
			if($otp==$_SESSION['otp'])
			{
					mysql_query("select * from admin where admin_email='$email'");
			
					if($n_pass==$r_pass)
					{
					
					mysql_query("update admin set admin_password='$n_pass' where admin_email='$email'");
					
					unset($_SESSION['otp']);
					unset($_SESSION['email']);
					
					$_SESSION['update_pass']="<script>alert('Password Updated Successfully..!');</script>";
					
					header("location:index.php");
					}

			
					else
					{
					$_SESSION['update_pass']="<script>alert(Passwords are not matching.!');</script>";
				
					header("location:admin_update_pass.php");
					}	
			}	
			
			else
			{
				header("location:admin_update_pass.php");
			}
		}		
	
?>