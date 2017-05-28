<?php
require 'db_connect.php';

global $db;

$id = 1;
$name = $_POST["name"];
$desc = $_POST["desc"];
$cost = $_POST['cost'];
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


