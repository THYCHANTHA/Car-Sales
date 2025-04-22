<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$userID = $_SESSION['user_id'];
$carID = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($carID <= 0) {
    die("Invalid car ID.");
}

// Check if the car belongs to the user
$stmt = $conn->prepare("SELECT * FROM cars WHERE carID = ? AND sellerID = ?");
$stmt->bind_param("ii", $carID, $userID);
$stmt->execute();
$result = $stmt->get_result();
$car = $result->fetch_assoc();

if (!$car) {
    die("Car not found or you do not have permission to repost this car.");
}

// Check repost frequency (e.g., allow repost once every 7 days)
$canRepost = true;
$now = new DateTime();
$lastReposted = $car['lastReposted'] ? new DateTime($car['lastReposted']) : null;
if ($lastReposted) {
    $diff = $now->diff($lastReposted);
    if ($diff->days < 7) {
        $canRepost = false;
    }
}

if (!$canRepost) {
    die("You can only repost this car once every 7 days.");
}

// Update dateListed and lastReposted
$update = $conn->prepare("UPDATE cars SET dateListed = NOW(), lastReposted = NOW() WHERE carID = ? AND sellerID = ?");
$update->bind_param("ii", $carID, $userID);
if ($update->execute()) {
    // Insert into repost_history
    $insert = $conn->prepare("INSERT INTO repost_history (carID, userID, repostDate) VALUES (?, ?, NOW())");
    $insert->bind_param("ii", $carID, $userID);
    $insert->execute();
    $insert->close();

    header("Location: index.php?message=Car+reposted+successfully");
    exit();
} else {
    die("Error reposting car: " . $conn->error);
}
?>
