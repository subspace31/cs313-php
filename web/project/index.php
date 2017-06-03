<?php
session_start();
require 'db_connect.php';
$currentPage = 'index';
$title = 'The Watermelon Stand';
include 'head.php';
?>
<body>
<?php include 'navbar.php'; ?>
<!--- Body   --->
<div class="container free-bird pb-5">
    <div class="container mx-auto white card pt-0 px-0 z-depth-2">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view overlay hm-black-light">
                        <img src="https://via.placeholder.com/1200x400?text=IMAGE" alt="Image">
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
                        <img src="https://via.placeholder.com/1200x400?text=IMAGE" alt="Image">
                        <div class="mask flex-center">
                            <div class="carousel-caption">
                                <h3>Week 3</h3>
                                <p>Shopping Cart</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="view overlay hm-black-light">
                        <img src="https://via.placeholder.com/1200x400?text=IMAGE" alt="Image">
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
        <?php
        global $db;
        $stmt = $db->prepare('select category, description from categories where description is not NULL order by category;');
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo '<ul class="list-unstyled p-3">
                <li class="media">
                    <img class="d-flex mr-3 hoverable" src="https://via.placeholder.com/400x400?text=IMAGE" alt="...">
                    <div class="media-body">
                        <ul>
                            <li><h5>'.$row["category"].'</h5></li>
                            <li>
                               '.$row["description"].'
                            </li>
                            <li><br></li>

                            <li></li>
                            <li>
                                <div class="d-flex flex-row-reverse btn-group">
                                    <button class="btn btn-lg pink lighten-3" onclick="" type="button">Shop Now</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>';
        }
        ?>
    </div>

</div>

<?php include 'loginModal.php'?>
</body>
<?php include 'footer.php' ?>
</html>
