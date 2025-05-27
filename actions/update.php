<?php
require_once __DIR__ . '/../functions/Student.php';

// Initialize Student object and get DB connection
$studentObj = new Student();
$connection = $studentObj->getConnection();
/**
 * Highlights for Students:
 * Use of prepared statements to protect against SQL injection.
 * Proper HTTP method check using isset($_POST['update_student']).
 * Input sanitization with trim().
 * Integer casting for id to ensure type safety.
 * Flash messaging using sessions.
 * Redirection after processing to avoid form resubmission on refresh.
 */

// Check if the update form was submitted
if (isset($_POST['update_student'])) {
    // Get the student ID from the query parameter
    $id = (int) $_GET['id'];

    // Retrieve and sanitize form input values
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $course = trim($_POST['course']);

    // Check if file is uploaded
    $file_name = null;
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $file_name = $_FILES['file']['name'];
        $file_temp = $_FILES['file']['tmp_name'];

        if (move_uploaded_file($file_temp, "../upload-images/" . $file_name)) {
            echo "<div class='alert alert-success'>File uploaded successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>File upload failed.</div>";
        }
    }

    // Prepare the SQL update statement using placeholders to prevent SQL injection
    $stmt = $connection->prepare("UPDATE students SET name = ?, email = ?, phone = ?, course = ?, image =? WHERE id = ?");

    if ($stmt) {
        // Bind parameters to the statement (s = string, i = integer)
        $stmt->bind_param("sssssi", $name, $email, $phone, $course, $file_name, $id);

        // Execute the update
        if ($stmt->execute()) {
            // If successful, set a success message
            $_SESSION['message'] = "Student updated successfully.";
            $_SESSION['message_type'] = "success";
            header("Location: index.php");
            exit();
        } else {
            // If execution fails, show an error message
            $_SESSION['message'] = "Update failed during execution.";
            $_SESSION['message_type'] = "danger";
            header("Location: ../views/edit.php?id=$id");
            exit();
        }
    } else {
        // If preparation of statement fails
        $_SESSION['message'] = "Failed to prepare the update statement.";
        $_SESSION['message_type'] = "danger";
        header("Location: ../views/edit.php?id=$id");
        exit();
    }
}