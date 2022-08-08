<?php

    if(isset($_GET['book_id'])){
        include "../conn.php";
        $sql = "delete from book_table where book_id = ".$_GET['book_id'];
        if(mysqli_query($conn,$sql)){
            header("Location:booked_tables.php");
        }
    }

?>