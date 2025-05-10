<?php
include 'views/layouts/header.php';

$students = get_all_students($connection);
?>
<?php include 'views/partials/alert.php'; ?>
<h2>Student List</h2>
<a href="?action=create" class="btn btn-primary">Add New</a>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($students)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td>
                    <a href="?action=view&id=<?= $row['id'] ?>" class="btn btn-info btn-sm">View</a>
                    <a href="?action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="?action=delete" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'views/layouts/footer.php'; ?>