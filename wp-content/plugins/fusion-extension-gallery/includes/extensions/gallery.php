<?php
/**
 * @package Fusion_Extension_Gallery
 */

/**
 * Gallery Extension
 *
 * Class for adding a flexible multimedia Gallery to the Fusion engine
 *
 * @since 1.0.0
 */

class FusionGallery	{

	public function __construct() {

		//add gallery field type
		add_filter('fsn_input_types', array($this, 'add_gallery_field_type'), 10, 3);

		//add gallery shortcode
		add_shortcode('fsn_gallery', array($this, 'gallery_shortcode'));

		//load gallery layout via AJAX
		add_action('wp_ajax_gallery_load_layout', array($this, 'load_gallery_layout'));

		//load saved gallery layout fields
		add_filter('fsn_element_params', array($this, 'load_saved_gallery_layout_fields'), 10, 3);

		//initialize gallery
		add_action('init', array($this, 'init_gallery'), 12);

		//clean up gallery
		add_action('wp_footer', array($this, 'cleanup_gallery'));

		//add gallery item shortcode
		add_shortcode('fsn_gallery_item', array($this, 'gallery_item_shortcode'));

		//add new gallery item via AJAX
		add_action('wp_ajax_gallery_add_item', array($this, 'add_gallery_item'));

		//disable wpautop on admin shortcode content output
		add_filter('fsn_admin_shortcode_content_output', array($this, 'shortcode_content_unautop'), 10, 3);

		//add filter to clean gallery items shortcode
		add_filter('fsn_clean_shortcodes', array($this, 'clean_gallery_shortcodes'));

		//add masthead layout
		add_filter('add_gallery_layout', array($this, 'masthead_layout'));

		//add inline layout
		add_filter('add_gallery_layout', array($this, 'inline_layout'));

		//add carousel layout
		add_filter('add_gallery_layout', array($this, 'carousel_layout'));

	}

	/**
	 * Add gallery input type
	 *
	 * @since 1.0.0
	 *
	 * @param string $input The HTML for the input field(s)
	 * @param array $param The input parameters
	 * @param string $param_value The saved parameter value
	 * @return string The HTML for the input field(s)
	 */

	public function add_gallery_field_type($input, $param, $param_value = '') {

		if ($param['type'] == 'gallery') {
			global $fsn_gallery_layouts;

			$input .= '<label for="fsn_'. esc_attr($param['param_name']) .'">'. esc_html($param['label']) .'</label>';
			$input .= !empty($param['help']) ? '<p class="help-block">'. esc_html($param['help']) .'</p>' : '';
			//drag and drop interface
			$input .= '<div class="gallery-sort">';
				//output existing gallery items
		    	if ( !empty($param_value) ) {
		    		$input .= do_shortcode($param_value);
		    	}
		    $input .= '</div>';
		    //gallery items content (nested shortcodes)
			$input .= '<input type="hidden" class="form-control element-input content-field" name="'. esc_attr($param['param_name']) .'" value="'. esc_attr($param_value) .'">';

		    //add item button
		    $input .= '<a href="#" class="button add-gallery-item">'. __('Add Item', 'fusion-extension-gallery') .'</a>';
		    $input .= '<a href="#" class="button expand-all-gallery-items">'. __('Expand All', 'fusion-extension-gallery') .'</a>';
		    $input .= '<a href="#" class="button collapse-all-gallery-items">'. __('Collapse All', 'fusion-extension-gallery') .'</a>';

		}

		return $input;
	}

	/**
	 * Load Gallery Layout
	 *
	 * @since 1.0.0
	 */

	public function load_gallery_layout() {
		//verify nonce
		check_ajax_referer( 'fsn-admin-edit-gallery', 'security' );

		//verify capabilities
		if ( !current_user_can( 'edit_post', intval($_POST['post_id']) ) )
			die( '-1' );

		global $fsn_gallery_layouts;
		$gallery_layout = sanitize_text_field($_POST['gallery_layout']);
		$response_array = array();

		if (!empty($fsn_gallery_layouts) && !empty($gallery_layout)) {
			$response_array = array();
			if (!empty($fsn_gallery_layouts[$gallery_layout]['params'])) {
				foreach($fsn_gallery_layouts[$gallery_layout]['params'] as $param) {
					$param_value = '';
					$param['section'] = !empty($param['section']) ? $param['section'] : 'general';
					//check for dependency
					$dependency = !empty($param['dependency']) ? true : false;
					if ($dependency === true) {
						$depends_on_field = $param['dependency']['param_name'];
						$depends_on_not_empty = !empty($param['dependency']['not_empty']) ? $param['dependency']['not_empty'] : false;
						if (!empty($param['dependency']['value']) && is_array($param['dependency']['value'])) {
							$depends_on_value = json_encode($param['dependency']['value']);
						} else if (!empty($param['dependency']['value'])) {
							$depends_on_value = $param['dependency']['value'];
						} else {
							$depends_on_value = '';
						}
						$dependency_callback = !empty($param['dependency']['callback']) ? $param['dependency']['callback'] : '';
						$dependency_string = ' data-dependency-param="'. esc_attr($depends_on_field) .'"'. ($depends_on_not_empty === true ? ' data-dependency-not-empty="true"' : '') . (!empty($depends_on_value) ? ' data-dependency-value="'. esc_attr($depends_on_value) .'"' : '') . (!empty($dependency_callback) ? ' data-dependency-callback="'. esc_attr($dependency_callback) .'"' : '');
					}
					$param_output = '<div class="form-group gallery-layout'. ( !empty($param['class']) ? ' '. esc_attr($param['class']) : '' ) .'"'. ( $dependency === true ? $dependency_string : '' ) .'>';
						$param_output .= FusionCore::get_input_field($param, $param_value);
					$param_output .= '</div>';
					$response_array[] = array(
						'section' => $param['section'],
						'output' => $param_output
					);
				}
			}
		}

		header('Content-type: application/json');

		echo json_encode($response_array);

		exit;
	}

	/**
	 * Load Saved Gallery Layout Fields
	 *
	 * @since 1.0.0
	 */

	public function load_saved_gallery_layout_fields($params, $shortcode, $saved_values) {

		global $fsn_gallery_layouts;

		if ($shortcode == 'fsn_gallery' && !empty($saved_values['gallery-layout']) && array_key_exists($saved_values['gallery-layout'], $fsn_gallery_layouts)) {
			$saved_layout = $saved_values['gallery-layout'];
			$params_to_add = !empty($fsn_gallery_layouts[$saved_layout]['params']) ? $fsn_gallery_layouts[$saved_layout]['params'] : '';
			if (!empty($params_to_add)) {
				for ($i=0; $i < count($params_to_add); $i++) {
					if (empty($params_to_add[$i]['class'])) {
						$params_to_add[$i]['class'] = 'gallery-layout';
					} else {
						$params_to_add[$i]['class'] .= ' gallery-layout';
					}
				}
				//add layout params to initial load
				array_splice($params, 1, 0, $params_to_add);
			}
		}

		return $params;
	}

	/**
	 * Initialize Gallery
	 *
	 * @since 1.0.0
	 */

