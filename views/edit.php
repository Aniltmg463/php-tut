<?php

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

        <div class="mb-3">
            <label for="file" class="form-label">Upload Image</label>
            <input class="form-control" type="file" name="file">
        </div>


        <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<?php include 'views/layouts/footer.php'; ?>