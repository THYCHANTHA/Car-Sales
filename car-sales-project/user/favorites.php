<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$userID = $_SESSION['user_id'];

// Handle add to favorites
if (isset($_GET['add'])) {
    $carID = intval($_GET['add']);
    $stmt = $conn->prepare("INSERT IGNORE INTO favorites (userID, carID) VALUES (?, ?)");
    $stmt->bind_param("ii", $userID, $carID);
    $stmt->execute();
    $stmt->close();
    header("Location: favorites.php");
    exit();
}

// Handle remove from favorites
if (isset($_GET['remove'])) {
    $carID = intval($_GET['remove']);
    $stmt = $conn->prepare("DELETE FROM favorites WHERE userID = ? AND carID = ?");
    $stmt->bind_param("ii", $userID, $carID);
    $stmt->execute();
    $stmt->close();
    header("Location: favorites.php");
    exit();
}

// Fetch favorite cars
$sql = "SELECT c.* FROM cars c JOIN favorites f ON c.carID = f.carID WHERE f.userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Favorites - Car Sales</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Roboto', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">My Favorite Cars</h2>
        <?php if ($result && $result->num_rows > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php while ($car = $result->fetch_assoc()): ?>
                    <div class="bg-gray-50 p-4 rounded shadow">
                        <h3 class="text-lg font-semibold"><?php echo htmlspecialchars($car['makeID'] . ' ' . $car['model']); ?></h3>
                        <p>Year: <?php echo htmlspecialchars($car['year']); ?></p>
                        <p>Price: $<?php echo number_format($car['price'], 2); ?></p>
                        <a href="favorites.php?remove=<?php echo $car['carID']; ?>" class="text-red-600 hover:underline">Remove</a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>You have no favorite cars yet.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$stmt->close();
?>
