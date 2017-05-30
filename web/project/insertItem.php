<?php
require 'db_connect.php';

global $db;

if (isset($_SESSION['seller_id']) && !empty($_SESSION['seller_id'])) {
    $id = $_SESSION['seller_id'];
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $desc = filter_var($_POST['desc'], FILTER_SANITIZE_STRING);
    $cost = filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT);
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
            echo 'success';
        } else echo 'inputs error';
    } else echo 'statement error';
}



