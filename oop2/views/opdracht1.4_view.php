<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 1.4: Functie met een boolean als returnwaarde</title>
</head>
<body>
    <h1>Mag Stemmen?</h1>
    <ul>
        <?php foreach ($results as $result): ?>
            <li>Leeftijd: <?php echo htmlspecialchars($result['leeftijd']); ?> - Mag stemmen: <?php echo $result['magStemmen'] ? 'Ja' : 'Nee'; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>