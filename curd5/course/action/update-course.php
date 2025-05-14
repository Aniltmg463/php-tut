<?php
include '../../config/connect.php';

if (isset($_POST['submit'])) {
    $id       = $_POST['id'];
    $name     = $_POST['name'];
    $duraton    = $_POST['duration'];


    // Prepare SQL
    // If a new image is uploaded, include 'image' column in the UPDATE query
    $stmt = $conn->prepare("UPDATE course SET name=?, duration=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $duration,  $id);


    if ($stmt->execute()) {
        header("Location: ../../index.php");
        exit();
    } else {
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
