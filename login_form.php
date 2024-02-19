<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/register.css">
    <script src="js/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
      .container {
        background-color: #333; 
        max-width: 400px; /* Adjusted width */
        margin: auto; 
        padding: 20px; 
        border-radius: 10px; 
      }

      .user-details,
      .button {
        margin-top: 20px;
      }

      input[type="submit"] {
        background-color: #6f42c1; /* Purpleish blue color */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      body {
        color: white;
        background-color: #222;
      }

      .details {
        height: 20px;
      }

      .input-box input[type="text"],
      .input-box input[type="password"] {
        color: black; /* Change text color to black */
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: none;
        border-radius: 5px;
        box-sizing: border-box;
      }
    </style>

  </head>

  <body>

    <div class="container">
      <center><a href="index.php"><img src="img/logo1.png" alt="" style="margin-top: 10px; width: 60%; margin-bottom:20px;"></a></center>
      <div class="title" style="margin-bottom:30px;">Login</div>
      <div class="content">
        <form id="form" action="login.php" method="post" enctype="multipart/form-data" onsubmit="return validate();">
          
          <div class="input-box">
            <span class="details">UserName</span>
            <input type="text" id="username" name="username" placeholder="Enter your name">
            <p id="nameerror"></p>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" id="password" name="password" placeholder="Enter your password">
            <p id="passworderror"></p>
          </div>
          
          <p id="error_para"></p>
          <div id="err"></div>
          <div class="button">
            <input type="submit" value="Login" id="login" name="login">
          </div>
        </form>
        <!-- Place this where you want to display the login message -->
        <?php
           session_start();
           if (isset($_SESSION['login_message'])) {
           echo $_SESSION['login_message'];
            unset($_SESSION['login_message']); // Clear the message after displaying
           }
        ?>

        
        <div class="details">
          <a href="forget_password.php">Forgot your password?</a>
        </div>
        <div class="details">
          <p>Don't have an account? <a href="register_form.php">Register now</a></p>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      function validate() {
        var error = "";
        var username = document.getElementById("username");
        var password = document.getElementById("password");

        if (username.value == "") {
          error = " <font color='red'>!UserName required.</font> ";
          document.getElementById("nameerror").innerHTML = error;
          return false;
        }

        if (password.value == "") {
          error = " <font color='red'>!Password required.</font> ";
          document.getElementById("passworderror").innerHTML = error;
          return false;
        }

        // Additional validation logic can be added here

        return true;
      }
    </script>

  </body>
</html>
