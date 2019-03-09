<?php
    include("config.php");
    error_reporting(E_ALL); 
    ini_set('display_errors', 1);
    echo "here;
    $order = $_POST['customerOrder'];
    for($count =0; count < myTableArray.length; $count++)
    {
        $name = $order[$count][0];
        $qty = $order[$count][1];
        
        $query = "SELECT menu_items.MenuItemName, products.name, products.amount\n"
        . "FROM menu_items\n"
        . "INNER JOIN menu_item_to_products ON menu_items.menuItemID=menu_item_to_products.menuItemID\n"
        . "INNER JOIN products ON products.productID=menu_item_to_products.productID\n"
        . "WHERE menu_items.MenuItemName=\'"$name"\'";
        $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result))
                {
                    $sql = "UPDATE `blowfis3_blowfishDB`.`products` SET products.amount = \'"$row["amount"]-$qty"\' WHERE products.name=\'"$row["name"]"\'";
                    $retval = mysqli_query($conn,$sql);                 
                }         
    }
?>