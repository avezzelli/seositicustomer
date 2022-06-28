<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

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
