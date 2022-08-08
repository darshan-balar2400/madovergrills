<?php

    if(isset($_GET['contact_id'])){
        include "../conn.php";
        $sql = "delete from contacts where contact_id = ".$_GET['contact_id'];
        if(mysqli_query($conn,$sql)){
            header("Location:questions.php");
        }
    }

?>