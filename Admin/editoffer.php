<?php
include "../conn.php";

$offer_expire = "";
$offer_image = "";

if (isset($_GET['offer_id'])) {
    $item_id = $_GET['offer_id'];
    $sql = "select * from offers where offer_id = " . $_GET['offer_id'];
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $offer_expire = $row[1];
        $offer_image = $row[2];
    }
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
    $offer_expire = $_POST['offer_expire'];
    $offer_image = $_POST['offer_image'];

    $file_name = $_FILES['offer_image']['name'];
    $file_size = $_FILES['offer_image']['size'];
    $file_type = $_FILES['offer_image']['type'];
    $file_tmp_name = $_FILES['offer_image']['tmp_name'];

    if ($file_type == "image/png" || $file_type == "image/jpeg" || $file_type == "image/jpg") {
        if ($_FILES['offer_image']['error'] > 0) {
            die($_FILES['offer_image']['error']);
        } else {
            move_uploaded_file($file_tmp_name, "../offers/" . $file_name);
            $offer_image = $file_name;
        }
    }

    $sql = "update offers set offer_expire = '$offer_expire', offer_image = '$offer_image' where offer_id = " . $offer_id;

    if (mysqli_query($conn, $sql)) {
       header("location:offers.php");
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
                        <a href="offers.php">back to offers</a>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="false" id="itemForm" enctype="multipart/form-data">
                       
                        <div class="input">
                            <p>item price</p>
                            <input type="datetime-local" value="<?php echo $offer_expire; ?>" name="offer_expire" id="offer_expire" required>
                        </div>
                        <!-- item image -->
                        <div class="input">
                            <p>item image</p>
                            <input type="file"  value="<?php echo $offer_image; ?>" name="offer_image" id="offer_image" required>
                        </div>

                        <button type="submit" name="updatebtn" class="button mt-5" value="Update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>