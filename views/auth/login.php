<?php include_once 'views/layouts/header.php'; ?>

<div class="wrapper d-flex flex-column align-items-center justify-content-center h-100">
    <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-success" role="alert">

            <?= htmlspecialchars($_SESSION['message']) ?>
            <?php unset($_SESSION['message']); ?>

        </div>
    <?php endif; ?>
    <div class="card login-form">
        <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form method="post" action="index.php?url=auth/login">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                    <?php if (!empty($data['errors']['email'])): ?>
                        <div class="text-danger"><?= htmlspecialchars($data['errors']['email']) ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <?php if (!empty($data['errors']['password'])): ?>
                        <div class="text-danger"><?= htmlspecialchars($data['errors']['password']) ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
                <div class="sign-up mt-4">
                    Don't have an account? <a href="index.php?url=auth/register">Create One</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once 'views/layouts/footer.php'; ?>