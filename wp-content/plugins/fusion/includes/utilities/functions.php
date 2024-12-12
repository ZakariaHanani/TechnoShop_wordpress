<?php

/**
 * @package Fusion
 */

/**
 * Duplicate the_content filters
 *
 * Add a custom filter set calling the same filters as the_content for inserting formatted components inline without breaking the content flow.
 *
 * @since 1.0.0
 * @since 1.0.1 Added Fusion Filters section with shortcode cleaning function
 */

//WordPress filters
global $wp_embed;
add_filter('fsn_the_content', array($wp_embed, 'run_shortcode'), 8);
add_filter('fsn_the_content', array($wp_embed, 'autoembed'), 8);
add_filter('fsn_the_content', 'wptexturize');
add_filter('fsn_the_content', 'convert_smilies');
add_filter('fsn_the_content', 'wpautop');
add_filter('fsn_the_content', 'shortcode_unautop');
add_filter('fsn_the_content', 'prepend_attachment');
if (function_exists('wp_filter_content_tags')) {
	add_filter('fsn_the_content', 'wp_filter_content_tags');
} else if (function_exists('wp_make_content_images_responsive')) {
	add_filter('fsn_the_content', 'wp_make_content_images_responsive');
}
add_filter('fsn_the_content', 'do_shortcode', 11); // AFTER wpautop()

//Fusion Filters
add_filter('fsn_the_content', 'fsn_shortcode_cleaner');

/**
 * Clean Shortcodes.
 *
 * Filter function for removing <p> tags that get added around shortcode tags
 *
 * @since 1.0.0
 */

add_filter('the_content', 'fsn_shortcode_cleaner');

function fsn_shortcode_cleaner($content)
{

	// array of shortcodes requiring the fix
	$shortcodes_to_clean = array("fsn_row", "fsn_row_inner", "fsn_column", "fsn_column_inner", "fsn_tabs", "fsn_tab");

	// auto add all registered Layout elements
	global $fsn_elements;
	if (!empty($fsn_elements)) {
		foreach ($fsn_elements as $element) {
			$shortcodes_to_clean[] = $element->shortcode_tag;
		}
	}

	// filters hook to allow cleaning of additional shortcodes
	$shortcodes_to_clean = apply_filters('fsn_clean_shortcodes', $shortcodes_to_clean);

	$block = join("|", $shortcodes_to_clean);

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/", "[/$2]", $rep);

	return $rep;
}

/**
 * Replaces paragraph and line break elements with carriage returns
 *
 * This is the inverse behavior of the wpautop() function
 * found in WordPress which converts double line-breaks to
 * paragraphs.
 *
 * @since 1.0.0
 *
 * @param string $s
 * @return string
 *
 */

function fsn_unautop($s)
{
	$replace = array("\n" => '', "\r" => '');
	$replace["<p>"] = "";
	$replace["<br />"] = "\r\n";
	$replace["<br>"] = "\r\n";
	$replace["<br/>"] = "\r\n";
	$replace["</p>"] = "\r\n\r\n";

	return rtrim(str_replace(
		array_keys($replace),
		array_values($replace),
		$s
	));
}

/**
 * Hexadecimal to RGB
 *
 * Function for converting a hexadecimal color value to RGB
 *
 * @since 1.0.0
 */

function fsn_hex2rgb($hex)
{
	$hex = str_replace("#", "", $hex);

	if (strlen($hex) == 3) {
		$r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
		$g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
		$b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
	} else {
		$r = hexdec(substr($hex, 0, 2));
		$g = hexdec(substr($hex, 2, 2));
		$b = hexdec(substr($hex, 4, 2));
	}
	$rgb = array($r, $g, $b);
	//return implode(",", $rgb); // returns the rgb values separated by commas
	return $rgb; // returns an array with the rgb values
}

/**
 * Register Style Params
 *
 * Function for building fusion element style output. Returns the element CSS classes.
 *
 * @since 1.0.0
 *
 * @param array $atts
 * @return string
 */

