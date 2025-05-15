<?php
session_start();
require '../../core/db.php'; // Make sure this sets $connection

// Search logic
$searchResults = [];
if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
    $keyword = trim($_GET['keyword']);
    $keyword = $connection->real_escape_string($keyword);

    $sql = "SELECT * FROM users WHERE name LIKE ? OR email LIKE ?";
    $stmt = $connection->prepare($sql);
    $searchTerm = "%{$keyword}%";
    $stmt->bind_param('ss', $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<?php require '../../users/layout/header.php'; ?>

<body class="bg-light text-dark">

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">MySchool</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- 🔍 Search Bar -->
            <form class="d-flex" role="search" action="index.php" method="GET">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search..."
                    aria-label="Search"
                    value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
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
                        <a class="nav-link" href="../../courses/index.php">List Course</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#">Fees</a> -->

                        <?php if (isset($_SESSION['user'])): ?>
                        <div class="text-end mb-3">
                            <p class="fw-semibold">Hello, <span
                                    class="text-primary"><?= htmlspecialchars($_SESSION['user']['name']) ?></span></p>
                            <a href="../../auth/logout.php" class="btn btn-sm btn-warning">Logout</a>
                        </div>
                        <?php else: ?>
                        <div class="text-center mb-4">
                            <a href="../../auth/login.php" class="btn btn-primary me-2">Login</a>
                            <a href="../../auth/register.php" class="btn btn-success">Register</a>
                        </div>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <!-- <?php if (isset($_SESSION['user'])): ?>
        <div class="text-end mb-3">
            <p class="fw-semibold">Hello, <span
                    class="text-primary"><?= htmlspecialchars($_SESSION['user']['name']) ?></span></p>
            <a href="auth/logout.php" class="btn btn-sm btn-warning">Logout</a>
        </div>

        <div class="text-center mb-4">
            <a href="../../auth/login.php" class="btn btn-primary me-2">Login</a>
            <a href="../../auth/register.php" class="btn btn-success">Register</a>
        </div>
        <?php endif; ?> -->

        <!-- 🔍 Search Results -->
        <?php if (!empty($searchResults)): ?>
        <div class="mt-5">
            <h3 class="text-center">Search Results</h3>
            <hr>
            <?php foreach ($searchResults as $user): ?>
            <div class="border rounded p-3 mb-3 shadow-sm bg-white">
                <strong>Name:</strong> <?= htmlspecialchars($user['name']) ?><br>
                <strong>Email:</strong> <?= htmlspecialchars($user['email']) ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php elseif (isset($_GET['keyword'])): ?>
        <div class="mt-5 text-center text-muted">
            <p>No users found for "<strong><?= htmlspecialchars($_GET['keyword']) ?></strong>".</p>
        </div>
        <?php endif; ?>
    </div>

</body>

</html>