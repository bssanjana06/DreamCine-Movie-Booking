<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Forget Password</title>
  <link rel="stylesheet" href="site.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <style>
    .container {
      background-color: #333;
      max-width: 400px; /* Adjusted width */
      margin: auto;
      margin-top: 20px;
      padding: 20px;
      border-radius: 10px;
    }

    body {
      color: white;
      background-color: #222;
    }

    .input-box input[type="text"],
    .input-box input[type="password"] {
      color: black; /* Change text color to black */
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 10px;
      border: none;
      border-radius: 5px;
      box-sizing: border-box;
    }

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
  </style>

</head>

<body>

<div class="container">
    <center><a href="index.php"><img src="img/logo1.png" alt="" style="margin-top: 10px; width: 60%; margin-bottom:20px;"></a></center>
    <div class="content">
      <form id="form" action="" method="post" enctype="multipart/form-data" onsubmit="return validate();">
        <div class="input-box">
          <span class="details">Email ID</span>
          <input type="text" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="input-box">
          <span class="details">Old Password</span>
          <input type="password" id="oldpassword" name="oldpassword" placeholder="Old password you remember">
        </div>
        <div class="input-box">
          <span class="details">New Password</span>
          <input type="password" id="newpassword" name="newpassword" placeholder="Enter your new password">
        </div>
        <div class="input-box">
          <span class="details">Confirm Password</span>
          <input type="password" id="cpassword" name="cpassword" placeholder="Confirm your password">
        </div>
        <div class="button">
          <input type="submit" value="Submit" name="submit">
        </div>
        <?php
        include "forget.php";
      ?>
      </form>

      <!-- Display errors here -->
      <p id="emailerror"></p>
      <p id="oldpassworderror"></p>
      <p id="newpassworderror"></p>
      <p id="cpassworderror"></p>
    </div>
  </div>

  <script type="text/javascript">
    function validate() {
      var error = "";
      var email = document.getElementById("email");
      var oldpassword = document.getElementById("oldpassword");
      var newpassword = document.getElementById("newpassword");
      var cpassword = document.getElementById("cpassword");

      // Reset previous errors
      document.getElementById("emailerror").innerHTML = "";
      document.getElementById("oldpassworderror").innerHTML = "";
      document.getElementById("newpassworderror").innerHTML = "";
      document.getElementById("cpassworderror").innerHTML = "";

      if (email.value == "") {
        error = " <font color='red'>*Email ID required</font> ";
        document.getElementById("emailerror").innerHTML = error;
        return false;
      }
      else if( email.value.indexOf('@')<=0)
    {
     error = " <font color='red'>! ** @ required</font> ";
     document.getElementById( "emailerror" ).innerHTML = error;
    return false;
     }

 else if ((email.value.charAt(email.value.length-4)!='.') && (email.value.charAt(email.value.length-3)!='.'))
 {
  error = " <font color='red'>*Invalid email</font> ";
  document.getElementById( "emailerror" ).innerHTML = error;
  return false;
 }



      if (oldpassword.value == "") {
        error = " <font color='red'>*Old Password required</font> ";
        document.getElementById("oldpassworderror").innerHTML = error;
        return false;
      }

      if (newpassword.value == "") {
        error = " <font color='red'>*New Password required</font> ";
        document.getElementById("newpassworderror").innerHTML = error;
        return false;
      }

      if (cpassword.value == "") {
        error = " <font color='red'>*Confirm Password required</font> ";
        document.getElementById("cpassworderror").innerHTML = error;
        return false;
      }

      // Additional validation logic can be added here

      return true;
    }
  </script>

</body>
</html>
