<?php session_start(); ?>

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

                        <?php if (isset($_SESSION['create-err'])): ?>
                            <p class="text-danger text-center mb-4">
                                <?= $_SESSION['create-err'];
                                unset($_SESSION['create-err']); ?>
                            </p>
                        <?php endif; ?>

                        <form action="action/insert.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="<?= isset($_SESSION['old']['name']) ? $_SESSION['old']['name'] : '' ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '' ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mobile</label>
                                <input type="text" name="mobile" class="form-control"
                                    value="<?= isset($_SESSION['old']['mobile']) ? $_SESSION['old']['mobile'] : '' ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="file" class="form-label">Upload Image</label>
                                <input class="form-control" type="file" name="file">
                            </div>

                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <?php unset($_SESSION['old']); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>