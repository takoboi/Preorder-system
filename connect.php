<?php

$servername = "sql111.epizy.com";
$username = "epiz_30829091";
$password = "rcLvMgmc2Ym";
$dbname = "epiz_30829091_takoboi";



// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if(!$conn) {
	die("Connection failed : " .mysqli_connect_error());
}

?>