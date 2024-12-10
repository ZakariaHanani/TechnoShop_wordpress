<?php
/**
 * Plugin Name:             Advance Product Search
 * Plugin URI:              https://themehunk.com
 * Description:             Responsive Search Plugin for WordPress and WooCommerce. Best Live Ajax Search Support Plugin. Plugin comes with user friendly settings, You can use shortcode and widget to display search bar at your desired location.This plugin provide you freedom to choose color and styling to match up with your website. It also supports Google search analytics to monitor your website visitor and searching behaviour. <a href="https://themehunk.com/plugins/" target="_blank">Get more plugins for your website on <strong>ThemeHunk</strong></a>
 * Version:                 1.2.7
 * Author:                  ThemeHunk
 * Author URI:              https://themehunk.com
 * Requires at least:       5.0
 * Tested up to:            6.6
 * WC requires at least:    3.2
 * WC tested up to:         7.4
 * Domain Path:             /languages
 * Text Domain:             th-advance-product-search
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_FILE')) {
    define('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_FILE', __FILE__);
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI')) {
    define( 'TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH')) {
    define( 'TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_DIRNAME')) {
    define( 'TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_DIRNAME', dirname( plugin_basename( __FILE__ ) ) );
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_BASENAME')) {
    define( 'TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI')) {
define( 'TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI', trailingslashit( plugin_dir_url( __FILE__ ) . 'images' ) );
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_VERSION')) {
    $plugin_data = get_file_data(__FILE__, array('version' => 'Version'), false);
    define('TH_ADVANCE_PRODUCT_SEARCH_VERSION', $plugin_data['version']);
} 

/**
 *  Declare the woo HPOS compatibility.
*/
function thaps_hpos_compatibility() {

            if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
                \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_FILE, true );
            }
}
add_action('before_woocommerce_init', 'thaps_hpos_compatibility');

if (!class_exists('TH_Advance_Product_Search') && ( ! class_exists( 'Tapsp_Main' ))) {
include_once(TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . 'inc/themehunk-menu/admin-menu.php');
require_once("inc/thaps.php");
require_once("inc/thaps-block.php");
} 

        /**
         * Add the settings link to the plugin row
         *
         * @param array $links - Links for the plugin
         * @return array - Links
         */
        function th_advance_product_search_plugin_action_links($links) {

                      $settings_page = add_query_arg(array('page' => 'th-advance-product-search'), admin_url('admin.php'));

                      $settings_link = '<a href="'.esc_url($settings_page).'">'.__('Settings', 'th-advance-product-search' ).'</a>';

                      array_unshift($links, $settings_link); 

                      return $links;
        }

        add_filter('plugin_action_links_'.TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_BASENAME, 'th_advance_product_search_plugin_action_links', 10, 1);


    /**
   * Add links to plugin's description in plugins table
   *
   * @param array  $links  Initial list of links.
   * @param string $file   Basename of current plugin.
   *
   * @return array
   */
if ( ! function_exists( 'th_advance_product_search_plugin_meta_links' ) ){

  function th_advance_product_search_plugin_meta_links($links, $file){

    if ($file !== plugin_basename(__FILE__)){
      return $links;
    }

    $doc_link = '<a target="_blank" href="https://themehunk.com/docs/th-advance-product-search/" title="' . __('Documentation', 'th-advance-product-search') . '"><span class="dashicons  dashicons-search"></span>' . __('Documentation', 'th-advance-product-search') . '</a>';

    $support_link = '<a target="_blank" href="https://themehunk.com/contact-us/" title="' . __('Support', 'th-advance-product-search') . '"><span class="dashicons  dashicons-admin-users"></span>' . __('Support', 'th-advance-product-search') . '</a>';

    $pro_link = '<a target="_blank" href="https://themehunk.com/advance-product-search/" title="' . __('Premium Version', 'th-advance-product-search') . '"><span class="dashicons  dashicons-cart"></span>' . __('Premium Version', 'th-advance-product-search') . '</a>';

    $links[] = $doc_link;
    $links[] = $support_link;
    $links[] = $pro_link;

    return $links;

  } // plugin_meta_links

}
add_filter('plugin_row_meta', 'th_advance_product_search_plugin_meta_links', 10, 2);



// icon style

function th_advance_product_search_icon_style_svg($classes, $clr){ ?>
<span class="th-icon th-icon-vector-search <?php echo esc_attr($classes); ?>" style="color:<?php echo esc_attr($clr); ?>"></span>
<?php }