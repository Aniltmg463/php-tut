<?php
require_once __DIR__ . '/../core/auth.php';
require_once __DIR__ . '/../helpers/user.php';

if (!isLoggedIn()) {
    $_SESSION['error'] = "You must be logged in to access this page";
    redirectToLogin();
}

$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<?php require 'layout/header.php'; ?>

<!-- <body class="bg-light min-vh-100 d-flex flex-column align-items-center justify-content-start p-4"> -->

<body class="bg-light text-dark">


    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow">

        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">MySchool</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacher/index.php">Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../courses/index.php">List Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fees</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 text-primary">👥 Users</h1>
                    <a href="create.php" class="btn btn-success">+ Create New User</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td class="text-center"><?= $user['id'] ?></td>
                                    <td><?= htmlspecialchars($user['name']) ?></td>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?= $user['id'] ?>"
                                            class="btn btn-sm btn-primary me-1">Edit</a>
                                        <a href="actions/delete.php?id=<?= $user['id'] ?>"
                                            onclick="return confirm('Are you sure?')"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (optional, for dropdowns/modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>