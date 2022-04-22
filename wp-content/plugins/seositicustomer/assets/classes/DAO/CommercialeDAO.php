<?php

namespace seositi;


class CommercialeDAO extends ObjectDAO implements InterfaceDAO {
    //put your code here
    
    public function __construct() {
        parent::__construct(DBT_COM);
    }

    private function newObj(): Commerciale {
        return new Commerciale();
    }
    
    private function updateToObj(MyObject $o): Commerciale {
        return updateToCommerciale($o);
    }
    
    public function deleteByID($ID): bool {
         return parent::deleteObjectByID($ID);
    }

    public function exists(MyObject $o): bool {
        $obj = $this->updateToObj($o);
        //il campo discriminante è l'IdUG
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

    public function getArray(MyObject $o) {
        $obj = $this->updateToObj($o);
        return array(
            DBT_ID_UG   => $obj->getIdUG()
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
