<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CS 313 Projects</title>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        
        <link href="../css/bootstrap.css" rel="stylesheet"/>
        <link href="../css/mdb.css" rel="stylesheet"/>
        <link href="../css/main.css" rel="stylesheet"/>
    </head>
    <body>
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
        
        <div class="container free-bird">
            <div class="col-md-8 col-lg-8 mx-auto float-none white z-depth-1 p-3">
                <h3>Order Confirmation</h3>
               <table class="table" id="cartTable">
                    <tr><th>Item</th><th class="text-center">Qty</th><th class="text-right"></th><th class="text-right">Subtotal</th></tr>
                    <?php
                        $total = 0.00;
                        foreach($_SESSION as $value) {
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
                                    <td><img class="hoverable" src="' . $pic . '"></img> ' . $name  . '</td>
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
                    $street = filter_var($_POST["street"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                    $city = filter_var($_POST["city"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                    $state = filter_var($_POST["state"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                    $zip = filter_var($_POST["zip"], FILTER_SANITIZE_NUMBER_INT);
                    
                    echo '
                    <p>'.$street.'</p>
                    <p>'.$city.', '.$state.' '.$zip.'</p>
                    ';
                    ?>            
                </div>
            </div>
        </div>            
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
</html>