<?php
session_start();
require 'db_connect.php';
$currentPage = 'index';
$title = 'The Watermelon Stand';
include 'head.php';
global $db;
?>
<body>
<?php include 'navbar.php'; ?>
        <div class="container free-bird pb-5">
            <div class="col-md-8 col-lg-8 mx-auto float-none white z-depth-1 p-3">
                <h4>Shipping Address:</h4>
                <br>
                <div id="addressRadio">
                    <?php
                    if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
                        $stmt = $db->prepare('select * from address where address.user_id = :id');
                        $stmt->bindParam(':id', $_SESSION['userID']);
                        $stmt->execute();
                        while ($row = $stmt->fetch()) {
                            $addresses[] = $row;
                        }
                        if (isset($addresses)) {
                            foreach ($addresses as $address) {
                                echo '<feildset class="form-group">
                                 <input name="address" type="radio" id="'.$address['name'].'" value="'.$address["address_id"].'"> 
                                 <label for="'.$address['name'].'" class="col-lg-12"><span data-name="name">'.$address['name'].'</span><hr>
                                 <span data-name="address-name">'.$address['address_name'].'</span>
                                 <br><span data-name="street">'.$address['street'].'</span>
                                 <br><span data-name="city">'.$address['city'].'</span> <span data-name="state">'.$address['state'].'</span>, <span data-name="zip">'.$address['zip'].'</span>
                                 </label>
                             </feildset> <hr>
                             ';
                            }
                        }
                        echo '<feildset class="form-group">
                                 <input name="address" type="radio" id="new"> 
                                 <label for="new" class="col-lg-12">New Address<hr><br>
                                    <form action="addAddress.php" method="post" id="newAddress" class="hidden">
                                        <div class="col-lg-12">
                                            <div class="md-form">
                                                <input type="text" name="name" id="new-name" class="form-control validate">
                                                <label for="new-address-name">Shipping Profile Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="md-form">
                                                <input type="text" name="address-name" id="new-address-name" class="form-control validate">
                                                <label for="new-address-name">Name</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-lg-12">
                                            <div class="md-form">
                                                <input type="text" name="street" id="new-street" class="form-control validate">
                                                <label for="new-street">Street</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-lg-12">
                                            <div class="md-form">
                                                <input type="text" name="city" id="new-city" class="form-control validate">
                                                <label for="new-city">City</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="md-form">
                                                    <input type="text" name="state" id="new-state" class="form-control validate">
                                                    <label for="new-state">State</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="md-form">
                                                    <input type="text" name="zip" id="new-zip" class="form-control validate">
                                                    <label for="new-zip">Zip</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                 </label>
                             </feildset>
                             <br>
                             <br>
                             <hr>
                             <div class="row">
                                <div class="col-lg-9">
                                    <a class="btn btn-lg pink lighten-4" href="cart.php">Return to Cart</a>
                                </div>
                                <div class="col-lg-3">
                                    <button class="btn btn-lg pink lighten-4 pull-right" onclick="checkout()">Buy</button>
                                </div>
                            </div>
                             ';
                    } else {
                        header('Location: ./login.php');
                        die();
                    }
                    ?>
                    <div class="hidden">
                        <form id="hidden-form" action="confirm.php" method="post">
                            <input id="hidden-id" name="addressID" type="hidden" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php include 'loginModal.php'?>
</body>
<?php include 'footer.php' ?>
</html>
