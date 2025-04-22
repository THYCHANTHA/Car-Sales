<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch all users
$result = $conn->query("SELECT * FROM users ORDER BY date_registered DESC");
?>

<?php include '../include/header.php'; ?>

<div class="flex">
    <div class="sidebar" id="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_users.php" class="bg-gray-700">Manage Users</a>
        <a href="manage_cars.php">Manage Cars</a>
        <a href="manage_ads.php">Manage Ads</a>
        <a href="manage_post_limits.php">Post Limits</a>
        <a href="manage_reposts.php">Reposts</a>
        <a href="reports.php">Reports</a>
        <a href="settings.php">Settings</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content flex-1 p-6">
        <h2 class="text-2xl font-bold mb-6">Manage Users</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded">
            <thead>
                <tr>
                    <th class="border px-4 py-2">UserID</th>
                    <th class="border px-4 py-2">Username</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Phone</th>
                    <th class="border px-4 py-2">Role</th>
                    <th class="border px-4 py-2">Registered</th>
                    <th class="border px-4 py-2">Last Login</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $result->fetch_assoc()): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $user['userID']; ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($user['username']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($user['email']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($user['phoneNumber']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($user['role']); ?></td>
                    <td class="border px-4 py-2"><?php echo $user['date_registered']; ?></td>
                    <td class="border px-4 py-2"><?php echo $user['lastLogin']; ?></td>
                    <td class="border px-4 py-2">
                        <a href="edit_user.php?id=<?php echo $user['userID']; ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <a href="delete_user.php?id=<?php echo $user['userID']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../include/footer.php'; ?>
