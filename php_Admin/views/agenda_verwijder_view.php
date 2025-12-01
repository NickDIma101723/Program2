<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Anime - Confirmation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Delete Confirmation</h1>
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <p class="text-lg text-gray-700 mb-4">Are you sure you want to delete this anime?</p>

        <div class="mb-4">
            <div class="text-lg mb-2"><strong class="text-gray-700">Name:</strong> <span class="text-gray-900"><?= htmlspecialchars($result['Name']) ?></span></div>
            <div class="text-lg mb-2"><strong class="text-gray-700">Rating:</strong> <span class="text-gray-900"><?= htmlspecialchars($result['Rating']) ?></span></div>
            <div class="text-lg mb-2"><strong class="text-gray-700">Character:</strong> <span class="text-gray-900"><?= htmlspecialchars($result['Character']) ?></span></div>
            <div class="text-lg mb-2"><strong class="text-gray-700">Genre:</strong> <span class="text-gray-900"><?= htmlspecialchars($result['Genre']) ?></span></div>
        </div>

        <div class="flex space-x-4">
            <form action="agenda_verwijder_verwerk.php" method="POST">
                <input type="hidden" name="ID" value="<?= ($result['ID']) ?>">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Yes, Delete</button>
            </form>
            <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 inline-block">Cancel</a>
        </div>
    </div>
</div>
</body>
</html>