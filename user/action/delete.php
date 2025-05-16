<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../../auth/login.php');
    exit();
}

require '../../config/connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Delete image file if needed
    $getImage = mysqli_query($conn, "SELECT image FROM students WHERE id = $id");
    if ($getImage && mysqli_num_rows($getImage) > 0) {
        $row = mysqli_fetch_assoc($getImage);
        $image = $row['image'];
        $imagePath = '../../upload-images/' . $image;
        if (file_exists($imagePath)) {
            unlink($imagePath); // delete the image file
        }
    }

    $sql = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Student deleted successfully!";
    } else {
        $_SESSION['message'] = "Failed to delete student.";
    }
}

header('Location: ../../index.php');
exit();