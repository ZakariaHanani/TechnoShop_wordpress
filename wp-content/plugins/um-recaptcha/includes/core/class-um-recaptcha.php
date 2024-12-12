<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class UM_ReCAPTCHA
 */
class UM_ReCAPTCHA {

	/**
	 * For backward compatibility with 1.3.x and PHP8.2 compatibility.
	 *
	 * @var bool
	 */
	public $plugin_inactive = false;

	/**
	 * @var
	 */
	private static $instance;

	/**
	 * @return UM_ReCAPTCHA
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * UM_ReCAPTCHA constructor.
	 */
	public function __construct() {
		// Global for backwards compatibility.
		$GLOBALS['um_recaptcha'] = $this;
		add_filter( 'um_call_object_ReCAPTCHA', array( &$this, 'get_this' ) );
		add_filter( 'um_settings_default_values', array( &$this, 'default_settings' ), 10, 1 );

		if ( UM()->is_request( 'admin' ) ) {
			$this->admin();
		}

		add_action( 'plugins_loaded', array( &$this, 'init' ), 0 );
	}

	/**
	 * @return $this
	 */
	public function get_this() {
		return $this;
	}

	/**
	 * @param $defaults
	 *
	 * @return array
	 */
	public function default_settings( $defaults ) {
		$defaults = array_merge( $defaults, $this->setup()->settings_defaults );
		return $defaults;
	}

	/**
	 * @return um_ext\um_recaptcha\core\Setup()
	 */
	public function setup() {
		if ( empty( UM()->classes['um_recaptcha_setup'] ) ) {
			UM()->classes['um_recaptcha_setup'] = new um_ext\um_recaptcha\core\Setup();
		}
		return UM()->classes['um_recaptcha_setup'];
	}

	/**
	 * @return um_ext\um_recaptcha\core\Enqueue()
	 */
	public function enqueue() {
		if ( empty( UM()->classes['um_recaptcha_enqueue'] ) ) {
			UM()->classes['um_recaptcha_enqueue'] = new um_ext\um_recaptcha\core\Enqueue();
		}
		return UM()->classes['um_recaptcha_enqueue'];
	}

	/**
	 * @return um_ext\um_recaptcha\admin\Init()
	 */
	public function admin() {
		if ( empty( UM()->classes['um_recaptcha_admin_init'] ) ) {
			UM()->classes['um_recaptcha_admin_init'] = new um_ext\um_recaptcha\admin\Init();
		}
		return UM()->classes['um_recaptcha_admin_init'];
	}

	/**
	 * Init
	 */
	public function init() {
		/** @noinspection PhpIncludeInspection */
		require_once UM_RECAPTCHA_PATH . 'includes/core/actions/um-recaptcha-form.php';
	}

	/**
	 * Captcha allowed
	 *
	 * @param $args
	 *
	 * @return bool
	 */
	public function captcha_allowed( $args ) {
		$enable = false;

		$recaptcha    = UM()->options()->get( 'g_recaptcha_status' );
		$your_sitekey = UM()->options()->get( 'g_recaptcha_sitekey' ) || UM()->options()->get( 'g_reCAPTCHA_site_key' );
		$your_secret  = UM()->options()->get( 'g_recaptcha_secretkey' ) || UM()->options()->get( 'g_reCAPTCHA_secret_key' );

		if ( $recaptcha ) {
			$enable = true;
		}

		if ( isset( $args['g_recaptcha_status'] ) ) {
			$enable = (bool) $args['g_recaptcha_status'];
		}

		if ( ! $your_sitekey || ! $your_secret ) {
			$enable = false;
		}

		if ( isset( $args['mode'] ) && 'password' === $args['mode'] && ! UM()->options()->get( 'g_recaptcha_password_reset' ) ) {
			$enable = false;
		}

		return ( false === $enable ) ? false : true;
	}

