<?php
// Database configuration
$servername = "localhost";             // Hostname (use 'localhost' if running without Docker)
$db   = 'student_db';       // Database name
$user = 'root';             // Database username
$pass = '';           // Database password

// Create a new MySQLi instance with error reporting enabled
$connection = new mysqli($servername, $user, $pass, $db);

// Check for a connection error
if ($connection->connect_errno) {
    // Log or display a descriptive error message in production applications
    die("Database connection failed: " . htmlspecialchars($connection->connect_error));
}

// Set the character set to UTF-8 for proper encoding
$connection->set_charset('utf8mb4');