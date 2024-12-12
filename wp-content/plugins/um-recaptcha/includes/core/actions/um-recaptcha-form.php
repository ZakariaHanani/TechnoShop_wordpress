<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* Handle reCAPTCHA via wp-login.php */


/**
 * Add classes on wp-login.php page
 *
 * @param $classes
 * @param $action
 *
 * @return array
 */
function um_add_recaptcha_login_form_classes( $classes, $action ) {
	$recaptcha = UM()->options()->get( 'g_recaptcha_status' );
	if ( ! $recaptcha ) {
		return $classes;
	}

	$your_sitekey = UM()->options()->get( 'g_recaptcha_sitekey' ) || UM()->options()->get( 'g_reCAPTCHA_site_key' );
	$your_secret  = UM()->options()->get( 'g_recaptcha_secretkey' ) || UM()->options()->get( 'g_reCAPTCHA_secret_key' );

	if ( ! $your_sitekey || ! $your_secret ) {
		return $classes;
	}

	if ( ( 'login' === $action && UM()->options()->get( 'g_recaptcha_wp_login_form' ) ) || ( ( 'lostpassword' === $action || 'retrievepassword' === $action ) && UM()->options()->get( 'g_recaptcha_wp_lostpasswordform' ) ) || ( 'register' === $action && UM()->options()->get( 'g_recaptcha_wp_register_form' ) ) ) {
		$version = UM()->options()->get( 'g_recaptcha_version' );
		if ( 'v3' === $version ) {
			return $classes;
		}

		$type = UM()->options()->get( 'g_recaptcha_size' );
		if ( 'invisible' === $type ) {
			return $classes;
		}

		$classes[] = ( 'normal' === $type ) ? 'has-normal-um-recaptcha' : 'has-compact-um-recaptcha';
	}

	return $classes;
}
add_filter( 'login_body_class', 'um_add_recaptcha_login_form_classes', 10, 2 );


/**
 * Enqueue assets on wp-login.php page
 */
function um_login_form_scripts() {
	$recaptcha = UM()->options()->get( 'g_recaptcha_status' );
	if ( ! $recaptcha ) {
		return;
	}

	$your_sitekey = UM()->options()->get( 'g_recaptcha_sitekey' ) || UM()->options()->get( 'g_reCAPTCHA_site_key' );
	$your_secret  = UM()->options()->get( 'g_recaptcha_secretkey' ) || UM()->options()->get( 'g_reCAPTCHA_secret_key' );

	if ( ! $your_sitekey || ! $your_secret ) {
		return;
	}

	if ( ! ( UM()->options()->get( 'g_recaptcha_wp_login_form' ) || UM()->options()->get( 'g_recaptcha_wp_lostpasswordform' ) || UM()->options()->get( 'g_recaptcha_wp_register_form' ) ) ) {
		return;
	}

	$suffix = UM()->frontend()->enqueue()::get_suffix();

	wp_register_style( 'um-recaptcha', UM_RECAPTCHA_URL . 'assets/css/wp-recaptcha' . $suffix . '.css', array(), UM_RECAPTCHA_VERSION );
	wp_enqueue_style( 'um-recaptcha' );

	$version = UM()->options()->get( 'g_recaptcha_version' );
	switch ( $version ) {
		case 'v3':
			$site_key = UM()->options()->get( 'g_reCAPTCHA_site_key' );

			wp_register_script( 'google-recaptcha-api-v3', "https://www.google.com/recaptcha/api.js?render=$site_key", array(), '3.0', false );
			wp_register_script( 'um-recaptcha', UM_RECAPTCHA_URL . 'assets/js/wp-recaptcha' . $suffix . '.js', array( 'jquery', 'google-recaptcha-api-v3' ), UM_RECAPTCHA_VERSION, true );

			wp_localize_script(
				'um-recaptcha',
				'umRecaptchaData',
				array(
					'site_key' => $site_key,
				)
			);

			wp_enqueue_script( 'um-recaptcha' );
			break;
		case 'v2':
		default:
			$language_code = UM()->options()->get( 'g_recaptcha_language_code' );
			$language_code = apply_filters( 'um_recaptcha_language_code', $language_code );

			wp_register_script( 'google-recaptcha-api-v2', "https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=$language_code", array( 'jquery' ), '2.0', false );
			wp_enqueue_script( 'google-recaptcha-api-v2' );
			break;
	}
}
add_action( 'login_enqueue_scripts', 'um_login_form_scripts' );


/**
 * Add reCAPTCHA block to the wp-login.php page
 */
