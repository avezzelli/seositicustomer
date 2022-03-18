<?php

namespace seositi;

/************************ DEFINIZIONI **************************/
define('NAME_SPACE', 'seositi');
define('DB_PREFIX', 'wp_seositi_');


/************************ TABELLE DATABASE **************************/
//nomi comuni


//ID
define('DBT_ID_UG', 'id_utente_gestionale');
define('DBT_ID_COM', 'id_commerciale');
define('DBT_ID_SERVIZIO', 'id_servizio');
define('DBT_ID_CLIENTE', 'id_cliente');

//Utente Gestionale
define('DBT_UG', 'utenti_gestionale');
define('DBT_UG_NOMINATIVO', 'nominativo');
define('DBT_UG_TELEFONO', 'telefono');
define('DBT_UG_UW', 'utente_wp');
define('DBT_UG_RUOLO', 'ruolo');

//Amministratore
define('DBT_AMM', 'amministratori');

//Commerciale
define('DBT_COM', 'commerciali');

//Cliente
define('DBT_CLI', 'clienti');
define('DBT_CLI_AZIENDA', 'azienda');
define('DBT_CLI_AZIENDA_INDIRIZZO', 'indirizzo');
define('DBT_CLI_AZIENDA_PIVA', 'piva');
define('DBT_CLI_AZIENDA_CF', 'cf');
define('DBT_CLI_AZIENDA_CITTA', 'citta');
define('DBT_CLI_AZIENDA_PROVINCIA', 'provincia');

//Report
define('DBT_REP', 'reports');
define('DBT_REP_TIPOLOGIA', 'tipologia');
define('DBT_REP_EMBED', 'embed');

//Servizio
define('DBT_SER', 'servizi');
define('DBT_SER_DATASTIPULA', 'data_stipula');
define('DBT_SER_DURATA', 'durata');
define('DBT_SER_PREZZO', 'prezzo');
define('DBT_SER_NOTE', 'note');
define('DBT_SER_UPLOAD', 'upload');

//Rinnovo
define('DBT_RIN', 'rinnovi');


/************************ OGGETTI **************************/
define('OBJ_AMM', 'amministratore');
define('OBJ_CLI', 'cliente');
define('OBJ_COM', 'commerciale');
define('OBJ_REP', 'report');
define('OBJ_RIN', 'rinnovo');
define('OBJ_SER', 'servizio');
define('OBJ_UG', 'utentegestionale');