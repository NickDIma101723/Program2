<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto p-6">
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <?php if ($success): ?>
            <div class="text-green-600 text-lg mb-4"><?= ($message) ?></div>
        <?php else: ?>
            <div class="text-red-600 text-lg mb-4"><?= ($message) ?></div>
        <?php endif; ?>

        <a href="index.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 inline-block">Back to Overview</a>
    </div>
</div>
</body>
</html>
