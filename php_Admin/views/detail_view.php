<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Anime Details</h1>
    <?php if($amountRows > 0) { ?>
        <?php foreach ($result as $row) { ?>
            <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                <div class="text-lg mb-2"><strong class="text-gray-700">Name:</strong> <span class="text-gray-900"><?= ($row['Name']) ?></span></div>
                <div class="text-lg mb-2"><strong class="text-gray-700">Rating:</strong> <span class="text-gray-900"><?= ($row['Rating']) ?></span></div>
                <div class="text-lg mb-2"><strong class="text-gray-700">Character:</strong> <span class="text-gray-900"><?= ($row['Character']) ?></span></div>
                <div class="text-lg mb-2"><strong class="text-gray-700">Episodes:</strong> <span class="text-gray-900"><?= ($row['Episodes']) ?></span></div>
                <div class="text-lg mb-2"><strong class="text-gray-700">Release Date:</strong> <span class="text-gray-900"><?= ($row['Release Date']) ?></span></div>
                <div class="text-lg mb-2"><strong class="text-gray-700">End Air:</strong> <span class="text-gray-900"><?= ($row['End Air']) ?></span></div>
                <div class="text-lg mb-2"><strong class="text-gray-700">Genre:</strong> <span class="text-gray-900"><?= ($row['Genre']) ?></span></div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p class="text-gray-600 text-lg">No anime found</p>
    <?php } ?>
    <a href="index.php" class="text-blue-600 hover:text-blue-800 font-medium mt-4 inline-block">Back to overview</a>
</div>
</body>
</html>