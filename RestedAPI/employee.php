<?php
class Employee
{
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function check(){
        return 'checking';
    }
    
    public function getAllEmployees()
    {
        $query = "SELECT * FROM employee";
        $result = mysqli_query($this->conn, $query);
        $employees = array();
        while ($row = mysqli_fetch_all($result)) {
            $employees = $row;
        }
        return $employees;
    }
    public function getEmployeeById($id)
    {
        $query = "SELECT * FROM employee WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
        $employee = mysqli_fetch_assoc($result);
        return $employee;
    }

    public function addEmployee($data)
    {
        $emp_name = $data['emp_name'];
        $emp_code = $data['emp_code'];
        $emp_email = $data['emp_email'];
        $emp_phone = $data['emp_phone'];
        $emp_address = $data['emp_address'];
        $emp_designation = $data['emp_designation'];
        $emp_joining_date = $data['emp_joining_date'];
        $query = "INSERT INTO employee (emp_name, emp_code, emp_email, emp_phone, emp_address, emp_designation, emp_joining_date) VALUES ('$emp_name', '$emp_code', '$emp_email', '$emp_phone', '$emp_address', '$emp_designation', '$emp_joining_date')";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function updateEmployee($id, $data)
    {
        $emp_name = $data['emp_name'];
        $emp_code = $data['emp_code'];
        $emp_email = $data['emp_email'];
        $emp_phone = $data['emp_phone'];
        $emp_address = $data['emp_address'];
        $emp_designation = $data['emp_designation'];
        $emp_joining_date = $data['emp_joining_date'];
        $query = "UPDATE employee SET emp_name = '$emp_name', emp_code = '$emp_code', emp_email = '$emp_email', emp_phone = '$emp_phone', emp_address = '$emp_address', emp_designation = '$emp_designation', emp_joining_date = '$emp_joining_date' WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteEmployee($id)
    {
        $query = "DELETE FROM employee WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
