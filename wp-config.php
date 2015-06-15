<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'local_wlhouses');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '5JBDhFFI7Ir0TGB6wRtG4CxlN7d1Bt37GmCezVrNaK3YAwrUqEjIoQwJF0ZJYKIG');

define('SECURE_AUTH_KEY',  'cBp9dGhnNuc6MXlQZn56L4h2OiE9D5KNdzk7ufB020GnuupsGYfT2cZUSy2JqXCC');

define('LOGGED_IN_KEY',    '87GmeSd8tpSHs2QknaSkBMFZJUN8sVqvinagwhWtvXVYrdFMkq7uFAEzEeNXaGYI');

define('NONCE_KEY',        'n0mN3EHH6yXNAE5UfJzo4i8al4wVSmHjzfAQGRcjxJRBkO0uu205DFRs1FJVIpRn');

define('AUTH_SALT',        'zAKpIIaFvpWWaLLSfojg442yeEaTYNIedgCR4vPjtyddO1G0SXKSTanXzQr8C8ST');

define('SECURE_AUTH_SALT', 'F7uMYAhqhLqBhNsRqXo2UFVEVtK2b1jF4NQGmXxm5hJzVKweEqRIir5x3N0U0f83');

define('LOGGED_IN_SALT',   'QkNq4H6oBMpIeaAK5Y1I4gA8vdhRdcD1917bYRwidmrU81skMUnxHiyJXQcCKxoZ');

define('NONCE_SALT',       'TdOU7wCSeVPrpqKRQokrF7M7zoxBlbRfiHObEr4v2SBheTF8Aee2wr5moNV1vniU');



/**

 * Other customizations.

 */

define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');



/**

 * Turn off automatic updates since these are managed upstream.

 */

define('AUTOMATIC_UPDATER_DISABLED', true);



/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fmee_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
