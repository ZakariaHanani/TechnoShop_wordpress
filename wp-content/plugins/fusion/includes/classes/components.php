<?php

/**
 * @package Fusion
 */

/**
 * FusionCoreComponents class.
 *
 * Class for adding Components support to Fusion
 *
 * @since 1.0.0
 */

class FusionCoreComponents
{

	public function __construct()
	{

		// Register components post type
		add_action('init', array($this, 'init_components_post_type'));
		add_filter('post_updated_messages', array($this, 'component_updated_messages'));

		//add components field type
		add_filter('fsn_input_types', array($this, 'add_components_field_type'), 10, 3);

		// Initialize AJAX modals
		add_action('wp_ajax_components_modal', array($this, 'render_components_modal'));

		// Save component
		add_action('wp_ajax_update_component', array($this, 'update_component'));

		// Output attached modal components in footer
		add_action('wp_footer', array($this, 'output_attached_modal_components'));
	}

	/**
	 * Init Components Post Type
	 *
	 * @since 1.0.0
	 */

	public function init_components_post_type()
	{
		$labels = array(
			'name'               => _x('Components', 'post type general name', 'fusion'),
			'singular_name'      => _x('Component', 'post type singular name', 'fusion'),
			'menu_name'          => _x('Components', 'admin menu', 'fusion'),
			'name_admin_bar'     => _x('Component', 'add new on admin bar', 'fusion'),
			'add_new'            => _x('Add New', 'component', 'fusion'),
			'add_new_item'       => __('Add New Component', 'fusion'),
			'new_item'           => __('New Component', 'fusion'),
			'edit_item'          => __('Edit Component', 'fusion'),
			'view_item'          => __('View Component', 'fusion'),
			'all_items'          => __('All Components', 'fusion'),
			'search_items'       => __('Search Components', 'fusion'),
			'parent_item_colon'  => __('Parent Components:', 'fusion'),
			'not_found'          => __('No components found.', 'fusion'),
			'not_found_in_trash' => __('No components found in Trash.', 'fusion'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'exclude_from_search' => true,
			'menu_icon'			 => 'dashicons-schedule',
			'query_var'          => true,
			'rewrite'            => false,
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'editor', 'revisions')
		);

		register_post_type('component', $args);
	}

	/**
	 * Filter Component post type messages
	 *
	 * @since 1.0.0
	 */

