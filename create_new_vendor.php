<?php
//include("adminCheck.php"); 
//create new vendor
include("logincheck.php");
include("config.php");
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
?>

<?php 



	$name = $_POST['NVname'];
	$address = $_POST['NVaddress'];
	$email = $_POST['NVemail'];
	$phone = $_POST['NVphone'];
	$fax = $_POST['NVfax'];
	$rep = $_POST['NVrep'];
	$custid = $_POST['NVcid'];
	$query = "INSERT INTO `vendors` (`nameVendor`, `venderID`, `address`, `phone`, `email`, `fax`, `salesRep`, `customerID`) VALUES ('$name', NULL, '$address', '$phone', '$email', '$fax', '$rep', '$custid');";
	$result = mysqli_query($conn,$query);
	

header( 'Location: http://www.blowfish.store/admin.php' ) ;


?>