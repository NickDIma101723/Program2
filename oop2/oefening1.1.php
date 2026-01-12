<?php

function cleanName($voornaam, $achternaam, $tussenvoegsel = '') {
    $voornaam = trim($voornaam);
    $achternaam = trim($achternaam);
    $tussenvoegsel = trim($tussenvoegsel);

    if (preg_match('/\d/', $voornaam) || preg_match('/\d/', $achternaam) || ($tussenvoegsel && preg_match('/\d/', $tussenvoegsel))) {
        return 'Fout: Parameters mogen geen getallen bevatten.';
    }

    $voornaam = ucfirst(strtolower($voornaam));
    $achternaam = ucfirst(strtolower($achternaam));
    if ($tussenvoegsel) {
        $tussenvoegsel = ucfirst(strtolower($tussenvoegsel));
        return $voornaam . ' ' . $tussenvoegsel . ' ' . $achternaam;
    } else {
        return $voornaam . ' ' . $achternaam;
    }
}

$tests = [
    ['jan', 'jansen'],
    [' JAN ', ' JANSEN '],
    ['piet', 'de boer', 'van'],
    ['anna', '123', 'marie'],
    ['hans', 'meier', 'von der'],
    ['klaas', 'pieters', ''],
    ['eva', 'smith', 'de la'],
];

echo "<h1>Test cleanName functie</h1>";
foreach ($tests as $test) {
    $result = call_user_func_array('cleanName', $test);
    echo "<p>Invoer: " . implode(', ', array_map('htmlspecialchars', $test)) . " => Resultaat: " . htmlspecialchars($result) . "</p>";
}

?>