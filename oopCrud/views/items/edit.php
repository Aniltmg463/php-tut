<?php include_once "views/components/header.php"; ?>

<form action="?action=update&id=<?php echo htmlspecialchars($item['id']); ?>" method="post">

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
    </div>

    <div>
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>" required>
    </div>

    <div>
        <label for="price">Price</label>
        <input type="number" name="price" value="<?php echo htmlspecialchars($item['price']); ?>" required>
    </div>

    <div>
        <label for="category">Category</label>
        <select name="category">
            <?php
          
            foreach ($categories as $category):
            ?>
                <option value="<?php echo $category['id']; ?>" 
                    <?php echo $category['id'] == $item['category_id'] ? 'selected' : ''; ?>>
                    <?php echo $category['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <button type="submit">Update</button>
    </div>
</form>

<?php include_once "views/components/footer.php"; ?>