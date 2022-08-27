<?php

$book_id = $_GET['book_id'];
$branch_no = $_GET['branch_no'];

include "../conn.php";

if ($branch_no === "") {
    $sql = "select * from book_table where book_id like '%$book_id%'";
} 
else {
    $sql = "select * from book_table where branch like '%$branch_no%' and book_id like '%$book_id%'";
}
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
                          
                            <td><a href='' class='edit'>CONFIRM</a></td>
                            <td><a href='deletebookedtable.php?feedback_id=" . $row[0] . "' class='delete'>Delete</a></td>
                            </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>