<?php
session_start();
require 'db_connect.php';
$currentPage = 'confirm';
$title = 'Order Confirmation';
include 'head.php';

global $db;
if (isset($_POST['addressID']) && !empty($_POST['addressID'])) {
    $stmt = $db->prepare('insert into orders (user_id, address_id) values (:userID, :addressID);');
    $stmt->bindParam(':userID', $_SESSION['userID']);
    $stmt->bindParam(':addressID', $_POST['addressID']);
    $stmt->execute();
    $orderID = $db->lastInsertId();

    $stmt = $db->prepare('insert into ordered_items (item_id, order_id) VALUES (:itemID, :orderID);');
    $stmt->bindParam(':orderID', $orderID);
    foreach($_SESSION['cart'] as $item) {
        $stmt->bindParam(':itemID', $item['Key']);
        $stmt->execute();
    }
}
?>
    <body>
    <?php include 'navbar.php'; ?>
    <div class="container free-bird">
        <div class="col-md-8 col-lg-8 mx-auto float-none white z-depth-1 p-3">
            <h3>Order Confirmation</h3>
            <table class="table" id="cartTable">
                <tr><th>Item</th><th class="text-center">Qty</th><th class="text-right"></th><th class="text-right">Subtotal</th></tr>
                <?php
                $total = 0.00;
                foreach($_SESSION['cart'] as $value) {
                    $key = $value["Key"];
                    $name = $value["Name"];
                    $pic = $value["Pic"];
                    $cost = number_format( $value["Cost"], 2, ".", "," );
                    $qty = $value["Qty"];
                    $subtotal = $qty * $cost;
                    $subF = number_format( $subtotal, 2, ".", "," );
                    $total += $subtotal;
                    if ($name != NULL) {
                        echo '<tr id="'.$key.'">
                                    <td><img class="hoverable" src="' . $pic . '"> ' . $name  . '</td>
                                    <td>
                                        <div class="text-center">
                                            '. $qty .'   
                                        </div>                  
                                    </td>
                                    <td></td>
                                    <td class="text-right">' . $subF . '</td>
                                    <td></td>
                                </tr>';
                    }
                }
                $totalF = number_format( $total, 2, ".", "," );
                echo '<tr><th>Total</th><td></td><td></td><td class="text-right">$<span id="cartTotal">' . $totalF . '</span></td></tr>';
                ?>
            </table>
            <br>
            <div>
                <h4>Shipping To</h4>
                <?php
                $stmt = $db->prepare('select * from address where address_id = :id;');
                $stmt->bindParam(':id', $id);
                $id = $_POST['addressID'];
                if ($stmt->execute()) {
                    $row = $stmt->fetch();

                    $name = $row['address_name'];
                    $street = $row['street'];
                    $city = $row['city'];
                    $state = $row['state'];
                    $zip = $row['zip'];
                } else echo 'error';


                echo '
                    <p>'.$name.'</p>
                    <p>'.$street.'</p>
                    <p>'.$city.', '.$state.' '.$zip.'</p>
                    ';
                ?>
            </div>
        </div>
    </div>
    <?php include 'loginModal.php'?>
    </body>
<?php include 'footer.php' ?>
</html>
