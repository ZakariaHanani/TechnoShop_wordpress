<?php
/**
 * Functions for Woocommerce features
 *
 * @package Bosa
 */

/**
* Add a wrapper div to product
* @since Bosa 1.0.0
*/

function bosa_before_shop_loop_item(){
    echo '<div class="product-inner">';
}

add_action( 'woocommerce_before_shop_loop_item', 'bosa_before_shop_loop_item', 9 );

/**
* After shop loop item
* @since Bosa 1.0.0
*/
function bosa_after_shop_loop_item(){
    echo '</div>';
}
add_action( 'woocommerce_after_shop_loop_item', 'bosa_after_shop_loop_item', 34 );

/**
* Hide default page title
* @since Bosa 1.0.0
*/
function bosa_woo_show_page_title(){
    return false;
}
add_filter( 'woocommerce_show_page_title', 'bosa_woo_show_page_title' );

/**
* Change number or products per row.
* @since Bosa 1.0.0
*/
if ( !function_exists( 'bosa_loop_columns' ) ) {
	function bosa_loop_columns() {
        if( get_theme_mod( 'woocommerce_product_layout_type', 'product_layout_grid' ) == 'product_layout_grid' ){
		  return get_theme_mod( 'woocommerce_shop_product_column', 3 );
        }elseif( get_theme_mod( 'woocommerce_product_layout_type', 'product_layout_grid' ) == 'product_layout_list' ){
          return get_theme_mod( 'woocommerce_shop_list_column', 2 );
        }
	}
}
add_filter( 'loop_shop_columns', 'bosa_loop_columns' );

/**
* Add buttons in compare and wishlist
* @since Bosa 1.0.0
*/
if (!function_exists('bosa_compare_wishlist_buttons')) {
    function bosa_compare_wishlist_buttons() {
        $double = '';
        $icon_layout = get_theme_mod( 'icon_group_layout', 'group_layout_one' ); 
        if ( function_exists( 'yith_woocompare_constructor' ) && function_exists( 'YITH_WCWL' ) ) {
            $double = ' d-compare-wishlist';
        }
        ?>
        <div class="product-compare-wishlist<?php echo esc_attr( $double ); ?> <?php echo esc_attr( $icon_layout ); ?>">
            <?php
            if( get_theme_mod( 'icon_group_layout', 'group_layout_one' ) == 'group_layout_four' ){
                if ( function_exists( 'YITH_WCWL' ) ) {
                    ?>
                    <div class="product-wishlist">
                        <?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ) ?>
                    </div>
                <?php }
            }
            if ( function_exists( 'yith_woocompare_constructor' ) ) {
                global $product, $yith_woocompare;
                $product_id = !is_null($product) ? yit_get_prop($product, 'id', true) : 0;
                // return if product doesn't exist
                if ( empty( $product_id ) || apply_filters( 'yith_woocompare_remove_compare_link_by_cat', false, $product_id ) )
                    return;
                $url = is_admin() ? "#" : $yith_woocompare->obj->add_product_url( $product_id );
                ?>
                <div class="product-compare">
                    <a class="compare" rel="nofollow" data-product_id="<?php echo absint( $product_id ); ?>" href="<?php echo esc_url($url); ?>">
                        <i class="fas fa-sync"></i>
                        <span class="info-tooltip">
                            <?php esc_html_e( 'Compare', 'bosa' ); ?>
                        </span>
                    </a>
                </div>
                <?php
            }
            if( get_theme_mod( 'icon_group_layout', 'group_layout_one' ) != 'group_layout_four' ){
                if ( function_exists( 'YITH_WCWL' ) ) {
                    ?>
                    <div class="product-wishlist">
                        <?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ) ?>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php
    }
    add_action( 'woocommerce_after_shop_loop_item', 'bosa_compare_wishlist_buttons', 10 );
}

/**
* Add buttons in compare and wishlist
*/
if (!function_exists('bew_compare_wishlist_buttons')) {
    function bew_compare_wishlist_buttons() {
        $double = '';
        if ( function_exists( 'yith_woocompare_constructor' ) && function_exists( 'YITH_WCWL' ) ) {
            $double = ' d-compare-wishlist';
        }
        ?>
        <div class="product-compare-wishlist<?php echo esc_attr( $double ); ?>">
            <?php
            if ( function_exists( 'yith_woocompare_constructor' ) ) {
                global $product, $yith_woocompare;
                $product_id = !is_null($product) ? yit_get_prop($product, 'id', true) : 0;
                // return if product doesn't exist
                if ( empty( $product_id ) || apply_filters( 'yith_woocompare_remove_compare_link_by_cat', false, $product_id ) )
                    return;
                $url = is_admin() ? "#" : $yith_woocompare->obj->add_product_url( $product_id );
                ?>
                <div class="product-compare">
                    <a class="compare" rel="nofollow" data-product_id="<?php echo absint( $product_id ); ?>" href="<?php echo esc_url($url); ?>">
                        <i class="fas fa-sync"></i>
                        <span class="info-tooltip">
                            <?php esc_html_e( 'Compare', 'bosa' ); ?>
                        </span>
                    </a>
                </div>
                <?php
            }

            if ( function_exists( 'YITH_WCWL' ) ) {
                ?>
                <div class="product-wishlist">
                    <?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ) ?>
                </div>
            <?php } ?>
        <?php
    }
    add_action( 'bew_yith_icon_group', 'bew_compare_wishlist_buttons', 10 );
}

