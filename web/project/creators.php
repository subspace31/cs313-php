<?php
session_start();
require 'db_connect.php';
$currentPage = 'shop';
$title = 'The Watermelon Stand - Shop';
include 'head.php';
?>
<body>
<?php include 'navbar.php'; ?>


<?php include 'loginModal.php'?>
</body>
<?php include 'footer.php' ?>
</html>