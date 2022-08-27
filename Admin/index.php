
<?php

include "../conn.php";

$sql1 = mysqli_query($conn, "select * from feedback");
$feedbackcount = mysqli_num_rows($sql1);

$sql2 = mysqli_query($conn, "select * from items");
$itemscount = mysqli_num_rows($sql2);

$sql3 = mysqli_query($conn, "select *  from branchs");
$branchescount = mysqli_num_rows($sql3);


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

<body>
    <div class="admin_container">
        <div class="admin_content">
            <?php include "menu.php" ?>
            <div class="admin_body">
                <div class="admin_body_content">
                    <div class="card-columns">
                        <div class="card ">
                            <div class="card-body">
                                <h5 class="card-title text-secondary">Total Items</h5>
                                <h1 class="card-text text-success display-3"><?php echo $itemscount; ?></h1>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-secondary">Total Feedbacks</h5>
                                <h1 class="card-text text-info display-3"><?php echo $feedbackcount; ?></h1>

                            </div>
                        </div>
                        <div class="card ">

                            <div class="card-body ">
                                <h5 class="card-title text-secondary">Total Branches</h5>
                                <h1 class="card-text display-3"><?php echo $branchescount; ?></h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>