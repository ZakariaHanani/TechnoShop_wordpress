<?php

/**
 * @package Fusion
 */

/**
 * Custom List Extension
 *
 * Class for adding a flexible list with customizable fields to the Fusion engine
 *
 * @since 1.0.0
 */

class FusionCoreCustomList
{

	public function __construct()
	{

		// Create global custom lists variable
		global $fsn_custom_lists;
		$fsn_custom_lists = array();

		// Populate Custom Lists global
		add_action('fsn_extension_init', array($this, 'populate_custom_list_global'));

		//add custom list field type
		add_filter('fsn_input_types', array($this, 'add_custom_list_field_type'), 10, 3);

		//add new custom list item via AJAX
		add_action('wp_ajax_custom_list_add_item', array($this, 'add_custom_list_item'));

		//disable wpautop on admin shortcode content output
		add_filter('fsn_admin_shortcode_content_output', array($this, 'shortcode_content_unautop'), 10, 3);

		//add custom list item shortcode
		add_shortcode('fsn_custom_list_item', array($this, 'custom_list_item_shortcode'));

		//add filter to clean list items shortcode
		add_filter('fsn_clean_shortcodes', array($this, 'clean_custom_list_shortcodes'));
	}

	/**
	 * Pass registered list fields to JSON array
	 *
	 * @since 1.0.0
	 *
	 * @param array $extension The extension object
	 */

	public function populate_custom_list_global($extension)
	{
		$extension_params = $extension->params;
		if (!empty($extension_params)) {
			foreach ($extension_params as $extension_param) {
				if ($extension_param['type'] == 'custom_list') {
					global $fsn_custom_lists;
					$fsn_custom_lists[$extension_param['id']]['parent'] = $extension->shortcode_tag;
					$fsn_custom_lists[$extension_param['id']]['params'] = $extension_param['item_params'];
				}
			}
		}
	}

	/**
	 * Add custom list input type
	 *
	 * @since 1.0.0
	 *
	 * @param string $input The HTML for the input field(s)
	 * @param array $param The input parameters
	 * @param string $param_value The saved parameter value
	 * @return string The HTML for the input field(s)
	 */

	public function add_custom_list_field_type($input, $param, $param_value = '')
	{

		if ($param['type'] == 'custom_list') {

			$param['content_field'] = true;

			$input .= '<label for="fsn_' . esc_attr($param['param_name']) . '">' . esc_html($param['label']) . '</label>';
			$input .= !empty($param['help']) ? '<p class="help-block">' . esc_html($param['help']) . '</p>' : '';
			//drag and drop interface
			$input .= '<div class="custom-list-sort" data-list-id="' . esc_attr($param['id']) . '">';
			//output existing custom list items
			if (!empty($param_value)) {
				$input .= do_shortcode($param_value);
			}
			$input .= '</div>';
			//custom list items content (nested shortcodes)
			$input .= '<input type="hidden" class="form-control element-input content-field custom-list-items" name="' . $param['param_name'] . '" value="' . esc_attr($param_value) . '">';

			//add item button
			$input .= '<a href="#" class="button add-custom-list-item">' . __('Add Item', 'fusion') . '</a>';
			$input .= '<a href="#" class="button expand-all-list-items">' . __('Expand All', 'fusion') . '</a>';
			$input .= '<a href="#" class="button collapse-all-list-items">' . __('Collapse All', 'fusion') . '</a>';
		}

		return $input;
	}

	/**
	 * Add custom list item
	 *
	 * @since 1.0.0
	 */

