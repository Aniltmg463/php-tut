<?php
/**
 * Additional Tips for Students:
 * Use require vs include: require ensures that a missing file will stop execution—good for critical files.
 * Always validate and sanitize user input, especially when using query parameters ($_GET, $_POST).
 * Use session messages for user feedback after actions like create/update/delete.
 * Organize views and actions in separate folders for maintainability.
 * Stick to POST requests for data-modifying actions (store, update, delete) to follow REST principles.
 */

// Start the session to manage flash messages and session data
session_start();

// Include the database configuration and student-related functions
require 'config/database.php';
require 'functions/student.php';

// Determine the requested action from the URL, defaulting to 'list' if not provided
$action = $_GET['action'] ?? 'list';

// Retrieve and sanitize the 'id' from the URL if available
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

/**
 * Routing logic based on the 'action' value.
 * This determines which part of the application the user is trying to access.
 */
switch ($action) {
    // Display the form to create a new student
    case 'create':
        require 'views/create.php';
        break;

    // Handle the form submission for storing a new student
    case 'store':
        // Ensure this is a POST request for security reasons
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require 'actions/store.php';
        } else {
            // Redirect back to the index if accessed directly
            header("Location: index.php");
            exit;
        }
        break;

    // Display the form to edit an existing student
    case 'edit':
        if ($id) {
            require 'views/edit.php';
        } else {
            // Set an error message and redirect if ID is invalid
            $_SESSION['message'] = "Invalid student ID for editing.";
            header("Location: index.php");
            exit;
        }
        break;

    // Handle the form submission for updating a student
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
            require 'actions/update.php';
        } else {
            $_SESSION['message'] = "Invalid request for update.";
            header("Location: index.php");
            exit;
        }
        break;

    // Handle the deletion of a student record
    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            require 'actions/delete.php';
        } else {
            $_SESSION['message'] = "Invalid request for deletion.";
            header("Location: index.php");
            exit;
        }
        break;

    // Show details of a single student
    case 'view':
        if ($id) {
            require 'views/view.php';
        } else {
            $_SESSION['message'] = "Invalid student ID for viewing.";
            header("Location: index.php");
            exit;
        }
        break;

    // Default case: list all students
    case 'list':
        require 'views/index.php';
        break;

    // If an unknown action is specified, show an error message
    default:
        echo '<p>Invalid action specified.</p>';
        break;
}
