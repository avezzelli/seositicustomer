<?php

namespace seositi;


class AmministratoreDAO extends ObjectDAO implements InterfaceDAO{
    
    function __construct() {
        parent::__construct(DBT_AMM);
    }
    
    public function newObj(): Amministratore {
        return new Amministratore();
    }

    public function updateToObj(MyObject $o): Amministratore {
        return updateToAmministratore($o);
    }
    
    public function deleteByID($ID): bool{
        return parent::deleteObjectByID($ID);
    }
    
    public function getArray(MyObject $o){
        $obj = $this->updateToObj($o);
        return array(
            DBT_ID_UG   => $obj->getIdUG()
        );
    }

    public function exists(MyObject $o): bool {
        $obj = $this->updateToObj($o);
        //il campo discriminante è l'idUG
        $where = array(
            'campo'     => DBT_ID_UG,
            'valore'    => $obj->getIdUG(),
            'formato'   => 'INT'
        );
        $temp = parent::getObjectsDAO($where);
        if(checkResult($temp)){
            return true;
        }
        return false;
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

    public function getObj($item) {
        $obj = $this->newObj();
        $obj->setIdUG($item[DBT_ID_UG]);
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
