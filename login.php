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
                $response = "Invalid Username or password. Please check your credentials and try again.  <a href='login_form.php'>GO BACK</a>";
            }

            mysqli_stmt_close($stmt);
        } else {
            $response = "Failed to prepare the SQL statement.";
        }
    }

    // If there are errors, echo the user-friendly message
    if (!empty($response)) {
        echo $response;
        exit();
    }
}

// If the form is accessed directly without submission, redirect to the login form
header("Location: login_form.php");
exit();
?>
