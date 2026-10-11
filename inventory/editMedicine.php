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
                    <form action="/backend/inventory/updateMedicine.php" method="post">
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
                        <input type="hidden" id="medicine_id" name="medicine_id">

                        <?php
                            if (isset($_GET['error']) && $_GET['error'] == '1') {
                                echo '<p style="margin:1rem 0;color:red;">Invalid Data</p>';
                            }
                        ?>
                        <button type="submit" class="saveBtn">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            const urlParams = new URLSearchParams(window.location.search);

            const medicineId = urlParams.get('id');    
            document.getElementById('medicine_id').value = medicineId;
                
            async function fetchMedicineData() {
                try {
                    const response = await fetch(`/backend/inventory/getMedicine.php?medicine_id=${medicineId}`);
                    const data = await response.json();
                    if (response.ok) {
                        const { name,image,price,quantity,description} = data.data;
                        document.getElementById('name').value = name;
                        document.getElementById('image').value = image;
                        document.getElementById('price').value = price;
                        document.getElementById('quantity').value = quantity;
                        document.getElementById('description').value = description;
                    } else {
                        console.error('Failed to fetch animal data:', data.message);
                    }
                } catch (error) {
                    console.error('Error fetching animal data:', error);
                }
            }
            fetchMedicineData();
        </script>

    </body>
</html>
