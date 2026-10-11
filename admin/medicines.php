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
        <li><a href="/admin/medicines.php">Medicines</a></li>
        <li><a href="/admin/orders.php">Orders</a></li>
    </ul>
    <a class="logout" href="/">Logout</a>
</nav>
<div class="page">
    <div class="head">
        <h1>Medicines</h1>
    </div>
    <div class="content">
            <div class="count">
                <img src="/images/medicines.png" alt="">
                <div class="data">
                    <h3>Medicines Count</h3>
                    <p id="medicines-count">0</p>
                </div>
            </div>
            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody id="medicines-list">

                    </tbody>
                </table>
            </div>
        </div>
</div>

    <script>
    fetch('/backend/admin/getMedicines.php')
        .then(response => response.json())
        .then(data => {

            const medicinesList = document.getElementById('medicines-list');
            const medicinesCount = document.getElementById('medicines-count');
            data.forEach(medicines => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${medicines.id}</td>
                    <td><img src="${medicines.image}"/></td>
                    <td>${medicines.name}</td>
                    <td>${medicines.price}</td>
                    <td>${medicines.quantity}</td>
                `;
                medicinesList.appendChild(tr);
            });

            medicinesCount.innerText = data.length;
        })
        .catch(error => console.error('Error fetching payments:', error));

    </script>

</body>
</html>
