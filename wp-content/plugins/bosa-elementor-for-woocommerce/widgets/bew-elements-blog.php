<?php

namespace Elementor;

class BEW_Blog extends BEW_Settings {
	// use Button_Trait;
	public function get_name() {
		return 'bew-elements-blog';
	}
	
	public function get_title() {
		return __( 'Blog', 'bosa-elementor-for-woocommerce' );
	}
	
	public function get_icon() {
		return 'bew-widget eicon-posts-grid';
	}

	public function get_keywords() {
		return [ 'bew', 'blog', 'bew blog', 'bosa' ];
	}

	protected function get_available_post_types() {

		$post_type_args = [
			// Default is the value $public.
			'show_in_nav_menus' => true,
		];

		if(! empty($args['post_type'])) {
			$post_type_args['name'] = $args['post_type'];
		}

		$post_types = get_post_types($post_type_args , 'objects');

		$result = array(__('-- Select --', 'bosa-elementor-for-woocommerce'));

		foreach($post_types as $post_type => $object) {
			$result[ $post_type ] = $object->label;
		}

		return $result;
	}

    protected function register_controls() {

		$this->start_controls_section(
			'bew_elements_blog',
			[
				'label' => __( 'Content', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_items_no();

		$this->add_responsive_control(
			'column_no',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Grid Columns', 'bosa-elementor-for-woocommerce' ),
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 6,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 3,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 3,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 1,
					'unit' => 'px',
				],
			]
		);

		$this->add_control(
			'grid_style',
			[
				'label' 		=> __('Grid Style', 'bosa-elementor-for-woocommerce'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'fit-rows',
				'options' 		=> [
					'fit-rows' 	=> __('Fit Rows', 'bosa-elementor-for-woocommerce'),
					'masonry' 	=> __('Masonry', 'bosa-elementor-for-woocommerce'),
				],
			]
		);

		$this->get_item_visibility( 'equal_heights', esc_html__( 'Equal Heights', 'bosa-elementor-for-woocommerce' ), esc_html__( 'Yes', 'bosa-elementor-for-woocommerce' ), esc_html__( 'No', 'bosa-elementor-for-woocommerce' ), $default="no" );

		$this->add_responsive_control(
			'blog_align',
			[
				'label' => esc_html__( 'Alignment', 'bosa-elementor-for-woocommerce' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);

		$this->get_item_visibility( 'pagination', esc_html__( 'Pagination', 'bosa-elementor-for-woocommerce' ), esc_html__( 'Yes', 'bosa-elementor-for-woocommerce' ), esc_html__( 'No', 'bosa-elementor-for-woocommerce' ), $default="yes" );

		$this->add_control(
			'pagination_position',
			[
				'label' => esc_html__( 'Pagination Position', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} ul.page-numbers' => 'text-align: {{VALUE}};',
				],
				'default' => 'center',
				'toggle' => true,
				'condition' => [
					'pagination' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_blog_query',
			[
				'label' => __( 'Query', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_type',
			[
				'label' 		=> __('Post Type', 'bosa-elementor-for-woocommerce'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '0',
				'options' 		=> $this->get_available_post_types(),
			]
		);

		$this->add_control(
			'order',
			[
				'label' 		=> __('Order', 'bosa-elementor-for-woocommerce'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 			=> __('Default', 'bosa-elementor-for-woocommerce'),
					'DESC' 		=> __('DESC', 'bosa-elementor-for-woocommerce'),
					'ASC' 		=> __('ASC', 'bosa-elementor-for-woocommerce'),
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' 		=> __('Order By', 'bosa-elementor-for-woocommerce'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 				=> __('Default', 'bosa-elementor-for-woocommerce'),
					'date' 			=> __('Date', 'bosa-elementor-for-woocommerce'),
					'title' 		=> __('Title', 'bosa-elementor-for-woocommerce'),
					'name' 			=> __('Name', 'bosa-elementor-for-woocommerce'),
					'modified' 		=> __('Modified', 'bosa-elementor-for-woocommerce'),
					'author' 		=> __('Author', 'bosa-elementor-for-woocommerce'),
					'rand' 			=> __('Random', 'bosa-elementor-for-woocommerce'),
					'ID' 			=> __('ID', 'bosa-elementor-for-woocommerce'),
					'comment_count' => __('Comment Count', 'bosa-elementor-for-woocommerce'),
					'menu_order' 	=> __('Menu Order', 'bosa-elementor-for-woocommerce'),
				],
			]
		);

		$this->add_control(
			'include_categories',
			[
				'label' 		=> __( 'Include Categories', 'bosa-elementor-for-woocommerce' ),
				'description' 	=> __( 'Enter the categories slugs seperated by a "comma"', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition'		=> [
					'post_type' => ['post', 'product'],
				]
			]
		);

		$this->add_control(
			'exclude_categories',
			[
				'label' 		=> __( 'Exclude Categories', 'bosa-elementor-for-woocommerce' ),
				'description' 	=> __( 'Enter the categories slugs seperated by a "comma"', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition'		=> [
					'post_type' => [ 'post', 'product' ],
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'bew_elements_image_meta',
            [
                'label' => __( 'Elements', 'bosa-elementor-for-woocommerce' )
            ]
       	);

		$this->add_control(
			'image_size',
			[
				'label' 		=> __( 'Image Size', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'medium_large',
				'options' 		=> $this->get_img_sizes(),
			]
		);

		$this->add_control(
			'title_visibility',
			[
				'label' 		=> __( 'Display Title', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'bosa-elementor-for-woocommerce'),
				'label_off' 	=> __('Hide', 'bosa-elementor-for-woocommerce'),
			]
		);

		$this->add_control(
			'date_visibility',
			[
				'label' 		=> __( 'Display Date', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'bosa-elementor-for-woocommerce'),
				'label_off' 	=> __('Hide', 'bosa-elementor-for-woocommerce'),
			]
		);

		$this->add_control(
			'comments_visibility',
			[
				'label' 		=> __( 'Display Comments', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'bosa-elementor-for-woocommerce'),
				'label_off' 	=> __('Hide', 'bosa-elementor-for-woocommerce'),
			]
		);

		$this->add_control(
			'author_visibility',
			[
				'label' 		=> __( 'Display Author', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'bosa-elementor-for-woocommerce'),
				'label_off' 	=> __('Hide', 'bosa-elementor-for-woocommerce'),
			]
		);

		$this->add_control(
			'cat_visibility',
			[
				'label' 		=> __( 'Display Categories', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'bosa-elementor-for-woocommerce'),
				'label_off' 	=> __('Hide', 'bosa-elementor-for-woocommerce'),
			]
		);

		$this->add_control(
			'cat_separator',
			[
				'label' 		=> __( 'Categories Separator', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> ',',
				'label_block' 	=> true,
				'condition'		=> [
					'cat_visibility' => 'yes',
				]
			]
		);

		$this->add_control(
			'excerpt_visibility',
			[
				'label' 		=> __( 'Display Excerpt', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'bosa-elementor-for-woocommerce'),
				'label_off' 	=> __('Hide', 'bosa-elementor-for-woocommerce'),
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label' 		=> __( 'Excerpt Length', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> '15',
				'label_block' 	=> true,
				'condition'		=> [
					'excerpt_visibility' => 'yes',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__( 'Button / Read More', 'bosa-elementor-for-woocommerce' ),
				'tab' 	=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->get_item_visibility( 'enable_button', esc_html__( 'Enable Button', 'bosa-elementor-for-woocommerce' ), esc_html__( 'Yes', 'bosa-elementor-for-woocommerce' ), esc_html__( 'No', 'bosa-elementor-for-woocommerce' ), $default="yes" );
		
		$section_condition = array(
			'section_condition' => array(
			'enable_button' => 'yes',
		)) ;

		$this->register_button_content_controls( $section_condition );

        $this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_blog_style',
			[
				'label' => __( 'Grid Item', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color( 'bg_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-container .bew-elements-post-inner', 'background-color' );

		$this->get_border_attr( 'blog_border', '.bew-elements-container .bew-elements-post-inner' );

		$this->get_border_radius( 'blog_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.bew-elements-container .bew-elements-post-inner', 'border-radius' );
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'blog_box_shadow',
				'selector' => '{{WRAPPER}} .bew-elements-container .bew-elements-post-inner'
			]
		);

		$this->add_responsive_control(
			'blog_columns_gap',
			[
				'label' => esc_html__( 'Columns Gap', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'default' => [
					'unit' => 'px',
					'size' => 13,
				],
				'desktop_default' => [
					'size' => 13,
				],
				'tablet_default' => [
					'size' => 13,
				],
				'mobile_default' => [
					'size' => 13
				],
				'selectors' => [
					'{{WRAPPER}} .bew-blog-grid' => 'column-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'blog_row_gap',
			[
				'label' => esc_html__( 'Row Gap', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'default' => [
					'unit' => 'px',
					'size' => 13,
				],
				'desktop_default' => [
					'size' => 13,
				],
				'tablet_default' => [
					'size' => 13,
				],
				'mobile_default' => [
					'size' => 13
				],
				'selectors' => [
					'{{WRAPPER}} .bew-blog-grid' => 'row-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->get_padding( 'item_padding', '.bew-elements-container .bew-elements-post-inner' );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color( 'bg_color_hover', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-container .bew-elements-post-inner:hover', 'background-color' );

		$this->get_border_attr( 'blog_border_hover', '.bew-elements-container .bew-elements-post-inner' );

		$this->get_border_radius( 'blog_border_radius_hover', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.bew-elements-container .bew-elements-post-inner:hover', 'border-radius' );

		$this->get_margin( 'blog_margin_hover', '.bew-elements-container .bew-elements-post-inner:hover' );

		$this->get_padding( 'blog_padding_hover', '.bew-elements-container .bew-elements-post-inner:hover' );
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'blog_box_shadow_hover',
				'selector' => '{{WRAPPER}} .bew-elements-container .bew-elements-post-inner:hover'
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
			'bew_elements_blog_img_style',
			[
				'label' => __( 'Image', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->start_controls_tabs(
			'image_tabs'
		);
		
		$this->start_controls_tab(
			'image_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->add_control(
			'image_normal_opacity',
			[
				'label' => esc_html__( 'Opacity', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step'	=> 0.01
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bew-elements-post .bew-featured-image a img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'image_normal_filters',
				'selector' => '{{WRAPPER}} .bew-elements-post .bew-featured-image a img',
			]
		);
		
		$this->end_controls_tab();

		$this->start_controls_tab(
			'image_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->add_control(
			'image_hover_opacity',
			[
				'label' => esc_html__( 'Opacity', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step'	=> 0.01
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bew-elements-post .bew-featured-image a:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'image_hover_filters',
				'selector' => '{{WRAPPER}} .bew-elements-post .bew-featured-image a:hover img',
			]
		);

		$this->add_control(
			'image_hover_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bew-elements-post .bew-featured-image a img' => 'transition-duration: {{SIZE}}s;',
				],
			]
		);
		
		$this->end_controls_tabs();

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->get_border_attr( 'img_border', '.bew-elements-container .bew-elements-post .bew-featured-image img' );

		$this->get_border_radius( 'img_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.bew-elements-container .bew-elements-post .bew-featured-image img', 'border-radius' );

		$this->get_margin( 'img_margin', '.bew-elements-container .bew-elements-post .bew-featured-image img' );

		$this->get_padding( 'img_padding', '.bew-elements-container .bew-elements-post .bew-featured-image img' );

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_title_style',
			[
				'label' => __( 'Title', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_normal_color('title_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-post .bew-blog-title', 'color');

        $this->get_normal_color('hov_title_color', esc_html__( 'Hover Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-post .bew-blog-title a:hover', 'color');

		$this->get_title_typography('title_typography', '.bew-elements-post .bew-blog-title');

        $this->get_margin( 'title_margin', '.bew-elements-post .bew-blog-title' );

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_blog_categories',
			[
				'label' => __( 'Categories', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_title_typography( 'categories_typography', '.bew-blog-categories a' );

		$this->get_normal_color( 'categories_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.bew-blog-categories a', 'color' );

		$this->get_normal_color( 'categories_hover_color', esc_html__( 'Hover Color', 'bosa-elementor-for-woocommerce' ), '.bew-blog-categories a:hover', 'color' );

		$this->get_margin( 'categories_margin', '.bew-elements-container .bew-elements-post-inner .bew-blog-categories' );

		$this->get_padding( 'categories_padding', '.bew-elements-container .bew-elements-post-inner .bew-blog-categories a' );


		$this->end_controls_section();

        $this->start_controls_section(
			'bew_elements_excerpt_style',
			[
				'label' => __( 'Excerpt', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->get_normal_color( 'excerpt_color', esc_html__('Color', 'bosa-elementor-for-woocommerce'), '.bew-elements-post .bew-blog-excerpt', 'color' );

        $this->get_title_typography( 'excerpt_typography', '.bew-elements-container .bew-elements-post .bew-blog-excerpt' );

       $this->get_margin( 'excerpt_margin', '.bew-elements-container .bew-elements-post .bew-blog-excerpt' );

        $this->end_controls_section();

        $this->start_controls_section(
			'bew_elements_meta_style',
			[
				'label' => __( 'Meta', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_normal_color( 'meta_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce'), '.bew-post-meta', 'color' );

		$this->get_normal_color( 'meta_hover_color', esc_html__( 'Color: Hover', 'bosa-elementor-for-woocommerce'), '.bew-post-meta > div:hover', 'color' );

		$this->get_title_typography( 'meta_typography', '.bew-post-meta a' );

		$this->add_responsive_control(
			'icon-size',
			[
				'label' => esc_html__( 'Icon Size', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 40,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'default' => [
					'unit' => 'px',
					'size' => 13,
				],
				'desktop_default' => [
					'size' => 13,
				],
				'tablet_default' => [
					'size' => 13,
				],
				'mobile_default' => [
					'size' => 13
				],
				'selectors' => [
					'{{WRAPPER}} .bew-post-meta i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->get_item_margin( 'meta_icon_spacing', '.bew-post-meta .icon_space', esc_html__( 'Icon Spacing', 'bosa-elementor-for-woocommerce' ) );

		$this->get_item_spacing( 'meta_spacing', '.bew-post-meta > div' );

		$this->get_margin( 'meta_margin', '.bew-post-meta' );

		$this->get_padding( 'meta_padding', '.bew-post-meta' );

        $this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Button / Read More', 'bosa-elementor-for-woocommerce' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => $section_condition['section_condition'],
			]
		);

		$this->register_button_style_controls( );
		
		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_products_pagination',
			[
				'label' => __( 'Pagination', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pagination_typography',
				'selector' => '{{WRAPPER}} ul.page-numbers .page-numbers',
			]
		);

		$this->start_controls_tabs(
			'pagination_tabs'
		);
		
		$this->start_controls_tab(
			'pagination_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color( 'pagination_color', 'Color', '.bew-pagination ul.page-numbers .page-numbers', 'color' );

		$this->get_normal_color( 'pagination_background_color', 'Background Color', '.bew-pagination ul.page-numbers .page-numbers', 'background-color' );

		$this->get_normal_color( 'blog_pagination_border_color', 'Border Color', '.bew-pagination ul.page-numbers .page-numbers', 'border-color' );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'pagination_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color( 'pagination_hover_color', 'Color', '.bew-pagination ul.page-numbers .page-numbers:hover', 'color' );

		$this->get_normal_color( 'pagination_hover_background_color', 'Background Color', '.bew-pagination ul.page-numbers .page-numbers:hover', 'background-color' );

		$this->get_normal_color( 'pagination_hover_border_color', 'Border Color', '.bew-pagination ul.page-numbers .page-numbers:hover', 'border-color' );
		
		$this->end_controls_tab();

		$this->start_controls_tab(
			'pagination_current_tab',
			[
				'label' => esc_html__( 'Current', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color( 'pagination_current_color', 'Color', '.bew-pagination ul.page-numbers .page-numbers.current', 'color' );

		$this->get_normal_color( 'pagination_current_background_color', 'Background Color', '.bew-pagination ul.page-numbers .page-numbers.current', 'background-color' );

		$this->get_normal_color( 'pagination_current_border_color', 'Border Color', '.bew-pagination ul.page-numbers .page-numbers.current', 'border-color' );

		$this->end_controls_tabs();

		$this->end_controls_tabs();

		$this->add_control(
			'pagination_heading',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'pagination_size',
			[
				'label' => esc_html__( 'Item Size', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 100,
						'step'	=> 1
					],
				],
				'selectors' => [
					'{{WRAPPER}} .page-numbers .page-numbers, {{WRAPPER}} .nav-links .page-numbers' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'pagination_spacing',
			[
				'label' => esc_html__( 'Item Spacing', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
						'step'	=> 1
					],
				],
				'selectors' => [
					'{{WRAPPER}} .page-numbers .page-numbers, {{WRAPPER}} .nav-links .page-numbers' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'pagination_border',
				'label' => esc_html__( 'Border', 'bosa-elementor-for-woocommerce' ),
				'selector' => '{{WRAPPER}} ul.page-numbers .page-numbers',
			]
		);

		$this->get_border_radius( 'pagination_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), 'ul.page-numbers .page-numbers', 'border-radius' );

		$this->get_margin( 'pagination_margin', '.bew-pagination ul.page-numbers' );

		$this->end_controls_section();

	}

	protected function render_btn_text( Widget_Base $instance = null ) {
		// The default instance should be `$this` (a Button widget), unless the Trait is being used from outside of a widget (e.g. `Skin_Base`) which should pass an `$instance`.
		if ( empty( $instance ) ) {
			$instance = $this;
		}

		$settings = $instance->get_settings_for_display();

		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();

		if ( ! $is_new && empty( $settings['icon_align'] ) ) {
			// @todo: remove when deprecated
			// added as bc in 2.6
			// old default
			$settings['icon_align'] = $instance->get_settings( 'icon_align' );
		}

		$instance->add_render_attribute( [
			'content-wrapper' => [
				'class' => 'elementor-button-content-wrapper',
			],
			'icon-align' => [
				'class' => [
					'elementor-button-icon',
					'elementor-align-icon-' . $settings['icon_align'],
				],
			],
			'text' => [
				'class' => 'elementor-button-text',
			],
		] );

		// TODO: replace the protected with public
		//$instance->add_inline_editing_attributes( 'text', 'none' );
		?>
		<span <?php $instance->print_render_attribute_string( 'content-wrapper' ); ?>>
			<?php if ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
				<span <?php $instance->print_render_attribute_string( 'icon-align' ); ?>>
				<?php if ( $is_new || $migrated ) :
					Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
				else : ?>
					<i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
				<?php endif; ?>
			</span>
			<?php endif; ?>
			<span <?php $instance->print_render_attribute_string( 'text' ); ?>><?php $this->print_unescaped_setting( 'read_more_text' ); ?></span>
		</span>
		<?php
	}

	protected function render() {
        $settings       		= $this->get_settings_for_display();
        $items_no           	= $settings['items_no'];
		$post_type 				= $settings['post_type'];
		$post_type 				= $post_type ? $post_type : 'post';
		$posts_per_page 		= $settings['items_no'];
		$order 					= $settings['order'];
		$orderby  				= $settings['orderby'];
	    $include_categories 	= $settings['include_categories'];
	    $exclude_categories		= $settings['exclude_categories'];
		$pagination  			= $settings['pagination'];
		
		$title_visibility   	= $settings['title_visibility'];
		$date_visibility 		= $settings['date_visibility'];
		$excerpt_visibility 	= $settings['excerpt_visibility'];
		$author_visibility		= $settings['author_visibility'];
		$comments_visibility 	= $settings['comments_visibility'];
		$cat_visibility 		= $settings['cat_visibility'];

		$include_categories = explode( ',', $include_categories ?? '' );
		$exclude_categories = explode( ',', $exclude_categories ?? '' );

		$categories_in = $categories_out = [];

		if( $post_type === 'post' ) {
			foreach( $include_categories as $include_category ) {
				$cat_data = get_category_by_slug( $include_category );
				if( is_object( $cat_data ) ) {
					array_push( $categories_in, $cat_data->term_id );
				}
			}

			foreach( $exclude_categories as $exclude_category ) {
				$cat_data = get_category_by_slug( $exclude_category );
				if( is_object( $cat_data ) ) {
					array_push( $categories_out, $cat_data->term_id );	
				}
			}
		}

		if( $post_type === 'product' ) {
			foreach( $include_categories as $include_category ) {
				$cat_data = get_term_by( 'slug', $include_category, 'product_cat' );
				if( is_object( $cat_data ) ) {
					array_push( $categories_in, $cat_data->term_id );
				}
			}

			foreach( $exclude_categories as $exclude_category ) {
				$cat_data = get_term_by( 'slug', $exclude_category, 'product_cat' );
				if( is_object( $cat_data ) ) {
					array_push( $categories_out, $cat_data->term_id );
				}
			}
		}
       
        // Paged
		global $paged;
		if(get_query_var('paged')) {
			$paged = get_query_var('paged');
		} else if(get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		if( $post_type === 'post' ) {
			$args = array(
				'post_type'          => $post_type,
				'posts_per_page'    => $posts_per_page,
				'cat'				=> $categories_in,
				'category__not_in'  => $categories_out,
			   );
		} else if( $post_type === 'product' ) {
			$args = array(
				'post_type' 		=> 'product',
				'posts_per_page'	=> $posts_per_page,
				'tax_query'			=> array(											
											'relation' => 'AND',
											array(
												'taxonomy' => 'product_cat',
												'terms' => $categories_in,
												'operator' => 'IN',
											),
											array(
												'taxonomy' => 'product_cat',
												'terms' => $categories_out,
												'operator' => 'NOT IN',
											),
											array(
												'taxonomy' => 'product_visibility',
												'field' => 'name',
												'terms' => 'exclude-from-catalog',
												'operator' => 'NOT IN',
											),
										),
											
									);
			
		} else {
			$args = array(
				'post_type' 		=> $post_type,
				'posts_per_page'	=> $posts_per_page,
				'order'             => $order,
				'orderby'           => $orderby,
			);
		}

		$args['paged'] 		= $paged;
		$args['order'] 		= $order;
		$args['orderby'] 	= $orderby;

		// Wrapper classes
		$wrapper_classes = array('bew-blog-grid');

		if('masonry' === $settings['grid_style']) {
			$wrapper_classes[] = 'bew-masonry';
		}else{
			if('yes' === $settings['equal_heights']) {
				$wrapper_classes[] = 'bew-match-height-grid';
			}
		}

		$wrapper_classes = implode(' ', $wrapper_classes);

		// Image size
		$img_size 		= $settings['image_size'];
		$img_size 		= $img_size ? $img_size : 'medium_large';

		$instance = $this;

		$button_alignment = '';
		if ( ! empty( $settings['align'] ) ) {
			$button_alignment = 'elementor-align-'. $settings[ 'align' ];
		}
		$instance->add_render_attribute( 'button-alignment', 'class', [ 'bew-blog-btn', $button_alignment ] );
		
		$instance->add_render_attribute( 'button', 'class', 'read-more-blog' );
		$instance->add_render_attribute( 'button', 'role', 'button' );
		$instance->add_link_attributes( 'button', array( 'link' => array('url' => get_the_permalink() )) );
		$instance->add_render_attribute( 'button', 'class', 'elementor-button-link' );

		if ( ! empty( $settings['button_css_id'] ) ) {
			$instance->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
		}

		if ( ! empty( $settings['size'] ) ) {
			$instance->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['size'] );
		}

		if ( ! empty( $settings['hover_animation'] ) ) {
			$instance->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}

		?>

		<section class="bew-elements-widgets display-grid bew-elements-container <?php echo esc_attr($wrapper_classes); ?>" <?php echo $this->get_column_attr($settings); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
            <?php
                $query = new \WP_Query( $args );
                if($query->have_posts()) {
                    while($query->have_posts()) {
                        $query->the_post();
                        $image_id 				= get_post_thumbnail_id();
                        $image_alt 				= get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                        $get_author_id 			= get_the_author_meta( 'ID' );
                        $get_author_gravatar 	= get_avatar_url($get_author_id, array('size' => 450));
						if( $post_type === 'post' ) {
							$tax_name = 'category';
						} else if( $post_type === 'product' ) {
							$tax_name = 'product_cat';
						}
						$post_categories    = get_the_terms(get_the_ID(), $tax_name);
						$cat_separator 		= $settings['cat_separator'];
            ?>

                <div class="bew-elements-post">
                    <article class="bew-elements-post-inner">
                    	<?php if(has_post_thumbnail()) { ?>
	                    	<div class="bew-featured-image">
	                    		<a href="<?php the_permalink(); ?>">
			                       <?php
										// Display post thumbnail
										the_post_thumbnail($img_size, array(
											'alt'		=> get_the_title(),
											'itemprop' 	=> 'image',
										));
								   ?>
								</a>
		                    </div>
	                    <?php } ?>
	                    <div class="bew-blog-content">
	                        <?php $content = apply_filters('the_content', get_the_content()); ?>
	                        <?php if( $cat_visibility === 'yes' ) : ?>
							<div class="bew-blog-categories">
								<?php
								$cat_i = 0;
								foreach( $post_categories as $post_category ) {
									if ( 0 < $cat_i ) {
										?>
										<span class="cat-separator"><?php echo esc_html( $cat_separator ); ?></span>
									<?php } ?>
									<a href="<?php echo esc_url( get_term_link( $post_category->term_id ) ); ?>" class=""><?php echo esc_html( $post_category->name ); ?></a>									
								<?php $cat_i++; } ?>
							</div>
							<?php endif; ?>
							<?php if( $title_visibility === 'yes' ) : ?>
								<h3 class="bew-blog-title">
									<a href="<?php the_permalink(); ?>">
		                        		<?php esc_html(the_title()); ?>
									</a>
								</h3>
							<?php endif; ?>
	                        <div class="bew-post-meta">
								<?php if( $date_visibility === 'yes' ) : 
										$archive_year  = get_the_time('Y'); 
										$archive_month = get_the_time('m'); 
										$archive_day   = get_the_time('d');
										
									?>
									<div class="bew-post-on">
										<span class="icon_space"><i class="far fa-clock"></i></span>
										<a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day) ); ?>">
											<?php echo esc_html(get_the_date()); ?>
										</a>
									</div>
								<?php endif; ?>
								<?php if('yes' == $comments_visibility && comments_open() && ! post_password_required()) { ?>
									<div class="meta-comments"><span class="icon_space"><i class="far fa-comment"></i></span><?php comments_popup_link(esc_html__('0 Comments', 'bosa-elementor-for-woocommerce'), esc_html__('1 Comment',  'bosa-elementor-for-woocommerce'), esc_html__('% Comments', 'bosa-elementor-for-woocommerce'), 'comments-link'); ?></div>
								<?php } ?>
								<?php if( $author_visibility === 'yes' ) : ?>
									<div class="bew-byline">
										<span class="icon_space"><i class="far fa-user"></i></span>
										<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php esc_attr_e('Visit Author Page', 'bosa-elementor-for-woocommerce'); ?>" class="entry-author-link" rel="author" >
											<?php echo esc_html(get_the_author()); ?>
										</a>
									</div>
								<?php endif; ?>
		                    </div>
							<?php if( $excerpt_visibility === 'yes' ) : ?>
	                        <div class="bew-blog-excerpt">
	                        	<?php echo wp_kses_post(wp_trim_words(get_the_content(), intval( $settings['excerpt_length'] ), '' ) ); ?>
	                        </div>
	                        <?php endif; ?>
							<div <?php $instance->print_render_attribute_string( 'button-alignment' ); ?> >
								<?php if( $settings['enable_button'] == 'yes'): ?>
									<a href="<?php the_permalink(); ?>" <?php $instance->print_render_attribute_string( 'button' ); ?>>
										<?php $this->render_btn_text( $this ); ?>
									</a>
								<?php endif; ?>	
							</div>
	                    </div>
                    </article>
                </div>

            <?php } } \wp_reset_postdata(); ?>
      	</section>
	
	<?php

	// Display pagination if enabled
	if('yes' == $pagination) {
		$this->bew_pagination($query);
	} 

	}
	
}