<?php

require_once 'Rekening.php';

class BeleggingsRekening extends Rekening {
    private $startdatum;
    private $inleg;
    private $rendement;

    public function __construct($rekeningNummer, $naamEigenaar, $saldo, $opnameLimiet, $maxRood, $startdatum, $inleg, $rendement) {
        parent::__construct($rekeningNummer, $naamEigenaar, $saldo, $opnameLimiet, $maxRood);
        $this->startdatum = $startdatum;
        $this->inleg = $inleg;
        $this->rendement = $rendement;
    }

    public function berekenNieuweSaldo() {

        $yield = $this->saldo * $this->rendement;
        $this->saldo += $yield;

        $this->saldo += $this->inleg;
        
        return $this->saldo;
    }

    public function setRendement($rendement) {
        $this->rendement = $rendement;
    }

    public function getStartdatum() { return $this->startdatum; }
    public function getInleg() { return $this->inleg; }
    public function getRendement() { return $this->rendement; }
}
?>