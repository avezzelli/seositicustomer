<?php

namespace seositi;


class ServizioDAO extends ObjectDAO implements InterfaceDAO {
    
    public function deleteByID($ID): bool {
        return parent::deleteObjectByID($ID);
    }

    public function exists(MyObject $o): bool {
        $obj = $this->updateToObj($o);
        //il campo discriminante è il nome (se compilato)
        $where = array();
        if($obj->getNome() != ''){
            $temp = array(
                'campo'     => DBT_SER_NOME, 
                'valore'    => $obj->getNome(),
                'formato'   => 'TEXT'
            );
            array_push($temp, $where);            
            $resQuery = parent::getObjectsDAO($where);
            if(checkResult($resQuery)){
                return true;
            }
        }
        return false;
    }

    public function getArray(MyObject $o) {
        $obj = $this->updateToObj($o);
        return array(
            DBT_SER_DURATA      => $obj->getDurata(),
            DBT_SER_DATASTIPULA => $obj->getDataStipula(),
            DBT_SER_NOTE        => $obj->getNote(),
            DBT_SER_PREZZO      => $obj->getPrezzo(),
            DBT_SER_UPLOAD      => $obj->getUpload(),
            DBT_ID_CLIENTE      => $obj->getIdCliente(),
            DBT_SER_NOME        => $obj->getNome()
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
        return array('%d', '%s', '%s', '%f', '%s', '%d', '%s');
    }

    public function getObj($item): Servizio {
        $obj = $this->newObj();
        $obj->setDurata($item[DBT_SER_DURATA]);
        $obj->setDataStipula($item[DBT_SER_DATASTIPULA]);
        $obj->setNote($item[DBT_SER_NOTE]);
        $obj->setPrezzo($item[DBT_SER_PREZZO]);
        $obj->setUpload($item[DBT_SER_UPLOAD]);
        $obj->setIdCliente($item[DBT_ID_CLIENTE]);
        $obj->setNome($item[DBT_SER_NOME]);
    }

    public function getResults($where = null, $offset = null) {
        return $this->getArrayResult(parent::getObjectsDAO($where, $offset));
    }

    public function newObj(): Servizio {
        return new Servizio();
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

    public function updateToObj(MyObject $o): Servizio {
        return updateToServizio($o);
    }
    
    public function getResultByID($ID) {
       $temp = parent::getResultByID($ID);
       if($temp != null){
           return $this->getObj($temp);
       }
       return null;
    }

}
