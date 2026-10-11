<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$image = $_POST['image'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];


$insertQuery = "INSERT INTO medicines (name, image, description,price,quantity) VALUES ('$name', '$image', '$description', '$price','$quantity')";

if (mysqli_query($conn, $insertQuery)) {
    header("Location: /inventory/medicines.php");
} else {
    header("Location: /inventory/addMedicine.php?error=1");
}

mysqli_close($conn);
?>
