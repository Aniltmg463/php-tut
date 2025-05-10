<?php
session_start();

require __DIR__ . '/../config/connect.php';

// Login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields!";
    } else {
        $query = "SELECT * FROM students WHERE email = '$email' AND password = '$password'";
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