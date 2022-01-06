<?php

		include ('connection.php');

		$itemID = $_REQUEST['itemid'];


		$result = "UPDATE item SET CrabbyCrab='$_POST[CrabbyC]', ChickenCheese='$_POST[ChickenC]', BabyOctopus='$_POST[baby]', Mix='$_POST[mix]' WHERE ItemID='$itemID'";

		

		if(!mysqli_query($connection,$result))
		{
			die(mysqli_error);
		}
		else
		{
			echo "<link type='text/css' rel='stylesheet' href='css/update.css'>";
			echo "<div class='message'><center><p><strong>Success!.. Ticket Details Updated</strong></p></center></div>";
			header("refresh:1; url=ViewMenuAdmin.php");
		}
?>