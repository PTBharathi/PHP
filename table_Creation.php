<?php
include('db_connect.php');

$sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    // if ($conn->query($sql) === TRUE) {
    //   echo "Table MyGuests created successfully";
    // } else {
    //   echo "Error creating table: " . $conn->error;
    // }
    
    // $conn->close();


    if (mysqli_query($conn, $sql)) {
      echo "Table MyGuests created successfully";

$name = $_REQUEST['firstname'];
echo $name;
    } else {
      echo "Error creating table: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>