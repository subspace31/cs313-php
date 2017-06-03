<!-- Navbar  --->
<nav class="navbar fixed-top navbar-toggleable-md navbar-dark pink lighten-4">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">
        <strong class="text-white">The Watermelon Stand</strong>
    </a>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php">Home<?php if($currentPage === 'index') echo'<span class="sr-only">(current)</span>';?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="shop.php">Shop<?php if($currentPage === 'shop') echo'<span class="sr-only">(current)</span>';?></a>
            </li>
        </ul>
        <?php
        if (isset($_SESSION['userID']) && !empty($_SESSION['userID']) ||
            isset($_SESSION['sellerID']) && !empty($_SESSION['sellerID'])) {
            echo '<a class="nav-link text-white" onclick="logout(\''.$currentPage.'\')">Log Out</a>';
        } else {
            echo '<a class="nav-link text-white" data-toggle="modal" data-target="#login">Login</a>';
        }
        ?>
    </div>
</nav>
<header class="edge-header view view-head">
    <div class="hm-white-light">
        <div class="full-bg-img mask flex-center">
            <h1 class="badge-pill z-depth-1 pink lighten-4 text-white display-5 p-3">The Watermelon Stand</h1>
        </div>
    </div>
</header>