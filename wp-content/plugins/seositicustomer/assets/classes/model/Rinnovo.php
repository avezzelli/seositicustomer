<?php

namespace seositi;

class Rinnovo extends Servizio{
    private int $idServizio;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getIdServizio(): int {
        return $this->idServizio;
    }

    public function setIdServizio(int $idServizio): void {
        $this->idServizio = $idServizio;
    }


}
