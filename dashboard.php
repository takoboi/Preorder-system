<!DOCTYPE html>
		<html>
<head><title></title></head>
		
<style>
order {
    float: left;
    padding: 20px;
    width: 95%;
    background-color: white;
     }
		
table, th, td {
    border: 1px outset;
    font-size: 20px;
				}
</style>
			
<body style='background-color:black;'>
		
					<div>
						<order>
							<h1>Order Tracking</h1>
								<table style='width:100%'>
									<tr>
										<th>Customer Details</th>
                                        <th>Order Details</th>
                                        <th>Order Type</th>
										<th>Location Details</th> 
										<th>Comment</th>
                                        <th>Payment Status</th>
									</tr>
<?php

	include ('connection.php');
	
	$query = "SELECT * FROM details INNER JOIN payment ON details.CustomerID=payment.order_id INNER JOIN orderlist ON orderlist.customer_id=payment.order_id INNER JOIN menulist ON orderlist.item_ID=menulist.item_ID";
   
	
	$query_run = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($query_run) > 0)
	{
				
		foreach($query_run as $row):
				
	?>
		<tr>
				   
					<td> 
						<p><?php echo $row['CustFName']; ?>
                        <?php echo $row['CustLName']; ?></p>
                        <p><?php echo $row['CustEmail']; ?></p>
                        <p><?php echo $row['CustPhNo']; ?></p>
                    </td>

                    <td>
                    	<p><?php echo $row['item_name']; ?></p>
                        <p><?php echo $row['quantity']; ?></p>
                    </td>

					<td><?php echo $row['ordertype']; ?></td>

                    <td>

                    	<p><?php echo $row['pickupLocation']; ?></p>
                        <p><?php echo $row['deliveryaddress']; ?></p>
                    </td>

					<td><?php echo $row['comment']; ?></td>

					<td>

						<p><?php echo $row['method']; ?></p>
                        <p><?php echo $row['banktype']; ?></p>
                        <p><?php echo $row['amountpaid']; ?></p>
                    </td>
        </tr>
	<?php
		endforeach;
	}
	else 
	{
		echo "NULL";
	}
			
?>
								
					
				