<?php
session_start();
require 'db_connect.php';
$currentPage = 'shop';
$title = 'The Watermelon Stand - Shop';
include 'head.php';
?>
    <body>
    <?php include 'navbar.php'; ?>

    <div class="container free-bird">
    <!--Form without header-->
    <div class="card col-8 offset-2">
        <div class="card-block p-5">

            <!--Header-->
            <div class="text-center">
                <h3><i class="fa fa-lock"></i> Login:</h3>
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
                <button onclick="signIn('email', 'pass')" class="btn pink lighten-4 m-0">Login</button>
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

<?php include 'loginModal.php'?>
</body>
<?php include 'footer.php' ?>
</html>
