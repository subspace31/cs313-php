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
        <?php include '../navbar.php';?>
        <header class="edge-header grey lighten-2">
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
        <footer class="page-footer blue">
            <?php include '../footer.php';?>
        </footer>

        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/tether.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/mdb.js"></script>

        <script src="../js/main.js"></script>
</html>