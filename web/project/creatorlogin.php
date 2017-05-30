<?php
session_start();

$secret = 'spBou3DDhERGKUB84Cik3u6r';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Creator Login</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    googles OAuth integration-->
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
    <div class="card col-8 offset-2">
        <div class="card-block p-5">

            <!--Header-->
            <div class="text-center">
                <h3><i class="fa fa-lock"></i> Creator Login:</h3>
                <hr class="mt-2 mb-2">
            </div>

            <!--Body-->
            <div class="md-form">
                <i class="fa fa-envelope prefix"></i>
                <input type="email" id="email" class="form-control validate">
                <label for="email">Your email</label>
            </div>
            <br>
            <div class="md-form">
                <i class="fa fa-lock prefix"></i>
                <input type="password" id="pass" class="form-control validate">
                <label for="pass" id="pass-label">Your password</label>
            </div>
            <div class="text-center">
                <button onclick="signInCreator('email', 'pass')" class="btn pink lighten-4 m-0">Login</button>
                <!--<br>
                <br>
                <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"></div>
                <br>
                <br>
                <div class="g-signin2" data-onsuccess="onSignIn" data-theme="light" data-width="300" data-height="45" data-longtitle="true">button</div>
                <a href="#" onclick="signOut();">Sign out</a>-->
            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer">
            <div class="options">
                <p>Not a member? <a href="signup.php">Sign Up</a></p>
                <!--<p>Forgot <a href="#">Password?</a></p>-->
            </div>
        </div>

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
