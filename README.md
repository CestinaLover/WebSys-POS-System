# WebSys POS System

A Point-of-Sale (POS) web application built using CodeIgniter 4, PHP, and MySQL.

---

## Overview

This project is a Point-of-Sale (POS) system developed for IT0049 - Web System Technologies.

The system uses CodeIgniter 4 and MVC architecture to manage products, customers, staff accounts, and sales transactions.

It also uses a MySQL database to store records, track product stocks, and save sales history.

## Description

The application includes the following pages:

- **Home:** The main page of the POS system.
- **About:** Information about the project and its developer.
- **Customer Accounts:** Add, view, edit, and delete customer records.
- **User Accounts:** Manage staff accounts, passwords, and profile pictures.
- **Products:** Add, view, edit, and delete products, including their images, prices, and stock quantities.
- **Record Sale:** Select a product, customer, and quantity to record a transaction.
- **Sales History:** View previous sales, including the product, customer, staff member, quantity, total price, and date.
- **Login:** Allows staff members to log in before accessing management pages.

## Features

- Customer, staff, and product management
- Create, read, update, and delete (CRUD) operations
- Login and logout using sessions
- Password hashing for staff accounts
- Product image and staff avatar uploads
- Form validation
- Sales recording
- Automatic stock deduction
- Prevention of sales exceeding available stock
- Sales transaction history

## Website Instructions

The website can be accessed through the following routes:

| Route | Page |
|---|---|
| `/` | Home |
| `/about` | About |
| `/login` | Login |
| `/logout` | Logout |
| `/customers` | Customer Accounts |
| `/customers/new` | Add Customer |
| `/customers/edit/{id}` | Edit Customer |
| `/users` | User Accounts |
| `/users/new` | Add Staff |
| `/users/edit/{id}` | Edit Staff |
| `/products` | Product Management |
| `/products/new` | Add Product |
| `/products/edit/{id}` | Edit Product |
| `/sales/new` | Record Sale |
| `/sales` | Sales History |

Staff members must log in before accessing the management pages.

## Sales and Inventory

The system allows logged-in staff to record product sales.

When a sale is recorded, the system calculates the total price, saves the transaction in the database, and automatically deducts the sold quantity from the product's available stock.

If the requested quantity exceeds the available stock, the system rejects the transaction.

For example:

```text
Product: Keyboard
Price: PHP 750.00
Available Stock: 20
Quantity Sold: 2

Total Price: PHP 1,500.00
Remaining Stock: 18
```

The transaction is then displayed on the Sales History page.

## MVC Flow

The application follows CodeIgniter's Model-View-Controller (MVC) architecture.

```text
User visits a URL
        ↓
Route
        ↓
Controller
        ↓
Model
        ↓
MySQL Database
        ↓
View
        ↓
HTML displayed in browser
```

For example:

```text
/customers
    ↓
Customers::index()
    ↓
CustomerModel
    ↓
MySQL customers table
    ↓
customers.php
    ↓
Customer Accounts page
```

## File Structure

```text
WebSys-POS-System/
├── app/
│   ├── Config/
│   │   ├── App.php
│   │   ├── Database.php
│   │   ├── Filters.php
│   │   └── Routes.php
│   ├── Controllers/
│   │   ├── Auth.php
│   │   ├── Customers.php
│   │   ├── Pages.php
│   │   ├── Products.php
│   │   ├── Sales.php
│   │   └── Users.php
│   ├── Filters/
│   │   └── AuthFilter.php
│   ├── Models/
│   │   ├── CustomerModel.php
│   │   ├── ProductModel.php
│   │   ├── SaleModel.php
│   │   └── UserModel.php
│   └── Views/
│       ├── home.php
│       ├── about.php
│       ├── navbar.php
│       ├── login.php
│       ├── customers.php
│       ├── customer_new.php
│       ├── customer_edit.php
│       ├── users.php
│       ├── user_new.php
│       ├── user_edit.php
│       ├── products.php
│       ├── product_new.php
│       ├── product_edit.php
│       ├── sale_new.php
│       └── sales.php
├── database/
│   └── Midterm_POS.sql
├── public/
├── writable/
├── composer.json
├── composer.lock
├── spark
└── README.md
```

## Technologies Used

- PHP 8.2
- CodeIgniter 4
- MySQL
- Composer
- HTML
- MVC architecture
- Session authentication

## Database

The system uses a MySQL database containing four main tables:

| Table | Purpose |
|---|---|
| `products` | Stores product information, prices, images, and stock quantities |
| `customers` | Stores customer information |
| `users` | Stores staff accounts, hashed passwords, and avatars |
| `sales` | Stores sales transactions and references products, customers, and staff |

The database export is included in the repository as `Midterm_POS.sql`.

## Installation and Setup

Clone the repository:

```bash
git clone https://github.com/CestinaLover/WebSys-POS-System.git
```

Open the project folder:

```bash
cd WebSys-POS-System
```

Install dependencies:

```bash
composer install
```

Create a `.env` file from the provided `env` template.

Configure the application and database:

```env
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = your_database_name
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

Import `Midterm_POS.sql` into your MySQL database using phpMyAdmin.

Start the development server:

```bash
php spark serve
```

Open:

```text
http://localhost:8080/
```

Use an existing staff account from the imported database to log in.

## Resources

- [CodeIgniter 4 User Guide](https://codeigniter4.github.io/userguide/)
- [CodeIgniter Models](https://codeigniter4.github.io/userguide/models/model.html)
- [CodeIgniter Validation](https://codeigniter4.github.io/userguide/libraries/validation.html)
- [CodeIgniter Filters](https://codeigniter4.github.io/userguide/incoming/filters.html)

## Project Links

**GitHub Repository:**

https://github.com/CestinaLover/WebSys-POS-System

**Hosted Website:**

https://websys-pos-system1.infinityfree.me/

## Author

Aldous Exequiel S. Damaso

IT0049 - Web System Technologies
