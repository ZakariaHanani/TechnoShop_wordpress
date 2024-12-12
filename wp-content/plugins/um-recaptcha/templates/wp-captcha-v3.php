<?php
/**
 * Template for the UM Google reCAPTCHA
 *
 * Called from the um_add_recaptcha_wp_lostpassword_form(), um_add_recaptcha_login_form(), um_add_recaptcha_wp_register_form() functions
 * @version 2.3.2
 *
 * This template can be overridden by copying it to yourtheme/ultimate-member/um-recaptcha/captcha.php
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div class="g-recaptcha" id="um-login-recaptcha"></div>
