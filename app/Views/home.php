<!DOCTYPE html>
<html>
<head>
    <title>Home - POS System</title>
</head>
<body>

<?= view('navbar') ?>

<h1>Welcome to My POS System!</h1>

<p>
    Hey! Welcome to my Point-of-Sale System.
    I made this for our IT0049 - Web System Technologies
    midterm project.
</p>

<p>
    This is basically where you can manage products,
    customers, staff accounts, and sales all in one place.
    Nothing too complicated, just a simple POS system
    that gets the job done.
</p>

<h2>What Can You Do Here?</h2>

<ul>
    <li>Manage products, prices, and available stocks.</li>
    <li>Add, edit, and remove customer records.</li>
    <li>Manage staff accounts and profile pictures.</li>
    <li>Record sales and automatically update product stocks.</li>
    <li>Check previous transactions through Sales History.</li>
</ul>

<?php if (session()->get('isLoggedIn')): ?>

    <h2>Let's Get Started!</h2>

    <p>
        Already logged in? You can start managing
        everything using the links below.
    </p>

    <p>
        <a href="<?= base_url('/products') ?>">Products</a> |
        <a href="<?= base_url('/customers') ?>">Customers</a> |
        <a href="<?= base_url('/users') ?>">Staff</a> |
        <a href="<?= base_url('/sales/new') ?>">Record Sale</a> |
        <a href="<?= base_url('/sales') ?>">Sales History</a>
    </p>

<?php else: ?>

    <h2>Wanna Try It Out?</h2>

    <p>
        You'll need to
        <a href="<?= base_url('/login') ?>">log in</a>
        first before accessing the management pages.
    </p>

<?php endif; ?>

<p>Made by Aldous Exequiel S. Damaso</p>

</body>
</html>
