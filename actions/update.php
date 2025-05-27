<?php
require_once __DIR__ . '/../functions/Student.php';
session_start();

// Initialize Student object and get DB connection
$studentObj = new Student();
$connection = $studentObj->getConnection();

if (isset($_POST['update_student'])) {
    $id = (int) $_GET['id'];

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $course = trim($_POST['course']);

    $existingStudent = $studentObj->getStudentById($id)->fetch_assoc();
    $existingImage = $existingStudent['image'] ?? null;

    $file_name = $existingImage; // default image path
    $upload_dir = __DIR__ . 'upload-images/';

    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $original_name = $_FILES['file']['name'];
        $file_temp = $_FILES['file']['tmp_name'];
        $ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));

        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($ext, $allowed_extensions)) {
            $_SESSION['message'] = "Invalid file type.";
            $_SESSION['message_type'] = "danger";
            header("Location: index.php?action=edit&id=$id");
            exit();
        }

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $new_filename = uniqid('student_', true) . '.' . $ext;
        $destination = $upload_dir . $new_filename;
        $relative_path = 'upload-images/' . $new_filename;

        if (move_uploaded_file($file_temp, $destination)) {
            $file_name = $relative_path;
        } else {
            $_SESSION['message'] = "Failed to upload new image.";
            $_SESSION['message_type'] = "danger";
            header("Location: index.php?action=edit&id=$id");
            exit();
        }
    }

    $stmt = $connection->prepare("UPDATE students SET name = ?, email = ?, phone = ?, course = ?, image = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("sssssi", $name, $email, $phone, $course, $file_name, $id);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Student updated successfully.";
            $_SESSION['message_type'] = "success";
            header("Location: index.php?action=list");
            exit();
        } else {
            $_SESSION['message'] = "Update failed during execution.";
            $_SESSION['message_type'] = "danger";
            header("Location: index.php?action=edit&id=$id");
            exit();
        }
    } else {
        $_SESSION['message'] = "Failed to prepare statement.";
        $_SESSION['message_type'] = "danger";
        header("Location: index.php?action=edit&id=$id");
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid request.";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php?action=list");
    exit();
}