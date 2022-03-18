<?php

namespace seositi;

/*** CREAZIONE DATABASE ***/
function install_seositi_db(){
    try{
        //UTENTE GESTIONALE
        $args = array(
            array(
                'nome'  => DBT_UG_NOMINATIVO,
                'tipo'  => 'TEXT',
                'null'  => 'NOT NULL'
            ),
            array(
                'nome'  => DBT_UG_TELEFONO,
                'tipo'  => 'TEXT',
                'null'  => null
            ),
            array(
                'nome'  => DBT_UG_UW,
                'tipo'  => 'INT',
                'null'  => 'NOT NULL'
            ),
            array(
                'nome'  => DBT_UG_RUOLO,
                'tipo'  => 'INT',
                'null'  => 'NOT NULL'
            )
        );
        creaTabella(DBT_UG, $args);
        
        //CLIENTE
        $args = array(
            array(
                'nome'  => DBT_CLI_AZIENDA,
                'tipo'  => 'TEXT',
                'null'  => null
            ),
            array(
                'nome'  => DBT_CLI_AZIENDA_INDIRIZZO,
                'tipo'  => 'TEXT',
                'null'  => null
            ),
            array(
                'nome'  => DBT_CLI_AZIENDA_CITTA,
                'tipo'  => 'TEXT',
                'null'  => null
            ),
            array(
                'nome'  => DBT_CLI_AZIENDA_PROVINCIA,
                'tipo'  => 'TEXT',
                'null'  => null
            ),
            array(
                'nome'  => DBT_CLI_AZIENDA_PIVA,
                'tipo'  => 'TEXT',
                'null'  => null
            ),
            array(
                'nome'  => DBT_CLI_AZIENDA_CF,
                'tipo'  => 'TEXT',
                'null'  => null
            ),
            array(
                'nome'  => DBT_ID_UG,
                'tipo'  => 'INT',
                'null'  => 'NOT NULL'
            ),
            array(
                'nome'  => DBT_ID_COM,
                'tipo'  => 'TEXT',
                'null'  => null
            )
        );        
        $fks = array(
            array(
                'key1'      => DBT_ID_UG,
                'tabella'   => DBT_UG
            )
        );        
        creaTabella(DBT_CLI, $args, $fks);
        
        //COMMERCIALE
        $args = array(
            array(
                'nome'  => DBT_ID_UG,
                'tipo'  => 'INT',
                'null'  => 'NOT NULL'
            )
        );
        $fks = array(
            array(
                'key1'      => DBT_ID_UG,
                'tabella'   => DBT_UG
            )
        );
        creaTabella(DBT_COM, $args, $fks);
        
        //AMMINISTRATORE
        $args = array(
            array(
                'nome'  => DBT_ID_UG,
                'tipo'  => 'INT',
                'null'  => 'NOT NULL'
            )
        );
        $fks = array(
            array(
                'key1'      => DBT_ID_UG,
                'tabella'   => DBT_UG
            )
        );
        creaTabella(DBT_AMM, $args, $fks);
        
        //REPORT
        $args = array(
            array(
                'nome'  => DBT_REP_TIPOLOGIA,
                'tipo'  => 'INT',
                'null'  => 'NOT NULL'
            ),
            array(
                'nome'  => DBT_REP_EMBED,
                'tipo'  => 'TEXT',
                'null'  => null
            ),
            array(
                'nome'  => DBT_ID_CLIENTE,
                'tipo'  => 'INT',
                'null'  => 'NOT NULL'
            )
        );
        $fks = array(
            array(
                'key1'      => DBT_ID_CLIENTE,
                'tabella'   => DBT_CLI
            )
        );
        creaTabella(DBT_REP, $args, $fks);
        
        //SERVIZIO
        $args = array(
            array(
                'nome'  => DBT_SER_DURATA,
                'tipo'  => 'INT',
                'null'  => 'NOT NULL'
            ),
            array(
                'nome'  => DBT_SER_DATASTIPULA,
                'tipo'  => 'TIMESTAMP',
                'null'  => 'NOT NULL'
            ),
            array(
                'nome'  => DBT_SER_NOTE,
                'tipo'  => 'TEXT',
                'null'  => null
            ),
            array(
                'nome'  => DBT_SER_PREZZO,
                'tipo'  => 'FLOAT',
                'null'  => 'NOT NULL'
            ),
            array(
                'nome'  => DBT_SER_UPLOAD,
                'tipo'  => 'TEXT',
                'null'  => 'NOT NULL'
            ),
            array(
                'nome'  => DBT_ID_CLIENTE,
                'tipo'  => 'INT',
                'null'  => 'NOT NULL'
            )
        );
        $fks = array(
            array(
                'key1'      => DBT_ID_CLIENTE,
                'tabella'   => DBT_CLI
            )
        );
        creaTabella(DBT_SER, $args, $fks);
        
        //RINNOVO
        $args = array(
            array(
                'nome'  => DBT_ID_SERVIZIO,
                'tipo'  => 'INT',
                'null'  => 'NOT NULL'
            ),
        );
        $fks = array(
            array(
                'key1'      => DBT_ID_SERVIZIO,
                'tabella'   => DBT_SER
            )
        );
       creaTabella(DBT_RIN, $args, $fks);
        
        
    } catch (Exception $ex) {
        _e($ex);
        return false; 
    }
}

/*** ELIMINAZIONE DATABASE ***/
function delete_seositi_db(){
    dropTabella(DBT_RIN);
    dropTabella(DBT_SER);
    dropTabella(DBT_REP);
    dropTabella(DBT_AMM);
    dropTabella(DBT_COM);
    dropTabella(DBT_CLI);
    dropTabella(DBT_UG);
}