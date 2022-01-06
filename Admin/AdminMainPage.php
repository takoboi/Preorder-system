<?php
	include('connection.php');
?>

<html>

<head>
	<title>Admin Page</title>
	<style type="text/css">

		body
		{
			margin: 0;
			padding: 0;
		}

		table
		{
			margin: 0;
			padding: 0;
			width: 100%;
			height: 100%;
			border:solid black;
		}

		td
		{
			border:solid black;
		}

		iframe
		{
			width: 100%;
			height: 100%;
			background-color: white;
			align: center;
		}

		.menu
		{
			vertical-align: top;
			text-align: center;
		}

		.first
		{
			width: 7%;
		}

		.third
		{
			width: 7%;
		}

		.header
		{
			background-color: maroon;
			color: white;
			text-align: center;
			vertical-align: middle;
			line-height: 40px;
			height: 5%;

		}

		.body
		{
			background-color: gray;
			color: white;
		}

		.admin
		{
			width: 100;
			height: 100;
			border-radius: 50px;
			border: solid black;
		}

		.dashboard
		{
			width: 50;
			height: 50;
		}

		.title_main
		{
			font-size: 200%;
		}

		.footer
		{
			background-color: gray;
			text-align: center;
			color: white;
			height: 2%;
			font-size: 100%;
		}

		.message
		{
			width: 50;
			height: 50;
			border-radius: 50px;
		}

		.logout
		{
			width: 50;
			height: 50;
			vertical-align: middle;
		}

		.dash
		{
			width: 20;
			height: 20;
			vertical-align: middle;
			border-radius: 30px;
			border: solid black;
		}

		.menu1
		{
			width: 20;
			height: 20;
			vertical-align: middle;
			border-radius: 30px;
			border: solid black;
		}

		a
		{
			color: white;
			text-decoration: none;
		}

		.logout:hover
		{
			color: blue;
		}

	</style>
</head>

<body>
	<div class="main">
			<table>
				<tr class="header">
					<td class="first"><a href="AdminLogout.php" onClick="return confirm('Are you sure you want to log out?');"><img class="logout" src="img/logout.png"></a></td>
					<td class="title_main">DASHBOARD</td>
					<td class="third"><img class="message" src="img/message.jpg"></td>
				</tr>

				<tr class="body">
					<td class="menu">
						<br>
						<img class="admin" src="img/adminlogo.jpg">
						<br>
						Admin
						<br><br>
						<img class="dash" src="img/dash.png"> Dashboard
						<br><br>
						<a href="ViewMenuAdmin.php" target='frame'><img class="menu1" src="img/menu.png"> Menu</a>
					</td>
					<td rowspan="1" colspan="2"><iframe name="frame" src=""></iframe></td>
				</tr>

				<tr>
					<td class="footer" colspan="3">COPYRIGHT 2021 @ TA-KO-BOI</td>
				</tr>

			</table>
		</div>

	</div>
</body>
</html>

<?php
	if(!isset($_SESSION['login_user']))
	{
		header('Location: AdminLogin.php');
	}
	
?>