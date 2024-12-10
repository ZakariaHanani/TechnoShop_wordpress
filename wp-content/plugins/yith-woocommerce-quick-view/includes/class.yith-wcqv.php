<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * Main class
 *
 * @author  YITH <plugins@yithemes.com>
 * @package YITH WooCommerce Quick View
 * @version 1.0.0
 */

defined( 'YITH_WCQV' ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'YITH_WCQV' ) ) {
	/**
	 * YITH WooCommerce Quick View
	 *
	 * @since 1.0.0
	 */
	class YITH_WCQV {

		/**
		 * Single instance of the class
		 *
		 * @since 1.0.0
		 * @var YITH_WCQV
		 */
		protected static $instance;

		/**
		 * Plugin version
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $version = YITH_WCQV_VERSION;

		/**
		 * Plugin object
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $obj = null;

		/**
		 * Returns single instance of the class
		 *
		 * @since 1.0.0
		 * @return YITH_WCQV
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
		 * @since 1.0.0
		 * @return void
		 */
		public function __construct() {

			// Load Plugin Framework.
			add_action( 'after_setup_theme', array( $this, 'plugin_fw_loader' ), 1 );

			if ( $this->can_load() ) {
				if ( $this->is_admin() ) {
					require_once 'class.yith-wcqv-admin.php';
					YITH_WCQV_Admin();
				}
				if ( $this->load_frontend() ) {
					require_once 'class.yith-wcqv-frontend.php';
					YITH_WCQV_Frontend();
				}
			}

			add_action( 'init', array( $this, 'add_image_size' ) );
		}

		/**
		 * Check if the plugin can load. Exit if is WooCommerce AJAX.
		 *
		 * @since  1.5
		 * @return boolean
		 */
		public function can_load() {
			$action = array(
				'woocommerce_get_refreshed_fragments',
				'woocommerce_apply_coupon',
				'woocommerce_remove_coupon',
				'woocommerce_update_shipping_method',
				'woocommerce_update_order_review',
				'woocommerce_add_to_cart',
				'woocommerce_checkout',
			);

			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $_REQUEST['action'] ) && in_array( $_REQUEST['action'], $action, true ) ) {
				return false;
			}

			return true;
		}

		/**
		 * Check if context is admin
		 *
		 * @since  1.2.0
		 * @return boolean
		 */
		public function is_admin() {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$is_ajax = ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $_REQUEST['context'] ) && 'frontend' === $_REQUEST['context'] );
			return apply_filters( 'yith_wcqv_is_admin', is_admin() && ! $is_ajax );
		}

		/**
		 * Check if load or not frontend
		 *
		 * @since  1.2.0
		 * @return boolean
		 */
		public function load_frontend() {
			$enable_on_mobile = get_option( 'yith-wcqv-enable-mobile', 'yes' ) === 'yes';
			return apply_filters( 'yith_wcqv_load_frontend', ! wp_is_mobile() || $enable_on_mobile );
		}


		/**
		 * Load Plugin Framework
		 *
		 * @since  1.0
		 * @access public
		 * @return void
		 */
		public function plugin_fw_loader() {
			if ( ! defined( 'YIT_CORE_PLUGIN' ) ) {
				global $plugin_fw_data;
				if ( ! empty( $plugin_fw_data ) ) {
					$plugin_fw_file = array_shift( $plugin_fw_data );
					require_once $plugin_fw_file;
				}
			}
		}


		/**
		 * Add image size
		 *
		 * @since  2.0.0
		 * @return void
		 */
		public function add_image_size() {
			// Set image size.
			$dimensions = get_option('yith-quick-view-product-image-dimensions', array('dimensions' => array( 'width' => 450, 'height' => 600, ), 'unit' => 'px', 'linked' => 'no',));
			$width = $dimensions['dimensions']['width'] ?? 450;
			$height = $dimensions['dimensions']['height'] ?? 600;

			add_image_size( 'quick_view_image_size', $width, $height, true );
		}
	}
}

/**
 * Unique access to instance of YITH_WCQV class
 *
 * @since 1.0.0
 * @return YITH_WCQV
 */
function YITH_WCQV() { // phpcs:ignore
	return YITH_WCQV::get_instance();
}
