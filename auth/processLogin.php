<?php
session_start();
require "../config/dbConn.php";
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "select * from admins where email = '$email' and password = '$password'";

$res = mysqli_query($conn, $sql);
$asc = mysqli_fetch_assoc($res);
$count = is_countable($asc);
if ($count > 0) {
    $_SESSION['email'] = $asc['email'];
    header('location: ../view/addCompany.php');
} else {
    $_SESSION['msg'] = "Invalid Email and password";
    header('location: ../view/login.php');
}

?>