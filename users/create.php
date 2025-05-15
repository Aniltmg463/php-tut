<?php
require_once __DIR__ . '/../core/auth.php';

if (!isLoggedIn()) {
    $_SESSION['error'] = "You must be logged in to access this page";
    redirectToLogin();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start p-6">

    <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-6 mt-10">
        <h1 class="text-3xl font-bold text-blue-600 mb-6 text-center">➕ Create New User</h1>

        <form action="actions/store.php" method="POST" class="space-y-5">
            <div>
                <label class="block text-gray-700 font-medium mb-1">Name:</label>
                <input type="text" name="name" required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Email:</label>
                <input type="email" name="email" required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Password:</label>
                <input type="password" name="password" required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex justify-between items-center">
                <a href="index.php" class="text-gray-600 hover:text-blue-600 underline">← Back to Users</a>
                <input type="submit" value="Create User"
                    class="bg-green-500 text-white px-5 py-2 rounded hover:bg-green-600 cursor-pointer">
            </div>
        </form>
    </div>

</body>

</html>