<?php

require_once 'Rekening.php';

class SpaarRekening extends Rekening {
    private $startdatum;
    private $rente;
    private $kosten;

    public function __construct($rekeningNummer, $naamEigenaar, $saldo, $opnameLimiet, $maxRood, $startdatum, $rente, $kosten) {
        parent::__construct($rekeningNummer, $naamEigenaar, $saldo, $opnameLimiet, $maxRood);
        $this->startdatum = $startdatum;
        $this->rente = $rente;
        $this->kosten = $kosten;
    }

    public function berekenMaandbedrag() {
        $renteBedrag = $this->saldo * $this->rente;
        $this->saldo += $renteBedrag;
        $this->saldo -= $this->kosten;
    }

    public function PasRenteAan($nieuwPercentage) {
        
        $this->rente = round($nieuwPercentage, 2);
    }
    
    public function getStartdatum() { return $this->startdatum; }
    public function getRente() { return $this->rente; }
    public function getKosten() { return $this->kosten; }
}
?>