/**
* Add yith quick view button
*/
if( function_exists( 'YITH_WCQV_Frontend' ) ){
    function bew_yith_quick_view_buttons(){
        $YITH = YITH_WCQV_Frontend();
        add_action( 'bew_yith_icon_group', array( $YITH, 'yith_add_quick_view_button' ), 15 );
    }
    add_action( 'bew_yith_icon_group', 'bew_yith_quick_view_buttons' );
}
// BEW icon group closing div
add_action( 'bew_yith_icon_group', 'bosa_compare_wishlist_buttons_close', 16 );

/**
 * Closing for quick view, compare and wishlist.
 * @since Bosa 1.2.6
*/
if (!function_exists('bosa_compare_wishlist_buttons_close')) {
    add_action( 'woocommerce_after_shop_loop_item', 'bosa_compare_wishlist_buttons_close', 16 );
    function bosa_compare_wishlist_buttons_close() {
        echo '</div>'; /* .product-compare-wishlist */
    }
}


/**
* Change number of products that are displayed per page (shop page)
* @since Bosa 1.0.0
*/
function bosa_loop_shop_per_page( $cols ) {
    // $cols contains the current number of products per page based on the value stored on Options –> Reading
    // Return the number of products you wanna show per page.
    $cols = get_theme_mod( 'woocommerce_product_per_page', 9 );
    return $cols;
}
add_filter( 'loop_shop_per_page', 'bosa_loop_shop_per_page', 20 );

/**
 * Check if WooCommerce is activated and is shop page.
 *
 * @return bool
 * @since Bosa 1.0.0
 */
if( !function_exists( 'bosa_wooCom_is_shop' ) ){
    function bosa_wooCom_is_shop() {
        if ( class_exists( 'woocommerce' ) ) {  
            if ( is_shop()  ) {
                return true;
            }
        }else{
            return false;
        }
    }
    add_action( 'wp', 'bosa_wooCom_is_shop' );
}

/**
 * Check if WooCommerce is activated and is cart page.
 *
 * @return bool
 * @since Bosa 1.0.0
 */
if( !function_exists( 'bosa_wooCom_is_cart' ) ){
    function bosa_wooCom_is_cart() {
        if ( class_exists( 'woocommerce' ) ) {  
            if ( is_cart()  ) {
                return true;
            }
        }else{
            return false;
        }
    }
    add_action( 'wp', 'bosa_wooCom_is_cart' );
}

/**
 * Check if WooCommerce is activated and is checkout page.
 *
 * @return bool
 * @since Bosa 1.0.0
 */
if( !function_exists( 'bosa_wooCom_is_checkout' ) ){
    function bosa_wooCom_is_checkout() {
        if ( class_exists( 'woocommerce' ) ) {  
            if ( is_checkout()  ) {
                return true;
            }
        }else{
            return false;
        }
    }
    add_action( 'wp', 'bosa_wooCom_is_checkout' );
}

/**
 * Check if WooCommerce is activated and is account page.
 *
 * @return bool
 * @since Bosa 1.0.0
 */
if( !function_exists( 'bosa_wooCom_is_account_page' ) ){
    function bosa_wooCom_is_account_page() {
        if ( class_exists( 'woocommerce' ) ) {  
            if ( is_account_page()  ) {
                return true;
            }
        }else{
            return false;
        }
    }
    add_action( 'wp', 'bosa_wooCom_is_account_page' );
}

/**
* Modify excerpt item priority to last in product detail page.
* @since Bosa 1.2.6
*/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 55 );

