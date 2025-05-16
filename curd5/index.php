<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: auth/login.php');
    exit();
}

require 'config/connect.php';
?>


<!DOCTYPE html>
<html lang="en">

<?php require 'user/layout/header.php'; ?>

<body class="bg-light text-dark">


    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MySchool</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- 🔍 Search Bar -->
            <form class="d-flex" role="search" action="user/action/search.php" method="GET">
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
                        <a class="nav-link" href="teacher/index.php">Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="course/index.php">Courses</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Fees</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container py-5">
        <!-- Alert Message -->
        <?php require 'user/partial/alert.php'; ?>

        <h1 class="text-center fw-bold mb-4">Student Information</h1>

        <div class="text-end mb-3">
            <a href="auth/logout.php" class="btn btn-sm btn-warning">Log Out</a>
        </div>

        <div class="mb-3">
            <a href="user/create.php" class="btn btn-sm btn-success">Add Student</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped bg-white shadow rounded">
                <thead class="table-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $sql = "SELECT * FROM students";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0):
                        while ($row = mysqli_fetch_assoc($result)):
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $mobile = $row['mobile'];
                            $image = $row['image'];
                    ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $name ?></td>
                        <td><?= $email ?></td>
                        <td><?= $mobile ?></td>

                        <td><img src="upload-images/<?= $image ?>" width="60" height="60" style="object-fit: cover;" />
                        </td>
                        <td>
                            <a href="user/edit.php?updateid=<?= $id ?>" class="btn btn-sm btn-primary">Update</a>
                            <a href="user/action/delete.php?deleteid=<?= $id ?>"
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