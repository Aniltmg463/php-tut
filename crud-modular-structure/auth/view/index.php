<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light min-vh-100 d-flex flex-column justify-content-center align-items-center py-5">

    <div class="w-100 max-w-md bg-white rounded-lg shadow-lg p-5">
        <h1 class="text-center text-primary mb-4">Login</h1>

        <?php if (!empty($_SESSION['login_error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['login_error'] ?>
            </div>
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>

        <form action="actions/process-login.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="mt-3 text-center">
            <a href="../index.php" class="text-muted">Back to Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>