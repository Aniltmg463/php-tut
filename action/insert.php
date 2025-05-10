<?php
include '../config/connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    echo $file_name = $_FILES['file']['name'];
    echo $file_temp = $_FILES['file']['tmp_name'];

    if (move_uploaded_file($file_temp, "../upload-images/" . $file_name)) {
        echo "<div class='alert alert-success'>File uploaded successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>File upload failed.</div>";
    }

    $sql = "INSERT INTO students (name, email, mobile, password, image) VALUES ('$name','$email','$mobile','$password','$file_name')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();

        /* echo "<pre>";
        print_r($_FILES);
        echo "</pre>"; */
    } else {
        echo "Error: " . $conn->error;
    }
}
