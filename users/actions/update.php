<?php
// Check if the request is a POST request (form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../../core/db.php'; // Include DB connection

    // Get and sanitize input values
    $id = $_POST['id'] ?? null; // User ID
    $name = trim($_POST['name'] ?? ''); // Name (trim spaces)
    $email = trim($_POST['email'] ?? ''); // Email (trim spaces)
    $password = trim($_POST['password'] ?? ''); // Password (trim spaces)

    if ($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    // Validate form data
    if (!$id || !$name || !$email) {
        die("All fields are required.");
    }

    // Prepare the SQL UPDATE statement using class-style mysqli
    if ($password) {
        $query = "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?";
    } else {
        $query = "UPDATE users SET name = ?, email = ? WHERE id = ?";
    }
    $stmt = $connection->prepare($query); // Create prepared statement

    if ($stmt) {
        // Bind the parameters to the prepared statement (i = integer, s = string)
        if ($password) {
            $stmt->bind_param("sssi", $name, $email, $hashedPassword, $id);
        } else {
            $stmt->bind_param("ssi", $name, $email, $id);
        }
        $stmt->execute(); // Execute the update query
        $stmt->close();   // Close the statement after use

        // Redirect back to the users index page
        header("Location: ../index.php");
        exit;
    } else {
        // If the query fails, display the error
        die("Update failed: " . $connection->error);
    }
} else {
    // If it's not a POST request, display an error
    die("Invalid request.");
}
