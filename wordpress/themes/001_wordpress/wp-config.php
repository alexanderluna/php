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
define('DB_NAME', '001_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

/** MySQL hostname */
define('DB_HOST', 'db');

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
define('AUTH_KEY',         '[q. `7WIm1w82[F38:4Ueg4Nz{sEg)}~G`7%USh!Ha63{m$+^A5K*GXi3l^bh:`E');
define('SECURE_AUTH_KEY',  'gsfJ5?I]p/ +_&8UbAEw/Sx>^njq)e*1L>RHA,W;A-tW+k61 Bvfs}k:#Op!e@,|');
define('LOGGED_IN_KEY',    '}t}tt>Xg`Q}#_PbRqFFuT0o([|Awn4:)idWB5{2e$S!lRuIiXKf(iw^2i0eh;I8Z');
define('NONCE_KEY',        '6JV@;/9ChxJ4gK=`tI.Q-kn_E[<7<8E-yDv+k-GkLeoQm2298eeiWmq./os,9VBI');
define('AUTH_SALT',        ']l3hVtc=xuv$+nMBvAAj9pCC=HqNKsbnLxO:1jU54f{*6;]{G4n!LXMRVIsFmcxw');
define('SECURE_AUTH_SALT', 'Tw5?xO2;UuTd{Y%A5jG]Fof=Oy(w53Gxh-bb%$LU2Mfq$9It(>S&Tu!NQFXQC8cA');
define('LOGGED_IN_SALT',   '#HPoS<bp)oUufDn?37MZhlasKaWeA<$HY+~<CARhXuZk#R9$[k/0-%o,mNWaG&Z(');
define('NONCE_SALT',       'TB#CNHn)t;ki}_ ,B}g86:No(QQ!(YzpQcS)FY7tGN|FjG>1e7v<{~dwFi7m[%:X');

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
