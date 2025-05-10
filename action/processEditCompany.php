<?php
include '../view/component/header.php';
require '../config/dbConn.php';
$id = $_GET['id'];
if($id){
    $sql = "select * from companies where id = $id";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $address = $row['address'];
        $contact = $row['contact'];
        $email = $row['email'];
    } else {
        echo "<script>
        alert('Company with ID: $id is not found.');
         window.location.href='displayCompany.php';
         </script>";
    }
}else{
    echo "<script>
    alert('No Data to be edited');
     window.location.href='displayCompany.php';
     </script>";
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $query = "UPDATE companies SET name='$name',address='$address',contact='$contact',email='$email' WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("location: displayCompany.php");
    } else {
        echo "data cannot be update";
    }
}
?>