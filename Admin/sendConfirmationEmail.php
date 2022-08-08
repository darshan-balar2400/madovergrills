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
  $message = "
  <div class='table-responsive-lg mt-5' id='data'>
    <table class='table table-striped  table-hover' style='font-size:1.5rem;'>
        <thead>
            <tr>
                <th scope='col'>book_id</th>
                <th scope='col'>name</th>
                <th scope='col'>email</th>
                <th scope='col'>phno</th>
                <th scope='col'>branch</th>
                <th scope='col'>peoples</th>
                <th scope='col'>desire_date</th>
                <th scope='col'>desire_time</th>
                
            </tr>
        </thead>
        <tbody>
        <tr>
        <th scope='row'>$row[0]</th>
        <td>$row[1]</td>
        <td>$row[2]</td>
        <td>$row[3]</td>
        <td>$row[4]</td>
        <td>$row[5]</td>
        <td>$row[6]</td>
        <td>$row[7]</td>
        </tbody>
        </table>
        </div>";
  $header = "From:balardarshan40@gmail.com \r\n";
  $header .= "MIME-Version: 1.0\r\n";
  $header .= "Content-type: text/html\r\n";

  if (mail($to, $subject, $message, $header)) {
    header("Location:booked_tables.php");
  } else {
    die("Something went wrong" . mysqli_error($conn));
  }
}
