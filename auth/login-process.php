<?php
session_start();

require __DIR__ . '/../config/database.php';

require_once '../functions/Student.php';

$student = new Student();

// Get the connection from Student class
$con = $student->getConnection();

/* if ($student->isConnected()) {
    echo "<div class='alert alert-success'>Database connected successfully.</div>";
} else {
    echo "<div class='alert alert-danger'>Database connection failed.</div>";
    exit();
}
 */

// Login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['msg'] = "Please fill in all fields!";
        header("Location: ../auth/login.php");
        exit;
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("SELECT * FROM students WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $student = $result->fetch_assoc();

        if ($student) {
            $_SESSION['email'] = $email;
            $_SESSION['student_id'] = $student['id'];
            header("Location: ../index.php");
            exit;
        } else {
            $_SESSION['msg'] = 'Login failed!';
            header("Location: ../auth/login.php");
            exit;
        }
    }
}
