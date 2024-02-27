<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Learning</title>
</head>
<body>

    <?php

include('../db_connect.php');

?>


<form action="../table_insert.php" method="POST"><br/><br/>
<!-- (firstname, lastname, email) -->
First Name :<input type="text" name="firstname" require/><br/><br/>
Last Name: <input type="text" name="lastname" require/><br/><br/>
Email: <input type="email" name="email" require/><br/><br/>
<button type="submit"> Submit</button>
</form>
    

<?php
 
// include('../db_connect.php');

// $stmt = mysqli_prepare($conn, "SELECT * FROM MyGuests ");
    
// if (!$stmt) {
//     die("Error: " . mysqli_error($conn)); 
// }

// mysqli_stmt_execute($stmt);

// $result = mysqli_stmt_get_result($stmt);

// if (!$result) {
//     die("Error: " . mysqli_error($conn)); 
// }

// while ($row = mysqli_fetch_assoc($result)) {
//     print_r($row);
//     echo $row[''];
// }

// echo "connect..";

// mysqli_close($conn);
?>
    
</body>
</html>