<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <h3 class="text-center fw-bold mb-4">Add Student</h3>
                        <form action="../action/insert.php" method="post">
                            <div class="mb-3"><label class="form-label">Name</label><input type="text" name="name"
                                    class="form-control" required></div>
                            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email"
                                    class="form-control" required></div>
                            <div class="mb-3"><label class="form-label">Mobile</label><input type="text" name="mobile"
                                    class="form-control" required></div>
                            <div class="mb-3"><label class="form-label">Password</label><input type="password"
                                    name="password" class="form-control" required></div>
                            <div class="text-center"><button type="submit" name="submit"
                                    class="btn btn-primary">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>