/**
 * Change column number of related products in product detail page.
 *
 * @return array
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_related_products_args' ) ){
    add_filter( 'woocommerce_output_related_products_args', 'bosa_related_products_args', 20 );
      function bosa_related_products_args( $args ) {
        $args[ 'columns'] = 3;
        if( get_theme_mod( 'woocommerce_product_layout_type', 'product_layout_grid' ) == 'product_layout_list' ){
            $args[ 'columns'] = 2;
        }
        
        return $args;
    }
}

/**
 * Check if WooCommerce is activated and is product detail page.
 *
 * @return bool
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_wooCom_is_product_page' ) ){
    function bosa_wooCom_is_product_page() {
        if ( class_exists( 'woocommerce' ) ) {  
            if ( is_product() ) {
                return true;
            }
        }else{
            return false;
        }
    }
    add_action( 'wp', 'bosa_wooCom_is_product_page' );
}

/**
 * Adds breadcrumb before product title in product detail page.
 *
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_product_detail_breadcrumb' ) ){
    add_action( 'woocommerce_single_product_summary', 'bosa_product_detail_breadcrumb', 1 );
    function bosa_product_detail_breadcrumb(){
        if( bosa_wooCom_is_product_page() ){
           if( ( get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'disable_in_all_pages' || get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'show_in_all_page_post' ) && !get_theme_mod( 'disable_single_product_breadcrumbs', false ) ){
                bosa_breadcrumb_wrap();
            }
        }
    }
}

/**
 * Check if WooCommerce is activated and is product category page.
 *
 * @return bool
 * @since Bosa 1.4.2
 */
if( !function_exists( 'bosa_wooCom_is_product_category' ) ){
    function bosa_wooCom_is_product_category() {
        if ( class_exists( 'woocommerce' ) ) {  
            if ( is_product_category() ) {
                return true;
            }
        }else{
            return false;
        }
    }
    add_action( 'wp', 'bosa_wooCom_is_product_category' );
}

/**
 * Add left sidebar to product detail page.
 *
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_woo_product_detail_left_sidebar' ) ){
    function bosa_woo_product_detail_left_sidebar( $sidebarColumnClass ){
        if( !get_theme_mod( 'disable_sidebar_woocommerce_page', false ) ){
            if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'left' ){ 
                if( is_active_sidebar( 'woocommerce-left-sidebar') ){ ?>
                    <div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
                        <?php dynamic_sidebar( 'woocommerce-left-sidebar' ); ?>
                    </div>
                <?php }
            }elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
                if( is_active_sidebar( 'woocommerce-left-sidebar') || is_active_sidebar( 'woocommerce-right-sidebar') ){ ?>
                    <div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
                        <?php dynamic_sidebar( 'woocommerce-left-sidebar' ); ?>
                    </div>
                <?php
                }
            }
        }
    }
}

/**
 * Add right sidebar to product detail page.
 *
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_woo_product_detail_right_sidebar' ) ){
    function bosa_woo_product_detail_right_sidebar( $sidebarColumnClass ){
        if( !get_theme_mod( 'disable_sidebar_woocommerce_page', false ) ){
            if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right' ){ 
                if( is_active_sidebar( 'woocommerce-right-sidebar') ){ ?>
                    <div id="secondary" class="sidebar right-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
                        <?php dynamic_sidebar( 'woocommerce-right-sidebar' ); ?>
                    </div>
                <?php }
            }elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
                if( is_active_sidebar( 'woocommerce-left-sidebar') || is_active_sidebar( 'woocommerce-right-sidebar') ){ ?>
                    <div id="secondary-sidebar" class="sidebar right-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
                        <?php dynamic_sidebar( 'woocommerce-right-sidebar' ); ?>
                    </div>
                <?php
                }
            }
        }
    }
}

/**
 * Returns the sidebar column classes in product detail page.
 *
 * @return array
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_get_sidebar_class' ) ){
    function bosa_get_sidebar_class(){
        $sidebarClass = 'col-lg-8';
        $sidebarColumnClass = 'col-lg-4';

        if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right' ){
            if( !is_active_sidebar( 'woocommerce-right-sidebar') ){
                $sidebarClass = "col-12";
            }   
        }elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'left' ){
            if( !is_active_sidebar( 'woocommerce-left-sidebar') ){
                $sidebarClass = "col-12";
            }   
        }elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
            $sidebarClass = 'col-lg-6';
            $sidebarColumnClass = 'col-lg-3';
            if( !is_active_sidebar( 'woocommerce-left-sidebar') && !is_active_sidebar( 'woocommerce-right-sidebar') ){
                $sidebarClass = "col-12";
            }
        }
        if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'no-sidebar' || get_theme_mod( 'disable_sidebar_woocommerce_page', false ) || ( get_theme_mod( 'disable_sidebar_woocommerce_shop', false ) && ( bosa_wooCom_is_shop() || bosa_wooCom_is_product_category() ) ) || ( get_theme_mod( 'disable_sidebar_woocommerce_single', false ) && bosa_wooCom_is_product_page() ) ){
            $sidebarClass = 'col-12';
        }
        $colClasses = array(
            'sidebarClass' => $sidebarClass, 
            'sidebarColumnClass' => $sidebarColumnClass, 
        );
        return $colClasses;
    }
}

/**
 * Add wrapper product gallery in product detail page.
 *
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_woocommerce_before_single_product_summary' ) ){
    add_action( 'woocommerce_before_single_product_summary', 'bosa_woocommerce_before_single_product_summary', 5 );
    function bosa_woocommerce_before_single_product_summary(){
        echo '<div class="product-detail-wrapper">';
    }
}

/**
 * Add left sidebar before tabs in product detail page.
 *
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_woocommerce_after_single_product_summary' ) ){
    add_action( 'woocommerce_after_single_product_summary', 'bosa_woocommerce_after_single_product_summary', 5 );
    function bosa_woocommerce_after_single_product_summary(){
        $getSidebarClass = bosa_get_sidebar_class();
        echo '</div>';/* .product-detail-wrapper */
        echo '<div class="row">';
        if( !get_theme_mod( 'disable_sidebar_woocommerce_single', false ) ){
            bosa_woo_product_detail_left_sidebar( $getSidebarClass[ 'sidebarColumnClass' ] );
        }
            echo '<div class="'. $getSidebarClass[ 'sidebarClass' ] .'">';
    }
}

