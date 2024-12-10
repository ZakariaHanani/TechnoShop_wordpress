<?php
/**
 * Common plugin functions
 *
 * @author  YITH <plugins@yithemes.com>
 * @package YITH WooCommerce Quick View
 * @version 1.1.1
 */

defined( 'YITH_WCQV' ) || exit; // Exit if accessed directly.

$yith_wcqv_option_version = get_option( 'yith_wcqv_update_free_2_0', '1.0.0' );
if ( $yith_wcqv_option_version && version_compare( $yith_wcqv_option_version, '2.0.0', '<' ) ) {
	add_action( 'init', 'yith_wcqv_update_free_2_0', 30 );
}

if ( ! function_exists( 'yith_wcqv_update_free_2_0' ) ) {
	/**
	 * Update options from version before 2.0.0
	 *
	 * @return void
	 */
	function yith_wcqv_update_free_2_0() {
		$bg_modal                 = get_option( 'yith-wcqv-background-modal', '#ffffff' );
		$close_button_color       = get_option( 'yith-wcqv-close-color', '#cdcdcd' );
		$close_button_color_hover = get_option( 'yith-wcqv-close-color-hover', '#ff0000' );

		update_option( 'yith-wcqv-color-quick-view', array('content'=> $bg_modal, 'overlay'=>'rgba( 0, 0, 0, 0.8)'));
		update_option('yith-wcqv-closed-button', array('color'=>$close_button_color, 'color-hover'=>$close_button_color_hover));

		delete_option('yith-wcqv-background-modal');
		delete_option('yith-wcqv-close-color');
		delete_option('yith-wcqv-close-color-hover');

		update_option( 'yith_wcqv_update_free_2_0', '2.0.0' );
	}
}
