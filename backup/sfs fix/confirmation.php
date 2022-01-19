<?php
include 'connect.php';
if(isset($_POST["checkout"]))
{
	
    $sql2 = "INSERT INTO payment
	        (  
	           order_id,
			   method,
			   banktype,
			   amountpaid
			)
			VALUES
			(
			   '".$_POST["cust_id"]."',
			   '".$_POST["paymentmethod"]."',
			   '".$_POST["banktype"]."',
			   '".$_POST["total"]."'
			 )";
			 

	if(mysqli_query($conn,$sql2))
	{
		
   echo "<script>alert('Payment completed successfully! Please check your email.')</script>";
    header( "refresh:3; url=confirmation.php" ); 
 }
	 else
	{  
	 echo "Error:".$sql2."<br>".mysqli_error($conn);
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
        
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css'><link rel="stylesheet" href="assets/css/style.css">
        <title>TA-KO-BOI KUCHING: JAPANESE NO.1 STREET FOOD</title>
    </head>
	
<!--****************************************************METADATA END****************************************************-->
    <body>


<!--*******************************************HEADER (LINK HERE)****************************************************-->
       <header style="text-align: center" class="headertb" id="header">
            <nav class="nav bd-container">	
					<img src="assets/img/nobgv2.png" class="center2">	
             
			  </a>
			  
            </nav>
        </header>
<style>
			table {
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 0.5px solid #000000;
			  text-align: right;
			  padding-left: 3px;
			  padding-right: 10px;
			  background-color: #FFFFFF;
			   color:black;
			}

			.btn {
				background-color: white;
				color: rgb(19, 19, 19);
				padding: 12px;
				margin: 10px 0;
				border: none;
				width: 40%;
				border-radius: 3px;
				cursor: pointer;
				font-size: 17px;
			}

			.btn:hover {
			  background-color:rgb(19, 19, 19);
			  color: white;
			}
			
			.t-box{
				width: 75%;
				background-image: url(assets/img/japanesesea.png); 
				text-align: center;
				border-radius: 5px;
				padding: 20px;
				
			}
			img.center {
				position: relative;
				display: block;
				top: 0;
				bottom: 0;
				left: 0;
				right: 0;
				margin: auto;
			}
			.t-text{
				padding: 15px 10px 25px 10px;
				position:relative;
				letter-spacing:2px; 
				text-align: center; 
				font-size: 1.5rem; 
				font-family: 'Open Sans', sans-serif;
			}
			.loader {
				display: block;
				top: 0;
				bottom: 0;
				left: 0;
				right: 0;
				margin: auto;
				border: 10px solid white;
				border-top: 10px solid #C21121;
				border-radius: 50%;
				width: 50px;
				height: 50px;
				animation: spin 2s linear infinite;
				}
			h1{font-family:"Open Sans Condensed";			}
			h3{font-family:"Open Sans";			}
			h5{font-family:"Open Sans";			}

	</style>

<!--**************************************************** HEADER END ****************************************************-->


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ CODE CONFIRMATION HERE ++++++++++++++++++++++++++++++++++++++++++++++++-->
 
<br>
<br>
<br>
<br>
<br>
<div class="center t-box" >

<?php

$qry = "SELECT * FROM details ORDER BY CustomerID DESC LIMIT 1;";
$rs = mysqli_query($conn,$qry);
$getRowAssoc = mysqli_fetch_assoc($rs);
$cust_id= $getRowAssoc['CustomerID'];
$email= $getRowAssoc['CustEmail'];


$qry3 = "SELECT SUM(quantity*item_price) AS total FROM orderlist INNER JOIN menulist ON orderlist.item_ID = menulist.item_ID INNER JOIN flavor_avail ON orderlist.flavorID = flavor_avail.flavorID WHERE customer_id=$cust_id;";
$rs3 = mysqli_query($conn,$qry3);
$getRowAssoc3 = mysqli_fetch_assoc($rs3);
$total= $getRowAssoc3['total'];
?>

  <h1> TRANSACTION COMPLETED </h1>
  <img src="https://thumbs.gfycat.com/TsotalShorttermCottontail-max-1mb.gif" alt="Gif" style="width:30%;display:block;
  margin-left: auto;margin-right: auto;">
<h3> Total Amount Paid : RM <?php echo $total ?>.00 </h3>
<h5> Your order has been received. </h5>
<h5> We will let you know once your order is ready. </h5>
<h5> Invoice has been sent to <?php echo $email ?>. </h5>
<h5> Tracking process can be done via email.  </h5>
<h5> Thank you.  </h5>


 <div class="wrapper">
          <button class="btn" onclick="window.location.href='index.php';"> Back to Home Page </button>
</div></div>

		
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
	
	
<footer>
 </footer>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>

    </body>
</html>