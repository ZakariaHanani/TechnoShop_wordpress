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
define( 'DB_NAME', 'technoshop' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'Wordpress2024' );

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
define( 'AUTH_KEY',         'TZeFbJ-A>^:N~@ m|c0^!Cht_oZrIg}?X+KD.p}uQ533MjXR9T,y+K})h95s}$, ' );
define( 'SECURE_AUTH_KEY',  ' h&~xL>tayod(7^}B1{)j}j0f.j!_M=5D]]0id}/#^,92V3Inli;vh9>DgcV~|.b' );
define( 'LOGGED_IN_KEY',    'He{}Khj5s(:IXjcvT =;xd$2n!Wl,N 3xPJA y}%?.W9c,B2krNmH)NdP=cphp~2' );
define( 'NONCE_KEY',        'Tu&$.Q}t1*k2B<H;Cqrrr[||!EcwNe$V[8cI`r}>5~8@=%<ke~c9}#%<),0|*K/4' );
define( 'AUTH_SALT',        ');EI8l;,FhW5C{m5NxPze{s48w/aZUQ7j5MI.bh)kr&R`Ww+jEiU+pfQDN,sA%89' );
define( 'SECURE_AUTH_SALT', 'Jrq8&){$@clz6J4,p,&w{;v3Uw20+4tG@`g>Ze)BI)q;yFsI7rxm5!sB4Ik&8ep<' );
define( 'LOGGED_IN_SALT',   ']g{CwI(8Dyx@]aT*O2x{5s%MG)@o>A0YVwU8+#0fr@rjkVD$XQ;m=1c@C{:$gmQ+' );
define( 'NONCE_SALT',       '3,(+zE> %cXF,IB}1(aUrB-wRA8Il6B!i*HfP+:MLi!LGExv2E2)G0t,LgXIJ%ef' );

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
