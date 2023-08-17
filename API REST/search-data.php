<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$conn = mysqli_connect("localhost", "root", "", "info") or die("Connection failed");


$data = json_decode(file_get_contents("php://input"), true);
// $search_trem = $data['search'] = $data['search'];

$search_trem = isset($_GET['search']) ? $_GET['search'] : die();

$sql = "SELECT * FROM student WHERE stu_name LIKE '%{$search_trem}%' OR last_name LIKE '%{$search_trem}%' OR Age LIKE '%{$search_trem}%' OR City LIKE '%{$search_trem}%'";

$result = mysqli_query($conn, $sql) or die("Query failed");

if(mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else {
     echo json_encode(array("message" => "No Record Found", "status" => false));
}


?>