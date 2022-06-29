<?php

namespace seositi;

class UtenteGestionale extends MyObject {
    private string $nominativo;
    private string $telefono;
    private int $idUWP;
    private int $ruolo;
    
    public function __construct() {
        parent::__construct();
    }
    
    //sovrascrivo il metodo padre
    public function getID(): int {
        return parent::getID();
    }

    public function setID(int $ID): void {
        parent::setID($ID);
    }

    
    public function getNominativo(): string {
        return $this->nominativo;
    }

    public function getTelefono(): string {
        return $this->telefono;
    }

    public function getUtenteWp(): int {
        return $this->idUWP;
    }

    public function getRuolo(): int {
        return $this->ruolo;
    }

    public function setNominativo(string $nominativo): void {
        $this->nominativo = $nominativo;
    }

    public function setTelefono(string $telefono): void {
        $this->telefono = $telefono;
    }

    public function setUtenteWp(int $utenteWp): void {
        $this->idUWP = $utenteWp;
    }

    public function setRuolo(int $ruolo): void {
        $this->ruolo = $ruolo;
    }


}
