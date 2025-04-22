<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch all cars with seller info
$sql = "SELECT c.*, u.username AS sellerName FROM cars c JOIN users u ON c.sellerID = u.userID ORDER BY c.dateListed DESC";
$result = $conn->query($sql);
?>

<?php include '../include/header.php'; ?>

<div class="flex">
    <div class="sidebar" id="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_cars.php" class="bg-gray-700">Manage Cars</a>
        <a href="manage_ads.php">Manage Ads</a>
        <a href="manage_post_limits.php">Post Limits</a>
        <a href="manage_reposts.php">Reposts</a>
        <a href="reports.php">Reports</a>
        <a href="settings.php">Settings</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content flex-1 p-6">
        <h2 class="text-2xl font-bold mb-6">Manage Cars</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded">
            <thead>
                <tr>
                    <th class="border px-4 py-2">CarID</th>
                    <th class="border px-4 py-2">Seller</th>
                    <th class="border px-4 py-2">MakeID</th>
                    <th class="border px-4 py-2">Model</th>
                    <th class="border px-4 py-2">Year</th>
                    <th class="border px-4 py-2">Mileage</th>
                    <th class="border px-4 py-2">Price</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Date Listed</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($car = $result->fetch_assoc()): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $car['carID']; ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($car['sellerName']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($car['makeID']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($car['model']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($car['year']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($car['mileage']); ?></td>
                    <td class="border px-4 py-2">$<?php echo number_format($car['price'], 2); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($car['status']); ?></td>
                    <td class="border px-4 py-2"><?php echo $car['dateListed']; ?></td>
                    <td class="border px-4 py-2">
                        <a href="edit_car.php?id=<?php echo $car['carID']; ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <a href="delete_car.php?id=<?php echo $car['carID']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this car?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../include/footer.php'; ?>
