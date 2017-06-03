<?php
session_start();
require 'db_connect.php';
$currentPage = 'shop';
$title = 'The Watermelon Stand - Shop';
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

            <div class="md-form">
                <input type="password" id="signup-pass1" class="form-control validate">
                <label for="signup-pass1">Your password</label>
            </div>
            <div class="md-form">
                <input type="password" id="signup-pass2" class="form-control validate">
                <label for="signup-pass2" data-error="Passwords do not match">Confirm password</label>
            </div>

            <div class="text-center">
                <button class="btn pink lighten-3" onclick="signup('email','pass1')">Sign Up</button>
            </div>

        </div>
    </div>
    <!--/Form without header-->
</div>


<?php include 'loginModal.php'?>

</body>

<?php include 'footer.php' ?>
</html>