<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/styles.css">
        <title>Pharmacy - inventory</title>
    </head>
    <body>
        <nav>
            <h4><img src="/img/logo.png" alt=""></h4>
            <ul>
            <li><a href="/inventory/medicines.php">Medicines</a></li>
            </ul>
            <a class="logout" href="/">Logout</a>
        </nav>
        <div class="page">
            <div class="head">
                <h1>Add Medicine</h1>
            </div>
            <div class="content">
                <div class="card">
                    <form action="/backend/inventory/addMedicine.php" method="post">
                        <div class="inputBox">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter Medicine name" required/>
                        </div>
                        <div class="inputBox">
                            <label for="image">Image</label>
                            <input type="text" id="image" name="image" placeholder="Enter Medicine Image Url" required/>
                        </div>
                        <div class="inputBox">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" placeholder="Enter Medicine price" required/>
                        </div>
                        <div class="inputBox">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" placeholder="Enter Medicine quantity" required/>
                        </div>
                        <div class="inputBox">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" placeholder="Enter Medicine description" required></textarea>
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
