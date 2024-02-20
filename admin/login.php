<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-3.5.1.min.js"></script>
  <style type="text/css">
    li { color: red; }
  </style>
  <script>
    $(document).ready(function(){
      $("#checkValidation").click(function(){
        var userName = $("#userName").val();
        var userPassword = $("#userPassword").val();
        $.ajax({
          type: "POST",
          url: "validate.php", // PHP script for validation
          data: { userName: userName, userPassword: userPassword },
          success: function(response){
            if (response.trim() === "success") {
              window.location.href = "index.php";
            } else {
              $("#message").html(response);
            }
          }
        });
      });
    });
  </script>
</head>
<body>
  <div class="container col-md-5">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" id="userName">
    </div>
    <div class="mb-3">
      <label class="col-sm-2 col-form-label">Password</label>
      <input type="password" class="form-control" id="userPassword">
    </div>
    <p id="message"></p>
    <div class="mb-3 col-md-4">
      <button class="form-control btn btn-danger" id="checkValidation">Login</button>
    </div>
  </div>
</body>
</html>
