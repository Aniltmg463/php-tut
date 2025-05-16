<?php
session_start();

require __DIR__ . '/../config/connect.php';

// Get email and password from POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate required fields
    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields!";
    } else {
        $query = "SELECT * FROM teachers WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        $student = mysqli_fetch_assoc($result);

        if ($student) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['student_id'] = $student['id'];
            $_SESSION['name'] = $teacher['name'];
            header("Location: ../index.php");
            exit;
        } else {
            $_SESSION['msg'] = 'Login failed!';
            header("Location: ../auth/login.php");
            exit;
        }
    }
}
