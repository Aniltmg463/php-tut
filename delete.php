<?php
require_once 'Users.php'; // if you placed the class in a separate file

// Create object
$user = new Users();

// Fetch users
$result = $user->fetchUsers();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleted = $user->deleteUser($id);

    if ($deleted) {
        session_start();
        $_SESSION['msg'] = 'Data deleted successfully';
        header("Location: index.php");
        exit();
    } else {
        echo "Delete failed!";
    }
} else {
    die("Invalid ID.");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row["id"]}</td>
                        <td>{$row["name"]}</td>
                        <td>{$row["email"]}</td>
                        <td><a href='edit.php?id={$row["id"]}'>Edit</a></td>
                        <td><a href='delete.php?id={$row["id"]}'>Delete</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }
        ?>
    </table>
</body>

</html>