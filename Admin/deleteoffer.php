<?php

    if(isset($_GET['offer_id'])){
        include "../conn.php";
        $sql = "delete from offers where offer_id = ".$_GET['offer_id'];
        if(mysqli_query($conn,$sql)){
            header("Location:offers.php");
        }
    }

?>