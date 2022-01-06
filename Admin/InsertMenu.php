<?php
	include ('connection.php');
?>

<html>
<head>
		<title>Insert Menu</title>
		<style type="text/css">
			body
			{
				background-color: black;
			}

			table
			{
				background-color: white;
				border: solid black;
				border-radius: 6px;
			}

			td
			{
				font-weight: bold;
			}

			.header1
			{
				border: solid black;
				background-color: maroon;
				color: white;
				text-align: center;
			}

			input[type=submit], input[type=reset]
			{
				width: 40%;
				border-radius: 6px;
			}

			input[type=submit]:hover
			{
				background-color: green;
				color: white;
			}

			input[type=reset]:hover
			{
				background-color: red;
				color: white;
			}

			input
			{
				border-radius: 6px;
			}

			select
			{
				border-radius: 6px;
			}

		</style>
</head>

<body>
<form name='menu' action='insert.php' method='POST' enctype="multipart/form-data">
	<table class="box">
		<tr class='header'>
				<td class='header1'><h2 class='head'> Menu Details </h2></td>
		</tr>
		
		<tr>
			<td>
				Item Name: <select id='itemN' name='itemN'>
							<option value='Personal Takos Box (5PCS)'>Personal Takos Box (5PCS)</option>
							<option value='Munchies Takos Takos Box (8PCS)'>Munchies Takos Takos Box (8PCS)</option>
							<option value='Party Takos Box (20PCS)'>Party Takos Box (20PCS)</option>
							</select>

			</td>
		</tr>	

		<tr>
			<td>Crabby Crab Quantity: <input type='number' id='CrabbyC' name='CrabbyC' min="1"max="1000"></td>
		</tr>

		<tr>
			<td>Chicken Cheese Quantity: <input type='number' id='ChickenC' name='ChickenC' min="1"max="1000"></td>
		</tr>

		<tr>
			<td>Baby Octopus Quantity: <input type='number' id='BabyO' name='BabyO' min="1"max="1000"></td>
		</tr>
						
		<tr>
			<td>Mix Quantity: <input type='number' id='mix' name='mix' min="1"max="1000"></td>
		</tr>

		<tr>
			<td class="action"><center><input type='submit' value='Add Menu '> <input type='reset' value='Clear' ></center></td>
		</tr>
	</table>
</form>
</body>

</html>