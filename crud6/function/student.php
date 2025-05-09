<?php
require_once __DIR__ . '/../config/connect.php';

function getAllStudents()
{
    global $conn;
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
    $students = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
    }
    return $students;
}