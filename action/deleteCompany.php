<?php
require '../config/dbConn.php';
$id = $_GET['id'];
$sql = "delete from companies where id = $id";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("Location: ../view/displayCompany.php");
    exit;
} else {
    echo "cannot delete the company";
}
