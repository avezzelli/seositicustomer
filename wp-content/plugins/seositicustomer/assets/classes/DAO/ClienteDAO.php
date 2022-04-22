<?php

namespace seositi;


class ClienteDAO extends ObjectDAO implements InterfaceDAO {
    
    public function __construct() {
        parent::__construct(DBT_CLI);
    }
    
   private function newObj(): Cliente {
        return new Cliente();
    }
    
    private function updateToObj(MyObject $o): Cliente {
        return updateToCliente($o);
    }

    public function deleteByID($ID): bool {
        return parent::deleteObjectByID($ID);
    }

    public function exists(MyObject $o): bool {
        $obj = $this->updateToObj($o);
        //il campo descriminante sono la p.iva o il cf
        $where = array();
        if($obj->getPiva() != ''){
            $temp = array(
                'campo'     => DBT_CLI_AZIENDA_PIVA,
                'valore'    => $obj->getPiva(),
                'formato'   => 'TEXT'
            );
            array_push($temp, $where);
        }
        
        if($obj->getCf() != ''){
            $temp = array(
                'campo'     => DBT_CLI_AZIENDA_CF,
                'valore'    => $obj->getCf(),
                'formato'   => 'TEXT'
            );
            array_push($temp, $where);
        }
        $resQuery = parent::getObjectsDAO($where);
        if(checkResult($resQuery)){
            return true;
        }
        return false;
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
