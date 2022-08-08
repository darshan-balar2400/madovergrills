<?php
include "../conn.php";

$item_name = "";
$item_image = "";
$item_price = "";

if (isset($_GET['branch_no'])) {
    $branch_no = $_GET['branch_no'];
    $sql = "select * from branchs where branch_no = " . $_GET['branch_no'];
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $branch_city = $row[1];
        $branch_state = $row[2];
        $branch_address = $row[3];
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
    $branch_no = $_POST['branch_no'];
    $branch_city = $_POST['branch_city'];
    $branch_state = $_POST['branch_state'];
    $branch_address = $_POST['branch_address'];

    $sql = "update branchs set branch_city = '$branch_city', branch_state = '$branch_state',branch_address = '$branch_address' where branch_no = " . $branch_no;

    if (mysqli_query($conn, $sql)) {
       header("location:branches.php");
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
                        <a href="items.php">back to branchs</a>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="false" id="itemForm" >
                        <!-- item name -->
                        <div class="input">
                            <p>branch_no</p>
                            <input type="text" value="<?php echo $branch_no; ?>" name="branch_no" id="branch_no" required>
                        </div>
                        <!-- item name -->
                        <div class="input">
                            <p>branch_city</p>
                            <input type="text" value="<?php echo $branch_city; ?>" name="branch_city" id="branch_city" required>
                        </div>
                        <!-- item price -->
                        <div class="input">
                            <p>branch_state</p>
                            <input type="text" value="<?php echo $branch_state; ?>" name="branch_state" id="branch_state" required>
                        </div>
                        <!-- item image -->
                        <div class="input">
                            <p>branch_address</p>
                            <textarea   name="branch_address" id="branch_address" required><?php echo $branch_address; ?></textarea>
                        </div>

                        <button type="submit" name="updatebtn" class="button mt-5" value="Update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>