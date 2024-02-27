<?php

include ('db_connect.php');


echo $_SERVER["REQUEST_METHOD"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $stmt = mysqli_prepare($conn, "INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $email);

  $firstname =  $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];

  mysqli_stmt_execute($stmt);

  var_dump($_POST);
}

// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
  
//   $conn->close();

// -------------

// if (mysqli_query($conn, $sql)) {
//   var_dump($sql);
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//   }
  
//   mysqli_close($conn);


// printf("Affected rows (SELECT): %d\n", mysqli_affected_rows($conn));
// echo array_intersect_uassoc($conn);

// if ($conn->query($sql) === TRUE) {
//     $last_id = $conn->insert_id;
//     var_dump($conn);
//     echo "New record created successfully. Last inserted ID is: " . $last_id;
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
  
//   $conn->close();

?>