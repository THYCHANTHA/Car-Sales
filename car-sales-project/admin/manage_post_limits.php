<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Handle form submission to update post limits
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = intval($_POST['userID']);
    $maxListings = intval($_POST['maxListings']);

    // Check if record exists
    $check = $conn->prepare("SELECT * FROM user_post_limits WHERE userID = ?");
    $check->bind_param("i", $userID);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $update = $conn->prepare("UPDATE user_post_limits SET maxListings = ? WHERE userID = ?");
        $update->bind_param("ii", $maxListings, $userID);
        $update->execute();
        $update->close();
    } else {
        $insert = $conn->prepare("INSERT INTO user_post_limits (userID, maxListings, currentListings) VALUES (?, ?, 0)");
        $insert->bind_param("ii", $userID, $maxListings);
        $insert->execute();
        $insert->close();
    }
    $check->close();
}

// Fetch users and their post limits
$sql = "SELECT u.userID, u.username, upl.maxListings, upl.currentListings
        FROM users u LEFT JOIN user_post_limits upl ON u.userID = upl.userID
        ORDER BY u.userID";
$result = $conn->query($sql);
?>

<?php include '../include/header.php'; ?>

<div class="flex">
    <div class="sidebar" id="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_cars.php">Manage Cars</a>
        <a href="manage_ads.php">Manage Ads</a>
        <a href="manage_post_limits.php" class="bg-gray-700">Post Limits</a>
        <a href="manage_reposts.php">Reposts</a>
        <a href="reports.php">Reports</a>
        <a href="settings.php">Settings</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content flex-1 p-6">
        <h2 class="text-2xl font-bold mb-6">Manage User Post Limits</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded mb-6">
            <thead>
                <tr>
                    <th class="border px-4 py-2">UserID</th>
                    <th class="border px-4 py-2">Username</th>
                    <th class="border px-4 py-2">Max Listings</th>
                    <th class="border px-4 py-2">Current Listings</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $row['userID']; ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($row['username']); ?></td>
                    <td class="border px-4 py-2"><?php echo $row['maxListings'] ?? 'Not Set'; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['currentListings'] ?? 0; ?></td>
                    <td class="border px-4 py-2">
                        <form method="POST" action="manage_post_limits.php" class="flex space-x-2">
                            <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>" />
                            <input type="number" name="maxListings" min="0" required class="border border-gray-300 rounded px-2 py-1 w-20" placeholder="Max" />
                            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Update</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../include/footer.php'; ?>
