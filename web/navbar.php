<?php
echo '<nav class="navbar fixed-top navbar-toggleable-md navbar-dark bg-primary">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <strong>CS 313</strong>
                </a>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown btn-group">
                            <a class="nav-link active dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Projects<span class="sr-only">Toggle Dropdown</span>
                            </a>
                            <div class="dropdown-menu dropdown" aria-labelledby="dropdown1">
                                <a class="dropdown-item" href="projects.php">All</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="shopping/shopping.php">Week 3 - Shoppoing Cart</a>
                                <a class="dropdown-item" href="projects.php">Week 4</a>
                                <a class="dropdown-item" href="project/index.php">Week 5</a>
                                <a class="dropdown-item" href="projects.php">Week 6</a>
                            </div>
                        </li>
                    </ul>
                </div>
        </nav>';
?>