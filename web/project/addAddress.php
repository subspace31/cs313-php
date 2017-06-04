<?php
session_start();
require 'db_connect.php';
global $db;

if (isset($_POST) && !empty($_POST) && isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
    $id = $_SESSION['userID'];
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $addressname = filter_var($_POST['address_name'], FILTER_SANITIZE_STRING);
    $street = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
    $zip = filter_var($_POST['zip'], FILTER_SANITIZE_STRING);

    $stmt = $db->prepare('insert into address (user_id, name, address_name, street, city, state, zip) values (:id, :name, :addressName, :street, :city, :state, :zip)');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':addressName', $addressname);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':zip', $zip);
    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            $newID = $db->lastInsertId();
            echo $newID;
        } else echo '2';

    } echo '1';
} echo '0';

