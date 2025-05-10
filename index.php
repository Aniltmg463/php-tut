<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: auth/login.php');
    exit();
}

require 'config/db_connect.php';

$result = $conn->query("SELECT * FROM students");
$students = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students' Information</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Students</h1>
        <a href="Action/add.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Student</a>
        <a href="auth/logout.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">LogOut</a>

        <!-- <table class="w-full bg-white rounded shadow"> -->
        <table class="w-full bg-white rounded shadow table-auto border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 text-left">ID</th>
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2 text-left">Email</th>
                    <th class="p-2 text-left">Image</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td class="p-2"><?php echo $student['id']; ?></td>
                    <td class="p-2"><?php echo $student['name']; ?></td>
                    <td class="p-2"><?php echo $student['email']; ?></td>

                    <td><img src="upload-images/<?= $student['image'] ?>" width="60" height="60"
                            style="object-fit: cover;" />
                    </td>

                    <td class="p-2">
                        <a href="Action/edit.php?id=<?php echo $student['id']; ?>"
                            class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <a href="Action/delete.php?id=<?php echo $student['id']; ?>"
                            class="bg-red-500 text-white px-2 py-1 rounded"
                            onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>