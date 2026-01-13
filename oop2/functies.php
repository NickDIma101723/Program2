<?php

function berekenKamer($lengte, $breedte, $hoogte = null) {
    if ($hoogte === null) {
        return $lengte * $breedte;
    } else {
        return $lengte * $breedte * $hoogte;
    }
}

function nlDatum($date, $shortYear = false) {
    $months = ['januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december'];
    $d = date_parse($date);
    if ($d['error_count'] > 0) {
        return 'Ongeldige datum';
    }
    $day = $d['day'];
    $month = $months[$d['month'] - 1];
    $year = $d['year'];
    if ($shortYear) {
        $year = "'" . substr($year, -2);
    }
    return "$day $month $year";
}

function magStemmen($leeftijd) {
    if (!is_numeric($leeftijd)) {
        return false;
    }
    return (int)$leeftijd >= 18;
}

?>