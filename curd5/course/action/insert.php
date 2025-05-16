<?php
include '../../config/connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $duration = $_POST['duration'];

    $sql = "INSERT INTO course (name, duration) VALUES ('$name','$duration')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
