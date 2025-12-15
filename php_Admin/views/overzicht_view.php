<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Afbeeldingen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-6">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Overzicht Afbeeldingen</h1>
                <a href="upload.php" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    + Nieuwe Upload
                </a>
            </div>

            <?php if (isset($_GET['success'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    Afbeelding is succesvol geüpload!
                </div>
            <?php endif; ?>

            <?php if (empty($afbeeldingen)): ?>
                <p class="text-gray-600 text-center py-10">Nog geen afbeeldingen geüpload.</p>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <?php foreach ($afbeeldingen as $afbeelding): ?>
                        <a href="image_detail.php?ID=<?= $afbeelding['ID'] ?>" class="bg-gray-50 rounded-lg overflow-hidden shadow hover:shadow-lg transition block">
                            <img src="<?= $tn_map . 'tn_' . htmlspecialchars($afbeelding['Afbeelding']) ?>" 
                                 alt="<?= htmlspecialchars($afbeelding['Titel']) ?>"
                                 class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800 truncate"><?= htmlspecialchars($afbeelding['Titel']) ?></h3>
                                <p class="text-sm text-gray-600">Door: <?= htmlspecialchars($afbeelding['Uploader']) ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="mt-8 text-center">
                <a href="index.php" class="text-blue-600 hover:underline">Terug naar home</a>
            </div>
        </div>
    </div>
</body>
</html>
