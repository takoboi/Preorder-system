<?php
		
		include ('connection.php');

		$itemID = $_REQUEST['itemid'];

		$result = "SELECT * FROM item WHERE ItemID='$itemID'";
		$QueryResult = mysqli_query($connection,$result);

		if(!$result)
		{
			die(mysqli_error);
		}

		else
		{
			echo "<html>";
			echo "<head>";
				echo "<title> Update Menu details </title>";
				echo "<link type='text/css' rel='stylesheet' href='css/updatemenu.css'>";
			echo "</head>";

			echo "<body>";

						
			while (($Row = mysqli_fetch_row($QueryResult)))
			{
				echo "<form name='UpdateMenu' action='Update.php' method='POST'>";
				echo "<center><table>
				&nbsp &nbsp &nbsp
		
					<tr>
						<td class='header' colspan='2'>Update Menu </td>
					</tr>

					<tr>
						<th>Details</th>
						<th><center>Update</center></th>
					</tr>
					
					<tr>
						<td>Item ID</td>
						<td><input type='text' name='itemid' value='$Row[0]' readonly></td>
					</tr>

					<tr>
						<td>Item Name</td>
						<td><input type='text' name='itemN' value='$Row[1]' readonly></td>
					</tr>

					<tr>
						<td>Pieces</td>
						<td><input type='number' name='pieces' value='$Row[2]' readonly></td>
					</tr>

					<tr>
						<td>Price (RM)</td>
						<td><input type='number' name='price' value='$Row[3]' readonly></td>
					</tr>

					<tr>
						<td>Crabby Crab</td>
						<td><input type='number' name='CrabbyC' min='1' max='1000' required></td>
					</tr>

					<tr>
						<td>Chicken Cheese</td>
						<td><input type='number' name='ChickenC' min='1' max='1000' required></td>
					</tr>

					<tr>
						<td>Baby Octopus </td>
						<td><input type='number' name='baby' min='1' max='1000' required></td>
					</tr>

					<tr>
						<td>Mix </td>
						<td><input type='number' name='mix' min='1' max='1000' required></td>
					</tr>

					<tr class='button'>
						<td colspan='2' class='action'><input type='submit' value='Update' class='btn'>
					&nbsp
						<input type='reset' value='Clear' class='reset' ></td> 
					</tr>
					</table><center>";
				echo "</form>";
			echo "</body>";
			echo "</html>";
			
			}
		}
		
?>
