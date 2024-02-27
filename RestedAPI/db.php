<?php
// Database configuration 
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'employee_management'; 
// Establish database connection 
$conn = mysqli_connect($hostname, $username, $password, $database); 
// Check connection
 if (!$conn) { die('Connection failed: ' . mysqli_connect_error()); } 
