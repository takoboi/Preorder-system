<?php
include 'connect.php';
if(isset($_POST["submit"]))
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
			   '".$_POST["CustFName"]."',
			   '".$_POST["CustLName"]."',
			   '".$_POST["CustEmail"]."',
			   '".$_POST["CustPhNo"]."',
			   '".$_POST["ordertype"]."'
                '".$_POST["pickupLocation"]."',
			   '".$_POST["deliveryaddress"]."',
			   '".$_POST["datetime"]."',
			   '".$_POST["comment"]."',
			 )";

	if(mysqli_query($conn,$sql))
	{
		
   echo "<script>alert('Order details saved! Please proceed to payment.')</script>";
	
 }
	 else
	{  
	 echo "Error:".$sql."<br>".mysqli_error($conn);
	  }
	  	
}

mysqli_close($conn);
?>