function um_add_recaptcha_wp_login_form() {
	if ( ! UM()->options()->get( 'g_recaptcha_wp_login_form' ) ) {
		return;
	}

	$recaptcha = UM()->options()->get( 'g_recaptcha_status' );
	if ( ! $recaptcha ) {
		return;
	}

	$your_sitekey = UM()->options()->get( 'g_recaptcha_sitekey' ) || UM()->options()->get( 'g_reCAPTCHA_site_key' );
	$your_secret  = UM()->options()->get( 'g_recaptcha_secretkey' ) || UM()->options()->get( 'g_reCAPTCHA_secret_key' );

	if ( ! $your_sitekey || ! $your_secret ) {
		return;
	}

	$version = UM()->options()->get( 'g_recaptcha_version' );

	switch ( $version ) {
		case 'v3':
			UM()->get_template( 'wp-captcha-v3.php', UM_RECAPTCHA_PLUGIN, array(), true );
			break;
		case 'v2':
		default:
			UM()->get_template(
				'wp-captcha.php',
				UM_RECAPTCHA_PLUGIN,
				array(
					'mode'    => 'login',
					'type'    => UM()->options()->get( 'g_recaptcha_type' ),
					'size'    => UM()->options()->get( 'g_recaptcha_size' ),
					'theme'   => UM()->options()->get( 'g_recaptcha_theme' ),
					'sitekey' => UM()->options()->get( 'g_recaptcha_sitekey' ),
				),
				true
			);
			break;
	}
}
add_action( 'login_form', 'um_add_recaptcha_wp_login_form' );


/**
 * Add reCAPTCHA block to the wp-login.php page Register mode
 */
function um_add_recaptcha_wp_register_form() {
	if ( ! UM()->options()->get( 'g_recaptcha_wp_register_form' ) ) {
		return;
	}

	$recaptcha = UM()->options()->get( 'g_recaptcha_status' );
	if ( ! $recaptcha ) {
		return;
	}

	$your_sitekey = UM()->options()->get( 'g_recaptcha_sitekey' ) || UM()->options()->get( 'g_reCAPTCHA_site_key' );
	$your_secret  = UM()->options()->get( 'g_recaptcha_secretkey' ) || UM()->options()->get( 'g_reCAPTCHA_secret_key' );

	if ( ! $your_sitekey || ! $your_secret ) {
		return;
	}

	$version = UM()->options()->get( 'g_recaptcha_version' );

	switch ( $version ) {
		case 'v3':
			UM()->get_template( 'wp-captcha-v3.php', UM_RECAPTCHA_PLUGIN, array(), true );
			break;
		case 'v2':
		default:
			UM()->get_template(
				'wp-captcha.php',
				UM_RECAPTCHA_PLUGIN,
				array(
					'mode'    => 'register',
					'type'    => UM()->options()->get( 'g_recaptcha_type' ),
					'size'    => UM()->options()->get( 'g_recaptcha_size' ),
					'theme'   => UM()->options()->get( 'g_recaptcha_theme' ),
					'sitekey' => UM()->options()->get( 'g_recaptcha_sitekey' ),
				),
				true
			);
			break;
	}
}
add_action( 'register_form', 'um_add_recaptcha_wp_register_form' );


/**
 * @param WP_Error $errors
 *
 * @return mixed
 */
