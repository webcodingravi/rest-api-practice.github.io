<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');

$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['sid'];

$conn = mysqli_connect("localhost", "root", "", "info") or die("Connection failed");

$sql = "DELETE FROM student WHERE id = {$student_id}";

if(mysqli_query($conn, $sql)) {
    echo json_encode(array("message" => "Successfully Delete Data", "status" => true));
}else{
    echo json_encode(array("message" => "Not Delete Data", "status" => false));
}


?>