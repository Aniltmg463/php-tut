<?php
session_start();

require_once __DIR__ . '/../functions/Student.php';

// Initialize Student object and get DB connection
$studentObj = new Student();
$connection = $studentObj->getConnection();

// Ensure the request method is POST and the action is 'delete'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_GET['action'] ?? '') === 'delete') {

    // Check if the 'id' field is present in the POST request
    if (isset($_POST['id'])) {
        $id = (int) $_POST['id']; // Type cast to integer for extra safety

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $connection->prepare("DELETE FROM students WHERE id = ?");
        if ($stmt) {
            // Bind the ID as an integer parameter
            $stmt->bind_param("i", $id);

            // Execute the statement and check for success
            if ($stmt->execute()) {
                $_SESSION['message'] = "Student deleted successfully.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Delete failed. Please try again.";
                $_SESSION['message_type'] = "danger";
            }

            $stmt->close(); // Close the prepared statement
        } else {
            // Failed to prepare the SQL statement
            $_SESSION['message'] = "Failed to prepare delete operation.";
            $_SESSION['message_type'] = "danger";
        }

        // Redirect to main page after processing
        header("Location: index.php");
        exit();
    } else {
        // No ID was provided in the POST request
        $_SESSION['message'] = "Invalid delete request. Student ID missing.";
        $_SESSION['message_type'] = "danger";
        header("Location: ../index.php");
        exit();
    }
}
