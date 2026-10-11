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
        <li><a href="/admin/medicines.php">medicines</a></li>
        <li><a href="/admin/orders.php">orders</a></li>
    </ul>
    <a class="logout" href="/">Logout</a>
</nav>
<div class="page">
    <div class="head">
        <h1>Employees</h1>
        <a href="/admin/addEmployee.php">Add Employee</a>
    </div>
    <div class="content">
            <div class="count">
                <img src="/images/team.png" alt="">
                <div class="data">
                    <h3>Employees Count</h3>
                    <p id="employees-count">0</p>
                </div>
            </div>
            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody id="employees-list">

                    </tbody>
                </table>
            </div>
        </div>
</div>

    <script>

    fetch('/backend/admin/getEmployees.php')
        .then(response => response.json())
        .then(data => {
            const employeesList = document.getElementById('employees-list');
            const employeesCount = document.getElementById('employees-count');
            data.forEach(employee => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${employee.id}</td>
                    <td>${employee.name}</td>
                    <td>${employee.email}</td>
                    <td>${employee.phone}</td>
                `;
                employeesList.appendChild(tr);
            });

            employeesCount.innerText = data.length;
        })
        .catch(error => console.error('Error fetching payments:', error));
    </script>

</body>
</html>
