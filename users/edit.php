<?php
require_once __DIR__ . '/../helpers/user.php';
require_once __DIR__ . '/../core/auth.php';

if (!isLoggedIn()) {
    $_SESSION['error'] = "You must be logged in to access this page";
    redirectToLogin();
}

$id = $_GET['id'] ?? null;
if (!$id) {
    die("User ID is missing.");
}

$user = getUserById($id);
if (!$user) {
    die("User not found.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start p-6">

    <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-6 mt-10">
        <h1 class="text-3xl font-bold text-blue-600 mb-6 text-center">✏️ Edit User</h1>

        <form action="actions/update.php" method="POST" class="space-y-5">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">

            <div>
                <label class="block text-gray-700 font-medium mb-1">Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Password:</label>
                <input type="password" name="password"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Leave blank to keep current password">
            </div>

            <div class="flex justify-between items-center">
                <a href="index.php" class="text-gray-600 hover:text-blue-600 underline">← Back to Users</a>
                <input type="submit" value="Update User"
                    class="bg-blue-500 text-white px-5 py-2 rounded hover:bg-blue-600 cursor-pointer">
            </div>
        </form>
    </div>

</body>

</html>