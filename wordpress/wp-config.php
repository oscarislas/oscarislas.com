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
define('DB_NAME', 'hdgwp');

/** MySQL database username */
define('DB_USER', 'wp');

/** MySQL database password */
define('DB_PASSWORD', 'wpuser');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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

define('AUTH_KEY',         '7#|40zQ@&a5pK-ni7sqx_5e^J(+g#CV-,K$k`=Y?(m3<*z|6G?:yV8VaU9Z)6ogy');
define('SECURE_AUTH_KEY',  'R+sU}e^g*Hi4Q~Q4X@&PYth4ut%mYp7~}F&$ghZjtNrjT;;hH|@?If:*oi~&x-]4');
define('LOGGED_IN_KEY',    'x~NU!1mfd5}+Xm6@93!w?tb*;&Yc0eA+Nc$euPLo!L0@2 x]:@~l9rA8#U,kG-Hp');
define('NONCE_KEY',        '|@T@$0B(Y4-_Pv)@uy~FT@;^50Pss=SkD2[Ka&irIn6.mqs.x]~8b%fpk#4-20T>');
define('AUTH_SALT',        'RZ{ls-#MKA-bocNC- D)fS>,~PC+>:OAKfI&Crom4&ADAJ-;_`Vbz*,qA?4T^del');
define('SECURE_AUTH_SALT', '4DwY4a].5L_xo.>uy=R{or*.m=D+9NJRoG_4OtF1uKLT`D8qh3wEvynOl.]IwC/h');
define('LOGGED_IN_SALT',   'Z k1}fHgtZ-[-GZAM]Y+[){}A02Fyj6RH]7Jht$`*{)>,0ys6c#O3-NdO$4X=*f$');
define('NONCE_SALT',       ' $~{ hrPE~Xh./U.AU_bTH[7>RHh*P$Nsb;c>{@#jHm_q|IuIW>>=Z.|teQ#sv[x');

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
