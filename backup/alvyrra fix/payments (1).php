<?php
include 'connect.php';




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
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/custdetails.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css'><link rel="stylesheet" href="assets/css/style.css">
        <title>TA-KO-BOI KUCHING: JAPANESE NO.1 STREET FOOD</title>
    </head>
	
<!--****************************************************METADATA END****************************************************-->
    <body>


<!--*******************************************HEADER (LINK HERE)****************************************************-->
        <header class="headertb" id="header">
            <nav class="nav bd-container">
                <br>
                <div class="navmenu" id="nav-menu">
                    <ul class="navlist">
						<li class="navitem">
							<img src="assets/img/nobg.png" style="width:250px; height:100px;">
						</li>
                        <li class="navitem">
							<a href="index.php" class="navlink">MENU</a>
						</li>
                        <li class="navitem">
							<a href="abousUs.php" class="navlink">ABOUT US</a>
						</li>
                        
                        <li class="navitem">
							<a href="https://www.facebook.com/TaKoBoiKCH/" class="navcontact"><i class='bx bxl-facebook'></i></a>
						</li>
                        <li class="navitem">
							<a href="https://www.instagram.com/takoboi.kch/?hl=en" class="navcontact"><i class='bx bxl-instagram'></i></a>
						</li>
                        <li class="navitem">
							<a href="https://wa.me/60168861993" class="navcontact"><i class='bx bxl-whatsapp'></i></a>
						</li>
                    </ul>
                </div>
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


</style>

		<section id="header2">
			<div class="containertb bd-container bd-grid">
				<img src="assets/img/head.png" class="header2">
				<!--<div class="text-block" >
					<h2>JAPANESE NO.1 STREET FOOD</h2>
					<p style="text-align: rig;">SERVE WITH LOVE</p>
				</div>-->
			</div>
		</section>
<!--**************************************************** HEADER END ****************************************************-->


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ CODE PAYMENT HERE ++++++++++++++++++++++++++++++++++++++++++++++++-->
 
<!--********** PROGRESS BAR **********-->


       	    
<div style="margin: auto;width: 35%;padding-bottom:10px">

<ul class="wizard-steps pull-right">
						<li class="completed-step">
							<a id="order-details" href="detailss.php" >Delivery/Pickup</a>
						</li>
						<li class="completed-step">
							<a id="place-order" href="orders.php"> Order </a>
						</li>
						<li>
							<b><a id="payment" href="payments.php" style="color:black"> Payment </a></b>
						</li>
						              
					</ul>
       
  </div>
  <div style="background-color:black;margin: auto;width:50%;padding-bottom:10px;border-radius:25px;box-shadow:5px 10px white;">

      <form action="invoice.php" method="POST" >

          
			  <br>
              <h2 style="text-align:center;"> Order Confirmation </h2>
           
               <h4 style="text-align:center;">Your Order</h4>
			
			
			 
   <table style="margin: auto;width: 90%;">
  <tr style="border-bottom-style: solid;border-top-right-radius: 15px;">
    <th></th>
    <th>Qty</th>
    <th>Price</th>
  </tr>
   <?php

$qry = "SELECT * FROM details ORDER BY CustomerID DESC LIMIT 1;";
$rs = mysqli_query($conn,$qry);
$getRowAssoc = mysqli_fetch_assoc($rs);
$cust_id= $getRowAssoc['CustomerID'];

$query4 = "SELECT *,quantity*item_price AS amount FROM orderlist INNER JOIN menulist ON orderlist.item_ID = menulist.item_ID INNER JOIN flavor_avail ON orderlist.flavorID = flavor_avail.flavorID WHERE customer_id=$cust_id;";

$query_run4 = mysqli_query($conn,$query4);
			
while($row4=mysqli_fetch_array($query_run4)){

?>
  <tr style="border-bottom-style: solid;">
    <td><?php echo $row4['item_name']?> - <?php echo $row4['flavorName']?></td>
    <td><?php echo $row4['quantity']?></td>
    <td><?php echo $row4['amount']?></td>
	   <?php }?>
  </tr>
 
  <tr>
    <td style= " background-color: black;color:white;" ></td>
    <td style= " background-color: black;color:white;"><b>Total</b></td>
	<?php

$qry = "SELECT * FROM details ORDER BY CustomerID DESC LIMIT 1;";
$rs = mysqli_query($conn,$qry);
$getRowAssoc = mysqli_fetch_assoc($rs);
$cust_id= $getRowAssoc['CustomerID'];

$query4 = "SELECT SUM(quantity*item_price) AS total FROM orderlist INNER JOIN menulist ON orderlist.item_ID = menulist.item_ID INNER JOIN flavor_avail ON orderlist.flavorID = flavor_avail.flavorID WHERE customer_id=$cust_id;";

$query_run4 = mysqli_query($conn,$query4);
			
