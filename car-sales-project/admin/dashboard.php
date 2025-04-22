<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch total users count
$resultUsers = $conn->query("SELECT COUNT(*) AS totalUsers FROM users");
$totalUsers = $resultUsers->fetch_assoc()['totalUsers'];

// Fetch total cars count
$resultCars = $conn->query("SELECT COUNT(*) AS totalCars FROM cars");
$totalCars = $resultCars->fetch_assoc()['totalCars'];

// Fetch total active listings
$resultActiveCars = $conn->query("SELECT COUNT(*) AS activeCars FROM cars WHERE status = 'available'");
$activeCars = $resultActiveCars->fetch_assoc()['activeCars'];

// Fetch total sold cars
$resultSoldCars = $conn->query("SELECT COUNT(*) AS soldCars FROM cars WHERE status = 'sold'");
$soldCars = $resultSoldCars->fetch_assoc()['soldCars'];
?>

<?php include '../include/header.php'; ?>

<h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-lg font-semibold">Total Users</h3>
        <p class="text-3xl font-bold"><?php echo $totalUsers; ?></p>
    </div>
    <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-lg font-semibold">Total Cars</h3>
        <p class="text-3xl font-bold"><?php echo $totalCars; ?></p>
    </div>
    <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-lg font-semibold">Active Listings</h3>
        <p class="text-3xl font-bold"><?php echo $activeCars; ?></p>
    </div>
    <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-lg font-semibold">Sold Cars</h3>
        <p class="text-3xl font-bold"><?php echo $soldCars; ?></p>
    </div>
</div>

<?php include '../include/footer.php'; ?>
