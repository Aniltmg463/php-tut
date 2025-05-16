<?php
session_start();

include '../../config/connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `students` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //echo "Data deleted successfully";
        $_SESSION['message'] = "Student deleted successfully.";
        $_SESSION['message_type'] = "success";
        header('location:../../index.php');
    } else {
        die(mysqli_error($conn));
    }
}