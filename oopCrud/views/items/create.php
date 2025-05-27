<?php
include_once "views/components/header.php";
?>

<form action="?action=create" method="post">
    <div>
        <label for="name">name</label>
        <input type="text" name="name">
    </div>

    <div>
        <label for="quantity">quantity</label>
        <input type="number" name="quantity">
    </div>

    <div>
        <label for="price">price</label>
        <input type="number" name="price">
    </div>

    <div>
        <select name="category" id="">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <button type="submit">Create</button>
    </div>
</form>

<?php
include_once "views/components/footer.php";
?>