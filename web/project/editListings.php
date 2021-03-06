<?php
session_start();
require 'db_connect.php';
global $db;
if (!isset($_SESSION['sellerID']) && empty($_SESSION['sellerID'])){
    header('Location: creatorlogin.php');
    die();
}

$currentPage = 'Creator - Edit Listings';
$title = 'The Watermelon Stand - Shop';
include 'head.php';
?>
<body>
<?php include 'navbar.php'; ?>
<div class="container free-bird">
    <div class="container mx-auto white card pt-0 px-3 z-depth-2">
        <div class="md-form">
            <div class="input-group">
                <div class="input-group-btn m-1">
                    <button class="btn dropdown-toggle pink lighten-4 brown-text" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu2">
                        <button class="waves-effect waves-light dropdown-item" onclick="getCatData()">Search All</button>
                        <div class="dropdown-divider"></div>
                        <?php
                        global $db;
                        $statement =$statement = $db->prepare("select category FROM categories;");
                        $statement->execute();
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                            echo '<button class="waves-effect waves-light dropdown-item" onclick="getCatData(\'' . $row["category"] . '\')">' . $row["category"] . '</button>';
                        }
                        ?>
                    </div>
                </div>
                <!--<input type="search" class="form-control" placeholder="Search for...">
                <div class="input-group-btn">
                    <button class="btn pink lighten-4 btn" type="button">Go!</button>
                </div>-->
            </div>
        </div>
        <div class="shop-list">
        </div>
    </div>
</div>
<div class="modal fade" id="update-listing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title w-100" id="myModalLabel">Update Listing</h4>
            </div>
            <div class="modal-body">
                <form id="updateListing" method="post" action="insertItem.php">
                    <input name="action" type="hidden" value="update">
                    <input name="id" id="update-id" type="hidden" value="">
                    <br>
                    <div class="text-left">
                        <div class="md-form">
                            <input type="text" id="update-name" name="name" value="..." class="form-control">
                            <label  class="active" for="update-name">Name</label>
                        </div>
                        <div class="md-form">
                            <input type="number" id="update-cost" name="cost" value="0" class="form-control">
                            <label class="active" for="update-cost">Cost</label>
                        </div>
                        <div class="md-form">
                            <textarea type="text" id="update-desc" name="desc" class="md-textarea"></textarea>
                            <label for="update-desc" class="active">Description</label>
                        </div>
                        <label for="update-cat">Category</label>
                        <div class="container d-inline-flex">
                            <select id="update-cat" name="cat" class="pull-left">
                                <?php
                                global $db;
                                $stmt = $db->prepare('select * from categories ORDER BY category;');
                                $stmt->execute();

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="'.$row["id"].'">'.$row["category"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn pink lighten-4" data-dismiss="modal">Close</button>
                <button type="submit" form="updateListing" id="confirm-update" class="btn pink lighten-4">Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title w-100" id="myModalLabel">Delete Listing</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this listing?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn pink lighten-4" data-dismiss="modal">Close</button>
                <button type="button" id="confirm-delete" class="btn btn-danger" onclick="">Delete</button>
            </div>
        </div>

    </div>
</div>

</div>
    <?php include 'loginModal.php'?>
</body>

<?php include 'footer.php' ?>
<script>getCatData();</script>
</html>

