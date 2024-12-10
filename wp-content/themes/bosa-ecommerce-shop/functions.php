<?php
/**
 * Theme functions and definitions
 *
 * @package Bosa Ecommerce Shop 1.0.0
 */

require get_stylesheet_directory() . '/inc/customizer/customizer.php';
require get_stylesheet_directory() . '/inc/customizer/loader.php';

if ( ! function_exists( 'bosa_ecommerce_shop_enqueue_styles' ) ) :
	/**
	 * @since Bosa Ecommerce Shop 1.0.0
	 */
	function bosa_ecommerce_shop_enqueue_styles() {
        require_once get_theme_file_path ( 'inc/wptt-webfont-loader.php');

		wp_enqueue_style( 'bosa-ecommerce-shop-style-parent', get_template_directory_uri() . '/style.css',
			array(
				'bootstrap',
				'slick',
				'slicknav',
				'slick-theme',
				'fontawesome',
				'bosa-blocks',
				'bosa-google-font'
				)
		);

	    wp_enqueue_style(
            'bosa-ecommerce-shop-google-fonts',
            wptt_get_webfont_url( "https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" ),
            false
        );

        wp_enqueue_style(
            'bosa-ecommerce-shop-google-fonts-two',
            wptt_get_webfont_url( "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" ),
            false
        );

        wp_enqueue_script( 'bosa-ecommerce-shop-custom-woo', get_stylesheet_directory_uri() . '/assets/js/custom-woo.js', array( 'jquery' ), '1.0', true );

	}

endif;
add_action( 'wp_enqueue_scripts', 'bosa_ecommerce_shop_enqueue_styles', 10 );

/**
* Registers menu location. 
* @since Bosa Ecommerce Shop 1.0.0
*/
function bosa_ecommerce_shop_menu_register(){
    register_nav_menu(
        'menu-4', esc_html__( 'Category Menu', 'bosa-ecommerce-shop' )
    );
}
add_action( 'after_setup_theme', 'bosa_ecommerce_shop_menu_register' );

