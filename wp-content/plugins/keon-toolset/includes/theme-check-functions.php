<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if( ( keon_toolset_theme_check( 'bosa' ) && !keon_toolset_theme_check( 'bosa-pro' ) ) || ( keon_toolset_theme_check( 'gutener' ) && !keon_toolset_theme_check( 'gutener-pro' ) ) ){
    require KEON_TOOLSET_PATH . 'includes/upsell.php';
    // Add customizer upsell section.
    add_action( 'customize_register', 'upsell_customize_register', 99 );
} 

if( keon_toolset_theme_check( 'bosa' ) && !keon_toolset_theme_check( 'bosa-pro' ) ){
    // Add bosa upell admin notice.
    add_action( 'admin_notices', 'bosa_upsell_admin_notice' );
}

if( keon_toolset_theme_check( 'gutener' ) && !keon_toolset_theme_check( 'gutener-pro' ) ){
    // Add gutener upell admin notice.
    add_action( 'admin_notices', 'gutener_upsell_admin_notice' );
}

if( !keon_toolset_theme_check( 'bosa' ) && !keon_toolset_theme_check( 'gutener' ) ){
    // Add bosa store admin notice.
    add_action( 'admin_notices', 'keon_store_admin_notice' );
}

/**
 * Check active theme textdomain against passed string.
 *
 * @since    1.3.6
 * 
 * @param $needle Theme name substring.
 * @return bool
 */
function keon_toolset_theme_check( $needle ){
    if( strpos( keon_toolset_get_theme_slug(), $needle ) !== false  ){
        return true;
    }else{
        return false;
    }
}

/**
 * WooCommerce categories search form.
 */
function header_wooCom_cat_search(){ ?>
    <form class="header-search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="hidden" name="post_type" value="product" />
        <input class="header-search-input" name="s" type="text" placeholder="<?php esc_attr_e('Search products...', 'keon-toolset'); ?>"/>
        <div class="d-inline-block"> 
            <select class="header-search-select" name="product_cat">
                <option value=""><?php esc_html_e('All Categories', 'keon-toolset'); ?></option> 
                <?php
                $categories = get_categories('taxonomy=product_cat');
                foreach ($categories as $category) {
                    $option = '<option value="' . esc_attr($category->category_nicename) . '">';
                    $option .= esc_html($category->cat_name);
                    $option .= ' (' . absint($category->category_count) . ')';
                    $option .= '</option>';
                    echo $option; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }
                ?>
            </select>
        </div>
        <button class="header-search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
<?php }

/**
 * Hello Shoppable Header woocommerce search form.
 *
 */
function header_woocommerce_product_search(){
    if ( class_exists('WooCommerce' ) ) {
        ?>

        <form class="d-flex align-items-center" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="hidden" name="post_type" value="product" />
            <input class="header-search-input" name="s" type="text" placeholder="<?php esc_attr_e('Search...', 'keon-toolset'); ?>"/>
            <div class="d-inline-block"> 
                <select class="header-search-select" name="product_cat">
                    <option value=""><?php esc_html_e('All Categories', 'keon-toolset'); ?></option> 
                    <?php
                    $categories = get_categories('taxonomy=product_cat');
                    foreach ($categories as $category) {
                        $option = '<option value="' . esc_attr($category->category_nicename) . '">';
                        $option .= esc_html($category->cat_name);
                        $option .= ' (' . absint($category->category_count) . ')';
                        $option .= '</option>';
                        echo $option; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    }
                    ?>
                </select>
            </div>
            <button class="header-search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <?php
    }
}