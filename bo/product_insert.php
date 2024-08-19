<?php
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Origin: http://localhost:4200");
header('Access-Control-Allow-Methods: POST');
header("Content-Type: application/json; charset=UTF-8");

$mysqli = new mysqli("localhost", "root", "", "warehouse");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Assuming the incoming JSON format is like {"c1": "value1", "c2": "value2", ...}
$input = json_decode(file_get_contents('php://input'));
$v1 = $input->c1;
$v2 = $input->c2;
$v3 = $input->c3;
$v4 = $input->c4;
$v5 = $input->c5;
$v6 = $input->c6;

$sql = "INSERT INTO `products`
        (`code`, `name`, `picture`, `category`, `price`, `cost`) 
        VALUES (?,?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssssdd", $v1, $v2, $v3, $v4, $v5, $v6);

if ($stmt->execute()) {
    echo json_encode(array("status" => "success", "affected_rows" => $stmt->affected_rows));
} else {
    echo json_encode(array("status" => "error", "error_message" => $stmt->error));
}

$stmt->close();
$mysqli->close();
?>





