<?php
session_start();
include '../config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: index.php");
            exit();
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "Admin user not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login - Car Sales</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Roboto', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Admin Login</h2>
        <?php if ($message): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="login.php" class="space-y-4">
            <div>
                <label for="username" class="block mb-1 font-semibold">Username</label>
                <input type="text" id="username" name="username" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="password" class="block mb-1 font-semibold">Password</label>
                <input type="password" id="password" name="password" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Login</button>
        </form>
    </div>
</body>
</html>