function um_recaptcha_validate_register_form( $errors ) {
	// phpcs:disable WordPress.Security.NonceVerification -- already verified here via wp-login.php
	if ( um_is_api_request() ) {
		return $errors;
	}

	if ( ! UM()->options()->get( 'g_recaptcha_wp_register_form' ) ) {
		return $errors;
	}

	$recaptcha = UM()->options()->get( 'g_recaptcha_status' );
	if ( ! $recaptcha ) {
		return $errors;
	}

	$your_sitekey = UM()->options()->get( 'g_recaptcha_sitekey' ) || UM()->options()->get( 'g_reCAPTCHA_site_key' );
	$your_secret  = UM()->options()->get( 'g_recaptcha_secretkey' ) || UM()->options()->get( 'g_reCAPTCHA_secret_key' );

	if ( ! $your_sitekey || ! $your_secret ) {
		return $errors;
	}

	$version = UM()->options()->get( 'g_recaptcha_version' );

	switch ( $version ) {
		case 'v3':
			$your_secret = trim( UM()->options()->get( 'g_reCAPTCHA_secret_key' ) );

			if ( empty( $_POST['g-recaptcha-response'] ) ) {
				$errors->add( 'um-recaptcha-empty', __( '<strong>Error</strong>: Please confirm you are not a robot.', 'um-recaptcha' ) );

				return $errors;
			}

			$client_captcha_response = sanitize_textarea_field( wp_unslash( $_POST['g-recaptcha-response'] ) );

			$result = UM()->ReCAPTCHA()->remote_request( $your_secret, $client_captcha_response, 'wp_register_form' );
			if ( ! empty( $result ) ) {
				$validate_score = UM()->ReCAPTCHA()->get_v3_score();

				if ( isset( $result->score ) && $result->score < (float) $validate_score ) {
					$errors->add( 'um-recaptcha-score', __( '<strong>Error</strong>: It is very likely a bot.', 'um-recaptcha' ) );

					return $errors;
				}

				if ( isset( $result->{'error-codes'} ) && ! $result->success ) {
					$error_codes = UM()->ReCAPTCHA()->error_codes_list();

					foreach ( $result->{'error-codes'} as $key => $error_code ) {
						$code = array_key_exists( $error_code, $error_codes ) ? $error_code : 'undefined';
						$errors->add( 'um-recaptcha-' . $code, $error_codes[ $code ] );

						return $errors;
					}
				}
			}
			break;

		case 'v2':
		default:
			$your_secret = trim( UM()->options()->get( 'g_recaptcha_secretkey' ) );

			if ( empty( $_POST['g-recaptcha-response'] ) ) {
				$errors->add( 'um-recaptcha-empty', __( '<strong>Error</strong>: Please confirm you are not a robot.', 'um-recaptcha' ) );

				return $errors;
			}

			$client_captcha_response = sanitize_textarea_field( wp_unslash( $_POST['g-recaptcha-response'] ) );

			$result = UM()->ReCAPTCHA()->remote_request( $your_secret, $client_captcha_response, 'wp_register_form' );
			if ( ! empty( $result ) && isset( $result->{'error-codes'} ) && ! $result->success ) {
				$error_codes = UM()->ReCAPTCHA()->error_codes_list();

				foreach ( $result->{'error-codes'} as $key => $error_code ) {
					$code = array_key_exists( $error_code, $error_codes ) ? $error_code : 'undefined';
					$errors->add( 'um-recaptcha-' . $code, $error_codes[ $code ] );

					return $errors;
				}
			}
			break;

	}

	return $errors;
	// phpcs:enable WordPress.Security.NonceVerification -- already verified here via wp-login.php
}
add_filter( 'registration_errors', 'um_recaptcha_validate_register_form' );


/**
 * Add reCAPTCHA block to the wp-login.php page Lost Password mode
 */
function um_add_recaptcha_wp_lostpassword_form() {
	if ( ! UM()->options()->get( 'g_recaptcha_wp_lostpasswordform' ) ) {
		return;
	}

	$recaptcha = UM()->options()->get( 'g_recaptcha_status' );
	if ( ! $recaptcha ) {
		return;
	}

	$your_sitekey = UM()->options()->get( 'g_recaptcha_sitekey' ) || UM()->options()->get( 'g_reCAPTCHA_site_key' );
	$your_secret  = UM()->options()->get( 'g_recaptcha_secretkey' ) || UM()->options()->get( 'g_reCAPTCHA_secret_key' );

	if ( ! $your_sitekey || ! $your_secret ) {
		return;
	}

	$version = UM()->options()->get( 'g_recaptcha_version' );

	switch ( $version ) {
		case 'v3':
			UM()->get_template( 'wp-captcha-v3.php', UM_RECAPTCHA_PLUGIN, array(), true );
			break;
		case 'v2':
		default:
			UM()->get_template(
				'wp-captcha.php',
				UM_RECAPTCHA_PLUGIN,
				array(
					'mode'    => 'login',
					'type'    => UM()->options()->get( 'g_recaptcha_type' ),
					'size'    => UM()->options()->get( 'g_recaptcha_size' ),
					'theme'   => UM()->options()->get( 'g_recaptcha_theme' ),
					'sitekey' => UM()->options()->get( 'g_recaptcha_sitekey' ),
				),
				true
			);
			break;
	}
}
add_action( 'lostpassword_form', 'um_add_recaptcha_wp_lostpassword_form' );


/**
 * @param WP_Error $errors
 *
 * @return mixed
 */
