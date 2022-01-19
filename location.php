<?php
	include('connection.php');
	

	$act = $_REQUEST['act'];


	if($act == "login")
	{
		session_start();
		$username = $_REQUEST['user'];
		$password = $_REQUEST['password'];
		$_SESSION['login_user'] = $username;
		$sql = "SELECT Username FROM admin WHERE Username='$username' AND Password='$password'";

		$query = mysqli_query($connection,$sql);
		
		if(mysqli_num_rows($query) != 0)
		{
			
			header('Location: indexAdmin.php');
			echo "<script>alert('Welcome back!')</script>";
		}
		else
		{
			
			echo "<script language='javascript' type='text/javascript'>alert('Username and password invalid'); window.history.back(-1);</script>";
		}
	}
?>