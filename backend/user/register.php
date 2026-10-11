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
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];


$insertQuery = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";

if (mysqli_query($conn, $insertQuery)) {
    $_SESSION['user'] = $email;
    header("Location: /login.php");
} else {
    header("Location: /register.php?error=1");
}

mysqli_close($conn);
?>
