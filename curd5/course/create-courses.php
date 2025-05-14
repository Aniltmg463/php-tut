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
                        <h3 class="text-center fw-bold mb-4">Add Course</h3>
                        <form action="action/insert-course.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3"><label class="form-label">Name</label><input type="text" name="name"
                                    class="form-control" required></div>
                            <div class="mb-3">
                                <label class="form-label">Duration</label>
                                <select name="duration" class="form-select" required>
                                    <option value="">-- Select Duration --</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="2 Years">2 Years</option>
                                </select>
                            </div>


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