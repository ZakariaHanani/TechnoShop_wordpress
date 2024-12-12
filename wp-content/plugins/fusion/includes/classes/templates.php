<?php

/**
 * @package Fusion
 */

/**
 * FusionCoreTemplate class.
 *
 * Class for saving Fusion content into reusable templates.
 *
 * @since 1.0.0
 */

class FusionCoreTemplate
{

	public function __construct()
	{

		// Register templatess post type
		add_action('init', array($this, 'init_templates_post_type'));
		add_filter('post_updated_messages', array($this, 'template_updated_messages'));

		//initialize AJAX modals
		add_action('wp_ajax_save_template_modal', array($this, 'render_save_template_modal'));
		add_action('wp_ajax_save_template', array($this, 'save_template'));
		add_action('wp_ajax_load_template_modal', array($this, 'render_load_template_modal'));
		add_action('wp_ajax_load_template', array($this, 'load_template'));
		add_action('wp_ajax_delete_template', array($this, 'delete_template'));
	}

	/**
	 * Init Templates Post Type
	 *
	 * @since 1.0.0
	 */

	public function init_templates_post_type()
	{
		$labels = array(
			'name'               => _x('Templates', 'post type general name', 'fusion'),
			'singular_name'      => _x('Template', 'post type singular name', 'fusion'),
			'menu_name'          => _x('Templates', 'admin menu', 'fusion'),
			'name_admin_bar'     => _x('Template', 'add new on admin bar', 'fusion'),
			'add_new'            => _x('Add New', 'template', 'fusion'),
			'add_new_item'       => __('Add New Template', 'fusion'),
			'new_item'           => __('New Temaplte', 'fusion'),
			'edit_item'          => __('Edit Template', 'fusion'),
			'view_item'          => __('View Template', 'fusion'),
			'all_items'          => __('All Templates', 'fusion'),
			'search_items'       => __('Search Templates', 'fusion'),
			'parent_item_colon'  => __('Parent Templates:', 'fusion'),
			'not_found'          => __('No templates found.', 'fusion'),
			'not_found_in_trash' => __('No templates found in Trash.', 'fusion'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'exclude_from_search' => true,
			'menu_icon'			 => 'dashicons-edit',
			'query_var'          => true,
			'rewrite'            => false,
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'editor', 'revisions')
		);

		register_post_type('template', $args);
	}

	/**
	 * Filter Template post type messages
	 *
	 * @since 1.0.0
	 */

	public function template_updated_messages($messages)
	{
		global $post, $post_ID;

		$messages['template'] = array(
			0 => '', // Unused. Messages start at index 1.
			1 => sprintf(__('Template updated. <a href="%s">View template</a>', 'fusion'), esc_url(get_permalink($post_ID))),
			2 => __('Custom field updated.', 'fusion'),
			3 => __('Custom field deleted.', 'fusion'),
			4 => __('Template updated.', 'fusion'),
			/* translators: %s: date and time of the revision */
			5 => isset($_GET['revision']) ? sprintf(__('Template restored to revision from %s', 'fusion'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
			6 => sprintf(__('Template published. <a href="%s">View template</a>', 'fusion'), esc_url(get_permalink($post_ID))),
			7 => __('Template saved.', 'fusion'),
			8 => sprintf(__('Template submitted. <a target="_blank" href="%s">Preview template</a>', 'fusion'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
			9 => sprintf(
				__('Template scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview template</a>', 'fusion'),
				// translators: Publish box date format, see http://php.net/date
				date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)),
				esc_url(get_permalink($post_ID))
			),
			10 => sprintf(__('Template draft updated. <a target="_blank" href="%s">Preview template</a>', 'fusion'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
		);

		return $messages;
	}

	/**
	 * Render save template modal.
	 *
	 * @since 1.0.0
	 */

	public function render_save_template_modal()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!current_user_can('edit_post', intval($_POST['post_id'])))
			die('-1');
?>
		<div class="modal" id="save_template_modal" tabindex="-1" role="dialog" aria-labelledby="fsnModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="fsnModalLabel"><?php esc_html_e('Save Template', 'fusion'); ?></h4>
						<a href="#" class="close" data-dismiss="modal" aria-label="<?php esc_html_e('Close', 'fusion'); ?>"><span aria-hidden="true"><i class="material-icons">&#xE5CD;</i></span></a>
					</div>
					<div class="modal-body">
						<form role="form">
							<?php
							echo '<div class="form-group">';
							$param = array(
								'type' => 'text',
								'param_name' => 'template_name',
								'label' => __('Template Name', 'fusion')
							);
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							echo FusionCore::get_input_field($param);
							echo '<a href="#" class="button button-primary save-template">' . esc_html__('Add', 'fusion') . '</a>';
							echo '</div>';
							?>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="button" data-dismiss="modal"><?php esc_html_e('Close', 'fusion'); ?></button>
					</div>
				</div>
			</div>
		</div>
	<?php
		exit;
	}

	/**
	 * Save template.
	 *
	 * @since 1.0.0
	 */

	public function save_template()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!current_user_can('edit_post', intval($_POST['post_id'])))
			die('-1');

		$template_name = sanitize_text_field($_POST['template_name']);
		$template_data = wp_filter_post_kses($_POST['template_data']);
		if (!empty($template_name) && !empty($template_data)) {
			$new_template_vars = array(
				'post_title' => $template_name,
				'post_type' => 'template',
				'post_status' => 'publish',
				'post_content' => fsn_shortcode_cleaner($template_data)
			);

			$new_template = wp_insert_post($new_template_vars);
		}

		header('Content-type: application/json');

		if (!empty($new_template)) {
			$response_array['status'] = 'success';
		} else {
			$response_array['status'] = 'error';
		}

		echo json_encode($response_array);

		exit;
	}

