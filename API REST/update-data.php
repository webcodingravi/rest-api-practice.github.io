<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');

$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['edit_id'];
$fname = $data['ename'];
$lname = $data['elast_name'];
$age = $data['eage'];
$city = $data['ecity'];

$conn = mysqli_connect("localhost", "root", "", "info") or die("Connection failed");

$sql = "UPDATE student SET stu_name = '{$fname}', last_name = '{$lname}', Age = {$age}, City = '{$city}' WHERE id = '{$student_id}'";

if(mysqli_query($conn, $sql)) {
    echo json_encode(array("message" => "Successfully Update Data", "status" => true));
}else{
    echo json_encode(array("message" => "Not Update Data", "status" => false));
}


?>