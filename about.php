<?php

    include "conn.php";

    $sql = "select * from branchs";
    $result = mysqli_query($conn,$sql);

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
    <!-- css -->
    <link href="index_.css" rel="stylesheet" type="text/css">
    <title>Mad Over Grills</title>
</head>
<?php
    if(isset($_POST['reservationbtn'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $person = $_POST['person'];
        $phno = $_POST['phno'];
        $branch = $_POST['branch'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $sql = "insert into book_table (name,email,phno,branch,peoples,desire_date,desire_time) values ('$name','$email','$phno','$branch','$person','$date','$time')";

        if(mysqli_query($conn,$sql)){
            header("location:index.php");
        }
        else{
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
                        <a href="menu.php">Menu</a>
                        <a href="about.php" class="activelink">About Us</a>
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
        <?php include "mobilenavbar.php"; ?>
        <section>
        <div class="hero-section menu-hero-section">
                <div class="hero-content container justify-content-center d-flex">
                    <h1 class="title  text-center">About Us</h1>
                </div>
            </div>
            <!-- About Section -->
            <div class="about-section container">
                <div class="row m-0 p-0">
                    <div class="col-sm-6 about-img"><img src="images/about.jpg" alt="aboutimg"></div>
                    <div class="col-sm-6 about-content">
                        <h1 class="small-title">About Us</h1>
                        <h5 class="text">One of the leading casual dining places in Gujarat, Mad Over Grills pioneered the concept of “over the table barbeques” live grills embedded in dinning tables and serves the irresistible treats and the yummiest unlimited dinning experiences, including Chats, desserts, main course, mocktails and much more!!
                        One of the leading casual dining places in Gujarat, Mad Over Grills pioneered the concept of “over the table barbeques” live grills embedded in dinning tables and serves the irresistible treats and the yummiest unlimited dinning experiences, including Chats, desserts, main course, mocktails and much more!!
                        One of the leading casual dining places in Gujarat, Mad Over Grills pioneered the concept of “over the table barbeques” live grills embedded in dinning tables and serves the irresistible treats and the yummiest unlimited dinning experiences, including Chats, desserts, main course, mocktails and much more!!
                        One of the leading casual dining places in Gujarat, Mad Over Grills pioneered the concept of “over the table barbeques” live grills embedded in dinning tables and serves the irresistible treats and the yummiest unlimited dinning experiences, including Chats, desserts, main course, mocktails and much more!!
                      

                        </h5>
                        <a href="menu.php"><button class="button">See Menu</button></a>
                    </div>
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