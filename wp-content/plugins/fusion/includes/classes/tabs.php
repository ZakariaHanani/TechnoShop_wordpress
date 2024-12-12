<?php

/**
 * @package Fusion
 */

/**
 * FusionCoreTabs class.
 *
 * Class for adding Tabs support to Fusion
 *
 * @since 1.0.0
 */

class FusionCoreTabs
{

	public function __construct()
	{

		//add shortcodes
		add_shortcode('fsn_tabs', array($this, 'tabs_shortcode'));
		add_shortcode('fsn_tab', array($this, 'tab_shortcode'));

		// Initialize AJAX modals
		add_action('wp_ajax_edit_tabs_modal', array($this, 'render_edit_tabs_modal'));
		add_action('wp_ajax_edit_tab_modal', array($this, 'render_edit_tab_modal'));
	}

	/**
	 * The Tabs shortcode.
	 *
	 * Output a tabs container into the content area. Tabs containers contain tabs.
	 *
	 * @since 1.0.0
	 *
	 * @param array $attr Attributes attributed to the shortcode.
	 * @param string $content Optional. Shortcode content.
	 * @return string
	 */

	public function tabs_shortcode($atts, $content = null)
	{

		extract(shortcode_atts(array(
			'tabs_layout' => '',
			'tabs_fade' => ''
		), $atts));

		global $fsn_tab_counter;
		$fsn_tab_counter = 0;

		//if running AJAX, get action being run
		$ajax_action = false;
		if (defined('DOING_AJAX') && DOING_AJAX) {
			if (!empty($_POST['action'])) {
				$ajax_action = sanitize_text_field($_POST['action']);
			}
		}

		//build output
		if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX || (!empty($ajax_action) && $ajax_action == 'load_template' || $ajax_action == 'components_modal'))) {
			$shortcode_atts_data = '';
			if (!empty($atts)) {
				foreach ($atts as $key => $value) {
					$att_name = str_replace('_', '-', $key);
					$shortcode_atts_data .= ' data-' . esc_attr($att_name) . '="' . esc_attr($value) . '"';
				}
			}
			$output = '';
			$output .= '<div class="tabs-container"' . $shortcode_atts_data . '>';
			$output .= '<div class="tabs-header">';
			$output .= '<div class="tabs-controls">';
			$output .= '<span class="tabs-controls-toggle" title="' . __('Tabs Options', 'fusion') . '"><i class="material-icons md-18">&#xE5D3;</i></span>';
			$output .= '<div class="tabs-controls-dropdown collapsed">';
			$output .= '<a href="#" class="edit-tabs">' . __('Edit', 'fusion') . '</a>';
			$output .= '<a href="#" class="duplicate-tabs">' . __('Duplicate', 'fusion') . '</a>';
			$output .= '<a href="#" class="delete-tabs">' . __('Delete', 'fusion') . '</a>';
			$output .= '</div>';
			$output .= '<a href="#" class="control-icon edit-tabs" title="' . __('Edit Tabs', 'fusion') . '"><i class="material-icons md-18">&#xE3C9;</i></a>';
			$output .= '</div>';
			$output .= '<h3 class="tabs-title">' . __('Tabs', 'fusion') . '</h3>';
			$output .= '</div>';
			$output .= '<div class="tabs-wrapper">';
			$output .= '<div class="tabs-nav">';
			preg_match_all('/\[fsn_tab((?:\s+\w+(?:\s*=\s*(?:(?:"[^"]*")|(?:\'[^\']*\')|[^>\s]+))?)*)\s*/', $content, $matches, PREG_SET_ORDER);
			if (!empty($matches)) {
				$output .= '<ul class="nav nav-tabs">';
				$i = 0;
				foreach ($matches as $match) {
					$attributes_string = trim($match[1]);
					preg_match_all('/([^\"]+)="([^\"]+)"/i', $attributes_string, $tab_attributes_matches, PREG_SET_ORDER);
					$tab_attributes = array();
					foreach ($tab_attributes_matches as $tab_attribute) {
						$key = trim($tab_attribute[1]);
						$value = $tab_attribute[2];
						$tab_attributes[$key] = $value;
					}
					$tab_title = FusionCore::decode_custom_entities($tab_attributes['tab_title']);
					$tab_id = $tab_attributes['tab_id'];
					$output .= '<li' . ($i == 0 ? ' class="active"' : '') . '><a href="#' . esc_attr($tab_id) . '" data-toggle="tab">' . esc_html($tab_title) . '</a></li>';
					$i++;
				}
				$output .= '<li><a href="#" class="fsn-add-tab" title="' . __('Add Tab', 'fusion') . '"><i class="material-icons md-18">&#xE147;</i></a></li>';
				$output .= '</ul>';
			}
			$output .= '</div>';
			$output .= '<div class="tab-content">' . do_shortcode($content) . '</div>';
			$output .= '</div>';
			$output .= '</div>';
		} else {

			global $fsn_tab_output_phase, $fsn_tabs_settings;

			//build settings
			if (!empty($tabs_layout)) {
				$fsn_tabs_settings['layout'] = $tabs_layout;
			}
			if (!empty($tabs_fade)) {
				$fsn_tabs_settings['fade'] = $tabs_fade;
			}
			$fsn_tabs_settings = apply_filters('fsn_tabs_settings', $fsn_tabs_settings, $atts);

			//build classes
			$classes_array = array();

			if (!empty($tabs_layout)) {
				$classes_array[] = $tabs_layout;
			}

			//filter for adding classes
			$classes_array = apply_filters('fsn_tabs_classes', $classes_array, $atts);
			if (!empty($classes_array)) {
				$classes = implode(' ', $classes_array);
			}

			$output = '';

			$output .= '<div class="fsn-tabs-container ' . fsn_style_params_class($atts) . (!empty($classes) ? ' ' . esc_attr($classes) : '') . '">';
			//action hook for outputting content before tabs
			ob_start();
			do_action('fsn_before_tabs', $atts, $content);
			$output .= ob_get_clean();
			$output .= '<ul class="nav nav-tabs">';
			$fsn_tab_output_phase = 'tab_nav';
			$output .= do_shortcode($content);
			$output .= '</ul>';
			$output .= '<div class="tab-content">';
			$fsn_tab_counter = 0;
			$fsn_tab_output_phase = 'tab_content';
			$output .= do_shortcode($content);
			$output .= '</div>';
			//action hook for outputting content after tabs
			ob_start();
			do_action('fsn_after_tabs', $atts, $content);
			$output .= ob_get_clean();
			$output .= '</div>';

			unset($GLOBALS['fsn_tab_output_phase']);
			unset($GLOBALS['fsn_tabs_settings']);
		}

		unset($GLOBALS['fsn_tab_counter']);

		return $output;
	}

	/**
	 * The Tab shortcode.
	 *
	 * Output a tab into the content area. Tabs contain content.
	 *
	 * @since 1.0.0
	 *
	 * @param array $attr Attributes attributed to the shortcode.
	 * @param string $content Optional. Shortcode content.
	 * @return string
	 */

	public function tab_shortcode($atts, $content = null)
	{

		extract(shortcode_atts(array(
			'tab_title' => __('Tab', 'fusion'),
			'tab_id' => 'tab-' . uniqid(),
			'custom_tab_id' => ''
		), $atts));

		global $fsn_tab_counter;
		$fsn_tab_counter++;

		//if running AJAX, get action being run
		$ajax_action = false;
		if (defined('DOING_AJAX') && DOING_AJAX) {
			if (!empty($_POST['action'])) {
				$ajax_action = sanitize_text_field($_POST['action']);
			}
		}

		//build output
		if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX || (!empty($ajax_action) && $ajax_action == 'load_template' || $ajax_action == 'components_modal'))) {
			$shortcode_atts_data = '';
			if (!empty($atts)) {
				foreach ($atts as $key => $value) {
					$att_name = str_replace('_', '-', $key);
					$shortcode_atts_data .= ' data-' . esc_attr($att_name) . '="' . esc_attr($value) . '"';
				}
			}
			$output = '';
			$output .= '<div class="tab-pane' . ($fsn_tab_counter === 1 ? ' active' : '') . '" id="' . esc_attr($tab_id) . '">';
			$output .= '<div class="tab-container"' . $shortcode_atts_data . '>';
			$output .= '<div class="tab-header">';
			$output .= '<div class="tab-controls">';
			$output .= '<span class="tab-controls-toggle" title="' . __('Tab Options', 'fusion') . '"><i class="material-icons md-18">&#xE5D3;</i></span>';
			$output .= '<div class="tab-controls-dropdown collapsed">';
			$output .= '<a href="#" class="edit-tab">' . __('Edit', 'fusion') . '</a>';
			$output .= '<a href="#" class="duplicate-tab">' . __('Duplicate', 'fusion') . '</a>';
			$output .= '<a href="#" class="delete-tab">' . __('Delete', 'fusion') . '</a>';
			$output .= '</div>';
			$output .= '<a href="#" class="control-icon edit-tab" title="' . __('Edit Tab', 'fusion') . '"><i class="material-icons md-18">&#xE3C9;</i></a>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="tab-wrapper">';
			$output .= '<div class="tab">' . do_shortcode($content) . '</div>';
			$output .= '</div>';
			$output .= '<a href="#" class="fsn-add-element" data-container="tab" title="' . __('Add Element', 'fusion') . '"><i class="material-icons md-18">&#xE147;</i></a>';
			$output .= '</div>';
			$output .= '</div>';
		} else {

			global $fsn_tab_output_phase, $fsn_tabs_settings;

			//build classes
			$classes_array = array();

			//filter for adding classes
			$classes_array = apply_filters('fsn_tab_classes', $classes_array, $atts);
			if (!empty($classes_array)) {
				$classes = implode(' ', $classes_array);
			}

			$output = '';
			$tab_id = !empty($custom_tab_id) ? $custom_tab_id : $tab_id;

			switch ($fsn_tab_output_phase) {
				case 'tab_nav':
					$output .= '<li' . ($fsn_tab_counter === 1 ? ' class="active"' : '') . '><a href="#' . esc_attr($tab_id) . '" role="button" data-toggle="tab"' . (!empty($classes) ? ' class="' . esc_attr($classes) . '"' : '') . '>' . esc_html($tab_title) . '</a></li>';
					break;
				case 'tab_content':
					$output .= '<div id="' . esc_attr($tab_id) . '" class="tab-pane' . (!empty($fsn_tabs_settings['fade']) ? ' fade' : '') . (!empty($fsn_tabs_settings['fade']) && $fsn_tab_counter === 1 ? ' in' : '') . ($fsn_tab_counter === 1 ? ' active' : '') . '">';
					$output .= '<div class="fsn-tab-container' . (!empty($classes) ? ' ' . esc_attr($classes) : '') . '">';
					$output .= '<div class="visible-print-block fsn-tab-label">' . esc_html($tab_title) . '</div>';
					$output .= do_shortcode($content);
					$output .= '</div>';
					$output .= '</div>';
					break;
			}
		}

		return $output;
	}

	/**
	 * Render edit tabs modal.
	 *
	 * @since 1.0.0
	 */

	public function render_edit_tabs_modal()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!current_user_can('edit_post', intval($_POST['post_id'])))
			die('-1');

		$saved_values = !empty($_POST['saved_values']) ? $_POST['saved_values'] : '';
		if (empty($saved_values)) {
			$saved_values = array();
		} else {
			foreach ($saved_values as $key => $value) {
				$saved_values[$key] = wp_filter_post_kses($value);
			}
		}

		$params = array();

		//tabs layouts
		$tabs_layouts_array = array(
			'' => __('Choose tabs layout.', 'fusion')
		);
		$tabs_layouts_array = apply_filters('fsn_tabs_layouts', $tabs_layouts_array);

		//map tabs parameters
		if (count($tabs_layouts_array) > 1) {
			$params[] = array(
				'type' => 'select',
				'options' => $tabs_layouts_array,
				'param_name' => 'tabs_layout',
				'label' => __('Tabs Layout', 'fusion')
			);
		}

		$params[] = array(
			'type' => 'checkbox',
			'param_name' => 'tabs_fade',
			'label' => __('Fade', 'fusion'),
			'help' => __('Check to enable tab fade transitions.', 'fusion'),
			'section' => 'animation'
		);

		//filter tabs params
		$params = apply_filters('fsn_tabs_params', $params);

		//add style params
		global $fsn_style_params;
		$style_params = $fsn_style_params;
		$params = array_merge_recursive($params, $style_params);

		//sort params into sections
		$fsn_param_sections = fsn_get_sorted_param_sections($params);
		$tabset_id = uniqid();
