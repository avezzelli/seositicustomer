<?php

namespace seositi;

class Amministratore extends UtenteGestionale{
    private int $idUG;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getIdUG(): int {
        return $this->idUG;
    }

    public function setIdUG(int $idUG): void {
        $this->idUG = $idUG;
    }


}
