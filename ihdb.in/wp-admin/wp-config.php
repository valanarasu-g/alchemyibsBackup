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



define( 'DB_NAME', 'ihdb_db12222' );

/** Database username */
define( 'DB_USER', 'ihdb_db88889' );

/** Database password */
define( 'DB_PASSWORD', 'M.DT~%=o05iV' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

define( 'WP_HOME', 'https://ihdb.in' );
define( 'WP_SITEURL', 'https://ihdb.in' );

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
define( 'AUTH_KEY',         'az0wkle2p2f0zxrvl1tmiaseufkhlosdipf1re1516zs0mmh8h93b0okfeditb7t' );
define( 'SECURE_AUTH_KEY',  '8vis7qgsqkgbjc8mttamxigvzluak6wakgyg3kjayeovbizl9uqwrm0a7pdul5fv' );
define( 'LOGGED_IN_KEY',    'jx1abbdvkgg1dmpll8zavxxmqdbwfnsh0o6jmiypr3wexfs4ofxrgkovm8hufowi' );
define( 'NONCE_KEY',        'spnsjg2hticdddno3cwjhuhlw9ogepx9tedfbdmylajygsfhff30w1eri3cvdqe4' );
define( 'AUTH_SALT',        'omr6mhp3yqzdpnoocdmz6mnx6zszfq8lbinikorgfirfwkrqmejambpnutse9qvd' );
define( 'SECURE_AUTH_SALT', 'ygvlhydrj3p0frclkoddxbmirfs6w4ct31jitbfgyjxdksmsfckfsfgdn2nozbvw' );
define( 'LOGGED_IN_SALT',   '3vrvrkvyhqu0wmqapfqubceu1wwncfw6x8tpatkuoydja3wtfuvttt1qe2ulj7ob' );
define( 'NONCE_SALT',       'lrogycwmev5jd5u3lncfjep3xho7crz4kdq1rsmihpeuuaaqlks9h6lgp4dwxaqf' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpuf_';

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
