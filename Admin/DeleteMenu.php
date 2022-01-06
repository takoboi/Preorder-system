<?php
		include ('connection.php');

		$itemID = $_REQUEST['itemid'];

		$sql = "DELETE FROM item WHERE ItemID = '$itemID'";

		if(mysqli_query($connection,$sql))
		{
			echo "<link type='text/css' rel='stylesheet' href='css/delete.css'>";
			echo "<div class='message'><center><p><strong>Success!.. Menu Deleted</strong></p></center></div>";
			header("refresh:1; url=ViewMenuAdmin.php");
		}	
		else
		{
			echo "<div class='fail'><p><strong>Fail!.. Record not deleted</strong></p></div>";
		}
			
?>