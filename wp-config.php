<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'siachen');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WWTKiO|e~+3wg94fn^CZ]}2@+e;wIS/rU 8_TcxU$CX53LAoY[z>r=KjEe1b-p8G');
define('SECURE_AUTH_KEY',  '66?&Z7scx$RJ~h].j^YM071=m_K1{;,,=BG7SuuLd;5rNSi:vT1+]IJT|YoMS[[1');
define('LOGGED_IN_KEY',    'w-d<1u%DgIIPI).K7`LlHw_+~#ty7_3wH2mAr0^/7IjO=;ZH`N6q>`|_mue84vCE');
define('NONCE_KEY',        'zBo*/;Y{p3/xMWNncI ^/qs+<E2Yul`=qmuW>Vj.O#Zlxq~79%mvYz#SpUA(ymnn');
define('AUTH_SALT',        '@PT?Q}Kvl013;yhqXJ<+NO=}Shoc{$n$-on{~@g`x{vE @K+4NC(a2]Bq))cUx|G');
define('SECURE_AUTH_SALT', '.U?{wB|-#tC,p=00OvW%-+U JGZZ,7s;v[&jH!.1zYR9!hnsRtDSrdF,bp$|+S?)');
define('LOGGED_IN_SALT',   '&>=I[R9>H1o9:f3)6!f4a9^m>e>-LvPW2.7UX15-!#<Q3.+^D0:4%X(Vl(MQzs|F');
define('NONCE_SALT',       'p{C3./@|KXiO|9d)}|3`CV+X9hli+%p8dBrh%mVJj>Tq>Dw6d1 km_d7+Ma- &>(');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'siawp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
