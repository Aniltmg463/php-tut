<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">

    <div class="container py-5">
        <h1 class="text-center fw-bold mb-4">Student Information</h1>
        <div class="table-responsive">
            <button class="btn btn-sm btn-primary">
                <a href="user.php" class="text-light text-decoration-none">Add student</a>
            </button>
            <table class="table table-bordered table-hover table-striped align-middle bg-white shadow rounded">
                <thead class="table-dark text-uppercase text-white">
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

                    $sql = "select * from `students`";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $mobile = $row['mobile'];
                            $password = $row['password'];
                            echo '
                            <tr>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $email . '</td>
                                <td>' . $mobile . '</td>
                                <td>' . $password . '</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">  
                                    <a href="update.php?updateid=' . $id . '" 
                                    class="text-light text-decoration-none">Update</a>
                                    </button>
                                    
                                     <button class="btn btn-sm btn-danger"> 
                                     <a href="delete.php?deleteid=' . $id . '" 
                                     class="text-light text-decoration-none">Delete</a>
                                     
                                     </button>
                                </td>
                    
                            </tr>';
                        }
                    }

                    ?>


                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap 5 JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>