<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afbeelding Uploaden</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-6">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-lg mx-auto mt-10">
            <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Afbeelding Uploaden</h1>

            <form action="upload_verwerk.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label for="uploader" class="block text-sm font-medium text-gray-700 mb-1">Naam van de uploader:</label>
                    <input type="text" id="uploader" name="uploader" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="titel" class="block text-sm font-medium text-gray-700 mb-1">Titel van de afbeelding:</label>
                    <input type="text" id="titel" name="titel" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="afbeelding" class="block text-sm font-medium text-gray-700 mb-1">Selecteer afbeelding:</label>
                    <input type="file" id="afbeelding" name="afbeelding" required accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>

                <div class="pt-4">
                    <button type="submit"
                            class="w-full bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                        Uploaden
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="overzicht.php" class="text-blue-600 hover:underline">Bekijk alle afbeeldingen</a>
            </div>
        </div>
    </div>
</body>
</html>
