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

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $email;
    $user_json = json_encode($user);
    echo "<script>
        localStorage.setItem('user', '$user_json');
        window.location.href = '/index.html';
    </script>";
} else {
    header("Location: /login.php?error=1");
}

mysqli_close($conn);
?>
