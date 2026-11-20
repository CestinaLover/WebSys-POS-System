<!DOCTYPE html>
<html>
<head>
    <title>Add Staff</title>
</head>
<body>

<?= view('navbar') ?>

<h1>Add New Staff</h1>

<?php foreach (session('errors') ?? [] as $error): ?>
    <p><?= esc($error) ?></p>
<?php endforeach; ?>

<form action="<?= base_url('/users/create') ?>" method="post">
    <?= csrf_field() ?>

    <p>
        <label>Username</label><br>
        <input type="text" name="username"
               value="<?= esc(old('username')) ?>" required>
    </p>

    <p>
        <label>Full Name</label><br>
        <input type="text" name="full_name"
               value="<?= esc(old('full_name')) ?>" required>
    </p>

    <p>
        <label>Password</label><br>
        <input type="password" name="password" required minlength="8">
    </p>

    <button type="submit">Add Staff</button>
</form>

</body>
</html>
