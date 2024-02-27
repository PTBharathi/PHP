<?php

// $con = mysqli_connect("localhost","root","","hotel") or die(mysql_error());

// if($con){
//     echo "Connected Successfully";
// }else{
//     echo "Connection was Failed";
// }

$servername   = "localhost";
$database = "PHPLearning";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully";


  // var_dump($_POST)
?>