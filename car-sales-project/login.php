<?php
session_start();
include 'config.php';

$message = '';

// Determine language, default to English
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Adjust login logic to handle phone or email login
    $login_input = $conn->real_escape_string($_POST['user']['login']);
    $password = $_POST['user']['password'];

    // Determine if login_input is phone or email
    if (filter_var($login_input, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email = '$login_input'";
    } else {
        // Assume phone number login
        $sql = "SELECT * FROM users WHERE phone = '$login_input'";
    }

    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['userID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header("Location: index.php");
            exit();
        } else {
            $message = ($lang === 'km') ? "ពាក្យសម្ងាត់មិនត្រឹមត្រូវ។" : "Invalid password.";
        }
    } else {
        $message = ($lang === 'km') ? "មិនមានអ្នកប្រើប្រាស់នេះទេ។" : "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo ($lang === 'km') ? 'km' : 'en'; ?>">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo ($lang === 'km') ? 'ចូល - លក់ឡាន' : 'Login - Car Sales'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" rel="stylesheet" />
    <style>
        body { font-family: 'Roboto', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">
            <?php echo ($lang === 'km') ? 'ស្វាគមន៍ការត្រឡប់មកវិញ, ' : 'Welcome back, '; ?>
            <span><?php echo ($lang === 'km') ? 'ចូល' : 'Login'; ?></span>
        </h2>
        <?php if ($message): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form id="login_user" method="POST" action="login.php" class="space-y-4" novalidate>
            <div>
                <label for="user_login" class="block mb-1 font-semibold">
                    <?php echo ($lang === 'km') ? 'លេខទូរសព្ទ / អ៊ីមែល' : 'Phone / Email'; ?>
                </label>
                <input type="tel" id="user_login" name="user[login]" required class="w-full border border-gray-300 rounded px-3 py-2" placeholder="<?php echo ($lang === 'km') ? '+855 91 234 567 ឬ អ៊ីមែល' : '+855 91 234 567 or email@example.com'; ?>" />
            </div>
            <div>
                <label for="user_password" class="block mb-1 font-semibold">
                    <?php echo ($lang === 'km') ? 'ពាក្យសម្ងាត់' : 'Password'; ?>
                </label>
                <input type="password" id="user_password" name="user[password]" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="flex items-center justify-between">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="user[remember_me]" value="1" class="form-checkbox" />
                    <span class="ml-2"><?php echo ($lang === 'km') ? 'ចាំខ្ញុំ' : 'Remember me'; ?></span>
                </label>
                <a href="/km/users/password/new" class="text-blue-600 hover:underline">
                    <?php echo ($lang === 'km') ? 'ភ្លេចលេខសំងាត់?' : 'Forgot password?'; ?>
                </a>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                <?php echo ($lang === 'km') ? 'ចូល' : 'Login'; ?>
            </button>
        </form>
        <p class="mt-4 text-center">
            <?php echo ($lang === 'km') ? 'មិនមានគណនីមែនទេ?' : "Don't have an account?"; ?>
            <a href="user/register.php" class="text-blue-600 hover:underline">
                <?php echo ($lang === 'km') ? 'ចុះឈ្មោះទីនេះ' : 'Register here'; ?>
            </a>
        </p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
        const input = document.querySelector("#user_login");
        window.intlTelInput(input, {
            initialCountry: "<?php echo ($lang === 'km') ? 'kh' : 'us'; ?>",
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
        });
    </script>
</body>
</html>
