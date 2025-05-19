<?php
include '../../config/connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];

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
    $destination = '../images/' . $new_file_name;

    if (!move_uploaded_file($file_tmp, $destination)) {
        $_SESSION['create-err'] = "Failed to move uploaded file.";
        header("Location: ../create.php");
        exit;
    }


    $sql = "INSERT INTO course (name, duration, image, price) VALUES ('$name','$duration','$new_file_name','$price')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
