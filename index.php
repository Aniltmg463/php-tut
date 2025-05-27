<?php

/**
 * Student Management Application - Entry Point and Router
 * --------------------------------------------------------
 * Best Practices Followed:
 * - Uses `require` to include critical files (halts if missing)
 * - Validates and sanitizes inputs (e.g., `$_GET`, `$_POST`)
 * - Uses sessions for secure access and flash messaging
 * - Implements RESTful routing (POST for store/update/delete)
 * - Keeps concerns separated using MVC-like folder structure
 */

session_start();

// Redirect unauthenticated users to login
if (!isset($_SESSION['email'])) {
    header('Location: auth/login.php');
    exit();
}

// Load configuration and logic
require __DIR__ . '/config/database.php';
require __DIR__ . '/functions/student.php';

// Sanitize and initialize routing variables
$action = $_GET['action'] ?? 'list';
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

// Route handling
switch ($action) {
    case 'create':
        require __DIR__ . '/views/create.php';
        break;

    case 'store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require __DIR__ . '/actions/store.php';
        } else {
            header("Location: index.php");
            exit();
        }
        break;

    case 'edit':
        if ($id) {
            require __DIR__ . '/views/edit.php';
        } else {
            $_SESSION['message'] = "Invalid student ID for editing.";
            header("Location: index.php");
            exit();
        }
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
            require __DIR__ . '/actions/update.php';
        } else {
            $_SESSION['message'] = "Invalid request for update.";
            header("Location: index.php");
            exit();
        }
        break;

    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            require __DIR__ . '/actions/delete.php';
        } else {
            $_SESSION['message'] = "Invalid request for deletion.";
            header("Location: index.php");
            exit();
        }
        break;

    case 'view':
        if ($id) {
            require __DIR__ . '/views/view.php';
        } else {
            $_SESSION['message'] = "Invalid student ID for viewing.";
            header("Location: index.php");
            exit();
        }
        break;

    case 'list':
        require __DIR__ . '/views/index.php';
        break;

    default:
        echo '<div class="alert alert-danger">Invalid action specified.</div>';
        break;
}