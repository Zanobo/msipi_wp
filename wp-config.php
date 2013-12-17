<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * @package WordPress
 */
 
define( 'WP_HOME', 'http://' . $_SERVER['SERVER_NAME'] ); //Apache sends by default, nginx needs declared
define( 'WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] );

$wpAppEnv = "dev"; //Both will need to declare

/* Give DB and file-storage access */
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
if ($wpAppEnv == "dev") {
	// Development environment
	define('DB_NAME', 'msipiorg_wp_dev');
	define('DB_USER', 'msipiorg_wpdev');
	define('DB_PASSWORD', '47');
	define('DB_HOST', 'localhost');

} elseif ($wpAppEnv == "test") {
	// Test Environment

} elseif ($wpAppEnv == "live") {
	// User Acceptance Testing Environment
	define('DB_NAME', 'msipiorg_wp_live');
	define('DB_USER', 'msipiorg_wplive');
	define('DB_PASSWORD', 'YB$3Pooe91STNFzr');
	define('DB_HOST', 'localhost');
}

/* Set error handling and caches */
if (in_array ($wpAppEnv, array('dev', 'test') )) {
	define( 'WP_DEBUG', true ); //mode gives me too many notices from bad plugins, so we do it manually below
	//ini_set( 'display_errors', 1 );
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
} elseif (in_array ( $wpAppEnv, array('uat', 'staging', 'prod') )) {
		define ('WP_DEBUG', true );
}

//define('WP_MEMORY_LIMIT', '64M');

defined('DEV_EMAIL_ADDRESS') ? null : define('DEV_EMAIL_ADDRESS', 'info@msipi.com');
defined('ADMIN_EMAIL_ADDRESS') ? null : define('ADMIN_EMAIL_ADDRESS', 'info@msipi.com');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'EHo|<?TzVs]s*H$]s..<F.x}U_s+b*Ee*-jS@|[1I5qpejF[G%5k{VI-n?j-R`5y');
define('SECURE_AUTH_KEY',  'PgA$Y3p~ow<]hHH|*n!QZ&;6i$B$(Lq2zxex=+PKPTN%>Dz 5PTiZ|qZ-*/|Yk,`');
define('LOGGED_IN_KEY',    '3eR}O+KJ:vt_7j`,.&2k-05ovg0||r$JRabKIc+10}]?+|~p0@({+H|V_uLIn0TD');
define('NONCE_KEY',        '~:}?7+F3C<8$f!/_+^Ak*~FS9Z?z>YO6qM*TzRi}q}~SO^[kwRP~z&h2FD|uZ=u<');
define('AUTH_SALT',        ',Lo1kGF8+w%tYlN~scQ5$84{@$^o)Tq|#IJE7^1TO=t(NMqh4yJl;7QLn/22{RO-');
define('SECURE_AUTH_SALT', '.:&+,</Cene96Es>#*l(p7@F+_v5s<;NLZ!o|T.Z8<:yI&{l-f([ 8_]7h{&sh2H');
define('LOGGED_IN_SALT',   'K+#kL75V;F8%Oj]V+@6[.F#?hU8n:; d7(0sJZ17zcyE+(M^xAlx!!@u:-y,6<dH');
define('NONCE_SALT',       '+kq`o;&TdB3qgp(B,U&%jSZ)<U2-AIBc4&lz7+7X{947EzlP3NsI7f/DUFM,{_e{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ilp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
