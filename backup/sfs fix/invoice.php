
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
		<link rel="stylesheet" href="assets/css/stylesheet.css" type="text/css" charset="utf-8" />
        <title>Transaction Confirmation</title>
    </head>
	<style>
			 
 
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

	</style>
<!--****************************************************METADATA END****************************************************-->
    <body>


<!--*******************************************HEADER****************************************************-->	
        <header style="text-align: center" class="headertb" id="header">
            <nav class="nav bd-container">	
					<img src="assets/img/nobgv2.png" class="center2">	
             
			  </a>
			  
            </nav>
        </header>


	
<!--**************************************************** HEADER END ****************************************************-->

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ CODE HERE ++++++++++++++++++++++++++++++++++++++++++++++++-->
<br><br><br>

<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
$mail = new PHPMailer(true);
include('connect.php');
require("./fpd/fpdf.php");


$qry = "SELECT * FROM details ORDER BY CustomerID DESC LIMIT 1;";
$rs = mysqli_query($conn,$qry);
$getRowAssoc = mysqli_fetch_assoc($rs);
$cust_id= $getRowAssoc['CustomerID'];
$fn= $getRowAssoc['CustFName'];
$ln= $getRowAssoc['CustLName'];
$email= $getRowAssoc['CustEmail'];
$order= $getRowAssoc['ordertype'];
$orderdate= $getRowAssoc['datetime'];
$comment= $getRowAssoc['comment'];
$address= $getRowAssoc['deliveryaddress'];
$address2= $getRowAssoc['pickupLocation'];

$qry2 = "SELECT SUM(quantity*item_price) as total FROM orderlist INNER JOIN menulist ON orderlist.item_ID = menulist.item_ID INNER JOIN flavor_avail ON orderlist.flavorID = flavor_avail.flavorID WHERE customer_id=$cust_id;";
$rs2 = mysqli_query($conn,$qry2);
$getRowAssoc2 = mysqli_fetch_assoc($rs2);
$total= $getRowAssoc2['total'];



class myPDF extends FPDF{
	

	function viewTable($conn){
		$qry = "SELECT * FROM details ORDER BY CustomerID DESC LIMIT 1;";
		$rs = mysqli_query($conn,$qry);
		$getRowAssoc = mysqli_fetch_assoc($rs);
		$cust_id= $getRowAssoc['CustomerID'];
		
		$qry3 = "SELECT *,flavor_avail.flavorID AS flavor FROM orderlist INNER JOIN menulist ON orderlist.item_ID = menulist.item_ID INNER JOIN flavor_avail ON orderlist.flavorID = flavor_avail.flavorID WHERE customer_id=$cust_id;";
		$rs3 = mysqli_query($conn,$qry3);

			$this->Ln();
		  
			while ($r=mysqli_fetch_array($rs3)) {
			$box = $r['item_name'];
			$inv = $r['flavorName'];
			$qty = $r['quantity'];
			$unit = $r['item_price'];
			
			$this->Cell(95,10,''.$box.' - '.$inv,1,0,'C');
			$this->Cell(15,10,$qty,1,0,'C');
			$this->Cell(45,10,'RM'.number_format($unit, 2),1,0,'C');
			$this->Cell(30,10,'RM'.number_format($unit, 2),1,0,'C');
			$this->Ln();
			}	
		}
	}


// convert pdf obj
$pdf = new myPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',35);
$pdf->Ln();	
$pdf->Cell(0,15,'TA-KO-BOI KCH',0,1,'C');
$pdf->Ln();	
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'Thank you for purchasing!',0,1,'C');
$pdf->SetFont('Arial','B',14);
			
$pdf->Ln(30);		
	// access session variables
$pdf->Cell(0,5,'Order Date: '.$orderdate,0,1,'R');
$pdf->Cell(0,5,'Order Type: '.$order,0,1,'R');
$pdf->Ln();
$pdf->Cell(0,5,'Customer Name: '.$fn.' '.$ln,0,1,'L');

$pdf->Ln();

$pdf->Cell(95,10,'Name',1,0,'C');
$pdf->Cell(15,10,'Unit',1,0,'C');
$pdf->Cell(45,10,'Price per Unit',1,0,'C');
$pdf->Cell(30,10,'Total price',1,0,'C');
$pdf->SetFont('Arial',12);
$pdf->viewTable($conn);
$pdf->Cell(95,10);
$pdf->Cell(15,10);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(45,10,'Total',1,0,'C');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(30,10,'RM'.number_format($total, 2),1,0,'C');

$pdf->Ln(30);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,5,"Customer's comments: ",0,1,"L");
$pdf->SetFont('Arial',12);
$pdf->Cell(0,15,"".$comment,0,1,"L");

$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,5,'Delivery/Pickup at: ',0,1,'L');
$pdf->SetFont('Arial',12);
$pdf->Cell(0,15,"".$address."".$address2,0,1,"L");

// attachment name
//$filename = "invoice.pdf";

// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output('', "S");
//$attachment = chunk_split(base64_encode($pdfdoc));


try {
    //Server settings
    //$mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'takoboigroup@gmail.com';                     // SMTP username
    $mail->Password   = 'Takoboi@1110';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('takoboigroup@gmail.com', 'Invoice');
    $mail->addAddress($email);  
    $mail->addAddress('takoboigroup@gmail.com');  
    $mail->addReplyTo('takoboigroup@gmail.com', 'Invoice');
	$mail->Priority = 1;
    // Attachments
    $mail->addStringAttachment($pdfdoc,'invoice.pdf');         // Add attachments

    // Content
	$mail->AddCustomHeader("X-MSMail-Priority: High");
	$mail->WordWrap = 50;
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Invoice from TA-KO-BOI';
    $mail->Body    = '<br>Attached invoice<br>';

    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>					
							
	<div class="center t-box" width="100%">
	<br>
	<h3 style="letter-spacing:3px;text-align: center;font-size: 4rem;font-family: 'Open Sans Condensed', sans-serif;">  </h3>
	<div class="loader"></div>

	<p class="t-text"> Sending email... </p>		
	<?php header( "refresh:3; url=confirmation.php" ); ?>					
			</div>
			<br>
			<br>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++ END ++++++++++++++++++++++++++++++++++++++++++++++++-->




<!--**************************************************** FOOTER ****************************************************-->

<!--**************************************************** FOOTER END ****************************************************-->

    
    </body>
</html>