function um_recaptcha_validate_lostpassword_form( $errors ) {
	// phpcs:disable WordPress.Security.NonceVerification -- already verified here via wp-login.php
	if ( um_is_api_request() ) {
		return $errors;
	}
	if ( is_admin() ) {
		return $errors;
	}
	if ( ! UM()->options()->get( 'g_recaptcha_wp_lostpasswordform' ) ) {
		return $errors;
	}

	$recaptcha = UM()->options()->get( 'g_recaptcha_status' );
	if ( ! $recaptcha ) {
		return $errors;
	}

	$your_sitekey = UM()->options()->get( 'g_recaptcha_sitekey' ) || UM()->options()->get( 'g_reCAPTCHA_site_key' );
	$your_secret  = UM()->options()->get( 'g_recaptcha_secretkey' ) || UM()->options()->get( 'g_reCAPTCHA_secret_key' );

	if ( ! $your_sitekey || ! $your_secret ) {
		return $errors;
	}

	$version = UM()->options()->get( 'g_recaptcha_version' );

	switch ( $version ) {
		case 'v3':
			$your_secret = trim( UM()->options()->get( 'g_reCAPTCHA_secret_key' ) );

			if ( empty( $_POST['g-recaptcha-response'] ) ) {
				$errors->add( 'um-recaptcha-empty', __( '<strong>Error</strong>: Please confirm you are not a robot.', 'um-recaptcha' ) );

				return $errors;
			}
			$client_captcha_response = sanitize_textarea_field( wp_unslash( $_POST['g-recaptcha-response'] ) );

			$result = UM()->ReCAPTCHA()->remote_request( $your_secret, $client_captcha_response, 'wp_lostpassword_form' );
			if ( ! empty( $result ) ) {
				$validate_score = UM()->ReCAPTCHA()->get_v3_score();

				if ( isset( $result->score ) && $result->score < (float) $validate_score ) {
					$errors->add( 'um-recaptcha-score', __( '<strong>Error</strong>: It is very likely a bot.', 'um-recaptcha' ) );

					return $errors;
				}

				if ( isset( $result->{'error-codes'} ) && ! $result->success ) {
					$error_codes = UM()->ReCAPTCHA()->error_codes_list();

					foreach ( $result->{'error-codes'} as $key => $error_code ) {
						$code = array_key_exists( $error_code, $error_codes ) ? $error_code : 'undefined';
						$errors->add( 'um-recaptcha-' . $code, $error_codes[ $code ] );

						return $errors;
					}
				}
			}
			break;

		case 'v2':
		default:
			$your_secret = trim( UM()->options()->get( 'g_recaptcha_secretkey' ) );

			if ( empty( $_POST['g-recaptcha-response'] ) ) {
				$errors->add( 'um-recaptcha-empty', __( '<strong>Error</strong>: Please confirm you are not a robot.', 'um-recaptcha' ) );

				return $errors;
			}

			$client_captcha_response = sanitize_textarea_field( wp_unslash( $_POST['g-recaptcha-response'] ) );

			$result = UM()->ReCAPTCHA()->remote_request( $your_secret, $client_captcha_response, 'wp_lostpassword_form' );
			if ( ! empty( $result ) && isset( $result->{'error-codes'} ) && ! $result->success ) {
				$error_codes = UM()->ReCAPTCHA()->error_codes_list();

				foreach ( $result->{'error-codes'} as $key => $error_code ) {
					$code = array_key_exists( $error_code, $error_codes ) ? $error_code : 'undefined';
					$errors->add( 'um-recaptcha-' . $code, $error_codes[ $code ] );

					return $errors;
				}
			}
			break;

	}

	return $errors;
	// phpcs:enable WordPress.Security.NonceVerification -- already verified here via wp-login.php
}
add_filter( 'lostpassword_errors', 'um_recaptcha_validate_lostpassword_form', 10, 1 );


/**
 * @return bool
 */
function um_is_api_request() {
	$is_api_request = ( ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) );
	$is_api_request = apply_filters( 'um_is_api_request', $is_api_request );

	return $is_api_request;
}


/**
 * @param WP_Error $errors
 *
 * @return WP_Error
 */
function um_authenticate_recaptcha_errors( $errors ) {
	if ( ! UM()->options()->get( 'g_recaptcha_wp_login_form' ) ) {
		return $errors;
	}

	if ( um_is_api_request() ) {
		return $errors;
	}

	// phpcs:disable WordPress.Security.NonceVerification -- getting value from GET line
	if ( isset( $_GET['um-recaptcha-error'] ) ) {
		$code = ! empty( $_GET['um-recaptcha-error'] ) ? sanitize_key( $_GET['um-recaptcha-error'] ) : 'undefined';

		switch ( $code ) {
			case 'empty':
				$errors->add( 'recaptcha_' . $code, __( '<strong>Error</strong>: Please confirm you are not a robot.', 'um-recaptcha' ) );
				break;
			case 'score':
				$errors->add( 'recaptcha_' . $code, __( '<strong>Error</strong>: It is very likely a bot.', 'um-recaptcha' ) );
				break;
			case 'missing-input-secret':
				$errors->add( 'recaptcha_' . $code, __( '<strong>Error</strong>: The secret parameter is missing.', 'um-recaptcha' ) );
				break;
			case 'invalid-input-secret':
				$errors->add( 'recaptcha_' . $code, __( '<strong>Error</strong>: The secret parameter is invalid or malformed.', 'um-recaptcha' ) );
				break;
			case 'missing-input-response':
				$errors->add( 'recaptcha_' . $code, __( '<strong>Error</strong>: The response parameter is missing.', 'um-recaptcha' ) );
				break;
			case 'invalid-input-response':
				$errors->add( 'recaptcha_' . $code, __( '<strong>Error</strong>: The response parameter is invalid or malformed.', 'um-recaptcha' ) );
				break;
			case 'bad-request':
				$errors->add( 'recaptcha_' . $code, __( '<strong>Error</strong>: The request is invalid or malformed.', 'um-recaptcha' ) );
				break;
			case 'timeout-or-duplicate':
				$errors->add( 'recaptcha_' . $code, __( '<strong>Error</strong>: The response is no longer valid: either is too old or has been used previously.', 'um-recaptcha' ) );
				break;
			case 'undefined':
				$errors->add( 'recaptcha_' . $code, __( '<strong>Error</strong>: Undefined reCAPTCHA error.', 'um-recaptcha' ) );
				break;
			default:
				// translators: %s: Google reCAPTCHA error code
				$errors->add( 'recaptcha_' . $code, sprintf( __( '<strong>Error</strong>: reCAPTCHA Code: %s', 'um-recaptcha' ), $code ) );
				break;
		}
	}
	return $errors;
	// phpcs:enable WordPress.Security.NonceVerification -- getting value from GET line
}
add_filter( 'wp_login_errors', 'um_authenticate_recaptcha_errors' );


