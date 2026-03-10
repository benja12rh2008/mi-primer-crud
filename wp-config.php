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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mi-proyecto' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Nu2]nY9=_@c}]v$?C+,]R $3i#;iwP^nL@Q7Gu2[A9]eth]S1h$x`oI)2C`@wp{B' );
define( 'SECURE_AUTH_KEY',  'Z:_yF$Ch34]Ub*=1DY3B2+mFIp_$JzW<Gr]^2:6+[Np~6i_u<<H[/TS!:I!B.Dfv' );
define( 'LOGGED_IN_KEY',    'ptvEovs<zaSj<m>=G^Uv?H.J1TF&[BF*{17q5~jjl VZ)R7PZ}M/=~gJZ$U^C[Nd' );
define( 'NONCE_KEY',        '|^a/E]N/cj|mh!3hU7D(o/o.p`db~_k.D!e-H5&H. L{rk 8tRTmikoWJHwEdIfs' );
define( 'AUTH_SALT',        '4C:ajwL56tMHMa!F2s!?(GC/N|;B)VGS@yA8LF^.Hn*lO(QpN4O4sw75m<8qq;O>' );
define( 'SECURE_AUTH_SALT', '$|0[u4j(X@1H xf%l6E_Lb>cmJ80-$##lcvAHYeT)w6^Jc( (()@ [[Yp:#4(Y0W' );
define( 'LOGGED_IN_SALT',   's+d5G0*DMOu_bL8(~7NL{8k>z#jQy{$kkd*Tl{>9Dr+v;N%!XbTs19(#]T*f1}0o' );
define( 'NONCE_SALT',       '=9Iu^F*9(5?Pojr&`xBz:oZ7D?*7/u4tguvKqCCCh@o.De,PDz{,vr1D>])Vh?R]' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
