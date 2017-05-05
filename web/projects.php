<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CS 313 Projects</title>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/mdb.css" rel="stylesheet"/>
        <link href="css/main.css" rel="stylesheet"/>
    </head>
<body>
    <?php include 'navbar.php';?>
    
    <header class="edge-header grey lighten-2">
    </header>
    <div class="container free-bird">
        <div class="col-md-12 col-lg-12 mx-auto float-none white z-depth-1 px-0">
            <div>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                    </ol>

                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="view overlay hm-black-light">
                                <img src="img/htmlcodestylized.jpg" alt="Image">
                                <div class="mask flex-center">
                                    <div class="carousel-caption">
                                        <h3>Week 2</h3>
                                        <p>Site Homepage</p>
                                    </div>  
                                </div>
                            </div>     
                        </div>
                        <div class="carousel-item">
                            <div class="view overlay hm-black-light">
                                <img src="https://placehold.it/1200x400?text=Another Image" alt="Image">
                                <div class="mask flex-center">
                                    <div class="carousel-caption">
                                        <h3>Week 3</h3>
                                        <p>Shopping Cart</p>
                                    </div>  
                                </div>
                            </div> 
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            
            <div class="container text-center">    
                <h3>Server side Web Development</h3><br>
                <div class="row">
                    <div class="col-sm-4 card">
                        <a href="index.html"><img src="img/htmlcode-sm.jpg" class="img-responsive hoverable" alt="Image"></a>
                        <p>Current Week - Homepage</p>
                    </div>
                    <div class="col-sm-4 card"> 
                        <a href="shopping.php"><img src="https://placehold.it/1200x640?text=IMAGE" class="img-responsive hoverable" alt="Image"></a>
                        <p>Next Week - Shopping Cart</p>   
                    </div>
                    <div class="col-sm-4 card">
                        <div class="well">
                            <p>Week 4 - ""</p>
                        </div>
                        <div class="well">
                            <p>Week 5 - ""</p>
                        </div>
                    </div>
                </div>
            </div><br>
        </div>
    </div>
</body>
    <footer class="page-footer blue">
        <?php include 'footer.php';?>
    </footer>
    
    <script src="js/jquery-3.1.1.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/mdb.js" type="text/javascript"></script>
    
</html>