/**
 * Run before the authenticate process of the user via wp-login.php form
 *
 * @param $username
 * @param $password
 */
function um_authenticate_recaptcha_action( $username, $password ) {
	// phpcs:disable WordPress.Security.NonceVerification -- already verified here via wp-login.php or wp_login_form()
	if ( ! UM()->options()->get( 'g_recaptcha_wp_login_form' ) ) {
		return;
	}

	if ( um_is_api_request() ) {
		return;
	}

	if ( empty( $username ) || empty( $password ) ) {
		return;
	}

	$recaptcha = UM()->options()->get( 'g_recaptcha_status' );
	if ( ! $recaptcha ) {
		return;
	}

	$your_sitekey = UM()->options()->get( 'g_recaptcha_sitekey' ) || UM()->options()->get( 'g_reCAPTCHA_site_key' );
	$your_secret  = UM()->options()->get( 'g_recaptcha_secretkey' ) || UM()->options()->get( 'g_reCAPTCHA_secret_key' );

	if ( ! $your_sitekey || ! $your_secret ) {
		return;
	}

	$version = UM()->options()->get( 'g_recaptcha_version' );

	$redirect     = isset( $_GET['redirect_to'] ) ? esc_url_raw( wp_unslash( $_GET['redirect_to'] ) ) : '';
	$force_reauth = isset( $_GET['reauth'] ) ? (bool) $_GET['reauth'] : false;

	// for the wp_login_form() function login widget
	// $redirect URL in this case will use the widget current URL from where was request to wp-login.php
	if ( ! empty( $_REQUEST['um_login_form'] ) && ! empty( $redirect ) ) {
		$query = wp_parse_url( $redirect, PHP_URL_QUERY );
		parse_str( $query, $query_args );

		if ( array_key_exists( 'redirect_to', $query_args ) ) {
			$redirect = $query_args['redirect_to'];
		}

		if ( array_key_exists( 'reauth', $query_args ) ) {
			$force_reauth = $query_args['reauth'];
		}
	}

	switch ( $version ) {
		case 'v3':
			$your_secret = trim( UM()->options()->get( 'g_reCAPTCHA_secret_key' ) );

			if ( empty( $_POST['g-recaptcha-response'] ) ) {
				wp_safe_redirect( add_query_arg( array( 'um-recaptcha-error' => 'empty' ), wp_login_url( $redirect, $force_reauth ) ) );
				exit;
			}

			$client_captcha_response = sanitize_textarea_field( wp_unslash( $_POST['g-recaptcha-response'] ) );

			$result = UM()->ReCAPTCHA()->remote_request( $your_secret, $client_captcha_response, 'wp_login_form' );
			if ( ! empty( $result ) ) {
				$validate_score = UM()->ReCAPTCHA()->get_v3_score();

				if ( isset( $result->score ) && $result->score < (float) $validate_score ) {
					wp_safe_redirect( add_query_arg( array( 'um-recaptcha-error' => 'score' ), wp_login_url( $redirect, $force_reauth ) ) );
					exit;
				}

				if ( isset( $result->{'error-codes'} ) && ! $result->success ) {
					$error_codes = UM()->ReCAPTCHA()->error_codes_list();

					foreach ( $result->{'error-codes'} as $key => $error_code ) {
						$code = array_key_exists( $error_code, $error_codes ) ? $error_code : 'undefined';

						wp_safe_redirect( add_query_arg( array( 'um-recaptcha-error' => $code ), wp_login_url( $redirect, $force_reauth ) ) );
						exit;
					}
				}
			}
			break;

		case 'v2':
		default:
			$your_secret = trim( UM()->options()->get( 'g_recaptcha_secretkey' ) );

			if ( empty( $_POST['g-recaptcha-response'] ) ) {
				wp_safe_redirect( add_query_arg( array( 'um-recaptcha-error' => 'empty' ), wp_login_url( $redirect, $force_reauth ) ) );
				exit;
			}

			$client_captcha_response = sanitize_textarea_field( wp_unslash( $_POST['g-recaptcha-response'] ) );

			$result = UM()->ReCAPTCHA()->remote_request( $your_secret, $client_captcha_response, 'wp_login_form' );
			if ( ! empty( $result ) && isset( $result->{'error-codes'} ) && ! $result->success ) {
				$error_codes = UM()->ReCAPTCHA()->error_codes_list();

				foreach ( $result->{'error-codes'} as $key => $error_code ) {
					$code = array_key_exists( $error_code, $error_codes ) ? $error_code : 'undefined';

					wp_safe_redirect( add_query_arg( array( 'um-recaptcha-error' => $code ), wp_login_url( $redirect, $force_reauth ) ) );
					exit;
				}
			}
			break;

	}
	// phpcs:enable WordPress.Security.NonceVerification -- already verified here via wp-login.php or wp_login_form()
}
add_action( 'wp_authenticate', 'um_authenticate_recaptcha_action', 2, 2 );

