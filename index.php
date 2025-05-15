<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php require 'users/layout/header.php'; ?>

<body class="bg-light text-dark">

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">MySchool</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- 🔍 Search Bar -->
            <form class="d-flex" role="search" action="users/actions/search.php" method="GET">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search..."
                    aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courses/index.php">List Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fees</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h1 class="text-center fw-bold mb-4">Welcome to the Application</h1>

        <?php if (isset($_SESSION['user'])): ?>
            <div class="text-end mb-3">
                <p class="fw-semibold">Hello, <span
                        class="text-primary"><?= htmlspecialchars($_SESSION['user']['name']) ?></span></p>
                <a href="auth/logout.php" class="btn btn-sm btn-warning">Logout</a>
            </div>
        <?php else: ?>
            <div class="text-center mb-4">
                <a href="auth/login.php" class="btn btn-primary me-2">Login</a>
                <a href="auth/register.php" class="btn btn-success">Register</a>
            </div>
        <?php endif; ?>

        <div class="d-grid gap-3 col-6 mx-auto">
            <a href="courses/index.php" class="btn btn-outline-primary">📘 View Courses</a>
            <a href="users/index.php" class="btn btn-outline-success">👥 View Users</a>
        </div>
    </div>

</body>

</html>