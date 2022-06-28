<?php

namespace seositi;


class ClienteDAO extends ObjectDAO implements InterfaceDAO {
    
    public function __construct() {
        parent::__construct(DBT_CLI);
    }
    
    public function newObj(): Cliente {
        return new Cliente();
    }
    
    public function updateToObj(MyObject $o): Cliente {
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
        $obj = $this->updateToObj($o);
        return array(
            DBT_CLI_AZIENDA             => $obj->getAzienda(),
            DBT_CLI_AZIENDA_INDIRIZZO   => $obj->getIndirizzo(),
            DBT_CLI_AZIENDA_CITTA       => $obj->getCitta(),
            DBT_CLI_AZIENDA_PROVINCIA   => $obj->getProvincia(),
            DBT_CLI_AZIENDA_PIVA        => $obj->getPiva(),
            DBT_CLI_AZIENDA_CF          => $obj->getCf(),
            DBT_ID_UG                   => $obj->getIdUG(),
            DBT_ID_COM                  => $obj->getIdCommerciale()
        );
    }

    public function getArrayResult($resultQuery) {
        if(checkResult($resultQuery)){
            $result = array();
            foreach($resultQuery as $item){
                array_push($result, $this->getObj($item));
            }
            return $result;
        }
        return null;
    }

    public function getFomato() {
        return array('%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d');
    }

    public function getObj($item): Cliente {
        $obj = $this->newObj();
        $obj->setAzienda($item[DBT_CLI_AZIENDA]);
        $obj->setIndirizzo($item[DBT_CLI_AZIENDA_INDIRIZZO]);
        $obj->setCitta($item[DBT_CLI_AZIENDA_CITTA]);
        $obj->setProvincia($item[DBT_CLI_AZIENDA_PROVINCIA]);
        $obj->setPiva($item[DBT_CLI_AZIENDA_PIVA]);
        $obj->setCf($item[DBT_CLI_AZIENDA_CF]);
        $obj->setIdUG($item[DBT_ID_UG]);
        $obj->setIdCommerciale($item[DBT_ID_COM]);
        return $obj;
    }

    public function getResults($where = null, $offset = null) {
        return $this->getArrayResult(parent::getObjectsDAO($where, $offset));
    }

    public function save(MyObject $o) {
        $obj = $this->updateToObj($o);
        if(!$this->exists($obj)){
            $campi = $this->getArray($obj);
            $formato = $this->getFomato();
            return parent::saveObject($campi, $formato);
        }
        return -1;
    }

    public function search($query) {
        return $this->getArrayResult(parent::searchObjects($query));
    }

    public function update(MyObject $o) {
        $obj = $this->updateToObj($o);
        $update = $this->getArray($obj);
        $formatUpdate = $this->getFomato();
        $where = array(DBT_ID => $obj->getID());
        $formatWhere = array('%d');
        return parent::updateObject($update, $formatUpdate, $where, $formatWhere);
    }   
    
    public function getResultByID($ID) {
       $temp = parent::getResultByID($ID);
       if($temp != null){
           return $this->getObj($temp);
       }
       return null;
    }

}
