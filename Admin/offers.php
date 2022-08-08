<?php
include "../conn.php";

$sql = "select * from offers";
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
<?php

if (isset($_POST['insertbtn'])) {
    $offer_expire = $_POST['offer_expire'];

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

    $sql = "insert into offers (offer_expire,offer_image) values('$offer_expire','$offer_image')";

    if (mysqli_query($conn, $sql)) {
        header("Location:offers.php");
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
                        <button class="button" data-toggle="modal" data-target="#exampleModalScrollable">Add Offer</button>
                    </div>
                    <div class="table-responsive-lg">
                        <table class="table table-striped  table-hover" style="font-size:1.5rem;">
                            <thead>
                                <tr>
                                    <th scope="col">offer_id</th>
                                    <th scope="col">offer_expire</th>
                                    <th scope="col">offer_image</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>
                            <th scope='row'>$row[0]</th>
                            <td>$row[2]</td>
                            <td><img src='../offers/$row[1]' width='100' height='100'></img></td>
                            <td><a href='editoffer.php?offer_id=" . $row[0] . "' class='edit'>Edit</a></td>
                            <td><a href='deleteoffer.php?offer_id=" . $row[0] . "' class='delete'>Delete</a></td>
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
                                    <h5 class="modal-title text-center" id="exampleModalScrollableTitle">Add New Offer</h5>

                                </div>
                                <div class="body mt-5 mb-5">
                                    <form action="" method="POST" autocomplete="false" id="itemForm" enctype="multipart/form-data">
                                        
                                        <!-- offer image -->
                                        <div class="input">
                                            <p>item image</p>
                                            <input type="file" name="offer_image" id="offer_image" required>
                                        </div>
                                        
                                        <!-- offer expire -->
                                        <div class="input">
                                            <p>offer_expire</p>
                                            <input type="datetime-local" name="offer_expire" id="offer_expire" required>
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