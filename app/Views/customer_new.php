<!DOCTYPE html>
<html>
<head>
    <title>New Customer</title>
</head>
<body>

<h1>Add New Customer</h1>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('/users') ?>">User Accounts</a> |
    <a href="<?= base_url('/about') ?>">About</a>
</nav>

<?php if (session()->has('errors')): ?>
    <?php foreach (session('errors') as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form action="<?= base_url('/customers/create') ?>" method="post">

    <?= csrf_field() ?>

    <p>
        <label>Full Name</label><br>
        <input
            type="text"
            name="full_name"
            value="<?= old('full_name') ?>"
        >
    </p>

    <p>
        <label>Email</label><br>
        <input
            type="email"
            name="email"
            value="<?= old('email') ?>"
        >
    </p>

    <p>
        <label>Phone</label><br>
        <input
            type="text"
            name="phone"
            value="<?= old('phone') ?>"
        >
    </p>

    <button type="submit">Add Customer</button>

</form>

</body>
</html>