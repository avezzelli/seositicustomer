<?php

namespace seositi;


class ReportDAO extends ObjectDAO implements InterfaceDAO{
    
    public function __construct() {
        parent::__construct(DBT_REP);
    }
    
    public function newObj() : Report{
        return new Report();
    }
    
    public function updateToObj(MyObject $o): Report{
        return updateToReport($o);
    }
    
    public function deleteByID($ID): bool {
        return parent::deleteObjectByID($ID);
    }

    public function exists(MyObject $o): bool {
        //non è necessario fare un controllo in quanto ci possono essere associati più report simili
        
    }

    public function getArray(MyObject $o) {
        $obj = $this->updateToObj($o);
        return array(
            DBT_REP_TIPOLOGIA       => $obj->getTipologia(),
            DBT_REP_EMBED           => $obj->getEmbed(),
            DBT_ID_CLIENTE          => $obj->getIdCliente()
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
        return array('%d', '%s', '%d');
    }

    public function getObj($item): Report {
        $obj = $this->newObj();
        $obj->setTipologia($item[DBT_REP_TIPOLOGIA]);
        $obj->setEmbed($item[DBT_REP_EMBED]);
        $obj->setIdCliente($item[DBT_ID_CLIENTE]);
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
