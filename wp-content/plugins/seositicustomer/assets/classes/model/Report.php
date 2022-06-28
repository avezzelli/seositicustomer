<?php

namespace seositi;

class Report extends MyObject{
    private int $tipologia;
    private string $embed;
    private int $idCliente;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getID(): int {
        return parent::getID();
    }

    protected function setID(int $ID): void {
        parent::setID($ID);
    }
    
    public function getTipologia(): int {
        return $this->tipologia;
    }

    public function getEmbed(): string {
        return $this->embed;
    }

    public function getIdCliente(): int {
        return $this->idCliente;
    }

    public function setTipologia(int $tipologia): void {
        $this->tipologia = $tipologia;
    }

    public function setEmbed(string $embed): void {
        $this->embed = $embed;
    }

    public function setIdCliente(int $idCliente): void {
        $this->idCliente = $idCliente;
    }



}
