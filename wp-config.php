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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         ')wg,qwXVwr]Rf_!lSL1tilm-AmR49zJYeQOXR`td9%sQTxD]uT#j=;s4l|2<X|k8' );
define( 'SECURE_AUTH_KEY',  'g9h|&%#)(`,ZJ:<EV1!5Cy2=93F ByET7U*tmA_{|]$C@yuG7OTN=:oOv?P^^!g3' );
define( 'LOGGED_IN_KEY',    'e{bg91w_MqnxVt,9%e0T}G:a2G^l+=_ovU9&]711jQwO7t:Hvouv^l9%kOhC.>TK' );
define( 'NONCE_KEY',        '}W`W+J4>?V};f)(DXxE:^4ONcf}IUK|rcsxT3F|Gk$5kgaop8&%K]JhwA(alK2u#' );
define( 'AUTH_SALT',        'Lb<P*E+*#v=nv5ELy4B[F,};zDr`or@|P}moK@f^[8~)@$$RWc9F3@Cwd%JXW25)' );
define( 'SECURE_AUTH_SALT', '>>|LlaW9 T Z*@<:%{2@tzI3f5^Ofwp3#Y)G6c<;B{3T330r dXa_VL^xgM[Rs?K' );
define( 'LOGGED_IN_SALT',   '(YMnzHLAp5]BgHE3Nb9uj?Q!tNIIgX;L<b[QGp}gM/17nuMs?Bel,b_45JQ@?qZ8' );
define( 'NONCE_SALT',       'a%F6/X.lL+smjsO=b45b?Bs&.mGojKnr)*G9U~SB<W3v:y#cMkk}o0AuP0&@T8.Q' );

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
