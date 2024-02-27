<?php
include('db_connect.php');

$sql = "CREATE DATABASE PHPLearning";

if ($conn->query($sql) === TRUE) {
  echo "<br/>Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}


$conn->close();
?>