function um_remove_authenticate_recaptcha_action() {
	remove_action( 'wp_authenticate', 'um_authenticate_recaptcha_action', 2 );
}
add_action( 'um_before_signon_after_account_changes', 'um_remove_authenticate_recaptcha_action' );

/* Handle reCAPTCHA via `wp_login_form()` */


/**
 * @param $content
 * @param $args
 *
 * @return string
 */
function um_add_recaptcha_login_form( $content, $args ) {
	if ( ! UM()->options()->get( 'g_recaptcha_wp_login_form_widget' ) ) {
		return $content;
	}

	if ( ! ( array_key_exists( 'um_login_form', $args ) && true === $args['um_login_form'] ) ) {
		return $content;
	}

	$recaptcha = UM()->options()->get( 'g_recaptcha_status' );
	if ( ! $recaptcha ) {
		return $content;
	}

	$your_sitekey = UM()->options()->get( 'g_recaptcha_sitekey' ) || UM()->options()->get( 'g_reCAPTCHA_site_key' );
	$your_secret  = UM()->options()->get( 'g_recaptcha_secretkey' ) || UM()->options()->get( 'g_reCAPTCHA_secret_key' );

	if ( ! $your_sitekey || ! $your_secret ) {
		return $content;
	}

	$suffix = UM()->frontend()->enqueue()::get_suffix();

	wp_register_style( 'um-recaptcha', UM_RECAPTCHA_URL . 'assets/css/wp-recaptcha' . $suffix . '.css', array(), UM_RECAPTCHA_VERSION );
	wp_enqueue_style( 'um-recaptcha' );

	$version = UM()->options()->get( 'g_recaptcha_version' );

	switch ( $version ) {
		case 'v3':
			$site_key = UM()->options()->get( 'g_reCAPTCHA_site_key' );

			wp_register_script( 'google-recaptcha-api-v3', "https://www.google.com/recaptcha/api.js?render=$site_key", array(), '3.0', false );
			wp_register_script( 'um-recaptcha', UM_RECAPTCHA_URL . 'assets/js/wp-recaptcha' . $suffix . '.js', array( 'jquery', 'google-recaptcha-api-v3' ), UM_RECAPTCHA_VERSION, true );

			wp_localize_script(
				'um-recaptcha',
				'umRecaptchaData',
				array(
					'site_key' => $site_key,
				)
			);

			wp_enqueue_script( 'um-recaptcha' );

			$content .= UM()->get_template(
				'wp-captcha-v3.php',
				UM_RECAPTCHA_PLUGIN,
				array(),
				false
			);
			break;
		case 'v2':
		default:
			$language_code = UM()->options()->get( 'g_recaptcha_language_code' );
			$language_code = apply_filters( 'um_recaptcha_language_code', $language_code );

			wp_register_script( 'google-recaptcha-api-v2', "https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=$language_code", array( 'jquery' ), '2.0', false );
			wp_enqueue_script( 'google-recaptcha-api-v2' );

			$content .= UM()->get_template(
				'wp-captcha.php',
				UM_RECAPTCHA_PLUGIN,
				array(
					'mode'    => 'login',
					'type'    => UM()->options()->get( 'g_recaptcha_type' ),
					'size'    => UM()->options()->get( 'g_recaptcha_size' ),
					'theme'   => UM()->options()->get( 'g_recaptcha_theme' ),
					'sitekey' => UM()->options()->get( 'g_recaptcha_sitekey' ),
				),
				false
			);
			break;
	}

	return $content;
}
add_filter( 'login_form_middle', 'um_add_recaptcha_login_form', 10, 2 );


/**
 * add recaptcha
 *
 * @param $args
 */