function fsn_style_params_class($atts)
{
	global $fsn_style_output;
	$style_params_class = 'fsn-' . uniqid();

	if (!empty($atts)) {
		extract(shortcode_atts(array(
			'margin' => '',
			'margin_xs_custom' => '',
			'margin_xs' => '',
			'padding' => '',
			'padding_xs_custom' => '',
			'padding_xs' => '',
			'text_align' => '',
			'text_align_xs' => '',
			'font_size' => '',
			'color' => '',
			'background_color' => '',
			'background_color_opacity' => '',
			'hidden_xs' => '',
			'visible_xs' => '',
			'sr_only' => '',
			'user_classes' => ''
		), $atts));

		//populate style params array
		$fsn_style_output[$style_params_class] = array();
		!empty($margin) ? $fsn_style_output[$style_params_class]['margin'] = FusionCore::decode_custom_entities($margin) : '';
		!empty($margin_xs_custom) ? $fsn_style_output[$style_params_class]['margin_xs_custom'] = $margin_xs_custom : '';
		!empty($margin_xs) ? $fsn_style_output[$style_params_class]['margin_xs'] = FusionCore::decode_custom_entities($margin_xs) : '';
		!empty($padding) ? $fsn_style_output[$style_params_class]['padding'] = FusionCore::decode_custom_entities($padding) : '';
		!empty($padding_xs_custom) ? $fsn_style_output[$style_params_class]['padding_xs_custom'] = $padding_xs_custom : '';
		!empty($padding_xs) ? $fsn_style_output[$style_params_class]['padding_xs'] = FusionCore::decode_custom_entities($padding_xs) : '';
		!empty($text_align) ? $fsn_style_output[$style_params_class]['text_align'] = $text_align : '';
		!empty($text_align_xs) ? $fsn_style_output[$style_params_class]['text_align_xs'] = $text_align_xs : '';
		!empty($font_size) ? $fsn_style_output[$style_params_class]['font_size'] = $font_size : '';
		!empty($color) ? $fsn_style_output[$style_params_class]['color'] = $color : '';
		!empty($background_color) ? $fsn_style_output[$style_params_class]['background_color'] = $background_color : '';
		!empty($background_color_opacity) ? $fsn_style_output[$style_params_class]['background_color_opacity'] = $background_color_opacity : '';
		$fsn_style_output = apply_filters('fsn_style_output', $fsn_style_output, $style_params_class, $atts);
		//add visibility classes
		$style_params_class .= !empty($hidden_xs) ? ' hidden-xs' : '';
		$style_params_class .= !empty($visible_xs) ? ' visible-xs-block' : '';
		$style_params_class .= !empty($sr_only) ? ' sr-only' : '';
		//add user classes
		$style_params_class .= !empty($user_classes) ? ' ' . $user_classes : '';
	}

	return esc_attr(apply_filters('fsn_style_params_class', $style_params_class, $atts));
}

/**
 * Sort Params into Sections
 *
 * Function for sorting element params into registered sections. Returns the sorted sections array.
 *
 * @since 1.0.0
 *
 * @return array
 */

function fsn_get_sorted_param_sections($params)
{
	global $fsn_param_sections;
	for ($i = 0; $i < count($fsn_param_sections); $i++) {
		$fsn_param_sections[$i]['params'] = array();
		foreach ($params as $param) {
			$param_section = !empty($param['section']) ? $param['section'] : 'general';
			if ($param_section == $fsn_param_sections[$i]['id']) {
				$fsn_param_sections[$i]['params'][] = $param;
			}
		}
	}
	return $fsn_param_sections;
}

/**
 * Get Dynamic Image
 *
 * Function for getting and returning a dynamic image that updates via JavaScript based on resolution
 *
 * @since 1.0.0
 *
 * @param int $image_id The image ID to return
 * @param string $classes CSS classes to add to the image (optional)
 * @param string $desktop_size The desktop image size (defaults to hi-res)
 * @param string $mobile_size The mobile image size (defaults to mobile)
 * @param boolean $desktop_init Load the desktop size by default
 *
 */

function fsn_get_dynamic_image($image_id, $classes, $desktop_size = 'hi-res', $mobile_size = 'mobile', $desktop_init = false, $lazy = false)
{
	if (!empty($image_id)) {
		$image_id = intval($image_id);
		$attachment_attrs_mobile = wp_get_attachment_image_src($image_id, $mobile_size);
		$attachment_attrs_desktop = wp_get_attachment_image_src($image_id, $desktop_size);
		$attachment_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		$image_data = array(
			'id' => $image_id,
			'mobile_src' => $attachment_attrs_mobile[0],
			'mobile_width' => $attachment_attrs_mobile[1],
			'mobile_height' => $attachment_attrs_mobile[2],
			'desktop_src' => $attachment_attrs_desktop[0],
			'desktop_width' => $attachment_attrs_desktop[1],
			'desktop_height' => $attachment_attrs_desktop[2]
		);
		if ($desktop_init === true) {
			$attachment_src = $attachment_attrs_desktop[0];
			$attachment_width = $attachment_attrs_desktop[1];
			$attachment_height = $attachment_attrs_desktop[2];
		} else {
			$attachment_src = $attachment_attrs_mobile[0];
			$attachment_width = $attachment_attrs_mobile[1];
			$attachment_height = $attachment_attrs_mobile[2];
		}
		$image = '<img class="ad-dynamic-image' . (!empty($classes) ? ' ' . esc_attr($classes) : '') . '" src="' . esc_url($attachment_src) . '" width="' . esc_attr($attachment_width) . '" height="' . esc_attr($attachment_height) . '" alt="' . esc_attr($attachment_alt) . '" data-image-json="' . esc_attr(json_encode($image_data)) . '"' . (!empty($lazy) ? ' loading="lazy"' : '') . '>';
	}

	return $image;
}