/**
 * Add right sidebar before tabs in product detail page.
 *
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_woocommerce_after_single_product' ) ){
    add_action( 'woocommerce_after_single_product', 'bosa_woocommerce_after_single_product' );
    function bosa_woocommerce_after_single_product(){
        $getSidebarClass = bosa_get_sidebar_class();
        if( !get_theme_mod( 'disable_sidebar_woocommerce_single', false ) ){
            bosa_woo_product_detail_right_sidebar( $getSidebarClass[ 'sidebarColumnClass' ] );
        }
            echo '</div>';/* col woocommerce tabs and related products */
        echo '</div>';/* .row */
    }
}

/**
 * Add icon and tooltip text for Yith Woocommerce Quick View.
 *
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_yith_add_quick_view_button_html' ) ){
    add_filter( 'yith_add_quick_view_button_html', 'bosa_yith_add_quick_view_button_html', 10, 3 );
    function bosa_yith_add_quick_view_button_html( $button, $label, $product ){
        
        $product_id = $product->get_id();

        $button = '<div class="product-view"><a href="#" class="yith-wcqv-button" data-product_id="' . esc_attr( $product_id ) . '"><i class="fas fa-search"></i><span class="info-tooltip">' . $label . '</span></a></div>';
        return $button;
    }
}

/**
 * Modify $label for Yith Woocommerce Wishlist.
 *
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_yith_wcwl_button_label' ) ){
    add_filter( 'yith_wcwl_button_label', 'bosa_yith_wcwl_button_label' );
    function bosa_yith_wcwl_button_label( $label_option ){
        $label_option = '<span class="info-tooltip">'.$label_option.'</span>';
        return $label_option;
    }
}

/**
 * Modify $browse_wishlist_text for Yith Woocommerce Wishlist.
 *
 * @since Bosa 1.2.6
 */
if( !function_exists( 'bosa_yith_wcwl_browse_wishlist_label' ) ){
    add_filter( 'yith_wcwl_browse_wishlist_label', 'bosa_yith_wcwl_browse_wishlist_label' );
    function bosa_yith_wcwl_browse_wishlist_label( $browse_wishlist_text ){
        if( strpos( $browse_wishlist_text, 'info-tooltip' ) === false ){
            $browse_wishlist_text = '<i class="fas fa-heart"></i><span class="info-tooltip">'.$browse_wishlist_text.'</span>';
        }
        return $browse_wishlist_text;
    }
}

/**
 * Loop product structure
 */
function bosa_loop_product_structure() {
    $elements   = array( 'woocommerce_template_loop_product_title', 'woocommerce_template_loop_price' );
    $layout     = get_theme_mod( 'woocommerce_product_card_layout', 'product_layout_one' );

    if( 'product_layout_one' == $layout ) {
        $loop_count = 0;
        foreach ( $elements as $element ) {
            call_user_func( $element );
            if( $loop_count < 1 ){
                if( !get_theme_mod( 'disable_shop_page_rating', false ) ){
                    bosa_zero_woocommerce_template_loop_rating();
                    woocommerce_template_loop_rating();
                }
            }
            $loop_count++;
        }
    } 
    else {
        $elements = array_diff( $elements, array( 'woocommerce_template_loop_price' ) );
        echo '<div class="row align-items-center">';
            echo '<div class="col-md-7 text-md-left">';
                foreach ( $elements as $element ) {
                    call_user_func( $element );
                }
                if( !get_theme_mod( 'disable_shop_page_rating', false ) ){
                    bosa_zero_woocommerce_template_loop_rating();
                    woocommerce_template_loop_rating();
                }
            echo '</div>';
            echo '<div class="col-md-5 text-md-right">';
                woocommerce_template_loop_price();
            echo '</div>';
        echo '</div>';
    }
}

/**
 * Adds cart layout div to add-to-cart loop structure.
 */
