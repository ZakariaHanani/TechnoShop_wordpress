<?php
/**
 * @package Fusion
 */

/**
 * FusionCoreMap class.
 *
 * Class for mapping user created Fusion extensions
 *
 * @since 1.0.0
 */

class FusionCoreMap	{

	/**
	 * Shortcode mapping.
	 *
	 * @since 1.0.0
	 */

	public static function map_shortcode( $attributes = array() ) {
		//set vars
		$name = $attributes['name'];
		$shortcode_tag = $attributes['shortcode_tag'];
		$description = !empty($attributes['description']) ? $attributes['description'] : '';
		$icon = !empty($attributes['icon']) ? $attributes['icon'] : '';
		$disable_style_params = !empty($attributes['disable_style_params']) ? $attributes['disable_style_params'] : '';
		$params = !empty($attributes['params']) ? $attributes['params'] : array();

		$new_sc = new FusionCoreExtend($name, $shortcode_tag, $description, $icon, $disable_style_params, $params);
	}

}

$fsn_core_map = new FusionCoreMap();

function fsn_map($attributes) {
	FusionCoreMap::map_shortcode($attributes);
}

?>
