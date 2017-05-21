<?php
/**
 * User: subs
 * Date: 5/18/17
 * Time: 11:21 PM
 */

session_start();
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
    // example localhost configuration URL with postgres username and a database called cs313db
    $dbUrl = "postgres://postgres:reddragon@localhost:5432/postgres";
}

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>The Watermelon Stand - Shop</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link href="../css/mdb.css" rel="stylesheet"/>
    <link href="../css/main.css" rel="stylesheet"/>
</head>
<body>
<!--- Navbar --->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-dark pink lighten-4">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">
            <strong class="brown-text">The Watermelon Stand</strong>
        </a>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link brown-text" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link brown-text" href="shop.php">Shop<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

<header class="edge-header view view-head">
    <div class="hm-white-light">
        <div class="full-bg-img mask flex-center">
            <h1 class="badge-pill z-depth-1 pink lighten-4 brown-text display-4 p-3">The Watermelon Stand</h1>
        </div>
    </div>
</header>

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
        <span id="counter" class="counter hidden"><?php echo count($_SESSION); ?></span>
    </div>
</aside>

</body>
<footer class="page-footer center-on-small-only pink lighten-4 brown-text mt-0">

    <!--Footer Links-->
    <div class="container-fluid">
        <div class="row">

            <!--First column-->
            <div class="col-md-3 offset-lg-1 hidden-lg-down">
                <h5 class="title"></h5>
                <p> </p>

                <p></p>
            </div>
            <!--/.First column-->

            <hr class="hidden-md-up">

            <!--Second column-->
            <div class="col-lg-2 col-md-4 offset-lg-1">
                <h5 class="title">First column</h5>
                <ul>
                    <li><a class="brown-text" href="#!">Link 1</a></li>
                    <li><a class="brown-text" href="#!">Link 2</a></li>
                    <li><a class="brown-text" href="#!">Link 3</a></li>
                    <li><a class="brown-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <!--/.Second column-->

            <hr class="hidden-md-up">

            <!--Third column-->
            <div class="col-lg-2 col-md-4">
                <h5 class="title">Second column</h5>
                <ul>
                    <li><a class="brown-text" href="#!">Link 1</a></li>
                    <li><a class="brown-text" href="#!">Link 2</a></li>
                    <li><a class="brown-text" href="#!">Link 3</a></li>
                    <li><a class="brown-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <!--/.Third column-->

            <hr class="hidden-md-up">

            <!--Fourth column-->
            <div class="col-lg-2 col-md-4">
                <h5 class="title">Third column</h5>
                <ul>
                    <li><a class="brown-text" href="#!">Link 1</a></li>
                    <li><a class="brown-text" href="#!">Link 2</a></li>
                    <li><a class="brown-text" href="#!">Link 3</a></li>
                    <li><a class="brown-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <!--/.Fourth column-->

        </div>
    </div>

    <!--Copyright-->
    <div class="footer-copyright brown-text">
        <div class="container-fluid">
            © 2015 Copyright: <a class="brown-text" href="http://www.watermelonstand.com"> WatermelonStand.com </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>

<script src="../js/jquery-3.1.1.js"></script>
<script src="../js/tether.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/mdb.js"></script>

<script src="../js/main.js"></script>
<script src="../js/shop.js"></script>


</html>
