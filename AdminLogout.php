<?php
		include('connection.php');
		

		session_destroy();
		unset($_SESSION['login_user']);
		header('Location: AdminLogin.php');
?>