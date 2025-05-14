<?php
include '../../config/connect.php';

if (isset($_POST['submit'])) {
    $id       = $_POST['id'];
    $name     = $_POST['name'];
    $email    = $_POST['email'];

    // Prepare SQL
    // If a new image is uploaded, include 'image' column in the UPDATE query
    $stmt = $conn->prepare("UPDATE teachers SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email,  $id);

    if ($stmt->execute()) {
        header("Location:../teacher.php");
        exit();
    } else {
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
