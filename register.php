<?php
include("Database.php");
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['number'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $status = 1;

    // Check for duplicate entry
    $check_duplicate_query = mysqli_query($conn, "SELECT id FROM user WHERE username = '$username' AND email = '$email'");

    if (mysqli_num_rows($check_duplicate_query) > 0) {
        $_SESSION['register_message'] = "<font color='red'>*Already Registered</font>";
    } else {
        // Insert new record using prepared statement
        $insert_record = mysqli_prepare($conn, "INSERT INTO user (`username`, `email`, `mobile`, `city`, `password`) VALUES(?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($insert_record, "sssss", $username, $email, $mobile, $city, $password);


        if (mysqli_stmt_execute($insert_record)) {
            $_SESSION['register_message'] = "Registration successful!<a href='login_form.php'>  Login Here</a>";
        } else {
            $_SESSION['register_message'] = "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($insert_record);
    }

    header("Location: register_form.php");
    exit();
}
?>
