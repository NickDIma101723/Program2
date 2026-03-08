<?php
class Rekening {
    protected $rekeningNummer;
    protected $naamEigenaar;
    protected $saldo;
    protected $opnameLimiet;
    protected $maxRood;

    public function __construct($rekeningNummer = "", $naamEigenaar = "", $saldo = 0, $opnameLimiet = 0, $maxRood = 0) {
        $this->rekeningNummer = $rekeningNummer;
        $this->naamEigenaar = $naamEigenaar;
        $this->saldo = $saldo;
        $this->opnameLimiet = $opnameLimiet;
        $this->maxRood = $maxRood;
    }

    public function getRekeningNummer() {
        return $this->rekeningNummer;
    }

    public function getNaamEigenaar() {
        return $this->naamEigenaar;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function getOpnameLimiet() {
        return $this->opnameLimiet;
    }

    public function getMaxRood() {
        return $this->maxRood;
    }
}
?>