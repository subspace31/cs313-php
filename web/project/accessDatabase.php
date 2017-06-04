<?php
/**
 * User: subs
 * Date: 5/18/17
 * Time: 11:21 PM
 */
    session_start();
    require 'db_connect.php';
    global $db;
    $cat = $_SESSION["cat"];
    if (isset($_POST['seller']) && !empty($_POST['seller'])){
        $id = $_SESSION['sellerID'];
        $statement = $db->prepare("select item_id, name ,items.description ,cost ,category, category_id FROM items inner join categories on items.category_id = categories.id WHERE items.seller_id = :id ORDER BY category_id;");
        $statement->bindParam(':id', $id);
    } else {
        if ($_POST["category"] === null || $_POST["category"] === "") {
            $statement = $db->prepare("select item_id, name ,items.description ,cost ,category, category_id FROM items inner join categories on items.category_id = categories.id WHERE categories.id > 0 ORDER BY category_id;");
        } else {
            $statement = $db->prepare("select item_id, name ,items.description ,cost ,category, category_id FROM items inner join categories on items.category_id = categories.id WHERE categories.category = '".$_POST["category"]."';");
        }
    }

    if ($statement->execute()) {
        $itmnum = 0;
        $items = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $itmnum++;
            $row["itmnum"] = $itmnum;
            $items[] = $row;
        }
        $jsonstring  = json_encode($items);
        echo $jsonstring;
    } else echo 'statement error';

