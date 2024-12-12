<?php
namespace um_ext\um_recaptcha\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Enqueue
 * @package um_ext\um_recaptcha\core
 */
class Enqueue {

	/**
	 * Enqueue constructor.
	 */
	public function __construct() {
	}

	/**
	 * reCAPTCHA scripts/styles enqueue
	 */
	public function wp_enqueue_scripts() {
		$suffix = UM()->frontend()->enqueue()::get_suffix();

		wp_register_style( 'um-recaptcha', UM_RECAPTCHA_URL . 'assets/css/um-recaptcha' . $suffix . '.css', array(), UM_RECAPTCHA_VERSION );
		wp_enqueue_style( 'um-recaptcha' );

		$version = UM()->options()->get( 'g_recaptcha_version' );
		switch ( $version ) {
			case 'v3':
				$site_key = UM()->options()->get( 'g_reCAPTCHA_site_key' );

				wp_register_script( 'google-recapthca-api-v3', "https://www.google.com/recaptcha/api.js?render=$site_key", array(), '3.0', false );
				wp_register_script( 'um-recaptcha', UM_RECAPTCHA_URL . 'assets/js/um-recaptcha' . $suffix . '.js', array( 'jquery', 'google-recapthca-api-v3' ), UM_RECAPTCHA_VERSION, true );

				break;
			case 'v2':
			default:
				$language_code = UM()->options()->get( 'g_recaptcha_language_code' );
				$language_code = apply_filters( 'um_recaptcha_language_code', $language_code );

				$site_key = UM()->options()->get( 'g_recaptcha_sitekey' );

				wp_register_script( 'google-recapthca-api-v2', "https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=$language_code", array(), '2.0', false );
				wp_register_script( 'um-recaptcha', UM_RECAPTCHA_URL . 'assets/js/um-recaptcha' . $suffix . '.js', array( 'jquery', 'google-recapthca-api-v2' ), UM_RECAPTCHA_VERSION, true );

				break;
		}

		wp_localize_script(
			'um-recaptcha',
			'umRecaptchaData',
			array(
				'version'  => $version,
				'site_key' => $site_key,
			)
		);

		wp_enqueue_script( 'um-recaptcha' );
	}
}
