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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nails_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '3!5g=!-R;o3SiQ1?]WN{pL]J.4`&x>Y**dggQg(sEeI E,li Q4?e3DbZ66#cJ7 ' );
define( 'SECURE_AUTH_KEY',  'V}tBy_0>R`3WbWf`,N09h5ZW mA~}eJ]o;ZStLXFyE}nNt#g>bM[%b%(A78UxnNd' );
define( 'LOGGED_IN_KEY',    '.9>rO|pg 4n6,Fk%gDA9[D 25Fv!1) &K0|Fy+Qcb2i`:CR51h=f=Ycy&;x!Hb$~' );
define( 'NONCE_KEY',        'iAq_Nq8qKGa}pPchN!Mz@u}v8rA^Y#g$)>7}^RM8o|Ue9}h6fS_o*^FBNDVux[[A' );
define( 'AUTH_SALT',        'M@7|99gbdAF,S}J-|dF<m,D,Npg5*d4+J-/vdnc!%Ik#+Vm;9*%9p&A|?aS@W6Q|' );
define( 'SECURE_AUTH_SALT', '+luE;1j5M5|.)*Q<fCyUp59Q *JW*h5VRUv^K;Uz80g~0ZT`K;s)d&4-~R.7(ypF' );
define( 'LOGGED_IN_SALT',   '_/tPVU_|(mvp2G,fwlaLl9r#_Y&8jBlRtYUy4CaU?*~e)0hob@Q,({kliOKL+R,%' );
define( 'NONCE_SALT',       'O+lG$EP]z.b-/$D)C+yvFlZ8M3qt>fLcnt9A7Zw-Gb]eU`_Ou<UUf=#@E^Vie27{' );

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
