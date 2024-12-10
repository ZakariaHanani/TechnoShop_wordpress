<?php
/**
 * Style options array
 *
 * @author  YITH <plugins@yithemes.com>
 * @package YITH WooCommerce Quick View
 * @version 1.1.1
 */

defined( 'YITH_WCQV' ) || exit; // Exit if accessed directly.

$style_settings = array(

	'style' => array(

		10  => array(
			'title' => __( 'General Style', 'yith-woocommerce-quick-view' ),
			'desc'  => '',
			'type'  => 'title',
			'id'    => 'yith-wcqv-style-general',

		),
		15  => array(
			'name'         => __( 'Quick view', 'yith-woocommerce-quick-view' ),
			'desc'         => '',
			'id'           => 'yith-wcqv-color-quick-view',
			'yith-type'    => 'multi-colorpicker',
			'type'         => 'yith-field',
			'class'        => 'yith_wcqv_color_picker',
			'colorpickers' => array(
				array(
					'name'    => __( 'Content background', 'yith-woocommerce-quick-view' ),
					'id'      => 'content',
					'default' => '#ffffff',
				),
				array(
					'name'    => __( 'Overlay color', 'yith-woocommerce-quick-view' ),
					'id'      => 'overlay',
					'default' => 'rgba( 0, 0, 0, 0.8)',
				),
			),
		),

		20  => array(
			'name'         => __( 'Close icon', 'yith-woocommerce-quick-view' ),
			'desc'         => '',
			'id'           => 'yith-wcqv-closed-button',
			'yith-type'    => 'multi-colorpicker',
			'type'         => 'yith-field',
			'class'        => 'yith_wcqv_color_picker',
			'colorpickers' => array(
				array(
					'name'    => __( 'Color', 'yith-woocommerce-quick-view' ),
					'id'      => 'color',
					'default' => '#bcbcbc',
				),
				array(
					'name'    => __( 'Color hover', 'yith-woocommerce-quick-view' ),
					'id'      => 'color-hover',
					'default' => 'rgba( 0, 0, 0, 0.9)',
				),
			),
		),

		30  => array(
			'id'           => 'yith-wcqv-button-quick-view-color',
			'name'         => __( 'Quick view button', 'yith-woocommerce-quick-view' ),
			'yith-type'    => 'multi-colorpicker',
			'type'         => 'yith-field',
			'class'        => 'yith_wcqv_color_picker',
			'colorpickers' => array(
				array(
					'name'    => __( 'Background', 'yith-woocommerce-quick-view' ),
					'id'      => 'bg_color',
					'default' =>  'rgb(26,172,143)',
				),
				array(
					'name'    => __( 'Background hover', 'yith-woocommerce-quick-view' ),
					'id'      => 'bg_color_hover',
					'default' => '#35615E',
				),
				array(
					'name'    => __( 'Text', 'yith-woocommerce-quick-view' ),
					'id'      => 'color',
					'default' => '#ffffff',
				),
				array(
					'name'    => __( 'Text Hover', 'yith-woocommerce-quick-view' ),
					'id'      => 'color_hover',
					'default' => '#ffffff',
				),
			),
		),


		70  => array(
			'type' => 'sectionend',
			'id'   => 'yith-wcqv-style-general-end',
		),

	),
);


if( get_option('yith-wcqv-modal-type', 'yith-modal') === 'yith-inline'){
	unset($style_settings['style'][15]);
}

/**
 * APPLY_FILTERS: yith_wcqv_panel_style_settings
 *
 * Filters the options available under the tab "Style" of the plugin panel.
 *
 * @param   array  $options
 *
 * @return array
 */

return apply_filters( 'yith_wcqv_panel_style_settings', $style_settings );
