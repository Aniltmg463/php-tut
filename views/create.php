<?php
include 'views/layouts/header.php';
?>

<div class="container mt-5">
    <h4>Add New Student</h4>
    <form action="?action=store" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Student Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Student Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Student Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Student Course</label>
            <input type="text" name="course" class="form-control" required>
        </div>

        <input type="file" name="file" class="form-control" />


        <!-- <div class="mb-3">
    <label for="file" class="form-label">Upload Image</label>
    <input class="form-control" type="file" name="file" required>
</div> -->

        <button type="submit" name="save_student" class="btn btn-success">Save Student</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<?php include 'views/layouts/footer.php'; ?>