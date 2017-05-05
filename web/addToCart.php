<?php 
    session_start();

    $cart = $_SESSION["cart"];

    $cartItem = array("Name" => $_POST["itemName"], "Cost" => $_POST["itemPrice"], "Pic" => $_POST["itemPic"]);
    $cart = array($_POST["itemNum"] => $cartItem); 

    $_SESSION["cart"] = $cart;

?>