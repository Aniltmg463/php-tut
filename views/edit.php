<form action="?action=edit&id=<?php echo $job['id']; ?>" method="post">
    <input type="text" name="title" value="<?php echo $job['title']; ?>"><br>
    <input type="text" name="company" value="<?php echo $job['company']; ?>"><br>
    <input type="text" name="location" value="<?php echo $job['location']; ?>"><br>
    <button type="submit">Update</button>
</form>