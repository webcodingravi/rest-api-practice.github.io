<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

$data = json_decode(file_get_contents("php://input"), true);

$fname = $data['fname'];
$lname = $data['last_name'];
$age = $data['age'];
$city = $data['city'];

$conn = mysqli_connect("localhost", "root", "", "info") or die("Connection failed");

$sql = "INSERT INTO student(stu_name, last_name, Age, City) VALUES('{$fname}', '{$lname}', {$age}, '{$city}')";

if(mysqli_query($conn, $sql)) {
    echo json_encode(array("message" => "Successfully Inserted Data", "status" => true));
}else{
    echo json_encode(array("message" => "Not Inserted Data", "status" => false));
}


?>