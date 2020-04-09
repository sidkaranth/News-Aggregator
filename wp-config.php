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

define( 'DB_NAME', '' );


/** MySQL database username */

define( 'DB_USER', '' );


/** MySQL database password */

define( 'DB_PASSWORD', '' );


/** MySQL hostname */

define( 'DB_HOST', '' );


/** Database Charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


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

define('AUTH_KEY',         'bd6195308ffbdb390e00c7d91c2022896d199831d044f060e26a9256c981c5a4');

define('SECURE_AUTH_KEY',  '4fd98b369154ecbc670903ba7b41107bbbbd3905a3857a8037918b9c0db727ba');

define('LOGGED_IN_KEY',    'a8feb1977299391f6227007230db5703382430967c03146a7cea5ff5e256da9f');

define('NONCE_KEY',        'c8b7520ed875eb97b59ee7bab6e342ece6213383338a547e96fc90a49b3e7345');

define('AUTH_SALT',        '9d0b4994fe15fb1eb67bf347ddd5a6d8630cdfe4a296cc256128b3b29620aa39');

define('SECURE_AUTH_SALT', '0f9028213f237a46c2c4542de08e9d8734ddd13fd3ebf7c346d3cff4e6389cca');

define('LOGGED_IN_SALT',   '194eccb334b61e0ed638cc47e290ab9e5122d1c03e7f9c86d8a5cddc6d565390');

define('NONCE_SALT',       'd4632cc9dd0d69bc25f759b9e31e8de4c17ef317ff223251aef60f7f75f92ac6');


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

define( 'WP_DEBUG', false );


/* That's all, stop editing! Happy publishing. */

/**

 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.

 * If you want to access only from an specific domain, you can modify them. For example:

 *  define('WP_HOME','http://example.com');

 *  define('WP_SITEURL','http://example.com');

 *

*/


if ( defined( 'WP_CLI' ) ) {

    $_SERVER['HTTP_HOST'] = 'localhost';

}


define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');

define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');



/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

}


/** Sets up WordPress vars and included files. */

require_once( ABSPATH . 'wp-settings.php' );


define('WP_TEMP_DIR', 'C:\Bitnami\wordpress-5.2.4-1/apps/wordpress/tmp');



//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks

//  More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/


if ( !defined( 'WP_CLI' ) ) {

    // remove x-pingback HTTP header

    add_filter('wp_headers', function($headers) {

        unset($headers['X-Pingback']);

        return $headers;

    });

    // disable pingbacks

    add_filter( 'xmlrpc_methods', function( $methods ) {

            unset( $methods['pingback.ping'] );

            return $methods;

    });

    add_filter( 'auto_update_translation', '__return_false' );

}

