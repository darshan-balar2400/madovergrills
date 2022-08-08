<?php
include "../conn.php";

$item_name = "";
$item_image = "";
$item_price = "";

if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];
    $sql = "select * from items where item_id = " . $_GET['item_id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $item_name = $row[1];
    $item_price = $row[2];
    $item_image = $row[3];
};


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
<?php

if (isset($_POST['updatebtn'])) {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_image = $_POST['pre_item_image'];


    $file_name = $_FILES['item_image']['name'];

    if ($file_name) {
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
    }

    $sql = "update items set item_name = '$item_name', item_price = $item_price,item_image = '$item_image' where item_id = " . $item_id;


    if (mysqli_query($conn, $sql)) {
        header("location:items.php");
    } else {
        echo mysqli_error($conn);
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
                        <a href="items.php">back to Items</a>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="false" id="itemForm" enctype="multipart/form-data">
                        <!-- item name -->
                        <div class="input">
                            <p>item name</p>
                            <input type="text" value="<?php echo $item_id; ?>" name="item_id" id="item_id" required>
                        </div>
                        <!-- item name -->
                        <div class="input">
                            <p>item name</p>
                            <input type="text" value="<?php echo $item_name; ?>" name="item_name" id="item_name" required>
                        </div>
                        <!-- item price -->
                        <div class="input">
                            <p>item price</p>
                            <input type="text" value="<?php echo $item_price; ?>" name="item_price" id="item_price" required>
                        </div>
                        <input type="hidden" value="<?php echo $item_image; ?>" name="pre_item_image">
                        <!-- item image -->
                        <img src="<?php echo "../images_items/$item_image"; ?>" width="100" height="100" alt="img" />
                        <div class="input">
                            <p>new image (optional)</p>
                            <input type="file" name="item_image" id="item_image">
                        </div>

                        <button type="submit" name="updatebtn" class="button mt-5" value="Update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>