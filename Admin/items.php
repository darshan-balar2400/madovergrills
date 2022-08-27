<!-- select all items  -->
<?php
include "../conn.php";

$sql = "select * from items";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="Admin_.css" rel="stylesheet">
    <title>Admin Panel</title>
</head>
<!-- when new item added -->
<?php

if (isset($_POST['insertbtn'])) {
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];

    $file_name = $_FILES['item_image']['name'];
    $file_size = $_FILES['item_image']['size'];
    $file_type = $_FILES['item_image']['type'];
    $file_tmp_name = $_FILES['item_image']['tmp_name'];

    if ($file_type == "image/png" || $file_type == "image/jpeg" || $file_type == "image/jpg") {
        if ($_FILES['item_image']['error'] > 0) {
            die($_FILES['item_image']['error']);
        } else {
            move_uploaded_file($file_tmp_name, "../images_items/" . $file_name);
            $item_image = $file_name;
        }
    }

    $sql = "insert into items (item_name,item_price,item_image) values('$item_name','$item_price','$item_image')";

    if (mysqli_query($conn, $sql)) {
        header("Location:items.php");
    }
}

?>

<body>
    <div class="admin_container">
        <div class="admin_content">
            <?php include "menu.php" ?>
            <div class="admin_body">
                <div class="admin_body_content">
                    <div class="top mb-5">
                        <button class="button" data-toggle="modal" data-target="#exampleModalScrollable">Create Item</button>
                    </div>
                    <div class="table-responsive-lg items_table">
                        <table class="table table-striped  table-hover" style="font-size:1.5rem;">
                            <thead>
                                <tr>
                                    <th scope="col">Item_Id</th>
                                    <th scope="col">Item_Name</th>
                                    <th scope="col">Item_Price</th>
                                    <th scope="col">Item_Image</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>
                            <th scope='row'>$row[0]</th>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td><img src='../images_items/$row[3]' width='100' height='100'></img></td>
                            <td><a href='edititem.php?item_id=" . $row[0] . "' class='edit'>Edit</a></td>
                            <td><a href='deleteitem.php?item_id=" . $row[0] . "' class='delete'>Delete</a></td>
                            </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Insert Modal -->
                    <div class="modal fade" id="exampleModalScrollable">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="header">
                                    <h5 class="modal-title text-center" id="exampleModalScrollableTitle">Add New Item</h5>

                                </div>
                                <div class="body mt-5 mb-5">
                                    <form action="" method="POST" autocomplete="false" id="itemForm" enctype="multipart/form-data">
                                        <!-- item name -->
                                        <div class="input">
                                            <p>item name</p>
                                            <input type="text" name="item_name" id="item_name" required>
                                        </div>
                                        <!-- item price -->
                                        <div class="input">
                                            <p>item price</p>
                                            <input type="text" name="item_price" id="item_price" required>
                                        </div>
                                        <!-- item image -->
                                        <div class="input">
                                            <p>item image</p>
                                            <input type="file" name="item_image" id="item_image" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="footer">
                                    <button type="submit" class="button" name="insertbtn" form="itemForm">Insert</button>
                                    <button type="submit" class="button bg-secondary" name="insertbtn" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>