<?php
require_once __DIR__ . '/../helpers/course.php';
require_once __DIR__ . '/../core/auth.php';

if (!isLoggedIn()) {
    $_SESSION['error'] = "You must be logged in to access this page";
    redirectToLogin();
}

$courses = getCourses();
?>

<!DOCTYPE html>
<html lang="en">

<?php require '../users/layout/header.php'; ?>

<body class="bg-light text-dark">


    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow">

        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">MySchool</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- 🔍 Search Bar -->
            <form class="d-flex" role="search" action="actions/search.php" method="GET">
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
                        <a class="nav-link" href="index.php">Teacher</a>
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


    <div class="container">
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 text-primary">📚 Courses</h1>
                    <a href="create.php" class="btn btn-success">+ Create New Course</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Name</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($courses as $course): ?>
                                <tr>
                                    <td class="text-center"><?= $course['id'] ?></td>
                                    <td><?= htmlspecialchars($course['name']) ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?= $course['id'] ?>"
                                            class="btn btn-sm btn-primary me-1">Edit</a>
                                        <a href="actions/delete.php?id=<?= $course['id'] ?>" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</body>

</html>