	/**
	 * Render load template modal.
	 *
	 * @since 1.0.0
	 */

	public function render_load_template_modal()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!current_user_can('edit_post', intval($_POST['post_id'])))
			die('-1');
	?>
		<div class="modal" id="load_template_modal" tabindex="-1" role="dialog" aria-labelledby="fsnModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="fsnModalLabel"><?php esc_html_e('Page Templates', 'fusion'); ?></h4>
						<a href="#" class="close" data-dismiss="modal" aria-label="<?php esc_html_e('Close', 'fusion'); ?>"><span aria-hidden="true"><i class="material-icons">&#xE5CD;</i></span></a>
					</div>
					<div class="modal-body">
						<?php
						$saved_templates = new WP_Query(array(
							'post_type' => 'template',
							'post_status' => 'publish',
							'posts_per_page' => 20,
							'orderby' => 'title',
							'order' => 'ASC',
							'fields' => 'ids'
						));
						if (!empty($saved_templates->posts)) {
							echo '<div class="template-items">';
							foreach ($saved_templates->posts as $template) {
								echo '<div class="template-item" data-template-id="' . esc_attr($template) . '">';
								echo '<span class="template-name">' . esc_html(get_the_title($template)) . '</span>';
								echo '<span class="template-controls-toggle" title="' . esc_html__('Template Options', 'fusion') . '"><i class="material-icons">&#xE5D3;</i></span>';
								echo '<div class="template-controls-dropdown collapsed">';
								echo '<a href="#" class="delete-template">' . esc_html__('Delete', 'fusion') . '</a>';
								echo '</div>';
								echo '</div>';
							}
							echo '</div>';
						} else {
							echo '<p>' . esc_html__('There are no saved templates yet.', 'fusion') . '</p>';
						}
						$total_templates = $saved_templates->found_posts;
						if ($total_templates > 20) {
							echo '<a href="#" class="button fsn-load-more-templates" data-total="' . esc_attr($total_templates) . '">' . esc_html__('Load More', 'fusion') . '</a>';
						}
						?>
					</div>
					<div class="modal-footer">
						<button type="button" class="button" data-dismiss="modal"><?php esc_html_e('Close', 'fusion'); ?></button>
					</div>
				</div>
			</div>
		</div>
<?php
		exit;
	}

	/**
	 * Load template.
	 *
	 * @since 1.0.0
	 */

	public function load_template()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!current_user_can('edit_post', intval($_POST['post_id'])))
			die('-1');

		$template_id = intval($_POST['template_id']);
		$template = get_post($template_id);

		if (!empty($template) && $template->post_status == 'publish') {
			echo do_shortcode($template->post_content);
		}

		exit;
	}

	/**
	 * Delete template.
	 *
	 * @since 1.0.0
	 */

	public function delete_template()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!current_user_can('edit_post', intval($_POST['post_id'])))
			die('-1');

		$template_id = intval($_POST['template_id']);

		header('Content-type: application/json');

		$deleted_template = wp_trash_post($template_id);

		if (!empty($deleted_template)) {
			$response_array['status'] = 'success';
		} else {
			$response_array['status'] = 'error';
		}

		echo json_encode($response_array);

		exit;
	}
}

$fsn_core_template = new FusionCoreTemplate();

?>