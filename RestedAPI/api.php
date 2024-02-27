<?php
require_once 'db.php';

require_once 'employee.php';
// Create an instance of the Employee class 
$employeeObj = new Employee($conn);
// Get the request method 
$method = $_SERVER['REQUEST_METHOD'];
// Get the requested endpoint 
$endpoint = $_SERVER['PATH_INFO'];
// var_dump($_SERVER['PATH_INFO']);
// Set the response content type 
header('Content-Type: application/json'); // Process the request 
// var_dump($method);
switch ($method) {
    case 'GET':
        if ($endpoint === '/employees') {
            // Get all employees 
            $employees = $employeeObj->getAllEmployees();
            echo json_encode($employees);
        } elseif (preg_match('/^\/employees\/(\d+)$/', $endpoint, $matches)) {
            $employeeId = $matches[1];
            $employee = $employeeObj->getEmployeeById($employeeId);
            echo json_encode($employee);
        }
        break;

        case 'POST':
            if ($endpoint === '/employees') {
                
           
            if($_REQUEST == array()){

                // Json File post 

                $data = json_decode(file_get_contents('php://input'), true);

                if ($data === null) {

                    http_response_code(400); // Bad request
                    echo json_encode(['error' => 'Invalid JSON data']);
                    exit();
                }
                
                $result = $employeeObj->addEmployee($data);
                echo "Successfully Created";
                exit();

            }
            elseif($_REQUEST == empty([])){


                $data=$_POST;

                if ($data === null) {
                    // JSON data is invalid
                    http_response_code(400);
                echo "Successfully Created";
                    exit();
                }

                $result = $employeeObj->addEmployee($data);
                
                // echo json_encode(['success' => $result]);
                echo "Created Successfully";
                echo "<a href='../index.php'> Back</a>";
            }else{

                echo "Invalid Data";
            }
                
            }
            break;
    case 'PUT':
        if (preg_match('/^\/employees\/(\d+)$/', $endpoint, $matches)) {
            // Update employee by ID 
            $employeeId = $matches[1];
            $data = json_decode(file_get_contents('php://input'), true);
            $result = $employeeObj->updateEmployee($employeeId, $data);
            echo json_encode(['success' => $result]);
        }
        break;
    case 'DELETE':
        if (preg_match('/^\/employees\/(\d+)$/', $endpoint, $matches)) {
            // Delete employee by ID 
            $employeeId = $matches[1];
            $result = $employeeObj->deleteEmployee($employeeId);
            echo json_encode(['success' => $result]);
        }
        break;
}