	public function init_gallery() {

		//MAP SHORTCODE
		if (function_exists('fsn_map')) {

			//define gallery layouts
			$gallery_layouts = array();

			//get layouts
			$gallery_layouts = apply_filters('add_gallery_layout', $gallery_layouts);

			//create gallery layouts global
			global $fsn_gallery_layouts;
			$fsn_gallery_layouts = $gallery_layouts;

			//pass layouts array to script
			wp_localize_script('fsn_gallery', 'fsnGallery', $gallery_layouts);

			//get registered post types
			$post_types = get_post_types(array('public' => true));
			unset($post_types['attachment']);
			unset($post_types['component']);
			unset($post_types['template']);
			$post_types = apply_filters('fsn_smart_gallery_posttypes', $post_types);

			$post_type_options = array();
			$post_type_options[''] = __('Choose post type.', 'fusion-extension-gallery');
			$post_type_options['all'] = __('All', 'fusion-extension-gallery');
			foreach($post_types as $post_type) {
				$post_type_object = get_post_type_object($post_type);
				$post_type_options[$post_type] = $post_type_object->labels->name;
			}
			//get registered taxonomies
			$taxonomies = get_taxonomies();
			unset($taxonomies['nav_menu']);
			unset($taxonomies['link_category']);
			unset($taxonomies['post_format']);
			$taxonomies = apply_filters('fsn_smart_gallery_taxonomies', $taxonomies);

			global $fsn_gallery_taxonomy_atts;
			$fsn_gallery_taxonomy_atts = array();
			$taxonomy_params = array();
			foreach($taxonomies as $taxonomy) {
				$fsn_gallery_taxonomy_atts[] = $taxonomy;
				$taxonomy_object = get_taxonomy($taxonomy);
				$taxonomy_terms = get_terms($taxonomy);
				if (!empty($taxonomy_terms)) {
					$taxonomy_term_options = array();
					$taxonomy_term_options[''] = __('Choose term.', 'fusion-extension-gallery');
					foreach($taxonomy_terms as $taxonomy_term) {
						$slug = $taxonomy_term->slug;
						$name = $taxonomy_term->name;
						$taxonomy_term_options[$slug] = $name;
					}
					$taxonomy_params[] = array(
						'type' => 'select',
						'param_name' => $taxonomy,
						'class' => 'taxonomy',
						'hidden_empty' => true,
						'options' => $taxonomy_term_options,
						'label' => __($taxonomy_object->labels->name, 'fusion-extension-gallery'),
						'help' => __('Choose '. $taxonomy_object->labels->name .' to filter gallery by.', 'fusion-extension-gallery'),
							'dependency' => array(
							'param_name' => 'gallery_type',
							'value' => 'smart'
						)
					);
				}
			}
			$fsn_taxonomy_params = $taxonomy_params;

			//get gallery layout options
			if (!empty($gallery_layouts)) {
				$gallery_layout_options = array();
				$smart_supported = array();
				$layout_specific_params = array();
				$gallery_layout_options[''] = __('Choose gallery type.', 'fusion-extension-gallery');
				foreach($gallery_layouts as $key => $value) {
					//create array of layouts for select layout dropdown
					$gallery_layout_options[$key] = $value['name'];
					//create array of layouts that support smart lists
					if (!empty($value['smart']) && $value['smart'] == true) {
						$smart_supported[] = $key;
					}
				}
			}

			//gallery type options
			$gallery_type_options = array(
				'manual' => __('Hand Picked', 'fusion-extension-gallery'),
				'smart' => __('Smart', 'fusion-extension-gallery')
			);
			$gallery_type_options = apply_filters('fsn_gallery_type_options', $gallery_type_options);

			//smart order options
			$smart_order_options = array(
				'recent' => __('Most Recent', 'fusion-extension-gallery'),
				'alpha' => __('Alphabetical', 'fusion-extension-gallery'),
				'menu_order' => __('Page Order', 'fusion-extension-gallery')
			);
			$smart_order_options = apply_filters('fsn_smart_gallery_order_options', $smart_order_options);

			$smart_params = array(
				array(
					'type' => 'select',
					'options' => $gallery_type_options,
					'param_name' => 'gallery_type',
					'label' => __('Content', 'fusion-extension-gallery'),
					'help' => __('Choose how gallery items are chosen. Smart automatically chooses items based on the fields below.', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'gallery_layout',
						'value' => $smart_supported
					)
				),
				array(
					'type' => 'text',
					'param_name' => 'item_count',
					'label' => __('Item Count', 'fusion-extension-gallery'),
					'help' => __('Input the number of gallery items.', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'gallery_type',
						'value' => 'smart'
					)
				),
				array(
					'type' => 'select',
					'param_name' => 'item_order',
					'options' => $smart_order_options,
					'label' => __('Item Order', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'gallery_type',
						'value' => 'smart'
					)
				),
				array(
					'type' => 'select',
					'param_name' => 'post_type',
					'options' => $post_type_options,
					'label' => __('Post Type', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'gallery_type',
						'value' => 'smart'
					)
				)
			);

			$smart_params = apply_filters('fsn_smart_params_array', $smart_params);

			$combined_params = array_merge_recursive($smart_params, $taxonomy_params);

			$params_array = array(
				array(
					'type' => 'select',
					'options' => $gallery_layout_options,
					'param_name' => 'gallery_layout',
					'label' => __('Type', 'fusion-extension-gallery'),
				),
				array(
					'type' => 'gallery',
					'param_name' => 'gallery_items',
					'content_field' => true,
					'label' => __('Gallery Items', 'fusion-extension-gallery'),
					'help' => __('Drag-and-drop blocks to re-order.', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'gallery_layout',
						'not_empty' => true
					)
				)
			);

			//splice in taxonomy options
			array_splice($params_array, 1, 0, $combined_params);

			fsn_map(array(
				'name' => __('Gallery', 'fusion-extension-gallery'),
				'shortcode_tag' => 'fsn_gallery',
				'description' => __('Add gallery. Control the display style of the gallery using the Type dropdown. More options available for each Gallery type under the "Advanced" tab.', 'fusion-extension-gallery'),
				'icon' => 'collections',
				'disable_style_params' => array('text_align','text_align_xs','font_size','color'),
				'params' => $params_array
			));
		}
	}

	/**
	 * Cleanup Gallery
	 *
	 * @since 1.1.5
	 *
	 */

	public function cleanup_gallery() {
		unset($GLOBALS['fsn_gallery_taxonomy_atts']);
	}

	/**
	 * Gallery shortcode
	 *
	 * @since 1.0.0
	 *
	 * @param array $atts The shortcode attributes.
	 * @param string $content The shortcode content.
	 */

	public function gallery_shortcode( $atts, $content ) {
		extract( shortcode_atts( array(
			'gallery_layout' => false,
			'gallery_type' => 'manual'
		), $atts ) );

		/**
		 * Enqueue Scripts
		 */

		//flexslider
		wp_enqueue_script('flexslider');
		//photoswipe
		wp_enqueue_script('photoswipe_core');
		wp_enqueue_script('photoswipe_ui');
		//plugin
		wp_enqueue_script('fsn_gallery');

		$output = '';

		if (!empty($gallery_layout)) {
			$output .= '<div class="fsn-gallery '. fsn_style_params_class($atts) .'">';
				$callback_function = 'fsn_get_'. sanitize_text_field($gallery_layout) .'_gallery';
				//before gallery action hook
				ob_start();
				do_action('fsn_before_gallery', $atts);
				$output .= ob_get_clean();
        //filter gallery content
        $content = apply_filters('fsn_gallery_filter_content', $content, $atts);
				//get gallery
				$output .= call_user_func($callback_function, $atts, $content);
				//after gallery action hook
				ob_start();
				do_action('fsn_after_gallery', $atts);
				$output .= ob_get_clean();
			$output .= '</div>';
		}

		return $output;
	}

	/**
	 * Gallery item shortcode
	 *
	 * @since 1.0.0
	 *
	 * @param array $atts The shortcode attributes.
	 * @param string $content The shortcode content.
	 */

	public function gallery_item_shortcode( $atts, $content ) {
		global $fsn_gallery_layouts;
		$gallery_layouts = $fsn_gallery_layouts;
		$selected_layout = $atts['gallery_layout'];

		//if running AJAX, get action being run
		$ajax_action = false;
		if (defined('DOING_AJAX') && DOING_AJAX) {
			if (!empty($_POST['action'])) {
				$ajax_action = sanitize_text_field($_POST['action']);
			}
		}

		if ( is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX || (!empty($ajax_action) && $ajax_action == 'load_template') || (!empty($ajax_action) && $ajax_action == 'fsn_gallery_modal')) ) {
			$uniqueID = uniqid();
			$output = '';
			$output .= '<div class="gallery-item collapse-active">';
				$output .= '<div class="gallery-item-details">';
					if (!empty($fsn_gallery_layouts[$selected_layout])) {
						foreach($gallery_layouts[$selected_layout]['item_params'] as $param) {
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
							$param['param_name'] = (!empty($param['param_name']) ? $param['param_name'] : '') . '-paramid'. $uniqueID;
							//check for dependency
							$dependency = !empty($param['dependency']) ? true : false;
							if ($dependency === true) {
								$depends_on_field = $param['dependency']['param_name']. '-paramid'. $uniqueID;
								$depends_on_not_empty = !empty($param['dependency']['not_empty']) ? $param['dependency']['not_empty'] : false;
								if (!empty($param['dependency']['value']) && is_array($param['dependency']['value'])) {
									$depends_on_value = json_encode($param['dependency']['value']);
								} else if (!empty($param['dependency']['value'])) {
									$depends_on_value = $param['dependency']['value'];
								} else {
									$depends_on_value = '';
								}
								$dependency_callback = !empty($param['dependency']['callback']) ? $param['dependency']['callback'] : '';
								$dependency_string = ' data-dependency-param="'. esc_attr($depends_on_field) .'"'. ($depends_on_not_empty === true ? ' data-dependency-not-empty="true"' : '') . (!empty($depends_on_value) ? ' data-dependency-value="'. esc_attr($depends_on_value) .'"' : '') . (!empty($dependency_callback) ? ' data-dependency-callback="'. esc_attr($dependency_callback) .'"' : '');
							}
							$output .= '<div class="form-group'. ( !empty($param['class']) ? ' '. esc_attr($param['class']) : '' ) .'"'. ( $dependency === true ? $dependency_string : '' ) .'>';
								$output .= FusionCore::get_input_field($param, $param_value);
							$output .= '</div>';
						}
					}
					$output .= '<a href="#" class="collapse-gallery-item">'. __('expand', 'fusion-extension-gallery') .'</a>';
		    		$output .= '<a href="#" class="remove-gallery-item">'. __('remove', 'fusion-extension-gallery') .'</a>';
	    		$output .= '</div>';
			$output .= '</div>';

		} else {
			$output = '';
			$callback_function = 'fsn_get_'. sanitize_text_field($selected_layout) .'_gallery_item';
			$output .= call_user_func($callback_function, $atts, $content);
		}

