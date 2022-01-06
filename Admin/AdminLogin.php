<html>
<head>
	<title> TaKoBoi Login</title>
	<style type="text/css">
		
		body
		{
			background-color: black;
			margin: 0;
			padding: 0;
		}

		.Header
		{
			background-color: maroon;
			color: white;
			height: 5%;
			text-align: center;
			vertical-align: middle;
			line-height: 30px;
		}

		.Main
		{
			width: 600px;
			height: 230px;
			background-color: white;
			padding: 20px;
			padding-left: 15px;
			padding-right: 15px;
			border-radius: 8px;
		}

		img
		{
			width:250;
			height: 220;
			border-radius: 8px;
		}

		.logo
		{
			float: left;
			width: 270px;
			height: 220px;
		}

		.Body2
		{
			float: left;
			width: 230px;
			height: 220px;
			margin-left: 20px;
			align: center;
			width: 50%;
			text-indent: left;
		}

		.Footer
		{
			background-color: gray;
			color: white;
			height: 3%;
			text-align: center;
			vertical-align: middle;
			line-height: 20px;
		}

		

		.submit
		{
			width: 80px;
			height: 25px;
			align: right;
			border-radius: 6px;
		}

		.field
		{
			width: 250px;
			height: 25px;
			border-radius: 6px;

		}

		.empty
		{
			height: 42%;
		}

	</style>
</head>
<body>
	<form name="login" method="post" action="index.php">
		
		<div class="Header">
			<center><h2>ADMINISTATOR LOGIN</h2></center>
		</div>

		<br>

		<center>
		<div class="Main">
			<div class="logo">
				<img src="img/Takoboi logo.jpeg">
			</div>

			<div class="Body2">
			<center>
			<input type="hidden" name="act" id="act" value="login">
			<p align="left">&nbsp &nbsp &nbsp Username:</p>
			<input class="field" type="text" name="user" id="user">
			<br><br>
			<p align="left">&nbsp &nbsp &nbsp Password:</p>
			<input class="field" type="password" name="password" id="password">
			<br><br>
			<right><input class="Submit" type="submit" value="Login"></right>
			</center>
			<br><br>
			</div>
		</div>
		</center>

		<div class="empty"></div>
		<div class="Footer"><center><h5>COPYRIGHT 2021 @ TA-KO-BOI</h5></center></div>
 	</form>
</body>
</html>