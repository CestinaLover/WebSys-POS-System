<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>

<h1>Task List</h1>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/tasks') ?>">Task List</a> |
    <a href="<?= base_url('/profile') ?>">Profile</a> |
    <a href="<?= base_url('/about') ?>">About</a>
</nav>

<h2>All Tasks</h2>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Status</th>
        <th>Task Date</th>
        <th>Created At</th>
    </tr>

    <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= esc($task['title']) ?></td>
            <td><?= esc($task['status']) ?></td>
            <td><?= esc($task['task_date']) ?></td>
            <td><?= esc($task['created_at']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>