function bosa_cart_button_loop_structure() {
    $cart_button_layout     = get_theme_mod( 'woocommerce_add_to_cart_button', 'cart_button_two' );
    echo '<div class="button-' . esc_attr( $cart_button_layout ) . '">';
        woocommerce_template_loop_add_to_cart();
    echo '</div>';
}

/**
 * Inserts the opening figure tag inside product-inner div.
 */
if( !function_exists( 'bosa_product_inner_figure_start' ) ){
    function bosa_product_inner_figure_start(){
        echo '<figure class="woo-product-image">';
    }
}

/**
 * Inserts the closing figure tag.
 */
if( !function_exists( 'bosa_product_inner_figure_close' ) ){
    function bosa_product_inner_figure_close(){
        echo '</figure>';
    }
}

/**
 * Inserts the opening div tag after product-inner div.
 */
if( !function_exists( 'bosa_product_inner_contents_start' ) ){
    function bosa_product_inner_contents_start(){
        echo '<div class="product-inner-contents">';
    }
}

/**
 * Inserts the closing div tag for product-inner-content div.
 */
if( !function_exists( 'bosa_product_inner_contents_close' ) ){
    function bosa_product_inner_contents_close(){
        echo '</div>';
    }
}

/**
 * Removes product's title from shop loop.
 */
add_action( 'woocommerce_shop_loop_item_title', 'bosa_woocommerce_shop_loop_item_title', 9 );
function bosa_woocommerce_shop_loop_item_title(){
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
}

/**
 * Removes product's rating and price from shop loop.
 */
add_action( 'woocommerce_after_shop_loop_item_title', 'bosa_woocommerce_after_shop_loop_item_title', 4 );
function bosa_woocommerce_after_shop_loop_item_title(){
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );
}

/**
 * Adds rating stars even when no rating is given.
 */
function bosa_zero_woocommerce_template_loop_rating(){
    global $product;
    $count = 0;
    $rating = $product->get_average_rating();

    if ( 0 == $rating ) {
        /* translators: %s: rating */
        $label = sprintf( __( 'Rated %s out of 5', 'bosa' ), $rating );
        echo '<div class="star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div>';
    }
}
// adds bew widget zero rating 
add_action( 'bew_woo_widget_zero_rating', 'bosa_zero_woocommerce_template_loop_rating' );
/**
 * Removes product's add to cart button from shop loop.
 */
add_action( 'woocommerce_after_shop_loop_item', 'bosa_woocommerce_after_shop_loop_item', 9 );
function bosa_woocommerce_after_shop_loop_item(){
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
}

/**
 * Hook into Woocommerce
 */
add_action( 'init', 'bosa_woocommerce_hooks' );
function bosa_woocommerce_hooks() {

    add_action( 'woocommerce_before_shop_loop_item', 'bosa_product_inner_figure_start', 9 );
    add_action( 'woocommerce_after_shop_loop_item', 'bosa_product_inner_figure_close', 20 );

    add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_open', 29 );
    //Add elements from sortable option
    add_action( 'woocommerce_after_shop_loop_item', 'bosa_loop_product_structure', 30 );
    add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 31 );

    add_action( 'woocommerce_after_shop_loop_item', 'bosa_product_inner_contents_start', 25 );
    add_action( 'woocommerce_after_shop_loop_item', 'bosa_product_inner_contents_close', 33 );

    $cart_button_layout     = get_theme_mod( 'woocommerce_add_to_cart_button', 'cart_button_two' );

    if( $cart_button_layout == 'cart_button_two' ){
        add_action( 'woocommerce_after_shop_loop_item', 'bosa_cart_button_loop_structure', 32 );
    }elseif( $cart_button_layout == 'cart_button_three' ){
        add_action( 'woocommerce_after_shop_loop_item', 'bosa_cart_button_loop_structure', 32 );
    }elseif( $cart_button_layout == 'cart_button_four' ){
        add_action( 'woocommerce_after_shop_loop_item', 'bosa_cart_button_loop_structure', 19 );
    }
}

// Single Products
add_action( 'wp', 'bosa_single_product_hooks' );
function bosa_single_product_hooks(){
    if( bosa_wooCom_is_product_page() ){
        $disable_single_product_tabs = get_theme_mod( 'disable_single_product_tabs', false );
        if( $disable_single_product_tabs ){
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs' );
        }

        $disable_single_product_related_products = get_theme_mod( 'disable_single_product_related_products', false );
        if( $disable_single_product_related_products ){
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
        }
    }
}

/**
 * Add to cart button html.
 */
function bosa_filter_loop_add_to_cart( $button, $product, $args ) {
    global $product;

    //Return if not button layout 4
    $cart_button_layout     = get_theme_mod( 'woocommerce_add_to_cart_button', 'cart_button_two' );

    if ( $cart_button_layout != 'cart_button_four' ) {
        return $button;
    }
    $text = '<i class="fas fa-shopping-cart"></i>';
    $button = sprintf(
        '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
        esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
        isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
        $text
    );

    return $button;
}
add_filter( 'woocommerce_loop_add_to_cart_link', 'bosa_filter_loop_add_to_cart', 10, 3 );

