<?php
include "../conn.php";

$sql = "select * from branchs";
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
    $branch_name = $_POST['branch_name'];
    $branch_city = $_POST['branch_city'];
    $branch_state = $_POST['branch_state'];
    $branch_address = $_POST['branch_address'];
    $branch_phno = $_POST['branch_phno'];
    $branch_area = $_POST['branch_area'];
    $branch_map = $_POST['branch_map'];

    $sql = "insert into branchs (branch_city,branch_state,branch_address,branch_phno,branch_area,branch_map_link) values('$branch_city','$branch_state','$branch_address','$branch_phno','$branch_area','$branch_map')";

    if (mysqli_query($conn, $sql)) {
        header("Location:branches.php");
    }
}

?>
<body>
    <div class="admin_container">
        <div class="admin_content">
            <?php include "menu.php"; ?>
            <div class="admin_body">
                <div class="admin_body_content">
                <div class="top mb-5">
                        <button class="button" data-toggle="modal" data-target="#exampleModalScrollable">Add New Branch</button>
                    </div>
                    <div class="table-responsive-lg mt-5">
                        <table class="table table-striped  table-hover" style="font-size:1.5rem;">
                            <thead>
                                <tr>
                                    <th scope="col">branch_no</th>
                                    <th scope="col">branch_city</th>
                                    <th scope="col">branch_state</th>
                                    <th scope="col">branch_address</th>
                                    <th scope="col">branch_phno</th>
                                    <th scope="col">branch_area</th>
                                    <th scope="col">branch_map_link</th>
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
                            <td>$row[3]</td>
                            <td>$row[4]</td>
                            <td>$row[5]</td>
                            <td><a href='$row[6]'>map</a></td>
                            <td><a href='editbranch.php?branch_no=$row[0]' class='edit'>edit</a></td>
                            <td><a href='deletebranch.php?branch_no=" . $row[0] . "' class='delete'>Delete</a></td>
                            </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Insert Modal -->
     <div class="modal fade" id="exampleModalScrollable">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="header">
                                    <h5 class="modal-title text-center" id="exampleModalScrollableTitle">Add New Brancgh</h5>

                                </div>
                                <div class="body mt-5 mb-5">
                                    <form action="" method="POST" autocomplete="false" id="itemForm" enctype="multipart/form-data">
                                       
                                        <!-- item price -->
                                        <div class="input">
                                            <p>branch_city</p>
                                            <input type="text" name="branch_city" id="branch_city" required>
                                        </div>
                                        <!-- item image -->
                                        <div class="input">
                                            <p>branch_state</p>
                                            <input type="text" name="branch_state" id="branch_state" required>
                                        </div>

                                        <!-- item image -->
                                        <div class="input">
                                            <p>branch_area</p>
                                            <input type="text" name="branch_area" id="branch_area" required>
                                        </div>

                                         <!-- item image -->
                                         <div class="input">
                                            <p>branch_phno</p>
                                            <input type="number" name="branch_phno" id="branch_phno" required>
                                        </div>

                                        <div class="input">
                                            <p>branch_address</p>
                                            <input type="text" name="branch_address" id="branch_address" required>
                                        </div>

                                        <div class="input">
                                            <p>branch_map</p>
                                            <input type="text" name="branch_map" id="branch_map" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="footer">
                                    <button type="submit" class="button" name="insertbtn" form="itemForm">Insert</button>
                                    <button type="submit" class="button bg-secondary" name="insertbtn" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
</body>

</html>