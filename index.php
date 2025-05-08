<?php
include 'config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student CRUD App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">

    <div class="container py-5">
        <h1 class="text-center fw-bold mb-4">Student Information</h1>
        <div class="mb-3">
            <!-- <a href="action/insert.php" class="btn btn-sm btn-success">Add Student</a> -->
            <a href="view/create.php" class="btn btn-sm btn-success">Add Student</a>

        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped bg-white shadow rounded">
                <thead class="table-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM students";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $mobile = $row['mobile'];
                            $password = $row['password'];
                            echo '
                            <tr>
                                <td>' . $id . '</td>
                                <td>' . htmlspecialchars($name) . '</td>
                                <td>' . htmlspecialchars($email) . '</td>
                                <td>' . htmlspecialchars($mobile) . '</td>
                                <td>••••••••</td>
                                <td>
                                   <a href="view/edit.php?updateid=' . $id . '" class="btn btn-sm btn-primary">Update</a>

                                    <a href="action/delete.php?deleteid=' . $id . '" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6" class="text-center">No records found.</td></tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>