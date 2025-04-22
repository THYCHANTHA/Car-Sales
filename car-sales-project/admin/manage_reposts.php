<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch repost history with user and car info
$sql = "SELECT r.repostID, r.repostDate, u.username, c.model, c.carID
        FROM repost_history r
        JOIN users u ON r.userID = u.userID
        JOIN cars c ON r.carID = c.carID
        ORDER BY r.repostDate DESC";
$result = $conn->query($sql);
?>

<?php include '../include/header.php'; ?>

<div class="flex">
    <div class="sidebar" id="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_cars.php">Manage Cars</a>
        <a href="manage_ads.php">Manage Ads</a>
        <a href="manage_post_limits.php">Post Limits</a>
        <a href="manage_reposts.php" class="bg-gray-700">Reposts</a>
        <a href="reports.php">Reports</a>
        <a href="settings.php">Settings</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content flex-1 p-6">
        <h2 class="text-2xl font-bold mb-6">Manage Reposts</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded">
            <thead>
                <tr>
                    <th class="border px-4 py-2">RepostID</th>
                    <th class="border px-4 py-2">User</th>
                    <th class="border px-4 py-2">Car Model</th>
                    <th class="border px-4 py-2">Repost Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $row['repostID']; ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($row['username']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($row['model']); ?></td>
                    <td class="border px-4 py-2"><?php echo $row['repostDate']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../include/footer.php'; ?>
