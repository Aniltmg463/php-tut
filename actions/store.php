<?php
// Check if the form was submitted using the 'save_student' button
if (isset($_POST['save_student'])) {
    // Retrieve and sanitize input values
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $course = trim($_POST['course']);

    // Prepare the SQL statement to securely insert data
    $stmt = $connection->prepare("INSERT INTO students (name, email, phone, course) VALUES (?, ?, ?, ?)");

    if ($stmt) {
        // Bind the input parameters to the SQL query with type safety
        // 's' indicates string type for all 4 parameters
        $stmt->bind_param("ssss", $name, $email, $phone, $course);

        // Execute the statement
        if ($stmt->execute()) {
            // On success, store a success message in the session
            $_SESSION['message'] = "Student created successfully.";
            $_SESSION['message_type'] = "success";

            // Redirect to the homepage
            header("Location: index.php");
            exit();
        } else {
            // If execution fails, show an error message
            $_SESSION['message'] = "Database execution failed.";
            $_SESSION['message_type'] = "danger";

            // Redirect back to the form
            header("Location: ../views/create.php");
            exit();
        }
    } else {
        // If preparation of SQL statement fails
        $_SESSION['message'] = "Prepared statement failed.";
        $_SESSION['message_type'] = "danger";

        // Redirect back to the form
        header("Location: ../views/create.php");
        exit();
    }
}