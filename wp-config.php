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
define( 'DB_NAME', 'design-studio' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_R(Nmf08I(FI9}~iOMw-G<vc/L>.JcpU}JD&RBdHnU@Q|L)^@1vh!u,YC4>$[p#)' );
define( 'SECURE_AUTH_KEY',  '0{=a5xB2Px12_l3MuBhWT><u0m!*}?Qh+Q<`kmrX}nTP;Jq8fwpm%cy_YSsVCZDI' );
define( 'LOGGED_IN_KEY',    '%tJ*Cb>{jCzANh1fTFsGHqo;{d_hVQ%zFto#wNtd|@e{Rjqv-c4#j-EqX92,7#[R' );
define( 'NONCE_KEY',        'ihzqDo*S|9FW?Xi&n~A-w~H~rQ#KW(O=KF[s,qH8%v5Cq/nwZxvULT(I@D4?$%Zv' );
define( 'AUTH_SALT',        'Kw6J5_4Cn6.HM6!olb2f.?;z6EbG6%7}qVC#|uJG,FHZlWxY|,lnT$|jX{a13Sh`' );
define( 'SECURE_AUTH_SALT', '`X)8g0JtW)Cv&!Kcy(.@gE-Y2IoM`(^t|L5UNq/tSw/Lc<_BmSUps9Y%UW&7m84U' );
define( 'LOGGED_IN_SALT',   'Yw{d|~UPcp!SBRUoBOW)_o<!RGkgw2z8QCpkannHiGkL:1K$G`PE2/9[!abc(Kbq' );
define( 'NONCE_SALT',       'h)w6kbdXP4Mo^FLHDOZ)hE`f$~qn#?}7/|u[SGYWao4(j_,TW.c@8[`l|O?P^[!j' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

// define( 'WP_DEBUG', false );

define('WP_DEBUG', true); //true - wordpress prints mistakes, errors.
define('WP_DEBUG_DISPLAY', false); //false - doesn't print errors publicly .
define('WP_DEBUG_LOG', true); //true - creates log file that only me can access.

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );