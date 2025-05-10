<?php
session_start();
require __DIR__ . '/../../config/db_connect.php';

// Login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields!";
    } else {
        $query = "SELECT id, name FROM teachers WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        $teacher = mysqli_fetch_assoc($result);

        if ($teacher) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['teacher_id'] = $teacher['id'];
            $_SESSION['name'] = $teacher['name'];
            header("Location: ../../index.php");
            exit;
        } else {
            $_SESSION['msg'] = 'Login failed!';
            header("Location: ../login.php");
            exit;
        }
    }
}
