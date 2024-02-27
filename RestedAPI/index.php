<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="showUser('')">

<?php
// Include the common cURL file 
require_once 'curl_helper.php';
$restAPIBaseURL = 'http://localhost/phpDB/RestedAPI';
try {
    // Get all employees 
    $employees = sendRequest($restAPIBaseURL . '/api.php/employees', 'GET');
    $employees = json_decode($employees, true);
    // Process the response 
    // Get employee by ID 
    $employeeId = 1;
    $employee = sendRequest($restAPIBaseURL . "/api.php/employees/$employeeId", 'GET');
    $employee = json_decode($employee, true);
    // Process the response 
    // Add new employee 
    $data = ['emp_name' => 'John Doe', 'emp_code' => 'E001', 'emp_email' => 'john.doe@example.com', 'emp_phone' => '1234567890', 'emp_address' => '123 Street, City', 'emp_designation' => 'Manager', 'emp_joining_date' => '2022-01-01',];
    $result = sendRequest($restAPIBaseURL . '/api.php/employees', 'POST', $data);
    $result = json_decode($result, true);


    // Process the response 
    // Update employee by ID 
    $employeeId = 1;
    $data = ['emp_name' => 'Updated Name', 'emp_code' => 'E002', 'emp_email' => 'updated.email@example.com', 'emp_phone' => '9876543210', 'emp_address' => '456 Street, City', 'emp_designation' => 'Supervisor', 'emp_joining_date' => '2022-02-01',];
    $result = sendRequest($restAPIBaseURL . "/api.php/employees/$employeeId", 'PUT', $data);
    $result = json_decode($result, true); // Process the response // Delete employee by ID 
    $employeeId = 1;
    $result = sendRequest($restAPIBaseURL . "/api.php/employees/$employeeId", 'DELETE');
    $result = json_decode($result, true);
    // Process the response 
    // Handle any additional logic or data processing 
} catch (Exception $e) {
    echo ($e);
    // Handle any exceptions that occur during the API calls 
}

?>

<script>
function showUser(str) {
  if (str == "") {
    // document.getElementById("txtHint").innerHTML = "";

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("one").innerHTML = this.responseText;
      }
    };
    // Make sure the URL is enclosed in quotes
    xmlhttp.open("GET", "<?php echo $restAPIBaseURL.'/api.php/employees'; ?>", true);
    xmlhttp.send();
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("one").innerHTML = json_decode(this.responseText);
      }
    };
    // Make sure the URL is enclosed in quotes
    xmlhttp.open("GET", "<?php echo $restAPIBaseURL.'/api.php/employees'; ?>", true);
    xmlhttp.send();
    
  }
}
</script>



<p id='one'></p>

<?php echo $restAPIBaseURL.'/api.php/employees'; ?>
<form action="<?php echo $restAPIBaseURL.'/api.php/employees'; ?>" method="POST">
Name<input type="text" name="emp_name"></br>
EMAIL<input type="text" name="emp_email"></br>
Mobile <input type="text" name="emp_phone"></br>
Address <input type="text" name="emp_address"></br>
Destin <input type="text" name="emp_designation"></br>
D.O.J<input type="date" name="emp_joining_date"></br>
Emp Code <input type="text" name="emp_code">
<input type="submit" >
</form>

<?php 
function fetchDataAsync($url, $callback) {
    $data = file_get_contents($url);
    $callback($data);
}

$value=fetchDataAsync($restAPIBaseURL.'/api.php/employees/1', function ($new){ 
    var_dump($new);
foreach(json_decode($new) as $key=>$value){
    // echo $value[$key];
    var_dump($value);
    var_dump($key);
}
    
});

// var_dump($value);

function dataloop($a){
    // var_dump($a);
   
    // foreach ($c as $key => $value) {
    //    var_dump($value);
        // $arr[3] will be updated with each value from $arr...
        // echo "{$key} => {$value} ";
        // echo $value;
        // print_r($a);
        // var_dump($a);
//         return;
//     }
}



?>


<?php
$content = file_get_contents($restAPIBaseURL.'/api.php/employees');
$headers = apache_request_headers();
$newValue=json_decode($content);
?>

</body>
</html>
