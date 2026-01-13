<?php
include 'functies.php';

$testLeeftijden = [16, 18, 25, 'abc', 17.5];

$results = [];
foreach ($testLeeftijden as $leeftijd) {
    $results[] = [
        'leeftijd' => $leeftijd,
        'magStemmen' => magStemmen($leeftijd)
    ];
}

include 'views/opdracht14_view.php';
?>