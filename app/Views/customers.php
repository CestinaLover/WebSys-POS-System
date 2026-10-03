<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
</head>
<body>

<h1>Customer Accounts</h1>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('/users') ?>">User Accounts</a>
</nav>

<p>
    <a href="<?= base_url('/customers/new') ?>">Add New Customer</a>
</p>

<h2>Customer List</h2>

<table border="1">
    <th>Action</th>
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>

<?php foreach ($customers as $customer): ?>
    <tr>
        <td><?= esc($customer['full_name']) ?></td>
        <td><?= esc($customer['email']) ?></td>
        <td><?= esc($customer['phone']) ?></td>
        <td>
            <a href="<?= base_url('/customers/edit/' . $customer['id']) ?>">Edit</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>

</body>
</html>