<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `students`(`name`, `email`, `mobile`, `password`) VALUES ('$name','$email','$mobile','$password')";
    if ($conn->query($sql) === TRUE) {
        // echo "Data inserted successfully";
        header("Location: display.php");


        /* 
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Data inserted successfully";
        } else {
           die(mysqli_error($conn));
        } */
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="bg-light text-dark">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <h3 class="text-center fw-bold mb-4">Add Students</h3>
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your Name"
                                    autocomplete="off" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter your Email"
                                    autocomplete="off" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile</label>
                                <input type="text" class="form-control" name="mobile"
                                    placeholder="Enter your Mobile Number" autocomplete="off" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter your Password" autocomplete="off" />
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>
<!-- <div class="container my-5">
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter your Name" name="name" autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Enter your Email" name="email" autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" class="form-control" placeholder="Enter your Mobile Number" name="mobile"
                autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter your Password" name="password"
                autocomplete="off">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

</div> -->

</html>