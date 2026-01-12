<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 1.1: PHP Functie</title>
</head>
<body>
    <h1>Getal omzetten naar ander talstelsel</h1>
    <form method="post">
        <label for="number">Voer een getal in:</label>
        <input type="text" id="number" name="number" value="<?php echo htmlspecialchars($_POST['number'] ?? ''); ?>" required>
        <br><br>
        <button type="submit" name="action" value="dec_to_bin">Decimaal naar Binair</button>
        <button type="submit" name="action" value="bin_to_dec">Binair naar Decimaal</button>
        <button type="submit" name="action" value="dec_to_hex">Decimaal naar Hexadecimaal</button>
        <button type="submit" name="action" value="hex_to_bin">Hexadecimaal naar Binair</button>
        <button type="submit" name="action" value="bin_to_hex">Binair naar Hexadecimaal</button>
    </form>
    <?php if ($result): ?>
        <h2>Resultaat:</h2>
        <p><?php echo htmlspecialchars($result); ?></p>
    <?php endif; ?>
</body>
</html>