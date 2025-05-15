<?php
// Check if the request is a POST request (form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../../core/db.php'; // Include DB connection

    // Trim input to remove extra whitespace
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Validate form data
    if (!$name || !$email || !$password) {
        die("Name, Email and Password are required.");
    }

    // Prepare an INSERT statement using class-based mysqli
    $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($query);

    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $hashedPassword); // Bind name, email and password as strings (s = string)
        $stmt->execute(); // Execute the insert query
        $stmt->close();   // Always close the statement

        // Redirect to the user index page
        header("Location: ../index.php");
        exit;
    } else {
        // If prepare fails, show error
        die("Insert failed: " . $connection->error);
    }
} else {
    // If the request is not POST, show an error
    die("Invalid request.");
}