	public function component_updated_messages($messages)
	{
		global $post, $post_ID;

		$messages['component'] = array(
			0 => '', // Unused. Messages start at index 1.
			1 => sprintf(__('Component updated. <a href="%s">View component</a>', 'fusion'), esc_url(get_permalink($post_ID))),
			2 => __('Custom field updated.', 'fusion'),
			3 => __('Custom field deleted.', 'fusion'),
			4 => __('Component updated.', 'fusion'),
			/* translators: %s: date and time of the revision */
			5 => isset($_GET['revision']) ? sprintf(__('Component restored to revision from %s', 'fusion'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
			6 => sprintf(__('Component published. <a href="%s">View component</a>', 'fusion'), esc_url(get_permalink($post_ID))),
			7 => __('Component saved.', 'fusion'),
			8 => sprintf(__('Component submitted. <a target="_blank" href="%s">Preview component</a>', 'fusion'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
			9 => sprintf(
				__('Component scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview component</a>', 'fusion'),
				// translators: Publish box date format, see http://php.net/date
				date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)),
				esc_url(get_permalink($post_ID))
			),
			10 => sprintf(__('Component draft updated. <a target="_blank" href="%s">Preview component</a>', 'fusion'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
		);

		return $messages;
	}

	/**
	 * Add Components input type
	 *
	 * @since 1.0.0
	 *
	 * @param string $input The HTML for the input field(s)
	 * @param array $param The input parameters
	 * @param string $param_value The saved parameter value
	 * @return string The HTML for the input field(s)
	 */

	public function add_components_field_type($input, $param, $param_value = '')
	{
		if ($param['type'] == 'components') {

			$post_id = intval($_POST['post_id']);

			$input .= '<label for="fsn_' . esc_attr($param['param_name']) . '">' . esc_html($param['label']) . '</label>';
			$input .= !empty($param['help']) ? '<p class="help-block">' . esc_html($param['help']) . '</p>' : '';
			$input .= '<div class="component-select">';
			$input .= '<select data-placeholder="' . esc_html__('Choose a Component.', 'fusion') . '" class="form-control element-input select2-posts-element' . (!empty($param['nested']) ? ' nested' : '') . '" name="' . esc_attr($param['param_name']) . '" style="width:100%;" data-post-type="component" data-hierarchical="true">';
			$input .= '<option></option>';
			if (!empty($param_value)) {
				$input .= '<option value="' . $param_value . '" selected>' . get_the_title($param_value) . '</option>';
			}
			$input .= '</select>';
			$input .= '</div>';
			$input .= '<a href="#" class="button component-add-new">' . esc_html__('Add New', 'fusion') . '</a>';
			$input .= '<a href="#" class="button component-edit">' . esc_html__('Edit Selected', 'fusion') . '</a>';
		}

		return $input;
	}

	/**
	 * Render Components modal.
	 *
	 * @since 1.0.0
	 */

	public function render_components_modal()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!empty($_POST['component_id'])) {
			if (!current_user_can('edit_post', intval($_POST['component_id'])))
				die('-1');
		} else {
			if (!current_user_can('edit_post', intval($_POST['post_id'])))
				die('-1');
		}

		$component_id = intval($_POST['component_id']);
?>
		<div class="modal" id="componentsModal" tabindex="-1" role="dialog" aria-labelledby="fsnModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<span class="components-modal-close" data-dismiss="modal" aria-label="<?php esc_html_e('Close', 'fusion'); ?>">&times;</span>
				<div id="components-modal-inner">
					<h2><?php esc_html_e('Add / Edit Post Component', 'fusion'); ?></h2>
					<form id="edit_component" method="post">
						<?php
						echo '<input type="text" id="component_title" name="component_title" ' . (!empty($component_id) ? 'value="' . esc_attr(get_the_title($component_id)) . '"' : 'value="" placeholder="' . esc_html__('New Component', 'fusion') . '"') . '>';
						echo '<input type="hidden" name="component_id" value="' . (!empty($component_id) ? esc_attr($component_id) : '') . '">';
						echo '<div class="fsn-main-controls">';
						echo '<p class="description">' . esc_html__('Click the "Save" button below to save changes to this Component.', 'fusion') . '</p>';
						echo '<a href="#" class="button fsn-save-template">' . esc_html__('Save Template', 'fusion') . '</a>';
						echo '<a href="#" class="button fsn-load-template" style="margin-left:5px;">' . esc_html__('Load Template', 'fusion') . '</a>';
						//echo '<a href="#" class="button fsn-toggle-previews" style="margin-left:5px;">'. __('Hide Element Previews', 'fusion') .'</a>';
						echo '<div class="fsn-component-controls">';
						echo '<button type="button" class="button"  data-dismiss="modal">' . esc_html__('Cancel', 'fusion') . '</button>';
						echo '<a href="#" class="button button-primary fsn-save-component" style="margin-left:5px;">' . esc_html__('Save', 'fusion') . '</a>';
						echo '<span class="spinner"></span>';
						echo '</div>';
						echo '</div>';
						echo '<div class="fsn-interface-container">';
						//output grid content
						echo '<div class="fsn-interface-grid">';
						if (!empty($component_id)) {
							$component = get_post($component_id);
							if (!empty($component) && $component->post_status == 'publish') {
								echo do_shortcode($component->post_content);
							}
						}
						echo '</div>';
						echo '</div>';
						?>
					</form>
				</div>
			</div>
		</div>
<?php
		exit;
	}

	/**
	 * Update component
	 *
	 * @since 1.0.0
	 */

	public function update_component()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!empty($_POST['component_id'])) {
			if (!current_user_can('edit_post', intval($_POST['component_id'])))
				die('-1');
		} else {
			if (!current_user_can('edit_post', intval($_POST['post_id'])))
				die('-1');
		}

		$post_id = intval($_POST['post_id']);
		$component_id = intval($_POST['component_id']);
		$component_title = sanitize_text_field($_POST['component_title']);
		$component_content = wp_filter_post_kses($_POST['component_content']);

		if (!empty($component_id)) {
			$updated_component_id = wp_update_post(array(
				'ID' => $component_id,
				'post_title' => $component_title,
				'post_content' => $component_content
			));
			if (!empty($updated_component_id)) {
				$notice = esc_html__('Component updated.', 'fusion');
				$notice_class = 'notice-success';
			} else {
				$notice = esc_html__('Error updating component. Please try again.', 'fusion');
				$notice_class = 'notice-error';
			}
		} else {
			$new_component_id = wp_insert_post(array(
				'post_title' => $component_title,
				'post_content' => $component_content,
				'post_type' => 'component',
				'post_status' => 'publish',
				'post_parent' => $post_id
			));
			if (!empty($new_component_id)) {
				$notice = esc_html__('Component created.', 'fusion');
				$notice_class = 'notice-success';
			} else {
				$notice = esc_html__('Error creating component. Please try again.', 'fusion');
				$notice_class = 'notice-error';
			}
		}

		echo '<div class="notice ' . esc_attr($notice_class) . ' is-dismissible"' . (!empty($new_component_id) ? ' data-new-component-id="' . esc_attr($new_component_id) . '"' : '') . '><p>' . esc_html($notice) . ' <a href="#" data-dismiss="modal">' . esc_html__('Done Editing', 'fusion') . '</a></p><button class="notice-dismiss" type="button"><span class="screen-reader-text">' . esc_html__('Dismiss this notice.', 'fusion') . '</span></button></div>';

		exit;
	}

	/**
	 * Output attached modal components
	 *
	 * @since 1.0.0
	 */

	public function output_attached_modal_components()
	{
		//get global attached modals array
		global $fsn_attached_modals;
		if (!empty($fsn_attached_modals)) {
			//remove duplicates
			$attached_modals = array_unique($fsn_attached_modals);
			//output modals
			foreach ($attached_modals as $attached_modal) {
				echo '<div id="modal-component-' . esc_attr($attached_modal) . '" aria-labelledby="modal-component-label-' . esc_attr($attached_modal) . '" class="component modal fade" tabindex="-1" role="dialog">';
				echo '<div class="modal-component-inner container modal-dialog" role="document">';
				echo '<div class="modal-component-controls clearfix">';
				echo '<button type="button" class="close" data-dismiss="modal" aria-label="' . esc_html__('Close', 'fusion') . '"><span class="material-icons md-48">&#xE5CD;</span></button>';
				echo '</div>';
				echo '<span class="sr-only" id="modal-component-label-' . esc_attr($attached_modal) . '">' . esc_attr(get_the_title($attached_modal)) . '</span>';
				echo do_shortcode('[fsn_component component_id="' . esc_attr($attached_modal) . '"]');
				echo '</div>';
				echo '</div>';
			}
		}
		//unset global
		unset($GLOBALS['fsn_attached_modals']);
	}
}

$fsn_core_components = new FusionCoreComponents();

?>