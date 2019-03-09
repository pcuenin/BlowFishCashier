<?php
//include("adminCheck.php"); 
include("logincheck.php");
include("config.php");
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
?>

<?php 



	$name = $_POST['NUname'];
	$email = $_POST['NUemail'];
	$password = $_POST['NUpassword'];
	$privilege = $_POST['NUprivilege'];
	$query = "INSERT INTO `users` (`name`, `userID`, `email`, `password`, `privilege`) VALUES ('$name', NULL, '$email ', '$password', '$privilege');";
	$result = mysqli_query($conn,$query);
	

header( 'Location: http://www.blowfish.store/admin.php' ) ;


?>