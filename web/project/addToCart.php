<?php
session_start();

$count = 0; //Number of items in the Cart, will be updated later.

//grab data from POST
$cartItem = array("Name" => $_POST["itemName"], "Cost" => $_POST["itemPrice"], "Pic" => $_POST["itemPic"], "Qty" => $_POST["itemQty"], "Key" => $_POST["itemNum"]);
$num = $_POST["itemNum"];

//Check if the item is already in the cart, if so increment the Qty by one.
if (array_key_exists("item$num", $_SESSION['cart'])) {
    $_SESSION["item$num"]["Qty"] += 1;
    $count = count($_SESSION['cart']);
} else {
    $_SESSION['cart']["item$num"] = $cartItem;
    $count = count($_SESSION['cart']);
}
echo $count;