<?php
session_start(); // Start the session to use session variables
require_once 'Users.php'; // if you placed the class in a separate file

// Create object
$user = new Users();

if ($_GET['id']) {
    // echo "Yes edit";
    // die();
    $id = $_GET['id'];

    $editData = $user->getUserById($id);
    /* echo "<pre>";
    print_r($editData);
    die; */

    if (!$editData) {
        die("User not found!");
    }

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $updated = $user->updateUser($name, $email, $id);

        if ($updated) {
            $_SESSION['msg'] = 'Data updated successfully';
            header("Location: index.php");
            exit();
        } else {
            echo "Update failed!";
        }
    }
} else {
    die("Invalid ID.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <h3 class="text-center fw-bold mb-4">Edit User</h3>

                        <?php if (isset($_SESSION['msg'])): ?>
                        <p class="text-success text-center mb-4">
                            <?php
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']); // Clear message after displaying
                                ?>
                        </p>
                        <?php endif; ?>

                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control" value="<?= $editData['name'] ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" value="<?= $editData['email'] ?>"
                                    required>
                            </div>

                            <div class="text-center">
                                <button type="submit" name="update" class="btn btn-success">Update</button>
                                <a href="index.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
