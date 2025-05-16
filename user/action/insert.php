<?php
session_start();
include '../../config/connect.php';

if (isset($_POST['submit'])) {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $mobile   = trim($_POST['mobile']);
    $password = $_POST['password'];

    // Store old inputs for repopulating form on error (excluding password)
    $_SESSION['old'] = [
        'name' => $name,
        'email' => $email,
        'mobile' => $mobile
    ];

    // Validate required fields
    if (empty($name) || empty($email) || empty($mobile) || empty($password)) {
        $_SESSION['create-err'] = "All fields are required.";
        header("Location: ../create.php");
        exit;
    }

    // Check if file is uploaded
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== 0) {
        $_SESSION['create-err'] = "Error uploading file.";
        header("Location: ../create.php");
        exit;
    }

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed_ext = ['png', 'jpg', 'jpeg', 'gif'];

    if (!in_array($file_ext, $allowed_ext)) {
        $_SESSION['create-err'] = "Invalid file type. Allowed types: PNG, JPG, JPEG, GIF.";
        header("Location: ../create.php");
        exit;
    }

    $new_file_name = uniqid("IMG_", true) . '.' . $file_ext;
    $destination = '../../upload-images/' . $new_file_name;

    if (!move_uploaded_file($file_tmp, $destination)) {
        $_SESSION['create-err'] = "Failed to move uploaded file.";
        header("Location: ../create.php");
        exit;
    }

    // Check for duplicate email
    $stmt = $conn->prepare("SELECT id FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION['create-err'] = "Email already exists.";
        header("Location: ../create.php");
    }
    $stmt->close();

    // Check for duplicate mobile
    $stmt = $conn->prepare("SELECT id FROM students WHERE mobile = ?");
    $stmt->bind_param("s", $mobile);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION['create-err'] = "Phone already exists.";
        $stmt->close();
        header("Location: ../create.php");
        exit;
    }
    $stmt->close();

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO students (name, email, mobile, password, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $mobile, $hashedPassword, $new_file_name);

    if ($stmt->execute()) {
        unset($_SESSION['old']);
        header("Location: ../../index.php");
        exit;
    } else {
        $_SESSION['create-err'] = "Insert failed: " . $stmt->error;
        header("Location: ../create.php");
        exit;
    }
} else {
    $_SESSION['create-err'] = "Invalid form submission.";
    header("Location: ../create.php");
    exit;
}