/**
 * Sales badge text
 */
function bosa_sale_badge_tag( $html, $post, $product ) {

    if ( !$product->is_on_sale() ) {
        return;
    }   

    $badge_text     = get_theme_mod( 'woocommerce_sale_badge_text', 'Sale!' );
    $enable_sale_percent = get_theme_mod( 'enable_sale_badge_percent', false );
    $percent_text   = get_theme_mod( 'woocommerce_sale_badge_percent', '-{value}%' );

    if( !$enable_sale_percent ){
        $badge = '<span class="onsale">' . esc_html( $badge_text ) . '</span>';
    }
    else{
        if( $product->is_type( 'variable' ) ){
            $percentages = array();

            // Get all variation prices
            $prices = $product->get_variation_prices();

            // Loop through variation prices
            foreach( $prices['price'] as $key => $price ){
                // Only on sale variations
                if( $prices['regular_price'][$key] !== $price ){
                    // Calculate and set in the array the percentage for each variation on sale
                    $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
                }
            }
            $percentage = max( $percentages );
      
        }elseif( $product->is_type('grouped') ){
            $percentages    = array();
            $children_ids   = $product->get_children();
      
            foreach( $children_ids as $child_id ){
                $child_product = wc_get_product($child_id);
      
                $regular_price = (float) $child_product->get_regular_price();
                $sale_price    = (float) $child_product->get_sale_price();
      
                if ( $sale_price != 0 || ! empty($sale_price) ) {
                    $percentages[] = round(100 - ($sale_price / $regular_price * 100));
                }
            }
            $percentage = max($percentages) ;
        }else{
            $regular_price = (float) $product->get_regular_price();
            $sale_price    = (float) $product->get_sale_price();
      
            if( $sale_price != 0 || ! empty($sale_price) ){
                $percentage = round(100 - ($sale_price / $regular_price * 100) );
            }else{
                return $html;
            }
        }

        $percent_text = str_replace( '{value}', $percentage, $percent_text );

        $badge = '<span class="onsale">' . esc_html( $percent_text ) . '</span>';

    }
    
    return $badge;
}
add_filter( 'woocommerce_sale_flash', 'bosa_sale_badge_tag', 10, 3 );

if( !function_exists('bosa_add_woocommerce_product_class') ){
    /**
     * WooCommerce Post Class filter.
     *
     */
    function bosa_add_woocommerce_product_class( $classes, $product ){

        if( get_theme_mod( 'woocommerce_product_layout_type', 'product_layout_grid' ) == 'product_layout_grid' ){
            $classes[] = 'product-grid';
        }elseif( get_theme_mod( 'woocommerce_product_layout_type', 'product_layout_grid' ) == 'product_layout_list' ){
            $classes[] = 'product-list';
        }
        return $classes;
    }
}
add_filter( 'woocommerce_post_class', 'bosa_add_woocommerce_product_class', 10, 2 );

add_filter( 'woocommerce_single_product_zoom_options', 'bosa_single_product_zoom_options' );
if( !function_exists('bosa_single_product_zoom_options') ){
    /**
     * WooCommerce single product zoom magnification level.
     *
     */
    function bosa_single_product_zoom_options( $zoom_options ) {
        // Changing the magnification level:
        $magnification = get_theme_mod( 'single_product_iamge_magnify', 1 );
        $zoom_options['magnify'] = $magnification;

        return $zoom_options;
    }
}


/**
* Add product wishlist
* @since Bosa 1.0.0
*/
if ( !function_exists('bosa_head_wishlist') ) {
    function bosa_head_wishlist() {
        if ( function_exists( 'YITH_WCWL' ) ) {
            $wishlist_url = YITH_WCWL()->get_wishlist_url();
            ?>
            <div class="header-wishlist">
                <a href="<?php echo esc_url( $wishlist_url ); ?>">
                    <span class="header-svg-icon">
                        <svg width="20.6px" height="20.6px" viewBox="-28.967 472.28 20.6 20.6" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill="#253D4E" d="M-14.085,472.58c-0.938,0.016-1.856,0.296-2.66,0.814c-0.804,0.518-1.467,1.254-1.922,2.134
                                    c-0.454-0.88-1.117-1.616-1.921-2.134c-0.804-0.518-1.722-0.798-2.66-0.814c-1.495,0.07-2.904,0.771-3.919,1.951
                                    c-1.015,1.18-1.552,2.742-1.496,4.346c0,6.052,9.126,13.041,9.514,13.337l0.481,0.365l0.481-0.365
                                    c0.388-0.295,9.515-7.286,9.515-13.337c0.056-1.604-0.481-3.166-1.496-4.346C-11.181,473.351-12.59,472.65-14.085,472.58z
                                     M-18.667,490.381c-2.71-2.171-8.33-7.503-8.33-11.504c-0.057-1.13,0.305-2.239,1.007-3.084c0.702-0.845,1.688-1.358,2.741-1.427
                                    c1.054,0.069,2.039,0.582,2.741,1.427c0.702,0.845,1.064,1.953,1.007,3.084h1.666c-0.057-1.13,0.305-2.239,1.007-3.084
                                    c0.702-0.845,1.688-1.358,2.741-1.427c1.054,0.069,2.039,0.582,2.741,1.427s1.064,1.953,1.007,3.084
                                    C-10.337,482.88-15.957,488.211-18.667,490.381z"/>
                            </g>
                        </svg>
                    </span>
                    <span class="info-tooltip">
                        <?php esc_html_e( 'Wishlist', 'bosa' ); ?>
                    </span>
                </a>
            </div>
            <?php
        }
    }
}

