<?php

    if(isset($_GET['feedback_id'])){
        include "../conn.php";
        $sql = "delete from feedback where feedback_id = ".$_GET['feedback_id'];
        if(mysqli_query($conn,$sql)){
            header("Location:feedback.php");
        }
    }

?>