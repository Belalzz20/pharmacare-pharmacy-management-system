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
        <h1>Orders</h1>
    </div>
    <div class="content">
            <div class="count">
                <img src="/images/orders.png" alt="">
                <div class="data">
                    <h3>Orders Count</h3>
                    <p id="orders-count">0</p>
                </div>
            </div>
            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Products Id</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="orders-list">

                    </tbody>
                </table>
            </div>
        </div>
</div>

    <script>
    fetch('/backend/admin/getOrders.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const ordersList = document.getElementById('orders-list');
            const ordersCount = document.getElementById('orders-count');
            data.forEach(order => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${order.id}</td>
                    <td>${order.userName}</td>
                    <td>${order.medicinesIds} </td>
                    <td>${order.totalPrice}</td>
                `;
                ordersList.appendChild(tr);
            });

            ordersCount.innerText = data.length;
        })
        .catch(error => console.error('Error fetching payments:', error));

    </script>

</body>
</html>
