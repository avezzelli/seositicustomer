<?php

namespace seositi;

class MyObject {
    private int $ID;
    
    function __construct() {
        
    }
    
    protected function getID(): int {
        return $this->ID;
    }

    protected function setID(int $ID): void {
        $this->ID = $ID;
    }


}
