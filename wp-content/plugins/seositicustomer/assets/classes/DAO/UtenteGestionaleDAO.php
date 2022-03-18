<?php

namespace seositi;


class UtenteGestionaleDAO extends ObjectDAO implements InterfaceDAO {
    function __construct() {
        parent::__construct(DBT_UG);
    }

    public function deleteByID($ID) {
        return parent::deleteObjectByID($ID);
    }

    public function exists(MyObject $o) {
        $obj = updateToUG($o);
        
    }

    public function getArray(MyObject $o) {
        
    }

    public function getArrayResult($resultQuery) {
        
    }

    public function getFomato() {
        
    }

    public function getObj($item) {
        
    }

    public function getResults($where = null, $offset = null) {
        
    }

    public function save(MyObject $o) {
        
    }

    public function search($query) {
        
    }

    public function update(MyObject $o) {
        
    }

}
