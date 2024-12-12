<?php

/**
 * @package Fusion
 */

/**
 * FusionCoreExtend class.
 *
 * Class for extending the Fusion content components via shortcodes.
 *
 * @since 1.0.0
 */

class FusionCoreExtend
{

	public function __construct($name, $shortcode_tag, $description, $icon, $disable_style_params, $params)
	{

		// Set extension parameters
		$this->name = $name;
		$this->shortcode_tag = $shortcode_tag;
		$this->description = $description;
		$this->icon = $icon;
		$this->disable_style_params = $disable_style_params;
		$this->params = $params;

		// Add extensions to global variable
		global $fsn_elements;
		$fsn_elements[] = $this;

		// Add action and filter to hook into Fusion elements during init phase
		do_action('fsn_extension_init', $this);

		//if running AJAX, get action being run
		$ajax_action = false;
		if (is_admin() || (defined('DOING_AJAX') && DOING_AJAX)) {
			if (!empty($_POST['action'])) {
				$ajax_action = sanitize_text_field($_POST['action']);
			}
		}

		// Initialize Shortcodes
		if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX || (!empty($ajax_action) && $ajax_action == 'load_template' || $ajax_action == 'components_modal'))) {
			remove_shortcode($shortcode_tag);
			add_shortcode($shortcode_tag, array($this, 'extension_shortcode'));
		}

		// Initialize AJAX modals
		add_action('wp_ajax_' . $this->shortcode_tag . '_modal', array($this, 'render_mapped_modal'));
	}

	/**
	 * The shortcode.
	 *
	 * Generate a user added shortcode
	 *
	 * The supported attributes are passed via the mapping function.
	 *
	 * @since 1.0.0
	 *
	 * @param array $attr Attributes attributed to the shortcode.
	 * @param string $content Optional. Shortcode content.
	 * @return string
	 */

	public function extension_shortcode($atts, $content = null)
	{

		$shortcode_atts_data = '';
		if (!empty($atts)) {
			foreach ($atts as $key => $value) {
				$att_name = str_replace('_', '-', $key);
				$shortcode_atts_data .= ' data-' . esc_attr($att_name) . '="' . esc_attr($value) . '"';
			}
		}
		$element_label = !empty($atts['element_label']) ? FusionCore::decode_custom_entities($atts['element_label']) : $this->name;
		$output = '<div class="fsn-element ' . esc_attr($this->shortcode_tag) . '" data-shortcode-tag="' . esc_attr($this->shortcode_tag) . '">';
		$output .= '<div class="element-controls">';
		$output .= '<span class="element-controls-toggle" title="' . __('Element Options', 'fusion') . '"><i class="material-icons md-18">&#xE5D3;</i></span>';
		$output .= '<div class="element-controls-dropdown collapsed">';
		$output .= '<a href="#" class="edit-element">' . __('Edit', 'fusion') . '</a>';
		$output .= '<a href="#" class="duplicate-element">' . __('Duplicate', 'fusion') . '</a>';
		$output .= '<a href="#" class="delete-element">' . __('Delete', 'fusion') . '</a>';
		$output .= '</div>';
		$output .= '<a href="#" class="control-icon edit-element" title="' . __('Edit Element', 'fusion') . '"><i class="material-icons md-18">&#xE3C9;</i></a>';
		$output .= '</div>';
		$output .= '<div class="element-label" title="' . esc_attr($this->name) . '">' . esc_html($element_label) . '</div>';
		$output .= '<div class="element-text-holder"' . (!empty($shortcode_atts_data) ? $shortcode_atts_data : '') . '>';
		$output .= apply_filters('fsn_admin_shortcode_content_output', wpautop($content), $this->shortcode_tag, $content);
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	/**
	 * Render shortcode modal.
	 *
	 * @since 1.0.0
	 */

	public function render_mapped_modal()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!current_user_can('edit_post', intval($_POST['post_id'])))
			die('-1');

		$content_html = stripslashes(wp_filter_post_kses($_POST['content_html']));
		$saved_values = !empty($_POST['saved_values']) ? $_POST['saved_values'] : '';
		if (empty($saved_values)) {
			$saved_values = array();
		} else {
			foreach ($saved_values as $key => $value) {
				$saved_values[$key] = wp_filter_post_kses($value);
			}
		}
		//filter params
		$params = $this->params;

		//add admin label param
		$params[] = array(
			'type' => 'text',
			'param_name' => 'element_label',
			'label' => __('Admin Label', 'fusion'),
			'placeholder' => $this->name,
			'help' => __('Input admin label. Default is Element name.', 'fusion'),
			'section' => 'advanced'
		);

		//filter element params
		$params = apply_filters('fsn_element_params', $params, $this->shortcode_tag, $saved_values);

		//add style params
		global $fsn_style_params;
		$style_params = $fsn_style_params;
		if (!empty($this->disable_style_params)) {
			$disable = $this->disable_style_params;
			for ($i = 0; $i < count($style_params); $i++) {
				if (in_array($style_params[$i]['param_name'], $disable)) {
					unset($style_params[$i]);
				}
			}
		}
		$params = array_merge_recursive($params, $style_params);

		//sort params into sections
		$fsn_param_sections = fsn_get_sorted_param_sections($params);
		$tabset_id = uniqid();
