# PharmaCare — Online Pharmacy Management System

PharmaCare is a web-based pharmacy management project built with PHP, MySQL, HTML, and CSS. It provides a simple interface for browsing medicines and managing pharmacy operations.

The project brings together customer-facing pages and administrative features for handling medicines, inventory, and orders.

## Features

- **Medicine Catalog:** Browse and view available medicines.
- **Shopping Cart:** Add medicines to a cart before proceeding with an order.
- **User Authentication:** Login and registration pages.
- **Admin Dashboard:** Manage pharmacy-related operations.
- **Inventory Management:** Organize medicines and manage stock information.
- **Order Management:** Handle customer orders.
- **Database Integration:** Store and retrieve application data using MySQL.

## Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- Apache (for local development)

## Project Structure

```text
pharmacare-pharmacy-management-system/
├── admin/
├── backend/
├── css/
├── images/
├── inventory/
├── cart.html
├── index.html
├── login.php
├── medicines.html
├── register.php
├── success.html
├── pharmacy.sql
├── README.md
└── .gitignore
```

## Getting Started

### Prerequisites

Before running the project, make sure you have installed:

- XAMPP or another local PHP development environment
- PHP
- MySQL or MariaDB
- A web browser

### Installation

**1. Clone the repository**

```bash
git clone https://github.com/Belalzz20/pharmacare-pharmacy-management-system.git
```

**2. Move the project into your web server directory**

For XAMPP, place the project folder inside:

```text
C:\xampp\htdocs\
```

**3. Start the required services**

Open the XAMPP Control Panel and start Apache and MySQL.

**4. Create the database**

Open phpMyAdmin at:

```text
http://localhost/phpmyadmin
```

Create the database using the name expected by the application's database connection settings, then import the project's `pharmacy.sql` file.

**5. Configure the database connection**

Locate the PHP file responsible for connecting to MySQL. Update the database host, database name, username, and password to match your local environment.

**6. Run the application**

Open the project in your browser:

```text
http://localhost/pharmacare-pharmacy-management-system/
```

If the application uses a different entry page or directory structure, open the appropriate page based on the project configuration.

## Database

The project uses MySQL to store application data, including information related to medicines, users, inventory, and orders.

The `pharmacy.sql` file provides the database structure and any included sample data.

## Security Note

This project is intended for learning and development. Before using it in a production environment, review authentication, password storage, SQL queries, input validation, and access controls. Do not publish real user data, passwords, or database credentials.

## Future Improvements

- Improve the user interface and responsive design.
- Add stronger input validation and security protections.
- Improve medicine search and filtering.
- Enhance inventory and order tracking.
- Add automated tests and clearer deployment instructions.

## Author

**Belal Hesham**

GitHub: [@Belalzz20](https://github.com/Belalzz20)

---

This project was developed as a practical web development project using PHP and MySQL.
