<?php
session_start();
require 'db_connect.php';
$currentPage = 'shop';
$title = 'The Watermelon Stand - Shop';
include 'head.php';
?>
<body>
<?php include 'navbar.php'; ?>

<div class="container free-bird pb-5">
    <div class="container mx-auto white card pt-0 px-3 z-depth-2">
        <div class="md-form">
            <div class="input-group">
                <div class="input-group-btn m-1">
                    <button class="btn dropdown-toggle pink lighten-4 brown-text" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu2">
                        <button class="waves-effect waves-light dropdown-item" onclick="getData()">Search All</button>
                        <div class="dropdown-divider"></div>
                        <?php
                        global $db;
                        $statement =$statement = $db->prepare("select category FROM categories;");
                        $statement->execute();
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                            echo '<button class="waves-effect waves-light dropdown-item" onclick="getData(\'' . $row["category"] . '\')">' . $row["category"] . '</button>';
                        }
                        ?>
                    </div>
                </div>
                <input type="search" class="form-control" placeholder="Search for...">
                <div class="input-group-btn">
                    <button class="btn pink lighten-4 btn" type="button">Go!</button>
                </div>
            </div>
        </div>
        <div class="shop-list">
        </div>
    </div>
</div>
<aside>
    <div class="shopping-cart">
        <a href="cart.php" class="btn btn-lg pink lighten-4 z-depth-3"><i class="fa fa-cart-plus fa-3x"></i></a>
        <span id="counter" class="counter hidden"><?php echo count($_SESSION['cart']); ?></span>
    </div>
</aside>

<?php include 'loginModal.php'?>

</body>
<?php include 'footer.php' ?>
<script src="../js/shop.js"></script>
</html>