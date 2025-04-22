<?php
include 'config.php';

$carID = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($carID <= 0) {
    die("Invalid car ID.");
}

// Fetch car details
$stmt = $conn->prepare("SELECT c.*, u.username AS sellerName FROM cars c JOIN users u ON c.sellerID = u.userID WHERE c.carID = ?");
$stmt->bind_param("i", $carID);
$stmt->execute();
$result = $stmt->get_result();
$car = $result->fetch_assoc();

if (!$car) {
    die("Car not found.");
}

// Fetch car images
$stmtImages = $conn->prepare("SELECT imageUrl FROM cars_images WHERE carID = ?");
$stmtImages->bind_param("i", $carID);
$stmtImages->execute();
$resultImages = $stmtImages->get_result();
$images = [];
while ($row = $resultImages->fetch_assoc()) {
    $images[] = $row['imageUrl'];
}
?>

<?php include 'include/header.php'; ?>

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($car['makeID'] . ' ' . $car['model']); ?></h2>
    <p class="text-gray-600 mb-2">Seller: <?php echo htmlspecialchars($car['sellerName']); ?></p>
    <p class="text-gray-600 mb-2">Year: <?php echo htmlspecialchars($car['year']); ?></p>
    <p class="text-gray-600 mb-2">Mileage: <?php echo htmlspecialchars($car['mileage']); ?> km</p>
    <p class="text-blue-600 font-semibold text-xl mb-4">$<?php echo number_format($car['price'], 2); ?></p>
    <p class="mb-4"><?php echo nl2br(htmlspecialchars($car['description'])); ?></p>

    <?php if (count($images) > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php foreach ($images as $img): ?>
                <img src="<?php echo htmlspecialchars($img); ?>" alt="Car Image" class="rounded shadow object-cover w-full h-48" />
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No images available for this car.</p>
    <?php endif; ?>
</div>

<?php include 'include/footer.php'; ?>
