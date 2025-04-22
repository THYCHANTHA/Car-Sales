<?php
session_start();
include 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $messageContent = $conn->real_escape_string($_POST['message']);

    // For simplicity, just send an email to admin (replace with actual email)
    $to = "admin@carsales.com";
    $headers = "From: $email\r\nReply-To: $email\r\n";
    $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$messageContent";

    if (mail($to, $subject, $body, $headers)) {
        $message = "Your message has been sent successfully.";
    } else {
        $message = "Failed to send your message. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Us - Car Sales</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Roboto', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Contact Us</h2>
        <?php if ($message): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="contact.php" class="space-y-4">
            <div>
                <label for="name" class="block mb-1 font-semibold">Name</label>
                <input type="text" id="name" name="name" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="email" class="block mb-1 font-semibold">Email</label>
                <input type="email" id="email" name="email" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="subject" class="block mb-1 font-semibold">Subject</label>
                <input type="text" id="subject" name="subject" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="message" class="block mb-1 font-semibold">Message</label>
                <textarea id="message" name="message" rows="5" required class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Send Message</button>
        </form>
    </div>
</body>
</html>