function um_recaptcha_add_captcha( $args ) {
	$allowed_args = array(
		'mode' => $args['mode'],
	);
	if ( isset( $args['g_recaptcha_status'] ) ) {
		$allowed_args['g_recaptcha_status'] = $args['g_recaptcha_status'];
	}
	if ( ! UM()->ReCAPTCHA()->captcha_allowed( $allowed_args ) ) {
		return;
	}

	$version = UM()->options()->get( 'g_recaptcha_version' );
	switch ( $version ) {
		case 'v3':
			UM()->get_template( 'captcha-v3.php', UM_RECAPTCHA_PLUGIN, array( 'args' => $args ), true );
			break;
		case 'v2':
		default:
			UM()->get_template(
				'captcha.php',
				UM_RECAPTCHA_PLUGIN,
				array(
					'args'    => $args,
					'type'    => UM()->options()->get( 'g_recaptcha_type' ),
					'size'    => UM()->options()->get( 'g_recaptcha_size' ),
					'theme'   => UM()->options()->get( 'g_recaptcha_theme' ),
					'sitekey' => UM()->options()->get( 'g_recaptcha_sitekey' ),
				),
				true
			);
			break;
	}
	wp_enqueue_script( 'um-recaptcha' );
}
add_action( 'um_after_register_fields', 'um_recaptcha_add_captcha', 500 );
add_action( 'um_after_login_fields', 'um_recaptcha_add_captcha', 500 );
add_action( 'um_after_password_reset_fields', 'um_recaptcha_add_captcha', 500 );


/**
 * Login|Register form error handling
 *
 * @link https://developers.google.com/recaptcha/docs/verify#api_request
 * @link https://developers.google.com/recaptcha/docs/v3#interpreting_the_score
 *
 * @param array $args
 * @param array $form_data
 */
function um_recaptcha_validate( $args, $form_data = array() ) {
	// phpcs:disable WordPress.Security.NonceVerification -- already verified here via UM Form nonce
	if ( ! isset( $args['_social_login_form'] ) && ( ! isset( $form_data['mode'] ) || ! in_array( $form_data['mode'], array( 'login', 'register' ), true ) ) ) {
		return;
	}

	$allowed_args = array(
		'mode' => $form_data['mode'],
	);
	if ( isset( $form_data['g_recaptcha_status'] ) ) {
		$allowed_args['g_recaptcha_status'] = $form_data['g_recaptcha_status'];
	}
	if ( ! UM()->ReCAPTCHA()->captcha_allowed( $allowed_args ) ) {
		return;
	}

	$version = UM()->options()->get( 'g_recaptcha_version' );
	switch ( $version ) {
		case 'v3':
			$your_secret = trim( UM()->options()->get( 'g_reCAPTCHA_secret_key' ) );
			break;
		case 'v2':
		default:
			$your_secret = trim( UM()->options()->get( 'g_recaptcha_secretkey' ) );
			break;
	}

	if ( empty( $_POST['g-recaptcha-response'] ) ) {
		UM()->form()->add_error( 'recaptcha', __( 'Please confirm you are not a robot', 'um-recaptcha' ) );
		return;
	}

	$client_captcha_response = sanitize_textarea_field( wp_unslash( $_POST['g-recaptcha-response'] ) );

	$result = UM()->ReCAPTCHA()->remote_request( $your_secret, $client_captcha_response, 'um_form_shortcode', compact( 'args', 'form_data' ) );
	if ( ! empty( $result ) ) {
		$validate_score = UM()->ReCAPTCHA()->get_v3_score( $args, $form_data );

		if ( isset( $result->score ) && $result->score < $validate_score ) {
			UM()->form()->add_error( 'recaptcha', __( 'reCAPTCHA: it is very likely a bot.', 'um-recaptcha' ) );
		} elseif ( isset( $result->{'error-codes'} ) && ! $result->success ) {
			$error_codes = UM()->ReCAPTCHA()->error_codes_list();

			foreach ( $result->{'error-codes'} as $key => $error_code ) {
				// translators: %s: Google reCAPTCHA error code
				$error = array_key_exists( $error_code, $error_codes ) ? $error_codes[ $error_code ] : sprintf( __( 'Undefined error. Key: %s', 'um-recaptcha' ), $error_code );
				UM()->form()->add_error( 'recaptcha', $error );
			}
		}
	}
	// phpcs:enable WordPress.Security.NonceVerification -- already verified here via UM Form nonce
}
add_action( 'um_submit_form_errors_hook', 'um_recaptcha_validate', 20, 2 );

/**
 * Reset Password form error handling
 *
 * @link https://developers.google.com/recaptcha/docs/verify#api_request
 * @link https://developers.google.com/recaptcha/docs/v3#interpreting_the_score
 *
 * @param $args
 */
