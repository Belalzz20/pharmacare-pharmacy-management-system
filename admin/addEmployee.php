<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/styles.css">
        <title>Pharmacy - admin</title>
    </head>
    <body>
        <nav>
            <h4><img src="/img/logo.png" alt=""></h4>
            <ul>
                <li><a href="/admin/employee.php">Employees</a></li>
            </ul>
            <a class="logout" href="/">Logout</a>
        </nav>
        <div class="page">
            <div class="head">
                <h1>Add Employee</h1>
            </div>
            <div class="content">
                <div class="card">
                    <form action="/backend/admin/addEmployee.php" method="post">
                        <div class="inputBox">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter Employee name" required/>
                        </div>
                        <div class="inputBox">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter Employee email" required/>
                        </div>
                        <div class="inputBox">
                            <label for="phone">Phone</label>
                            <input type="number" id="phone" name="phone" placeholder="Enter Employee phone" required/>
                        </div>
                        <div class="note">
                            <p>Note: Password will be The same password for all employees</p>
                        </div>
                        <?php
                            if (isset($_GET['error']) && $_GET['error'] == '1') {
                                echo '<p style="margin:1rem 0;color:red;">Invalid Data</p>';
                            }
                        ?>
                        <button type="submit" class="saveBtn">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
