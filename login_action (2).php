<?php
session_start();
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
include("config.php");


$email = $_POST['email'];
$pass = $_POST['password'];

$query =  "SELECT * FROM users WHERE email = '".$email."'  AND  password = '".$pass."'";
$result=mysqli_query($conn,$query); //execute query

$count=mysqli_num_rows($result);

$row=mysqli_fetch_array($result);

if($count==1){ // if a results
		$_SESSION['loggedin']=true;
		$_SESSION['UserID']=$_POST['email'];
		$_SESSION['priv']=$row['privilege'];
		header("Location:cashier.php");

	
}else{
//echo "this is your form submission email ".$_POST['email']." password".$_POST['password']." this is your value for loggedin".$_SESSION['loggedin']."" ;

		header("Location:login.php");
	}


?>