<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

<h1>Profile</h1>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/tasks') ?>">Task List</a> |
    <a href="<?= base_url('/profile') ?>">Profile</a> |
    <a href="<?= base_url('/about') ?>">About</a>
</nav>

<h2><?= esc($user['full_name']) ?></h2>

<p>Username: <?= esc($user['username']) ?></p>
<p>Email: <?= esc($user['email']) ?></p>
<p>Created At: <?= esc($user['created_at']) ?></p>

</body>
</html>