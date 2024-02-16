<html>
<head>
<title> Login Page</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="site.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <form action="forget.php" method="post">
        <label>Email ID:</label>
        <input type="text" name="email" required /><br>

        <label>Old Password:</label>
        <input type="password" name="oldpassword" required /><br>

        <label>New Password:</label>
        <input type="password" name="newpassword" required /><br>

        <label>Confirm Password:</label>
        <input type="password" name="cpassword" required /><br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>