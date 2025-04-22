<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch all advertisements
$result = $conn->query("SELECT * FROM advertisements ORDER BY startDate DESC");
?>

<?php include '../include/header.php'; ?>

<div class="flex">
    <div class="sidebar" id="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_cars.php">Manage Cars</a>
        <a href="manage_ads.php" class="bg-gray-700">Manage Ads</a>
        <a href="manage_post_limits.php">Post Limits</a>
        <a href="manage_reposts.php">Reposts</a>
        <a href="reports.php">Reports</a>
        <a href="settings.php">Settings</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content flex-1 p-6">
        <h2 class="text-2xl font-bold mb-6">Manage Advertisements</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded">
            <thead>
                <tr>
                    <th class="border px-4 py-2">AdID</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Content</th>
                    <th class="border px-4 py-2">Image</th>
                    <th class="border px-4 py-2">Start Date</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($ad = $result->fetch_assoc()): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $ad['adID']; ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($ad['title']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($ad['content']); ?></td>
                    <td class="border px-4 py-2">
                        <?php if ($ad['imageUrl']): ?>
                            <img src="<?php echo htmlspecialchars($ad['imageUrl']); ?>" alt="Ad Image" class="w-20 h-12 object-cover" />
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td class="border px-4 py-2"><?php echo $ad['startDate']; ?></td>
                    <td class="border px-4 py-2">
                        <a href="edit_ad.php?id=<?php echo $ad['adID']; ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <a href="delete_ad.php?id=<?php echo $ad['adID']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this ad?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../include/footer.php'; ?>
