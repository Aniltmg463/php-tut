<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Inventory Management System</h2>
    <a href="index.php?action=create">Add New Item</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?php echo htmlspecialchars($item['id']); ?></td>
            <td><?php echo htmlspecialchars($item['name']); ?></td>
            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
            <td><?php echo htmlspecialchars($item['price']); ?></td>
            <td><?php echo htmlspecialchars($item['category']); ?></td>
            <td>
                <a href="index.php?action=update&id=<?php echo $item['id']; ?>">Edit</a>
                <a href="index.php?action=delete&id=<?php echo $item['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>