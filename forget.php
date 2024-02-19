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

    if (!$row) {
        echo "<p><font color='red'>Email is not registered.</font></p>";
        exit();
    }

    if ($newpassword != $cpassword) {
        echo "<p><font color='red'>New password and confirm password do not match. Please try again.</font></p>";
        exit();
    }
    $id = $row['id'];
    $update_record = mysqli_query($conn, "UPDATE `user` SET `password` = '$newpassword' WHERE `id` = '$id'");

    if ($update_record) {
        echo "<p><font color='white'>Password updated successfully.<br><a href='login.php'>Login</a> with your new password.</font></p>";
    } else {
        echo "<p><font color='red'>Error updating password. Please try again.</font></p>";
    }
}
?>
