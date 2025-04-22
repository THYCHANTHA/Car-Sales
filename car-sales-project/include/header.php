<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Car Sales</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <style>
        body { font-family: 'Roboto', sans-serif; }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100" x-data="{ loading: false }" :class="{ 'overflow-hidden': loading }">
    <div x-show="loading" class="fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center z-50">
        <svg class="animate-spin h-12 w-12 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
        </svg>
    </div>
    <header class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800"><a href="/car-sales-project/index.php">Car Sales</a></h1>
            <nav class="flex items-center space-x-4">
                <a href="/car-sales-project/index.php" class="text-gray-700 hover:text-blue-600 px-3">Home</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="/car-sales-project/user/index.php" class="text-gray-700 hover:text-blue-600 px-3">Dashboard</a>
                    <a href="/car-sales-project/user/profile.php" class="text-gray-700 hover:text-blue-600 px-3">Profile</a>
                    <a href="/car-sales-project/user/favorites.php" class="text-gray-700 hover:text-blue-600 px-3">Favorites</a>
                    <a href="/car-sales-project/logout.php" class="text-gray-700 hover:text-blue-600 px-3">Logout</a>
                <?php else: ?>
                    <a href="/car-sales-project/login.php" class="text-gray-700 hover:text-blue-600 px-3">Login</a>
                    <a href="/car-sales-project/user/register.php" class="text-gray-700 hover:text-blue-600 px-3">Register</a>
                <?php endif; ?>
                <a href="/car-sales-project/contact.php" class="text-gray-700 hover:text-blue-600 px-3">Contact</a>

                <!-- Language Dropdown -->
                <div class="relative inline-block text-left" x-data="{ open: false }">
                    <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-3 py-1 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        <span class="lang-sm lang-lbl" lang="km" aria-label="Khmer"></span>
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-28 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <a href="?lang=km" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">ខ្មែរ</a>
                        <a href="?lang=en" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1">English</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4" @click="loading = true" @load.window="loading = false">
