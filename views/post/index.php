<?php include_once 'views/layouts/header.php'; ?>
<div class="wrapper">
    <div>
        <h1>All Blog Posts</h1>
        <p>Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?>! <a href="index.php?url=auth/logout">Logout</a>
        </p>
    </div>
    <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-success" role="alert">

            <?= htmlspecialchars($_SESSION['message']) ?>
            <?php unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>
    <a href="/index.php?url=post/create">Create New Post</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['posts'])): ?>
                <?php foreach ($data['posts'] as $post): ?>
                    <tr>
                        <td><?= htmlspecialchars($post['id']) ?></td>
                        <td><?= htmlspecialchars($post['title']) ?></td>
                        <td><?= htmlspecialchars($post['content']) ?></td>
                        <td><?= htmlspecialchars($post['created_at']) ?></td>
                        <td>
                            <a href="/index.php?url=post/edit/<?= htmlspecialchars($post['id']) ?>">Edit</a>
                            <a href="/index.php?url=post/delete/<?= htmlspecialchars($post['id']) ?>"
                                onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No posts available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php include_once 'views/layouts/footer.php'; ?>