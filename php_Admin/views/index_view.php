<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<nav class="bg-gray-800 text-white p-4 mb-6">
    <div class="container mx-auto flex justify-between items-center">
        <div class="font-bold text-xl">Anime Manager</div>
        <div class="flex items-center space-x-4">
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                <span>Welcome, <?=($_SESSION['username']) ?></span>
                <a href="logout.php" class="hover:text-gray-300">Logout</a>
            <?php else: ?>
                <a href="login_view.php" class="hover:text-gray-300">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- Anime List Content -->
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Agenda</h1>
    <div class="mb-4">
        <a href="agenda_toevoegen_verwerk.php" class="text-blue-600 hover:text-blue-800 font-medium">Add New Anime</a>
    </div>

    <!-- Anime List -->
    <?php if($amountRows > 0) { ?>
        <ul class="space-y-4">
            <?php foreach ($result as $row) { ?>
                <li class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-lg mb-2"><strong class="text-gray-700">Name:</strong> <span class="text-gray-900"><?= $row['Name'] ?></span></div>
                    <div class="text-lg mb-2"><strong class="text-gray-700">Rating:</strong> <span class="text-gray-900"><?= $row['Rating'] ?></span></div>
                    <div class="text-lg mb-2"><strong class="text-gray-700">Character:</strong> <span class="text-gray-900"><?= $row['Character'] ?></span></div>
                    <div class="text-lg mb-2"><strong class="text-gray-700">Episodes:</strong> <span class="text-gray-900"><?= $row['Episodes'] ?></span></div>
                    <div class="text-lg mb-2"><strong class="text-gray-700">Release Date:</strong> <span class="text-gray-900"><?= $row['Release Date'] ?></span></div>
                    <div class="text-lg mb-2"><strong class="text-gray-700">End Air:</strong> <span class="text-gray-900"><?= $row['End Air'] ?></span></div>
                    <div class="text-lg mb-2"><strong class="text-gray-700">Genre:</strong> <span class="text-gray-900"><?= $row['Genre'] ?></span></div>
                    <div class="space-x-4">
                        <a href="detail.php?ID=<?= $row['ID'] ?>" class="text-blue-600 hover:text-blue-800 font-medium">Detail</a>
                        <a href="agenda_aanpassen.php?ID=<?= $row['ID'] ?>" class="text-green-600 hover:text-green-800 font-medium">Edit</a>
                        <a href="agenda_verwijder.php?ID=<?= $row['ID'] ?>" class="text-red-600 hover:text-red-800 font-medium">Delete</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p class="text-gray-600 text-lg">No result was shown</p>
    <?php } ?>
</div>
</body>
</html>