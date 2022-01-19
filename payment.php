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
			   '".$_POST["ordertype"]."',
               '".$_POST["pickupLocation"]."',
			   '".$_POST["deliveryaddress"]."',
			   '".$_POST["datetime"]."',
			   '".$_POST["comment"]."'
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
							<a href="#order.html" class="navlink">ORDER NOW</a>
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
        	    
<div class="outerwrapper">

<ul class="wizard-steps pull-right">
						<li class="completed-step">
							<a id="place-order" href="#"> Place Order</a>
						</li>
						<li>
							<a id="order-details" href="details.php">Order Details</a>
						</li>
						<li>
							<a id="payment" href="t#"> Payment </a>
						</li>
						              
					</ul>
  
</div>  
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