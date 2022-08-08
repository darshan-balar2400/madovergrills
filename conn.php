<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $db = "madovergrills";

    $conn = mysqli_connect($hostname,$user,$password,$db);

    if(!$conn){
        die("Could not connect to database".mysqli_connect_errno());
    }
?>