<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    googles OAuth integration-->
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="170814241120-btcf4dcrl69cjira3ebf8us7g0pnlmmv.apps.googleusercontent.com">


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <link href="../css/fileinput.css" rel="stylesheet"/>
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
    <div class="card p-5">
        <h1>Add a Listing</h1>
        <div>
            <!-- the avatar markup -->
            <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
            <form class="text-center" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="kv-avatar center-block col-3" style="width:200px">
                        <input id="avatar-1" name="avatar-1" type="file" class="file-loading">
                    </div>
                    <!-- include other inputs if needed and include a form submit (save) button -->
                    <div class="text-left col-9">
                        <div class="md-form">
                            <input type="text" id="form1" class="form-control">
                            <label for="form1">Name</label>
                        </div>
                        <div class="md-form">
                            <input type="number" id="form3" class="form-control">
                            <label for="form3">Cost</label>
                        </div>
                        <div class="md-form">
                            <textarea type="text" id="form4" class="md-textarea"></textarea>
                            <label for="form4">Description</label>
                        </div>
                        <label for="form5">Category</label>
                        <div class="container d-inline-flex">
                            <select id="form5" class="pull-left">
                                <?php
                                require 'db_connect.php';
                                global $db;
                                $stmt = $db->prepare('select category from categories;');
                                $stmt->execute();

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="'.$row["category"].'">'.$row["category"].'</option>';
                                }
                                ?>
                            </select>
                            <button class="btn pink lighten-4 px-3" id="show-cat" onclick="showAddCategory(); return false;"><i class="fa fa-plus-square"></i></button>
                        </div>
                        <div class="add-category hidden collapse">
                            <hr>
                            <div class="md-form d-inline-flex">
                                <input type="text" id="form6" class="form-control">
                                <label for="form6">New Category</label>
                            </div>
                            <button type="button" class="btn pink lighten-4" onclick="addCategory();">Add</button>
                            <i class="fa fa-close pull-right close" href="#addCategory"></i>
                            <hr>
                        </div>
                        <button type="submit" class="btn pink lighten-4">Save Listing</button>
                    </div>
                </div>
            </form>
            <!-- your server code `avatar_upload.php` will receive `$_FILES['avatar']` on form submission -->
        </div>
    </div>
    <br>
    <br>
</div>

</body>


<?php include 'footer.php' ?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="../js/jquery-3.1.1.js" type="text/javascript"></script>
<script src="../js/tether.js"></script>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script src="../js/mdb.js" type="text/javascript"></script>
<script src="../js/fileinput.js"></script>

<script src="../js/main.js"></script>

</html>
