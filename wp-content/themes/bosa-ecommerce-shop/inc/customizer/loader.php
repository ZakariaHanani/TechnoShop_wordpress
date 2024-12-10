<?php

function bosa_ecommerce_shop_default_styles(){

	// Begin Style
	$css = '<style>';

	/* Site Title */
	$site_title_color = get_theme_mod( 'site_title_color', '#030303' );
	$site_tagline_color = get_theme_mod( 'site_tagline_color', '#767676' );
	$css .= '
		/* Site Title */
		.header-four .site-branding .site-title {
			color: '. esc_attr( $site_title_color ) .';
		}
		/* Tagline */
		.header-four .site-branding .site-description {
			color: '. esc_attr( $site_tagline_color ) .';
		}
	';

	# Header Color
	/* Top Header Background */
	$top_header_background_color = get_theme_mod( 'top_header_background_color', '' );
	$top_header_text_color = get_theme_mod( 'top_header_text_color', '#333333' );
	$top_header_text_link_hover_color = get_theme_mod( 'top_header_text_link_hover_color', '#086abd' );
	$css .= '
		.header-four .top-header {
			background-color: '. esc_attr( $top_header_background_color ) .';
		}
	';
	$css .= '
		.header-four .header-navigation ul li a,
		.header-four .social-profile ul li a,
		.header-four .header-contact a {
			color: '. esc_attr( $top_header_text_color ) .';
		}

		.header-four .alt-menu-icon .icon-bar, 
		.header-four .alt-menu-icon .icon-bar:before, 
		.header-four .alt-menu-icon .icon-bar:after {
			background-color: '. esc_attr( $top_header_text_color ) .';
		}

		.header-four .header-navigation ul li a:hover,
		.header-four .header-navigation ul li a:focus,
		.header-four .social-profile ul li a:hover,
		.header-four .social-profile ul li a:focus  {
			color: '. esc_attr( $top_header_text_link_hover_color ) .';
		}
	';
	
	/* Mid Header Background */
	$mid_header_background_color = get_theme_mod( 'mid_header_background_color', '' );
	$mid_header_text_color = get_theme_mod( 'mid_header_text_color', '#333333' );
	$mid_header_text_link_hover_color = get_theme_mod( 'mid_header_text_link_hover_color', '#086abd' );
	$css .= '
		.mid-header .overlay {
			background-color: '. esc_attr( $mid_header_background_color ) .';
		}
	';

	$css .= '
		.mid-header .header-cart a.cart-icon, 
		.mid-header .header-my-account a, 
		.mid-header .header-wishlist a, 
		.mid-header .header-compare a {
			color: '. esc_attr( $mid_header_text_color ) .';
		}
		.header-right .header-svg-icon svg path {
			fill: '. esc_attr( $mid_header_text_color ) .';
		}
		.mid-header .header-cart a.cart-icon:hover, 
		.mid-header .header-cart a.cart-icon:focus, 
		.mid-header .header-cart a.cart-icon:active,
		.header-four .site-branding .site-title a:hover,
		.header-four .site-branding .site-title a:focus,
		.mid-header .header-my-account a:hover, 
		.mid-header .header-my-account a:focus, 
		.mid-header .header-my-account a:active, 
		.mid-header .header-wishlist a:hover, 
		.mid-header .header-wishlist a:focus, 
		.mid-header .header-wishlist a:active, 
		.mid-header .header-compare a:hover,
		.mid-header .header-compare a:focus,
		.mid-header .header-compare a:active {
			color: '. esc_attr( $mid_header_text_link_hover_color ) .';
		}
		.header-right a:hover .header-svg-icon svg path,
		.header-right a:focus .header-svg-icon svg path {
			fill: '. esc_attr( $mid_header_text_link_hover_color ) .';
		}
	';

	# Header Image / Slider
	#Header Image Height
	$header_image_height = get_theme_mod( 'header_image_height', 120 );
	$css .= '
		@media only screen and (min-width: 992px) {
			.site-header:not(.sticky-header) .header-image-wrap {
				height: '. esc_attr( $header_image_height ) .'px;
				width: 100%;
				position: relative;
			}
		}
	';

	$header_woo_cat_menu_bg_color 	 	= get_theme_mod( 'header_woo_cat_menu_bg_color', '#333333' );
	$header_woo_cat_menu_text_color 	= get_theme_mod( 'header_woo_cat_menu_text_color', '#ffffff' );
	$css .= '
		.header-category-nav .navbar-nav > li > a {
			background-color: '. esc_attr( $header_woo_cat_menu_bg_color ) .';
			color: '. esc_attr( $header_woo_cat_menu_text_color ) .';
		}
	';

	/* Bottom Header Background */
	$bottom_header_background_color 	 = get_theme_mod( 'bottom_header_background_color', '' );
	$bottom_header_text_color 			 = get_theme_mod( 'bottom_header_text_color', '#333333' );
	$bottom_header_text_link_hover_color = get_theme_mod( 'bottom_header_text_link_hover_color', '#086abd' );
	$css .= '
		.header-four .bottom-header {
			background-color: '. esc_attr( $bottom_header_background_color ) .';
		}
		.header-four .main-navigation ul.menu > li > a,
		.header-four .header-search-form button.header-search-button {
			color: '. esc_attr( $bottom_header_text_color ) .';
		}
		@media only screen and (min-width: 991px) { 
			.header-four .header-search-form input.header-search-input {
				color: '. esc_attr( $bottom_header_text_color ) .';
			}
			.header-four .header-search-form {
				border-left-color: '. esc_attr( bosa_hex2rgba( $bottom_header_text_color, 0.1 ) ).';
				border-right-color: '. esc_attr( bosa_hex2rgba( $bottom_header_text_color, 0.1 ) ).';
			}
			.header-four .header-search-form input.header-search-input::-webkit-input-placeholder {
			  color: '. esc_attr( bosa_hex2rgba( $bottom_header_text_color, 0.6 ) ).';
			}
			.header-four .header-search-form input.header-search-input::-moz-placeholder {
			  color:'. esc_attr( bosa_hex2rgba( $bottom_header_text_color, 0.6 ) ).';
			}
			.header-four .header-search-form input.header-search-input:-ms-input-placeholder {
			  color: '. esc_attr( bosa_hex2rgba( $bottom_header_text_color, 0.6 ) ).';
			}
			.header-four .header-search-form input.header-search-input:-moz-placeholder {
			  color: '. esc_attr( bosa_hex2rgba( $bottom_header_text_color, 0.6 ) ).';
			}
		}
		.header-category-nav .navbar-nav > li > a:hover, 
		.header-category-nav .navbar-nav > li > a:focus {
			background-color: '. esc_attr( $bottom_header_text_link_hover_color ) .';
		}
		.header-four .main-navigation ul.menu > li:hover > a, 
		.header-four .main-navigation ul.menu > li:focus > a,
		.header-four .header-search-form button.header-search-button:hover,
		.header-four .header-search-form button.header-search-button:focus {
			color: '. esc_attr( $bottom_header_text_link_hover_color ) .';
		}

	';
	$sub_menu_link_hover_color = get_theme_mod( 'sub_menu_link_hover_color', '#086abd' );
	$css .= '
		.header-category-nav .navbar-nav li li a:hover, 
		.header-category-nav .navbar-nav li li a:focus {
			color: '. esc_attr( $sub_menu_link_hover_color ) .';
		}
	';

	$feature_posts_height = get_theme_mod( 'feature_posts_height', 350 );
	$css .= '
		.feature-posts-layout-one .feature-posts-image {
			height: '. esc_attr( $feature_posts_height ) .'px;
			overflow: hidden;
		}
	';

	#Bottom Footer image width
	if( get_theme_mod( 'footer_layout', 'footer_four' ) == 'footer_one' || get_theme_mod( 'footer_layout', 'footer_four' ) == 'footer_two' || get_theme_mod( 'footer_layout', 'footer_four' ) == 'footer_four' ){
		$bottom_footer_image_width = get_theme_mod( 'bottom_footer_image_width', 270 );
		$css .= '
			.bottom-footer-image-wrap > a {
				max-width: '. esc_attr( $bottom_footer_image_width ) .'px;
				overflow: hidden;
				display: inline-block;
			}
		';
	}

	# Footer Border
	if( get_theme_mod( 'disable_footer_border', false ) ){
		$css .= '
			.site-footer-four .social-profile {
				border-bottom: none;
			}
		';
	}

	$site_primary_color = get_theme_mod( 'site_primary_color', '#EB5A3E' );
	$css .= '
		/* Primary Background */
		.header-cart a.cart-icon span.count {
			background-color: '. esc_attr( $site_primary_color ) .';
		}
	';

	# Theme Skins
	# Dark Skin
	if( get_theme_mod( 'skin_select', 'default' ) == 'dark' ){
		$css .= '
			.header-four .header-search-form form,
			.header-search-form input.header-search-input {
				border-color: #1a1a1a;
			}
			body.woocommerce-page select.header-search-select,
			.mid-header .header-cart a.cart-icon, 
			.mid-header .header-my-account a, 
			.mid-header .header-wishlist a, 
			.mid-header .header-compare a,
			.header-four .social-profile ul li a {
				color: #B1B1B1;
			}
			body.woocommerce-page select.header-search-select {
				background-color: transparent;
				border: none;
			}
			.header-cart-block:hover ul.site-header-cart, 
			.header-cart-block:focus ul.site-header-cart, 
			.header-cart-block:active ul.site-header-cart {
				background-color: #080808;
				border-color: #080808;
			}
			.header-cart .widget_shopping_cart .buttons a {
				background-color: #333333;
				color: #ffffff;
			}
			.woocommerce .widget_shopping_cart .total, 
			.woocommerce.widget_shopping_cart .total {
				border-top-color: #1a1a1a;
			}
		';
	}

	// Featured Pages
	$featured_pages_title_color = get_theme_mod( 'featured_pages_title_color', '#1a1a1a' );
	$featured_pages_hover_color = get_theme_mod( 'featured_pages_hover_color', '#086abd' );
	$css .= '
		.feature-pages-content .feature-pages-title {
			color: '. esc_attr( $featured_pages_title_color ) .';
		}
		.feature-pages-content .feature-pages-title a:hover,
		.feature-pages-content .feature-pages-title a:focus {
			color: '. esc_attr( $featured_pages_hover_color ) .';
		}
	';

	$featured_pages_overlay_opacity = get_theme_mod( 'featured_pages_overlay_opacity', 2 );
	$css .= '
		.feature-pages-layout-one .feature-pages-content-wrap .feature-pages-image:before {
		 	background-color: rgba(0, 0, 0, 0.'. esc_attr( $featured_pages_overlay_opacity ) .');
		}
	';

	$featured_pages_height = get_theme_mod( 'featured_pages_height', 250 );
	$css .= '
		.feature-pages-layout-one .feature-pages-image {
			height: '. esc_attr( $featured_pages_height ) .'px;
			overflow: hidden;
		}
	';

	# Featured Page Image Sizes
	#Cover Size
	if( get_theme_mod( 'featured_pages_image_size', 'cover' ) == 'cover' ){
		$css .= '
			.feature-pages-content-wrap .feature-pages-image {
				background-position: center center;
				background-repeat: no-repeat;
				background-size: cover;
			}
		';
	}
	#Repeat Size
	elseif( get_theme_mod( 'featured_pages_image_size', 'cover' ) == 'pattern' ){
		$css .= '
			.feature-pages-content-wrap .feature-pages-image {
				background-position: center center;
				background-repeat: repeat;
				background-size: inherit;
			}
		';
	}
	#Fit Size
	elseif( get_theme_mod( 'featured_pages_image_size', 'cover' ) == 'norepeat' ){
		$css .= '
			.feature-pages-content-wrap .feature-pages-image {
				background-position: center center;
				background-repeat: no-repeat;
				background-size: inherit;
			}
		';
	}

	$featured_pages_radius = get_theme_mod( 'featured_pages_radius', 0 );
	$css .= '
		.feature-pages-content-wrap .feature-pages-image {
			border-radius: '. esc_attr( $featured_pages_radius ) .'px;
			overflow: hidden;
		}
	';

	#Featured Pages Title Alignment
	if( get_theme_mod( 'featured_pages_title_alignment', 'align-center' ) == 'align-bottom' ){
		$css .= '
	    	.feature-pages-layout-one .feature-pages-image {
				-webkit-align-items: flex-end;
	    		-moz-align-items: flex-end;
	    		-ms-align-items: flex-end;
	    		-ms-flex-align: flex-end;
	    		align-items: flex-end;
	    	}
	    	.feature-pages-layout-one .feature-pages-content {
	    		margin-bottom: 20px;
	    	}
		';
	}elseif( get_theme_mod( 'featured_pages_title_alignment', 'align-center' ) == 'align-top' ) {
		$css .= '
			.feature-pages-layout-one .feature-pages-image {
				-webkit-align-items: flex-start;
	    		-moz-align-items: flex-start;
	    		-ms-align-items: flex-start;
	    		-ms-flex-align: flex-start;
	    		align-items: flex-start;
	    	}
	    	.feature-pages-layout-one .feature-pages-content {
	    		margin-top: 20px;
	    	}
		';
	}elseif( get_theme_mod( 'featured_pages_title_alignment', 'align-center' ) == 'align-center' ) {
		$css .= '
			.feature-pages-layout-one .feature-pages-image {
				-webkit-align-items: center;
	    		-moz-align-items: center;
	    		-ms-align-items: center;
	    		-ms-flex-align: center;
	    		align-items: center;
	    	}
		';
	}

	# Responsive Featured Posts / Pages
	if( get_theme_mod( 'disable_mobile_feature_posts', false ) ){
		$css .= '
			@media screen and (max-width: 767px){
				.section-feature-posts-area,
				.section-feature-pages-area {
	    			display: none;
				}
			}
		';
	}

	# Grid Thumbnail post border radius
	$posts_border_radius_thumbnail = get_theme_mod( 'posts_border_radius_thumbnail', 0 );
	if( $posts_border_radius_thumbnail != 0 ){
		$css .= '
			#primary .grid-thumbnail article:not(.sticky).list-post .featured-image a {
	    		border-radius: '. esc_attr( $posts_border_radius_thumbnail ) .'px;
	    	}
	    	.grid-thumbnail article.sticky.list-post {
	    		border-radius: '. esc_attr( $posts_border_radius_thumbnail ) .'px;
	    	}
		';
	}

	#Featured Posts Two color
	$feature_posts_two_title_color 		= get_theme_mod( 'feature_posts_two_title_color', '#FFFFFF' );
	$feature_posts_two_category_bgcolor = get_theme_mod( 'feature_posts_two_category_bgcolor', '#EB5A3E' );
	$feature_posts_two_category_color 	= get_theme_mod( 'feature_posts_two_category_color', '#FFFFFF' );
	$feature_posts_two_meta_color 		= get_theme_mod( 'feature_posts_two_meta_color', '#FFFFFF' );
	$feature_posts_two_meta_icon_color 	= get_theme_mod( 'feature_posts_two_meta_icon_color', '#FFFFFF' );
	$feature_posts_two_hover_color 		= get_theme_mod( 'feature_posts_two_hover_color', '#a8d8ff' );
	$css .= '
		.section-feature-posts-two-area .feature-posts-content .feature-posts-title {
			color: '. esc_attr( $feature_posts_two_title_color ) .';
		}
		.section-feature-posts-two-area .feature-posts-content .feature-posts-title a:hover,
		.section-feature-posts-two-area .feature-posts-content .feature-posts-title a:focus {
			color: '. esc_attr( $feature_posts_two_hover_color ) .';
		}
		.section-feature-posts-two-area .feature-posts-content .cat-links a {
			background-color: '. esc_attr( $feature_posts_two_category_bgcolor ) .';
			color: '. esc_attr( $feature_posts_two_category_color) .';
		}
		.section-feature-posts-two-area .feature-posts-content .cat-links a:hover,
		.section-feature-posts-two-area .feature-posts-content .cat-links a:focus {
			background-color: '. esc_attr( $feature_posts_two_hover_color ) .';
			color: #FFFFFF;
		}
		.section-feature-posts-two-area .feature-posts-content .entry-meta a {
			color: '. esc_attr( $feature_posts_two_meta_color ) .';
		}
		.section-feature-posts-two-area .feature-posts-content .entry-meta a:before {
			color: '. esc_attr( $feature_posts_two_meta_icon_color ) .';
		}
		.section-feature-posts-two-area .feature-posts-content .entry-meta a:hover,
		.section-feature-posts-two-area .feature-posts-content .entry-meta a:focus,
		.section-feature-posts-two-area .feature-posts-content .entry-meta a:hover:before,
		.section-feature-posts-two-area .feature-posts-content .entry-meta a:focus:before {
			color: '. esc_attr( $feature_posts_two_hover_color ) .';
		}
	';

	# Featured Posts Overlay Opacity
	$feature_posts_two_overlay_opacity = get_theme_mod( 'feature_posts_two_overlay_opacity', 4 );
	$css .= '
		.section-feature-posts-two-area .feature-posts-image:before {
		 	background-color: rgba(0, 0, 0, 0.'. esc_attr( $feature_posts_two_overlay_opacity ) .');
		}
	';

	# Featured Posts Two Image Sizes
	#Cover Size
	if( get_theme_mod( 'feature_posts_two_image_size', 'cover' ) == 'cover' ){
		$css .= '
			.section-feature-posts-two-area .feature-posts-image {
				background-position: center center;
				background-repeat: no-repeat;
				background-size: cover;
			}
		';
	}
	#Repeat Size
	elseif( get_theme_mod( 'feature_posts_two_image_size', 'cover' ) == 'pattern' ){
		$css .= '
			.section-feature-posts-two-area .feature-posts-image {
				background-position: center center;
				background-repeat: repeat;
				background-size: inherit;
			}
		';
	}
	#Fit Size
	elseif( get_theme_mod( 'feature_posts_two_image_size', 'cover' ) == 'norepeat' ){
		$css .= '
			.section-feature-posts-two-area .feature-posts-image {
				background-position: center center;
				background-repeat: no-repeat;
				background-size: inherit;
			}
		';
	}

	# Featured Posts Two Border Radius
	$feature_posts_two_radius = get_theme_mod( 'feature_posts_two_radius', 0 );
	$css .= '
		.section-feature-posts-two-area .feature-posts-image {
    		border-radius: '. esc_attr( $feature_posts_two_radius ) .'px;
    		overflow: hidden;
    	}
	';

	#Featured Posts Two Content Alignment
	if( get_theme_mod( 'feature_posts_two_vertical_title_alignment', 'align-bottom' ) == 'align-bottom' ){
		$css .= '
	    	.section-feature-posts-two-area .feature-posts-image {
				-webkit-align-items: flex-end;
	    		-moz-align-items: flex-end;
	    		-ms-align-items: flex-end;
	    		-ms-flex-align: flex-end;
	    		align-items: flex-end;
	    	}
	    	.section-feature-posts-two-area .feature-posts-content {
	    		margin-bottom: 20px;
	    	}
		';
	}elseif( get_theme_mod( 'feature_posts_two_vertical_title_alignment', 'align-bottom' ) == 'align-top' ) {
		$css .= '
			.section-feature-posts-two-area .feature-posts-image {
				-webkit-align-items: flex-start;
	    		-moz-align-items: flex-start;
	    		-ms-align-items: flex-start;
	    		-ms-flex-align: flex-start;
	    		align-items: flex-start;
	    	}
	    	.section-feature-posts-two-area .feature-posts-content {
	    		margin-top: 20px;
	    	}
		';
	}elseif( get_theme_mod( 'feature_posts_two_vertical_title_alignment', 'align-bottom' ) == 'align-center' ) {
		$css .= '
			.section-feature-posts-two-area .feature-posts-image {
				-webkit-align-items: center;
	    		-moz-align-items: center;
	    		-ms-align-items: center;
	    		-ms-flex-align: center;
	    		align-items: center;
	    	}
		';
	}

	# Responsive Featured Posts Two
	if( get_theme_mod( 'disable_mobile_feature_posts_two', false ) ){
		$css .= '
			@media screen and (max-width: 767px){
				.section-feature-posts-two-area {
	    			display: none;
				}
			}
		';
	}

	# Responsive Blog Advert
	if( get_theme_mod( 'disable_mobile_blog_advertisement_banner', false ) ){
		$css .= '
			@media screen and (max-width: 767px){
				.section-advert {
	    			display: none;
				}
			}
		';
	}

	# Responsive Services
	if( get_theme_mod( 'disable_mobile_services', false ) ){
		$css .= '
			@media screen and (max-width: 767px){
				.section-services-area {
	    			display: none;
				}
			}
		';
	}

	# Responsive Team
	if( get_theme_mod( 'disable_mobile_team', false ) ){
		$css .= '
			@media screen and (max-width: 767px){
				.section-teams-area {
	    			display: none;
				}
			}
		';
	}
	
	// End Style
	$css .= '</style>';

	// return generated & compressed CSS
	echo str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css); 
}
add_action( 'wp_head', 'bosa_ecommerce_shop_default_styles', 99 );