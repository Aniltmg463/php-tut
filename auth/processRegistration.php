<?php
require "../config/dbConn.php";
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
} else {
    $name = "";
    $email = "";
    $password = "";
}

$Dup_username = mysqli_query($conn, "SELECT * FROM `admins` WHERE email='$email'");
if (mysqli_num_rows($Dup_username)) {
    echo "this email already exists";
} else {
    $sql = "INSERT INTO admins(name, email, password) VALUES('$name', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        header(("Location: ../view/login.php"));
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
