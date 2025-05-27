<?php
require_once __DIR__ . '/../functions/Student.php';

$studentObj = new Student();
$connection = $studentObj->getConnection();

// ✅ Use $_GET['id'] for student ID
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];
} else {
    $_SESSION['message'] = "Invalid student ID.";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");
    exit();
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$course = trim($_POST['course']);

// Get current image from DB
$result = $studentObj->getStudentById($id);
if (!$result || $result->num_rows === 0) {
    $_SESSION['message'] = "Student not found.";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");
    exit();
}

$studentData = $result->fetch_assoc();
$existingImage = $studentData['image'];

$upload_dir = __DIR__ . '/../upload-images/';
$newImageName = $_FILES['file']['name'] ?? '';
$newImageTemp = $_FILES['file']['tmp_name'] ?? '';

if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if (!empty($newImageName)) {
    $destination = $upload_dir . basename($newImageName);
    $db_path = 'upload-images/' . basename($newImageName);

    if (!move_uploaded_file($newImageTemp, $destination)) {
        $_SESSION['message'] = "Image upload failed.";
        $_SESSION['message_type'] = "danger";
        header("Location: index.php?action=edit&id=" . $id);
        exit();
    }

    $oldImagePath = __DIR__ . '/../' . $existingImage;
    if (file_exists($oldImagePath)) {
        unlink($oldImagePath);
    }
} else {
    $db_path = $existingImage;
}

// Update the student data
$stmt = $connection->prepare("UPDATE students SET name=?, email=?, phone=?, course=?, image=? WHERE id=?");

if ($stmt) {
    $stmt->bind_param("sssssi", $name, $email, $phone, $course, $db_path, $id);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Student updated successfully.";
        $_SESSION['message_type'] = "success";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message'] = "Database execution failed.";
    }
} else {
    $_SESSION['message'] = "Prepared statement failed.";
}

$_SESSION['message_type'] = "danger";
header("Location: index.php?action=edit&id=" . $id);
exit();