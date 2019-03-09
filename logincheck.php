<?php
include("config.php");
session_start();
 //copy userTrue variable to $loggedin
if($_SESSION['loggedin']===TRUE){

}
else{
	header("Location:login.php");
}
?>