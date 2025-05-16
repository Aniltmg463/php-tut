<?php
include '../../config/connect.php';

if (isset($_POST['submit'])) {
    $id       = $_POST['id'];
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $mobile   = $_POST['mobile'];
    $password = $_POST['password'];

    // Check if file is uploaded
    $file_name = null;
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $file_name = $_FILES['file']['name'];
        $file_temp = $_FILES['file']['tmp_name'];

        if (move_uploaded_file($file_temp, "../upload-images/" . $file_name)) {
            echo "<div class='alert alert-success'>File uploaded successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>File upload failed.</div>";
        }
    }

    // Prepare SQL with or without image
    if ($file_name) {
        // If a new image is uploaded, include 'image' column in the UPDATE query
        $stmt = $conn->prepare("UPDATE students SET name=?, email=?, mobile=?, password=?, image=? WHERE id=?");
        $stmt->bind_param("sssssi", $name, $email, $mobile, $password, $file_name, $id);
    } else {
        // If no new image uploaded, do not touch the existing image in database
        $stmt = $conn->prepare("UPDATE students SET name=?, email=?, mobile=?, password=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $email, $mobile, $password, $id);
    }

    if ($stmt->execute()) {
        header("Location: ../../index.php");
        exit();
    } else {
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
