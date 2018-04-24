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
define('DB_NAME', 'dream-loft');

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
define('AUTH_KEY', '/wT}}qd -p,322sUcN}|FRpVNC.8tE!U zsdA/0V~JI+v9+CF@n^CKKO6cZCzo#{');
define('SECURE_AUTH_KEY', '4 yMR:>:KH],Bj.K9#KXq[,yLXob{xxNjY$(tL/44l|@0[0S#v(|CGbD57nBRmw|');
define('LOGGED_IN_KEY', 'Je~(|TeBMP8ylv^r,NJk|<9ZJsFp_6YQwg`9?^AX+nV*}J6)IZ>S)W)7},?H,!v6');
define('NONCE_KEY', 'r2(.Dj/!*K|~[7P0han2D6K#t4j;_l<; 8 I>t-%vCdR_KeTIg&sZwo*1530xQ+z');
define('AUTH_SALT', '{;?d8f* t>cTyo%n,O/N5HXg+T9g-U=6+(N`MD5-?+(:{#p+WVUYgk8G+oqTa y!');
define('SECURE_AUTH_SALT', '7&J65^6LC=nT,8NFTg;`lL!B5h4Wvpa,SSC4+MY7r-.IeCY|[_C`MRUw4Z|s0t-K');
define('LOGGED_IN_SALT', '$Ev27v(1:YtnWq`GaER?czHrY.%+?7C@-1|iB?Yek$!|fS+zjEO`V%DGYTA *+}Q');
define('NONCE_SALT', 'F?Jk%v<-9|urpL,q55kZ^c@X _BGE1o 0|/H7H3@`]SV7 7*{.?y+dFG~hat[i#|');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
