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

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['user'] = $email;
    header("Location: /admin/employee.php");
} else {
    header("Location: /admin/index.php?error=1");
}

mysqli_close($conn);
?>
