<?php
include 'Rekening.php';

$rekeningen = array();

$rekening1 = new Rekening('NL01ABNA0123456789', 'Jan Jansen', 1500.50, 500.00, -1000.00);
$rekeningen[] = $rekening1;

$rekening2 = new Rekening('NL02ABNA0987654321', 'Piet Pietersen', 2500.75, 1000.00, -500.00);

$rekeningen[] = $rekening2;

$rekening3 = new Rekening('NL03ABNA1122334455', 'Klaas Klaassen', -200.00, 300.00, -1500.00);
$rekeningen[] = $rekening3;

include 'views/opdracht21_view.php';
?>