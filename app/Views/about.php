<!DOCTYPE html>
<html>
<head>
    <title>About - POS System</title>
</head>
<body>

<h1>About</h1>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('/users') ?>">User Accounts</a> |
    <a href="<?= base_url('/products') ?>">Products</a> |

    <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= base_url('/logout') ?>">Logout</a>
    <?php else: ?>
        <a href="<?= base_url('/login') ?>">Login</a>
    <?php endif; ?>
</nav>

<h2>About This Project</h2>

<p>
    Hey! Welcome to my POS System. I made this project
    for my Web System Technologies subject using
    CodeIgniter 4, PHP, and MySQL.
</p>

<p>
    The system lets you manage products, customers,
    and staff accounts. You can add, edit, and delete
    records, upload images, and keep track of product stocks.
</p>

<p>
    I'm also working on adding sales transactions and
    sales history to make the system more complete.
</p>

<p>Made by Aldous Exequiel S. Damaso.</p>

</body>
</html>
