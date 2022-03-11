<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_demo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'fA4%1oYc?!Y%^n}kDyVIzyGfnpQ^et-GT[L,FTEF1~cLuOh;`NM9F8I1aS/{)6vu' );
define( 'SECURE_AUTH_KEY',  '.nKmu }Smn>DF?yS&!_+W~M,W[yE2yRpzK@2[6b+S.R)q=/%~zEBv%-NXO|81o^#' );
define( 'LOGGED_IN_KEY',    ';)yZU 2OD7Mas!z/^tFF(,H]4SFDj<k%GaB6v_a{zg2K@Ao2^+h|v8az,9P(Pd>T' );
define( 'NONCE_KEY',        ';T*Mo*IWRZ{G@JIDh)(=y_},(7QW`+`_^Mn~s+]27:G8X.[*Z1A<:YO)$Fs7{&L3' );
define( 'AUTH_SALT',        'eH6wk]9-X<Ucj7TsiR:h5=0Xb|dDFHgCyN&WfYLqrN9og1sU6Lqk}yAP2znAw1#x' );
define( 'SECURE_AUTH_SALT', '3/Ant` 21zrh|;KhL_^4>[VAvMje4wowZ4CeQlWeaG k~V{z9IT IqPj=H+P5Pg+' );
define( 'LOGGED_IN_SALT',   'xE%!vNpi%e%[VOhJa))*K)VJs1KMRB+64Ab|JJBG26HY#7daYfD!7!KZ7BSlL53/' );
define( 'NONCE_SALT',       '2UzX{W2DQ72k:EvwJ)Yp,38!.?nQ>x>MYg;Vp9IKy=bR!<(p!4LHC JSU)*Q?t*;' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
