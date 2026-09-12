<a name="readme-top"></a>

<br/>

<div align="center">
  <h1 align="center">WebSys POS System</h1>
</div>

<div align="center">
  A basic Point-of-Sale web application built using CodeIgniter 4 and MVC architecture.
</div>

<br/>

---

## Overview

This project is a basic Point-of-Sale (POS) system developed for the IT0049 - Web System Technologies course.

The project demonstrates the basic principles of CodeIgniter 4, routing, controllers, views, and the Model-View-Controller (MVC) architecture.

This version of the system does not use a database. Customer and user records are stored in static PHP arrays as temporary data sources.

## Description

The application contains four main pages:

<b>Home:</b> The landing page of the POS system.

<b>About:</b> Provides information about the application and the technologies used.

<b>Customer Accounts:</b> Displays customer records including their full name, email, and phone number.

<b>User Accounts:</b> Displays user and staff records including their username, full name, and role.

The Customer Accounts and User Accounts pages use PHP `foreach` loops to display records from static arrays passed from their respective controllers.

## Website Instructions

The website can be accessed through the following routes:

* `/` - Home page
* `/about` - About page
* `/customers` - Customer Accounts
* `/users` - User Accounts

Navigation links are provided on the pages to allow users to move between the four sections of the application.

## MVC Flow

The application follows the basic CodeIgniter MVC flow:

```text
User visits a URL
        ↓
Route
        ↓
Controller
        ↓
Static PHP Array
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
$customers array
    ↓
Customers.php view
    ↓
foreach loop
    ↓
Customer table
```

## File Structure

```text
WebSys-POS-System
├─ app
│  ├─ Config
│  │  └─ Routes.php
│  ├─ Controllers
│  │  ├─ BaseController.php
│  │  ├─ Home.php
│  │  ├─ Pages.php
│  │  ├─ Customers.php
│  │  └─ Users.php
│  └─ Views
│     ├─ Home.php
│     ├─ About.php
│     ├─ Customers.php
│     ├─ Users.php
│     └─ errors
├─ public
├─ tests
├─ writable
├─ composer.json
├─ composer.lock
├─ spark
└─ README.md
```

## Technology

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge\&logo=php\&logoColor=white)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4-EE4623?style=for-the-badge\&logo=codeigniter\&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge\&logo=composer\&logoColor=white)
![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge\&logo=html5\&logoColor=white)

The project uses:

* PHP 8.2
* CodeIgniter 4
* Composer
* HTML
* MVC architecture
* Static PHP arrays

## Installation and Setup

Clone the repository:

```bash
git clone https://github.com/CestinaLover/WebSys-POS-System.git
```

Navigate to the project directory:

```bash
cd WebSys-POS-System
```

Install the project dependencies:

```bash
composer install
```

Create a `.env` file from the provided `env` file and configure the application base URL:

```env
app.baseURL = 'http://localhost:8080/'
```

Start the CodeIgniter development server:

```bash
php spark serve
```

Open the application in a browser:

```text
http://localhost:8080/
```

## Resources

| Resource                               | Purpose                         | Link                                                               |
| -------------------------------------- | ------------------------------- | ------------------------------------------------------------------ |
| CodeIgniter 4 User Guide - Routing     | Routing documentation           | https://codeigniter4.github.io/userguide/incoming/routing.html     |
| CodeIgniter 4 User Guide - Controllers | Controller documentation        | https://codeigniter4.github.io/userguide/incoming/controllers.html |
| CodeIgniter 4 User Guide               | General framework documentation | https://codeigniter.com/user_guide/                                |

## Project Repository

GitHub Repository:

https://github.com/CestinaLover/WebSys-POS-System

## Database

This version of the project does not use a database.

Customer Accounts and User Accounts use static PHP arrays as temporary data sources, as required by the laboratory activity. A database will be introduced in a later module.

## Author

CestinaLover
