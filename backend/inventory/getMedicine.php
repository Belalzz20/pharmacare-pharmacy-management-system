<?php

header('Content-Type: application/json');


if (isset($_GET['medicine_id'])) {
    $medicine_id = $_GET['medicine_id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacy";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]);
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM medicines WHERE id = ?");
    $stmt->bind_param("i", $medicine_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(["status" => "success", "data" => $row]);
    } else {
        echo json_encode(["status" => "error", "message" => "medicine not found"]);
    }


    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "No medicine_id provided"]);
}
?>
