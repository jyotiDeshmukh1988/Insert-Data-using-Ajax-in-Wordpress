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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'woodev' );

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
define( 'AUTH_KEY',         'CdJN*B! B&;,kyoPdC]g:?e{|V#]@K=h96>ac/h}RG} 2-08@+3R]89+@h!8g- 4' );
define( 'SECURE_AUTH_KEY',  'dF*Bm&GJ3,5Mhkm(cJS9qH4C)-b *E My0e/KS5g?AW=_YEqyYz@,EKWC0OC<1qt' );
define( 'LOGGED_IN_KEY',    '_ m|Z<Jz<94)n!AX  =WfD.+JnH&mS*y9|sq<Xf4`)XKnOH~dL~,rMIZgz_RWZCz' );
define( 'NONCE_KEY',        'CxQ>@f[UR:_M;YN-o->wT O{d`I^O)%IX~^?Ca?m$W|$X6;b@i#Tc^9y$7EMknx_' );
define( 'AUTH_SALT',        ',5yfxsCkm`)I5 a%j@,=nfg/Y!%|@D*@Ob(^n!)H!<^E7i;]-(&Y)61D=1PKT)j+' );
define( 'SECURE_AUTH_SALT', 'W48_NEh}18WFdNbSO,npd(q !`W/(:j+m[.TV-(` &a-Vfhp/VXMcv-&<_TJBD?B' );
define( 'LOGGED_IN_SALT',   'J8@K{}#!VSi6J;8orH&Q@4X{][@H0>@6m!2o@J+^ 1`: 0#qRxUzG*@m[@vD6ULA' );
define( 'NONCE_SALT',       'Bp$Yzqd=nehE&`>V b!Le#1Jg3Z^tu4cmibz}y+QVB@Bj0xvIBy4b=>wa-sonBZF' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
