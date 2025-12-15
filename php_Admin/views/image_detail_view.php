<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<nav class="bg-gray-800 text-white p-4 mb-6">
    <div class="container mx-auto flex justify-between items-center">
        <div class="font-bold text-xl">Anime Manager</div>
        <div class="flex items-center space-x-4">
            <a href="overzicht.php" class="hover:text-gray-300">Back to Overview</a>
        </div>
    </div>
</nav>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Image Detail</h1>
    <?php if (isset($result) && $result): ?>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="images/<?= $result['Afbeelding'] ?>" alt="<?= $result['Titel'] ?>" class="max-w-full h-auto mb-4">
            <div class="text-lg mb-2"><strong class="text-gray-700">Uploader:</strong> <span class="text-gray-900"><?= $result['Uploader'] ?></span></div>
            <div class="text-lg mb-2"><strong class="text-gray-700">Title:</strong> <span class="text-gray-900"><?= $result['Titel'] ?></span></div>
        </div>
    <?php else: ?>
        <p>Image not found.</p>
    <?php endif; ?>
</div>
</body>
</html>