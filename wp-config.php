<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gia_su');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'qLqkGRcQ|tu-3dBX~l!$&>yI^^T53a$K2-:Rj.WL87aBjOR-k|HsB}H*6Q0q,V4b');
define('SECURE_AUTH_KEY',  '9.E;+Sej:<-64u+c/y^WY_J>mS=h-kOC4e R=q[THc_80]~N+5+:]-m7{,+HdZ+M');
define('LOGGED_IN_KEY',    '3zXA-+R!Wq_>Pr bzFB[|07^v:<N1^acm8mqqx0TO@_6:D5+?(Kx?41nwjjU+5nA');
define('NONCE_KEY',        'k5wU&T]f}-cE[aK<!+]1fS{ JMaB9O|?U3STs;#~CG>/1fB]~BIktMciX2.A =&`');
define('AUTH_SALT',        '*QL.{9X6ybUWP1+KVM^TI@=`98K0iTKNLT-^ySbF^I.{(od;8y~W8[fT`NH3N<<p');
define('SECURE_AUTH_SALT', '76qPOlsWyrd@fWW&p}@B^|TgyIua0RYT4!f}GO6?nNnRte[|1R=J.%q,oO.&+GU6');
define('LOGGED_IN_SALT',   ']H-CIw8q`T/WAZOUaZ/+Df/ZNR5z#QD]a&//(VbZF ;d;_=O550Iu[HDd2-*HhEF');
define('NONCE_SALT',       'p|JZ6m?%4Gp%|o$f&~aIaZXv|Omm40-P2Mt21?w@si/2{Al8,LM~RS+Wkj@;%<T#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tw_';

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