/**
* Add cart link
* @since Bosa Ecommerce Shop 1.0.0
*/
if ( !function_exists( 'bosa_ecommerce_shop_cart_link' ) ) {
    function bosa_ecommerce_shop_cart_link() {
        ?>	
            <a class="cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                <span class="header-svg-icon">
                    <svg width="20" height="20" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                        <path d="M24.4941 3.36652H4.73614L4.69414 3.01552C4.60819 2.28593 4.25753 1.61325 3.70863 1.12499C3.15974 0.636739 2.45077 0.366858 1.71614 0.366516L0.494141 0.366516V2.36652H1.71614C1.96107 2.36655 2.19748 2.45647 2.38051 2.61923C2.56355 2.78199 2.68048 3.00626 2.70914 3.24952L4.29414 16.7175C4.38009 17.4471 4.73076 18.1198 5.27965 18.608C5.82855 19.0963 6.53751 19.3662 7.27214 19.3665H20.4941V17.3665H7.27214C7.02705 17.3665 6.79052 17.2764 6.60747 17.1134C6.42441 16.9505 6.30757 16.7259 6.27914 16.4825L6.14814 15.3665H22.3301L24.4941 3.36652ZM20.6581 13.3665H5.91314L4.97214 5.36652H22.1011L20.6581 13.3665Z" fill="#253D4E"/>
                        <path d="M7.49414 24.3665C8.59871 24.3665 9.49414 23.4711 9.49414 22.3665C9.49414 21.2619 8.59871 20.3665 7.49414 20.3665C6.38957 20.3665 5.49414 21.2619 5.49414 22.3665C5.49414 23.4711 6.38957 24.3665 7.49414 24.3665Z" fill="#253D4E"/>
                        <path d="M17.4941 24.3665C18.5987 24.3665 19.4941 23.4711 19.4941 22.3665C19.4941 21.2619 18.5987 20.3665 17.4941 20.3665C16.3896 20.3665 15.4941 21.2619 15.4941 22.3665C15.4941 23.4711 16.3896 24.3665 17.4941 24.3665Z" fill="#253D4E"/>
                        </g>
                        <defs>
                        <clipPath id="clip0">
                        <rect width="24" height="24" fill="white" transform="translate(0.494141 0.366516)"/>
                            </clipPath>
                        </defs>
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
* @since Bosa Ecommerce Shop 1.0.0
*/
if ( !function_exists( 'bosa_ecommerce_shop_header_cart' ) ) {
    function bosa_ecommerce_shop_header_cart() {
        ?>
            <div class="header-cart">
                <div class="header-cart-block">
                    <div class="header-cart-inner">
                        <?php bosa_ecommerce_shop_cart_link(); ?>
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
* @since Bosa Ecommerce Shop 1.0.0
*/
if ( !function_exists( 'bosa_ecommerce_shop_header_add_to_cart_fragment' ) ) {
    function bosa_ecommerce_shop_header_add_to_cart_fragment( $fragments ) {
        ob_start();
        bosa_ecommerce_shop_cart_link();
        $fragments['a.cart-icon'] = ob_get_clean();
        return $fragments;
    }
    add_filter( 'woocommerce_add_to_cart_fragments', 'bosa_ecommerce_shop_header_add_to_cart_fragment' );
}

/**
* Add product wishlist
* @since Bosa Ecommerce Shop 1.0.0
*/
if ( !function_exists( 'bosa_ecommerce_shop_head_wishlist' ) ) {
    function bosa_ecommerce_shop_head_wishlist() {
        if ( function_exists( 'YITH_WCWL' ) ) {
            $wishlist_url = YITH_WCWL()->get_wishlist_url();
            ?>
            <div class="header-wishlist">
                <a href="<?php echo esc_url( $wishlist_url ); ?>">
                    <span class="header-svg-icon">
                        <svg width="20" height="20" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                            <path d="M18.2753 1.28351C17.1493 1.30102 16.0478 1.61536 15.0821 2.19478C14.1164 2.7742 13.3207 3.59818 12.7753 4.58351C12.23 3.59818 11.4343 2.7742 10.4686 2.19478C9.50289 1.61536 8.4014 1.30102 7.27535 1.28351C5.48029 1.3615 3.78905 2.14676 2.57113 3.46774C1.35321 4.78872 0.707598 6.53803 0.775349 8.33351C0.775349 15.1085 11.7313 22.9335 12.1973 23.2655L12.7753 23.6745L13.3533 23.2655C13.8193 22.9355 24.7753 15.1085 24.7753 8.33351C24.8431 6.53803 24.1975 4.78872 22.9796 3.46774C21.7616 2.14676 20.0704 1.3615 18.2753 1.28351ZM12.7753 21.2125C9.52235 18.7825 2.77535 12.8125 2.77535 8.33351C2.70699 7.06822 3.14172 5.82724 3.98471 4.88121C4.82771 3.93518 6.01058 3.36086 7.27535 3.28351C8.54012 3.36086 9.72299 3.93518 10.566 4.88121C11.409 5.82724 11.8437 7.06822 11.7753 8.33351H13.7753C13.707 7.06822 14.1417 5.82724 14.9847 4.88121C15.8277 3.93518 17.0106 3.36086 18.2753 3.28351C19.5401 3.36086 20.723 3.93518 21.566 4.88121C22.409 5.82724 22.8437 7.06822 22.7753 8.33351C22.7753 12.8145 16.0283 18.7825 12.7753 21.2125Z" fill="#253D4E"/>
                            </g>
                            <defs>
                            <clipPath id="clip0">
                                <rect width="20" height="20" fill="white" transform="translate(0.775391 0.366516)"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <span class="info-tooltip">
                        <?php esc_html_e( 'Wishlist', 'bosa-ecommerce-shop' ); ?>
                    </span>
                </a>
            </div>
            <?php
        }
    }
}

/**
* Add product compare icon in header
* @since Bosa Ecommerce Shop 1.0.0
*/
if (!function_exists( 'bosa_ecommerce_shop_head_compare' ) ) {
    function bosa_ecommerce_shop_head_compare() {
        if ( function_exists( 'yith_woocompare_constructor' ) ) {
            global $yith_woocompare;
            ?>
            <div class="header-compare">
                <a class="compare added" rel="nofollow" href="<?php echo esc_url( $yith_woocompare->obj->view_table_url() ); ?>">
                    <span class="header-svg-icon">
                        <svg width="20" height="20" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                           <path class="cls-1" d="M23.33,16l-4.72,1.4L19.08,19,21,18.4a10,10,0,0,1-9,4.29h0a8.51,8.51,0,0,1-.9-.11h0l-.78-.17L10,22.35l-.56-.17L9.06,22l-.37-.15-.59-.29a9.94,9.94,0,0,1-5.37-8l-1.64.14A11.65,11.65,0,0,0,7.18,23h0q.45.24.93.45l.11,0c.28.12.57.22.86.32l.2.07.75.19.32.08c.19,0,.39.06.59.09l.49.08h0a11.66,11.66,0,0,0,11-5.28l.63,2.15,1.58-.46Z" transform="translate(-1.09 -1.07)"/>
                           <path class="cls-1" d="M2.33,8.92,7.11,7.75,6.72,6.16l-1.91.47A10,10,0,0,1,14,2.79h0a8.72,8.72,0,0,1,.89.16h0l.77.2.21.07.56.2.4.17.36.17c.19.1.39.2.58.32a10,10,0,0,1,5,8.25l1.64-.06A11.61,11.61,0,0,0,18.8,2.75h0l0,0a9.75,9.75,0,0,0-.9-.49l-.11-.05q-.41-.19-.84-.36l-.2-.07c-.24-.09-.49-.17-.74-.24l-.31-.09-.58-.13c-.17,0-.33-.07-.5-.09h-.05A11.66,11.66,0,0,0,3.29,5.93L2.76,3.75l-1.59.39Z" transform="translate(-1.09 -1.07)"/>
                            </g> 
                            <defs>
                            <clipPath id="clip0">
                                <rect width="26" height="26" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <span class="info-tooltip">
                        <?php esc_html_e( 'Compare', 'bosa-ecommerce-shop' ); ?>
                    </span>
                </a>
            </div>
            <?php
        }
    }
}

/**
* Add my account
* @since Bosa Ecommerce Shop 1.0.0
*/
if ( !function_exists( 'bosa_ecommerce_shop_my_account' ) ) {
    function bosa_ecommerce_shop_my_account() {
        if ( get_theme_mod('woo_account', 1 ) == 1) {
            ?>
            <div class="header-my-account">
                <div class="header-login"> 
                    <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">
                        <span class="header-svg-icon">
                            <svg width="20" height="20" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M21.4443 24.3665H19.4443V19.3235C19.4435 18.5395 19.1317 17.7879 18.5774 17.2335C18.023 16.6791 17.2713 16.3673 16.4873 16.3665H8.40134C7.61733 16.3673 6.86567 16.6791 6.3113 17.2335C5.75693 17.7879 5.44513 18.5395 5.44434 19.3235V24.3665H3.44434V19.3235C3.44592 18.0093 3.96869 16.7494 4.89796 15.8201C5.82723 14.8909 7.08714 14.3681 8.40134 14.3665H16.4873C17.8015 14.3681 19.0614 14.8909 19.9907 15.8201C20.92 16.7494 21.4427 18.0093 21.4443 19.3235V24.3665Z" fill="#253D4E"/>
                                <path d="M12.4443 12.3665C11.2577 12.3665 10.0976 12.0146 9.11092 11.3553C8.12422 10.696 7.35519 9.75898 6.90106 8.66262C6.44694 7.56626 6.32812 6.35986 6.55963 5.19598C6.79114 4.03209 7.36258 2.96299 8.2017 2.12388C9.04081 1.28476 10.1099 0.713318 11.2738 0.481807C12.4377 0.250296 13.6441 0.369116 14.7404 0.823242C15.8368 1.27737 16.7739 2.0464 17.4332 3.0331C18.0924 4.01979 18.4443 5.17983 18.4443 6.36652C18.4427 7.95733 17.8101 9.48253 16.6852 10.6074C15.5604 11.7323 14.0352 12.3649 12.4443 12.3665ZM12.4443 2.36652C11.6532 2.36652 10.8799 2.60111 10.2221 3.04064C9.56426 3.48017 9.05157 4.10488 8.74882 4.83579C8.44607 5.56669 8.36686 6.37096 8.5212 7.14688C8.67554 7.9228 9.0565 8.63554 9.61591 9.19495C10.1753 9.75436 10.8881 10.1353 11.664 10.2897C12.4399 10.444 13.2442 10.3648 13.9751 10.062C14.706 9.75929 15.3307 9.2466 15.7702 8.5888C16.2097 7.931 16.4443 7.15764 16.4443 6.36652C16.4443 5.30565 16.0229 4.28824 15.2728 3.53809C14.5226 2.78795 13.5052 2.36652 12.4443 2.36652Z" fill="#253D4E"/>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                    <rect width="24" height="24" fill="white" transform="translate(0.444336 0.366516)"/>
                                </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <span class="info-tooltip">
                            <?php esc_html_e( 'My Account', 'bosa-ecommerce-shop' ); ?>
                        </span>
                    </a>
                </div>
            </div>
            <?php
        }
    }
}

/**
* Add a header advertisement banner
* @since Bosa Ecommerce Shop 1.0.0
*/
function bosa_header_advertisement_banner(){
    $bannerImageID                      = get_theme_mod( 'header_advertisement_banner', '' );
    if ( !empty( $bannerImageID ) ){
        $render_header_ad_image_size        = get_theme_mod( 'render_header_ad_image_size', 'full' );
        $header_advertisement_banner_obj    = wp_get_attachment_image_src( $bannerImageID, $render_header_ad_image_size );
        if ( is_array(  $header_advertisement_banner_obj ) ){
            $header_advertisement_banner = $header_advertisement_banner_obj[0];
        }else{
            $header_advertisement_banner = '';
        }
        $alt = get_post_meta( $bannerImageID, '_wp_attachment_image_alt', true);
        ?>
            <div class="header-advertisement-banner">
                <a href="<?php echo esc_url( get_theme_mod( 'header_advertisement_banner_link', '#' ) ); ?>" alt="<?php echo esc_attr( $alt ); ?>" target="_blank">
                    <img src="<?php echo esc_url( $header_advertisement_banner ); ?>">
                </a>
            </div>
        <?php
    }
}

/**
* Check if all getting started recommended plugins are active.
* @since Bosa Ecommerce Shop 1.0.0
*/
if( !function_exists( 'bosa_are_plugin_active' ) ){
    function bosa_are_plugin_active() {
        if ( is_plugin_active( 'advanced-import/advanced-import.php' ) && is_plugin_active( 'keon-toolset/keon-toolset.php' ) && is_plugin_active( 'kirki/kirki.php' ) && is_plugin_active( 'elementor/elementor.php' ) && is_plugin_active( 'breadcrumb-navxt/breadcrumb-navxt.php' ) && is_plugin_active( 'yith-woocommerce-compare/init.php' ) && is_plugin_active( 'yith-woocommerce-quick-view/init.php' ) && is_plugin_active( 'yith-woocommerce-wishlist/init.php' ) && is_plugin_active( 'elementskit-lite/elementskit-lite.php' ) && is_plugin_active( 'woocommerce/woocommerce.php' ) && is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) && is_plugin_active( 'sina-extension-for-elementor/sina-extension-for-elementor.php' ) && is_plugin_active( 'bosa-elementor-for-woocommerce/bosa-elementor-for-woocommerce.php' ) ){
            return true;
        }else{
            return false;
        }
    }
}

//Stop WooCommerce redirect on activation
add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );

/**
* Get pages by post id.
* 
* @since Bosa Ecommerce Shop 1.0.0
* @return array.
*/
function bosa_ecommerce_shop_get_pages(){
    $page_array = get_pages();
    $pages_list = array();
    foreach ( $page_array as $key => $value ){
        $page_id = absint( $value->ID );
        $pages_list[ $page_id ] = $value->post_title;
    }
    return $pages_list;
}

/**
* Add a blog advertisement banner
* @since Bosa Ecommerce Shop 1.0.0
*/
if( !function_exists( 'bosa_ecommerce_shop_blog_advertisement_banner' ) ){
    function bosa_ecommerce_shop_blog_advertisement_banner(){
        $blogAdvertID                   = get_theme_mod( 'blog_advertisement_banner', '' );
        $render_blog_ad_image_size      = get_theme_mod( 'render_blog_ad_image_size', 'full' );
        $blog_advertisement_banner_obj  = wp_get_attachment_image_src( $blogAdvertID,  $render_blog_ad_image_size );
        if ( is_array(  $blog_advertisement_banner_obj ) ){
            $blog_advertisement_banner = $blog_advertisement_banner_obj[0];
            $advert_target = get_theme_mod( 'blog_advertisement_banner_target', true );
            $alt = get_post_meta( $blogAdvertID, '_wp_attachment_image_alt', true); ?>
            <div class="section-advert">
                <a href="<?php echo esc_url( get_theme_mod( 'blog_advertisement_banner_link', '#' ) ); ?>" alt="<?php echo esc_attr( $alt ); ?>" target="<?php echo esc_attr( $advert_target ); ?>">
                    <img src="<?php echo esc_url( $blog_advertisement_banner ); ?>">
                </a>
            </div>
        <?php }
    }
}

if ( ! function_exists( 'bosa_ecommerce_shop_grid_thumbnail_date' ) ) :
    /**
     * Prints HTML with meta information for the tags and comments.
     */
    function bosa_ecommerce_shop_grid_thumbnail_date() {

        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date( 'M j, Y' ) ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date( 'M j, Y' ) )
        );
        $year = get_the_date( 'Y' );
        $month = get_the_date( 'm' );
        $link = ( is_single() ) ? get_month_link( $year, $month ) : get_permalink();

        $posted_on = '<a href="' . esc_url( $link ) . '" rel="bookmark">' . $time_string . '</a>';

        if ( !is_single() && !get_theme_mod( 'hide_date', false ) ){
            if ( !get_theme_mod( 'disable_date_thumbnail', false ) ){
                echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
            }
        }

        $byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

        if ( !is_single() && !get_theme_mod( 'hide_author', false ) ){
            if ( !get_theme_mod( 'disable_author_thumbnail', true ) ){
                echo '<span class="byline"> ' . $byline . '</span>';
            }
        }

        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            if( !is_single() && !get_theme_mod( 'hide_comment', false ) ){ 
                if ( !get_theme_mod( 'disable_comment_thumbnail', true ) ){
                    echo '<span class="comments-link">';
                    comments_popup_link(
                        sprintf(
                            wp_kses(
                                /* translators: %s: post title */
                                __( 'Comment<span class="screen-reader-text"> on %s</span>', 'bosa-ecommerce-shop' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        )
                    );
                    echo '</span>';
                }
            }
        } 
    }
endif;

if( !function_exists( 'bosa_get_intermediate_image_sizes' ) ){
    /**
    * Array of image sizes.
    * 
    * @since Bosa Ecommerce Shop 1.0.0
    * @return array
    */
    function bosa_get_intermediate_image_sizes(){

        $data   = array(
            'full'          => esc_html__( 'Full Size', 'bosa-ecommerce-shop' ),
            'large'         => esc_html__( 'Large Size', 'bosa-ecommerce-shop' ),
            'medium'        => esc_html__( 'Medium Size', 'bosa-ecommerce-shop' ),
            'medium_large'  => esc_html__( 'Medium Large Size', 'bosa-ecommerce-shop' ),
            'thumbnail'     => esc_html__( 'Thumbnail Size', 'bosa-ecommerce-shop' ),
            '1536x1536'     => esc_html__( '1536x1536 Size', 'bosa-ecommerce-shop' ),
            '2048x2048'     => esc_html__( '2048x2048 Size', 'bosa-ecommerce-shop' ),
            'bosa-1920-550' => esc_html__( '1920x550 Size', 'bosa-ecommerce-shop' ),
            'bosa-1370-550' => esc_html__( '1370x550 Size', 'bosa-ecommerce-shop' ),
            'bosa-590-310'  => esc_html__( '590x310 Size', 'bosa-ecommerce-shop' ),
            'bosa-420-380'  => esc_html__( '420x380 Size', 'bosa-ecommerce-shop' ),
            'bosa-420-300'  => esc_html__( '420x300 Size', 'bosa-ecommerce-shop' ),
            'bosa-420-200'  => esc_html__( '420x200 Size', 'bosa-ecommerce-shop' ),
            'bosa-290-150'  => esc_html__( '290x150 Size', 'bosa-ecommerce-shop' ),
            'bosa-80-60'    => esc_html__( '80x60 Size', 'bosa-ecommerce-shop' ),
        );
        
        return $data;

    }
}

if( !function_exists( 'bosa_ecommerce_shop_archive_post_layout_filter' ) ){
    /**
    * Filter of archive post layout choices.
    * 
    * @since Bosa Ecommerce Shop 1.0.0
    * @return array
    */
    add_filter( 'bosa_archive_post_layout_filter', 'bosa_ecommerce_shop_archive_post_layout_filter' );
    function bosa_ecommerce_shop_archive_post_layout_filter( $post_layout ){
        $added_post_layout = array(
            'grid-thumbnail' => get_stylesheet_directory_uri() . '/assets/images/thumbnail-layout.png',
        );
        return array_merge( $post_layout, $added_post_layout );
    }
}

if( !function_exists( 'bosa_ecommerce_shop_header_layout_filter' ) ){
    /**
    * Filter of header layout choices.
    * 
    * @since Bosa Ecommerce Shop 1.0.0
    * @return array
    */
    add_filter( 'bosa_header_layout_filter', 'bosa_ecommerce_shop_header_layout_filter' );
    function bosa_ecommerce_shop_header_layout_filter( $header_layout ){
        $added_header = array(
            'header_four'   => get_stylesheet_directory_uri() . '/assets/images/header-layout-4.png',
        );
        return array_merge( $header_layout, $added_header );
    }
}

if( !function_exists( 'bosa_ecommerce_shop_footer_layout_filter' ) ){
    /**
    * Filter of footer layout choices.
    * 
    * @since Bosa Ecommerce Shop 1.0.0
    * @return array
    */
    add_filter( 'bosa_footer_layout_filter', 'bosa_ecommerce_shop_footer_layout_filter' );
    function bosa_ecommerce_shop_footer_layout_filter( $footer_layout ){
        $added_footer = array(
            'footer_four'  => get_stylesheet_directory_uri() . '/assets/images/footer-layout-4.png',
        );
        return array_merge( $footer_layout, $added_footer );
    }
}

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );