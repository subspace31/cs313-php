<?php
session_start();
require 'db_connect.php';
global $db;

if (isset($_POST) && !empty($_POST) && isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
    $stmt = $db->prepare('insert into address (user_id, name, address_name, street, city, state, zip) values (:id, :name, :addressName, :street, :city, :state, :zip)');
    $stmt->bindParam(':id', $_SESSION['userID']);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':addressName', $_POST['address_name']);
    $stmt->bindParam(':street', $_POST['street']);
    $stmt->bindParam(':city', $_POST['city']);
    $stmt->bindParam(':state', $_POST['state']);
    $stmt->bindParam(':zip', $_POST['zip']);

    echo $db->lastInsertId();
}

