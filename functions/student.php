<?php
/**
 * Key Concepts for Students:
 * Code organization: Functions should be well-named, small, and reusable.
 * Prepared statements: Always use them when working with user input.
 * PHPDoc comments: Helps in documentation and understanding purpose of each function.
 * Parameter typing: Properly binding data types (i for integer) for safety.
 */

/**
 * Fetch all student records from the database.
 *
 * @param mysqli $con The database connection.
 * @return mysqli_result The result set containing all students.
 */
function get_all_students($con): mysqli_result
{
    // Simple SQL query to retrieve all rows from the students table
    $query = "SELECT * FROM students";
    return $con->query($query);
}

/**
 * Fetch a single student record by its ID using a prepared statement.
 *
 * @param mysqli $con The database connection.
 * @param int $id The student ID to fetch.
 * @return mysqli_result The result set containing the matched student.
 */
function get_student_by_id($con, $id): mysqli_result
{
    // Use a prepared statement to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->bind_param("i", $id); // 'i' means the parameter is an integer
    $stmt->execute();
    
    // Return the result set from the executed statement
    return $stmt->get_result();
}
