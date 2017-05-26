<?php
session_start();

$secret = 'spBou3DDhERGKUB84Cik3u6r';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    google OAuth integration-->
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="170814241120-btcf4dcrl69cjira3ebf8us7g0pnlmmv.apps.googleusercontent.com">


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <link href="../css/bootstrap.css" rel="stylesheet"/>
    <link href="../css/mdb.css" rel="stylesheet"/>
    <link href="../css/main.css" rel="stylesheet"/>
</head>
<body>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '435404933493285',
            cookie     : true,
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>

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
    <!--Form without header-->
    <div class="card">
        <h1>Profile</h1>
        <?php

        echo '
        Name: '.$_SESSION["fullName"].'<br>
        Email: '.$_SESSION["email"].'<br>
        Picture: '.$_SESSION["pic"].'<br>';
        ?>
    </div>
    <!--/Form without header-->
</div>

</body>


<?php include 'footer.php' ?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="../js/jquery-3.1.1.js" type="text/javascript"></script>
<script src="../js/tether.js"></script>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script src="../js/mdb.js" type="text/javascript"></script>

<script src="../js/main.js"></script>

</html>
