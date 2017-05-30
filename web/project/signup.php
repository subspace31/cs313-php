<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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
<div class="container free-bird p-5">
    <!--Form without header-->
    <div class="card p-5">
        <div class="card-block p-5">

            <!--Header-->
            <div class="text-center">
                <h3>Sign Up:</h3>
                <hr class="mt-2 mb-2">
            </div>

            <!--Body-->
            <div class="md-form">
                <input type="email" id="email" class="form-control validate">
                <label for="email" data-error="Invalid email">Your email</label>
            </div>

            <div class="md-form">
                <input type="password" id="pass1" class="form-control validate">
                <label for="pass1">Your password</label>
            </div>
            <div class="md-form">
                <input type="password" id="pass2" class="form-control validate">
                <label for="pass2" data-error="Passwords do not match">Confirm password</label>
            </div>

            <div class="text-center">
                <button class="btn pink lighten-3" onclick="signup('email','pass1')">Sign Up</button>
            </div>

        </div>
    </div>
    <!--/Form without header-->
</div>

</body>


<?php include 'footer.php' ?>

<script src="../js/jquery-3.1.1.js" type="text/javascript"></script>
<script src="../js/tether.js"></script>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script src="../js/mdb.js" type="text/javascript"></script>


<script src="../js/main.js"></script>

</html>
