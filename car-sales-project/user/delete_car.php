<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'seller') {
    header("Location: ../login.php");
    exit();
}

$carID = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($carID <= 0) {
    die("Invalid car ID.");
}

// Delete car images first
$stmtImages = $conn->prepare("DELETE FROM cars_images WHERE carID = ? AND carID IN (SELECT carID FROM cars WHERE sellerID = ?)");
$stmtImages->bind_param("ii", $carID, $_SESSION['user_id']);
$stmtImages->execute();
$stmtImages->close();

// Delete car listing
$stmt = $conn->prepare("DELETE FROM cars WHERE carID = ? AND sellerID = ?");
$stmt->bind_param("ii", $carID, $_SESSION['user_id']);
if ($stmt->execute()) {
    $stmt->close();
    header("Location: index.php?message=Car+deleted+successfully");
    exit();
} else {
    $stmt->close();
    die("Error deleting car: " . $conn->error);
}
?>
