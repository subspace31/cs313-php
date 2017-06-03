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
        <div class="card p-5">
            <h1>Add a Listing</h1>
            <div>
                <form class="text-center" action="insertItem.php" id="insertItemForm" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="file-field col-4">
                            <div class="btn btn-primary btn-sm disabled">
                                <span>Choose file</span>
                                <input type="file" class="disabled">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate disabled" id="file-path" type="text" placeholder="Upload your file">
                                <label for="file-path" class="disabled"></label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-left">
                                <div class="md-form">
                                    <input type="text" id="name" name="name" class="form-control validate">
                                    <label for="name">Name</label>
                                </div>
                                <div class="md-form">
                                    <input type="number" id="cost" name="cost" class="form-control">
                                    <label for="cost">Cost</label>
                                </div>
                                <div class="md-form">
                                    <textarea type="text" id="desc" name="desc" class="md-textarea"></textarea>
                                    <label for="desc">Description</label>
                                </div>
                                <label for="cat">Category</label>
                                <div class="container d-inline-flex">
                                    <select id="cat" name="cat" class="pull-left">
                                        <?php
                                        global $db;
                                        $stmt = $db->prepare('select category from categories ORDER BY category;');
                                        $stmt->execute();

                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="'.$row["category"].'">'.$row["category"].'</option>';
                                        }
                                        ?>
                                    </select>
                                    <!--<button class="btn pink lighten-4 px-3" id="show-cat" onclick="showAddCategory(); return false;"><i class="fa fa-plus-square"></i></button>-->
                                </div>
                                <!--<div class="add-category hidden collapse">
                                    <hr>
                                    <div class="md-form d-inline-flex">
                                        <input type="text" id="newcat" class="form-control">
                                        <label for="newcat">New Category</label>
                                    </div>
                                    <button type="button" class="btn pink lighten-4" onclick="addCategory();">Add</button>
                                    <i class="fa fa-close pull-right close"></i>
                                    <hr>
                                </div>-->
                                <button type="button" onclick="addItem('name', 'cost', 'desc', 'cat')" class="btn pink lighten-4">Save Listing</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>
    </div>

    <div class="modal fade bottom modal-content-clickable" id="frameModalBottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-frame modal-bottom" role="document">
            <!--Content-->
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-11" id="modal-text">
                            ...
                        </div>
                        <button type="button" class="close col-1" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'loginModal.php'?>

    </body>

<?php include 'footer.php' ?>