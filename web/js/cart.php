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
        
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/mdb.css" rel="stylesheet"/>
        <link href="css/main.css" rel="stylesheet"/>
    </head>
    <body>    
        <?php include 'navbar.php';?>
        <header class="edge-header grey lighten-2">
        </header>
        
        <div class="container free-bird">
            <div class="col-md-12 col-lg-12 mx-auto float-none white z-depth-1 p-3">
                <h1>SHOPPING CART</h1>
                <ul>
                    <?php
                        foreach($_SESSION["cart"] as $value) {
                            echo '<li>
                                    $value["itemName"]
                                  </li>';
                        }
                    ?>
                </ul>
            </div>
        </div>            
</body>
        <footer class="page-footer blue">
            <?php include 'footer.php';?>
        </footer>

        <script src="js/jquery-3.1.1.js"></script>
        <script src="js/tether.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/mdb.js"></script>

        <script src="js/main.js"></script>
</html>