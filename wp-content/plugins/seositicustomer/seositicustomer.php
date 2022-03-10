<?php

/**
 * @package seositi
 */
/*
  Plugin Name: Seo Siti Customer
  Plugin URI:
  Description: Plugin WP per la gestione dei clienti 
  Version: 1.0
  Author: Alex Vezzelli - Seo Siti Marketing
  Author URI: https//www.seositimarketing.it/
  License: GPLv2 or later
 */

//includo le librerie
require_once 'assets/definizioni.php';
require_once 'assets/api_db.php';

require_once 'assets/initialize_DB.php';
require_once 'assets/functions.php';

define('PATH_SEOSITI', plugin_dir_path(__FILE__));

//creo il db al momento dell'installazione
register_activation_hook(__FILE__, 'install_db_seositi');
function install_db_seositi(){
    \seositi\install_seositi_db();
}

//rimuovo il db quando disattivo il plugin
register_deactivation_hook(__FILE__, 'remove_db_seositi');
function remove_db_seositi(){
    \seositi\delete_seositi_db();
}