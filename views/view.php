<?php
include 'views/layouts/header.php';

if (!isset($_GET['id'])) {
    die("ID is required.");
}

$result = get_student_by_id($connection, $_GET['id']);

if ($result && $result->num_rows > 0) {
    $student = $result->fetch_assoc();
} else {
    die("Student not found.");
}
?>

<div class="container mt-5">
    <h4>View Student Details</h4>
    <div class="mb-3">
        <label>Student Name</label>
        <p class="form-control"><?= htmlspecialchars($student['name']) ?></p>
    </div>
    <div class="mb-3">
        <label>Student Email</label>
        <p class="form-control"><?= htmlspecialchars($student['email']) ?></p>
    </div>
    <div class="mb-3">
        <label>Student Phone</label>
        <p class="form-control"><?= htmlspecialchars($student['phone']) ?></p>
    </div>
    <div class="mb-3">
        <label>Student Course</label>
        <p class="form-control"><?= htmlspecialchars($student['course']) ?></p>
    </div>
    <a href="index.php" class="btn btn-secondary">Back</a>
</div>

<?php include 'views/layouts/footer.php'; ?>
