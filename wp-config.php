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
define('DB_NAME', 'wp_isotex');

/** MySQL database username */
define('DB_USER', 'User_Isotex');

/** MySQL database password */
define('DB_PASSWORD', 'is@tex2015');

/** MySQL hostname */
define('DB_HOST', '69.90.236.28');

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
define('AUTH_KEY',         'o nM{6RIp*(F1^Y@%]+vN|uWx5zrvLKIdsy iv}U-Bb6#d8$k$4G)m]x6@,+eTV)');
define('SECURE_AUTH_KEY',  '+6g#I4mVoQh*^A]HR|r?0pi^no&<!LoNIKzN(4+_j~arbyYcOvGn2xJycQoNQ+Ld');
define('LOGGED_IN_KEY',    'lsm@?NU#t+5TSb%,~}Y#Nl|f-)Y+|%cd#3]j+1HEffaYUfX6SvxC+^;+wlTSv|uq');
define('NONCE_KEY',        '8#aY2 V7_S?H*XHl|Z:)2O2Ejrt*km?6)7Jlu<0MN7XA3JH_}A!*%Xb:vQl% |/5');
define('AUTH_SALT',        '6!nM7A|T5t-Q[rUk(V?|5>0sF}LP2C}-Z7=}^.|8-LL`|1*J$GiC!F),W--T5zgG');
define('SECURE_AUTH_SALT', 'wi]Bo9gUO|ff!A(N!6#W]2R(Qx<Dn7/a^)_FY8=GV^LF{J2_8AD2:Vs9ZJ=?+{-L');
define('LOGGED_IN_SALT',   'c)y:Uv[zzvjH6X%JZ8Oy^3uz{6p?-<rihm>OC|J<zD-sfgh]`>#J^CB+*)^<d?|N');
define('NONCE_SALT',       '}}3[}ej;)<:(R!0Q+,)!%MjpFrhlC?(6~LQbR)}W$<3s]uAl=Pl?JS-DM:SgI)hc');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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


/*** EVITAR EL AUTOGUARDADO*********/
define('AUTOSAVE_INTERVAL', 86400);