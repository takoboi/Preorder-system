<?php
include 'connect.php';?>

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

                <div class="navmenu" id="nav-menu">
                    <ul class="navlist">
						<li class="navitem">
							<img src="assets/img/nobg.png" style="width:250px; height:100px;">
						</li>
                        <li class="navitem">
							<a href="menu.html" class="navlink">MENU</a>
						</li>
                        <li class="navitem">
							<a href="#about.html" class="navlink">ABOUT US</a>
						</li>
                        <li class="navitem">
							<a href="detailss.php" class="navlink">ORDER NOW</a>
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


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ CODE CONFIRMATION HERE ++++++++++++++++++++++++++++++++++++++++++++++++-->
 
<!--********** PROGRESS BAR **********-->


       	    

<br>
<div style="border-style:solid; padding: 10px;margin: auto;width: 50%;text-align: center;">

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
  <img src="https://thumbs.gfycat.com/TotalShorttermCottontail-max-1mb.gif" alt="Gif" style="width:30%;display:block;
  margin-left: auto;margin-right: auto;">
 <h3> Total Amount Paid : RM <?php echo $total ?>.00 </h3>
  <h5> Your order has been received. </h5>
<h5> We will let you know once your order is ready. </h5>
<h5> Invoice has been sent to <?php echo $email ?> . </h5>
<h5> Tracking process can be done via email.  </h5>
<h5> Thank you.  </h5>


 <div class="wrapper">
          <button onclick="window.location.href='index.php';" style="background-color: white;
  color: black;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 40%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;"> Back to Home Page </button>
        </div>
		</div>
		
       <br>
	
	
	
			
		
<!--************** END PROGRESS BAR ****************-->
        
        
					
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ END CONFIRMATION CODE ++++++++++++++++++++++++++++++++++++++++++++++++-->
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