while($row4=mysqli_fetch_array($query_run4)){

?>

<td style= " background-color: black;color:white;"><b><?php echo $row4['total'] ?></b></td>
<input type="hidden" value="<?php echo $row4['total'] ?>" name="total">
 <?php }?>
    
  </tr>
	</table>
			

<?php

$query = "SELECT * FROM details ORDER BY CustomerID DESC LIMIT 1;";
$query_run = mysqli_query($conn,$query);
			
while($row=mysqli_fetch_array($query_run)){

?>
			 
			<table style="margin: auto;width: 90%;">
          <tr><td style="text-align:left;padding:20px;background-color:black;color:white;">
            
                 <h4>Deliverable </h4>
				<p style="text-align:left;">Date & Time : <?php echo $row['datetime']; ?> </p> 
				 <p style="text-align:left;">Order Type : <?php echo $row['ordertype']; ?></p>
				 <p style="text-align:left;">Pick Up At : <?php echo ($row['pickupLocation'] == '') ? '-' : $row['pickupLocation'];  ?></p>
				 <p style="text-align:left;">Delivery Address: <?php echo ($row['deliveryaddress'] == '') ? '-' : $row['deliveryaddress'];  ?></p>
          
             </td>
			
			
			 <td style="text-align:left;padding:20px;background-color:black;color:white;">
                 <h4 style="text-align:left;padding-right:50px;">Your Information</h4>
				 
				<p style="text-align:left;">Name : <?php echo $row['CustFName']; ?> <?php echo $row['CustLName']; ?> </p> 
				<p style="text-align:left;">Email : <?php echo $row['CustEmail']; ?> </p> 
				<p style="text-align:left;">Contact No. : <?php echo $row['CustPhNo']; ?>  </p> 
				<input type="hidden" value="<?php echo $row['CustomerID']; ?>" name="cust_id" >
      <br>
        </td>
			</tr>
			<?php
			}
			
			?>
			</table>
			
			 <h4 style="text-align:center;">Choose Your Payment Method</h4>
			  
	<table style="margin: auto;width: 90%;">
  <tr>
    <th style= " text-align:left;border-top-right-radius: 15px;border-top-left-radius: 15px;border">
	<div id="myRadioGroup">

          <input type="radio" value="Cash" name="paymentmethod" onclick="CashMethod() " required>Cash</div>
		  <input type="hidden" value="null" name="banktype" >
	</th>
  
  </tr>
  <tr>
    <th style= " text-align:left;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;">
<div id="myRadioGroup">
          <input type="radio" value="Onlinebanking" onclick="OnlineMethod()" name="paymentmethod" required> Online Banking</div>
		
	<table>
  <tr >
    <td style=" text-align: center;padding-right: 0px;border: 0px">
          <input type="radio" value="affin" id="affin" name="banktype" disabled required><img src="https://upload.wikimedia.org/wikipedia/commons/9/9f/Affin_Bank_logo.svg" width="40px"></td>
    <td style=" text-align: center;
  padding-left: 0px;
  padding-right: 0px;border: 0px"><input type="radio" id="alliance" value="alliance" name="banktype"disabled required ><img src="https://www.1300.com.my/wp-content/uploads/2014/11/ALLIANCE-BANK.png" width="40px"></td>
       <td style=" text-align: center;
  padding-left: 0px;
  padding-right: 0px;border: 0px"><input type="radio" id="ambank" value="ambank" name="banktype" disabled required><img src="https://bank.codes/template/logo/malaysia/ambank.png" width="40px"></td>
	 <td style=" text-align: center;
  padding-left: 0px;
  padding-right: 0px;border: 0px"><input type="radio" id="bankislam" value="bankislam" name="banktype" disabled required><img src="https://upload.wikimedia.org/wikipedia/commons/3/32/BANK_ISLAM_LOGO.jpg" width="40px"></td>
  </tr>
  
  <tr>
  <td style=" text-align: center;padding-right: 0px;border: 0px">
          <input type="radio" value="bankrakyat" id="bankrakyat" name="banktype" disabled required><img src="https://assets.nst.com.my/images/articles/bankrakyat_1521603501.jpg" width="40px"></td>
    <td style=" text-align: center;
  padding-left: 0px;
  padding-right: 0px;border: 0px"><input type="radio" id="muamalat" value="muamalat" name="banktype" disabled required><img src="https://assets.nst.com.my/images/articles/Logo-Bank-muamalat.jpg_1506608734.jpg" width="40px"></td>
       <td style=" text-align: center;
  padding-left: 0px;
  padding-right: 0px;border: 0px"><input type="radio" id="bsn" value="bsn" name="banktype" disabled required><img src="https://upload.wikimedia.org/wikipedia/commons/4/48/BSN_Logo.gif" width="40px"></td>
	 <td style=" text-align: center;
  padding-left: 0px; 
  padding-right: 0px;border: 0px"><input type="radio" id="cimb" value="cimb" name="banktype" disabled required><img src="https://cdn.freelogovectors.net/wp-content/uploads/2012/03/cimb_logo.jpg" width="40px"></td>
  </tr>
  
   <tr>
  <td style=" text-align: center;padding-right: 0px;border: 0px">
          <input type="radio" value="hongleong" id="hongleong" name="banktype" disabled required><img src="https://cdn-www.infobip.com/wp-content/uploads/2019/11/26174303/hong-leong-bank.png" width="40px"></td>
    <td style=" text-align: center;
  padding-left: 0px;
  padding-right: 0px;border: 0px"><input type="radio" id="ocbc" value="ocbc" name="banktype" disabled required><img src="https://upload.wikimedia.org/wikipedia/commons/5/54/OCBC_Bank_logo.png" width="40px"></td>
       <td style=" text-align: center;
  padding-left: 0px;
  padding-right: 0px;border: 0px"><input type="radio" id="publicbank" value="publicbank" name="banktype" disabled required><img src="https://seeklogo.com/images/P/Public_Bank-logo-2DFB6D1F4C-seeklogo.com.png" width="40px"></td>
	 <td style=" text-align: center;
  padding-left: 0px;
  padding-right: 0px;border: 0px"><input type="radio" id="rhb" value="rhb" name="banktype" disabled required><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/RHB_Logo.svg/1200px-RHB_Logo.svg.png" width="40px"></td>
  </tr>
  
