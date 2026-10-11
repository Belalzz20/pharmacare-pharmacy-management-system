<?php

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $required_fields = ['medicine_id', 'name', 'image', 'description', 'price', 'quantity'];

    if (array_diff($required_fields, array_keys($_POST)) === []) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pharmacy";

        $conn = new mysqli($servername, $username, $password, $dbname);

        
        $medicine_id = $_POST['medicine_id'];
        $name = $_POST['name'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];


        if ($conn->connect_error) {
            die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
        }

        $stmt = $conn->prepare("UPDATE medicines SET name = ?, image = ?, description = ?, price = ?, quantity = ? WHERE id = ?");
        $stmt->bind_param("sssiii", $name, $image, $description, $price, $quantity, $medicine_id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                header("Location: /inventory/medicines.php");
            } else {
                echo json_encode(["status" => "error", "message" => "No rows were updated. Make sure the provided medicine_id exists in the database."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to execute update query: " . $conn->error]);
        }

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Incomplete form data"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
