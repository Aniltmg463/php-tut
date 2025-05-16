<?php
include '../config/connect.php';

if (isset($_GET['updateid']) && is_numeric($_GET['updateid'])) {
    $id = $_GET['updateid'];
    $stmt = $conn->prepare("SELECT * FROM course WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('No record found.'); window.location.href='../index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid ID.'); window.location.href='../index.php';</script>";
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h2>Update Student Info</h2>
        <form action="action/update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3"><label>Name</label><input type="text" name="name" value="<?php echo $row['name']; ?>"
                    class="form-control"></div>
            <div class="mb-3"><label>Duration</label><input type="text" name="duration"
                    value="<?php echo $row['duration']; ?>" class="form-control"></div>


            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>