?>
		<div class="modal" id="editTabsModal" tabindex="-1" role="dialog" aria-labelledby="fsnModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header has-tabs">
						<h4 class="modal-title" id="fsnModalLabel"><?php esc_html_e('Edit Tabs', 'fusion'); ?></h4>
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

	/**
	 * Render edit tab modal.
	 *
	 * @since 1.0.0
	 */

	public function render_edit_tab_modal()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!current_user_can('edit_post', intval($_POST['post_id'])))
			die('-1');

		$saved_values = !empty($_POST['saved_values']) ? $_POST['saved_values'] : '';
		if (empty($saved_values)) {
			$saved_values = array();
		} else {
			foreach ($saved_values as $key => $value) {
				$saved_values[$key] = wp_filter_post_kses($value);
			}
		}
	?>
		<div class="modal" id="editTabModal" tabindex="-1" role="dialog" aria-labelledby="fsnModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="fsnModalLabel"><?php esc_html_e('Edit Tab', 'fusion'); ?></h4>
						<a href="#" class="close" data-dismiss="modal" aria-label="<?php esc_html_e('Close', 'fusion'); ?>"><span aria-hidden="true"><i class="material-icons">&#xE5CD;</i></span></a>
					</div>
					<div class="modal-body">
						<form role="form">
							<?php
							//map tab parameters
							$params = array(
								array(
									'type' => 'text',
									'param_name' => 'tab_title',
									'label' => __('Title', 'fusion')
								),
								array(
									'type' => 'text',
									'param_name' => 'custom_tab_id',
									'label' => __('Tab ID', 'fusion'),
									'help' => __('Input Tab custom ID. Can be used to target Tab with CSS and Javascript.', 'fusion')
								)
							);

							//filter tab params
							$params = apply_filters('fsn_tab_params', $params);

							if (!empty($params)) {
								foreach ($params as $param) {
									//check for saved values
									if (!empty($param['param_name'])) {
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
							}
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

$fsn_core_tabs = new FusionCoreTabs();

?>