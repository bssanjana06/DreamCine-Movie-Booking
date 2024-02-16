<?php
include "Database.php";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $oldpassword = mysqli_real_escape_string($conn, $_POST['oldpassword']);
    $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $sql_query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $id = $row['id'];
        $update_record = mysqli_query($conn, "UPDATE `user` SET `password` = '$newpassword' WHERE `id` = '$id'");
        header("Location: login.php");
        exit();
    } else {
        echo "<p>Invalid credentials. Please check your details and try again.</p>";
    }
}
?>
