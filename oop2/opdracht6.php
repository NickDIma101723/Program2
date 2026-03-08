<?php

require_once 'Rekening.php';
require_once 'SpaarRekening.php';
require_once 'BeleggingsRekening.php';

echo "<h1>Opdracht 6: Child Classes Test</h1>";


echo "<h2>Spaarrekening</h2>";
$spaarRekening = new SpaarRekening(
    'NL01ABNA0123456789', 
    'Jan Spaarder',     
    1000.00,             
    500.00,            
    -100.00,            
    '2023-01-01',      
    0.03,               
    5.00                
);

echo "<p>Start Saldo: " . $spaarRekening->getSaldo() . "</p>";
echo "<p>Rente: " . $spaarRekening->getRente() . "</p>";

$spaarRekening->berekenMaandbedrag(); 
echo "<p>Na 1 maand (rente 0.03, kosten 5.00): " . $spaarRekening->getSaldo() . " (Verwacht: 1025.00)</p>";

$spaarRekening->PasRenteAan(0.04);
echo "<p>Rente aangepast naar: 0.04</p>";

$spaarRekening->berekenMaandbedrag();
echo "<p>Na 2e maand (rente 0.04, kosten 5.00): " . $spaarRekening->getSaldo() . " (Verwacht: 1061.00)</p>";

echo "<h2>Beleggingsrekening</h2>";
$beleggingsRekening = new BeleggingsRekening(
    'NL02ABNA0987654321', 
    'Piet Belegger',    
    2000.00,            
    1000.00,          
    -500.00,             
    '2023-01-01',        
    100.00,             
    0.05                 
);

echo "<p>Start Saldo: " . $beleggingsRekening->getSaldo() . "</p>";
echo "<p>Rendement: " . $beleggingsRekening->getRendement() . "</p>";


$beleggingsRekening->berekenNieuweSaldo();
echo "<p>Na 1 maand (rendement 0.05, inleg 100.00): " . $beleggingsRekening->getSaldo() . " (Verwacht: 2200.00)</p>";


$beleggingsRekening->setRendement(-0.02);
echo "<p>Rendement aangepast naar: -0.02</p>";


$beleggingsRekening->berekenNieuweSaldo();
echo "<p>Na 2e maand (rendement -0.02, inleg 100.00): " . $beleggingsRekening->getSaldo() . " (Verwacht: 2256.00)</p>";
?>