function um_recaptcha_validate_rp( $args ) {
	// phpcs:disable WordPress.Security.NonceVerification -- already verified here via UM Form nonce
	if ( ! isset( $args['mode'] ) || 'password' !== $args['mode'] ) {
		return;
	}

	$allowed_args = array(
		'mode' => $args['mode'],
	);
	if ( ! UM()->ReCAPTCHA()->captcha_allowed( $allowed_args ) ) {
		return;
	}

	$version = UM()->options()->get( 'g_recaptcha_version' );
	switch ( $version ) {
		case 'v3':
			$your_secret = trim( UM()->options()->get( 'g_reCAPTCHA_secret_key' ) );
			break;
		case 'v2':
		default:
			$your_secret = trim( UM()->options()->get( 'g_recaptcha_secretkey' ) );
			break;
	}

	if ( empty( $_POST['g-recaptcha-response'] ) ) {
		UM()->form()->add_error( 'recaptcha', __( 'Please confirm you are not a robot', 'um-recaptcha' ) );
		return;
	}

	$client_captcha_response = sanitize_textarea_field( wp_unslash( $_POST['g-recaptcha-response'] ) );

	$result = UM()->ReCAPTCHA()->remote_request( $your_secret, $client_captcha_response, 'um_reset_password_shortcode', compact( 'args' ) );
	if ( ! empty( $result ) ) {
		$validate_score = UM()->ReCAPTCHA()->get_v3_score( $args );

		if ( isset( $result->score ) && $result->score < $validate_score ) {
			UM()->form()->add_error( 'recaptcha', __( 'reCAPTCHA: it is very likely a bot.', 'um-recaptcha' ) );
		} elseif ( isset( $result->{'error-codes'} ) && ! $result->success ) {
			$error_codes = UM()->ReCAPTCHA()->error_codes_list();

			foreach ( $result->{'error-codes'} as $key => $error_code ) {
				// translators: %s: Google reCAPTCHA error code
				$error = array_key_exists( $error_code, $error_codes ) ? $error_codes[ $error_code ] : sprintf( __( 'Undefined error. Key: %s', 'um-recaptcha' ), $error_code );
				UM()->form()->add_error( 'recaptcha', $error );
			}
		}
	}
	// phpcs:enable WordPress.Security.NonceVerification -- already verified here via UM Form nonce
}
add_action( 'um_reset_password_errors_hook', 'um_recaptcha_validate_rp', 20 );


/**
 * reCAPTCHA scripts/styles enqueue in the page with a form
 *
 * @param array $args
 */
function um_recaptcha_enqueue_scripts( $args ) {
	$allowed_args = array(
		'mode' => $args['mode'],
	);
	if ( isset( $args['g_recaptcha_status'] ) ) {
		$allowed_args['g_recaptcha_status'] = $args['g_recaptcha_status'];
	}
	if ( ! UM()->ReCAPTCHA()->captcha_allowed( $allowed_args ) ) {
		return;
	}

	UM()->ReCAPTCHA()->enqueue()->wp_enqueue_scripts();
}
add_action( 'um_pre_register_shortcode', 'um_recaptcha_enqueue_scripts' );
add_action( 'um_pre_login_shortcode', 'um_recaptcha_enqueue_scripts' );
add_action( 'um_pre_password_shortcode', 'um_recaptcha_enqueue_scripts' );


/**
 * reCAPTCHA scripts/styles enqueue in member directory
 *
 * @param array $args
 */
function um_recaptcha_directory_enqueue_scripts( $args ) {
	if ( is_user_logged_in() ) {
		return;
	}

	$global_hide_pm_button = ! empty( $args['hide_pm_button'] ) ? $args['hide_pm_button'] : ! UM()->options()->get( 'show_pm_button' );
	if ( $global_hide_pm_button ) {
		return;
	}

	$form_data = UM()->query()->post_data( UM()->shortcodes()->core_login_form() );
	if ( empty( $form_data ) || ! is_array( $form_data ) || ! array_key_exists( 'mode', $form_data ) ) {
		return;
	}

	$allowed_args = array(
		'mode' => $form_data['mode'],
	);
	if ( isset( $form_data['g_recaptcha_status'] ) ) {
		$allowed_args['g_recaptcha_status'] = $form_data['g_recaptcha_status'];
	}

	if ( ! UM()->ReCAPTCHA()->captcha_allowed( $allowed_args ) ) {
		return;
	}

	UM()->ReCAPTCHA()->enqueue()->wp_enqueue_scripts();
}
add_action( 'um_pre_directory_shortcode', 'um_recaptcha_directory_enqueue_scripts', 10, 1 );


/**
 * Don't display reCAPTCHA error message twice on login
 *
 * @since 2.2.1
 *
 * @param string $error_message  Error message
 * @param string $error_key      A key of the error
 *
 * @return string Filtered error message
 */
function um_recaptcha_hide_errors( $error_message, $error_key = null ) {
	if ( 'recaptcha' === $error_key ) {
		$error_message = '';
	}
	return $error_message;
}
add_filter( 'login_errors', 'um_recaptcha_hide_errors', 10, 2 );
