<?php
require_once '../config/db_connect.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$result = $conn->query("SELECT * FROM students WHERE id = $id");
$student = $result->fetch_assoc();
if (!$student) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $file_name = $student['image']; // default to current image

    // Check if file is uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $file_name = $_FILES['file']['name'];
        $file_temp = $_FILES['file']['tmp_name'];

        if (move_uploaded_file($file_temp, "../upload-images/" . $file_name)) {
            echo "<div class='alert alert-success'>File uploaded successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>File upload failed.</div>";
        }
    }


    $stmt = $conn->prepare("UPDATE students SET name = ?, email = ?, image=? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $email, $file_name, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Edit Student</h1>
        <form method="POST" class="bg-white p-4 rounded shadow" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" value="<?php echo $student['name']; ?>" class="w-full p-2 border rounded"
                    required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="<?php echo $student['email']; ?>"
                    class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Upload Image</label>
                <input type="file" name="file" class="w-full p-2 border rounded">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
            <a href="../index.php" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
        </form>
    </div>
</body>

</html>