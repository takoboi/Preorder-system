<?php
		include ('connection.php');
		
		echo "<style>
			.message
			{
				background-color: #ddffdd;
			  	border-left: 6px solid #4CAF50;
			  	text-align:center;
			}
		</style>";

		$name = $_POST['itemN'];

		if($name == 'Personal Takos Box (5PCS)')
		{
			$id = 1;
			$piece = 5;
			$price = 6;
		}

		else if($name == 'Munchies Takos Takos Box (8PCS)')
		{
			$id = 2;
			$piece = 8;
			$price = 8;
		}

		else if($name == 'Party Takos Box (20PCS)')
		{
			$id = 3;
			$piece = 20;
			$price = 20;
		}

		$crab = $_POST['CrabbyC'];
		$chicken = $_POST['ChickenC'];
		$baby = $_POST['BabyO'];
		$mix = $_POST['mix'];


		$sql = "INSERT INTO item (ItemID, ItemName, Pieces, ItemPrice, CrabbyCrab, ChickenCheese, BabyOctopus,Mix) VALUES ('$id','$name','$piece','$price',$crab,$chicken,$baby, $mix)";


		if(mysqli_query($connection, $sql))
		{
			echo "<div class='message'><p><strong>Success!.. New Menu inserted</strong></p></div>";	
			echo "<center><button onclick='closeWin()'> Close 'window' </button></center>";

		}
		else
		{
			die(mysqli_connect_error() . mysqli_connect_errno() );
		}
?>

<script>
	function closeWin()
	{
		window.close();
	}
</script>