<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

if (isset($_GET['medicine_id'])) { 
    $medicineId = $_GET['medicine_id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacy";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
    }

    $conn->begin_transaction();

    $stmt1 = $conn->prepare("DELETE FROM medicines WHERE id = ?");

    $stmt1->bind_param("i", $medicineId);

    if ($stmt1->execute()) {
        $conn->commit();
        echo json_encode(["status" => "success", "message" => "Medicine deleted successfully"]);
    } else {
        $conn->rollback();
        echo json_encode(["status" => "error", "message" => "Failed to delete medicine"]);
    }
    $stmt1->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "No medicineId provided"]);
}
?>
