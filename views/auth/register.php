<?php include_once 'views/layouts/header.php'; ?>

<div class="wrapper d-flex flex-column align-items-center justify-content-center h-100">
    <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-success" role="alert">

            <?= htmlspecialchars($_SESSION['message']) ?>
            <?php unset($_SESSION['message']); ?>

        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form method="post" action="index.php?url=auth/register">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <?php if (!empty($data['errors']['name'])): ?>
                                <div class="text-danger"><?= htmlspecialchars($data['errors']['name']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <?php if (!empty($data['errors']['email'])): ?>
                                <div class="text-danger"><?= htmlspecialchars($data['errors']['email']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number">
                            <?php if (!empty($data['errors']['phone_number'])): ?>
                                <div class="text-danger"><?= htmlspecialchars($data['errors']['phone_number']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                            <?php if (!empty($data['errors']['username'])): ?>
                                <div class="text-danger"><?= htmlspecialchars($data['errors']['username']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <?php if (!empty($data['errors']['password'])): ?>
                                <div class="text-danger"><?= htmlspecialchars($data['errors']['password']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            <?php if (!empty($data['errors']['confirm_password'])): ?>
                                <div class="text-danger"><?= htmlspecialchars($data['errors']['confirm_password']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
                <div class="sign-up mt-4">
                    Already have an account? <a href="index.php?url=auth/login">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once 'views/layouts/footer.php'; ?>