/**
 * Get Image Sizes
 *
 * Return an array of image sizes formatted for selection in element fields.
 *
 */

function fsn_get_image_sizes()
{
	$image_sizes = get_intermediate_image_sizes();
	$image_sizes_array = array();
	$image_sizes_array[''] = __('Choose image size.', 'fusion');
	$image_sizes_array['full'] = __('Full Size', 'fusion');
	foreach ($image_sizes as $image_size) {
		$image_sizes_array[$image_size] = __(ucwords(str_replace(array('-', '_'), ' ', $image_size)), 'fusion');
	}
	$image_sizes_array = apply_filters('fsn_selectable_image_sizes', $image_sizes_array);

	return $image_sizes_array;
}

/**
 * Get Button Object
 *
 * Return an array of the button parameters
 *
 */

function fsn_get_button_object($button)
{
	$button_array = json_decode(FusionCore::decode_custom_entities($button));
	$button_link = !empty($button_array->link) ? $button_array->link : '';
	$button_label = !empty($button_array->label) ? $button_array->label : '';
	$button_aria_label = !empty($button_array->ariaLabel) ? $button_array->ariaLabel : '';
	$button_attached_id = !empty($button_array->attachedID) ? $button_array->attachedID : '';
	$button_target = !empty($button_array->target) ? $button_array->target : '';
	$button_type = !empty($button_array->type) ? $button_array->type : '';
	$button_collapse_id = !empty($button_array->collapseID) ? $button_array->collapseID : '';
	$button_collapse_label_show = !empty($button_array->collapseLabelShow) ? $button_array->collapseLabelShow : '';
	$button_collapse_label_hide = !empty($button_array->collapseLabelHide) ? $button_array->collapseLabelHide : '';
	$button_component_id = !empty($button_array->componentID) ? $button_array->componentID : '';

	$button_object = array();
	switch ($button_type) {
		case 'external':
			$button_object['button_type'] = 'external';
			$button_object['button_link'] = $button_link;
			$button_object['button_label'] = $button_label;
			$button_object['button_aria_label'] = $button_aria_label;
			if (!empty($button_target)) {
				$button_object['button_target'] = $button_target;
			}
			break;
		case 'internal':
			$button_object['button_type'] = 'internal';
			if (!empty($button_attached_id)) {
				$button_link = get_permalink($button_attached_id);
				$button_object['button_attached_id'] = $button_attached_id;
				$button_object['button_link'] = $button_link;
			}
			$button_object['button_label'] = $button_label;
			$button_object['button_aria_label'] = $button_aria_label;
			if (!empty($button_target)) {
				$button_object['button_target'] = $button_target;
			}
			break;
		case 'collapse':
			if (!empty($button_component_id)) {
				$button_collapse_id = '#component-' . $button_component_id;
			}
			$button_object['button_type'] = 'collapse';
			$button_object['button_link'] = $button_collapse_id;
			$button_object['button_label'] = $button_collapse_label_show;
			$button_object['button_aria_label'] = $button_aria_label;
			$button_object['button_label_show'] = $button_collapse_label_show;
			$button_object['button_label_hide'] = $button_collapse_label_hide;
			break;
		case 'modal':
			//add modal component to global attached modals array
			global $fsn_attached_modals;
			if (!empty($button_component_id)) {
				$fsn_attached_modals[] = $button_component_id;
				$button_modal_id = '#modal-component-' . $button_component_id;
			}
			$button_object['button_type'] = 'modal';
			$button_object['button_link'] = $button_modal_id;
			$button_object['button_label'] = $button_label;
			$button_object['button_aria_label'] = $button_aria_label;
			break;
		default:
			$button_object['button_link'] = $button_link;
			$button_object['button_label'] = $button_label;
			$button_object['button_aria_label'] = $button_aria_label;
			if (!empty($button_target)) {
				$button_object['button_target'] = $button_target;
			}
			break;
	}
	return apply_filters('fsn_button_object', $button_object, $button);
}

/**
 * Get Button Anchor Attributes
 *
 * Return an string of button anchor attributes
 *
 */

