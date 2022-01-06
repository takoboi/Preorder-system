<?php
		include ('connection.php');

		$result = "SELECT * FROM item";
		$QueryResult = mysqli_query($connection, $result);
		

		if(!$result)
		{
			die(mysqli_error);
		}

		else
		{
			echo "<html>";
			echo "<head>";
				echo "<title>View Menu</title>";
				echo "<link type='text/css' rel='stylesheet' href='css/ViewMenuAdmin.css'>";
?>
				<script>
						function myfunction()
						{
							const myWindow = window.open("InsertMenu.php", "", "width=300,height=275,top=1000, left=1500");
						}
				</script>
<?php
			echo "</head>";
			echo "<body>";
			echo "<table>
			<br><br>
				<tr>
					<td class='Header' colspan='10'>Menu</td>
				</tr>

				<tr>
					<td class='header1' colspan='4'>Insert Menu </td>
					<td class='button1' colspan='2'><button class='insert' onclick='myfunction()'><span>Insert</span></button></td>
				</tr>

				<tr>
					<td class='empty' colspan='4'>&nbsp</td>
				</tr>

				<tr class='header2'>
					<td rowspan='2'> Item ID </td>
					<td rowspan='2'> Item Name </td>
					<td rowspan='2'> Pieces </td>
					<td rowspan='2'> Item Price (RM)</td>
					<td colspan='4'><center> Quantity (Takoyaki Flavor)</center></td>
					<td class='action' colspan='2' rowspan='2'>Action</td>
				</tr>

				<tr class='header2'>
					<td> Crabby Crab </td>
					<td> Chicken Cheese </td>
					<td> Baby Octopus </td>
					<td> &nbsp&nbsp Mix &nbsp&nbsp</td>
				</tr>";

				while (($Row = mysqli_fetch_row($QueryResult)))
				{
					header("refresh:1.5");
					echo "<tr class='detail'>";
						echo "<td> {$Row[0]} </td>";
						echo "<td> {$Row[1]} </td>";
						echo "<td> {$Row[2]} </td>";
						echo "<td> {$Row[3]} </td>";
						echo "<td> {$Row[4]}  </td>";
						echo "<td> {$Row[5]}  </td>";
						echo "<td> {$Row[6]}  </td>";
						echo "<td> {$Row[7]}  </td>";
						echo "<td><a href='UpdateMenu.php?itemid=$Row[0]'><button class='update'><img src='img/edit.png'></button></a></td>";
						echo "<td><a href=\"DeleteMenu.php?itemid=$Row[0]\" onclick=\"return confirm('You sure want to delete this menu?')\"><button class='delete'><img src='img/delete.png'></button></a></td>";
					echo "</tr>";	
				}
			echo "</table>";
			echo "</body>";
			echo "</html>";

		}

?>