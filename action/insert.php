<?php
include '../config/connect.php';

if (isset($_POST['submit'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $mobile   = $_POST['mobile'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Validate form data
    if (!$name || !$email || !$password) {
        die("Name, Email, and Password are required.");
    }

    // File handling
    $file_name  = $_FILES['file']['name'];
    $file_temp  = $_FILES['file']['tmp_name'];
    $file_error = $_FILES['file']['error']; //FIXED: was $file['eror'] which is undefined

    $file_extension = explode('.', $file_name);
    $file_extension_check = strtolower(end($file_extension));
    $valid_file_extensions = ['png', 'jpg', 'jpeg', 'gif'];

    if ($file_error === 0) {
        if (in_array($file_extension_check, $valid_file_extensions)) {
            $new_file_name = uniqid() . '.' . $file_extension_check;
            $destination = '../upload-images/' . $new_file_name;

            move_uploaded_file($file_temp, $destination);
        } else {
            die("Invalid file type. Only PNG, JPG, JPEG, and GIF are allowed.");
        }
    } else {
        die("Error uploading file.");
    }

    // Check for duplicate email
    $sql = "SELECT * FROM students WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Email already exists.");
    }

    // Insert new student
    $sql = "INSERT INTO students (name, email, mobile, password, image) 
            VALUES ('$name','$email','$mobile','$hashedPassword','$new_file_name')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}