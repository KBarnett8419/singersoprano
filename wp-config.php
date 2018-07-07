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
define('DB_NAME', 'jamilapi_jamilapiracci');

/** MySQL database username */
define('DB_USER', 'jamilapi_jp');

/** MySQL database password */
define('DB_PASSWORD', 'VwBl^nt~_&2K');

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
define('AUTH_KEY',         'BxBsRI@zT-}3)ztCgyEGh_R29C RPc{wFHX6kQ7Vt$viiW,dBb/n<dYLPGEJ^=;|');
define('SECURE_AUTH_KEY',  'i1T<XRYoyh::H% .{5tl)60);lKLBWJ^DIBs^qH3=Rn:Q]WY^X1Y+SsZ:Y3KXD03');
define('LOGGED_IN_KEY',    '(@~GIK1p(5cke dh]_8Dw$s)M}k-;v6i{L@Q1g0rm;cRAi@&JQjCLH+ha6s =KI*');
define('NONCE_KEY',        'As@oII#ybs>H%jslJ?9X9,,q8hWX{5c%e7K3_A5p9#WIllIJMPp=F>+@4x5Z#<Hr');
define('AUTH_SALT',        'v,BVCm1JfC%ovp{/@ptX2Z]MHvwpZ#l(2y54 S1xD>Nuuq8DH(hjPYXV6sTh|,@[');
define('SECURE_AUTH_SALT', 'lSVC%&9 VCpHNU>WFwST<>Qas%3t>?]+jyyJ(`kyVK<j|[ s0#dtg8|E9^W{t5j0');
define('LOGGED_IN_SALT',   '6+1^tFg69E`cCAQ2tViWi%2n/Xe`$QPBV3)k|#[Q?hGmZN;GeP=qO3tnafy|:r6w');
define('NONCE_SALT',       '0l0C{5/U,WlSY?LziZ?4O)6V-}z( .zq.6RF/Fl_3%mFtTUV8Ri(ZATa:]CDh_dz');

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
