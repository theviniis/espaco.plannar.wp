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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'p43shzOCfMplXj+FUr/ktwrTrd/0b3dgH9MDscVCmJ/o0uUQqgDcNQMTeY4uuqTZAI68XA4UW8NRW3TvyiBQ9w==');
define('SECURE_AUTH_KEY',  'zP/1MnPwg98QMYpJY5Tled/cxILjmzO/iUJaB1qaActpHBrlPcVleE5WhlKmfjDolvAIuXK2N6RpMTiMqrbGUQ==');
define('LOGGED_IN_KEY',    '0wssDEZRGcJPBdrsIsb27WvPFkoKED335af0W7v9BV0WMJ8/8rJIFAe30DnJEahiTJZ2v+09vexcMYm7pBHz3Q==');
define('NONCE_KEY',        'EeJghwD3jGgMrwzarUxSDkVlTOnMkNiFwi08P5xatLGnxTDkZAu0LmVhp6FIDanQVsv2nigVDa3FV6rPHfFsiQ==');
define('AUTH_SALT',        'a45C7+UMgIhaQDtkVMiuJdhnyCwovnH+t77x2BGgXnySUQYJonnfb1xpCSdmNEYR1rlbnM0J1wQ96ntNLMewkg==');
define('SECURE_AUTH_SALT', 'W6v0RUZ3EgZbWSd4iHGp+2brbhzyIlcNfRyaxQKc6pg6O6pA/eVr5fk0/rjJPdn7afeeLbDkCnaij80Bt0j2cQ==');
define('LOGGED_IN_SALT',   'xor5O6DUzWF8mVQBiubeJ0oDFloVNAZozTZsrdjGsJHY//enFAPcxxHqK38mh7Xnbb0eDTIR7/tkqGYghypKNw==');
define('NONCE_SALT',       'Bk6ylnlxulb0gA+Fdk7RcPnqnaZOa1ItbjQ0SUIW6A3fwHAv8/oxtqd72pnII67hDCoI7e/z7jwtyEOqDxM6hQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
