<?php

    if(isset($_GET['item_id'])){
        include "../conn.php";
        $sql = "delete from items where item_id = ".$_GET['item_id'];
        if(mysqli_query($conn,$sql)){
            header("Location:items.php");
        }
    }

?>