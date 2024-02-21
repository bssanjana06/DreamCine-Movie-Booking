<?php
session_start();

if (!isset($_SESSION['uname'])) {
    header("location:index.php");
    exit();
}

include "Database.php";

$result = mysqli_query($conn, "SELECT c.movie, c.booking_date, c.show_time, c.seat, c.totalseat, c.price, c.payment_date, c.customer_id, u.username, u.email, u.mobile, u.city, t.theater FROM customers c INNER JOIN user u on c.uid=u.id INNER JOIN theater_show t on c.show_time=t.show WHERE customer_id = '" . $_SESSION['customer_id'] . "'");
$row = mysqli_fetch_array($result);

// Generate the content for the download file
$content = "Customer Id: " . $row['customer_id'] . "\n";
$content .= "Date: " . $row['payment_date'] . "\n";
$content .= "Movie Name: " . $row['movie'] . "\n";
$content .= "User Details:\n";
$content .= "Name: " . $row['username'] . "\n";
$content .= "City: " . $row['city'] . "\n";
$content .= "Email: " . $row['email'] . "\n";
$content .= "Phone: " . $row['mobile'] . "\n";
$content .= "Payment Details:\n";
$content .= "Payment Date: " . $row['payment_date'] . "\n";
$content .= "Payment Amount: RS. " . $row['price'] . "/-\n";
$content .= "Booking Details:\n";
$content .= "Theater: No. " . $row['theater'] . "\n";
$content .= "Date: " . $row['booking_date'] . "\n";
$content .= "Time: " . $row['show_time'] . "\n";
$content .= "Seats: " . implode(', ', array_unique(explode(',', $row['seat']))) . "\n";
$content .= "Total Seats: " . $row['totalseat'] . "\n";

// Set the content type and provide a file name for download
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="booking_summary.txt"');

// Output the content
echo $content;
?>
