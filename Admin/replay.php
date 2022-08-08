<?php
include "../conn.php";

if (isset($_GET['contact_id'])) {
    $item_id = $_GET['contact_id'];
    $sql = "select * from contacts where contact_id = " . $_GET['contact_id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $email = filter_var($row['email'],FILTER_SANITIZE_EMAIL);
}

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
    <link href="Admin_.css" rel="stylesheet">
    <title>Admin Panel</title>
</head>

<body>
<?php

if (isset($_POST['sendbtn'])) {
   $email_ = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
   $subject = trim($_POST['email_subject']);
   $message = trim($_POST['email_message']);
   $header = "From: balardarshan40@gmail.com";

   if(mail($email_,$subject,$message,$header)){
    header("questions.php");
   }
   else{
    echo "not success !";
   }
}

?>
    <div class="admin_container">
        <div class="admin_content">
            <?php include "menu.php" ?>
            <div class="admin_body">
                <div class="admin_body_content">
                    <div class="top mb-5">
                        <a href="questions.php">back to questions</a>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="false" id="itemForm" enctype="multipart/form-data">
                         
                     <!-- item name -->
                     <div class="input">
                            <p>email</p>
                            <input type="text" value="<?php echo $email; ?>" name="email" id="email" required readonly>
                        </div>
                        <!-- item name -->
                        <div class="input">
                            <p>email subject</p>
                            <input type="text"  name="email_subject" id="email_subject" required>
                        </div>
                        <!-- item name -->
                        <div class="input">
                            <p>email message</p>
                            <textarea name="email_message" id="email_message" required></textarea>
                        </div>
                        
                        <button type="submit" name="sendbtn" class="button mt-5" value="Send">Send Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>