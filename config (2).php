<?php

$host="www.blowfish.store"; //IP Address on domain name of the host for the database

$user ="blowfis3_paul"; //username

$pass="Bearcat2017";//password


$conn = mysqli_connect($host,$user,$pass,"blowfis3_blowfishDB");
//mysqli_select_db($conn);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}
//echo "Connected successfully";

?>