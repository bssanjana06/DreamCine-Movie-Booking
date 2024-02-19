<?php
include("Database.php");
session_start();

if (isset($_POST['login'])) {
    $response = ""; // Initialize the response variable

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $response = "Please enter both Username and Password.";
    } else {
        $uname = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql_query = "SELECT count(*) as cntUser FROM user WHERE username=? and password=?";
        $stmt = mysqli_prepare($conn, $sql_query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $uname, $password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $count);
            mysqli_stmt_fetch($stmt);

            if ($count > 0) {
                $_SESSION['uname'] = $uname;
                header("Location: index.php");
                exit();
            } else {
                $response =" <font color='red'>*Invalid Username or Password.</font> ";
                $_SESSION['login_message'] = $response;
                header("Location: login_form.php");
                exit();
            }

            mysqli_stmt_close($stmt);
        } else {
            $response = "Failed to prepare the SQL statement.";
            $_SESSION['login_message'] = $response;
            header("Location: login_form.php");
            exit();
        }
    }
}

// If the form is accessed directly without submission, redirect to the login form
header("Location: login_form.php");
exit();
?>
