<?php
session_start();
require '../config/connect.php'; // Make sure this sets $connection

// Search logic
$searchResults = [];
if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
    $keyword = trim($_GET['keyword']);
    $keyword = $conn->real_escape_string($keyword);

    $sql = "SELECT * FROM students WHERE name LIKE ? OR email LIKE ?";
    $stmt = $conn->prepare($sql);
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

<?php require '../view/layout/header.php'; ?>

<body class="bg-light text-dark">

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">MySchool</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- 🔍 Search Bar -->
            <form class="d-flex" role="search" action="search.php" method="GET">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search..."
                    aria-label="Search"
                    value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../teacher/index.php">Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../course/action/course-list.php">List Course</a>
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
                                <a href="../auth/login.php" class="btn btn-primary me-2">Login</a>
                                <a href="../auth/register.php" class="btn btn-success">Register</a>
                            </div>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="card shadow-sm mt-5">
        <div class="card-body">
            <h2 class="h4 mb-4 text-primary">Search Results for "<?= htmlspecialchars($_GET['keyword']) ?>"</h2>

            <?php if (!empty($searchResults)): ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <!-- <th class="text-center">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($searchResults as $user): ?>
                                <tr>
                                    <td class="text-center"><?= $user['id'] ?></td>
                                    <td><?= htmlspecialchars($user['name']) ?></td>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                    <!-- <td class="text-center">
                                <a href="users/edit.php?id=<?= $user['id'] ?>"
                                    class="btn btn-sm btn-primary me-1">Edit</a>
                                <a href="users/actions/delete.php?id=<?= $user['id'] ?>"
                                    onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                            </td> -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>
                <div class="alert alert-warning text-center" role="alert">
                    No results found for "<strong><?= htmlspecialchars($_GET['keyword']) ?></strong>".
                </div>
            <?php endif; ?>

        </div>
    </div>


</body>

</html>