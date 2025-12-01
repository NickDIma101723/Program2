<?php
require_once 'session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anime</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto p-6">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Anime Item</h1>

        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form action="agenda_aanpassen_verwerk.php" method="POST" class="space-y-4">
            <input type="hidden" name="ID" value="<?= ($record['ID']) ?>">

            <div>
                <label for="Name" class="block text-sm font-medium text-gray-700 mb-1">Name:</label>
                <input type="text" id="Name" name="Name"
                       value="<?=($record['Name']) ?>"
                       required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="Character" class="block text-sm font-medium text-gray-700 mb-1">Character:</label>
                <input type="text" id="Character" name="Character"
                       value="<?=($record['Character']) ?>"
                       required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="Rating" class="block text-sm font-medium text-gray-700 mb-1">Rating:</label>
                    <input type="number" id="Rating" name="Rating" min="1" max="10"
                           value="<?=($record['Rating']) ?>"
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="Episodes" class="block text-sm font-medium text-gray-700 mb-1">Episodes:</label>
                    <input type="number" id="Episodes" name="Episodes" min="1"
                           value="<?=($record['Episodes']) ?>"
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label for="releaseDate" class="block text-sm font-medium text-gray-700 mb-1">Release Date:</label>
                    <input type="date" id="releaseDate" name="releaseDate" value="<?= $releaseDate ?>" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="endAir" class="block text-sm font-medium text-gray-700 mb-1">End Air:</label>
                    <input type="date" id="endAir" name="endAir" value="<?= $endAir ?>" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div>
                <label for="Genre" class="block text-sm font-medium text-gray-700 mb-1">Genre:</label>
                <textarea id="Genre" name="Genre"
                          required
                          rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"><?=($record['Genre']) ?></textarea>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Update Anime
                </button>
                <a href="index.php"
                   class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 transition inline-block">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>