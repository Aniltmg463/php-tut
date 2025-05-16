<?php
session_start();
include '../../config/connect.php';

if (isset($_POST['submit'])) {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    // Store old inputs for repopulating form on error (excluding password)
    $_SESSION['old'] = [
        'name' => $name,
        'email' => $email,
    ];

    // Validate required fields
    if (empty($name) || empty($email) || empty($password)) {
        $_SESSION['create-err'] = "All fields are required.";
        header("Location: ../create.php");
        exit;
    }


    // Check for duplicate email
    $stmt = $conn->prepare("SELECT id FROM teachers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION['create-err'] = "Email already exists.";
        header("Location: ../create.php");
    }
    $stmt->close();

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO teachers (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        unset($_SESSION['old']);
        header("Location: ../index.php");
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
