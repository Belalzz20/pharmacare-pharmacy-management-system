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
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = "12345678";


$insertQuery = "INSERT INTO employees (name, email, phone,password) VALUES ('$name', '$email', '$phone', '$password')";

if (mysqli_query($conn, $insertQuery)) {
    header("Location: /admin/employee.php");
} else {
    header("Location: /admin/addEmployee.php?error=1");
}

mysqli_close($conn);
?>
