<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Example report: Sales by month
$sql = "SELECT DATE_FORMAT(dateListed, '%Y-%m') AS month, COUNT(*) AS totalSales
        FROM cars
        WHERE status = 'sold'
        GROUP BY month
        ORDER BY month DESC";
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
        <a href="manage_reposts.php">Reposts</a>
        <a href="reports.php" class="bg-gray-700">Reports</a>
        <a href="settings.php">Settings</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content flex-1 p-6">
        <h2 class="text-2xl font-bold mb-6">Sales Reports</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Month</th>
                    <th class="border px-4 py-2">Total Sales</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($row['month']); ?></td>
                    <td class="border px-4 py-2"><?php echo $row['totalSales']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../include/footer.php'; ?>
