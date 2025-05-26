<?php
session_start();
require_once 'Users.php'; // if you placed the class in a separate file

$user = new Users();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $con = $user->getConnection(); // Get the protected connection safely

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    // Execute the statement
    if ($stmt->execute()) {
        // echo "New record created successfully";
        $_SESSION['msg'] = 'Data inserted successfully';
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}