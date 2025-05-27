<?php
require_once __DIR__ . '/../functions/Student.php';

// Initialize Student object and get DB connection
$studentObj = new Student();
$connection = $studentObj->getConnection();

// Check if the form was submitted
if (isset($_POST['save_student'])) {

    // Retrieve and sanitize inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $course = trim($_POST['course']);

    // Handle file upload
    $file_name = $_FILES['file']['name'] ?? null;
    $file_temp = $_FILES['file']['tmp_name'] ?? null;
    $upload_dir = __DIR__ . '/../upload-images/';

    // Create folder if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $destination = $upload_dir . basename($file_name);
    $db_path = 'upload-images/' . basename($file_name); // Relative path for DB

    // Move uploaded file
    if (!move_uploaded_file($file_temp, $destination)) {
        $_SESSION['message'] = "File upload failed.";
        $_SESSION['message_type'] = "danger";
        header("Location: ../views/create.php");
        exit();
    }

    // Insert data into DB
    $stmt = $connection->prepare("INSERT INTO students (name, email, phone, course, image) VALUES (?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sssss", $name, $email, $phone, $course, $db_path);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Student created successfully.";
            $_SESSION['message_type'] = "success";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['message'] = "Database execution failed.";
            $_SESSION['message_type'] = "danger";
            header("Location: views/index.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Prepared statement failed.";
        $_SESSION['message_type'] = "danger";
        header("Location: views/create.php");
        exit();
    }
}