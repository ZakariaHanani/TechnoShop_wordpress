<?php
/**
 * @package Fusion
 */
 
/**
 * The RTE Text shortcode.
 *
 * Output styled rich text content.
 *
 * @since 1.0.0
 *
 * @param array $attr Attributes attributed to the shortcode.
 * @param string $content Optional. Shortcode content.
 * @return string
 */
	 
/**
 * Map Shortcode
 */

add_action('init', 'fsn_init_text', 12);
function fsn_init_text() {
	
	if (function_exists('fsn_map')) {
	
		fsn_map(array(
			'name' => __('Text', 'fusion'),
			'shortcode_tag' => 'fsn_text',
			'description' => __('Input styled text. The "Visual" view contains rich text styling options. The "Text" view allows styling to be controlled by manually writing basic HTML and CSS.', 'fusion'),
			'icon' => 'text_fields',
			'params' => array(
				array(
					'type' => 'textarea_rte',
					'param_name' => 'fsncontent',
					'label' => __('Text Field', 'fusion')
				)
			)
		));
	}
}

/**
 * Output Shortcode
 */

function fsn_text_shortcode( $atts, $content ) {			
		
	$output = '<div class="fsn-text '. fsn_style_params_class($atts) .'">'. do_shortcode($content) .'</div>';
	
	return $output;
}
add_shortcode('fsn_text', 'fsn_text_shortcode');