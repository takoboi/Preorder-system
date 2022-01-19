
<!DOCTYPE html>
<html lang="en">
<!--****************************************************METADATA****************************************************-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
        $("div.desc").hide();
        $("input[name$='ordertype']").click(function() {
        var test = $(this).val();
        $("div.desc").hide();
        $("#" + test).show();
    });
});
        </script>
        
 

        
        
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


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ CODE HERE ++++++++++++++++++++++++++++++++++++++++++++++++-->
 
				
                    <p style="color:#C21121">/////////////////////////////////////////////////////////////</p>
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
        <div class="row">
  <div class="col-75">
    <div class="container">
          
      <form action="payment.php" method="POST" id="custdetails">

          <div class="row">
              <div class="col-50">
              <h3 style="text-align:center;"> Details</h3>
           <div class="row">
              <div class="col-50">
                <label>First Name</label>
                <input type="text" id="CustFName" name="CustFName" placeholder="eg: Jenny" required>
              </div>
              <div class="col-50">
                <label>Last Name</label>
                <input type="text" id="CustLName" name="CustLName" placeholder="eg: Kim" required>
              </div>
             </div>
            <div class="row">
              <div class="col-50">
                <label>Email Address</label>
                <input type="text" id="CustEmail" name="CustEmail" placeholder="jennykim@yahoo.com" required>
              </div>
              <div class="col-50">
                <label>Phone Number</label>
                <input type="text" id="CustPhNo" name="CustPhNo" placeholder="eg: 0123456789" required>
              </div>
            </div>
            <div class="row">
               
                <div id="myRadioGroup">
              Delivery<input type="radio" name="ordertype" checked="checked" value="delivery"/ required>
             Pickup<input type="radio" name="ordertype" value="pickup" />
             <div id="pickup" class="desc">
             <label>Nearest Pickup Location : </label>
            <select name="pickupLocation">
                <option> PJ Branch- Samariang Bomba</option>
                <option> Town Branch- Open Air Market</option>
                <option> Matang Branch - 20's Kitchen</option>
            </select>
        <br>
             </div>
                <div id="delivery" class="desc">
                <label> Delivery Address : </label>
                <input type="text" id="deliveryaddress" name="deliveryaddress" placeholder="Please enter a valid address">
              </div>
        <br>
        <div>
       <label for="datetime">Date & Time for Order :</label>
       <input type="datetime-local" id="datetime" name="datetime" required> 
        </div>
        <br>
        <div>
        <label> Special Request : </label>
        <textarea rows='5' cols="25" name="comment" form="custdetails" placeholder="!--OPTIONAL--!"></textarea>
        </div>
        
        
              </div>    
            </div>
        <div class="wrapper">
          <input type="submit" name="submit" value="Next" class="btn">
        </div>
              </div>
            </div>
        
      </form>
    </div>
  </div>
</div>
         <p style="color:#C21121">/////////////////////////////////////////////////////////////</p>
		
					
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ END ++++++++++++++++++++++++++++++++++++++++++++++++-->
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