	public function add_custom_list_item()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!current_user_can('edit_post', intval($_POST['post_id'])))
			die('-1');

		global $fsn_custom_lists;
		$listID = sanitize_text_field($_POST['listID']);
		$params = $fsn_custom_lists[$listID]['params'];
		$uniqueID = uniqid();
		echo '<div class="custom-list-item">';
		echo '<div class="custom-list-item-details">';
		foreach ($params as $param) {
			$param_value = '';
			$param['param_name'] = (!empty($param['param_name']) ? $param['param_name'] : '') . '-paramid' . $uniqueID;
			$param['nested'] = true;
			//check for dependency
			$dependency = !empty($param['dependency']) ? true : false;
			if ($dependency === true) {
				$depends_on_field = $param['dependency']['param_name'] . '-paramid' . $uniqueID;
				$depends_on_not_empty = !empty($param['dependency']['not_empty']) ? $param['dependency']['not_empty'] : false;
				if (!empty($param['dependency']['value']) && is_array($param['dependency']['value'])) {
					$depends_on_value = json_encode($param['dependency']['value']);
				} else if (!empty($param['dependency']['value'])) {
					$depends_on_value = $param['dependency']['value'];
				} else {
					$depends_on_value = '';
				}
				$dependency_callback = !empty($param['dependency']['callback']) ? $param['dependency']['callback'] : '';
				$dependency_string = ' data-dependency-param="' . esc_attr($depends_on_field) . '"' . ($depends_on_not_empty === true ? ' data-dependency-not-empty="true"' : '') . (!empty($depends_on_value) ? ' data-dependency-value="' . esc_attr($depends_on_value) . '"' : '') . (!empty($dependency_callback) ? ' data-dependency-callback="' . esc_attr($dependency_callback) . '"' : '');
			}
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<div class="form-group' . (!empty($param['class']) ? ' ' . esc_attr($param['class']) : '') . '"' . ($dependency === true ? $dependency_string : '') . '>';
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo FusionCore::get_input_field($param, $param_value);
			echo '</div>';
		}
		echo '<a href="#" class="collapse-custom-list-item">' . esc_html__('collapse', 'fusion') . '</a>';
		echo '<a href="#" class="remove-custom-list-item">' . esc_html__('remove', 'fusion') . '</a>';
		echo '</div>';
		echo '</div>';
		exit;
	}

	/**
	 * Custom List item shortcode
	 *
	 * @since 1.0.0
	 *
	 * @param array $atts The shortcode attributes.
	 * @param string $content The shortcode content.
	 */

	public function custom_list_item_shortcode($atts, $content)
	{
		global $fsn_custom_lists;
		$list_id = $atts['list_id'];
		$parent_shortcode = $fsn_custom_lists[$list_id]['parent'];

		//if running AJAX, get action being run
		$ajax_action = false;
		if (defined('DOING_AJAX') && DOING_AJAX) {
			if (!empty($_POST['action'])) {
				$ajax_action = sanitize_text_field($_POST['action']);
			}
		}

		if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX || (!empty($ajax_action) && $ajax_action == 'load_template') || (!empty($ajax_action) && $ajax_action ==  $parent_shortcode . '_modal'))) {
			$uniqueID = uniqid();
			$output = '';
			$output .= '<div class="custom-list-item collapse-active">';
			$output .= '<div class="custom-list-item-details">';
			foreach ($fsn_custom_lists[$list_id]['params'] as $param) {
				if (!empty($param['param_name'])) {
					$param_name = $param['param_name'];
					if (array_key_exists($param_name, $atts)) {
						$param_value = stripslashes($atts[$param_name]);
						if (!empty($param['encode_base64'])) {
							$param_value = wp_strip_all_tags($param_value);
							$param_value = htmlentities(base64_decode($param_value));
						} else if (!empty($param['encode_url'])) {
							$param_value = wp_strip_all_tags($param_value);
							$param_value = urldecode($param_value);
						}
						//decode custom entities
						$param_value = FusionCore::decode_custom_entities($param_value);
					} else {
						$param_value = '';
					}
				} else {
					$param_value = '';
				}
				$param['nested'] = true;
				$param['param_name'] = $param['param_name'] . '-paramid' . $uniqueID;
				//check for dependency
				$dependency = !empty($param['dependency']) ? true : false;
				if ($dependency === true) {
					$depends_on_field = $param['dependency']['param_name'] . '-paramid' . $uniqueID;
					$depends_on_not_empty = !empty($param['dependency']['not_empty']) ? $param['dependency']['not_empty'] : false;
					if (!empty($param['dependency']['value']) && is_array($param['dependency']['value'])) {
						$depends_on_value = json_encode($param['dependency']['value']);
					} else if (!empty($param['dependency']['value'])) {
						$depends_on_value = $param['dependency']['value'];
					} else {
						$depends_on_value = '';
					}
					$dependency_callback = !empty($param['dependency']['callback']) ? $param['dependency']['callback'] : '';
					$dependency_string = ' data-dependency-param="' . esc_attr($depends_on_field) . '"' . ($depends_on_not_empty === true ? ' data-dependency-not-empty="true"' : '') . (!empty($depends_on_value) ? ' data-dependency-value="' . esc_attr($depends_on_value) . '"' : '') . (!empty($dependency_callback) ? ' data-dependency-callback="' . esc_attr($dependency_callback) . '"' : '');
				}
				$output .= '<div class="form-group' . (!empty($param['class']) ? ' ' . esc_attr($param['class']) : '') . '"' . ($dependency === true ? $dependency_string : '') . '>';
				$output .= FusionCore::get_input_field($param, $param_value);
				$output .= '</div>';
			}
			$output .= '<a href="#" class="collapse-custom-list-item">' . __('expand', 'fusion') . '</a>';
			$output .= '<a href="#" class="remove-custom-list-item">' . __('remove', 'fusion') . '</a>';
			$output .= '</div>';
			$output .= '</div>';
		} else {
			$output = '';
			$callback_function = 'fsn_get_' . sanitize_text_field($list_id) . '_list_item';
			$output .= call_user_func($callback_function, $atts, $content);
		}

		return $output;
	}

	/**
	 * Remove wpautop processing
	 *
	 * @since 1.0.0
	 */

	public function shortcode_content_unautop($autop_content, $shortcode_tag, $content)
	{
		if (has_shortcode($content, 'fsn_custom_list_item')) {
			return $content;
		} else {
			return $autop_content;
		}
	}

	/**
	 * Clean Custom List Shortcodes
	 *
	 * @since 1.0.0
	 *
	 * @param array $shortcodes_to_clean The array of shortcodes to clean.
	 */

	public function clean_custom_list_shortcodes($shortcodes_to_clean)
	{
		$shortcodes_to_clean[] = 'fsn_custom_list_item';
		return $shortcodes_to_clean;
	}
}

$fsn_core_custom_list = new FusionCoreCustomList();