		return $output;
	}

	/**
	 * Add gallery item
	 *
	 * @since 1.0.0
	 */

	public function add_gallery_item() {
		//verify nonce
		check_ajax_referer( 'fsn-admin-edit-gallery', 'security' );

		//verify capabilities
		if ( !current_user_can( 'edit_post', intval($_POST['post_id']) ) )
			die( '-1' );

		global $fsn_gallery_layouts;
		$gallery_layout = sanitize_text_field($_POST['gallery_layout']);
		$uniqueID = uniqid();
		echo '<div class="gallery-item">';
			echo '<div class="gallery-item-details">';
				if (!empty($fsn_gallery_layouts) && !empty($gallery_layout)) {
					foreach($fsn_gallery_layouts[$gallery_layout]['item_params'] as $param) {
						$param_value = '';
						$param['param_name'] = (!empty($param['param_name']) ? $param['param_name'] : '') . '-paramid'. $uniqueID;
						$param['nested'] = true;
						//check for dependency
						$dependency = !empty($param['dependency']) ? true : false;
						if ($dependency === true) {
							$depends_on_field = $param['dependency']['param_name']. '-paramid'. $uniqueID;
							$depends_on_not_empty = !empty($param['dependency']['not_empty']) ? $param['dependency']['not_empty'] : false;
							if (!empty($param['dependency']['value']) && is_array($param['dependency']['value'])) {
								$depends_on_value = json_encode($param['dependency']['value']);
							} else if (!empty($param['dependency']['value'])) {
								$depends_on_value = $param['dependency']['value'];
							} else {
								$depends_on_value = '';
							}
							$dependency_callback = !empty($param['dependency']['callback']) ? $param['dependency']['callback'] : '';
							$dependency_string = ' data-dependency-param="'. esc_attr($depends_on_field) .'"'. ($depends_on_not_empty === true ? ' data-dependency-not-empty="true"' : '') . (!empty($depends_on_value) ? ' data-dependency-value="'. esc_attr($depends_on_value) .'"' : '') . (!empty($dependency_callback) ? ' data-dependency-callback="'. esc_attr($dependency_callback) .'"' : '');
						}
						echo '<div class="form-group'. ( !empty($param['class']) ? ' '. esc_attr($param['class']) : '' ) .'"'. ( $dependency === true ? $dependency_string : '' ) .'>';
							echo FusionCore::get_input_field($param, $param_value);
						echo '</div>';
					}
				}
				echo '<a href="#" class="collapse-gallery-item">'. __('collapse', 'fusion-extension-gallery') .'</a>';
	    		echo '<a href="#" class="remove-gallery-item">'. __('remove', 'fusion-extension-gallery') .'</a>';
			echo '</div>';
		echo '</div>';
		exit;
	}

	/**
	 * Remove wpautop processing
	 *
	 * @since 1.0.0
	 */

	public function shortcode_content_unautop($autop_content, $shortcode_tag, $content) {
		if (has_shortcode($content, 'fsn_gallery_item')) {
			return $content;
		} else {
			return $autop_content;
		}
	}

	/**
	 * Clean Gallery Shortcodes
	 *
	 * @since 1.0.0
	 *
	 * @param array $shortcodes_to_clean The array of shortcodes to clean.
	 */

	public function clean_gallery_shortcodes($shortcodes_to_clean) {
		$shortcodes_to_clean[] = 'fsn_gallery_item';
		return $shortcodes_to_clean;
	}

	/**
	 * Masthead layout
	 */

	public function masthead_layout($gallery_layouts) {
		$masthead_layout = array(
			'name' => __('Masthead', 'fusion-extension-gallery'),
			'params' => array(
				array(
					'type' => 'select',
					'options' => array(
						'direction' => __('Arrows', 'fusion-extension-gallery'),
						'paging' => __('Dots', 'fusion-extension-gallery'),
						'both' => __('Dots & Arrows', 'fusion-extension-gallery'),
						'none' => __('None', 'fusion-extension-gallery')
					),
					'param_name' => 'controls',
					'label' => __('Controls', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'enable_fullscreen',
					'label' => __('Full Screen Button', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'enable_slideshow',
					'label' => __('Auto-Scrolling', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'text',
					'param_name' => 'slideshow_speed',
					'label' => __('Slideshow Speed', 'fusion-extension-gallery'),
					'help' => __('Input time between slide switches (in milliseconds). Default is 7000.', 'fusion-extension-gallery'),
					'section' => 'advanced',
					'dependency' => array(
						'param_name' => 'enable_slideshow',
						'not_empty' => true
					)
				),
				array(
					'type' => 'select',
					'options' => array(
						'default' => __('Default', 'fusion-extension-gallery'),
						'percent' => __('Percentage', 'fusion-extension-gallery'),
						'pixels' => __('Fixed', 'fusion-extension-gallery')
					),
					'param_name' => 'width_unit',
					'label' => __('Width', 'fusion-extension-gallery'),
					'help' => __('Choose whether gallery is a percentage of the browser width or a fixed pixel width.', 'fusion-extension-gallery'),
					'section' => 'style'
				),
				array(
					'type' => 'text',
					'param_name' => 'width_percent',
					'label' => __('Percentage', 'fusion-extension-gallery'),
					'help' => __('Input percentage of browser width (e.g. 100).', 'fusion-extension-gallery'),
					'section' => 'style',
					'dependency' => array(
						'param_name' => 'width_unit',
						'value' => 'percent'
					)
				),
				array(
					'type' => 'text',
					'param_name' => 'width_pixels',
					'label' => __('Pixels', 'fusion-extension-gallery'),
					'help' => __('Input pixel width (e.g. 1440).', 'fusion-extension-gallery'),
					'section' => 'style',
					'dependency' => array(
						'param_name' => 'width_unit',
						'value' => 'pixels'
					)
				),
				array(
					'type' => 'select',
					'options' => array(
						'default' => __('Default', 'fusion-extension-gallery'),
						'percent' => __('Percentage', 'fusion-extension-gallery'),
						'pixels' => __('Fixed', 'fusion-extension-gallery')
					),
					'param_name' => 'height_unit',
					'label' => __('Height', 'fusion-extension-gallery'),
					'help' => __('Choose whether gallery is a percentage of the browser height or a fixed pixel height.', 'fusion-extension-gallery'),
					'section' => 'style'
				),
				array(
					'type' => 'text',
					'param_name' => 'height_percent',
					'label' => __('Percentage', 'fusion-extension-gallery'),
					'help' => __('Input percentage of browser height (e.g. 100).', 'fusion-extension-gallery'),
					'section' => 'style',
					'dependency' => array(
						'param_name' => 'height_unit',
						'value' => 'percent'
					)
				),
				array(
					'type' => 'text',
					'param_name' => 'height_pixels',
					'label' => __('Pixels', 'fusion-extension-gallery'),
					'help' => __('Input pixel height (e.g. 600).', 'fusion-extension-gallery'),
					'section' => 'style',
					'dependency' => array(
						'param_name' => 'height_unit',
						'value' => 'pixels'
					)
				),
				array(
					'type' => 'select',
					'options' => array(
						'default' => __('Default', 'fusion-extension-gallery'),
						'percent' => __('Percentage', 'fusion-extension-gallery'),
						'pixels' => __('Fixed', 'fusion-extension-gallery'),
						'flex' => __('Flexible', 'fusion-extension-gallery')
					),
					'param_name' => 'height_unit_xs',
					'label' => __('Mobile Height', 'fusion-extension-gallery'),
					'help' => __('Choose whether gallery is a percentage of the mobile browser height, a fixed pixel height, or flexible based on the content of each slide.', 'fusion-extension-gallery'),
					'section' => 'style'
				),
				array(
					'type' => 'text',
					'param_name' => 'height_percent_xs',
					'label' => __('Percentage', 'fusion-extension-gallery'),
					'help' => __('Input percentage of mobile browser height (e.g. 100).', 'fusion-extension-gallery'),
					'section' => 'style',
					'dependency' => array(
						'param_name' => 'height_unit_xs',
						'value' => 'percent'
					)
				),
				array(
					'type' => 'text',
					'param_name' => 'height_pixels_xs',
					'label' => __('Pixels', 'fusion-extension-gallery'),
					'help' => __('Input pixel height (e.g. 600).', 'fusion-extension-gallery'),
					'section' => 'style',
					'dependency' => array(
						'param_name' => 'height_unit_xs',
						'value' => 'pixels'
					)
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'enable_overlay',
					'label' => __('Overlay', 'fusion-extension-gallery'),
					'section' => 'style'
				),
				array(
					'type' => 'colorpicker',
					'param_name' => 'overlay_color',
					'label' => __('Overlay Color', 'fusion-extension-gallery'),
					'help' => __('Default is "#000000".', 'fusion-extension-gallery'),
					'section' => 'style',
					'dependency' => array(
						'param_name' => 'enable_overlay',
						'not_empty' => true
					)
				),
				array(
					'type' => 'text',
					'param_name' => 'overlay_color_opacity',
					'label' => __('Overlay Color Opacity', 'fusion-extension-gallery'),
					'help' => __('Value between 0 and 1. Default is "0.3".', 'fusion-extension-gallery'),
					'section' => 'style',
					'dependency' => array(
						'param_name' => 'enable_overlay',
						'not_empty' => true
					)
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'enable_kenburns',
					'label' => __('Ken Burns Effect', 'fusion-extension-gallery'),
					'section' => 'animation'
				)
			),
			'item_params' => array(
				array(
					'type' => 'select',
					'options' => array(
						'image' => __('Image', 'fusion-extension-gallery'),
						'video' => __('Video', 'fusion-extension-gallery')
					),
					'param_name' => 'media_type',
					'label' => __('Media Type', 'fusion-extension-gallery')
				),
				array(
					'type' => 'image',
					'param_name' => 'image_id',
					'label' => __('Image', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'media_type',
						'value' => 'image'
					)
				),
				array(
					'type' => 'video',
					'param_name' => 'video_id',
					'label' => __('Video', 'fusion-extension-gallery'),
					'help' => __('MP4 format only.', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'media_type',
						'value' => 'video'
					)
				),
				array(
					'type' => 'image',
					'param_name' => 'video_poster',
					'label' => __('Cover Image', 'fusion-extension-gallery'),
					'help' => __('Cover image should be same size as the video.', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'media_type',
						'value' => 'video'
					)
				),
				array(
					'type' => 'image',
					'param_name' => 'item_logo_id',
					'label' => __('Logo', 'fusion-extension-gallery'),
					'help' => __('High resolution display-ready. Dimensions will be half the size of the uploaded image.', 'fusion-extension-image')
				),
				array(
					'type' => 'text',
					'param_name' => 'item_headline',
					'label' => __('Headline', 'fusion-extension-gallery')
				),
				array(
					'type' => 'text',
					'param_name' => 'item_subheadline',
					'label' => __('Subheadline', 'fusion-extension-gallery')
				),
				array(
					'type' => 'textarea',
					'param_name' => 'item_description',
					'label' => __('Description', 'fusion-extension-gallery')
				),
				array(
					'type' => 'button',
					'param_name' => 'item_button',
					'label' => __('Button', 'fusion-extension-gallery'),
					'help' => __('Link to external or internal content.', 'fusion-extension-gallery')
				)
			)
		);
		$gallery_layouts['masthead'] = $masthead_layout;

		return $gallery_layouts;
	}

	/**
	 * Inline layout
	 */

	public function inline_layout($gallery_layouts) {
		$inline_layout = array(
			'name' => __('Inline', 'fusion-extension-gallery'),
			'params' => array(
				array(
					'type' => 'checkbox',
					'param_name' => 'enable_thumbnails',
					'label' => __('Thumbnails', 'fusion-extension-gallery')
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'enable_fullscreen',
					'label' => __('Full Screen Button', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'enable_slideshow',
					'label' => __('Auto-Scrolling', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'text',
					'param_name' => 'slideshow_speed',
					'label' => __('Slideshow Speed', 'fusion-extension-gallery'),
					'help' => __('Input time between slide switches (in milliseconds). Default is 7000.', 'fusion-extension-gallery'),
					'section' => 'advanced',
					'dependency' => array(
						'param_name' => 'enable_slideshow',
						'not_empty' => true
					)
				)
			),
			'item_params' => array(
				array(
					'type' => 'image',
					'param_name' => 'image_id',
					'label' => __('Image', 'fusion-extension-gallery')
				)
			)
		);
		$gallery_layouts['inline'] = $inline_layout;

		return $gallery_layouts;
	}

	/**
	 * Carousel layout
	 */

	public function carousel_layout($gallery_layouts) {

		$image_sizes_array = fsn_get_image_sizes();

		//get registered post types
		$post_types = get_post_types(array('public' => true));
		unset($post_types['attachment']);
		unset($post_types['component']);
		unset($post_types['template']);

		//carousel layout
		$carousel_layout = array(
			'name' => __('Carousel', 'fusion-extension-gallery'),
			'smart' => true,
			'params' => array(
				array(
					'type' => 'text',
					'param_name' => 'pager',
					'label' => __('Items per Page', 'fusion-extension-gallery'),
					'help' => __('Input number of carousel items for each page. Default is 1.', 'fusion-extension-gallery')
				),
				array(
					'type' => 'select',
					'options' => array(
						'paging' => __('Dots', 'fusion-extension-gallery'),
						'direction' => __('Arrows', 'fusion-extension-gallery'),
						'both' => __('Dots & Arrows', 'fusion-extension-gallery'),
						'none' => __('None', 'fusion-extension-gallery')
					),
					'param_name' => 'controls',
					'label' => __('Controls', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'select',
					'options' => array(
						'paging' => __('Dots', 'fusion-extension-gallery'),
						'direction' => __('Arrows', 'fusion-extension-gallery'),
						'both' => __('Dots & Arrows', 'fusion-extension-gallery'),
						'none' => __('None', 'fusion-extension-gallery')
					),
					'param_name' => 'controls_mobile',
					'label' => __('Mobile Controls', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'enable_slideshow',
					'label' => __('Auto-Scrolling', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'text',
					'param_name' => 'slideshow_speed',
					'label' => __('Slideshow Speed', 'fusion-extension-gallery'),
					'help' => __('Input time between slide switches (in milliseconds). Default is 7000.', 'fusion-extension-gallery'),
					'section' => 'advanced',
					'dependency' => array(
						'param_name' => 'enable_slideshow',
						'not_empty' => true
					)
				),
				array(
					'type' => 'select',
					'options' => $image_sizes_array,
					'param_name' => 'image_size',
					'label' => __('Image Size', 'fusion-extension-gallery'),
					'help' => __('Override the default image size.', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'select',
					'options' => array(
						'' => __('Choose carousel heading size.', 'fusion-extension-gallery'),
						'h1' => __('h1', 'fusion-extension-gallery'),
						'h2' => __('h2', 'fusion-extension-gallery'),
						'h3' => __('h3', 'fusion-extension-gallery'),
						'h4' => __('h4', 'fusion-extension-gallery'),
						'h5' => __('h5', 'fusion-extension-gallery'),
						'h6' => __('h6', 'fusion-extension-gallery')
					),
					'param_name' => 'headline_size',
					'label' => __('Headline Size', 'fusion-extension-gallery'),
					'help' => __('Default is h5.', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'note',
					'help' => __('Image, Headline, Description, and Button will show by default. Customize output below.', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'show_image',
					'label' => __('Show Image', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'show_headline',
					'label' => __('Show Headline', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'show_description',
					'label' => __('Show Description', 'fusion-extension-gallery'),
					'section' => 'advanced'
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'show_button',
					'label' => __('Show Button', 'fusion-extension-gallery'),
					'section' => 'advanced'
				)
			),
			'item_params' => array(
				array(
					'type' => 'radio',
					'options' => array(
						'link' => __('Existing', 'fusion-extension-gallery'),
						'custom' => __('Hand Made', 'fusion-extension-gallery')
					),
					'param_name' => 'item_type',
					'label' => __('Item', 'fusion-extension-gallery'),
					'help' => __('Choose whether to link to existing site content or to add a new hand made item.', 'fusion-extension-gallery')
				),
				array(
					'type' => 'select_post',
					'param_name' => 'item_attached',
					'post_type' => $post_types,
					'label' => __('Attached Content', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'item_type',
						'value' => 'link'
					)
				),
				array(
					'type' => 'image',
					'param_name' => 'image_id',
					'label' => __('Image', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'item_type',
						'value' => 'custom'
					)
				),
				array(
					'type' => 'text',
					'param_name' => 'item_headline',
					'label' => __('Headline', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'item_type',
						'value' => array('link','custom')
					)
				),
				array(
					'type' => 'textarea',
					'param_name' => 'item_description',
					'label' => __('Description', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'item_type',
						'value' => array('link','custom')
					)
				),
				array(
					'type' => 'button',
					'param_name' => 'item_button',
					'label' => __('Button', 'fusion-extension-gallery'),
					'help' => __('Link to external or internal content.', 'fusion-extension-gallery'),
					'dependency' => array(
						'param_name' => 'item_type',
						'value' => 'custom'
					)
				)
			)
		);
		$gallery_layouts['carousel'] = $carousel_layout;

		return $gallery_layouts;
	}

}

$fsn_gallery = new FusionGallery();

/**
 * Add Gallery Lazy Loading
 */

add_action( 'wp_ajax_nopriv_gallery-lazy-load', 'fsn_get_gallery_image' );
add_action( 'wp_ajax_gallery-lazy-load', 'fsn_get_gallery_image' );

function fsn_get_gallery_image() {
    // get the submitted parameters
    $viewport = sanitize_text_field($_POST['viewport']);
    $image_size_desktop = sanitize_text_field($_POST['imageSizeDesktop']);
    $image_size_mobile = sanitize_text_field($_POST['imageSizeMobile']);
    $attachmentID = intval($_POST['attachmentID']);
    $classes = sanitize_text_field($_POST['classes']);
	//load dynamic image
	$load_desktop_size = $viewport == 'desktop' ? true : false;
	$image_element = fsn_get_dynamic_image($attachmentID, $classes, $image_size_desktop, $image_size_mobile, $load_desktop_size);

    echo $image_element;

    exit;
}

/**
 * Gallery Layouts
 */

//MASTHEAD

//add image sizes
if ( function_exists( 'add_image_size' ) ) {
	add_image_size('masthead-desktop', 2560, 1600, true);
	add_image_size('masthead-mobile', 1024, 1024, true);
}

//render gallery wrapper ** function name must follow fsn_get_[gallery layout key]_gallery
function fsn_get_masthead_gallery($atts = false, $content = false) {
	//gallery dimensions
	$gallery_dimensions_defaults = array(
		'galleryWidth' => array(
			'unit' => 'percent',
			'percent' => '100',
			'pixels' => '1440'
		),
		'galleryHeight' => array(
			'unit' => 'percent',
			'percent' => '100',
			'pixels' => '600'
		),
		'galleryMinHeight' => false,
		'galleryHeightMobile' => array(
			'unit' => 'pixels',
			'percent' => '100',
			'pixels' => '375'
		)
	);
	$gallery_dimensions_defaults = apply_filters('fsn_masthead_default_dimensions', $gallery_dimensions_defaults, $atts);

	extract( shortcode_atts( array(
		'width_unit' => 'default',
		'width_percent' => $gallery_dimensions_defaults['galleryWidth']['percent'],
		'width_pixels' => $gallery_dimensions_defaults['galleryWidth']['pixels'],
		'height_unit' => 'default',
		'height_percent' => $gallery_dimensions_defaults['galleryHeight']['percent'],
		'height_pixels' => $gallery_dimensions_defaults['galleryHeight']['pixels'],
		'height_unit_xs' => 'default',
		'height_percent_xs' => $gallery_dimensions_defaults['galleryHeightMobile']['percent'],
		'height_pixels_xs' => $gallery_dimensions_defaults['galleryHeightMobile']['pixels'],
		'enable_kenburns' => false,
		'enable_fullscreen' => false,
		'enable_slideshow' => false,
		'slideshow_speed' => false,
		'enable_overlay' => false,
		'overlay_color' => '#000000',
		'overlay_color_opacity' => '0.3',
	), $atts ) );

	$output = '';

	if (!empty($content)) {
		global $fsn_masthead_item_layout, $fsn_masthead_photoswipe_array, $fsn_masthead_item_counter;
		$gallery_id = uniqid();

		//build classes
		$classes_array = array();

		//filter for adding classes
		$classes_array = apply_filters('fsn_masthead_classes', $classes_array, $atts);
		if (!empty($classes_array)) {
			$classes = implode(' ', $classes_array);
			$combined_classes = $classes;
		}
		//gallery dimensions
		if ($width_unit == 'default') {
			$width_unit = $gallery_dimensions_defaults['galleryWidth']['unit'];
		}
		if ($height_unit == 'default') {
			$height_unit = $gallery_dimensions_defaults['galleryHeight']['unit'];
		}
		if ($height_unit_xs == 'default') {
			$height_unit_xs = $gallery_dimensions_defaults['galleryHeightMobile']['unit'];
		}
		$gallery_dimensions = array(
			'galleryWidth' => array(
				'unit' => $width_unit,
				'percent' => $width_percent,
				'pixels' => $width_pixels
			),
			'galleryHeight' => array(
				'unit' => $height_unit,
				'percent' => $height_percent,
				'pixels' => $height_pixels
			),
			'galleryMinHeight' => $gallery_dimensions_defaults['galleryMinHeight'],
			'galleryHeightMobile' => array(
				'unit' => $height_unit_xs,
				'percent' => $height_percent_xs,
				'pixels' => $height_pixels_xs
			)
		);

		//set dimensions
		FusionMastheadStyles::get_instance()->add_gallery($gallery_id, $gallery_dimensions);

		//gallery overlay
		if (!empty($enable_overlay)) {
			$gallery_overlay = array(
				'color' => $overlay_color,
				'colorOpacity' => $overlay_color_opacity,
			);
		}

		$output .= '<div class="masthead-container'. (!empty($combined_classes) ? ' '. esc_attr($combined_classes) : '') .'">';
			if (!empty($enable_fullscreen)) {
				$fsn_masthead_photoswipe_array = array();
				$fsn_masthead_item_layout = 'photoswipe_item';
				do_shortcode($content);
				ob_start();
				?>
				<script>
					jQuery(document).ready(function() {
						//trigger gallery open
						jQuery('.masthead[data-gallery-id="<?php echo esc_attr($gallery_id); ?>"]').on('click', '.fullscreen-trigger', function() {
							var items = <?php echo json_encode($fsn_masthead_photoswipe_array); ?>;

							var pswpElement = document.querySelectorAll('.pswp')[0];

							//get first slide
							var currentGallery = jQuery(this).closest('.masthead');
							var allImages = currentGallery.find('.slide').not('.video');
							var activeImage = currentGallery.find('.flex-active-slide');
							if (activeImage.hasClass('video')) {
								activeImage = activeImage.prev('.slide');
							}
							var firstSlide = 0;
							firstSlide = allImages.index(activeImage);

							// define options (if needed)
							var options = {
							    index: firstSlide,
							    closeOnScroll: false,
							    showHideOpacity: true
							};

							// Initializes and opens PhotoSwipe
							var gallery<?php echo esc_attr($gallery_id); ?>  = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
							gallery<?php echo esc_attr($gallery_id); ?>.init();
						});
					});
				</script>
				<?php
				$output .= ob_get_clean();
			}
			ob_start();
			do_action('fsn_before_masthead', $atts);
			$output .= ob_get_clean();
			$output .= '<div class="flexslider masthead'. (!empty($enable_kenburns) ? ' kenburns' : '') . ($gallery_dimensions['galleryHeightMobile']['unit'] == 'flex' ? ' mobile-flex' : '') .'" data-gallery-id="'. esc_attr($gallery_id) .'"'. (!empty($enable_slideshow) ? ' data-gallery-auto="true"' : '') . (!empty($slideshow_speed) ? ' data-gallery-speed="'. esc_attr($slideshow_speed) .'"' : '') . (!empty($atts['controls']) ? ' data-controls="'. esc_attr($atts['controls']) .'"' : ' data-controls="direction"') .'>';
				$fsn_masthead_item_layout = 'masthead_placeholder';
				$fsn_masthead_item_counter = 0;
				$output .= do_shortcode($content);

				//set slides content as JS variable
				$deferred_output = '<ul class="slides">';
					$fsn_masthead_item_layout = 'masthead_item';
					$fsn_masthead_item_counter = 0;
					$deferred_output .= do_shortcode($content);
				$deferred_output .= '</ul>';
				ob_start();
				?>
				<script>
					jQuery(document).ready(function() {
						//gallery deferred content
						jQuery('.masthead[data-gallery-id="<?php echo esc_attr($gallery_id); ?>"]').data('galleryContent', <?php echo json_encode(FusionCore::decode_custom_entities($deferred_output)); ?>);
						<?php if (!empty($gallery_dimensions)) : ?>
						//gallery dimensions
						jQuery('.masthead[data-gallery-id="<?php echo esc_attr($gallery_id); ?>"]').data('galleryDimensions', <?php echo json_encode($gallery_dimensions); ?>);
						<?php endif; ?>
						<?php if (!empty($gallery_overlay)) : ?>
						//gallery overlay
						jQuery('.masthead[data-gallery-id="<?php echo esc_attr($gallery_id); ?>"]').data('galleryOverlay', <?php echo json_encode($gallery_overlay); ?>);
						<?php endif; ?>
					});
				</script>
				<?php
				$output .= ob_get_clean();
				//controls
				$output .= '<div class="masthead-controls controls-'. esc_attr($gallery_id) . (!empty($enable_fullscreen) ? ' fullscreen-enabled' : '') .'">'. (!empty($enable_fullscreen) ? '<div class="fullscreen-trigger" data-gallery-length="'. count($fsn_masthead_photoswipe_array) .'" aria-label="'. __('Open Gallery', 'fusion-extension-gallery') .'"><span class="material-icons">&#xE145;</span></div>' : '') . ((!empty($atts['controls']) && ($atts['controls']=='direction' || $atts['controls']=='both')) ? '<ul class="placeholder-controls flex-direction-nav"><li class="flex-nav-prev"><a href="#" class="flex-prev'. ($fsn_masthead_item_counter === 1 ? ' flex-disabled' : '') .'">Previous</a></li><li class="flex-nav-next"><a href="#" class="flex-next'. ($fsn_masthead_item_counter === 1 ? ' flex-disabled' : '') .'">Next</a></li></ul>' : '') .'</div>';
			$output .= '</div>';
			ob_start();
			do_action('fsn_after_masthead', $atts);
			$output .= ob_get_clean();
		$output .= '</div>';
		//unset globals
		unset($GLOBALS['fsn_masthead_photoswipe_array']);
		unset($GLOBALS['fsn_masthead_item_layout']);
		unset($GLOBALS['fsn_masthead_item_counter']);
	}
	return $output;
}

//render gallery item ** function name must follow fsn_get_[gallery layout key]_gallery_item
function fsn_get_masthead_gallery_item($atts = false, $content = false) {
	global $fsn_masthead_item_layout, $fsn_masthead_photoswipe_array, $fsn_masthead_item_counter;
	$detect = new Mobile_Detect();
	$output = '';
	if ($fsn_masthead_item_layout == 'masthead_placeholder') {
		if ($fsn_masthead_item_counter === 0) {
			if (empty($atts['media_type'])) {
				$atts['media_type'] = 'image';
			}
			if (!empty($atts['video_poster'])) {
				$atts['image_id'] = $atts['video_poster'];
			}
			$gallery_item_logo_id = !empty($atts['item_logo_id']) ? $atts['item_logo_id'] : '';
			$gallery_item_headline = !empty($atts['item_headline']) ? $atts['item_headline'] : '';
			$gallery_item_subheadline = !empty($atts['item_subheadline']) ? $atts['item_subheadline'] : '';
			$gallery_item_description = !empty($atts['item_description']) ? $atts['item_description'] : '';
			$gallery_item_button = !empty($atts['item_button']) ? $atts['item_button'] : '';

			if (!empty($gallery_item_button)) {
				$button_object = fsn_get_button_object($gallery_item_button);
			}
			$output .= '<div class="masthead-placeholder-container'. ($atts['media_type'] == 'video' ? ' video' : '') .'">';
				ob_start();
				do_action('fsn_prepend_masthead_item', $atts);
				$output .= ob_get_clean();
				$desktop_init = !$detect->isMobile() || $detect->isTablet() ? true : false;
				$output .= fsn_get_dynamic_image($atts['image_id'], 'masthead-placeholder masthead-image', 'masthead-desktop', 'masthead-mobile', $desktop_init);
				if (!empty($gallery_item_logo_id) || !empty($gallery_item_headline) || !empty($gallery_item_subheadline) || !empty($gallery_item_description) || !empty($gallery_item_button)) {
					$item_show_content = true;
				} else {
					$item_show_content = apply_filters('fsn_masthead_item_show_content', false, $atts);
				}
				if ($item_show_content == true) {
					ob_start();
					do_action('fsn_before_masthead_item_content', $atts);
					$output .= ob_get_clean();
					$output .= '<div class="masthead-item-content">';
						$item_content_output = '';
						if (!empty($gallery_item_logo_id)) {
							//get image
							$attachment_attrs = wp_get_attachment_image_src( $gallery_item_logo_id, 'full' );
							$attachment_alt = get_post_meta($gallery_item_logo_id, '_wp_attachment_image_alt', true);
							$attachment_width = round(intval($attachment_attrs[1])/2, 0, PHP_ROUND_HALF_DOWN);
							$attachment_height = round(intval($attachment_attrs[2])/2, 0, PHP_ROUND_HALF_DOWN);
							$item_content_output .= '<img src="'. esc_url($attachment_attrs[0]) .'" width="'. $attachment_width .'" height="'. $attachment_height .'" alt="'. esc_attr($attachment_alt) .'" class="gallery-item-logo" style="width:'. $attachment_width .'px;height:'. $attachment_height .'px;">';
						}
						$item_content_output .= !empty($gallery_item_headline) ? '<h2 class="gallery-item-headline">' . esc_html($gallery_item_headline) . '</h2>' : '';
						$item_content_output .= !empty($gallery_item_subheadline) ? '<h3 class="gallery-item-subheadline">' . esc_html($gallery_item_subheadline) . '</h3>' : '';
						$item_content_output .= !empty($gallery_item_description) ? '<div class="gallery-item-desc">'. do_shortcode($gallery_item_description) .'</div>' : '';
						if (!empty($button_object)) {
							$button_classes = apply_filters('fsn_masthead_button_class', 'gallery-item-button', $atts);
							$item_content_output .= '<a'.fsn_get_button_anchor_attributes($button_object, $button_classes) .'>'. esc_html($button_object['button_label']) .'</a>';
						}
						$output .= apply_filters('fsn_masthead_item_content_output', $item_content_output, $atts);
					$output .= '</div>';
					ob_start();
					do_action('fsn_after_masthead_item_content', $atts);
					$output .= ob_get_clean();
				}
				ob_start();
				do_action('fsn_append_masthead_item', $atts);
				$output .= ob_get_clean();
			$output .= '</div>';
			$fsn_masthead_item_counter++;
		} else {
			return;
		}
	} else if ($fsn_masthead_item_layout == 'masthead_item') {
		if (empty($atts['media_type']) || ($detect->isMobile() && !$detect->isTablet())) {
			$atts['media_type'] = 'image';
			if ($detect->isMobile() && !empty($atts['video_poster'])) {
				$atts['image_id'] = $atts['video_poster'];
			}
		}
		if ($atts['media_type'] == 'video' && !empty($atts['video_id'])) {
			//VIDEO
			$atts['image_id'] = !empty($atts['video_poster']) ? $atts['video_poster'] : '';
			$attachment = get_post($atts['video_id']);
			$attachment_meta = wp_get_attachment_metadata($atts['video_id']);
			$poster_image_attrs = !empty($atts['video_poster']) ? wp_get_attachment_image_src( $atts['video_poster'], 'masthead-desktop' ) : '';
			if ($attachment_meta['fileformat'] == 'mp4') {
				$mp4_src = wp_get_attachment_url($atts['video_id']);
				$video_id = uniqid();
				$video_element = '<video id="video_'. esc_attr($video_id) .'" class="video-element" preload="auto" width="'. esc_attr($attachment_meta['width']) .'" height="'. esc_attr($attachment_meta['height']) .'"'. (!empty($poster_image_attrs) ? ' poster="'. esc_attr($poster_image_attrs[0]) .'"' : '') .' loop muted>';
					$video_element .= '<source src="'. esc_url($mp4_src) .'" type="video/mp4" />';
				$video_element .= '</video>';
			}
		} elseif ($atts['media_type'] == 'image' && !empty($atts['image_id'])) {
			//IMAGE
			$attachment = get_post($atts['image_id']);
		}

		$gallery_item_logo_id = !empty($atts['item_logo_id']) ? $atts['item_logo_id'] : '';
		$gallery_item_headline = !empty($atts['item_headline']) ? $atts['item_headline'] : '';
		$gallery_item_subheadline = !empty($atts['item_subheadline']) ? $atts['item_subheadline'] : '';
		$gallery_item_description = !empty($atts['item_description']) ? $atts['item_description'] : '';
		$gallery_item_button = !empty($atts['item_button']) ? $atts['item_button'] : '';
		if (!empty($gallery_item_button)) {
			$button_object = fsn_get_button_object($gallery_item_button);
		}
		$output .= '<li class="slide'. ($atts['media_type'] == 'video' ? ' video' : '') .'"'. (!empty($atts['lazy_load']) ? ' data-lazy-load="true" data-image-id="'. (!empty($atts['image_id']) ? esc_attr($atts['image_id']) : '') .'" data-image-size-desktop="masthead-desktop" data-image-size-mobile="masthead-mobile"' : '') .'>';
			ob_start();
			do_action('fsn_prepend_masthead_item', $atts);
			$output .= ob_get_clean();
			if ($atts['media_type'] == 'video') {
				//VIDEO
				$output .= '<div class="masthead-item-video">';
					$output .= $video_element;
				$output .= '</div>';
				$output .= '<div class="masthead-item-image video-fallback">';
					if (!empty($atts['video_poster'])) {
						$output .= fsn_get_dynamic_image($atts['video_poster'], 'masthead-image', 'masthead-desktop', 'masthead-mobile');
					}
				$output .= '</div>';
			} elseif ($atts['media_type'] == 'image') {
				//IMAGE
				$output .= '<div class="masthead-item-image">';
					if (empty($atts['lazy_load'])) {
						$image_element = fsn_get_dynamic_image($atts['image_id'], 'masthead-image', 'masthead-desktop', 'masthead-mobile');
						$output .= apply_filters('fsn_masthead_image_output', $image_element, $attachment);
					} else {
						$output .= '<div class="bubblingG preloader">';
							$output .= '<span id="bubblingG_1"></span>';
							$output .= '<span id="bubblingG_2"></span>';
							$output .= '<span id="bubblingG_3"></span>';
						$output .= '</div>';
					}
				$output .= '</div>';
			}
			if (!empty($gallery_item_logo_id) || !empty($gallery_item_headline) || !empty($gallery_item_subheadline) || !empty($gallery_item_description) || !empty($gallery_item_button)) {
				$item_show_content = true;
			} else {
				$item_show_content = apply_filters('fsn_masthead_item_show_content', false, $atts);
			}
			if ($item_show_content == true) {
				ob_start();
				do_action('fsn_before_masthead_item_content', $atts);
				$output .= ob_get_clean();
				$output .= '<div class="masthead-item-content">';
					$item_content_output = '';
					if (!empty($gallery_item_logo_id)) {
						//get image
						$attachment_attrs = wp_get_attachment_image_src( $gallery_item_logo_id, 'full' );
						$attachment_alt = get_post_meta($gallery_item_logo_id, '_wp_attachment_image_alt', true);
						$attachment_width = round(intval($attachment_attrs[1])/2, 0, PHP_ROUND_HALF_DOWN);
						$attachment_height = round(intval($attachment_attrs[2])/2, 0, PHP_ROUND_HALF_DOWN);
						$item_content_output .= '<img src="'. esc_url($attachment_attrs[0]) .'" width="'. $attachment_width .'" height="'. $attachment_height .'" alt="'. esc_attr($attachment_alt) .'" class="gallery-item-logo" style="width:'. $attachment_width .'px;height:'. $attachment_height .'px;">';
					}
					$item_content_output .= !empty($gallery_item_headline) ? '<h2 class="gallery-item-headline">' . esc_html($gallery_item_headline) . '</h2>' : '';
					$item_content_output .= !empty($gallery_item_subheadline) ? '<h3 class="gallery-item-subheadline">' . esc_html($gallery_item_subheadline) . '</h3>' : '';
					$item_content_output .= !empty($gallery_item_description) ? '<div class="gallery-item-desc">'. do_shortcode($gallery_item_description) .'</div>' : '';
					if (!empty($button_object)) {
						$button_classes = apply_filters('fsn_masthead_button_class', 'gallery-item-button', $atts);
						$item_content_output .= '<a'.fsn_get_button_anchor_attributes($button_object, $button_classes) .'>'. esc_html($button_object['button_label']) .'</a>';
					}
					$output .= apply_filters('fsn_masthead_item_content_output', $item_content_output, $atts);
				$output .= '</div>';
				ob_start();
				do_action('fsn_after_masthead_item_content', $atts);
				$output .= ob_get_clean();
			}
			ob_start();
			do_action('fsn_append_masthead_item', $atts);
			$output .= ob_get_clean();
			$fsn_masthead_item_counter++;
		$output .= '</li>';
	} elseif ($fsn_masthead_item_layout == 'photoswipe_item') {
		if (empty($atts['media_type']) || ($detect->isMobile() && !$detect->isTablet())) {
			$atts['media_type'] = 'image';
			if ($detect->isMobile() && !empty($atts['video_poster'])) {
				$atts['image_id'] = $atts['video_poster'];
			}
		}
		if ($atts['media_type'] == 'image' && !empty($atts['image_id'])) {
			$attachment = get_post($atts['image_id']);
			$attachment_attrs = wp_get_attachment_image_src( $attachment->ID, 'hi-res' );
			if (!empty($attachment_attrs)) {
				$gallery_item_description = apply_filters('fsn_masthead_item_photoswipe_caption', (!empty($atts['item_description']) ? $atts['item_description'] : ''), $atts);
				//decode custom entities to avoid JS errors
				$gallery_item_description = FusionCore::decode_custom_entities($gallery_item_description);
				$fsn_masthead_photoswipe_array[] = array(
					'src' => esc_url($attachment_attrs[0]),
					'w' => esc_attr($attachment_attrs[1]),
					'h' => esc_attr($attachment_attrs[2]),
					'title' => $gallery_item_description
				);
			}
		}
	}
	return $output;
}

//INLINE

//add image sizes
if ( function_exists( 'add_image_size' ) ) {
	add_image_size('inline-mobile', 640, 480);
	add_image_size('inline-desktop', 948, 500);
	add_image_size('inline-thumb-mobile', 172, 113, true);
	add_image_size('inline-thumb-desktop', 172, 113, true);
}

//render gallery wrapper ** function name must follow fsn_get_[gallery layout key]_gallery
function fsn_get_inline_gallery($atts = false, $content = false) {
	extract( shortcode_atts( array(
		'enable_thumbnails' => false,
		'enable_fullscreen' => false,
		'enable_slideshow' => false,
		'slideshow_speed' => false
	), $atts ) );

	$output = '';

	if (!empty($content)) {
		$gallery_id = uniqid();
		global $fsn_inline_switch, $fsn_inline_photoswipe_array, $fsn_inline_item_counter;

		$output .= '<div class="inline-container">';
			$output .= '<div class="flexslider inline" data-gallery-id="'. esc_attr($gallery_id) .'"'. (!empty($enable_slideshow) ? ' data-gallery-auto="true"' : '') . (!empty($slideshow_speed) ? ' data-gallery-speed="'. esc_attr($slideshow_speed) .'"' : '') . (!empty($enable_thumbnails) ? ' data-gallery-thumbs="true"' : '') .'>';
				if (!empty($enable_fullscreen)) {
					$fsn_inline_photoswipe_array = array();
					$fsn_inline_switch = 'photoswipe_item';
					do_shortcode($content);
					ob_start();
					?>
					<script>
						jQuery(document).ready(function() {
							//trigger gallery open
							jQuery('.inline[data-gallery-id="<?php echo esc_attr($gallery_id); ?>"]').on('click', '.fullscreen-trigger', function() {
								var items = <?php echo json_encode($fsn_inline_photoswipe_array); ?>;

								var pswpElement = document.querySelectorAll('.pswp')[0];

								//get first slide
								var currentGallery = jQuery(this).closest('.inline');
								var allImages = currentGallery.find('.slide');
								var activeImage = currentGallery.find('.flex-active-slide');
								var firstSlide = 0;
								firstSlide = allImages.index(activeImage);

								// define options (if needed)
								var options = {
								    index: firstSlide,
								    closeOnScroll: false,
								    showHideOpacity: true
								};

								// Initializes and opens PhotoSwipe
								var gallery<?php echo esc_attr($gallery_id); ?>  = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
								gallery<?php echo esc_attr($gallery_id); ?>.init();
							});
						});
					</script>
					<?php
					$output .= ob_get_clean();
				}
				$fsn_inline_switch = 'placeholder';
				$fsn_inline_item_counter = 0;
				$output .= do_shortcode($content);

				//set slides content as JS variable
				$deferred_output = '<ul class="slides">';
					$fsn_inline_switch = 'main_image';
					$fsn_inline_item_counter = 0;
					$deferred_output .= do_shortcode($content);
				$deferred_output .= '</ul>';
				ob_start();
				?>
				<script>
					jQuery(document).ready(function() {
						jQuery('.inline[data-gallery-id="<?php echo esc_attr($gallery_id); ?>"]').data('galleryContent', <?php echo json_encode(FusionCore::decode_custom_entities($deferred_output)); ?>);
					});
				</script>
				<?php
				$output .= ob_get_clean();
				//controls
				$output .= '<div class="inline-controls controls-'. esc_attr($gallery_id) . (!empty($enable_fullscreen) ? ' fullscreen-enabled' : '') .'">'. (!empty($enable_fullscreen) ? '<div class="fullscreen-trigger" data-gallery-length="'. count($fsn_inline_photoswipe_array) .'" aria-label="'. __('Open Gallery', 'fusion-extension-gallery') .'"><span class="material-icons">&#xE145;</span></div>' : '') .'<ul class="placeholder-controls flex-direction-nav"><li class="flex-nav-prev"><a href="#" class="flex-prev'. ($fsn_inline_item_counter === 1 ? ' flex-disabled' : '') .'">Previous</a></li><li class="flex-nav-next"><a href="#" class="flex-next'. ($fsn_inline_item_counter === 1 ? ' flex-disabled' : '') .'">Next</a></li></ul></div>';
			$output .= '</div>';
			//thumbnails carousel nav
			if (!empty($enable_thumbnails)) {
				$output .= '<div class="inline-nav-container">';
					$output .= '<div class="inline-nav flexslider" data-gallery-id="'. esc_attr($gallery_id) .'">';
						$output .= '<ul class="slides">';
							$fsn_inline_switch = 'thumbnail';
							$output .= do_shortcode($content);
						$output .= '</ul>';
					$output .= '</div>';
				$output .= '</div>';
			}
		$output .= '</div>';
	}
	//unset globals
	unset($GLOBALS['fsn_inline_switch']);
	unset($GLOBALS['fsn_inline_item_counter']);
	unset($GLOBALS['fsn_inline_photoswipe_array']);

	return $output;
}

//render gallery item ** function name must follow fsn_get_[gallery layout key]_gallery_item
function fsn_get_inline_gallery_item($atts = false, $content = false) {
	global $post, $fsn_inline_switch, $fsn_inline_item_counter;
	$detect = new Mobile_Detect();
	if ($fsn_inline_switch == 'photoswipe_item') {
		global $fsn_inline_photoswipe_array;
		$attachment = get_post($atts['image_id']);
		$attachment_attrs = wp_get_attachment_image_src( $attachment->ID, 'hi-res' );
		$gallery_item_description = apply_filters('fsn_inline_item_photoswipe_caption', $attachment->post_excerpt, $atts);
		$fsn_inline_photoswipe_array[] = array(
			'src' => esc_url($attachment_attrs[0]),
			'w' => esc_attr($attachment_attrs[1]),
			'h' => esc_attr($attachment_attrs[2]),
			'title' => $gallery_item_description
		);
	} else if ($fsn_inline_switch == 'placeholder') {
		if ($fsn_inline_item_counter === 0) {
			$output = '';
			$output .= '<div class="inline-placeholder-container">';
				$desktop_init = !$detect->isMobile() || $detect->isTablet() ? true : false;
				$output .= fsn_get_dynamic_image($atts['image_id'], 'inline-image', 'inline-desktop', 'inline-mobile', $desktop_init);
				ob_start();
				do_action('fsn_after_inline_image', $atts);
				$output .= ob_get_clean();
			$output .= '</div>';
			$fsn_inline_item_counter++;
			return $output;
		}
	} else {
		switch($fsn_inline_switch) {
			case 'main_image':
				$image_size = 'inline';
				break;
			case 'thumbnail':
				$image_size = 'inline-thumb';
				$atts['lazy_load'] = false;
				break;
		}
		$output = '';
		$output .= '<li class="slide"'. (!empty($atts['lazy_load']) ? ' data-lazy-load="true" data-image-id="'. esc_attr($atts['image_id']) .'" data-image-size-desktop="'. esc_attr($image_size) .'-desktop" data-image-size-mobile="'. esc_attr($image_size) .'-mobile"' : '') .'>';
			if (empty($atts['lazy_load'])) {
				$output .= fsn_get_dynamic_image($atts['image_id'], 'inline-image', esc_attr($image_size). '-desktop', esc_attr($image_size). '-mobile');
			} else {
				$output .= '<div class="bubblingG preloader">';
					$output .= '<span id="bubblingG_1"></span>';
					$output .= '<span id="bubblingG_2"></span>';
					$output .= '<span id="bubblingG_3"></span>';
				$output .= '</div>';
			}
			if ($fsn_inline_switch == 'main_image') {
				ob_start();
				do_action('fsn_after_inline_image', $atts);
				$output .= ob_get_clean();
			}
		$output .= '</li>';
		$fsn_inline_item_counter++;
		return $output;
	}
}

//CAROUSEL LAYOUT

//add image sizes
if ( function_exists( 'add_image_size' ) ) {
	add_image_size('carousel-mobile', 640, 426, true);
	add_image_size('carousel-desktop', 555, 369, true);
}

//render gallery wrapper ** function name must follow fsn_get_[gallery layout key]_gallery
function fsn_get_carousel_gallery($atts = false, $content = false) {
	global $fsn_carousel_item_layout, $fsn_carousel_view_options;
	$output = '';

	$fsn_carousel_view_options['image'] = !empty($atts['show_image']) ? true : false;
	$fsn_carousel_view_options['headline'] = !empty($atts['show_headline']) ? true : false;
	$fsn_carousel_view_options['image_size'] = !empty($atts['image_size']) ? $atts['image_size'] : 'carousel-desktop';
	$fsn_carousel_view_options['headline_size'] = !empty($atts['headline_size']) ? $atts['headline_size'] : 'h5';
	$fsn_carousel_view_options['description'] = !empty($atts['show_description']) ? true : false;
	$fsn_carousel_view_options['button'] = !empty($atts['show_button']) ? true : false;
	if ( empty($atts['show_image']) && empty($atts['show_headline']) && empty($atts['show_description']) && empty($atts['show_button']) )	{
		$fsn_carousel_view_options['image'] = true;
		$fsn_carousel_view_options['headline'] = true;
		$fsn_carousel_view_options['description'] = true;
		$fsn_carousel_view_options['button'] = true;
	}

	$gallery_id = uniqid();
	$carousel_container_class = apply_filters('fsn_gallery_carousel_container_class', 'carousel-container', $atts);
	$output .= '<div'. (!empty($carousel_container_class) ? ' class="'. esc_attr($carousel_container_class) .'"' : '') .'>';
        $output .= '<div class="carousel-content row">';
			$output .= '<div class="carousel flexslider hidden-xs" data-gallery-id="'. esc_attr($gallery_id) .'" '. (!empty($atts['pager']) ? ' data-pager="'. esc_attr($atts['pager']) .'"' : ' data-pager="1"') .' '. (!empty($atts['controls']) ? ' data-controls="'. esc_attr($atts['controls']) .'"' : ' data-controls="paging"') . (!empty($atts['enable_slideshow']) ? ' data-slideshow="enabled"' : '') . (!empty($atts['slideshow_speed']) ? ' data-gallery-speed="'. esc_attr($atts['slideshow_speed']) .'"' : '') .'>';
				$output .= '<ul class="slides">';
					$fsn_carousel_item_layout = 'desktop';
					if ($atts['gallery_type'] == 'manual') {
						$output .= do_shortcode($content);
					} else if ($atts['gallery_type'] == 'smart') {
						$output .= fsn_get_carousel_smart_gallery_items($atts);
					} else {
						$gallery_items_output = '';
						$output .= apply_filters('fsn_gallery_carousel_custom_output', $gallery_items_output, $atts);
					}
				$output .= '</ul>';
				$output .= '<div class="carousel-controls-container"><div class="carousel-controls controls-'. esc_attr($gallery_id) .'"></div></div>';
			$output .= '</div>';

			//mobile gallery
			$output .= '<div class="carousel-mobile flexslider visible-xs" data-gallery-id="'. esc_attr($gallery_id) .'" '. (!empty($atts['pager']) ? ' data-pager="'. esc_attr($atts['pager']) .'"' : ' data-pager="1"') . (!empty($atts['controls_mobile']) ? ' data-controls="'. esc_attr($atts['controls_mobile']) .'"' : ' data-controls="paging"') . (!empty($atts['enable_slideshow']) ? ' data-slideshow="enabled"' : '') . (!empty($atts['slideshow_speed']) ? ' data-gallery-speed="'. esc_attr($atts['slideshow_speed']) .'"' : '') .'>';
				$output .= '<ul class="slides">';
					$fsn_carousel_item_layout = 'mobile';
					if ($atts['gallery_type'] == 'manual') {
						$output .= do_shortcode($content);
					} else if ($atts['gallery_type'] == 'smart') {
						$output .= fsn_get_carousel_smart_gallery_items($atts);
					} else {
						$gallery_items = '';
						$output .= apply_filters('fsn_gallery_carousel_custom_output', $gallery_items_output, $atts);
					}
				$output .= '</ul>';
			$output .= '</div>';

        $output .= '</div>';
	$output .= '</div>';

	//unset globals
	unset($GLOBALS['fsn_carousel_item_layout']);
	unset($GLOBALS['fsn_carousel_view_options']);

	return $output;
}

//get smart gallery items for carousel layout
function fsn_get_carousel_smart_gallery_items($atts = false) {
	global $post;

	extract( shortcode_atts( array(
		'post_type' => '',
		'item_count' => 12,
		'item_order' => ''
	), $atts ) );

	//narrow down to taxonomies
	global $fsn_gallery_taxonomy_atts;

	$taxonomy_atts = array();
	if (!empty($fsn_gallery_taxonomy_atts)) {
		foreach($atts as $key => $value) {
			if (in_array($key, $fsn_gallery_taxonomy_atts)) {
				$taxonomy_atts[$key] = $value;
			}
		}
	}

	//if not set, use all post type options
	if (empty($post_type) || $post_type == 'all') {
		$post_types = get_post_types(array('public' => true));
		$post_types = apply_filters('fsn_smart_gallery_posttypes', $post_types);
		unset($post_types['attachment']);
		unset($post_types['component']);
		unset($post_types['template']);
		$post_type = $post_types;
	}

	//set query args
	$query_args = array();
	$query_args['posts_per_page'] = intval($item_count);
	$query_args['post_type'] = $post_type;
	//exclude current post
	$query_args['post__not_in'] = array($post->ID);

	//set order
	switch($item_order) {
		case 'recent':
			$query_args['orderby'] = 'date';
			break;
		case 'alpha':
			$query_args['orderby'] = 'title';
			$query_args['order'] = 'ASC';
			break;
		case 'menu_order':
			$query_args['orderby'] = 'menu_order';
			$query_args['order'] = 'ASC';
			break;
	}

	//taxonomy filtering
	if (!empty($taxonomy_atts)) {
		$tax_query_array = array('relation' => 'AND');
		foreach($taxonomy_atts as $key => $value) {
			$query_tax_slug = $key;
			$query_tax_term = get_term_by('slug', $value, $key);
			$query_tax_term_id = $query_tax_term->term_id;
			$tax_query_array[] = array(
				'taxonomy' => $query_tax_slug,
				'field' => 'id',
				'terms' => $query_tax_term_id
			);
		}
		$query_args['tax_query'] = $tax_query_array;
	}

	$query_args = apply_filters('fsn_carousel_smart_query_args', $query_args, $atts);

	//get items
	$items = get_posts($query_args);

	$output = '';

	if (!empty($items)) {
		foreach ($items as $item) {
			$item_atts = array();
			$item_atts['item_headline'] = $item->post_title;
			$item_atts['item_description'] = $item->post_excerpt;
			$item_atts['item_button'] = json_encode((object) array('link' => get_permalink($item->ID), 'label' => 'Learn more', 'attachedID' => $item->ID, 'type' => 'internal'));
			$item_atts['image_id'] = get_post_thumbnail_id($item->ID);
			$item_atts['item_id'] = $item->ID;
			$item_atts = apply_filters('fsn_carousel_smart_item_atts', $item_atts, $item);
			$output .= fsn_get_carousel_gallery_item($item_atts);
		}
	}

	return $output;
}

//render gallery item ** function name must follow fsn_get_[gallery layout key]_gallery_item
function fsn_get_carousel_gallery_item($atts = false, $content = false) {
	global $fsn_carousel_item_layout, $fsn_carousel_view_options;

	//item meta
	//linked piece of content
	if (!empty($atts['item_type']) && !empty($atts['item_attached'])) {
		$atts['item_id'] = $atts['item_attached'];
		$atts['item_button'] = json_encode((object) array('attachedID' => $atts['item_attached'], 'label' => 'Learn more', 'type' => 'internal'));
		$atts['image_id'] = get_post_thumbnail_id($atts['item_attached']);
		if (empty($atts['item_headline'])) {
			$atts['item_headline'] = get_the_title($atts['item_attached']);
		}
		$atts = apply_filters('fsn_carousel_linked_item_atts', $atts);
	}

	if (!empty($atts['image_id'])) {
		$image_output = '';
		//before carousel item attachment action hook
		ob_start();
		do_action('fsn_before_get_carousel_item_attachment');
		$image_output .= ob_get_clean();

		$attachment = get_post($atts['image_id']);
		switch ($fsn_carousel_item_layout) {
			case 'desktop':
				$image_size = !empty($fsn_carousel_view_options['image_size']) ? $fsn_carousel_view_options['image_size'] : 'carousel-desktop';
				break;
			case 'mobile':
				$image_size = 'carousel-mobile';
				break;
		}
		$attachment_attrs = wp_get_attachment_image_src( $attachment->ID, $image_size );
		$attachment_alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);

		$image_output .= '<img src="'. esc_url($attachment_attrs[0]) .'" width="'. esc_attr($attachment_attrs[1]) .'" height="'. esc_attr($attachment_attrs[2]) .'" alt="'. esc_attr($attachment_alt) .'" class="wp-post-image" loading="lazy">';
		//after carousel item attachment action hook
		ob_start();
		do_action('fsn_after_get_carousel_item_attachment');
		$image_output .= ob_get_clean();
	} else {
		$image_output = apply_filters('fsn_carousel_image_fallback', '', !empty($atts['item_id']) ? $atts['item_id'] : '');
	}

	$gallery_item_headline = !empty($atts['item_headline']) ? $atts['item_headline'] : '';
	$gallery_item_description = !empty($atts['item_description']) ? $atts['item_description'] : '';
	$gallery_item_button = !empty($atts['item_button']) ? $atts['item_button'] : '';
	if (!empty($gallery_item_button)) {
		$button_object = fsn_get_button_object($gallery_item_button);
	}
	$output = '';
	$output .= '<li class="slide col-sm-12">';
		$output .= '<div class="carousel-item">';
			//prepend carousel item action hook
			ob_start();
			do_action('fsn_carousel_item_prepend', $atts);
			$output .= ob_get_clean();
			if (!empty($image_output) && $fsn_carousel_view_options['image'] === true) {
				$carousel_item_image_output = !empty($button_object) ? '<a'.fsn_get_button_anchor_attributes($button_object, 'carousel-item-image') .'>' : '<div class="carousel-item-image">';
				$carousel_item_image_output .= $image_output;
				$carousel_item_image_output .= !empty($button_object) ? '</a>' : '</div>';
				$output .= apply_filters('fsn_carousel_item_image_output', $carousel_item_image_output, $atts, $image_output);
			}
			$output .= '<div class="carousel-item-detail">';
				$carousel_item_content_output = '';
				if (!empty($gallery_item_headline) && $fsn_carousel_view_options['headline'] === true) {
					$carousel_item_content_output .= '<'. $fsn_carousel_view_options['headline_size'] .'>'. (!empty($button_object) ? '<a'. fsn_get_button_anchor_attributes($button_object) .'>' : '') . esc_html($gallery_item_headline) . (!empty($button_object) ? '</a>' : '') .'</'. $fsn_carousel_view_options['headline_size'] .'>';
				}
				$carousel_item_content_output .= !empty($gallery_item_description) && $fsn_carousel_view_options['description'] === true ? do_shortcode($gallery_item_description) : '';
				if (!empty($button_object) && $fsn_carousel_view_options['button'] === true) {
					$button_classes = apply_filters('fsn_carousel_button_class', 'carousel-item-button');
					$carousel_item_content_output .= '<a'.fsn_get_button_anchor_attributes($button_object, $button_classes) .'>'. esc_html($button_object['button_label']) .'</a>';
				}
				$output .= apply_filters('fsn_carousel_item_content_output', $carousel_item_content_output, $atts, $fsn_carousel_view_options);
			$output .= '</div>';
			//append carousel item action hook
			ob_start();
			do_action('fsn_carousel_item_append', $atts);
			$output .= ob_get_clean();
		$output .= '</div>';
	$output .= '</li>';

	return $output;
}

?>
