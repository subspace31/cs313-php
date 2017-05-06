<?php 
session_start();

$total = number_format( 0, 2, ".", "," );; //Number of items in the Cart, will be updated later.

$num = $_POST["itemNum"];
unset($_SESSION["item$num"]);

foreach($_SESSION as $value) {
    $cost = number_format( $value["Cost"], 2, ".", "," );
    $qty = $value["Qty"];
    $subtotal = $qty * $cost;
    $subF = number_format( $subtotal, 2, ".", "," );
    $total += $subtotal;
    $total = number_format( $total, 2, ".", "," );
}

echo $total;
?>