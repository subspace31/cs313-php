<?php
session_start();
require 'db_connect.php';
$currentPage = 'signupcreator';
$title = 'Creator - Sign Up';
include 'head.php';
?>
<body>
<?php include 'navbar.php'; ?>



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
            <br>
            <div class="md-form">
                <input type="password" id="pass1" class="form-control validate">
                <label for="pass1">Your password</label>
            </div>
            <br>
            <div class="md-form">
                <input type="password" id="pass2" class="form-control validate">
                <label for="pass2" data-error="Passwords do not match">Confirm password</label>
            </div>
            <br>
            <div class="text-center">
                <button class="btn pink lighten-3" onclick="signupC('email','pass1')">Sign Up</button>
            </div>

        </div>
    </div>
    <!--/Form without header-->
</div>

<?php include 'loginModal.php'?>
</body>
<?php include 'footer.php' ?>
</html>
