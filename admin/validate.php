<?php
session_start();
if(isset($_POST['userName']) && isset($_POST['userPassword'])){
  $validUser = "Sanjana"; // replace with your valid username
  $validPassword = "admin"; // replace with your valid password

  $userName = $_POST['userName'];
  $userPassword = $_POST['userPassword'];

  if($userName == $validUser && $userPassword == $validPassword){
    $_SESSION['admin'] = $userName;
    echo "success";
  } else {
    echo "Invalid username or password.";
  }
}
?>