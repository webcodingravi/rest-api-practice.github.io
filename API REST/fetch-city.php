<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$conn = mysqli_connect("localhost", "root", "", "info") or die("Connection failed");

$sql = "SELECT DISTINCT(City) FROM student";

$result = mysqli_query($conn, $sql) or die("Query failed");

if(mysqli_num_rows($result) > 0) {
   $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
   echo json_encode($output);
}else{
    echo json_encode(array("message" => "No Record Found.", "status" => false));
}


?>