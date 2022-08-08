<?php
include "../conn.php";

$sql = "select * from book_table";
$result = mysqli_query($conn, $sql);

$branches = "select branch_no,branch_address,branch_city,branch_state from branchs";
$result2 = mysqli_query($conn, $branches);

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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="Admin_.css" rel="stylesheet">
    <title>Admin Panel</title>

    <script type="text/javascript">
        
        const showDataByBranch = (value) => {

            try {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.open('GET', `getByBranch.php?branch_no=${value}`, true);

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("data").innerHTML = this.responseText;
                    }

                }

                xmlhttp.send();

            } catch (e) {

            }
        }

        const searchData = (value,branch) => {
            try {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.open('GET', `getDataByBookId.php?book_id=${value}&branch_no=${branch}`, true);

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("data").innerHTML = this.responseText;
                    }

                }

                xmlhttp.send();

            } catch (e) {

            }
        }
    </script>
</head>

<body>
    <div class="admin_container">
        <div class="admin_content">
            <?php include "menu.php"; ?>
            <div class="admin_body">
                <div class="admin_body_content">
                    <div class="input">
                        <p>Select Branch</p>
                        <select name="branch" id="branch" onchange="showDataByBranch(this.value)">
                            <option value="">All</option>
                            <?php
                            while ($row = mysqli_fetch_array($result2)) {
                                echo "<option value='$row[0]'>$row[0] | $row[1] | $row[2] | $row[3]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input">
                        <p>search</p>
                        <div class="input_with_icon">
                            <input type="text" placeholder="Enter Book Id" name="search" id="search"/>
                            <span class="search" onclick="searchData(document.getElementById('search').value,document.getElementById('branch').value)">
                            <ion-icon name="search-outline"></ion-icon>
                            </span>
                        </div>
                    </div>
                    <div class="table-responsive-lg mt-5" id="data">
                        <table class="table table-striped  table-hover" style="font-size:1.5rem;">
                            <thead>
                                <tr>
                                    <th scope="col">book_id</th>

                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phno</th>
                                    <th scope="col">branch</th>
                                    <th scope="col">peoples</th>
                                    <th scope="col">desire_date</th>
                                    <th scope="col">desire_time</th>
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
                            <td>$row[6]</td>
                            <td>$row[7]</td>
                            <td><a href='sendConfirmationEmail.php?book_id=$row[0]&email=$row[2]' class='edit'>CONFIRM</a></td>
                            <td><a href='deletebookedtable.php?book_id=" . $row[0] . "' class='delete'>Delete</a></td>
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