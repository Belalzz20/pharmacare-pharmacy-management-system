<?php
// placeOrder.php

header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

$userId = $data['userId'];
$userName = $data['userName'];
$medicines = $data['medicines'];
$totalPrice = $data['totalPrice'];

$medicinesIds = array_map(function($medicine) {
    return $medicine['id'];
}, $medicines);

$medicinesIdsString = implode(',', $medicinesIds);

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "pharmacy"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

$sql = "INSERT INTO orders (userName, userId, medicinesIds, totalPrice) VALUES ('$userName', '$userId', '$medicinesIdsString', '$totalPrice')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Order placed successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
}

$conn->close();
?>
