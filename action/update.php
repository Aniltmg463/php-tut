<?php
include '../config/connect.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("UPDATE students SET name=?, email=?, mobile=?, password=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $email, $mobile, $password, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Update failed: " . $conn->error;
    }
}