	/**
	 * @return array
	 */
	public function error_codes_list() {
		$error_codes = array(
			'missing-input-secret'   => __( '<strong>Error</strong>: The secret parameter is missing.', 'um-recaptcha' ),
			'invalid-input-secret'   => __( '<strong>Error</strong>: The secret parameter is invalid or malformed.', 'um-recaptcha' ),
			'missing-input-response' => __( '<strong>Error</strong>: The response parameter is missing.', 'um-recaptcha' ),
			'invalid-input-response' => __( '<strong>Error</strong>: The response parameter is invalid or malformed.', 'um-recaptcha' ),
			'bad-request'            => __( '<strong>Error</strong>: The request is invalid or malformed.', 'um-recaptcha' ),
			'timeout-or-duplicate'   => __( '<strong>Error</strong>: The response is no longer valid: either is too old or has been used previously.', 'um-recaptcha' ),
			'undefined'              => __( '<strong>Error</strong>: Undefined reCAPTCHA error.', 'um-recaptcha' ),
		);

		return $error_codes;
	}

	public function get_v3_score( $args = array(), $form_data = array() ) {
		$score = UM()->options()->get( 'g_reCAPTCHA_score' );

		if ( ! empty( $form_data['g_recaptcha_score'] ) ) {
			// use form setting for score
			$score = $form_data['g_recaptcha_score'];
		}

		if ( empty( $score ) ) {
			// It's a fallback. Set default 0.6 because Google recommend by default set 0.5 score
			// https://developers.google.com/recaptcha/docs/v3#interpreting_the_score
			$score = 0.6;
		}

		/**
		 * Filters the Google reCAPTCHA score.
		 *
		 * @param {float} $score     Google reCAPTCHA score. Number from 0 to 1.
		 * @param {array} $args      Submission arguments.
		 * @param {array} $form_data UM Form data.
		 *
		 * @return {float} Google reCAPTCHA score.
		 *
		 * @since 2.3.8
		 * @hook um_recaptcha_score_validation
		 *
		 * @example <caption>Change the Google reCAPTCHA score.</caption>
		 * function my_um_recaptcha_score_validation( $score, $args, $form_data ) {
		 *     $score = 0.8;
		 *     return $score;
		 * }
		 * add_filter( 'um_recaptcha_score_validation', 'my_um_recaptcha_score_validation', 10, 3 );
		 */
		return apply_filters( 'um_recaptcha_score_validation', $score, $args, $form_data );
	}

	/**
	 * @param string $secret
	 * @param string $client_response
	 * @param string $context
	 * @param array  $args
	 *
	 * @return mixed|string
	 */
	public function remote_request( $secret, $client_response, $context = '', $args = array() ) {
		$user_ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';

		$response = wp_remote_get( "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$client_response&remoteip=$user_ip" );

		$hook_args = compact( 'response', 'context', 'args', 'client_response' );
		/**
		 * Fires just after remote request to Google reCAPTCHA API.
		 *
		 * @param {array|WP_Error} $response        The response or WP_Error on failure.
		 *                                          See WP_Http::request() for information on return value.
		 * @param {string}         $context         Request context. Can be equals `wp_register_form`, `wp_lostpassword_form`, `wp_login_form`, `um_form_shortcode`, `um_reset_password_shortcode`.
		 * @param {array}          $args            Additional arguments passed to `remote_request()` function depends on `$context`.
		 * @param {string}         $client_response reCAPTCHA client side response.
		 *
		 * @since 2.3.8
		 * @hook um_recaptcha_api_response
		 *
		 * @example <caption>Make something custom after API response.</caption>
		 * function my_custom_recaptcha_api_response( $response, $context, $args, $client_response ) {
		 *     // do something custom
		 * }
		 * add_action( 'um_recaptcha_api_response', 'my_custom_recaptcha_api_response', 10, 2 );
		 */
		do_action_ref_array( 'um_recaptcha_api_response', $hook_args );

		$result = wp_remote_retrieve_body( $response );
		if ( empty( $result ) ) {
			return '';
		}

		return json_decode( $result );
	}
}

//create class var
add_action( 'plugins_loaded', 'um_init_recaptcha', -10 );
function um_init_recaptcha() {
	if ( function_exists( 'UM' ) ) {
		UM()->set_class( 'ReCAPTCHA', true );
	}
}
