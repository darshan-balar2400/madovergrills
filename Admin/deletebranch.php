<?php

    if(isset($_GET['branch_no'])){
        include "../conn.php";
        $sql = "delete from branchs where branch_no =".$_GET['branch_no'];
        if(mysqli_query($conn,$sql)){
            header("Location:branches.php");
        }
    }

?>