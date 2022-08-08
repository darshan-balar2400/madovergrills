<?php

include "conn.php";

$sql = "select * from branchs";
$result = mysqli_query($conn, $sql);

$sql2 = "select * from items";
$result2 = mysqli_query($conn, $sql2);

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
    <script src="https://use.fontawesome.com/28a86f7b21.js"></script>
    <!-- css -->
    <link href="index_.css" rel="stylesheet" type="text/css">
    <title>Mad Over Grills</title>
</head>
<?php
if (isset($_POST['reservationbtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $person = $_POST['person'];
    $phno = $_POST['phno'];
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "insert into book_table (name,email,phno,branch,peoples,desire_date,desire_time) values ('$name','$email','$phno','$branch','$person','$date','$time')";

    if (mysqli_query($conn, $sql)) {
        header("location:menu.php");
    } else {
        echo mysqli_error($conn);
    }
}
?>

<body>
    <div class="container-fluid m-0 p-0">
        <header>
            <div class="container navbar-section">
                <div class="navbar-brand">
                    <img src="images/Logo.png" alt="Logo" />
                </div>
                <div class="links">
                    <nav>
                        <a href="index.php">Home</a>
                        <a href="menu.php" class="activelink">Menu</a>
                        <a href="about.php">About Us</a>
                        <a href="contact.php">Contact Us</a>
                        <a href="#">Gallary</a>
                        <a href="feedback.php">Feedback</a>
                    </nav>
                </div>
                <div class="button_">
                    <a href="branches.php"><button class="button"> All Branches</button></a>
                </div>
                <div class="menu_button">
                    <button class="menu_button" onclick="showMenu()">
                    <ion-icon name="menu-outline"></ion-icon>
                        </button>
                </div>
            </div>

            
        </header>
        <?php include "mobilenavbar.php";?>
        <section>
            <!-- hero section -->
            <div class="hero-section menu-hero-section">
                <div class="hero-content container justify-content-center d-flex">
                    <h1 class="title text-center">Menu</h1>
                </div>
            </div>
            <!-- menu Section -->
            <div class="menu-section container">
                <div class="items">
                    <?php
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<div class='item'>
                            <div class='row_'>
                                <div class=' col_'>
                                    <img src='images_items/$row[3]' alt='burger'>
                                </div>
                                <div class=' col_'>
                                  <h4 class='price'>Rs.$row[2]</h4>
                                  <h5 class='desc'>$row[1]
                                  </h5>
                                </div>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
            </div>
            <?php include 'reservationtable.php'; ?>
        </section>
        <footer>
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12">© 2021 Made Over Grills. All rights reserved. | Design & Developed by Bitzscript
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script type="text/javascript" src="reservationformvalidation.js">
    </script>
</body>

</html>