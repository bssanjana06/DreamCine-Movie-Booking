<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "moviebook";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
    // echo "Not connected";
   die('Could not Connect My Sql:' .mysqli_error());
}
// echo "Connected";

?>