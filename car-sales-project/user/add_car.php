<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'seller') {
    header("Location: ../login.php");
    exit();
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sellerID = $_SESSION['user_id'];
    $makeID = intval($_POST['makeID']);
    $model = $conn->real_escape_string($_POST['model']);
    $year = intval($_POST['year']);
    $mileage = intval($_POST['mileage']);
    $price = floatval($_POST['price']);
    $description = $conn->real_escape_string($_POST['description']);
    $location = $conn->real_escape_string($_POST['location']);
    $status = 'available';

    $sql = "INSERT INTO cars (sellerID, makeID, model, year, mileage, price, description, location, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisiidsss", $sellerID, $makeID, $model, $year, $mileage, $price, $description, $location, $status);

    if ($stmt->execute()) {
        $message = "Car listing added successfully.";
    } else {
        $message = "Error: " . $conn->error;
    }
    $stmt->close();
}

// Fetch car makes for dropdown
$makes = [];
$result = $conn->query("SELECT DISTINCT makeID, makeName FROM cars_models");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $makes[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Car - Car Sales</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Roboto', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Add New Car Listing</h2>
        <?php if ($message): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="add_car.php" class="space-y-4">
            <div>
                <label for="makeID" class="block mb-1 font-semibold">Make</label>
                <select id="makeID" name="makeID" required class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="">Select Make</option>
                    <?php foreach ($makes as $make): ?>
                        <option value="<?php echo $make['makeID']; ?>"><?php echo htmlspecialchars($make['makeName']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="model" class="block mb-1 font-semibold">Model</label>
                <input type="text" id="model" name="model" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="year" class="block mb-1 font-semibold">Year</label>
                <input type="number" id="year" name="year" required min="1900" max="<?php echo date('Y'); ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="mileage" class="block mb-1 font-semibold">Mileage</label>
                <input type="number" id="mileage" name="mileage" required min="0" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="price" class="block mb-1 font-semibold">Price</label>
                <input type="number" step="0.01" id="price" name="price" required min="0" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="location" class="block mb-1 font-semibold">Location</label>
                <input type="text" id="location" name="location" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="description" class="block mb-1 font-semibold">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Add Car</button>
        </form>
    </div>
</body>
</html>
