<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define( 'DB_NAME', 'hllacademy_admin2233' );

/** Database username */
define( 'DB_USER', 'hllacademy_user889' );

/** Database password */
define( 'DB_PASSWORD', 'YUVua0+RPtS=' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );


define( 'WP_HOME', 'https://hllacademy.in' );
define( 'WP_SITEURL', 'https://hllacademy.in' );


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
define( 'AUTH_KEY',         'lwmlymctwcd1rydz9yme1oifdhvy0beccm77psxqvrsfz0mdyhxbf5fwit9epmk5' );
define( 'SECURE_AUTH_KEY',  '90cu4phey55xqcygpui1yxsfnrppmwspbxu8dmgbccpfppyvwooddz9qxjavwlzd' );
define( 'LOGGED_IN_KEY',    'q8ojcqakppvbsccnggxg5c0ruo9yur1tgdxsvb3xotunhncjithwulaywzhsnz5l' );
define( 'NONCE_KEY',        '0a9aa6ga5wgsmi5hejraoxy3mpgt6ntfq5ikfjeu54jgfgkpv12zfpewbkgiem4v' );
define( 'AUTH_SALT',        'gmmv5pqx6ulrcb5wsqe5xiw1ydsgxismc9yqwq20vpjztgmtnlylfvsfwdhaejhs' );
define( 'SECURE_AUTH_SALT', 'qwoggo21ixlvekpv4xkncq78vrde3orbjg5lptcor20qu5avy4w06swgbdtwimaf' );
define( 'LOGGED_IN_SALT',   '0cgvcxxqjokzejen03gjfrjkqjoj1u8s0j8nheetxvqtny5zoqjhmdmu5qqoyorg' );
define( 'NONCE_SALT',       'na4zvur8rlignaecaarxwol3s7tefg1snw5iljpvqxuz33qqxakh55igooe7uezv' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpm3_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
