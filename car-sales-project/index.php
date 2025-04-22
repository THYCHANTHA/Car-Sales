<?php
include 'config.php';

// Fetch cars from database
$sql = "SELECT * FROM cars ORDER BY dateListed DESC";
$result = $conn->query($sql);

include 'include/header.php';

include 'include/top_ten.php';
?>

    <h2 class="text-xl font-semibold mb-4">Available Cars</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($car = $result->fetch_assoc()): ?>
                <div class="bg-white rounded shadow p-4">
                    <img src="<?php echo htmlspecialchars($car['imageUrl']); ?>" alt="<?php echo htmlspecialchars($car['makeID'] . ' ' . $car['model']); ?>" class="w-full h-48 object-cover rounded mb-4" />
                    <h3 class="text-lg font-bold"><?php echo htmlspecialchars($car['makeID'] . ' ' . $car['model']); ?></h3>
                    <p class="text-gray-600"><?php echo htmlspecialchars($car['year']); ?></p>
                    <p class="text-blue-600 font-semibold">$<?php echo number_format($car['price'], 2); ?></p>
                    <p class="mt-2 text-gray-700"><?php echo htmlspecialchars($car['description']); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No cars available at the moment.</p>
        <?php endif; ?>
    </div>

<?php include 'include/footer.php'; ?>
