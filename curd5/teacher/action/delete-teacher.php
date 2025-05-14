<?php
include '../../config/connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `teachers` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //echo "Data deleted successfully";
        header('location:../teacher.php');
    } else {
        die(mysqli_error($conn));
    }
}
