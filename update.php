<?php
include 'connect.php';

$id = $_GET['updateid'];
$sql = "select * from `students` where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

//submit the form
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "update `students` set id=$id, name='$name', email='$email', mobile='$mobile', password='$password' where id=$id";
    if ($conn->query($sql) === TRUE) {
        // echo "Data Updated successfully";
        header("Location: display.php");


        /* 
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Data inserted successfully";
        } else {
           die(mysqli_error($conn));
        } */
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <h1>Student Info</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>
<div class="container my-5">
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter your Name" name="name" autocomplete="off"
                value="<?php echo $name ?>">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Enter your Email" name="email" autocomplete="off"
                value="<?php echo $email ?>">
        </div>
        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" class="form-control" placeholder="Enter your Mobile Number" name="mobile"
                autocomplete="off" value="<?php echo $mobile ?>">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter your Password" name="password"
                autocomplete="off" value="<?php echo $password ?>">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>

</div>

</html>