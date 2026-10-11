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

$sql = "SELECT * FROM employees WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $employee_id = $row['id'];
    $_SESSION['user'] = $email;
        echo "<script>
        localStorage.setItem('employee_id', $employee_id);
        window.location.href = '/inventory/medicines.php';
    </script>";

} else {
    header("Location: /inventory/index.php?error=1");
}

mysqli_close($conn);
?>
