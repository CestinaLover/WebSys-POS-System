<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>

<h1>Task List</h1>

<?= view('navbar') ?>

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