/**
* Add product compare icon in header
* @since Bosa 1.0.0
*/
if (!function_exists( 'bosa_head_compare' ) ) {
    function bosa_head_compare() {
        if ( function_exists( 'yith_woocompare_constructor' ) ) {
            global $yith_woocompare;
            ?>
            <div class="header-compare">
                <a class="compare added" rel="nofollow" href="<?php echo esc_url( $yith_woocompare->obj->view_table_url() ); ?>">
                    <span class="header-svg-icon">
                        <svg width="20.6px" height="20.6px" viewBox="-62.923 456.029 20.6 20.6" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill="#253D4E" d="M-43.735,469.155l-4.008,1.204l0.399,1.376l1.631-0.516c-1.718,2.52-4.629,3.925-7.643,3.689l0,0
                                    c-0.256-0.018-0.511-0.049-0.764-0.095l0,0l-0.662-0.146l-0.272-0.052l-0.476-0.146l-0.323-0.155l-0.314-0.129l-0.501-0.249
                                    c-2.59-1.344-4.313-3.944-4.561-6.88l-1.393,0.12c0.276,3.381,2.222,6.391,5.172,7.998l0,0c0.255,0.138,0.518,0.267,0.79,0.387
                                    h0.093c0.238,0.103,0.484,0.189,0.73,0.275l0.17,0.06l0.637,0.163l0.272,0.069c0.161,0,0.331,0.052,0.501,0.077l0.416,0.069l0,0
                                    c3.71,0.389,7.321-1.366,9.342-4.541l0.535,1.849l1.342-0.396L-43.735,469.155z"/>
                                <path fill="#253D4E" d="M-61.57,463.066l4.059-1.006l-0.331-1.367l-1.622,0.404c1.837-2.428,4.808-3.685,7.805-3.302l0,0
                                    c0.254,0.033,0.506,0.079,0.756,0.138l0,0l0.654,0.172l0.178,0.06l0.476,0.172l0.34,0.146l0.306,0.146
                                    c0.161,0.086,0.331,0.172,0.493,0.275c2.523,1.472,4.125,4.149,4.246,7.095l1.393-0.052c-0.122-3.369-1.913-6.448-4.764-8.187l0,0
                                    l0,0c-0.247-0.154-0.502-0.295-0.764-0.421l-0.093-0.043c-0.232-0.109-0.47-0.212-0.713-0.31l-0.17-0.06
                                    c-0.204-0.077-0.416-0.146-0.628-0.206l-0.263-0.077l-0.493-0.112c-0.144,0-0.28-0.06-0.425-0.077h-0.042
                                    c-3.691-0.591-7.395,0.972-9.58,4.042l-0.45-1.875l-1.35,0.335L-61.57,463.066z"/>
                            </g>
                        </svg>
                    </span>
                    <span class="info-tooltip">
                        <?php esc_html_e( 'Compare', 'bosa' ); ?>
                    </span>
                </a>
            </div>
            <?php
        }
    }
}

