<?php

/**
 * @package Fusion
 */

/**
 * FusionCoreSettings class.
 *
 * Class for initializing the Fusion Settings page
 *
 * @since 1.0.0
 */

class FusionCoreSettings
{
	public function __construct()
	{

		//add settings page
		add_action('admin_menu', array($this, 'init_settings_page'));

		//register settings
		add_action('admin_init', array($this, 'register_settings'));
	}

	public function init_settings_page()
	{
		$plugin_settings = add_options_page(__('Fusion Settings', 'fusion'), __('Fusion', 'fusion'), 'manage_options', 'fsn_settings', array($this, 'output_settings_page'));
	}

	public function output_settings_page()
	{
?>
		<div class="wrap">
			<?php screen_icon(); ?>
			<h2><?php esc_html_e('Fusion Settings', 'fusion'); ?></h2>
			<?php //settings_errors(); 
			?>
			<form action="options.php" method="post">
				<?php settings_fields('fsn_options'); ?>
				<?php do_settings_sections('fsn_settings'); ?>
				<?php submit_button(__('Save Changes', 'fusion'), 'primary'); ?>
			</form>
		</div>
<?php
	}

	public function register_settings()
	{
		//setting
		register_setting(
			'fsn_options',
			'fsn_options'
		);
		//sections	
		add_settings_section(
			'fsn_general_settings',
			__('General Settings', 'fusion'),
			array($this, 'fsn_output_general_settings'),
			'fsn_settings'
		);
		//fields
		add_settings_field(
			'fsn_post_types',
			__('Post Types', 'fusion'),
			array($this, 'fsn_post_types'),
			'fsn_settings',
			'fsn_general_settings'
		);
		add_settings_field(
			'fsn_bootstrap_enable',
			__('Enable Bootstrap', 'fusion'),
			array($this, 'fsn_bootstrap_enable_toggle'),
			'fsn_settings',
			'fsn_general_settings'
		);
		add_settings_field(
			'fsn_bootstrap_fluid',
			__('Use Fluid Grid', 'fusion'),
			array($this, 'fsn_bootstrap_fluid_toggle'),
			'fsn_settings',
			'fsn_general_settings'
		);
	}

	public function fsn_output_general_settings()
	{
		echo '<p>' . esc_html__('Setup the Fusion plugin with your theme.', 'fusion') . '</p>';
	}

	public function fsn_post_types()
	{
		// get option value from the database
		$options = get_option('fsn_options');
		$fsn_post_types = !empty($options['fsn_post_types']) ? $options['fsn_post_types'] : array();
		$post_types = get_post_types(array('public' => true));
		unset($post_types['attachment']);
		// echo the fields
		foreach ($post_types as $post_type) {
			$post_type_object = get_post_type_object($post_type);
			echo '<input name="fsn_options[fsn_post_types][]" type="checkbox" value="' . esc_attr($post_type) . '"' . (in_array($post_type, $fsn_post_types) ? ' checked="checked"' : '') . '>' . esc_html($post_type_object->labels->name) . '<br>';
		}
		echo '<p class="description">' . esc_html__('Choose the post types on which Fusion will be available.', 'fusion') . '</p>';
	}

	public function fsn_bootstrap_enable_toggle()
	{
		// get option value from the database
		$options = get_option('fsn_options');
		$fsn_bootstrap_enable = !empty($options['fsn_bootstrap_enable']) ? $options['fsn_bootstrap_enable'] : '';
		// echo the field
		echo '<input id="fsn_bootstrap_enable" name="fsn_options[fsn_bootstrap_enable]" type="checkbox" ' . checked($fsn_bootstrap_enable, 'on', false) . '>';
		echo '<p class="description">' . esc_html__('Check this option if not using the Fusion Theme or if the active theme does not include Bootstrap.', 'fusion') . '</p>';
	}

	public function fsn_bootstrap_fluid_toggle()
	{
		// get option value from the database
		$options = get_option('fsn_options');
		$fsn_bootstrap_fluid = !empty($options['fsn_bootstrap_fluid']) ? $options['fsn_bootstrap_fluid'] : '';
		// echo the field
		echo '<input id="fsn_bootstrap_fluid" name="fsn_options[fsn_bootstrap_fluid]" type="checkbox" ' . checked($fsn_bootstrap_fluid, 'on', false) . '>';
		echo '<p class="description">' . esc_html__('Check this option to fit the grid into the active theme\'s content container (will be required for most themes).', 'fusion') . '</p>';
	}
}

$fsn_core_settings = new FusionCoreSettings();

?>