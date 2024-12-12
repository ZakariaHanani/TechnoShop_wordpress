<?php

/**
 * @package Fusion
 */

/**
 * Button Modal Fusion Extension.
 *
 * Class to add Scripting and AJAX functionality for the Button field type
 *
 * @since 1.0.0
 */

class FusionCoreButtonModal
{

	public function __construct()
	{

		//Button Modal
		add_action('wp_ajax_init-button-modal', array($this, 'button_init_modal'));
	}

	/**
	 * Initialize modal
	 *
	 * @since 1.0.0
	 */

	public function button_init_modal()
	{
		//verify nonce
		check_ajax_referer('fsn-admin-edit', 'security');

		//verify capabilities
		if (!current_user_can('edit_post', intval($_POST['post_id'])))
			die('-1');

		$current_link = !empty($_POST['current_link']) ? esc_url_raw($_POST['current_link']) : '';
		$current_label = !empty($_POST['current_label']) ? stripslashes(wp_filter_post_kses($_POST['current_label'])) : '';
		$current_aria_label = !empty($_POST['current_aria_label']) ? stripslashes(wp_filter_post_kses($_POST['current_aria_label'])) : '';
		$current_attached = !empty($_POST['current_attached']) ? intval($_POST['current_attached']) : '';
		$current_target = !empty($_POST['current_target']) ? wp_filter_post_kses($_POST['current_target']) : '';
		$current_type = !empty($_POST['current_type']) ? wp_filter_post_kses($_POST['current_type']) : '';
		$current_collapse_id = !empty($_POST['current_collapse_id']) ? wp_filter_post_kses($_POST['current_collapse_id']) : '';
		$current_collapse_label_show = !empty($_POST['current_collapse_label_show']) ? stripslashes(wp_filter_post_kses($_POST['current_collapse_label_show'])) : '';
		$current_collapse_label_hide = !empty($_POST['current_collapse_label_hide']) ? stripslashes(wp_filter_post_kses($_POST['current_collapse_label_hide'])) : '';
		$current_component_id = !empty($_POST['current_component_id']) ? intval($_POST['current_component_id']) : '';
?>
		<div class="modal button-modal">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><?php esc_html_e('Button', 'fusion'); ?></h4>
						<a href="#" class="close" data-dismiss="modal" aria-label="<?php esc_html_e('Close', 'fusion'); ?>"><span aria-hidden="true"><i class="material-icons">&#xE5CD;</i></span></a>
					</div>
					<div class="modal-body">
						<form role="form">
							<?php
							//get registered post types
							$post_types = get_post_types(array('public' => true));
							unset($post_types['attachment']);
							unset($post_types['component']);
							unset($post_types['template']);

							//map button parameters
							$params = array(
								array(
									'type' => 'select',
									'options' => array(
										'external' => __('External', 'fusion'),
										'internal' => __('Internal', 'fusion'),
										'collapse' => __('Collapse', 'fusion'),
										'modal' => __('Modal', 'fusion')
									),
									'param_name' => 'button_type',
									'label' => __('Type', 'fusion')
								),
								array(
									'type' => 'text',
									'param_name' => 'button_link',
									'label' => __('Link', 'fusion'),
									'dependency' => array(
										'param_name' => 'button_type',
										'value' => 'external'
									)
								),
								array(
									'type' => 'select_post',
									'param_name' => 'button_attached',
									'label' => __('Link to Content', 'fusion'),
									'post_type' => $post_types,
									'dependency' => array(
										'param_name' => 'button_type',
										'value' => 'internal'
									)
								),
								array(
									'type' => 'components',
									'param_name' => 'button_component_id',
									'label' => __('Choose Component', 'fusion'),
									'help' => __('Choose component to attach and link to, edit this component, or add new component.', 'fusion'),
									'dependency' => array(
										'param_name' => 'button_type',
										'value' => array('modal', 'collapse')
									)
								),
								array(
									'type' => 'text',
									'param_name' => 'button_label',
									'label' => __('Label', 'fusion'),
									'dependency' => array(
										'param_name' => 'button_type',
										'value' => array('external', 'internal', 'modal')
									)
								),
								array(
									'type' => 'text',
									'param_name' => 'button_aria_label',
									'label' => __('ARIA Label', 'fusion')
								),
								array(
									'type' => 'text',
									'param_name' => 'button_collapse_id',
									'label' => __('Collapse ID', 'fusion'),
									'help' => __('Input the ID attribute for the collapsible element if not using an attached Component.', 'fusion'),
									'dependency' => array(
										'param_name' => 'button_type',
										'value' => 'collapse'
									)
								),
								array(
									'type' => 'text',
									'param_name' => 'button_collapse_label_show',
									'label' => __('Show Label', 'fusion'),
									'help' => __('Input button label text for when the collapsible element is hidden (clicking will show).', 'fusion'),
									'dependency' => array(
										'param_name' => 'button_type',
										'value' => 'collapse'
									)
								),
								array(
									'type' => 'text',
									'param_name' => 'button_collapse_label_hide',
									'label' => __('Hide Label', 'fusion'),
									'help' => __('Input button label text for when the collapsible element is shown (clicking will hide).', 'fusion'),
									'dependency' => array(
										'param_name' => 'button_type',
										'value' => 'collapse'
									)
								),
								array(
									'type' => 'select',
									'options' => array(
										'' => __('_self', 'fusion'),
										'_blank' => __('_blank (new tab / window)', 'fusion'),
										'_parent' => __('_parent (parent frame)', 'fusion'),
										'_top' => __('_top (full body of the window)', 'fusion')
									),
									'param_name' => 'button_target',
									'label' => __('Target', 'fusion'),
									'dependency' => array(
										'param_name' => 'button_type',
										'value' => array('external', 'internal')
									)
								)
							);

							if (!empty($params)) {
								foreach ($params as $param) {
									//check for saved values
									switch ($param['param_name']) {
										case 'button_link':
											$param_value = $current_link;
											break;
										case 'button_label':
											$param_value = $current_label;
											break;
										case 'button_aria_label':
											$param_value = $current_aria_label;
											break;
										case 'button_attached':
											$param_value = $current_attached;
											break;
										case 'button_target':
											$param_value = $current_target;
											break;
										case 'button_type':
											$param_value = $current_type;
											break;
										case 'button_collapse_id':
											$param_value = $current_collapse_id;
											break;
										case 'button_collapse_label_show':
											$param_value = $current_collapse_label_show;
											break;
										case 'button_collapse_label_hide':
											$param_value = $current_collapse_label_hide;
											break;
										case 'button_component_id':
											$param_value = $current_component_id;
											break;
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

$fsn_core_button_modal = new FusionCoreButtonModal();

?>