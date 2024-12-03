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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define('WP_MEMORY_LIMIT','2048M'); 

define( 'DB_NAME', 'rockpapersalon_adminDB' );

/** Database username */
define( 'DB_USER', 'rockpapersalon_adminUser' );

/** Database password */
define( 'DB_PASSWORD', 'vjy1R%!k88$i' );

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
define( 'AUTH_KEY',         '8vari3iu4kns1jsfeqdnpxxqvmpfx6kxq3zpekfdrnlyb2zxfv8q0kdzri1pbbhc' );
define( 'SECURE_AUTH_KEY',  'pquksr8me054gavd8krwkemwqgkntneobnw5nqyhaj5pb56jd7bwmpn7ltwk7eoc' );
define( 'LOGGED_IN_KEY',    'klvuwqltwz1po5kfauxv14ngidkkr2y4focuwk34lg22o2nxraojnhqvehv9yl6u' );
define( 'NONCE_KEY',        '1rwrh3uje1baafc4k4hufgg66apdz5e9zezjtj7tq87jj6fwfkxeoiqwanerufg5' );
define( 'AUTH_SALT',        'din75yr16x0one6d5022vfzpva2re0zcwz1vkhmbtu2uiworawlhowvazblfolfd' );
define( 'SECURE_AUTH_SALT', 'ggzo4bmtw5uqyrk5t6vx0mja1guzw8j8vau8r2hknjg91rcwmoschd1yjqub0nl7' );
define( 'LOGGED_IN_SALT',   'kc8w7brbrssumeysb5rdm6eqjumw5chsxxhoqyrib4opnncdkhfral3kbhge9ee7' );
define( 'NONCE_SALT',       '3vdmbwxkh7sne6wmbu5mmhxexptqaqks8lrurjxpxqkfah6k6zitdncqk17mfxpk' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpup_';

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
