<?php

if (!isset($_GET['id'])) {
    die("ID is required.");
}

$result = get_student_by_id($connection, $_GET['id']);

if ($result && $result->num_rows > 0) {
    $student = $result->fetch_assoc();
} else {
    die("Student not found.");
}

include 'views/layouts/header.php';
?>

<div class="container mt-5">
    <h4>Edit Student</h4>
    <form action="?action=update&id=<?= $student['id'] ?>" method="POST">
        <div class="mb-3">
            <label>Student Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($student['name']) ?>"
                required>
        </div>
        <div class="mb-3">
            <label>Student Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($student['email']) ?>"
                required>
        </div>
        <div class="mb-3">
            <label>Student Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($student['phone']) ?>"
                required>
        </div>
        <div class="mb-3">
            <label>Student Course</label>
            <input type="text" name="course" class="form-control" value="<?= htmlspecialchars($student['course']) ?>"
                required>
        </div>
        <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<?php include 'views/layouts/footer.php'; ?>