function fsn_get_button_anchor_attributes($button_object, $classes = false)
{
	extract($button_object);
	$button_attributes = '';
	$button_attributes .= !empty($button_link) ? ' href="' . esc_url($button_link) . '"' : ' href="#"';
	$button_attributes .= !empty($classes) ? ' class="' . esc_attr($classes) . '"' : '';
	$button_attributes .= !empty($button_target) ? ' target="' . esc_attr($button_target) . '"' : '';
	if (!empty($button_target) && $button_target == '_blank') {
		$button_attributes .= ' rel="noopener"';
	}
	if (!empty($button_aria_label)) {
		$button_attributes .= ' aria-label="' . esc_attr($button_aria_label) . '"';
	}
	if (!empty($button_type) && $button_type == 'collapse') {
		$button_attributes .= ' data-toggle="collapse"';
		if (!empty($button_label_show) && !empty($button_label_hide)) {
			$button_attributes .= ' data-label-show="' . esc_attr($button_label_show) . '"';
			$button_attributes .= ' data-label-hide="' . esc_attr($button_label_hide) . '"';
			$button_attributes .= ' role="button"';
		}
	} elseif (!empty($button_type) && $button_type == 'modal') {
		$button_attributes .= ' data-toggle="modal"';
		$button_attributes .= ' role="button"';
	}
	return apply_filters('fsn_button_anchor_attributes', $button_attributes, $button_object, $classes);
}

/**
 * Pagination
 *
 * Function for outputting pagination
 *
 * @since 1.0.0
 *
 */

//pagination **passing a $query_max_pages fixes pagination for custom WP_Query objects
function fsn_pagination($query_max_pages = false)
{
	global $wp_query;
	if (!empty($query_max_pages)) {
		$total_pages = $query_max_pages;
	} else {
		$total_pages = $wp_query->max_num_pages;
	}
	if ($total_pages > 1) {
		$previous_page_label = __('&laquo; Previous Page', 'fusion');
		$next_page_label = __('Next Page &raquo;', 'fusion');
		echo '<ul class="pager">';
		echo '<li class="previous">' . wp_kses_post(get_previous_posts_link($previous_page_label)) . '</li>';
		echo '<li class="next">' . wp_kses_post(get_next_posts_link($next_page_label, $total_pages)) . '</li>';
		echo '</ul>';
	}
}

/**
 * Get Metadata
 *
 * Function for getting and returning post metadata
 *
 * @since 1.0.0
 *
 * @return string
 */

function fsn_get_post_meta($args = false)
{
	global $post;

	$defaults = array(
		'author' => true,
		'date' => true,
		'categories' => true,
		'tags' => true,
	);
	extract(wp_parse_args($args, $defaults));

	$output = '';
	$separator = apply_filters('fsn_post_meta_separator', '&bull;');
	if (!empty($author)) {
		$author = get_the_author();
		$output .= sprintf(__('By %1$s', 'fusion'), $author);
	}
	if (!empty($date)) {
		$date = get_the_date();
		$output .= !empty($author) ? sprintf(__(' on %1$s', 'fusion'), $date) : $date;
	}
	if (!empty($categories)) {
		$post_type = get_post_type();
		$taxonomy = apply_filters('fsn_post_meta_taxonomy', 'category', $post_type);
		if (!empty($taxonomy)) {
			$categories_array = get_the_terms($post->ID, $taxonomy);
			if (!empty($categories_array)) {
				$numcats = count($categories_array);
				$i = 0;
				$categories = '';
				foreach ($categories_array as $category) {
					$i++;
					$category_aria_label = sprintf(__('View posts in the %s category', 'fusion'), $category->name);
					$categories .= '<a href="' . esc_url(get_term_link($category, $taxonomy)) . '" aria-label="' . esc_attr($category_aria_label) . '">' . $category->name . '</a>';
					$categories .= $i < $numcats ? ', ' : '';
				}
				$output .= !empty($author) || !empty($date) ? ' ' . $separator . ' ' . $categories : $categories;
			}
		}
	}
	if (!empty($tags)) {
		//tags
		$tags_array = get_the_tags($post->ID);
		if (!empty($tags_array)) {
			$numtags = count($tags_array);
			$i = 0;
			$tags = '';
			foreach ($tags_array as $tag) {
				$i++;
				$tags .= '<a href="' . esc_url(get_term_link($tag, $taxonomy)) . '">' . $tag->name . '</a>';
				$tags .= $i < $numtags ? ', ' : '';
			}
			$output .= '<br><span class="post-tags">' . $tags . '</span>';
		}
	}
	return $output;
}

/**
 * Get Post IDs by Type
 *
 * Function for getting and returning an array of post IDs by post type(s)
 *
 * @since 1.0.0
 * @deprecated 1.1.0
 * @see posts_search()
 *
 * @param mixed $post_types A string or array of post types to return
 *
 */

function fsn_get_post_ids_by_type($post_types = false)
{
	$post_ids = array();
	return $post_ids;
}

/**
 * Get Post IDs and Title by Type
 *
 * Function for getting and returning an array of post IDs and titles by post type(s)
 *
 * @since 1.0.0
 * @deprecated 1.1.0
 * @see posts_search()
 *
 * @param mixed $post_types A string or array of post types to return
 *
 */

function fsn_get_post_ids_titles_by_type($post_types = false)
{
	$post_ids = array();
	return $post_ids;
}