<tr>
  <td style=" text-align: center;padding-right: 0px;border: 0px">
          <input type="radio" value="standard_charted" id="standard_charted" name="banktype" disabled required><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Standard_Chartered_%282021%29.svg/1200px-Standard_Chartered_%282021%29.svg.png" width="40px"></td>
    <td style=" text-align: center;
  padding-left: 0px;
  padding-right: 0px;border: 0px"><input type="radio" value="uob" id="uob" name="banktype" disabled required><img src="https://logos-download.com/wp-content/uploads/2016/04/UOB_United_Overseas_Bank_logo_logotype_symbol.png" width="40px"></td>
       
  </tr>

  </tr>
  
  </div>
</table>

		
		
	</th>
  </tr>
 
<script>

function OnlineMethod() {
	document.getElementById("affin").disabled = false;
	document.getElementById("alliance").disabled = false;
	document.getElementById("ambank").disabled = false;
	document.getElementById("bankislam").disabled = false;
	document.getElementById("bankrakyat").disabled = false;
	document.getElementById("muamalat").disabled = false;
	document.getElementById("bsn").disabled = false;
	document.getElementById("cimb").disabled = false;
	document.getElementById("hongleong").disabled = false;
	document.getElementById("ocbc").disabled = false;
	document.getElementById("publicbank").disabled = false;
	document.getElementById("rhb").disabled = false;
	document.getElementById("standard_charted").disabled = false;
	document.getElementById("uob").disabled = false;
}

function CashMethod() {
	document.getElementById("affin").disabled = true;
	document.getElementById("alliance").disabled = true;
	document.getElementById("ambank").disabled = true;
	document.getElementById("bankislam").disabled = true;
	document.getElementById("bankrakyat").disabled = true;
	document.getElementById("muamalat").disabled = true;
	document.getElementById("bsn").disabled = true;
	document.getElementById("cimb").disabled = true;
	document.getElementById("hongleong").disabled = true;
	document.getElementById("ocbc").disabled = true;
	document.getElementById("publicbank").disabled = true;
	document.getElementById("rhb").disabled = true;
	document.getElementById("standard_charted").disabled = true;
	document.getElementById("uob").disabled = true;
}
</script>

	</table>
	<br>
        <div class="wrapper">
          <input href="invoice.php" type="submit" name="checkout" value="Checkout" class="btn">
        </div>
		<br>
              </div>
            </div>
        
      </form>
    </div>

       </div>
	
	<br>
	
			
		
<!--************** END PROGRESS BAR ****************-->
        
        
					
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ END PAYMENT CODE ++++++++++++++++++++++++++++++++++++++++++++++++-->
 <footer class="footer">
           <div class="footercontainer"> 
                <div class="footerone">
                    <h3 class="footertitle">LOCATIONS</h3>
                    <div>
						<p>PJ Branch - Samariang Bomba</p>
						<p>Town Branch - Open Air Market</p>
						<p>Matang Branch - 20's Kitchen</p>
                    </div>
                </div>
               
                 <div class="footertwo">
                      <h3 class="footertitle">HOURS</h3>
                   <div>
						<p>MONDAY - SATURDAY</p>
						<p>1.30pm - 9.30pm</p>
                       <br>
					</div>
                </div>
               
               <div class="copyright">
                   <p> COPYRIGHT 2021 @ TAKOBOI </p>
               </div>
     </div>
 </footer>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>

    </body>
</html>