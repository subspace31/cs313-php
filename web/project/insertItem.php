<?php
session_start();
require 'db_connect.php';

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'add' : addItem();break;
        case 'delete' : deleteItem();break;
        case 'update' : updateItem();break;
    }
} else echo 'error selecting action';

function addItem() {
    global $db;
    if (isset($_SESSION['sellerID']) && !empty($_SESSION['sellerID'])) {
        $id = $_SESSION['sellerID'];
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $desc = filter_var($_POST['desc'], FILTER_SANITIZE_STRING);
        $cost = filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        $cat = $_POST['cat'];

        $stmt = $db->prepare('insert into items (seller_id, name, description, cost, category_id) values (:id, :name, :desc, :cost, (select id from categories where categories.category = :cat));');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':cost', $cost);
        $stmt->bindParam(':cat', $cat);

        $success = $stmt->execute();
        $count = $stmt->rowCount();

        if ($success) {
            if ($count > 0) {
                echo 'Item Added';
            } else echo 'inputs error';
        } else echo 'Error';
    } else echo 'No seller ID';
}

function deleteItem() {
    global $db;
    $id = $_POST['id'];
    $stmt = $db->prepare('delete from items where item_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function updateItem() {
    echo 'updating item';
    global $db;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $cost = $_POST['cost'];
    $stmt = $db->prepare('update items set name = :name, description = :desc, cost = :cost where item_id = :id;');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':desc', $desc);
    $stmt->bindParam(':cost', $cost);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header('Location: editListings.php');
        die();
    } else echo'statement error';
}