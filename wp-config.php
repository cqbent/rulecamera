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
define('DB_NAME', 'rulecamera');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'syproot');

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
define('AUTH_KEY',         'KPh$Y)+<f Vu*EOU?R^4DF4K8|pn%Dsi.w8*KY5tYj9X@I^4QuE $;B:Rh6v?ajJ');
define('SECURE_AUTH_KEY',  '*+lkU?U#BV*~P*F9&v@CY0Gky]?ZmosnXJ5J]a$?>6B[D/K/]!:uglAH)}xxcd`p');
define('LOGGED_IN_KEY',    'r6>RnTKI)ch-v$|?MTk9*)Q*V-Uy>QY+/Jli%.{,h XecMH3)&j(ITMwxHh=/z&Z');
define('NONCE_KEY',        ';M4tlm?N+|j6)0Vy>vlXx|=5EHA!R]q,v!2!w-~S[Z;+jF}C% `q-xZw{6?<E5-e');
define('AUTH_SALT',        '9QkOP JX4dsb&{#dv5F0el%%KsZVhu8vq6=<+1H=!SG:`+[%Gga)0+Vu~(L_6,m+');
define('SECURE_AUTH_SALT', 'xmS4+*Y9JR2?r,`eh@=IP2{]f%eu+*Z*+|0;/%a1MMiIGsF1f`Z?H-K*n~5u<$bA');
define('LOGGED_IN_SALT',   'IU!siA:Ql)u_Q#[1B-:>U?_7]F}SF~_ka,=Q#~[A?L@ifqMQz(}1n|d$44n>4wAI');
define('NONCE_SALT',       'TM*Jy`5HjKfm.:Nj}jOt*U||WFK;p,|-.b9u!j>*JtyS:XF{ztQQw@i+19w+7:LP');

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
