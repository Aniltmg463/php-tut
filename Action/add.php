<?php
require_once '../config/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['file']['name'];
        $file_temp = $_FILES['file']['tmp_name'];
        $upload_path = "../upload-images/" . basename($file_name);

        if (move_uploaded_file($file_temp, $upload_path)) {
            echo "<div class='alert alert-success'>File uploaded successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>File upload failed.</div>";
        }

        $stmt = $conn->prepare("INSERT INTO students (name, email, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $file_name);
        $stmt->execute();
        $stmt->close();

        // Uncomment this in production
        header("Location: ../index.php");
        exit;
    } else {
        echo "<div class='alert alert-warning'>No file uploaded or upload error occurred.</div>";
    }

    /* echo "<pre>";
    print_r($_FILES);
    echo "</pre>"; */
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Add Student</h1>
        <form method="POST" class="bg-white p-4 rounded shadow" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Upload Image</label>
                <input type="file" name="file" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
            <a href="../index.php" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
        </form>
    </div>
</body>

</html>