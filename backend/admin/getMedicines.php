<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM medicines";
$result = $conn->query($sql);

$medicines = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $medicines[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($medicines);
?>
