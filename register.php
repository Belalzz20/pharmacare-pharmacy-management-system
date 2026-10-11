<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Pharmacy - user Register</title>
</head>
<body>
    <div class="login userRegister">
        <div class="content">
            <h1>Register to Pharmacy</h1>
            <form action="/backend/user/register.php" method="POST">
                <div class="inputBox">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required>
                </div>
                <div class="inputBox">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="inputBox">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" id="phone" placeholder="Enter your phone" required>
                </div>
                <div class="inputBox">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <button type="submit">Register</button>
                <div class="registerLink">
                    <p>Already have an account? <a href="login.php">Login</a></p>
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
