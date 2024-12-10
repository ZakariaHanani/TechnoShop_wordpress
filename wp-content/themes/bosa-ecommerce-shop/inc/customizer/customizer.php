<?php
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
add_action( 'customize_preview_init', 'bosa_ecommerce_shop_customize_preview_js', 999, 1 );

function bosa_ecommerce_shop_customize_preview_js() {
	wp_enqueue_script( 'bosa-ecommerce-shop-customizer', get_stylesheet_directory_uri() . '/inc/customizer/customizer.js', array( 'customize-preview' ) );
}

function bosa_ecommerce_shop_customize_getting_js() {
	wp_dequeue_script( 'bosa-customizer-getting-started' );
	wp_enqueue_script( 'bosa-ecommerce-shop-customizer-getting-started', get_stylesheet_directory_uri() . '/inc/getting-started/getting-started.js', array( 'customize-controls', 'jquery' ), true );

	wp_enqueue_style( 'bosa-ecommerce-shop-customize-controls', get_stylesheet_directory_uri() . '/inc/customizer/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'bosa_ecommerce_shop_customize_getting_js', 99 );

/**
 * Kirki Customizer
 *
 * @return void
 */
add_action( 'init' , 'bosa_ecommerce_shop_kirki_fields', 999, 1 );

function bosa_ecommerce_shop_kirki_fields(){

	/**
	* If kirki is not installed do not run the kirki fields
	*/

	if ( !class_exists( 'Kirki' ) ) {
		return;
	}

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Site Title', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'site_title_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '25px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.2',
		),
		'priority'	  =>  10,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.site-header .site-branding .site-title',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Site Description', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'site_description_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'regular',
			'font-size'      => '14px',
			'text-transform' => 'none',
		),
		'priority'	  =>  20,
		'transport'   => 'auto',
		'output'   => array(
			array(
				'element' => '.site-header .site-branding .site-description',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Category Menu', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'woo_cat_menu_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Jost',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'variant'        => '500',
			'line-height'    => '1.5',
		),
		'priority'	  =>  25,
		'transport'   => 'auto',
		'output'   => array(
			array(
				'element' => array( '.header-category-nav ul li a' )
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
			array(
				'setting'  => 'disable_header_woo_cat_menu',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Main Menu', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_menu_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Jost',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'variant'        => '500',
			'line-height'    => '1.5',
		),
		'priority'	  =>  30,
		'transport'   => 'auto',
		'output'   => array(
			array(
				'element' => array( '.main-navigation ul.menu li a', '.slicknav_menu .slicknav_nav li a' )
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Main Menu Description', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_menu_description_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Poppins',
			'font-size'      => '11px',
			'text-transform' => 'none',
			'variant'        => 'regular',
			'line-height'    => '1.3',
		),
		'priority'	  =>  50,
		'transport'   => 'auto',
		'output'   => array(
			array(
				'element' => array( '.main-navigation .menu-description, .slicknav_menu .menu-description' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Body', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'body_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'regular',
			'font-size'      => '14px',
		),
		'priority'	  =>  60,
		'transport'   => 'auto',
		'output' => array( 
			array(
				'element' => 'body',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'General Title (H1 - H6)', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'general_title_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'text-transform' => 'none',
		),
		'priority'	  =>  70,
		'transport'   => 'auto',
		'output'   => array(
			array(
				'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'span.woocommerce-Price-amount.amount', '.button-primary', '.button-outline', '.button-text', 'button', '.woocommerce a.added_to_cart', 'body.woocommerce a.button', 'input[type="submit"]', '.product-title' ),
			),
		),	
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Page & Single Post Title', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'page_title_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '42px',
			'text-transform' => 'none',
		),
		'priority'	  =>  80,
		'transport'   => 'auto',
		'output'   => array(
			array(
				'element' => array( '.page-title' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_slider_title_font_control',
		'section'      => 'main_slider_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '52px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.2',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-banner .banner-content .entry-title',
			),
		),
		'priority'	  =>  260,
		'active_callback' => array(
			array(
			'setting'  => 'hide_slider_title',
			'operator' => '==',
			'value'    => false,
			),
			array(
			'setting'  => 'main_slider_controls',
			'operator' => '==',
			'value'    => 'slider',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Category Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_slider_cat_font_control',
		'section'      => 'main_slider_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '15px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.6',
		),
		'priority'	  =>  280,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-banner .banner-content .entry-header .cat-links a',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'main_slider_controls',
				'operator' => '==',
				'value'    => 'slider',
			),
			array(
				'setting'  => 'hide_slider_category',
				'operator' => '==',
				'value'    => false,
				),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Meta Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_slider_meta_font_control',
		'section'      => 'main_slider_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.6',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-banner .banner-content .entry-meta a',
			),
		),
		'priority'	  =>  320,
		'active_callback' => array(
			array(
				'setting'  => 'main_slider_controls',
				'operator' => '==',
				'value'    => 'slider',
			),
			array(
				array(
				'setting'  => 'hide_slider_date',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_slider_author',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_slider_comment',
				'operator' => '==',
				'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Excerpt Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_slider_excerpt_font_control',
		'section'      => 'main_slider_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'regular',
			'font-size'      => '15px',
			'text-transform' => 'initial',
			'line-height'    => '1.8',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-banner .banner-content .entry-text p',
			),
		),
		'priority'	  =>  340,
		'active_callback' => array(
			array(
				'setting'  => 'main_slider_controls',
				'operator' => '==',
				'value'    => 'slider',
			),
			array(
				'setting'  => 'hide_slider_excerpt',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Slider Button Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_slider_button_font_control',
		'section'      => 'main_slider_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '400',
			'font-size'      => '14px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.4',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-banner .slide-inner .banner-content .button-container a',
			),
		),
		'priority'	  =>  380,
		'active_callback' => array(
			array(
				'setting'  => 'main_slider_controls',
				'operator' => '==',
				'value'    => 'slider',
			),
			array(
				'setting'  => 'hide_slider_button',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Content Alignment', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'main_slider_content_alignment',
		'section'     => 'main_slider_options',
		'default'     => 'left',
		'choices'  => array(
			'center' => esc_html__( 'Center', 'bosa-ecommerce-shop' ),
			'left'   => esc_html__( 'Left', 'bosa-ecommerce-shop' ),
			'right'  => esc_html__( 'Right', 'bosa-ecommerce-shop' ),
		),
		'priority'	  =>  180,
		'active_callback' => array(
			array(
				'setting'  => 'main_slider_controls',
				'operator' => '==',
				'value'    => 'slider',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'latest_posts_section_title_font_control',
		'section'      => 'latest_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '36px',
			'text-transform' => 'none',
			'line-height'    => '1.2',
		),
		'priority'	  =>  40,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-post-area .section-title-wrap .section-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_latest_posts_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Description Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'latest_posts_section_description_font_control',
		'section'      => 'latest_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'regular',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'line-height'    => '1.8',
		),
		'priority'	  =>  70,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-post-area .section-title-wrap p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_latest_posts_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'blog_post_title_font_control',
		'section'      => 'blog_page_style_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '22px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.4',
		),
		'priority'    => 120,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '#primary article .entry-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hide_post_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Category Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'blog_post_cat_font_control',
		'section'      => 'blog_page_style_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'uppercase',
			'line-height'    => '1',
		),
		'priority'    => 140,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '#primary .post .entry-content .entry-header .cat-links a',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hide_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Meta Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'blog_post_meta_font_control',
		'section'      => 'blog_page_style_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.6',
		),
		'priority'    => 180,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '#primary .entry-meta',
			),
		),
		'active_callback' => array(
			array(
				array(
				'setting'  => 'hide_date',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_author',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_comment',
				'operator' => '==',
				'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Excerpt Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'blog_post_excerpt_font_control',
		'section'      => 'blog_page_style_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '15px',
			'text-transform' => 'initial',
			'line-height'    => '1.8',
		),
		'priority'    => 200,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '#primary .entry-text p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hide_blog_page_excerpt',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'highlight_posts_section_title_font_control',
		'section'      => 'highlight_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '36px',
			'text-transform' => 'none',
			'line-height'    => '1.2',
		),
		'priority'	  =>  40,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-highlight-post .section-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_highlight_posts_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Description Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'highlight_posts_section_description_font_control',
		'section'      => 'highlight_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'regular',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'line-height'    => '1.8',
		),
		'priority'	  =>  70,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-highlight-post .section-title-wrap p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_highlight_posts_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'highlight_posts_title_font_control',
		'section'      => 'highlight_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '20px',
			'text-transform' => 'none',
			'line-height'    => '1.4',
		),
		'priority'	  => 280,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.highlight-post-slider .post .entry-content .entry-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hide_highlight_posts_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Category Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'highlight_posts_cat_font_control',
		'section'      => 'highlight_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1',
		),
		'priority'	  => 260,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.highlight-post-slider .post .cat-links a',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hide_highlight_posts_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Meta Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'highlight_posts_meta_font_control',
		'section'      => 'highlight_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.6',
		),
		'priority'	  => 320,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.highlight-post-slider .post .entry-meta a',
			),
		),
		'active_callback' => array(
			array(
				array(
				'setting'  => 'hide_highlight_posts_date',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_highlight_posts_author',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_highlight_posts_comment',
				'operator' => '==',
				'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Widget Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'sidebar_widget_title_font_control',
		'section'      => 'sidebar_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '18px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.4',
		),
		'priority'	  =>  20,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.sidebar .widget .widget-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'sidebar_settings',
				'operator' => 'contains',
				'value'    => array( 'right', 'left', 'right-left' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Widget Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'footer_widget_title_font_control',
		'section'      => 'footer_widgets_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '20px',
			'text-transform' => 'none',
			'line-height'    => '1.4',
		),
		'priority'	  =>  120,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.site-footer .widget .widget-title',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Header Layouts', 'bosa-ecommerce-shop' ),
		'description' => esc_html__( 'Select layout & scroll below to change its options', 'bosa-ecommerce-shop' ),
		'type'        => 'radio-image',
		'settings'    => 'header_layout',
		'section'     => 'header_style_options',
		'default'     => 'header_four',
		'priority'	  => '40',
		'choices'     => apply_filters( 'bosa_header_layout_filter', array(
			'header_one'    => get_template_directory_uri() . '/assets/images/header-layout-1.png',
			'header_two'    => get_template_directory_uri() . '/assets/images/header-layout-2.png',
			'header_three'  => get_template_directory_uri() . '/assets/images/header-layout-3.png',
		) ),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Top Header Section', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_top_header_section',
		'section'      => 'header_style_options',
		'default'      => false,
		'priority'	   => '50',
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Advertisement Banner', 'bosa-ecommerce-shop' ),
		'description'  => esc_html__( 'Image dimensions 555 by 68 pixels is recommended.', 'bosa-ecommerce-shop' ),
		'type'         => 'image',
		'settings'     => 'header_advertisement_banner',
		'section'      => 'header_style_options',
		'default'      => '',
		'priority'	   => '222',
		'choices'     => array(
			'save_as' => 'id',
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Choose Image Size', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'render_header_ad_image_size',
		'section'     => 'header_style_options',
		'default'     => 'full',
		'placeholder' => esc_html__( 'Select Image Size', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_get_intermediate_image_sizes(),
		'priority'	   => '223',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Advertisement Banner Link', 'bosa-ecommerce-shop' ),
		'type'     => 'link',
		'settings' => 'header_advertisement_banner_link',
		'section'  => 'header_style_options',
		'default'  => '#',
		'priority' => '224',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Non Transparent Mid Header Background Color', 'bosa-ecommerce-shop' ),
		'description'  => esc_html__( 'It can be used as a transparent background color over image.', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'mid_header_background_color',
		'section'      => 'header_style_options',
		'default'      => '',
		'priority'	   => '230',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_three', 'header_four' ),
			),
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Non Transparent Mid Header Text Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'mid_header_text_color',
		'section'      => 'header_style_options',
		'default'      => '#333333',
		'priority'	   => '235',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Non Transparent Mid Header Text Link Hover Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'mid_header_text_link_hover_color',
		'section'      => 'header_style_options',
		'default'      => '#086abd',
		'priority'	  =>  '240',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_three', 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Mid Header Section Border', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mid_header_border',
		'section'      => 'header_style_options',
		'default'      => false,
		'priority'	   => '250',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_three', 'header_four' ),
			),
		),
	) );

	// WooCommerce Cat Menu Options
	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Category Menu', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_header_woo_cat_menu',
		'section'      => 'header_style_options',
		'default'      => false,
		'priority'	   => 252,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Category Menu Background Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'header_woo_cat_menu_bg_color',
		'section'      => 'header_style_options',
		'default'      => '#333333',
		'priority'	   => 254,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
			array(
				'setting'  => 'disable_header_woo_cat_menu',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Category Menu Text Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'header_woo_cat_menu_text_color',
		'section'      => 'header_style_options',
		'default'      => '#ffffff',
		'priority'	   => 256,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
			array(
				'setting'  => 'disable_header_woo_cat_menu',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Header Height (in px)', 'bosa-ecommerce-shop' ),
		'description' => esc_html__( 'This option will only apply to Desktop. Please click on below Desktop Icon to see changes. Automatically adjust by theme default in the responsive devices.
		', 'bosa-ecommerce-shop' ),
		'type'        => 'slider',
		'settings'    => 'header_image_height',
		'section'     => 'header_style_options',
		'transport'   => 'postMessage',
		'default'     => 120,
		'priority'	  => '300',
		'choices'     => array(
			'min'  => 50,
			'max'  => 1200,
			'step' => 10,
		),
	) );

	// Contact Detail Options
	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Contact Details', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_contact_detail',
		'section'      => 'header_style_options',
		'default'      => false,
		'priority'	   => '320',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_one', 'header_two', 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Phone Number', 'bosa-ecommerce-shop' ),
		'type'         => 'text',
		'settings'     => 'contact_phone',
		'section'      => 'header_style_options',
		'default'      => '',
		'priority'	   => '330',
		'active_callback' => array(
			array(
				'setting'  => 'disable_contact_detail',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_one', 'header_two', 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable WooCommerce Compare', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_woocommerce_compare',
		'section'      => 'header_style_options',
		'default'      => false,
		'priority'	   => '430',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Disable WooCommerce Wishlist', 'bosa-ecommerce-shop' ),
		'type'     => 'checkbox',
		'settings' => 'disable_woocommerce_wishlist',
		'section'  => 'header_style_options',
		'default'  => false,
		'priority'	   => '440',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Disable WooCommerce My Account', 'bosa-ecommerce-shop' ),
		'type'     => 'checkbox',
		'settings' => 'disable_woocommerce_account',
		'section'  => 'header_style_options',
		'default'  => false,
		'priority'	   => '450',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Disable WooCommerce Cart', 'bosa-ecommerce-shop' ),
		'type'     => 'checkbox',
		'settings' => 'disable_woocommerce_cart',
		'section'  => 'header_style_options',
		'default'  => false,
		'priority'	   => '460',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Mid Header Section Border', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_mid_header_border',
		'section'      => 'header_responsive',
		'default'      => false,
		'priority'	   =>  50,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_one', 'header_three', 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Category Menu', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_header_woo_cat_menu',
		'section'      => 'header_responsive',
		'default'      => false,
		'priority'	   => 52,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
			array(
				'setting'  => 'disable_header_woo_cat_menu',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Header Advertisement Banner', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'disable_mobile_ad_banner',
		'section'     => 'header_responsive',
		'default'     => false,
		'priority'	  =>  65,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
			array(
				'setting'  => 'disable_mobile_top_header',
				'operator' => '=',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Header Secondary Menu', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'disable_secondary_menu',
		'section'     => 'header_responsive',
		'default'     => false,
		'priority'	  =>  70,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_three', 'header_four' ),
			),
			array(
				'setting'  => 'disable_mobile_top_header',
				'operator' => '=',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Footer Layouts', 'bosa-ecommerce-shop' ),
		'type'        => 'radio-image',
		'settings'    => 'footer_layout',
		'section'     => 'footer_style_options',
		'default'     => 'footer_four',
		'choices'  => apply_filters( 'bosa_footer_layout_filter', array(
			'footer_one'   => get_template_directory_uri() . '/assets/images/footer-layout-1.png',
			'footer_two'   => get_template_directory_uri() . '/assets/images/footer-layout-2.png',
			'footer_three' => get_template_directory_uri() . '/assets/images/footer-layout-3.png',
		) ),
		'priority'	   => 20,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Bottom Footer Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'footer_style_font_control',
		'section'      => 'footer_style_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '500',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'line-height'    => '1.6',
		),
		'priority'	   => 90,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => array( '.site-footer .site-info', '.site-footer .footer-menu ul li a' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Select Image', 'bosa-ecommerce-shop' ),
		'type'         => 'image',
		'settings'     => 'bottom_footer_image',
		'section'      => 'footer_style_options',
		'default'      => '',
		'choices'     => array(
			'save_as' => 'id',
		),
		'priority'	   => 100,
		'active_callback' => array(
			array(
				'setting'  => 'footer_layout',
				'operator' => 'contains',
				'value'    => array( 'footer_one', 'footer_two', 'footer_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Image Link', 'bosa-ecommerce-shop' ),
		'type'     => 'link',
		'settings' => 'bottom_footer_image_link',
		'section'  => 'footer_style_options',
		'default'  => '',
		'priority'	   => 110,
		'active_callback' => array(
			array(
				'setting'  => 'footer_layout',
				'operator' => 'contains',
				'value'    => array( 'footer_one', 'footer_two', 'footer_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Image Target', 'bosa-ecommerce-shop' ),
		'description' => esc_html__( 'If enabled, the page will be open in an another browser tab.', 'bosa-ecommerce-shop' ),
		'type'     => 'checkbox',
		'settings' => 'bottom_footer_image_target',
		'section'  => 'footer_style_options',
		'default'  => true,
		'priority'	   => 120,
		'active_callback' => array(
			array(
				'setting'  => 'footer_layout',
				'operator' => 'contains',
				'value'    => array( 'footer_one', 'footer_two', 'footer_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Image Width', 'bosa-ecommerce-shop' ),
		'type'         => 'slider',
		'settings'     => 'bottom_footer_image_width',
		'section'      => 'footer_style_options',
		'transport'    => 'postMessage',
		'default'      => 270,
		'choices'      => array(
			'min'  => 10,
			'max'  => 1140,
			'step' => 5,
		),
		'priority'	   => 130,
		'active_callback' => array(
			array(
				'setting'  => 'footer_layout',
				'operator' => 'contains',
				'value'    => array( 'footer_one', 'footer_two', 'footer_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Section Border', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_footer_border',
		'section'      => 'footer_style_options',
		'default'      => false,
		'priority'	   => 145,
		'active_callback' => array(
			array(
				'setting'  => 'footer_layout',
				'operator' => 'contains',
				'value'    => array( 'footer_four' ),
			),
		),
	) );

	// Featured Posts / Pages Options
	Kirki::add_section( 'feature_posts_options', array(
	    'title'          => esc_html__( 'Featured Posts / Pages', 'bosa-ecommerce-shop' ),
	    'panel'          => 'blog_homepage_options',
	    'capability'     => 'edit_theme_options',
	    'priority'       => '20',
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Featured Posts / Pages', 'bosa-ecommerce-shop' ),
		'type'        => 'radio-buttonset',
		'settings'    => 'feature_posts_pages_tab',
		'section'     => 'feature_posts_options',
		'default'     => 'featured_posts',
		'priority'    => '9',
		'choices'  => array(
			'featured_posts' => esc_html__( 'Featured Posts', 'bosa-ecommerce-shop' ),
			'featured_pages' => esc_html__( 'Featured Pages', 'bosa-ecommerce-shop' ),
		)
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Featured Posts Section', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_feature_posts_section',
		'section'      => 'feature_posts_options',
		'default'      => false,
		'priority'	   =>  10,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Section Title', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_feature_posts_section_title',
		'section'      => 'feature_posts_options',
		'default'      => true,
		'priority'	   =>  20,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Title', 'bosa-ecommerce-shop' ),
		'type'        => 'text',
		'settings'    => 'feature_posts_section_title',
		'section'     => 'feature_posts_options',
		'default'     => '',
		'priority'	  =>  30,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'disable_feature_posts_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_section_title_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '36px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.2',
		),
		'priority'	  =>  40,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-area .section-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'disable_feature_posts_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Section Description', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_feature_posts_section_description',
		'section'      => 'feature_posts_options',
		'default'      => true,
		'priority'	  =>  50,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Description', 'bosa-ecommerce-shop' ),
		'type'        => 'text',
		'settings'    => 'feature_posts_section_description',
		'section'     => 'feature_posts_options',
		'default'     => '',
		'priority'	  =>  60,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'disable_feature_posts_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Description Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_section_description_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'regular',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'line-height'    => '1.8',
		),
		'priority'	  =>  70,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-area .section-title-wrap p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'disable_feature_posts_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Title and Description Alignment', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_section_title_desc_alignment',
		'section'     => 'feature_posts_options',
		'default'     => 'left',
		'choices'     => array(
			'left'	 	=> esc_html__( 'Left', 'bosa-ecommerce-shop' ),
			'center'  	=> esc_html__( 'Center', 'bosa-ecommerce-shop' ),   
			'right'		=> esc_html__( 'Right', 'bosa-ecommerce-shop' ),
		),
		'priority'	  =>  80,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				array(
					'setting'  => 'disable_feature_posts_section_title',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'disable_feature_posts_section_description',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Layout', 'bosa-ecommerce-shop' ),
		'description' => esc_html__( 'Select layout & scroll below to change its options', 'bosa-ecommerce-shop' ),
		'type'        => 'radio-image',
		'settings'    => 'feature_posts_section_layouts',
		'section'     => 'feature_posts_options',
		'default'     => 'feature_one',
		'choices'     => apply_filters( 'bosa_feature_posts_section_layouts_filter', array(
			'feature_one'    => get_template_directory_uri() . '/assets/images/feature-post-layout-1.png',
		) ),
		'priority'	  =>  90,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Title Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'featured_post_title_color',
		'section'      => 'feature_posts_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  100,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				'setting'  => 'disable_feature_posts_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Category Background Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'featured_post_category_bgcolor',
		'section'      => 'feature_posts_options',
		'default'      => '#EB5A3E',
		'priority'	   =>  110,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'feature_posts_section_layouts',
				'operator' => '==',
				'value'    => 'feature_one',
			),
			array(
				'setting'  => 'hide_featured_posts_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Category Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'featured_post_category_color',
		'section'      => 'feature_posts_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  120,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				'setting'  => 'hide_featured_posts_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Meta Text Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'featured_post_meta_color',
		'section'      => 'feature_posts_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  130,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				array(
					'setting'  => 'hide_featured_posts_date',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_featured_posts_author',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_featured_posts_comment',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Meta Icon Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'featured_post_meta_icon_color',
		'section'      => 'feature_posts_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  140,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				array(
					'setting'  => 'hide_featured_posts_date',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_featured_posts_author',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_featured_posts_comment',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Hover Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'featured_post_hover_color',
		'section'      => 'feature_posts_options',
		'default'      => '#a8d8ff',
		'priority'	   =>  150,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );


	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Columns', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_columns',
		'section'     => 'feature_posts_options',
		'default'     => 'three_columns',
		'placeholder' => esc_attr__( 'Select category', 'bosa-ecommerce-shop' ),
		'choices'  => array(
			'one_column'    => esc_html__( '1 Column', 'bosa-ecommerce-shop' ),
			'two_columns'   => esc_html__( '2 Columns', 'bosa-ecommerce-shop' ),
			'three_columns' => esc_html__( '3 Columns', 'bosa-ecommerce-shop' ),
			'four_columns'  => esc_html__( '4 Columns', 'bosa-ecommerce-shop' ),
		),
		'priority'	  =>  160,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Choose Category', 'bosa-ecommerce-shop' ),
		'description' => esc_html__( 'Recent posts will show if any category is not chosen.', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_category',
		'section'     => 'feature_posts_options',
		'default'     => '',
		'placeholder' => esc_html__( 'Select category', 'bosa-ecommerce-shop' ), 
		'choices'     => bosa_get_post_categories(),
		'priority'	  =>  170,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Featured Posts Overlay Opacity', 'bosa-ecommerce-shop' ),
		'type'        => 'number',
		'settings'    => 'feature_posts_overlay_opacity',
		'section'     => 'feature_posts_options',
		'default'     => 4,
		'choices' => array(
			'min' => '0',
			'max' => '9',
			'step' => '1',
		),
		'priority'	  =>  180,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post View Number', 'bosa-ecommerce-shop' ),
		'description'  => esc_html__( 'Number of posts to show.', 'bosa-ecommerce-shop' ),
		'type'         => 'number',
		'settings'     => 'feature_posts_posts_number',
		'section'      => 'feature_posts_options',
		'default'      => 6,
		'choices' => array(
			'min' => '1',
			'max' => '48',
			'step' => '1',
		),
		'priority'	  =>  190,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Height (in px)', 'bosa-ecommerce-shop' ),
		'description'  => esc_html__( 'This option will only apply to Desktop. Please click on below Desktop Icon to see changes. Automatically adjust by theme default in the responsive devices.
		', 'bosa-ecommerce-shop' ),
		'type'         => 'slider',
		'settings'     => 'feature_posts_height',
		'section'      => 'feature_posts_options',
		'transport'    => 'postMessage',
		'default'      => 350,
		'choices' => array(
			'min' => '100',
			'max' => '1200',
			'step' => '10',
		),
		'priority'	  =>  200,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'feature_posts_section_layouts',
				'operator' => 'contains',
				'value'    => array( 'feature_one' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Choose Image Size', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'render_feature_post_image_size',
		'section'     => 'feature_posts_options',
		'default'     => 'bosa-420-300',
		'placeholder' => esc_html__( 'Select Image Size', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_get_intermediate_image_sizes(),
		'priority'	  =>  210,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'feature_posts_section_layouts',
				'operator' => 'contains',
				'value'    => array( 'feature_one' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Background Image Size', 'bosa-ecommerce-shop' ),
		'type'         => 'radio',
		'settings'     => 'feature_posts_image_size',
		'section'      => 'feature_posts_options',
		'default'      => 'cover',
		'choices'      => array(
			'cover'    => esc_html__( 'Cover', 'bosa-ecommerce-shop' ),
			'pattern'  => esc_html__( 'Pattern / Repeat', 'bosa-ecommerce-shop' ),
			'norepeat' => esc_html__( 'No Repeat', 'bosa-ecommerce-shop' ),
		),
		'priority'	   =>  220,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'feature_posts_section_layouts',
				'operator' => 'contains',
				'value'    => array( 'feature_one' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Posts Border Radius (px)', 'bosa-ecommerce-shop' ),
		'type'        => 'slider',
		'settings'    => 'feature_posts_radius',
		'section'     => 'feature_posts_options',
		'transport'	  => 'postMessage', 
		'default'     =>  0,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'priority'	  =>  230,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Post Text Alignment', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_text_alignment',
		'section'     => 'feature_posts_options',
		'default'     => 'text-left',
		'choices'     => array(
			'text-left'	 	=> esc_html__( 'Left', 'bosa-ecommerce-shop' ),
			'text-center'  	=> esc_html__( 'Center', 'bosa-ecommerce-shop' ),   
			'text-right'	=> esc_html__( 'Right', 'bosa-ecommerce-shop' ),
		),
		'priority'	  =>  240,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'feature_posts_section_layouts',
				'operator' => 'contains',
				'value'    => array( 'feature_one' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Post Content Alignment', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_title_alignment',
		'section'     => 'feature_posts_options',
		'default'     => 'align-bottom',
		'choices'     => array(
			'align-top'	 	=> esc_html__( 'Top', 'bosa-ecommerce-shop' ),
			'align-center'  => esc_html__( 'Center', 'bosa-ecommerce-shop' ),   
			'align-bottom'  => esc_html__( 'Bottom', 'bosa-ecommerce-shop' ),
		),
		'priority'	  =>  250,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'feature_posts_section_layouts',
				'operator' => 'contains',
				'value'    => array( 'feature_one' ),
			),
		),
	) ); 

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Post Title', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'disable_feature_posts_title',
		'section'     => 'feature_posts_options',
		'default'     => false,
		'priority'	  =>  260,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '18px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.4',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.feature-posts-content-wrap .feature-posts-content .feature-posts-title',
			),
		),
		'priority'	  =>  270,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'disable_feature_posts_title',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'feature_posts_section_layouts',
				'operator' => 'contains',
				'value'    => array( 'feature_one' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Post Title Divider', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'disable_feature_title_divider',
		'section'     => 'feature_posts_options',
		'default'     => false,
		'priority'	  =>  280,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'disable_feature_posts_title',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'disable_feature_posts_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Posts category', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_featured_posts_category',
		'section'     => 'feature_posts_options',
		'default'     => false,
		'priority'	  =>  290,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Category Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'featured_posts_cat_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'uppercase',
			'line-height'    => '1',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.post .feature-posts-content .cat-links a',
			),
		),
		'priority'	  =>  300,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				'setting'  => 'hide_featured_posts_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Post Date', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_featured_posts_date',
		'section'     => 'feature_posts_options',
		'default'     => false,
		'priority'	  =>  310,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Post Author', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_featured_posts_author',
		'section'     => 'feature_posts_options',
		'default'     => false,
		'priority'	  =>  320,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Post Comment', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_featured_posts_comment',
		'section'     => 'feature_posts_options',
		'default'     => false,
		'priority'	  =>  330,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Meta Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'featured_posts_meta_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.6',
		),
		'priority'	  =>  340,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.post .feature-posts-content .entry-meta a',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_posts',
			),
			array(
				array(
				'setting'  => 'hide_featured_posts_date',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_featured_posts_author',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_featured_posts_comment',
				'operator' => '==',
				'value'    => false,
				),
			),
		),
	) );

	// featured pages
	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Featured Pages Section', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_featured_pages_section',
		'section'      => 'feature_posts_options',
		'default'      => false,
		'priority'	   => 350,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Section Title', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_featured_pages_section_title',
		'section'      => 'feature_posts_options',
		'default'      => true,
		'priority'	   => 360,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Title', 'bosa-ecommerce-shop' ),
		'type'        => 'text',
		'settings'    => 'featured_pages_section_title',
		'section'     => 'feature_posts_options',
		'default'     => '',
		'priority'	   => 370,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'disable_featured_pages_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'featured_pages_section_title_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '600',
			'font-size'      => '36px',
			'text-transform' => 'none',
			'line-height'    => '1.2',
		),
		'priority'	   => 380,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-pages-area .section-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'disable_featured_pages_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Section Description', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_featured_pages_section_description',
		'section'      => 'feature_posts_options',
		'default'      => true,
		'priority'	   => 390,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Description', 'bosa-ecommerce-shop' ),
		'type'        => 'text',
		'settings'    => 'featured_pages_section_description',
		'section'     => 'feature_posts_options',
		'default'     => '',
		'priority'	   => 400,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'disable_featured_pages_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Description Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'featured_pages_section_description_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'regular',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'line-height'    => '1.8',
		),
		'priority'	   => 410,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-pages-area .section-title-wrap p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'disable_featured_pages_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Title and Description Alignment', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_section_title_desc_alignment',
		'section'     => 'feature_posts_options',
		'default'     => 'text-left',
		'choices'     => array(
			'text-left'	 	=> esc_html__( 'Left', 'bosa-ecommerce-shop' ),
			'text-center'  	=> esc_html__( 'Center', 'bosa-ecommerce-shop' ),   
			'text-right'		=> esc_html__( 'Right', 'bosa-ecommerce-shop' ),
		),
		'priority'	   => 420,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				array(
					'setting'  => 'disable_featured_pages_section_title',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'disable_featured_pages_section_description',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Layout', 'bosa-ecommerce-shop' ),
		'description' => esc_html__( 'Select layout & scroll below to change its options', 'bosa-ecommerce-shop' ),
		'type'        => 'radio-image',
		'settings'    => 'featured_pages_section_layouts',
		'section'     => 'feature_posts_options',
		'default'     => 'featured_pages_layout_one',
		'choices'     => apply_filters( 'bosa_featured_pages_section_layouts_filter', array(
			'featured_pages_layout_one'    => get_stylesheet_directory_uri() . '/assets/images/feature-page-layout-one.png',
		) ),
		'priority'	   => 430,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Columns', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_columns',
		'section'     => 'feature_posts_options',
		'default'     => 'four_columns',
		'placeholder' => esc_attr__( 'Select category', 'bosa-ecommerce-shop' ),
		'choices'  => array(
			'one_column'    => esc_html__( '1 Column', 'bosa-ecommerce-shop' ),
			'two_columns'   => esc_html__( '2 Columns', 'bosa-ecommerce-shop' ),
			'three_columns' => esc_html__( '3 Columns', 'bosa-ecommerce-shop' ),
			'four_columns'  => esc_html__( '4 Columns', 'bosa-ecommerce-shop' ),
		),
		'priority'	   => 440,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 1', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_one',
		'section'     => 'feature_posts_options',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 1', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'priority'	  => 450,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'one_column', 'two_columns', 'three_columns', 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 2', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_two',
		'section'     => 'feature_posts_options',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 2', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'priority'	  => 460,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'two_columns', 'three_columns', 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 3', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_three',
		'section'     => 'feature_posts_options',
		'default'     => '',
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'placeholder' => esc_html__( 'Select Page 3', 'bosa-ecommerce-shop' ),
		'priority'	  => 470,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'three_columns', 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 4', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_four',
		'section'     => 'feature_posts_options',
		'default'     => '',
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'placeholder' => esc_html__( 'Select Page 4', 'bosa-ecommerce-shop' ),
		'priority'	  => 480,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Featured Page Overlay Opacity', 'bosa-ecommerce-shop' ),
		'type'        => 'number',
		'settings'    => 'featured_pages_overlay_opacity',
		'section'     => 'feature_posts_options',
		'default'     => 2,
		'choices' => array(
			'min' => '0',
			'max' => '9',
			'step' => '1',
		),
		'priority'	   => 490,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Height (in px)', 'bosa-ecommerce-shop' ),
		'description'  => esc_html__( 'This option will only apply to Desktop. Please click on below Desktop Icon to see changes. Automatically adjust by theme default in the responsive devices.
		', 'bosa-ecommerce-shop' ),
		'type'         => 'slider',
		'settings'     => 'featured_pages_height',
		'section'      => 'feature_posts_options',
		'transport'    => 'postMessage',
		'default'      => 250,
		'choices' => array(
			'min' => '100',
			'max' => '1200',
			'step' => '10',
		),
		'priority'	   => 500,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Choose Image Size', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'render_feature_pages_image_size',
		'section'     => 'feature_posts_options',
		'default'     => 'bosa-420-300',
		'placeholder' => esc_html__( 'Select Image Size', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_get_intermediate_image_sizes(),
		'priority'	  => 510,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Background Image Size', 'bosa-ecommerce-shop' ),
		'type'         => 'radio',
		'settings'     => 'featured_pages_image_size',
		'section'      => 'feature_posts_options',
		'default'      => 'cover',
		'choices'      => array(
			'cover'    => esc_html__( 'Cover', 'bosa-ecommerce-shop' ),
			'pattern'  => esc_html__( 'Pattern / Repeat', 'bosa-ecommerce-shop' ),
			'norepeat' => esc_html__( 'No Repeat', 'bosa-ecommerce-shop' ),
		),
		'priority'	   => 520,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page Border Radius (px)', 'bosa-ecommerce-shop' ),
		'type'        => 'slider',
		'settings'    => 'featured_pages_radius',
		'section'     => 'feature_posts_options',
		'transport'	  => 'postMessage', 
		'default'     =>  0,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'priority'	   => 530,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Page Title', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'disable_featured_pages_title',
		'section'     => 'feature_posts_options',
		'default'     => false,
		'priority'	   => 540,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Page Title Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'featured_pages_title_color',
		'section'      => 'feature_posts_options',
		'default'      => '#1a1a1a',
		'priority'	   => 550,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Page Hover Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'featured_pages_hover_color',
		'section'      => 'feature_posts_options',
		'default'      => '#086abd',
		'priority'	   => 560,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page Title Horizontal Alignment', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_text_alignment',
		'section'     => 'feature_posts_options',
		'default'     => 'text-center',
		'choices'     => array(
			'text-left'	 	=> esc_html__( 'Left', 'bosa-ecommerce-shop' ),
			'text-center'  	=> esc_html__( 'Center', 'bosa-ecommerce-shop' ),   
			'text-right'	=> esc_html__( 'Right', 'bosa-ecommerce-shop' ),
		),
		'priority'	   => 570,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page Title Vertical Alignment', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_title_alignment',
		'section'     => 'feature_posts_options',
		'default'     => 'align-center',
		'choices'     => array(
			'align-top'	 	=> esc_html__( 'Top', 'bosa-ecommerce-shop' ),
			'align-center'  => esc_html__( 'Center', 'bosa-ecommerce-shop' ),   
			'align-bottom'  => esc_html__( 'Bottom', 'bosa-ecommerce-shop' ),
		),
		'priority'	   => 580,
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) ); 

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Page Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'featured_pages_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '18px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.4',
		),
		'priority'	   => 590,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.feature-pages-content-wrap .feature-pages-content .feature-pages-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_pages_tab',
				'operator' => '==',
				'value'    => 'featured_pages',
			),
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Featured Posts / Pages', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_feature_posts',
		'section'      => 'blog_page_responsive',
		'default'      => false,
		'priority'	   => 20,
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_section',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	// Blog advertisement banner
	Kirki::add_section( 'blog_advert_banner_options', array(
	    'title'          => esc_html__( 'Blog Advertisement Banner', 'bosa-ecommerce-shop' ),
	    'panel'          => 'blog_homepage_options',
	    'capability'     => 'edit_theme_options',
	    'priority'       => '25',
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Advertisement Banner', 'bosa-ecommerce-shop' ),
		'description'  => esc_html__( 'Image dimensions 1230 by 100 pixels is recommended.', 'bosa-ecommerce-shop' ),
		'type'         => 'image',
		'settings'     => 'blog_advertisement_banner',
		'section'      => 'blog_advert_banner_options',
		'default'      => '',
		'priority'	   => '10',
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Choose Image Size', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'render_blog_ad_image_size',
		'section'     => 'blog_advert_banner_options',
		'default'     => 'full',
		'placeholder' => esc_html__( 'Select Image Size', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_get_intermediate_image_sizes(),
		'priority'	  => '15',
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Advertisement Banner Link', 'bosa-ecommerce-shop' ),
		'type'     => 'link',
		'settings' => 'blog_advertisement_banner_link',
		'section'  => 'blog_advert_banner_options',
		'default'  => '#',
		'priority' => '20',
	) );

	Kirki::add_field( 'bosa', array(
		'label'    		=> esc_html__( 'Advertisement Banner Target', 'bosa-ecommerce-shop' ),
		'description' 	=> esc_html__( 'If enabled, the page will be open in an another browser tab.', 'bosa-ecommerce-shop' ),
		'type'     		=> 'checkbox',
		'settings' 		=> 'blog_advertisement_banner_target',
		'section'  		=> 'blog_advert_banner_options',
		'default'  		=> true,
		'priority' 		=> '30',
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Advertisement Banner', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_blog_advertisement_banner',
		'section'      => 'blog_page_responsive',
		'default'      => false,
		'priority'	   => 24,
		'active_callback' => array(
			array(
		        'setting'  => 'blog_advertisement_banner',
		        'operator' => '!==',
		        'value'    => '',
		    ),
		    array(
		        'setting'  => 'blog_advertisement_banner',
		        'operator' => '!==',
		        'value'    => false,
		    ),
		    array(
		        'setting'  => 'blog_advertisement_banner',
		        'operator' => '!==',
		        'value'    => 0,
		    ),
		    array(
		        'setting'  => 'blog_advertisement_banner',
		        'operator' => '!==',
		        'value'    => null,
		    ),
		),
	) );

	// featured posts two
	Kirki::add_section( 'feature_posts_two_options', array(
	    'title'          => esc_html__( 'Featured Posts Two', 'bosa-ecommerce-shop' ),
	    'panel'          => 'blog_homepage_options',
	    'capability'     => 'edit_theme_options',
	    'priority'       => 26,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Featured Posts Two Section', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_feature_posts_two_section',
		'section'      => 'feature_posts_two_options',
		'default'      => false,
		'priority'	   => 10,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Section Title', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_feature_posts_two_section_title',
		'section'      => 'feature_posts_two_options',
		'default'      => true,
		'priority'	   => 20,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Title', 'bosa-ecommerce-shop' ),
		'type'        => 'text',
		'settings'    => 'feature_posts_two_section_title',
		'section'     => 'feature_posts_two_options',
		'default'     => '',
		'priority'	   => 30,
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_two_section_title_font_control',
		'section'      => 'feature_posts_two_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '600',
			'font-size'      => '36px',
			'text-transform' => 'none',
			'line-height'    => '1.2',
		),
		'priority'	   => 40,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-two-area .section-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Section Description', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_feature_posts_two_section_description',
		'section'      => 'feature_posts_two_options',
		'default'      => true,
		'priority'	   => 50,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Description', 'bosa-ecommerce-shop' ),
		'type'        => 'text',
		'settings'    => 'feature_posts_two_section_description',
		'section'     => 'feature_posts_two_options',
		'default'     => '',
		'priority'	   => 60,
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Description Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_two_section_description_font_control',
		'section'      => 'feature_posts_two_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'regular',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'line-height'    => '1.8',
		),
		'priority'	   => 70,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-two-area .section-title-wrap p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Title and Description Alignment', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_two_section_title_desc_alignment',
		'section'     => 'feature_posts_two_options',
		'default'     => 'text-left',
		'choices'     => array(
			'text-left'	 	=> esc_html__( 'Left', 'bosa-ecommerce-shop' ),
			'text-center'  	=> esc_html__( 'Center', 'bosa-ecommerce-shop' ),   
			'text-right'	=> esc_html__( 'Right', 'bosa-ecommerce-shop' ),
		),
		'priority'	   => 80,
		'active_callback' => array(
			array(
				array(
					'setting'  => 'disable_feature_posts_two_section_title',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'disable_feature_posts_two_section_description',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Choose Category', 'bosa-ecommerce-shop' ),
		'description' => esc_html__( 'Recent posts will show if any category is not chosen.', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_two_category',
		'section'     => 'feature_posts_two_options',
		'default'     => '',
		'placeholder' => esc_html__( 'Select category', 'bosa-ecommerce-shop' ), 
		'choices'     => bosa_get_post_categories(),
		'priority'	  =>  90,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Title Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_title_color',
		'section'      => 'feature_posts_two_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  100,
		'active_callback' => array(
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				'setting'  => 'disable_feature_posts_two_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Category Background Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_category_bgcolor',
		'section'      => 'feature_posts_two_options',
		'default'      => '#EB5A3E',
		'priority'	   =>  110,
		'active_callback' => array(
			array(
				'setting'  => 'hide_feature_posts_two_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Category Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_category_color',
		'section'      => 'feature_posts_two_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  120,
		'active_callback' => array(
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				'setting'  => 'hide_feature_posts_two_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Meta Text Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_meta_color',
		'section'      => 'feature_posts_two_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  130,
		'active_callback' => array(
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				array(
					'setting'  => 'hide_feature_posts_two_date',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_feature_posts_two_author',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_feature_posts_two_comment',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Meta Icon Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_meta_icon_color',
		'section'      => 'feature_posts_two_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  140,
		'active_callback' => array(
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				array(
					'setting'  => 'hide_feature_posts_two_date',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_feature_posts_two_author',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_feature_posts_two_comment',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Hover Color', 'bosa-ecommerce-shop' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_hover_color',
		'section'      => 'feature_posts_two_options',
		'default'      => '#a8d8ff',
		'priority'	   =>  150,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Posts Overlay Opacity', 'bosa-ecommerce-shop' ),
		'type'        => 'number',
		'settings'    => 'feature_posts_two_overlay_opacity',
		'section'     => 'feature_posts_two_options',
		'default'     => 4,
		'choices' => array(
			'min' => '0',
			'max' => '9',
			'step' => '1',
		),
		'priority'	  =>  160,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Choose Image Size', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'render_feature_posts_two_image_size',
		'section'     => 'feature_posts_two_options',
		'default'     => 'bosa-420-300',
		'placeholder' => esc_html__( 'Select Image Size', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_get_intermediate_image_sizes(),
		'priority'	  => 170,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Background Image Size', 'bosa-ecommerce-shop' ),
		'type'         => 'radio',
		'settings'     => 'feature_posts_two_image_size',
		'section'      => 'feature_posts_two_options',
		'default'      => 'cover',
		'choices'      => array(
			'cover'    => esc_html__( 'Cover', 'bosa-ecommerce-shop' ),
			'pattern'  => esc_html__( 'Pattern / Repeat', 'bosa-ecommerce-shop' ),
			'norepeat' => esc_html__( 'No Repeat', 'bosa-ecommerce-shop' ),
		),
		'priority'	   => 180,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Posts Border Radius (px)', 'bosa-ecommerce-shop' ),
		'type'        => 'slider',
		'settings'    => 'feature_posts_two_radius',
		'section'     => 'feature_posts_two_options',
		'transport'	  => 'postMessage', 
		'default'     =>  0,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'priority'	  =>  190,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Post Content Horizontal Alignment', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_two_horizontal_alignment',
		'section'     => 'feature_posts_two_options',
		'default'     => 'text-left',
		'choices'     => array(
			'text-left'	 	=> esc_html__( 'Left', 'bosa-ecommerce-shop' ),
			'text-center'  	=> esc_html__( 'Center', 'bosa-ecommerce-shop' ),   
			'text-right'	=> esc_html__( 'Right', 'bosa-ecommerce-shop' ),
		),
		'priority'	   => 200,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Post Content Vertical Alignment', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_two_vertical_title_alignment',
		'section'     => 'feature_posts_two_options',
		'default'     => 'align-bottom',
		'choices'     => array(
			'align-top'	 	=> esc_html__( 'Top', 'bosa-ecommerce-shop' ),
			'align-center'  => esc_html__( 'Center', 'bosa-ecommerce-shop' ),   
			'align-bottom'  => esc_html__( 'Bottom', 'bosa-ecommerce-shop' ),
		),
		'priority'	   => 210,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Post Title', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'disable_feature_posts_two_title',
		'section'     => 'feature_posts_two_options',
		'default'     => false,
		'priority'	  =>  220,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_two_font_control',
		'section'      => 'feature_posts_two_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '22px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.4',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-two-area .feature-posts-content .feature-posts-title',
			),
		),
		'priority'	  =>  230,
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Posts category', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_feature_posts_two_category',
		'section'     => 'feature_posts_two_options',
		'default'     => false,
		'priority'	  =>  250,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Category Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_two_cat_font_control',
		'section'      => 'feature_posts_two_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'uppercase',
			'line-height'    => '1',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-two-area .feature-posts-content .cat-links a',
			),
		),
		'priority'	  =>  260,
		'active_callback' => array(
			array(
				'setting'  => 'hide_feature_posts_two_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Post Date', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_feature_posts_two_date',
		'section'     => 'feature_posts_two_options',
		'default'     => false,
		'priority'	  =>  270,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Post Author', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_feature_posts_two_author',
		'section'     => 'feature_posts_two_options',
		'default'     => false,
		'priority'	  =>  280,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Post Comment', 'bosa-ecommerce-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_feature_posts_two_comment',
		'section'     => 'feature_posts_two_options',
		'default'     => false,
		'priority'	  =>  290,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Meta Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_two_meta_font_control',
		'section'      => 'feature_posts_two_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.6',
		),
		'priority'	  =>  300,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-two-area .feature-posts-content .entry-meta a',
			),
		),
		'active_callback' => array(
			array(
				array(
				'setting'  => 'hide_feature_posts_two_date',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_feature_posts_two_author',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_feature_posts_two_comment',
				'operator' => '==',
				'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Featured Posts Two', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_feature_posts_two',
		'section'      => 'blog_page_responsive',
		'default'      => false,
		'priority'	   => 25,
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_section',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Post Layouts', 'bosa-ecommerce-shop' ),
		'description' => esc_html__( 'Grid / List / Single/ Grid Thumbnail', 'bosa-ecommerce-shop' ),
		'type'        => 'radio-image',
		'settings'    => 'archive_post_layout',
		'section'     => 'blog_page_style_options',
		'default'     => 'grid-thumbnail',
		'priority'	  => '5',
		'choices'  	  => apply_filters( 'bosa_archive_post_layout_filter', array(
			'grid'           => get_template_directory_uri() . '/assets/images/grid-layout.png',
			'list'           => get_template_directory_uri() . '/assets/images/list-layout.png',
			'single'         => get_template_directory_uri() . '/assets/images/single-layout.png',
		) ),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Post View Number', 'bosa-ecommerce-shop' ),
		'description' => esc_html__( 'Number of posts to show.', 'bosa-ecommerce-shop' ),
		'type'        => 'number',
		'settings'    => 'archive_post_per_page',
		'section'     => 'blog_page_style_options',
		'default'     => 10,
		'priority'	  => '6',
		'choices'  => array(
			'min' => '0',
			'max' => '20',
			'step' => '1',
		),
	) );

	Kirki::add_field( 'bosa', array(
	    'type'        => 'custom',
	    'settings'    => 'grid_thumbnail_separator',
	    'section'     => 'blog_page_style_options',
	    'default'     => esc_html__( 'Thumbnail Post Options', 'bosa-ecommerce-shop' ),
	    'priority'	  => 300,
	    'active_callback' => array(
			array(
				'setting'  => 'archive_post_layout',
				'operator' => '==',
				'value'    => 'grid-thumbnail',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Choose Image Size', 'bosa-ecommerce-shop' ),
		'description' => esc_html__( 'Image Size for thumbnail post only.', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'render_grid_thumbnail_image_size',
		'section'     => 'blog_page_style_options',
		'default'     => 'thumbnail',
		'placeholder' => esc_html__( 'Select Image Size', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_get_intermediate_image_sizes(),
		'priority'	  => 310,
		'active_callback' => array(
			array(
				'setting'  => 'archive_post_layout',
				'operator' => '==',
				'value'    => 'grid-thumbnail',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Post Border Radius (px)', 'bosa-ecommerce-shop' ),
		'description' => esc_html__( 'Post Border Radius for thumbnail post only.', 'bosa-ecommerce-shop' ),
		'type'        => 'slider',
		'settings'    => 'posts_border_radius_thumbnail',
		'section'     => 'blog_page_style_options',
		'transport'	  => 'postMessage', 
		'default'     =>  0,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'priority'	  => 320,
		'active_callback' => array(
			array(
				'setting'  => 'archive_post_layout',
				'operator' => '==',
				'value'    => 'grid-thumbnail',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Date', 'bosa-ecommerce-shop' ),
		'description'  => esc_html__( 'Disables date for thumbnail post only.', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_date_thumbnail',
		'section'      => 'blog_page_style_options',
		'default'      => false,
		'priority'	   => 330,
		'active_callback' => array(
			array(
				'setting'  => 'archive_post_layout',
				'operator' => '==',
				'value'    => 'grid-thumbnail',
			),
			array(
				'setting'  => 'hide_date',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Author', 'bosa-ecommerce-shop' ),
		'description'  => esc_html__( 'Disables author for thumbnail post only.', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_author_thumbnail',
		'section'      => 'blog_page_style_options',
		'default'      => true,
		'priority'	   => 340,
		'active_callback' => array(
			array(
				'setting'  => 'archive_post_layout',
				'operator' => '==',
				'value'    => 'grid-thumbnail',
			),
			array(
				'setting'  => 'hide_author',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Comment Link', 'bosa-ecommerce-shop' ),
		'description'  => esc_html__( 'Disables comment link for thumbnail post only.', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_comment_thumbnail',
		'section'      => 'blog_page_style_options',
		'default'      => true,
		'priority'	   => 350,
		'active_callback' => array(
			array(
				'setting'  => 'archive_post_layout',
				'operator' => '==',
				'value'    => 'grid-thumbnail',
			),
			array(
				'setting'  => 'hide_comment',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Excerpt', 'bosa-ecommerce-shop' ),
		'description'  => esc_html__( 'Disables excerpt for thumbnail post only.', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_excerpt_thumbnail',
		'section'      => 'blog_page_style_options',
		'default'      => true,
		'priority'	   => 360,
		'active_callback' => array(
			array(
				'setting'  => 'archive_post_layout',
				'operator' => '==',
				'value'    => 'grid-thumbnail',
			),
			array(
				'setting'  => 'hide_blog_page_excerpt',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Post Button', 'bosa-ecommerce-shop' ),
		'description'  => esc_html__( 'Disables button for thumbnail post only.', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_button_thumbnail',
		'section'      => 'blog_page_style_options',
		'default'      => true,
		'priority'	   => 370,
		'active_callback' => array(
			array(
				'setting'  => 'archive_post_layout',
				'operator' => '==',
				'value'    => 'grid-thumbnail',
			),
			array(
				'setting'  => 'hide_post_button',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	//Blog_Services

	Kirki::add_section( 'blog_services', array(
	    'title'          => esc_html__( 'Services', 'bosa-ecommerce-shop' ),
	    'panel'          => 'blog_homepage_options',
	    'capability'     => 'edit_theme_options',
	    'priority'       => 27,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Services Section', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_blog_services_section',
		'section'      => 'blog_services',
		'default'      => true,
		'priority'	   => 10,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 1', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'blog_services_page_one',
		'section'     => 'blog_services',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 1', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'priority'	  => 20,
	));

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 2', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'blog_services_page_two',
		'section'     => 'blog_services',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 2', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'priority'	  => 30,
		
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 3', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'blog_services_page_three',
		'section'     => 'blog_services',
		'default'     => '',
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'placeholder' => esc_html__( 'Select Page 3', 'bosa-ecommerce-shop' ),
		'priority'	  => 40,
	
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 4', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'blog_services_page_four',
		'section'     => 'blog_services',
		'default'     => '',
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'placeholder' => esc_html__( 'Select Page 4', 'bosa-ecommerce-shop' ),
		'priority'	  => 50,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Services', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_services',
		'section'      => 'blog_page_responsive',
		'default'      => false,
		'priority'	   => 26,
		'active_callback' => array(
			array(
				'setting'  => 'disable_blog_services_section',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	//Teams
	Kirki::add_section( 'blog_teams', array(
	    'title'          => esc_html__( 'Team', 'bosa-ecommerce-shop' ),
	    'panel'          => 'blog_homepage_options',
	    'capability'     => 'edit_theme_options',
	    'priority'       => 29,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Team Section', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_teams_section',
		'section'      => 'blog_teams',
		'default'      => true,
		'priority'	   => 10,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 1', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'teams_page_one',
		'section'     => 'blog_teams',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 1', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'priority'	  => 20,
	));
		

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 2', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'teams_page_two',
		'section'     => 'blog_teams',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 2', 'bosa-ecommerce-shop' ),
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'priority'	  => 30,
		
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 3', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'teams_page_three',
		'section'     => 'blog_teams',
		'default'     => '',
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'placeholder' => esc_html__( 'Select Page 3', 'bosa-ecommerce-shop' ),
		'priority'	  => 40,
	
	) );
	
	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 4', 'bosa-ecommerce-shop' ),
		'type'        => 'select',
		'settings'    => 'teams_page_four',
		'section'     => 'blog_teams',
		'default'     => '',
		'choices'     => bosa_ecommerce_shop_get_pages(),
		'placeholder' => esc_html__( 'Select Page 4', 'bosa-ecommerce-shop' ),
		'priority'	  => 50,
	) );
	
	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Team', 'bosa-ecommerce-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_team',
		'section'      => 'blog_page_responsive',
		'default'      => false,
		'priority'	   => 27,
		'active_callback' => array(
			array(
				'setting'  => 'disable_teams_section',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Product Title Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'shop_product_title_font_control',
		'section'      => 'woocommerce_product_catalog',
		'default'  => array(
			'font-family'     => 'Jost',
			'variant'         => '500',
			'font-style'      => 'normal',
			'font-size'       => '18px',
			'text-transform'  => 'none',
			'line-height'     => '1.4',
			'letter-spacing'  => '0',
			'text-decoration' => 'none',
			'color'			  => '#030303',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => 'body[class*=woocommerce] ul.products li.product .woocommerce-loop-product__title',
			),
		),
		'priority'    => 380,
		'active_callback' => array(
			array(
				'setting'  => 'woocommerce_product_catalog_tabs',
				'operator' => '==',
				'value'    => 'product_catalog_style_tab',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Product Price Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'shop_product_price_font_control',
		'section'      => 'woocommerce_product_catalog',
		'default'  => array(
			'font-family'     => 'Jost',
			'variant'         => '600',
			'font-style'      => 'normal',
			'font-size'       => '16px',
			'text-transform'  => 'none',
			'line-height'     => '1.3',
			'letter-spacing'  => '0',
			'text-decoration' => 'none',
			'color'			  => '#414141',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => 'body[class*=woocommerce] ul.products li.product .price',
			),
		),
		'priority'    => 390,
		'active_callback' => array(
			array(
				'setting'  => 'woocommerce_product_catalog_tabs',
				'operator' => '==',
				'value'    => 'product_catalog_style_tab',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Add to Cart Button Typography', 'bosa-ecommerce-shop' ),
		'type'         => 'typography',
		'settings'     => 'shop_cart_button_font_control',
		'section'      => 'woocommerce_product_catalog',
		'default'  => array(
			'font-family'     => 'Jost',
			'variant'         => 'regular',
			'font-style'      => 'normal',
			'font-size'       => '13px',
			'text-transform'  => 'uppercase',
			'line-height'     => '1.5',
			'letter-spacing'  => '0',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => 'body[class*=woocommerce] .product-inner .button, body[class*=woocommerce] .product-inner .added_to_cart',
			),
		),
		'priority'    => 400,
		'active_callback' => array(
			array(
				'setting'  => 'woocommerce_product_catalog_tabs',
				'operator' => '==',
				'value'    => 'product_catalog_style_tab',
			),
			array(
				'setting'  => 'woocommerce_add_to_cart_button',
				'operator' => '!=',
				'value'    => array( 'cart_button_four' ),
			),
		),
	) );

}