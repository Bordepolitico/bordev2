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
define('DB_NAME', 'bordepol_wpborde');

/** MySQL database username */
define('DB_USER', 'bordepol_wpadmin');

/** MySQL database password */
define('DB_PASSWORD', 'B0rd30s4m4');

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
define('AUTH_KEY',         '/G?.{GNfN14l1R9Jtgqy[^Ey;v*-vI:J|6R1+gHlf)J+kg4a$2BR#vAPg+cmO[t4');
define('SECURE_AUTH_KEY',  '>S Oi`r0Y|[+Z{BWU0gS9L5|-p+pDV?UUlqGc/-JY2u+,JFw@>Pgv8SvW]qmwc8y');
define('LOGGED_IN_KEY',    'PM15XymQ4zS?#rRg$3rEt#[a~~Dp3|YPFHdc}Q16-rE;!de-rxrMOMLx.}TMGqt|');
define('NONCE_KEY',        'a|eYh[W:iBU#&j;eA4iD4mP|U`NuUzMqDdlbBN@yl>/aKz~ (oc#eV2C8avt._`/');
define('AUTH_SALT',        'Hddxyg|;pi-^bj1B[Ky}K7rs(djV2%TJ%cDaXALCkdO.?T$|S%V9Udk)Up*1ttyY');
define('SECURE_AUTH_SALT', 'J+m+m`E>o$Ey0zH0+Zo8xB`cZ`mkmkSHFz;7e8VH}_csiG[Sq#j`ir* LlALJw`n');
define('LOGGED_IN_SALT',   '|[_?o?|,)FGs?9H<b-8v|bhIGq()6%fnR|X!mjE|T9Xo7ZlE>3MBu6=I5PH*$*x|');
define('NONCE_SALT',       '1+H#fu$rJ/)GpHh*Hi+n:/Z+N6$j2m*++<oG:CCN#C/?l b[}};:8Deb,SvQ//_8');

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

