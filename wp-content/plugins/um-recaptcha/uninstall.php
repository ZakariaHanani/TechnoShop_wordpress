<?php
/**
 * Uninstall UM Recaptcha
 *
 */

// Exit if accessed directly.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}


if ( ! defined( 'UM_RECAPTCHA_PATH' ) ) {
	define( 'UM_RECAPTCHA_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'UM_RECAPTCHA_URL' ) ) {
	define( 'UM_RECAPTCHA_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'UM_RECAPTCHA_PLUGIN' ) ) {
	define( 'UM_RECAPTCHA_PLUGIN', plugin_basename( __FILE__ ) );
}

$options = get_option( 'um_options', array() );
if ( ! empty( $options['uninstall_on_delete'] ) ) {
	if ( ! class_exists( 'um_ext\um_recaptcha\core\Setup' ) ) {
		/** @noinspection PhpIncludeInspection */
		require_once UM_RECAPTCHA_PATH . 'includes/core/class-setup.php';
	}

	$recaptcha_setup = new um_ext\um_recaptcha\core\Setup();

	//remove settings
	foreach ( $recaptcha_setup->settings_defaults as $k => $v ) {
		unset( $options[ $k ] );
	}

	update_option( 'um_options', $options );

	delete_option( 'um_recaptcha_last_version_upgrade' );
	delete_option( 'um_recaptcha_version' );
}
