<?php
include("config.php");
if($_SESSION['priv'] == "Admin"){

}
else if($_SESSION['priv'] == "Cashier"){
   header("Location:cashier.php");
}
else{
	header("Location:login.php");
}

?>