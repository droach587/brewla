<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'djrfive1_brewla');

/** MySQL database username */
define('DB_USER', 'djrfive1_brewadm');

/** MySQL database password */
define('DB_PASSWORD', 'K@VVAAyHGe1n');

/** MySQL hostname */
define('DB_HOST', '50.87.248.114');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'UNg 4QGZa!oI^%~O920!Vy;*0B[Gcq* ;xE!?da;SGzzl=2/q1[gceQQ+^I0P{p^');
define('SECURE_AUTH_KEY',  '6a,#u>sKUVFR+3hNn2}Z64MU(4$},yc=HYVU`6zxG]Dq0&R{1Og~jV !P#n(KZin');
define('LOGGED_IN_KEY',    '21$g2Bt:qDXY6gW_hf tf&qa-U7Rojj{!11%,1DM:hV8nZ6/k8A1wfPnEH. UlA~');
define('NONCE_KEY',        'hY]>DTh@>Ongc+!S{`,_94E&l<[VYL7qt`icc7B7A:0>.bG:}c+.wx;g^n.mPvn$');
define('AUTH_SALT',        'f&fkdZ&G<xYyjuEnsNFw%3 I%5hHx1e4E.pN:|08ywAOOWVj0#rk5e}f{5+YJ&5{');
define('SECURE_AUTH_SALT', '3g]9.bL&</`_Rb1~|C&bK5h`je1^$ EJ_Pc`3-mlH0(#KPwM%]`TYJ6csKbM~]T3');
define('LOGGED_IN_SALT',   'wr/j5k`|P+f>R{j!0[Q=]6)Vm*-((<EKnlL$j6cqqS^:gw>t}kVU[H+6&t$8lFfs');
define('NONCE_SALT',       'w0Wh0*!i7X0C.N>uP8P2W10oWVavDzna]J!<?pjbiKfZcYpF_|80Up 6MlLDa0}a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
