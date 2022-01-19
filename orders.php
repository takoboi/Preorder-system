<?php
include 'connect.php';
if (isset($_POST["submit"]))
{
    $sql = "INSERT INTO details
	        (  
	           CustFName,
			   CustLName,
			   CustEmail,
			   CustPhNo,
			   ordertype,
               pickupLocation,
               deliveryaddress,
               datetime,
               comment
			)
			VALUES
			(
			   '" . $_POST["CustFName"] . "',
			   '" . $_POST["CustLName"] . "',
			   '" . $_POST["CustEmail"] . "',
			   '" . $_POST["CustPhNo"] . "',
			   '" . $_POST["ordertype"] . "',
               '" . $_POST["pickupLocation"] . "',
			   '" . $_POST["deliveryaddress"] . "',
			   '" . $_POST["datetime"] . "',
			   '" . $_POST["comment"] . "'
			 )";

    if (mysqli_query($conn, $sql))
    {
        echo "<script>alert('Detail saved. Proceed to ordering!')</script>";
    }
    else
    {
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }

}

if (isset($_POST["addcart"]))
{
    $sql3 = "INSERT INTO orderlist
	        (  
	           customer_id,
			   item_ID,
			   flavorID,
			   quantity

			)
			VALUES
			(
			   '" . $_POST["customer_id"] . "',
			   '" . $_POST["item_ID"] . "',
			   '" . $_POST["flavor"] . "',
			   '" . $_POST["quantity"] . "'
			   
			 )";

    if (mysqli_query($conn, $sql3))
    {

        echo "<script>alert('Cart updated!')</script>";

    }
    else
    {
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<!--****************************************************METADATA****************************************************-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/css/styles2.css">
        <link rel="stylesheet" href="assets/css/custdetails.css">
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css'><link rel="stylesheet" href="assets/css/style.css">
        <title>TA-KO-BOI KUCHING: JAPANESE NO.1 STREET FOOD</title>
		
    </head>
		<style>


			td, th {
			border-style:none;
			background-color:rgb(19, 19, 19); color: white;
			}

			.tab {
				display: inline-block;
				margin-left: 40px;
			}

			.input-icons i {
					position: absolute;
				}
				  
				.input-icons {
					width: 100%;
					margin-bottom: 10px;
				}
				  
				.icon {
					padding: 10px 20px 100px 10px;
					color: rgb(19, 19, 19);
					min-width: 50px;
					text-align: center;
				}
				  
				.input-field {
					width: 100%;
					padding: 10px;
					text-align: center;
				}	
				h2{
				font-family: "Open Sans Condensed";
				
			}
		</style>
	
<!--****************************************************METADATA END****************************************************-->
<body>


<!--*******************************************HEADER (LINK HERE)****************************************************-->
        
         <header style="text-align: center" class="headertb" id="header">
            <nav class="nav bd-container">	
					<img src="assets/img/nobgv2.png" class="center2">	
             
            </nav>
        </header>

<!--**************************************************** HEADER END ****************************************************-->


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ CODE PAYMENT HERE ++++++++++++++++++++++++++++++++++++++++++++++++-->
 
<!--********** PROGRESS BAR **********-->
<br>
<br>
<div class="outerwrapper">

	<ul class="wizard-steps pull-right">
		<li class="completed-step">
			<a id="order-details" href="detailss.php">Order Details</a>
		</li>
		<li class="active-step">
			<a id="place-order" href="orders.php"> Place Order</a>
		</li>
		<li>
			<a id="payment" href="payments.php"> Payment </a>
		</li>
				  
	</ul>

</div>  




<div style="display: table;background-color:rgb(19, 19, 19); padding: 10px; margin: auto;width: 90%;text-align: center; border-radius:15px;">
	
	<br> <h2>Takoboi Menu List</h2><br>
	<table style="table-layout:fixed; margin: auto;width: 100%;">
	<thead> 
	<tr>
    
    <th class="hide">Menu Set</th>
    <th>Name</th>
    <th class="hide">Description</th>
    <th class="hide">Price</th> 
    <th>Flavour</th>
	<th class="hide">Quantity</th>
	<th></th>
	</thead>
	</tr>
  
  
    
<?php
$query = "SELECT * FROM menulist;";
$query_run = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($query_run))
{

?>
<tbody>
<tr>
<form action="orders.php" method="POST">
    
	<td class="hide">
		<img src="<?php echo "assets/img/" . $row['item_photo']; ?>" width="100%" height="100%">
	</td>
    
	<td>
		<input type="hidden" value="<?php echo $row['item_ID'] ?>" name="item_ID" >
		<?php echo $row['item_name']; ?>
	</td>
    
	<td class="hide">
		<?php echo $row['item_desc']; ?>
	</td>

	<td class="hide"> RM
		<?php echo $row['item_price']; ?>
	</td>

	<td>
		<select name="flavor" style="width:100;"> 
		<?php
		$query1 = "SELECT * FROM flavor_avail;";
		$query_run1 = mysqli_query($conn, $query1);

	while ($row1 = mysqli_fetch_assoc($query_run1)){
	?>
		<option value="<?php echo $row1['flavorID'] ?>" name="flavorID" > <?php echo $row1['flavorName'] ?> </option>
	<?php
	} ?>
		</select>
	</td>

	<td class="hide"> 
		<input type="number" name="quantity" id="quantity" value="1" max="10" style="margin:auto;width:50%;" >
	</td>


	<td> 
	<?php
		$query2 = "SELECT * FROM details ORDER BY CustomerID DESC LIMIT 1;";
		$query_run2 = mysqli_query($conn, $query2);

		while ($row2 = mysqli_fetch_array($query_run2))
		{
		?>
		<input type="hidden" name="customer_id" value="<?php echo $row2['CustomerID'] ?>">
		<?php
		}
		?>
			
		<input class="hide" type="submit" style="width:80px;height:40px;text-align:center;padding-right:4px;" name="addcart" value="Add to Cart">
		<div class="show input-icons">
		<i class="bx bx-cart icon" style="color:rgb(19, 19, 19);pointer-events: none;"></i>
		<input class="input-field" type="submit" style="width:40px;text-align:center;padding-right:4px;" name="addcart" value="   ">
		<div>
	</td>

</tr>
</form>
<?php
} ?>
</tbody>
</table>

<!--******************** CART ************************-->

<div style="width: 100%;margin: auto;width: 90%;text-align: center;">
<h4 style="margin-bottom:7px;"> Check Your Order Cart </h4>
  
  <table style="border: 3px solid white;">
  
  <tr style="text-align: left;border-bottom: 0.5px solid #ddd;">
    <td></td>
    <td style="text-align:right">Amount (RM)</td>
  </tr>
  
 
  
  <?php
$qry = "SELECT * FROM details ORDER BY CustomerID DESC LIMIT 1;";
$rs = mysqli_query($conn, $qry);
$getRowAssoc = mysqli_fetch_assoc($rs);
$cust_id = $getRowAssoc['CustomerID'];

$query4 = "SELECT *,quantity*item_price AS amount FROM orderlist INNER JOIN menulist ON orderlist.item_ID = menulist.item_ID INNER JOIN flavor_avail ON orderlist.flavorID = flavor_avail.flavorID WHERE customer_id=$cust_id;";

$query_run4 = mysqli_query($conn, $query4);

while ($row4 = mysqli_fetch_array($query_run4))
{

?>
<tr style="text-align: left;border-bottom: 0.5px solid #ddd;">
	<td><?php echo $row4['quantity'] ?> <?php echo $row4['item_name'] ?> - <?php echo $row4['flavorName'] ?></td>
  <td style="text-align:right"><?php echo $row4['amount'] ?></td>
   <?php
} ?>
     
  </tr>
 
  
</table>
 <?php
$qry = "SELECT * FROM details ORDER BY CustomerID DESC LIMIT 1;";
$rs = mysqli_query($conn, $qry);
$getRowAssoc = mysqli_fetch_assoc($rs);
$cust_id = $getRowAssoc['CustomerID'];

$query4 = "SELECT SUM(quantity*item_price) AS total FROM orderlist INNER JOIN menulist ON orderlist.item_ID = menulist.item_ID INNER JOIN flavor_avail ON orderlist.flavorID = flavor_avail.flavorID WHERE customer_id=$cust_id;";

$query_run4 = mysqli_query($conn, $query4);

while ($row4 = mysqli_fetch_array($query_run4))
{

?>


<h4 style="text-align:right;padding-right:12px">Total : RM <?php echo $row4['total'] ?></h4>

 <?php
} ?>
</div>

<form action="payments.php" method="POST">
 <div class="wrapper">
          <input type="submit" name="checkout" value="Proceed" class="btn">
        </div>
</form>
  
</div>
		
<br>
			
		
<!--************** END PROGRESS BAR ****************-->
        
        
					
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ END PAYMENT CODE ++++++++++++++++++++++++++++++++++++++++++++++++-->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>

    </body>
</html>
