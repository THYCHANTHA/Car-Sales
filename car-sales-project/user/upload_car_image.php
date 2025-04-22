<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$userID = $_SESSION['user_id'];
$carID = isset($_POST['carID']) ? intval($_POST['carID']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['carImage']) && $carID > 0) {
    $targetDir = '../user/images/';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $fileName = basename($_FILES['carImage']['name']);
    $targetFilePath = $targetDir . uniqid() . '_' . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Allow certain file formats
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($fileType, $allowedTypes)) {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

    if (move_uploaded_file($_FILES['carImage']['tmp_name'], $targetFilePath)) {
        // Save image URL to database
        $imageUrl = 'user/images/' . basename($targetFilePath);
        $stmt = $conn->prepare("INSERT INTO cars_images (carID, imageUrl) VALUES (?, ?)");
        $stmt->bind_param("is", $carID, $imageUrl);
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: edit_car.php?id=$carID&message=Image+uploaded+successfully");
            exit();
        } else {
            die("Database error: " . $conn->error);
        }
    } else {
        die("Sorry, there was an error uploading your file.");
    }
} else {
    die("Invalid request.");
}
?>
