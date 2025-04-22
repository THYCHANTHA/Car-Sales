<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$adminID = $_SESSION['admin_id'];
$message = '';

// Fetch admin info
$sql = "SELECT username, email FROM admin_users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $adminID);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password && $password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        if ($password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $update = $conn->prepare("UPDATE admin_users SET email = ?, password = ? WHERE id = ?");
            $update->bind_param("ssi", $email, $hashed_password, $adminID);
        } else {
            $update = $conn->prepare("UPDATE admin_users SET email = ? WHERE id = ?");
            $update->bind_param("si", $email, $adminID);
        }
        if ($update->execute()) {
            $message = "Profile updated successfully.";
        } else {
            $message = "Error updating profile: " . $conn->error;
        }
        $update->close();
    }
}
?>

<?php include '../include/header.php'; ?>

<div class="flex">
    <div class="sidebar" id="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_cars.php">Manage Cars</a>
        <a href="manage_ads.php">Manage Ads</a>
        <a href="manage_post_limits.php">Post Limits</a>
        <a href="manage_reposts.php">Manage Reposts</a>
        <a href="reports.php">Reports</a>
        <a href="settings.php">Settings</a>
        <a href="profile.php" class="bg-gray-700">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content flex-1 p-6 max-w-lg">
        <h2 class="text-2xl font-bold mb-6">Admin Profile</h2>
        <?php if ($message): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="profile.php" class="space-y-4">
            <div>
                <label class="block mb-1 font-semibold">Username</label>
                <input type="text" value="<?php echo htmlspecialchars($admin['username']); ?>" disabled class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-200" />
            </div>
            <div>
                <label for="email" class="block mb-1 font-semibold">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($admin['email']); ?>" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="password" class="block mb-1 font-semibold">New Password</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="confirm_password" class="block mb-1 font-semibold">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Update Profile</button>
        </form>
    </div>
</div>

<?php include '../include/footer.php'; ?>
