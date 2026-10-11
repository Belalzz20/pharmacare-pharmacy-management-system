<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Pharmacy - user login</title>
</head>
<body>
    <div class="login userLogin">
        <div class="content">
            <h1>Welcome to Pharmacy</h1>
            <form action="/backend/user/login.php" method="POST">
                <div class="inputBox">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="inputBox">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <button type="submit">Login</button>
                <div class="registerLink">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
                <?php
                if (isset($_GET['error']) && $_GET['error'] == '1') {
                    echo '<p style="color:red;">Wrong email or password</p>';
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
