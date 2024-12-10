<?php
/**
 * Settings tab array
 *
 * @author  YITH <plugins@yithemes.com>
 * @package YITH WooCommerce Quick View
 * @version 1.1.1
 */

defined( 'YITH_WCQV' ) || exit; // Exit if accessed directly.

$settings = array(

	'settings' => array(

		'general-options'          => array(
			'title' => __( 'General Options', 'yith-woocommerce-quick-view' ),
			'type'  => 'title',
			'desc'  => '',
			'id'    => 'yith-wcqv-general-options',
		),

		'enable-quick-view-mobile' => array(
			'id'        => 'yith-wcqv-enable-mobile',
			'name'      => __( 'Enable Quick View on mobile', 'yith-woocommerce-quick-view' ),
			'desc'      => __( 'Enable quick view features for mobile devices.', 'yith-woocommerce-quick-view' ),
			'type'      => 'yith-field',
			'yith-type' => 'onoff',
			'default'   => 'yes',
		),

		'quick-view-label'         => array(
			'id'        => 'yith-wcqv-button-label',
			'name'      => __( '"Quick view" button label', 'yith-woocommerce-quick-view' ),
			'desc'      => __( '"Quick view" button label in the WooCommerce loop.', 'yith-woocommerce-quick-view' ),
			'type'      => 'yith-field',
			'yith-type' => 'text',
			'default'   => __( 'Quick View', 'yith-woocommerce-quick-view' ),
		),

		'general-options-end'      => array(
			'type' => 'sectionend',
			'id'   => 'yith-wcqv-general-options',
		),

		'content-options' => array(
			'title' => __( 'Content Options', 'yith-woocommerce-quick-view' ),
			'type'  => 'title',
			'desc'  => '',
			'id'    => 'yith-wcqv-content-options',
		),

		'product-description'  => array(
			'id'        => 'yith-wcqv-product-description',
			'name'      => __( 'Product description:', 'yith-woocommerce-quick-view' ),
			'type'      => 'yith-field',
			'yith-type' => 'radio',
			'default'   => 'short',
			'options'   => array(
				'short' => __( 'Show short description', 'yith-woocommerce-quick-view' ),
				'full'  => __( 'Show full description', 'yith-woocommerce-quick-view' ),
			),
		),

		'image-option' => array(
			'id'         => 'yith-quick-view-product-image-dimensions',
			'title'      => __( 'Product image dimensions', 'yith-woocommerce-quick-view' ),
			'desc'       => sprintf( _x( 'Set the image size (in px). After changing these settings you may need to %sregenerate your thumbnails%s.', 'placeholders are html tags', 'yith-woocommerce-quick-view' ), '<a href="https://wordpress.org/plugins/regenerate-thumbnails/">', '</a>' ),
			'type'       => 'yith-field',
			'yith-type'  => 'dimensions',
			'dimensions' => array(
				'width'  => __( 'Width', 'yith-woocommerce-quick-view' ),
				'height' => __( 'Height', 'yith-woocommerce-quick-view' ),
			),
			'units'      => array( 'px' => 'px' ),
			'default'    => array(
				'dimensions' => array(
					'width'  => 450,
					'height' => 600,
				),
				'unit'       => 'px',
				'linked'     => 'no',
			),
			'min'        => 1,
			'deps'       => array(
				'id'    => 'yith-wcqv-product-show-thumb',
				'value' => 'yes',
			),
		),

		'style-options-end'        => array(
			'type' => 'sectionend',
			'id'   => 'yith-wcqv-style-options',
		),


	),
);

return apply_filters( 'yith_wcqv_panel_settings_options', $settings );
