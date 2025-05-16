<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../auth/login.php');
    exit();
}

require '../config/connect.php';
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Teacher</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../course/action/course-list.php">List Course</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Fees</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h1 class="text-center fw-bold mb-4">Teacher Information</h1>

        <div class="text-end mb-3">
            <a href="../auth/logout.php" class="btn btn-sm btn-warning">Log Out</a>
        </div>

        <div class="mb-3">
            <a href="../auth/signup.php" class="btn btn-sm btn-success">Add Teacher</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped bg-white shadow rounded">
                <thead class="table-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM teachers";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0):
                        while ($row = mysqli_fetch_assoc($result)):
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                    ?>
                            <tr>
                                <td><?= $id ?></td>
                                <td><?= $name ?></td>
                                <td><?= $email ?></td>
                                </td>
                                <td>
                                    <!-- <a href="view/edit-course.php?updateid=<?= $id ?>" class="btn btn-sm btn-primary">Update</a> -->
                                    <a href="../teacher/edit-teacher.php?updateid=<?= $id ?>"
                                        class="btn btn-sm btn-primary">Update</a>

                                    <a href="../teacher/action/delete-teacher.php?deleteid=<?= $id ?>"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                    else:
                        ?>
                        <tr>
                            <td colspan="6" class="text-center">No records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>