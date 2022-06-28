<?php

namespace seositi;


class UtenteGestionaleDAO extends ObjectDAO implements InterfaceDAO {
    function __construct() {
        parent::__construct(DBT_UG);
    }

    public function newObj(): UtenteGestionale {
        return new UtenteGestionale();
    }
    
    public function updateToObj(MyObject $o): UtenteGestionale{
        return updateToUG($o);
    }
    
    public function deleteByID($ID): bool{
        return parent::deleteObjectByID($ID);
    }

    public function exists(MyObject $o): bool {
        $obj = $this->updateToObj($o);
        //il campo discriminante è la mail
        if(email_exists(getEmailByWpId($obj->getUtenteWp())) == false){
            //la mail non è associata ad un utente 
            return false;
        }
        else{
            //la mail è già associata ad un utente
            return true;
        }
    }

    public function getArray(MyObject $o) {
        $obj = $this->updateToObj($o);
        return array(
            DBT_UG_NOMINATIVO   => $obj->getNominativo(),
            DBT_UG_TELEFONO     => $obj->getTelefono(),
            DBT_UG_UW           => $obj->getUtenteWp(),
            DBT_UG_RUOLO        => $obj->getRuolo()
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
        return array('%s', '%s', '%d', '%d');
    }

    public function getObj($item) {
        $obj = $this->newObj();
        $obj->setID($item[DBT_ID]);
        $obj->setNominativo($item[DBT_UG_NOMINATIVO]);
        $obj->setTelefono($item[DBT_UG_TELEFONO]);
        $obj->setUtenteWp($item[DBT_UG_UW]);
        $obj->setRuolo($item[DBT_UG_RUOLO]);
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