/**
* Add my account
* @since Bosa 1.0.0
*/
if ( !function_exists( 'bosa_my_account' ) ) {
    function bosa_my_account() {
        if ( get_theme_mod('woo_account', 1 ) == 1) {
            ?>
            <div class="header-my-account">
                <div class="header-login"> 
                    <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">
                        <span class="header-svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="20px" viewBox="-73.015 505.461 15 20">
                                <g>
                                    <path fill="#253D4E" d="M-58.15,525.281h-1.637v-4.127c-0.001-0.642-0.256-1.257-0.709-1.71c-0.454-0.454-1.069-0.709-1.71-0.709
                                        h-6.617c-0.642,0.001-1.257,0.256-1.71,0.709c-0.454,0.454-0.709,1.069-0.709,1.71v4.127h-1.637v-4.127
                                        c0.001-1.076,0.429-2.107,1.19-2.867c0.76-0.76,1.792-1.188,2.867-1.19h6.617c1.076,0.001,2.107,0.429,2.867,1.19
                                        c0.761,0.761,1.188,1.792,1.19,2.867V525.281z"/>
                                    <path fill="#253D4E" d="M-65.515,515.461c-0.971,0-1.92-0.288-2.728-0.828c-0.807-0.54-1.437-1.306-1.808-2.204
                                        c-0.372-0.897-0.469-1.885-0.279-2.837c0.189-0.953,0.657-1.827,1.344-2.514c0.687-0.687,1.562-1.154,2.514-1.344
                                        c0.952-0.189,1.94-0.092,2.837,0.279c0.897,0.372,1.664,1.001,2.204,1.808c0.539,0.807,0.827,1.757,0.827,2.728
                                        c-0.001,1.302-0.519,2.55-1.44,3.471C-62.965,514.942-64.213,515.459-65.515,515.461z M-65.515,507.277
                                        c-0.647,0-1.28,0.192-1.819,0.552c-0.538,0.36-0.958,0.871-1.206,1.469c-0.248,0.598-0.313,1.256-0.186,1.891
                                        c0.126,0.635,0.438,1.218,0.896,1.676c0.458,0.458,1.041,0.77,1.676,0.896c0.635,0.126,1.293,0.061,1.891-0.186
                                        c0.598-0.248,1.109-0.667,1.469-1.206s0.552-1.171,0.552-1.819c0-0.868-0.345-1.701-0.959-2.315
                                        C-63.814,507.622-64.647,507.277-65.515,507.277z"/>
                                </g>
                            </svg>
                        </span>
                        <span class="info-tooltip">
                            <?php esc_html_e( 'My Account', 'bosa' ); ?>
                        </span>
                    </a>
                </div>
            </div>
            <?php
        }
    }
}


/**
* Add cart link
* @since Bosa 1.0.0
*/
if ( !function_exists('bosa_cart_link') ) {
    function bosa_cart_link() {
        ?>  
            <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                <span class="header-svg-icon">
                    <svg width="20.6px" height="20.6px" viewBox="-60.369 566.879 20.6 20.6" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path fill="#253D4E" d="M-40.069,569.679h-16.465l-0.035-0.292c-0.072-0.608-0.364-1.169-0.821-1.575
                                c-0.457-0.407-1.048-0.632-1.66-0.632h-1.018v1.667h1.018c0.204,0,0.401,0.075,0.554,0.211c0.153,0.136,0.25,0.323,0.274,0.525
                                l1.321,11.223c0.072,0.608,0.364,1.169,0.821,1.575c0.457,0.407,1.048,0.632,1.66,0.632h11.018v-1.667h-11.018
                                c-0.204,0-0.401-0.075-0.554-0.211c-0.153-0.136-0.25-0.323-0.274-0.526l-0.109-0.93h13.485L-40.069,569.679z M-43.266,578.012
                                h-12.287l-0.784-6.667h14.274L-43.266,578.012z"/>
                            <path fill="#253D4E" d="M-54.236,587.179c0.92,0,1.667-0.746,1.667-1.667c0-0.921-0.746-1.667-1.667-1.667
                                s-1.667,0.746-1.667,1.667C-55.902,586.432-55.156,587.179-54.236,587.179z"/>
                            <path fill="#253D4E" d="M-45.902,587.179c0.921,0,1.667-0.746,1.667-1.667c0-0.921-0.746-1.667-1.667-1.667
                                c-0.92,0-1.667,0.746-1.667,1.667C-47.569,586.432-46.823,587.179-45.902,587.179z"/>
                        </g>
                    </svg>
                </span>
                <span class="count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span>
                <div class="amount-cart hidden-xs"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></div> 
            </a>
        <?php
    }
}

/**
* Add product cart box
* @since Bosa 1.0.0
*/
if ( !function_exists('bosa_header_cart') ) {
    function bosa_header_cart() {
        ?>
            <div class="header-cart">
                <div class="header-cart-block">
                    <div class="header-cart-inner">
                        <?php bosa_cart_link(); ?>
                        <?php if( !bosa_wooCom_is_cart() && !bosa_wooCom_is_checkout() ){  ?>
                            <ul class="site-header-cart menu list-unstyled text-center">
                                <li>
                                    <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php
    }
}

/**
* Add header add to cart fragment
* @since Bosa 1.0.0
*/
if ( !function_exists( 'bosa_header_add_to_cart_fragment' ) ) {
    function bosa_header_add_to_cart_fragment( $fragments ) {
        ob_start();
        bosa_cart_link();
        $fragments['a.cart-contents'] = ob_get_clean();
        return $fragments;
    }
    add_filter( 'woocommerce_add_to_cart_fragments', 'bosa_header_add_to_cart_fragment' );
}