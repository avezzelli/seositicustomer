<?php

namespace seositi;

class Servizio extends MyObject{
    private int $durata;
    private string $dataStipula;
    private string $note;
    private float $prezzo;
    private string $upload;
    private int $idCliente;
    private string $nome;
    private int $rinnovo;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getID(): int {
        return parent::getID();
    }

    public function setID(int $ID): void {
        parent::setID($ID);
    }
    
    public function getDurata(): int {
        return $this->durata;
    }

    public function getDataStipula(): string {
        return $this->dataStipula;
    }

    public function getNote(): string {
        return $this->note;
    }

    public function getPrezzo(): float {
        return $this->prezzo;
    }

    public function getUpload(): string {
        return $this->upload;
    }

    public function getIdCliente(): int {
        return $this->idCliente;
    }

    public function setDurata(int $durata): void {
        $this->durata = $durata;
    }

    public function setDataStipula(string $dataStipula): void {
        $this->dataStipula = $dataStipula;
    }

    public function setNote(string $note): void {
        $this->note = $note;
    }

    public function setPrezzo(float $prezzo): void {
        $this->prezzo = $prezzo;
    }

    public function setUpload(string $upload): void {
        $this->upload = $upload;
    }

    public function setIdCliente(int $idCliente): void {
        $this->idCliente = $idCliente;
    }
    
    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }
    
    public function getRinnovo(): int {
        return $this->rinnovo;
    }

    public function setRinnovo(int $rinnovo): void {
        $this->rinnovo = $rinnovo;
    }

}
