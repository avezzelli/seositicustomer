<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via web
 * puoi copiare questo file in «wp-config.php» e riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni database
 * * Chiavi Segrete
 * * Prefisso Tabella
 * * ABSPATH
 *
 * * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Impostazioni database - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'seositi_db_03' );

/** Nome utente del database */
define( 'DB_USER', 'seositi_u_03' );

/** Password del database */
define( 'DB_PASSWORD', 'R}ZR,UQO&xkW' );

/** Hostname del database */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di Collazione del Database. Da non modificare se non si ha idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'mOa5;~o4MNQ4H%6nbv~gN#aeq+-qH5;4%H(rk6M3lYsbjLZYitpC5tmwB|zjg7pv' );
define( 'SECURE_AUTH_KEY',  'uejo {~oD<,1_/$n~x0EsIh,?UcRjwR nL?x?EMVwb pqyji&j>uVg!}o}<h[>^a' );
define( 'LOGGED_IN_KEY',    'X-B&u:#[|CRd123uV(R&U,*vs s(#aUCzxMIu9ef<cDIChQ)6+Zj.+dVf]02KhP.' );
define( 'NONCE_KEY',        'wSKSk2x@vYoqKq3Fl[/s9: {aGM04o9<d0/>X9Pbh0VLO@/?dC(HtX6 cv<|{)v+' );
define( 'AUTH_SALT',        'r!*!UukETE&:>eyF+TX7kz3,o &r?7w Uvaa1FWfK G1#;xl=g^8SrXhroS4f0ed' );
define( 'SECURE_AUTH_SALT', '_^?FF-suGB_Cu8 hhT`LNWZGqN6E]>}{y0z]ggqeK+40:o|h4T>NW7)((8G2akOg' );
define( 'LOGGED_IN_SALT',   'mZ08Tbg({Z.&)doP~hIYpZcl(Uu=rx$qwLJsN8#BRhvnVr^zrVl/)CIhe]|6Ff9A' );
define( 'NONCE_SALT',       '6w(l^Nceq(DJzAq#vO0kiY*@ 3dIza^87CMBa>G#E#.JK6<0+^RR55Jhkkq>3;0/' );

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi durante lo sviluppo
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 *
 * Per informazioni sulle altre costanti che possono essere utilizzate per il debug,
 * leggi la documentazione
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta le variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
