<?php
/*
Plugin Name: Bosa Elementor for WooCommerce
Plugin URI: https://bosathemes.com/bosa-elementor-for-woocommerce
Description: A collection of 30+ Free Elementor Templates specially designed for your Shop or Marketplace. It comes with Free WooCommerce based Elementor Widgets Including Product Grid, Product Categories, Product Carousel, Contact Form 7, Post Grid and many more.
Version:     1.0.16
Author:      Bosa Themes
Author URI:  https://bosathemes.com
License:     GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Domain Path: /languages
Text Domain: bosa-elementor-for-woocommerce
*/

if (!defined('ABSPATH')) exit;

define('BEW_VERSION', '1.0.0');

define('BEW_FILE', __FILE__);
define('BEW_PLUGIN_BASENAME', plugin_basename(BEW_FILE));
define('BEW_PATH', plugin_dir_path(BEW_FILE));
define('BEW_URL', plugins_url('/', BEW_FILE));

if (!defined('ABSPATH'))
    exit;

/**
 * Main Class File of plugin
 * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
 */
if (!class_exists('BEW')) {
    class BEW{
        public $this_uri;
        public $this_dir;

        /**
         * Get Instance
         * 
         * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
         */
        private static $_instance = null;
        public static function instance(){
            if( is_null( self::$_instance ) ){
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        
        /*
         * Constructor
         */
        public function __construct() {

            // This uri & dir
            $this->this_uri = BEW_URL;
            $this->this_dir = BEW_PATH;
            
            if (!did_action('elementor/loaded')) {
                add_action( 'admin_notices', array($this, 'admin_notice__error_ele') );
            }else{
                //elementor hooks 
                add_action( 'elementor/frontend/after_enqueue_scripts', array($this, '_scripts') );
                add_action( 'elementor/elements/categories_registered', array($this, 'elementor_category') );
                add_action( 'elementor/widgets/register', array($this, 'register_widgets') );
                add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
                add_action( 'elementor/editor/after_enqueue_styles', [$this, 'elementor_panel_css'] );

                require_once ( BEW_PATH . 'includes/bew-importer.php' );
            }
            
            if ( !class_exists( 'WooCommerce', false ) ) {
                add_action( 'admin_notices', array($this, 'admin_notice__error_woo') );
            }else{
                add_action( 'admin_action_elementor', [ $this, 'register_wc_hooks' ], 9);
            }

        }

        public function elementor_panel_css() {
            wp_enqueue_style( 'bew-panel', $this->this_uri . 'assets/css/panel.css' );
        }

        /** 
         * WooCommerce Frontend Hooks
         * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.1
         */
        public function register_wc_hooks() {
            wc()->frontend_includes();
        }

        /**
         * To Check Plugin is installed or not
         * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
         */
        function _is_plugin_installed($plugin_path ) {
            $installed_plugins = get_plugins();
            return isset( $installed_plugins[ $plugin_path ] );
        }

        /**
         * 
         * Admin Error Notice
         * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
         */
        function admin_notice__error_ele() {

            if (!current_user_can('activate_plugins')) {
                return;
            }
    
            $elementor = 'elementor/elementor.php';
            if ( $this->_is_plugin_installed( $elementor ) ) {
                $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor);
                
                $message = sprintf( esc_html__('%1$sBosa Elementor Addons and Templates for WooCommerce%2$s requires %1$sElementor%2$s plugin to be active. Please activate Elementor to continue.', 'bosa-elementor-for-woocommerce'), "<strong>", "</strong>");
    
                $button_text = esc_html__('Activate Elementor', 'bosa-elementor-for-woocommerce');
            } else {
                $activation_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');
    
                $message = sprintf( esc_html__('%1$sBosa Elementor Addons and Templates for WooCommerce%2$s requires %1$sElementor%2$s plugin to be installed and activated. Please install Elementor to continue.', 'bosa-elementor-for-woocommerce'), '<strong>', '</strong>');
                $button_text = esc_html__('Install Elementor', 'bosa-elementor-for-woocommerce');
            }
    
            $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    
            printf('<div class="error"><p>%1$s</p>%2$s</div>', $message, $button); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

        }

        /**
         * 
         * Admin Error Notice
         * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
         */
        function admin_notice__error_woo() {

            if (!current_user_can('activate_plugins')) {
                return;
            }

            $elementor = 'woocommerce/woocommerce.php';
            if ( $this->_is_plugin_installed( $elementor ) ) {
                $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor);
                
                $message = sprintf( esc_html__('%1$sBosa Elementor Addons and Templates for WooCommerce%2$s requires %1$sWooCommerce%2$s plugin to be active. Please activate WooCommerce to continue.', 'bosa-elementor-for-woocommerce'), "<strong>", "</strong>");
    
                $button_text = esc_html__('Activate WooCommerce', 'bosa-elementor-for-woocommerce');
            } else {
                $activation_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=woocommerce'), 'install-plugin_woocommerce');
    
                $message = sprintf(esc_html__('%1$sBosa Elementor Addons and Templates for WooCommerce%2$s requires %1$sWooCommerce%2$s plugin to be installed and activated. Please install WooCommerce to continue.', 'bosa-elementor-for-woocommerce'), '<strong>', '</strong>');
                $button_text = esc_html__('Install WooCommerce', 'bosa-elementor-for-woocommerce');
            }
    
            $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    
            printf('<div class="error"><p>%1$s</p>%2$s</div>', $message, $button); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

        }

        /**
         * Load and register the required Elementor widgets file
         *
         * @param $widgets_manager
         *
         * @since Bosa Elementor Addons and Templates for WooCommerce
         */
        function register_widgets( $widgets_manager ) {

            include( $this->this_dir . 'includes/bew-common.php' );

            // Load Elementor Featured Service
            require_once $this->this_dir . 'widgets/bew-elements-products.php';
            require_once $this->this_dir . 'widgets/bew-elements-products-list.php';
            require_once $this->this_dir . 'widgets/bew-elements-categories.php';
            require_once $this->this_dir . 'widgets/bew-elements-carousel-products.php';
            require_once $this->this_dir . 'widgets/bew-elements-blog.php';
            require_once $this->this_dir . 'widgets/bew-elements-contact-form-7.php';
            require_once $this->this_dir . 'widgets/bew-elements-site-logo.php';
            
            // // Register Featured Service Widget
            $widgets_manager->register( new \Elementor\BEW_Products() );
            $widgets_manager->register( new \Elementor\BEW_Products_List() );
            $widgets_manager->register( new \Elementor\BEW_Categories() );
            $widgets_manager->register( new \Elementor\BEW_Carousel_Products() );
            $widgets_manager->register( new \Elementor\BEW_Blog() );
            $widgets_manager->register( new \ELementor\BEW_Contact_Form_7() );
            $widgets_manager->register( new \ELementor\BEW_Site_Logo() );
            
        }

        /**
         * Loads scripts on elementor editor
         * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
         */
        function _scripts() {
            // preview script
            wp_enqueue_script('masonry');
            wp_enqueue_script('bew-elementor-kit-owl', $this->this_uri . 'assets/js/owl.carousel.min.js', array('jquery'));
            wp_enqueue_script('bew-elementor-kit-script', $this->this_uri . 'assets/js/bew-admin-script.js', array( 'jquery' ));
            wp_enqueue_style('bew-elementor-kit-owl-css', $this->this_uri . 'assets/css/owl-carousel-min.css');
            wp_enqueue_style('bew-elementor-kit-owl-default', $this->this_uri . 'assets/css/owl.theme.default.min.css');
            wp_enqueue_style('bew-elementor-kit-style', $this->this_uri . 'assets/style.css' );
        }

        /**
         * Admin Script
         * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
         */
        function admin_scripts() {
            wp_enqueue_script('masonry');
            wp_enqueue_script('bew-elementor-kit-custom', $this->this_uri . 'assets/js/bew.js', array( 'jquery' ));
            wp_localize_script( 'bew-elementor-kit-custom', 'BEW', 
                array( 
                    'ajaxurl'   => admin_url( 'admin-ajax.php' ),
                    'adminurl'  => admin_url(),
                    'plugin_nonce'     => wp_create_nonce( 'bew_ajax_plugin_nonce' ),
                    'import_nonce'     => wp_create_nonce( 'bew_ajax_import_nonce' )
                ) 
            );
            wp_enqueue_style('bew-elementor-kit-admin-style', $this->this_uri . 'assets/css/bew-admin-style.css' );
        }

        /**
         * Elementor Category
         * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
         */
        function elementor_category() {

            // Register widget block category for Elementor section
            \Elementor\Plugin::instance()->elements_manager->add_category( 'bosa-elementor-for-woocommerce', array(
                'title' => esc_html__( 'BEW Elements', 'bosa-elementor-for-woocommerce' ),
            ), 1 );
        }

        function bew_get_page_templates(){
            $page_templates = get_posts( [
                'post_type'         => 'elementor_library',
                'posts_per_page'    => -1
            ] );

            $options = [];

            if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ){
                foreach ( $page_templates as $template ) {
                    $options[ $template->ID ] = $template->post_title;
                }
            }
            return $options;
        }

        function bew_ext_html_tags( $tag ) {
            $allowed_tags = [
                'h1',
                'h2',
                'h3',
                'h4',
                'h5',
                'h6',
                'p',
            ];
            return in_array( strtolower( $tag ), $allowed_tags ) ? $tag : 'h2';
        }
    }
}

add_action('after_setup_theme', function(){
    BEW::instance();
});