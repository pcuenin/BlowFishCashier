							<?php
include("config.php");
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
?>


<?php  // populate users info
								$query =  "SELECT * FROM users";
								$result = mysqli_query($conn,$query); //execute query
								$row = mysqli_fetch_array($result); // fetch array
								echo $row["name"];
								$row = mysqli_fetch_array($result); // fetch array
								echo $row["name"];
echo "why you no work?";



								?>