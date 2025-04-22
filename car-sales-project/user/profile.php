<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$userID = $_SESSION['user_id'];
$message = '';

// Fetch user profile
$sql = "SELECT u.username, u.email, u.phoneNumber, u.profilePicture, p.fullName, p.address, p.city, p.country, p.bio
        FROM users u LEFT JOIN users_profile p ON u.userID = p.userID WHERE u.userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
    $fullName = $conn->real_escape_string($_POST['fullName']);
    $address = $conn->real_escape_string($_POST['address']);
    $city = $conn->real_escape_string($_POST['city']);
    $country = $conn->real_escape_string($_POST['country']);
    $bio = $conn->real_escape_string($_POST['bio']);

    // Update users table
    $updateUser = $conn->prepare("UPDATE users SET phoneNumber = ? WHERE userID = ?");
    $updateUser->bind_param("si", $phoneNumber, $userID);
    $updateUser->execute();

    // Check if profile exists
    $checkProfile = $conn->prepare("SELECT profileID FROM users_profile WHERE userID = ?");
    $checkProfile->bind_param("i", $userID);
    $checkProfile->execute();
    $checkProfile->store_result();

    if ($checkProfile->num_rows > 0) {
        // Update profile
        $updateProfile = $conn->prepare("UPDATE users_profile SET fullName = ?, address = ?, city = ?, country = ?, bio = ? WHERE userID = ?");
        $updateProfile->bind_param("sssssi", $fullName, $address, $city, $country, $bio, $userID);
        $updateProfile->execute();
    } else {
        // Insert profile
        $insertProfile = $conn->prepare("INSERT INTO users_profile (userID, fullName, address, city, country, bio) VALUES (?, ?, ?, ?, ?, ?)");
        $insertProfile->bind_param("isssss", $userID, $fullName, $address, $city, $country, $bio);
        $insertProfile->execute();
    }

    $message = "Profile updated successfully.";

    // Refresh user data
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile - Car Sales</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Roboto', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">My Profile</h2>
        <?php if ($message): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="profile.php" class="space-y-4">
            <div>
                <label class="block mb-1 font-semibold">Username</label>
                <input type="text" value="<?php echo htmlspecialchars($user['username']); ?>" disabled class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-200" />
            </div>
            <div>
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-200" />
            </div>
            <div>
                <label for="phoneNumber" class="block mb-1 font-semibold">Phone Number</label>
                <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo htmlspecialchars($user['phoneNumber']); ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="fullName" class="block mb-1 font-semibold">Full Name</label>
                <input type="text" id="fullName" name="fullName" value="<?php echo htmlspecialchars($user['fullName']); ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="address" class="block mb-1 font-semibold">Address</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="city" class="block mb-1 font-semibold">City</label>
                <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($user['city']); ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="country" class="block mb-1 font-semibold">Country</label>
                <input type="text" id="country" name="country" value="<?php echo htmlspecialchars($user['country']); ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="bio" class="block mb-1 font-semibold">Bio</label>
                <textarea id="bio" name="bio" rows="4" class="w-full border border-gray-300 rounded px-3 py-2"><?php echo htmlspecialchars($user['bio']); ?></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Update Profile</button>
        </form>
    </div>
</body>
</html>
