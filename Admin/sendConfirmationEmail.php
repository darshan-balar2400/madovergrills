<?php
if (isset($_GET['book_id']) && isset($_GET['email'])) {
  include "../conn.php";
  $email = filter_var($_GET['email'],FILTER_SANITIZE_EMAIL);
  $book_id = $_GET['book_id'];

  $sql = "select * from book_table where book_id = $book_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  $to = $email;
  $subject = "Confirmation Of Table";
  $message = "Your Confirmation Id Is : $row[0], Please Show This Id To Our Restaurant Receptionist";
  $header = "From:balardarshan40@gmail.com \r\n";
  $header .= "MIME-Version: 1.0\r\n";
  $header .= "Content-type: text/html\r\n";

  if (mail($to, $subject, $message, $header)) {
    header("Location:booked_tables.php");
  } else {
    die("Something went wrong" . mysqli_error($conn));
  }
}
