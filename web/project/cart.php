<?php
session_start();
require 'db_connect.php';
$currentPage = 'index';
$title = 'The Watermelon Stand';
include 'head.php';
?>
<body>
<?php include 'navbar.php'; ?>
<div class="container free-bird">
    <div class="col-md-8 col-lg-8 mx-auto float-none white z-depth-1 p-3">
        <h2>CART</h2>
        <table class="table" id="cartTable">
            <tr><th>Item</th><th class="text-center">Qty</th><th class="text-right">Unit Price</th><th class="text-right">Subtotal</th></tr>
            <?php
            $total = 0.00;
            foreach($_SESSION['cart'] as $value) {
                $key = $value["Key"];
                $name = $value["Name"];
                $pic = $value["Pic"];
                setlocale(LC_MONETARY,"en_US");$value["Cost"];
                $cost = number_format( $value["Cost"], 2, ".", "," );
                $qty = $value["Qty"];
                $subtotal = $qty * $cost;
                $subF = number_format( $subtotal, 2, ".", "," );
                $total += $subtotal;
                if ($name != NULL) {
                    echo '<tr id="'.$key.'">
                            <td><img class="hoverable" src="' . $pic . '">' . $name  . '</td>
                                <td>
                                    <div class="text-center">
                                            '. $qty .'   
                                    </div>               
                            </td>
                            <td class="text-right">' . $cost . '</td>
                            <td class="text-right">' . $subF . '</td>
                            <td><a class="red-text" href="javascript:removeCart(\''.$key.'\');" ><i class="fa fa-times"></i></a></td>
                          </tr>';
                }
            }
            $totalF = number_format( $total, 2, ".", "," );
            echo '<tr><th>Total</th><td></td><td></td><td class="text-right">$<span id="cartTotal">' . $totalF . '</span></td></tr>';
            ?>

        </table>
        <div class="row">
            <div class="col-lg-6">
                <a class="btn pink lighten-4 pull-left" href="shop.php">Continue Shopping</a>
            </div>
            <div class="col-lg-6">
                <a class="btn pink lighten-4 pull-right" href="checkout.php">Check Out</a>
            </div>
        </div>
    </div>
</div>

<?php include 'loginModal.php'?>
</body>
<?php include 'footer.php' ?>
</html>
