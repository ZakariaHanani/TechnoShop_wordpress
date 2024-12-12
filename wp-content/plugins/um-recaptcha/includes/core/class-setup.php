<?php
namespace um_ext\um_recaptcha\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Setup
 * @package um_ext\um_recaptcha\core
 */
class Setup {

	/**
	 * @var array
	 */
	public $settings_defaults;

	/**
	 * Setup constructor.
	 */
	public function __construct() {
		//settings defaults
		$this->settings_defaults = array(
			'g_recaptcha_status'               => 1,

			/* reCAPTCHA v3 */
			'g_reCAPTCHA_site_key'             => '',
			'g_reCAPTCHA_secret_key'           => '',
			'g_reCAPTCHA_score'                => '0.9',

			/* reCAPTCHA v2 */
			'g_recaptcha_sitekey'              => '',
			'g_recaptcha_secretkey'            => '',

			'g_recaptcha_language_code'        => 'en',
			'g_recaptcha_theme'                => 'light',
			'g_recaptcha_type'                 => 'image',
			'g_recaptcha_size'                 => 'normal',
			'g_recaptcha_password_reset'       => 0,
			'g_recaptcha_wp_lostpasswordform'  => 0,
			'g_recaptcha_wp_login_form'        => 0,
			'g_recaptcha_wp_login_form_widget' => 0,
			'g_recaptcha_wp_register_form'     => 0,
		);
	}

	/**
	 *
	 */
	private function set_default_settings() {
		$options = get_option( 'um_options', array() );
		foreach ( $this->settings_defaults as $key => $value ) {
			//set new options to default
			if ( ! isset( $options[ $key ] ) ) {
				$options[ $key ] = $value;
			}
		}

		update_option( 'um_options', $options );
	}

	/**
	 *
	 */
	public function run_setup() {
		$this->set_default_settings();
	}
}
