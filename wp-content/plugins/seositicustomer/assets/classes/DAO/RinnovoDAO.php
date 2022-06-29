<?php

namespace seositi;


class RinnovoDAO extends ObjectDAO implements InterfaceDAO{
    
    public function __construct() {
        parent::__construct(DBT_RIN);
    }
    
    public function deleteByID($ID): bool {
        return parent::deleteObjectByID($ID);
    }

    public function exists(MyObject $o): bool {
        //non è necessario
    }

    public function getArray(MyObject $o) {
        $obj = $this->updateToObj($o);
        return array(
            DBT_ID_SERVIZIO => $obj->getIdServizio()
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
        return array('%d');
    }

    public function getObj($item): Rinnovo {
        $obj = $this->newObj();
        $obj->setIdServizio($item[DBT_ID_SERVIZIO]);
    }

    public function getResults($where = null, $offset = null) {
        return $this->getArrayResult(parent::getObjectsDAO($where, $offset));
    }

    public function newObj(): Rinnovo {
        return new Rinnovo();
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

    public function updateToObj(MyObject $o): Rinnovo {
        return updateToRinnovo($o);
    }
    
    public function getResultByID($ID) {
       $temp = parent::getResultByID($ID);
       if($temp != null){
           return $this->getObj($temp);
       }
       return null;
    }

}
