<?php

include "conn.php";

$sql = "select * from branchs";
$result = mysqli_query($conn, $sql);

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
        header("location:index.php");
    } else {
        echo mysqli_error($conn);
    }
}

if(isset($_POST['contactbtn'])){
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_phno = $_POST['c_phno'];
    $c_message = $_POST['c_message'];

    $sql2 = "insert into contacts (name,email,phno,message) values ('$c_name','$c_email',$c_phno,'$c_message')";

    if(mysqli_query($conn, $sql2)){
        header("location:index.php");
    }
    else {
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
                        <a href="about.php">About Us</a>
                        <a href="contact.php" class="activelink">Contact Us</a>
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
                    <h1 class="title text-center">Contact Us</h1>
                </div>
            </div>
            <!-- About Section -->
            <div class="contact-section container">
                <div class="row m-0 p-0">
                    <div class="col-sm-6 contact-content">
                        <h1 class="title">Contact Us</h1>
                        <div class="boxes">
                            <div class="box">
                                <div class="row">
                                    <div class="col-sm-2 icon">
                                        <ion-icon name="mail-outline"></ion-icon>
                                    </div>
                                    <div class="col-sm-10 text">
                                        <h4>balardarshan40@gmail.com</h4>
                                        <h6>Send us your query anytime!</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="row">
                                    <div class="col-sm-2 icon">
                                        <ion-icon name="call-outline"></ion-icon>
                                    </div>
                                    <div class="col-sm-10 text">
                                        <h4>+91 7623919269</h4>
                                        <h6>Mon to Sat 11am to 11 pm</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 contact-form">
                        <div class="title">
                            Send Us Message
                        </div>
                        <div class="sub-title">We are here to answer any question you may have</div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="false" id="contactForm" enctype="multipart/form-data">

                            <!-- name -->
                            <div class="input">
                                <p>name</p>
                                <input type="text" name="c_name" id="c_name" minlength="2" required>
                            </div>
                            <!-- email -->
                            <div class="input">
                                <p>email</p>
                                <input type="email" name="c_email" id="c_email" required>
                            </div>

                            <!-- email -->
                            <div class="input">
                                <p>phone no</p>
                                <input type="number" name="c_phno" id="c_phno" required>
                            </div>

                            <div class="input">
                                <p>Message</p>
                                <textarea name="c_message" id='c_message' minlength="20" required></textarea>
                            </div>

                            <button class="button mt-4" name="contactbtn">Send Message</button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- ad section -->
            <div class="ad-section container">
                <div class="ad-content container">
                    <h4>MONDAY – SATURDAY : SERVICE 11:00 AM-11:00 PM
                    </h4>
                    <h1>Making a reservation at Mad Over Grills is easy and takes just a couple of minutes.
                    </h1>
                    <div class="row mt-5 chat-with-us">
                        <div class="col-sm-6"><a href="https://wa.me/7623919269"target="_blank"><button class="button">Chat With Us</button></a></div>
                        <div class="col-sm-6 call-text">or call +91 7623919269</div>
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