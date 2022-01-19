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
        <link rel="stylesheet" href="assets/css/styles2.css">
        <link rel="stylesheet" href="assets/css/custdetails.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css'><link rel="stylesheet" href="assets/css/style.css">
		
        <title>TA-KO-BOI KUCHING: JAPANESE NO.1 STREET FOOD</title>
    </head>
	<style>
			img.center2 {
				display: block;
				position: absolute;
				top: 0;
				bottom: 0;
				left: 0;
				right: 0;
				margin: auto;
			}
			h3{
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


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ CODE HERE ++++++++++++++++++++++++++++++++++++++++++++++++-->
 
				
		&nbsp
<!--********** PROGRESS BAR **********-->
	
<div class="outerwrapper">

<ul class="wizard-steps pull-right">
	<li class="active-step">
		<a id="order-details" href="detailss.php">Order Details</a>
	</li>
	<li>
		<a id="place-order" href="orders.php"> Place Order</a>
	</li>
	<li>
		<a id="payment" href="payments.php"> Payment </a>
	</li>
				  
	</ul>	

</div>  
        <!--************** END PROGRESS BAR ****************-->
 <div style="background-color:rgb(19, 19, 19);margin: auto; width:75vw; padding-bottom:10px; border-radius:15px;">
          
      <form action="orders.php" method="POST" id="custdetails">

          <br>
              <h3 style="text-align:center;"> Details</h3>
         
		 <table style="margin: auto;width: 90%;">
		 <tr><td style="text-align:left;padding:20px;background-color:rgb(19, 19, 19);;color:white;border-style: none;">
                <label>First Name</label>
                <input type="text" id="CustFName" name="CustFName" placeholder="eg: Jenny" required>
            </td>
             <td style="text-align:left;padding:20px;background-color:rgb(19, 19, 19);;color:white;border-style: none;">
                <label>Last Name</label>
                <input type="text" id="CustLName" name="CustLName" placeholder="eg: Kim" required>
           </td></tr>
		   <tr>
		   <td style="text-align:left;padding:20px;background-color:rgb(19, 19, 19);;color:white;border-style: none;">
           
                <label>Email Address</label>
                <input type="text" id="CustEmail" name="CustEmail" placeholder="jennykim@yahoo.com" required>
              </td>
                <td style="text-align:left;padding:20px;background-color:rgb(19, 19, 19);;color:white;border-style: none;">
                <label>Phone Number</label>
                <input type="text" id="CustPhNo" name="CustPhNo"  placeholder="eg: 0123456789" required>
              </td></tr>
			  
			 </table>
       
			<div style="padding: 0px 10px 10px 8vw;" id="myRadioGroup">
			<br>
			<p style="margin:auto;">Delivery <input type="radio" name="ordertype" value="delivery"/ required>&nbsp;&nbsp;&nbsp;
			Pickup<input type="radio" name="ordertype" value="pickup" />
				<div id="pickup" class="desc">
					<label>Nearest Pickup Location : </label>
						<select name="pickupLocation">
                            <option> </option>
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
              
           
        <div class="wrapper">
          <input type="submit" name="submit" value="Next" class="btn">
        </div>
              </div>
        
      </form>
<br>
       

         
		&nbsp;
		
					
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ END ++++++++++++++++++++++++++++++++++++++++++++++++-->



<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/script.js"></script>
</body>
</html>
