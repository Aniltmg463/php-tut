<?php
include '../../config/connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `course` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //echo "Data deleted successfully";
        header('location:course-list.php');
    } else {
        die(mysqli_error($conn));
    }
}
