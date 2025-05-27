<?php
include __DIR__ . '/layouts/header.php';

require_once __DIR__ . '/../functions/Student.php';

$studentObj = new Student();

// Check connection
$studentObj->isConnected();

// Validate ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Valid student ID is required.");
}

$id = (int) $_GET['id'];

// Get mysqli_result object
$result = $studentObj->getStudentById($id);

// Now fetch associative array
$studentData = $result->fetch_assoc();

if (!$studentData) {
    die("Student not found.");
}
?>

<div class="container mt-5">
    <h4>View Student Details</h4>
    <div class="mb-3">
        <label>Student Name</label>
        <p class="form-control"><?= htmlspecialchars($studentData['name']) ?></p>
    </div>
    <div class="mb-3">
        <label>Student Email</label>
        <p class="form-control"><?= htmlspecialchars($studentData['email']) ?></p>
    </div>
    <div class="mb-3">
        <label>Student Phone</label>
        <p class="form-control"><?= htmlspecialchars($studentData['phone']) ?></p>
    </div>
    <div class="mb-3">
        <label>Student Course</label>
        <p class="form-control"><?= htmlspecialchars($studentData['course']) ?></p>
    </div>
    <div class="mb-3">
        <label>Student Image</label><br>
        <img src="../upload-images/<?= htmlspecialchars($studentData['image']) ?>" width="60" height="60"
            style="object-fit: cover;" />
    </div>
    <a href="index.php" class="btn btn-secondary">Back</a>
    <!-- <a href="index.php?action=create" class="btn btn-secondary">Add student</a> -->

</div>

<?php include __DIR__ . '/layouts/footer.php'; ?>