<?php

namespace seositi;

class Cliente extends UtenteGestionale {
    private string $azienda;
    private string $indirizzo;
    private string $citta;
    private string $provincia;
    private string $piva;
    private string $cf;
    private int $idUG;
    private int $idCommerciale;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getAzienda(): string {
        return $this->azienda;
    }

    public function getIndirizzo(): string {
        return $this->indirizzo;
    }

    public function getCitta(): string {
        return $this->citta;
    }

    public function getProvincia(): string {
        return $this->provincia;
    }

    public function getPiva(): string {
        return $this->piva;
    }

    public function getCf(): string {
        return $this->cf;
    }

    public function getIdUG(): int {
        return $this->idUG;
    }

    public function getIdCommerciale(): int {
        return $this->idCommerciale;
    }

    public function setAzienda(string $azienda): void {
        $this->azienda = $azienda;
    }

    public function setIndirizzo(string $indirizzo): void {
        $this->indirizzo = $indirizzo;
    }

    public function setCitta(string $citta): void {
        $this->citta = $citta;
    }

    public function setProvincia(string $provincia): void {
        $this->provincia = $provincia;
    }

    public function setPiva(string $piva): void {
        $this->piva = $piva;
    }

    public function setCf(string $cf): void {
        $this->cf = $cf;
    }

    public function setIdUG(int $idUG): void {
        $this->idUG = $idUG;
    }

    public function setIdCommerciale(int $idCommerciale): void {
        $this->idCommerciale = $idCommerciale;
    }




}
