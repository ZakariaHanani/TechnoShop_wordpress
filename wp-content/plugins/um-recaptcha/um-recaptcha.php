<?php
/**
 * Plugin Name: Ultimate Member - reCAPTCHA
 * Plugin URI: https://ultimatemember.com/extensions/google-recaptcha/
 * Description: Protect your website from spam and integrate Google reCAPTCHA into your Ultimate Member forms
 * Version: 2.3.8
 * Author: Ultimate Member
 * Author URI: http://ultimatemember.com/
 * Text Domain: um-recaptcha
 * Domain Path: /languages
 * Requires at least: 5.5
 * Requires PHP: 5.6
 * Requires Plugins: ultimate-member
 * UM version: 2.7.0
 *
 * @package UM_reCAPTCHA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ABSPATH . 'wp-admin/includes/plugin.php';

$plugin_data = get_plugin_data( __FILE__, true, false );

define( 'UM_RECAPTCHA_URL', plugin_dir_url( __FILE__ ) );
define( 'UM_RECAPTCHA_PATH', plugin_dir_path( __FILE__ ) );
define( 'UM_RECAPTCHA_PLUGIN', plugin_basename( __FILE__ ) );
define( 'UM_RECAPTCHA_EXTENSION', $plugin_data['Name'] );
define( 'UM_RECAPTCHA_VERSION', $plugin_data['Version'] );
define( 'UM_RECAPTCHA_TEXTDOMAIN', 'um-recaptcha' );

define( 'UM_RECAPTCHA_REQUIRES', '2.7.0' );

function um_recaptcha_plugins_loaded() {
	$locale = ( '' !== get_locale() ) ? get_locale() : 'en_US';
	load_textdomain( UM_RECAPTCHA_TEXTDOMAIN, WP_LANG_DIR . '/plugins/' . UM_RECAPTCHA_TEXTDOMAIN . '-' . $locale . '.mo' );
	load_plugin_textdomain( UM_RECAPTCHA_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'um_recaptcha_plugins_loaded', 0 );

add_action( 'plugins_loaded', 'um_recaptcha_check_dependencies', -20 );

if ( ! function_exists( 'um_recaptcha_check_dependencies' ) ) {
	function um_recaptcha_check_dependencies() {
		if ( ! defined( 'um_path' ) || ! file_exists( um_path . 'includes/class-dependencies.php' ) ) {
			//UM is not installed
			function um_recaptcha_dependencies() {
				$allowed_html = array(
					'a'      => array(
						'href'   => array(),
						'target' => true,
					),
					'strong' => array(),
				);
				// translators: %s: Google reCAPTCHA extension name
				echo '<div class="error"><p>' . wp_kses( sprintf( __( 'The <strong>%s</strong> extension requires the Ultimate Member plugin to be activated to work properly. You can download it <a href="https://wordpress.org/plugins/ultimate-member">here</a>', 'um-recaptcha' ), UM_RECAPTCHA_EXTENSION ), $allowed_html ) . '</p></div>';
			}

			add_action( 'admin_notices', 'um_recaptcha_dependencies' );
		} else {

			if ( ! function_exists( 'UM' ) ) {
				require_once um_path . 'includes/class-dependencies.php';
				$is_um_active = um\is_um_active();
			} else {
				$is_um_active = UM()->dependencies()->ultimatemember_active_check();
			}

			if ( ! $is_um_active ) {
				//UM is not active
				function um_recaptcha_dependencies() {
					$allowed_html = array(
						'a'      => array(
							'href'   => array(),
							'target' => true,
						),
						'strong' => array(),
					);
					// translators: %s: Google reCAPTCHA extension name
					echo '<div class="error"><p>' . wp_kses( sprintf( __( 'The <strong>%s</strong> extension requires the Ultimate Member plugin to be activated to work properly. You can download it <a href="https://wordpress.org/plugins/ultimate-member">here</a>', 'um-recaptcha' ), UM_RECAPTCHA_EXTENSION ), $allowed_html ) . '</p></div>';
				}

				add_action( 'admin_notices', 'um_recaptcha_dependencies' );

			} elseif ( true !== UM()->dependencies()->compare_versions( UM_RECAPTCHA_REQUIRES, UM_RECAPTCHA_VERSION, 'recaptcha', UM_RECAPTCHA_EXTENSION ) ) {
				//UM old version is active
				function um_recaptcha_dependencies() {
					$allowed_html = array(
						'strong' => array(),
					);
					// translators: %s: Google reCAPTCHA extension name
					echo '<div class="error"><p>' . wp_kses( UM()->dependencies()->compare_versions( UM_RECAPTCHA_REQUIRES, UM_RECAPTCHA_VERSION, 'recaptcha', UM_RECAPTCHA_EXTENSION ), $allowed_html ) . '</p></div>';
				}

				add_action( 'admin_notices', 'um_recaptcha_dependencies' );

			} else {
				require_once UM_RECAPTCHA_PATH . 'includes/core/class-um-recaptcha.php';
			}
		}
	}
}


register_activation_hook( UM_RECAPTCHA_PLUGIN, 'um_recaptcha_activation_hook' );
function um_recaptcha_activation_hook() {
	//first install
	$version = get_option( 'um_recaptcha_version' );
	if ( ! $version ) {
		update_option( 'um_recaptcha_last_version_upgrade', UM_RECAPTCHA_VERSION );
	}

	if ( UM_RECAPTCHA_VERSION !== $version ) {
		update_option( 'um_recaptcha_version', UM_RECAPTCHA_VERSION );
	}

	//run setup
	if ( ! class_exists( 'um_ext\um_recaptcha\core\Setup' ) ) {
		require_once UM_RECAPTCHA_PATH . 'includes/core/class-setup.php';
	}

	$recaptcha_setup = new um_ext\um_recaptcha\core\Setup();
	$recaptcha_setup->run_setup();
}
