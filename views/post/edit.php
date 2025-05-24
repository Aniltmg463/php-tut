<?php include_once 'views/layouts/header.php'; ?>
<div class="wrapper">
    <h1>Update Post</h1>
    <form action="index.php?url=post/edit/<?= $data['post']['id'] ?>" method="POST">
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                value="<?= htmlspecialchars($data['post']['title']) ?>">
            <?php if (!empty($data['errors']['title'])): ?>
                <div class="text-danger"><?= htmlspecialchars($data['errors']['title']) ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group mb-3">
            <label for="content">Content:</label>
            <textarea id="content" class="form-control" name="content"
                rows="5"> <?= htmlspecialchars($data['post']['content']) ?></textarea>
            <?php if (!empty($data['errors']['content'])): ?>
                <div class="text-danger"><?= htmlspecialchars($data['errors']['content']) ?></div>
            <?php endif; ?>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-md">Update Post</button>
        </div>
        <div>
            <a href="index.php?url=post/index">← Back to all posts</a>
        </div>
    </form>
</div>
<?php include_once 'views/layouts/footer.php'; ?>