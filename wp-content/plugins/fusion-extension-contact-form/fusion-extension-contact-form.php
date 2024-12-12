<?php
/**
 * @package Fusion_Extension_Contact_Form
 */
/**
 * Plugin Name: Fusion : Extension - Contact Form
 * Plugin URI: http://www.agencydominion.com/fusion/
 * Description: Contact Form Extension Package for Fusion.
 * Version: 1.1.4
 * Author: Agency Dominion
 * Author URI: http://agencydominion.com
 * Text Domain: fusion-extension-contact-form
 * Domain Path: /languages/
 * License: GPL2
 */
 
/**
 * FusionExtensionContactForm class.
 *
 * Class for initializing an instance of the Fusion Contact Form Extension.
 *
 * @since 1.0.0
 */


class FusionExtensionContactForm	{ 
	public function __construct() {
						
		// Initialize the language files
		add_action('plugins_loaded', array($this, 'load_textdomain'));
		
	}
	
	/**
	 * Load Textdomain
	 *
	 * @since 1.1.4
	 *
	 */
	 
	public function load_textdomain() {
		load_plugin_textdomain( 'fusion-extension-contact-form', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
}

$fsn_extension_contact_form = new FusionExtensionContactForm();

//EXTENSIONS

//contact form
require_once('includes/extensions/contact-form.php');

?>