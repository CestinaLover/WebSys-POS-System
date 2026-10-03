<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('/users') ?>">User Accounts</a>
</nav>

<?php if (session()->has('errors')): ?>
    <?php foreach (session('errors') as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form action="<?= base_url('/users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">

    <?= csrf_field() ?>

    <p>
        <label>Username</label><br>
        <input
            type="text"
            name="username"
            value="<?= old('username', $user['username']) ?>"
        >
    </p>

    <p>
        <label>Full Name</label><br>
        <input
            type="text"
            name="full_name"
            value="<?= old('full_name', $user['full_name']) ?>"
        >
    </p>

    <p>
        <label>Profile Picture</label><br>
        <input type="file" name="avatar" accept=".jpg,.jpeg,.png">
    </p>

    <?php if (! empty($user['avatar'])): ?>
        <p>
            <img
                src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                width="150"
                height="150"
                alt="Avatar"
            >
        </p>
    <?php endif; ?>

    <button type="submit">Update User</button>

</form>

</body>
</html>