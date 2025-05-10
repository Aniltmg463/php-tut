<?php
$conn = mysqli_connect("localhost", "root", "", "ecommerce1");
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
?>