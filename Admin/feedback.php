<?php
include "../conn.php";

$sql = "select * from feedback";
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

<body>
    <div class="admin_container">
        <div class="admin_content">
            <?php include "menu.php" ?>
            <div class="admin_body">
                <div class="admin_body_content">
                    
                    <div class="table-responsive-lg">
                        <table class="table table-striped  table-hover" style="font-size:1.5rem;">
                            <thead>
                                <tr>
                                    <th scope="col">feedback_id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">message</th>
                                   
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
                          
                            <td><a href='deletefeedback.php?feedback_id=" . $row[0] . "' class='delete'>Delete</a></td>
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
</body>

</html>