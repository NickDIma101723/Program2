<?php
include 'Rekening.php';

$rekeningen = array();

$rekening1 = new Rekening();
$rekening1->rekeningNummer = 'NL01ABNA0123456789';
$rekening1->naamEigenaar = 'Jan Jansen';
$rekening1->saldo = 1500.50;
$rekening1->opnameLimiet = 500.00;
$rekening1->maxRood = -1000.00;

$rekeningen[] = $rekening1;

$rekening2 = new Rekening();
$rekening2->rekeningNummer = 'NL02ABNA0987654321';
$rekening2->naamEigenaar = 'Piet Pietersen';
$rekening2->saldo = 2500.75;
$rekening2->opnameLimiet = 1000.00;
$rekening2->maxRood = -500.00;

$rekeningen[] = $rekening2;

$rekening3 = new Rekening();
$rekening3->rekeningNummer = 'NL03ABNA1122334455';
$rekening3->naamEigenaar = 'Klaas Klaassen';
$rekening3->saldo = -200.00;
$rekening3->opnameLimiet = 300.00;
$rekening3->maxRood = -1500.00;

$rekeningen[] = $rekening3;

include 'views/opdracht21_view.php';
?>