?>
		<div class="modal" id="<?php echo esc_attr($this->shortcode_tag) ?>_modal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header has-tabs">
						<h4 class="modal-title"><?php echo esc_html($this->name); ?></h4>
						<a href="#" class="close" data-dismiss="modal" aria-label="<?php esc_html_e('Close', 'fusion'); ?>"><span aria-hidden="true"><i class="material-icons">&#xE5CD;</i></span></a>
						<?php
						echo '<ul class="nav nav-tabs" role="tablist">';
						$active_tab = true;
						for ($i = 0; $i < count($fsn_param_sections); $i++) {
							if (count($fsn_param_sections[$i]['params']) > 0) {
								echo '<li role="presentation"' . ($active_tab == true ? ' class="active"' : '') . '><a href="#' . esc_attr($fsn_param_sections[$i]['id']) . '-' . esc_attr($tabset_id) . '" aria-controls="options" role="tab" data-toggle="tab">' . esc_html($fsn_param_sections[$i]['name']) . '</a></li>';
								$active_tab = false;
							} else {
								echo '<li role="presentation" style="display:none;"><a href="#' . esc_attr($fsn_param_sections[$i]['id']) . '-' . esc_attr($tabset_id) . '" aria-controls="options" role="tab" data-toggle="tab">' . esc_html($fsn_param_sections[$i]['name']) . '</a></li>';
							}
						}
						echo '</ul>';
						?>
					</div>
					<div class="modal-body">
						<form role="form">
							<?php
							echo '<div class="tab-content">';
							$active_tab = true;
							for ($i = 0; $i < count($fsn_param_sections); $i++) {
								if (count($fsn_param_sections[$i]['params']) > 0) {
									echo '<div role="tabpanel" class="tab-pane' . ($active_tab == true ? ' active' : '') . '" id="' . esc_attr($fsn_param_sections[$i]['id']) . '-' . esc_attr($tabset_id) . '" data-section-id="' . esc_attr($fsn_param_sections[$i]['id']) . '">';
									echo !empty($this->description) && $active_tab == true ? '<p class="fsn-element-description">' . esc_html($this->description) . '</p>' : '';
									foreach ($fsn_param_sections[$i]['params'] as $param) {
										//check for saved values
										if (!empty($param['param_name'])) {
											if (!isset($param['content_field']) && $param['param_name'] == 'fsncontent') {
												$param['content_field'] = true;
											} elseif (empty($param['content_field'])) {
												$param['content_field'] = false;
											}
											$data_attribute_name = str_replace('_', '-', $param['param_name']);
											if (array_key_exists($data_attribute_name, $saved_values)) {
												$param_value = stripslashes($saved_values[$data_attribute_name]);
												if (!empty($param['encode_base64'])) {
													$param_value = wp_strip_all_tags($param_value);
													$param_value = htmlentities(base64_decode($param_value));
												} else if (!empty($param['encode_url'])) {
													$param_value = wp_strip_all_tags($param_value);
													$param_value = urldecode($param_value);
												}
												//decode custom entities
												$param_value = FusionCore::decode_custom_entities($param_value);
											} elseif (!empty($param['content_field']) || !empty($param['item_params'])) {
												$param_value = $content_html;
												if (!empty($param['content_field']) && !empty($param['encode_base64'])) {
													$param_value = wp_strip_all_tags($param_value);
													$param_value = htmlentities(base64_decode($param_value));
												} else if (!empty($param['content_field']) && !empty($param['encode_url'])) {
													$param_value = wp_strip_all_tags($param_value);
													$param_value = urldecode($param_value);
												}
											} else {
												$param_value = '';
											}
										} else {
											$param_value = '';
										}
										//check for dependency
										$dependency = !empty($param['dependency']) ? true : false;
										if ($dependency === true) {
											$depends_on_param = $param['dependency']['param_name'];
											$depends_on_not_empty = !empty($param['dependency']['not_empty']) ? $param['dependency']['not_empty'] : false;
											if (!empty($param['dependency']['value']) && is_array($param['dependency']['value'])) {
												$depends_on_value = json_encode($param['dependency']['value']);
											} else if (!empty($param['dependency']['value'])) {
												$depends_on_value = $param['dependency']['value'];
											} else {
												$depends_on_value = '';
											}
											$dependency_callback = !empty($param['dependency']['callback']) ? $param['dependency']['callback'] : '';
											$dependency_string = ' data-dependency-param="' . esc_attr($depends_on_param) . '"' . ($depends_on_not_empty === true ? ' data-dependency-not-empty="true"' : '') . (!empty($depends_on_value) ? ' data-dependency-value="' . esc_attr($depends_on_value) . '"' : '') . (!empty($dependency_callback) ? ' data-dependency-callback="' . esc_attr($dependency_callback) . '"' : '');
										}
										// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										echo '<div class="form-group' . (!empty($param['class']) ? ' ' . esc_attr($param['class']) : '') . '"' . ($dependency === true ? $dependency_string : '') . '>';
										// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										echo FusionCore::get_input_field($param, $param_value);
										echo '</div>';
									}
									echo '</div>';
									$active_tab = false;
								} else {
									echo '<div role="tabpanel" class="tab-pane" id="' . esc_attr($fsn_param_sections[$i]['id']) . '-' . esc_attr($tabset_id) . '" data-section-id="' . esc_attr($fsn_param_sections[$i]['id']) . '"></div>';
								}
							}
							echo '</div>';
							?>
						</form>
					</div>
					<div class="modal-footer">
						<span class="save-notice"><?php esc_html_e('Changes will be saved on close.', 'fusion'); ?></span>
						<button type="button" class="button" data-dismiss="modal"><?php esc_html_e('Close', 'fusion'); ?></button>
					</div>
				</div>
			</div>
		</div>
<?php
		exit;
	}
}

?>