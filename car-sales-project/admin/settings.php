<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$message = '';

// Example: Update site settings (placeholder)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process settings update here
    $message = "Settings updated successfully.";
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
        <a href="settings.php" class="bg-gray-700">Settings</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content flex-1 p-6">
        <h2 class="text-2xl font-bold mb-6">Site Settings</h2>
        <?php if ($message): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="settings.php" class="space-y-4 max-w-lg">
            <div>
                <label for="siteName" class="block mb-1 font-semibold">Site Name</label>
                <input type="text" id="siteName" name="siteName" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Car Sales Website" />
            </div>
            <div>
                <label for="adminEmail" class="block mb-1 font-semibold">Admin Email</label>
                <input type="email" id="adminEmail" name="adminEmail" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="admin@example.com" />
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Save Settings</button>
        </form>
    </div>
</div>

<?php include '../include/footer.php'; ?>
