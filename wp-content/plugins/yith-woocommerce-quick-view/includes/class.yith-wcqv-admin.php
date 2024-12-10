<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * Admin class
 *
 * @author  YITH <plugins@yithemes.com>
 * @package YITH WooCommerce Quick View
 * @version 1.1.1
 */

defined( 'YITH_WCQV' ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'YITH_WCQV_Admin' ) ) {
	/**
	 * Admin class.
	 * The class manage all the admin behaviors.
	 *
	 * @since 1.0.0
	 */
	class YITH_WCQV_Admin {

		/**
		 * Single instance of the class
		 *
		 * @since 1.0.0
		 * @var YITH_WCQV_Admin
		 */
		protected static $instance;

		/**
		 * Plugin options
		 *
		 * @since  1.0.0
		 * @var array
		 * @access public
		 */
		public $options = array();

		/**
		 * Plugin version
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $version = YITH_WCQV_VERSION;

		/**
		 * Panel Object
		 *
		 * @since 1.0.0
		 * @var object $panel
		 */
		protected $panel;

		/**
		 * Premium tab template file name
		 *
		 * @since 1.0.0
		 * @var string $premium
		 */
		protected $premium = 'premium.php';


		/**
		 * Quick View panel page
		 *
		 * @since 1.0.0
		 * @var string
		 */
		protected $panel_page = 'yith_wcqv_panel';

		/**
		 * Returns single instance of the class
		 *
		 * @since 1.0.0
		 * @return YITH_WCQV_Admin
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * @access public
		 * @since  1.0.0
		 */
		public function __construct() {

			// Add panel options.
			add_action( 'admin_menu', array( $this, 'register_panel' ), 5 );

			// Add action links.
			add_filter( 'plugin_action_links_' . plugin_basename( YITH_WCQV_DIR . '/' . basename( YITH_WCQV_FILE ) ), array( $this, 'action_links' ) );
			add_filter( 'yith_show_plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 5 );
			add_action('admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
			// YITH WCQV Loaded!
			do_action( 'yith_wcqv_loaded' );

		}


		/**
		 * Add the action links to plugin admin page
		 *
		 * @since    1.0
		 * @param array $links An array og plugin links.
		 *
		 * @return   array
		 * @use      plugin_action_links_{$plugin_file_name}
		 */
		public function action_links( $links ) {
			$links = yith_add_action_links( $links, $this->panel_page, false );
			return $links;
		}

		/**
		 * Add a panel under YITH Plugins tab
		 *
		 * @since    1.0
		 * @use      /Yit_Plugin_Panel class
		 * @return   void
		 * @see      plugin-fw/lib/yit-plugin-panel.php
		 */
		public function register_panel() {

			if ( ! empty( $this->panel ) ) {
				return;
			}

			$admin_tabs = apply_filters(
				'yith_wcqv_admin_tabs',
				array(
					'settings' => array(
						'title'       => __( 'General settings', 'yith-woocommerce-quick-view' ),
						'icon'        => 'settings',
						'description' => __( 'Set the general behaviour of the plugin.', 'yith-woocommerce-quick-view' ),
					),
					'style' => array(
						'title'       => __( 'Customization', 'yith-woocommerce-quick-view' ),
						'icon'        => '<svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l1.5 1.5.75-.75V8.758l2.276-.61a3 3 0 10-3.675-3.675l-.61 2.277H12l-.75.75 1.5 1.5M15 11.25l-8.47 8.47c-.34.34-.8.53-1.28.53s-.94.19-1.28.53l-.97.97-.75-.75.97-.97c.34-.34.53-.8.53-1.28s.19-.94.53-1.28L12.75 9M15 11.25L12.75 9"></path></svg>',
						'description' => __( 'Configure style options for the quick view content.', 'yith-woocommerce-quick-view' ),
					),
				)
			);

			$args = array(
				'ui_version'       => 2,
				'create_menu_page' => true,
				'parent_slug'      => '',
				'page_title'       => 'YITH WooCommerce Quick View',
				'menu_title'       => 'Quick View',
				'capability'       => 'manage_options',
				'parent'           => '',
				'parent_page'      => 'yith_plugin_panel',
				'page'             => $this->panel_page,
				'admin-tabs'       => $admin_tabs,
				'options-path'     => YITH_WCQV_DIR . '/plugin-options',
				'class'            => yith_set_wrapper_class(),
				'plugin_slug'      => YITH_WCQV_SLUG,
				'is_free'          => true,
				'premium_tab'      => array(
					'features' => $this->get_premium_features(),
				),
			);

			/* === Fixed: not updated theme  === */
			if ( ! class_exists( 'YIT_Plugin_Panel_WooCommerce' ) ) {
				require_once 'plugin-fw/lib/yit-plugin-panel-wc.php';
			}

			$this->panel = new YIT_Plugin_Panel_WooCommerce( $args );
		}


		/**
		 * Plugin Row Meta
		 *
		 * @since    1.0
		 * @use      plugin_row_meta
		 * @param array    $new_row_meta_args An array of plugin row meta.
		 * @param string[] $plugin_meta       An array of the plugin's metadata,
		 *                                    including the version, author,
		 *                                    author URI, and plugin URI.
		 * @param string   $plugin_file       Path to the plugin file relative to the plugins directory.
		 * @param array    $plugin_data       An array of plugin data.
		 * @param string   $status            Status of the plugin. Defaults are 'All', 'Active',
		 *                                    'Inactive', 'Recently Activated', 'Upgrade', 'Must-Use',
		 *                                    'Drop-ins', 'Search', 'Paused'.
		 *
		 * @return array
		 */
		public function plugin_row_meta( $new_row_meta_args, $plugin_meta, $plugin_file, $plugin_data, $status ) {
			if ( defined( 'YITH_WCQV_INIT' ) && YITH_WCQV_INIT === $plugin_file ) {
				$new_row_meta_args['slug'] = YITH_WCQV_SLUG;

				if ( defined( 'YITH_WCQV_PREMIUM' ) ) {
					$new_row_meta_args['is_premium'] = true;
				}
			}
			return $new_row_meta_args;
		}


		/**
		 * Get premium tab features array
		 *
		 * @since 2.0.0
		 * @return array
		 */
		protected function get_premium_features() {
			return array(

				array(
					'title'       => __( 'Use an icon and show the button when hovering over the product image', 'yith-woocommerce-quick-view' ),
					'description' => esc_html__( 'Choose whether to show the product preview button when hovering over the product image and replace the text with the default icon or a custom icon.', 'yith-woocommerce-quick-view' ),
				),
				array(
					'title'       => __( '2 additional styles for Quick View: sliding panel and on-page preview', 'yith-woocommerce-quick-view' ),
					'description' => esc_html__( 'The premium version includes two additional types of layouts for the product preview: the first opens the product tab directly on the page, in a pop-up section, and the second is a side panel that opens to the right of the browser window.   ', 'yith-woocommerce-quick-view' ),
				),
				array(
					'title'       => __( 'Choose which product information to show in the Quick View', 'yith-woocommerce-quick-view' ),
					'description' => esc_html__( 'We offer you maximum versatility when it comes to the information you want to show in the Quick View. You can choose to show the gallery or a slider with all the product images, the description (short or long, your choice), the rating, the price, the meta (categories, SKUs, etc.), the “Add to cart” button, a link to take the user to the details page (if they want to know more), and much more.', 'yith-woocommerce-quick-view' ),
				),
				array(
					'title'       => __( 'Enable cross-product navigation', 'yith-woocommerce-quick-view' ),
					'description' => esc_html__( 'With cross-product navigation, you can allow your customers to easily and instantly view the tabs of multiple products without having to close the Quick View window.', 'yith-woocommerce-quick-view' ),
				),
				array(
					'title'       => __( 'Allow sharing product previews on social media', 'yith-woocommerce-quick-view' ),
					'description' => esc_html__( 'Allow your customers to easily share product previews with the appropriate social icons. ', 'yith-woocommerce-quick-view' ),
				),
				array(
					'title'       => __( 'Use the shortcode or block to insert a preview of a specific product anywhere in your store', 'yith-woocommerce-quick-view' ),
					'description' => esc_html__( 'The Gutenberg shortcode and block included in the plugin allows you to insert the preview button for a specific product anywhere in your store: the perfect solution if you want to provide a quick overview of the product in a blog article, landing page, header, etc.', 'yith-woocommerce-quick-view' ),
				),

			);
		}

		/**
		 * Enqueue admin scripts
		 *
		 * @param $hook
		 *
		 * @return void
		 */
		public function enqueue_admin_scripts( $hook) {
		//	wp_register_script('yith-wcqv-admin', yit_load_js_file(YITH_WCQV_ASSETS_URL.'/js/admin.js'), array('jquery'), YITH_WCQV_VERSION );
			if ( $hook !== 'yith-plugins_page_yith_wcqv_panel' ) {
				return;
			}
		//	wp_enqueue_script('yith-wcqv-admin');
			wp_enqueue_style( 'yith-wcqv-admin', YITH_WCQV_ASSETS_URL . '/css/yith-quick-view-admin.css', array(), YITH_WCQV_VERSION );
		}
	}
}
/**
 * Unique access to instance of YITH_WCQV_Admin class
 *
 * @since 1.0.0
 * @return YITH_WCQV_Admin
 */
function YITH_WCQV_Admin() { // phpcs:ignore
	return YITH_WCQV_Admin::get_instance();
}
