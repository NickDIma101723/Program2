<?php
require_once 'session.inc.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Anime</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex items-center justify-center min-h-screen">
<div class="container max-w-lg p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Add New Anime</h1>

    <?php if(!empty($message)) { ?>
        <div class="p-4 mb-4 bg-gray-50 border-l-4 <?php echo $message === 'Success' ? 'border-green-500' : 'border-red-500'; ?>">
            <?php echo $message; ?>
        </div>
    <?php } ?>

    <form method="post" action="agenda_toevoegen_verwerk.php" class="space-y-4">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

        <div class="form-group">
            <label for="name" class="block text-gray-700 font-medium mb-1 text-center">Name:</label>
            <input type="text" id="name" name="name" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="form-group">
            <label for="rating" class="block text-gray-700 font-medium mb-1 text-center">Rating:</label>
            <input type="text" id="rating" name="rating" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="form-group">
            <label for="character" class="block text-gray-700 font-medium mb-1 text-center">Character:</label>
            <input type="text" id="character" name="character" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="form-group">
            <label for="episodes" class="block text-gray-700 font-medium mb-1 text-center">Episodes:</label>
            <input type="number" id="episodes" name="episodes" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="form-group">
            <label for="releaseDate" class="block text-gray-700 font-medium mb-1 text-center">Release Date:</label>
            <input type="date" id="releaseDate" name="releaseDate" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="form-group">
            <label for="endAir" class="block text-gray-700 font-medium mb-1 text-center">End Air:</label>
            <input type="date" id="endAir" name="endAir" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="form-group">
            <label for="genre" class="block text-gray-700 font-medium mb-1 text-center">Genre:</label>
            <input type="text" id="genre" name="genre" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="form-group text-center">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add Anime</button>
        </div>
    </form>

    <div class="mt-4 text-center">
        <a href="index.php" class="text-blue-600 hover:text-blue-800 font-medium">Back to overview</a>
    </div>
</div>
</body>
</html>