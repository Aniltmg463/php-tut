<a href="?action=create">Add Job</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Company</th>
        <th>Location</th>
        <th>Action</th>
    </tr>
    <?php while($row = $jobs->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['company']; ?></td>
        <td><?php echo $row['location']; ?></td>
        <td>
            <a href="?action=edit&id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="?action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>