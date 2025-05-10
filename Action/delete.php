<?php
require_once '../config/db_connect.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: ../index.php");
exit;
?>