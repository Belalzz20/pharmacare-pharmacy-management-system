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
        <h1>Medicines</h1>
        <a href="/inventory/addMedicine.php">Add medicine</a>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="medicines-list">

                    </tbody>
                </table>
            </div>
        </div>
</div>

    <script>

    fetch('/backend/inventory/getMedicines.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
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
                    <td>
                        <a class="button" href="/inventory/editMedicine.php?id=${medicines.id}">Edit</a>
                        <a class="button" href="javascript:void(0);" onclick="deleteMedicines(${medicines.id})">Delete</a>
                    </td>
                `;
                medicinesList.appendChild(tr);
            });

            medicinesCount.innerText = data.length;
        })
        .catch(error => console.error('Error fetching payments:', error));




    function deleteMedicines(medicineId) {
        if (confirm('Are you sure you want to delete this Medicine?')) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/backend/inventory/deleteMedicine.php?medicine_id=' + medicineId, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status === 'success') {
                            alert('Medicine deleted successfully');
                            location.reload();
                        } else {
                            alert('Failed to delete Medicine: ' + response.message);
                        }
                    } catch (e) {
                        console.error("Response text:", xhr.responseText);
                    }
                }
            };
            xhr.send();
        }
    }
    </script>

</body>
</html>
