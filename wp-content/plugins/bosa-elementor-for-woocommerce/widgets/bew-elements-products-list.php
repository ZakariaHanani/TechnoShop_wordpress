<?php

namespace Elementor;

class BEW_Products_list extends BEW_Settings {
	
	public function get_name() {
		return 'bew-elements-product-list';
	}
	
	public function get_title() {
		return __( 'Woo - Products List', 'bosa-elementor-for-woocommerce' );
	}
	
	public function get_icon() {
		return 'bew-widget eicon-post-list';
	}

	public function get_keywords() {
		return [ 'bew', 'product', 'products', "list", "products list", 'bew products', 'woo', 'woo products', 'bosa' ];
	}
	
    protected function register_controls() {

		$this->start_controls_section(
			'bew_elements_products_list',
			[
				'label' => __( 'Content', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_items_no_res( 'column_no', esc_html__( 'Number of Columns', 'bosa-elementor-for-woocommerce' ), 2, 1, 1,1 );

		$this->get_items_no( 'items_no', esc_html__( 'Number of Products', 'bosa-elementor-for-woocommerce' ), 200, 4 );
		
		$this->get_item_visibility( 'products_rating_stars', esc_html__( 'Rating', 'bosa-elementor-for-woocommerce' ), esc_html__( 'Yes', 'bosa-elementor-for-woocommerce' ), esc_html__( 'No', 'bosa-elementor-for-woocommerce' ), $default="yes" );

		$this->get_item_visibility( 'products_icon_group', esc_html__( 'Icon Group', 'bosa-elementor-for-woocommerce' ), esc_html__( 'Yes', 'bosa-elementor-for-woocommerce' ), esc_html__( 'No', 'bosa-elementor-for-woocommerce' ), $default="yes" );

		$this->get_product_image_position( 'image_position', 'Image Position', 'left' );

		$this->add_responsive_control(
			'products_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'bosa-elementor-for-woocommerce' ),
				'options' => [
					'left' => [
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
				'selectors' => [
					'{{WRAPPER}} ul.products li.product, {{WRAPPER}} .woocommerce ul.products li.product .product-inner' => 'text-align: {{VALUE}};',
				],
				'default' => 'left',
			]
		);

		$this->add_responsive_control(
			'products_vertical_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Vertical Alignment', 'bosa-elementor-for-woocommerce' ),
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Top', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => esc_html__( 'Bottom', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'selectors' => [
					'{{WRAPPER}} ul.products li.product, {{WRAPPER}} .woocommerce ul.products li.product .product-inner' => 'align-items: {{VALUE}};',
				],
				'default' => 'center',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_products_list_query',
			[
				'label' => __( 'Query', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'source',
			[
				'label' => esc_html__( 'Source', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'all',
				'options' => [
					'all'  => esc_html__( 'All Products', 'bosa-elementor-for-woocommerce' ),
					'custom-query' => esc_html__( 'Custom Query', 'bosa-elementor-for-woocommerce' ),
					'manual-selection' => esc_html__( 'Manual Selection', 'bosa-elementor-for-woocommerce' ),
				],
			]
		);

		$this->add_control(
			'cat_filter_rule',
			[
				'label' => esc_html__( 'Cat Filter Rule', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'match',
				'options' => [
					'match'  => esc_html__( 'Match Categories', 'bosa-elementor-for-woocommerce' ),
					'exclude' => esc_html__( 'Exclude Categories', 'bosa-elementor-for-woocommerce' ),
				],
				'condition' => [
					'source' => 'custom-query',
				],
			]
		);

		$this->add_control(
			'product_categories',
			[
				'label' => __( 'Select Categories', 'bosa-elementor-for-woocommerce' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'default' => '',
				'options' => $this->_woocommerce_category(),
				'condition' => [
					'source' => 'custom-query',
				],
			]
		);

		$this->add_control(
			'tag_filter_rule',
			[
				'label' => esc_html__( 'Tag Filter Rule', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'match',
				'options' => [
					'match'  => esc_html__( 'Match Tags', 'bosa-elementor-for-woocommerce' ),
					'exclude' => esc_html__( 'Exclude Tags', 'bosa-elementor-for-woocommerce' ),
				],
				'condition' => [
					'source' => 'custom-query',
				],
			]
		);
		
		$this->add_control(
			'product_tags',
			[
				'label' => __( 'Select Tags', 'bosa-elementor-for-woocommerce' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'default' => '',
				'options' => $this->get_woocommerce_tags(),
				'condition' => [
					'source' => 'custom-query',
				],
			]
		);

		$this->add_control(
			'offset',
			[
				'label' => esc_html__( 'Offset', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 200,
				'step' => 1,
				'default' => '',
				'condition' => [
					'source' => 'custom-query',
				],
			]
		);

		$this->add_control(
			'exclude_products',
			[
				'label' => esc_html__( 'Exclude Products', 'bosa-elementor-for-woocommerce' ),
				'label_block' => true,
				'description' => esc_html__( 'Select products to exclude from the query.', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $this->get_woocommerce_products(),
				'default' => '',
				'condition' => [
					'source!' => ['manual-selection'],
				]
			]
		);

		$this->add_control(
			'manual_products',
			[
				'label' => esc_html__( 'Select Products', 'bosa-elementor-for-woocommerce' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $this->get_woocommerce_products(),
				'default' => '',
				'condition' => [
					'source!' => ['all', 'custom-query'],
				]
			]
		);

		$this->add_control(
			'exclude_current_product',
			[
				'label' => esc_html__( 'Exclude Current Product', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'bosa-elementor-for-woocommerce' ),
				'label_off' => esc_html__( 'No', 'bosa-elementor-for-woocommerce' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'source!' => ['manual-selection'],
				]
			]
		);

		$this->add_control(
			'advanced',
			[
				'label' => __('Advanced', 'bosa-elementor-for-woocommerce'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'condition' => [
					'source!' => 'manual-selection',
				],
			]
		);

		$this->add_control(
			'filter_by',
			[
				'label' => esc_html__( 'Filter By', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none'  => esc_html__( 'None', 'bosa-elementor-for-woocommerce' ),
					'featured' => esc_html__( 'Featured', 'bosa-elementor-for-woocommerce' ),
					'sale' => esc_html__( 'Sale', 'bosa-elementor-for-woocommerce' ),
				],
			]
		);

		$this->add_control(
			'order_by',
			[
				'label' => esc_html__( 'Order By', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date'  		=> esc_html__( 'Date', 'bosa-elementor-for-woocommerce' ),
					'title' 		=> esc_html__( 'Title', 'bosa-elementor-for-woocommerce' ),
					'price' 		=> esc_html__( 'Price', 'bosa-elementor-for-woocommerce' ),
					'popularity' 	=> esc_html__( 'Popularity', 'bosa-elementor-for-woocommerce' ),
					'rating'		=> esc_html__( 'Rating', 'bosa-elementor-for-woocommerce' ),	
					'random'		=> esc_html__( 'Random', 'bosa-elementor-for-woocommerce' ),	
					'menu-order'	=> esc_html__( 'Menu Order', 'bosa-elementor-for-woocommerce' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc'  => esc_html__( 'ASC', 'bosa-elementor-for-woocommerce' ),
					'desc' => esc_html__( 'DESC', 'bosa-elementor-for-woocommerce' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_products_list_style',
			[
				'label' => __( 'Item', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_normal_color( 'bg_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product', 'background-color' );

		$this->get_border_attr( 'item_border', '.woocommerce ul.products li.product' );

		$this->get_border_radius( 'item_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product', 'border-radius' );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_box_shadow',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product'
			]
		);

		$this->add_responsive_control(
			'product_columns_gap',
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
					'size' => 15,
				],
				'desktop_default' => [
					'size' => 15,
				],
				'tablet_default' => [
					'size' => 15,
				],
				'mobile_default' => [
					'size' => 15
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce .bew-product-widget ul.products' => 'column-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'product_row_gap',
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
					'size' => 15,
				],
				'desktop_default' => [
					'size' => 15,
				],
				'tablet_default' => [
					'size' => 15,
				],
				'mobile_default' => [
					'size' => 15
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce .bew-product-widget ul.products' => 'row-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->get_padding( 'item_padding', '.woocommerce ul.products li.product' );

        $this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_products_list_img_style',
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
					'{{WRAPPER}} ul.products li .woo-product-image a img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'image_normal_filters',
				'selector' => '{{WRAPPER}} ul.products li .woo-product-image a img',
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
					'{{WRAPPER}} ul.products li .woo-product-image a:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'image_hover_filters',
				'selector' => '{{WRAPPER}} ul.products li .woo-product-image a:hover img',
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
					'{{WRAPPER}} ul.products li .woo-product-image a img' => 'transition-duration: {{SIZE}}s;',
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

		$this->get_border_attr( 'img_border', '.woocommerce ul.products li.product img' );

		$this->get_border_radius( 'img_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product img', 'border-radius' );

		$this->get_margin( 'img_margin', '.woocommerce ul.products li.product img' );

		$this->get_padding( 'img_padding', '.woocommerce ul.products li.product img' );

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_products_list_title',
			[
				'label' => __( 'Title', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_normal_color( 'title_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product .woocommerce-loop-product__title', 'color' );

		$this->get_normal_color( 'hov_title_color', esc_html__( 'Hover Color', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product:hover h2.woocommerce-loop-product__title', 'color' );

		$this->get_title_typography( 'title_typography', '.woocommerce ul.products li.product .woocommerce-loop-product__title' );

		$this->get_margin( 'title_margin', '.woocommerce ul.products li.product .woocommerce-loop-product__title' );

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_products_list_price',
			[
				'label' => __( 'Price', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_normal_color( 'price_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product a .price', 'color' );

		$this->get_normal_color( 'price_hover_color', esc_html__( 'Hover Color', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product a:hover .price', 'color' );

		$this->get_title_typography( 'price_typography', '.woocommerce ul.products li.product .price .amount' );

		$this->add_control(
			'hr_price',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);		

		$this->get_normal_color( 'del_price_color', esc_html__( 'Del Price Color', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product .price del', 'color' );

		$this->get_title_typography( 'del_price_typography', '.woocommerce ul.products li.product .price del .amount' );

		$this->get_margin( 'price_margin', '.woocommerce ul.products li.product .price' );

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_products_list_rating',
			[
				'label' => __( 'Rating', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_normal_color( 'rating_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product .star-rating:before', 'color' );

		$this->get_normal_color( 'rating_active_color', esc_html__( 'Active Color', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product .star-rating span:before', 'color' );

		$this->add_control(
			'rating_star_spacing',
			[
				'label' => esc_html__( 'Star Spacing', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 5,
						'step'	=> 0.5
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .star-rating:before, {{WRAPPER}} .woocommerce ul.products li.product .star-rating span:before' => 'letter-spacing: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'rating_star_size',
			[
				'label' => esc_html__( 'Star Size', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 30,
						'step'	=> 1
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .star-rating:before, {{WRAPPER}} .woocommerce ul.products li.product .star-rating span:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->get_margin( 'rating_star_margin', '.woocommerce ul.products li.product .star-rating' );

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_products_list_button',
			[
				'label' => __( 'Button', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_title_typography( 'button_typography', '.bew-product-widget a.button, {{WRAPPER}} .bew-product-widget a.product_type_grouped, {{WRAPPER}} .bew-product-widget a.product_type_external' );

		$this->start_controls_tabs(
			'button_tabs'
		);

		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color( 'btn_txt_color', esc_html__( 'Text Color', 'bosa-elementor-for-woocommerce' ), '.bew-product-widget a.button, {{WRAPPER}} .bew-product-widget a.product_type_grouped, {{WRAPPER}} .bew-product-widget a.product_type_external', 'color' );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'btn_bg_color',
				'label' => esc_html__( 'Background', 'bosa-elementor-for-woocommerce' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .bew-product-widget a.button, {{WRAPPER}} .bew-product-widget a.product_type_grouped, {{WRAPPER}} .bew-product-widget a.product_type_external',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color( 'btn_hov_txt_color', esc_html__( 'Text Color', 'bosa-elementor-for-woocommerce' ), '.bew-product-widget a.button:hover, {{WRAPPER}} .bew-product-widget a.product_type_grouped:hover, {{WRAPPER}} .bew-product-widget a.product_type_external:hover', 'color' );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'btn_hov_bg_color',
				'label' => esc_html__( 'Background', 'bosa-elementor-for-woocommerce' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .bew-product-widget a.button:hover, {{WRAPPER}} .bew-product-widget a.product_type_grouped:hover, {{WRAPPER}} .bew-product-widget a.product_type_external:hover',
			]
		);

		$this->get_normal_color( 'btn_hov_border_color', esc_html__( 'Border Color', 'bosa-elementor-for-woocommerce' ), '.bew-product-widget a.button:hover, {{WRAPPER}} .bew-product-widget a.product_type_grouped:hover, {{WRAPPER}} .bew-product-widget a.product_type_external:hover', 'border-color' );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->get_border_attr( 'btn_border', '.bew-product-widget a.add_to_cart_button, {{WRAPPER}} .bew-product-widget a.product_type_grouped, {{WRAPPER}} .bew-product-widget a.product_type_external' );

		$this->get_border_radius( 'btn_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.bew-product-widget a.add_to_cart_button, {{WRAPPER}} .bew-product-widget a.product_type_grouped, {{WRAPPER}} .bew-product-widget a.product_type_external', 'border-radius' );

		$this->get_margin( 'btn_margin', '.bew-product-widget a.add_to_cart_button, {{WRAPPER}} .bew-product-widget a.product_type_grouped, {{WRAPPER}} .bew-product-widget a.product_type_external' );

		$this->get_padding( 'btn_padding', '.bew-product-widget a.add_to_cart_button, {{WRAPPER}} .bew-product-widget a.product_type_grouped, {{WRAPPER}} .bew-product-widget a.product_type_external' );

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_products_list_sale',
			[
				'label' => __( 'Sale', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_title_typography( 'sale_typography', '.bew-product-widget .product .onsale' );

		$this->get_normal_color( 'sale_bg_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.bew-product-widget .product .onsale', 'background-color' );

		$this->get_normal_color( 'sale_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product .onsale', 'color' );

		$this->get_border_attr( 'sale_border', '.woocommerce ul.products li.product .onsale' );

		$this->get_border_radius( 'sale_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.woocommerce ul.products li.product .onsale', 'border-radius' );

		$this->get_margin( 'sale_margin', '.woocommerce ul.products li.product .onsale' );

		$this->get_padding( 'sale_padding', '.woocommerce ul.products li.product .onsale' );

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_icon_group_style',
			[
				'label' => __( 'Icon Group', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_normal_color( 'product_icon_group_bg_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.bew-product-list-widget-container ul.products li .product-compare-wishlist a', 'background-color' );

		$this->get_normal_color( 'product_icon_group_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.bew-product-list-widget-container ul.products li .product-compare-wishlist a i', 'color' );

		$this->end_controls_section();
	}

	protected function render() {
        $settings 					= $this->get_settings_for_display();
        $products_no 				= $settings['items_no'];
        $source 					= $settings['source'];
        $exclude_products 			= $settings['exclude_products'];
        $exclude_current_product 	= $settings['exclude_current_product'];
        $filter_by 					= $settings['filter_by'];
        $cat_filter_rule 			= $settings['cat_filter_rule'];
        $tag_filter_rule 			= $settings['tag_filter_rule'];
        $offset 					= $settings['offset'];
        $product_categories 		= $settings['product_categories'];
        $product_tags 				= $settings['product_tags'];
        $manual_products 			= $settings['manual_products'];
        $order_by 					= $settings['order_by'];
        $order 						= $settings['order'];

        $image_class = '';
        if( 'right' === $settings['image_position']) {
			$image_class = 'product-list-image-right';
		}

        $wrapper_classes = array();

		if('yes' !== $settings['products_rating_stars']) {
			$wrapper_classes[] = 'bew-hide-product-rating';
		}

		if('yes' !== $settings['products_icon_group']) {
			$wrapper_classes[] = 'bew-hide-icon-group';
		}

		$wrapper_classes = implode(' ', $wrapper_classes);
		?>
		
            	<?php

					if( $source === 'all' ) {
						$args = array(
									'post_type' 		=> 'product',
									'posts_per_page'	=> $products_no,
								);
						if( isset( $exclude_products ) && !empty( $exclude_products ) ) {
							$args['post__not_in'] = $exclude_products;
						}
						if( isset( $exclude_current_product ) && $exclude_current_product == 'yes' ) {
							$args['post__not_in'][] = $post->ID;
						}
						if( $filter_by === 'none' || $filter_by === 'sale' ) {
							$args['tax_query'] = array(
								array(
									'taxonomy' => 'product_visibility',
									'field' => 'name',
									'terms' => 'exclude-from-catalog',
									'operator' => 'NOT IN',
								)
							); 
						}
						if( $filter_by === 'featured' ) {
							$args['tax_query'] = array(
													'relation' => 'AND',
													array(
														'taxonomy' => 'product_visibility',
														'field' => 'name',
														'terms'    => 'featured',
													), 
													array(
														'taxonomy' => 'product_visibility',
														'field' => 'name',
														'terms' => 'exclude-from-catalog',
														'operator' => 'NOT IN',
													)
												);
						}
						if( $filter_by === 'sale' ) {
							$args['meta_query'] = array(
													'relation' => 'OR',
													array( // Simple products type
														'key'           => '_sale_price',
														'value'         => 0,
														'compare'       => '>',
														'type'          => 'numeric'
													),
													array( // Variable products type
														'key'           => '_min_variation_sale_price',
														'value'         => 0,
														'compare'       => '>',
														'type'          => 'numeric'
													)
												);
						}
					} else if( $source === 'custom-query' ) {
						$args = array(
							'post_type' 		=> 'product',
							'posts_per_page'	=> $products_no,
						);
						if( $filter_by === 'sale' ) {
							$args['meta_query'] = array(
													'relation' => 'OR',
													array( // Simple products type
														'key'           => '_sale_price',
														'value'         => 0,
														'compare'       => '>',
														'type'          => 'numeric'
													),
													array( // Variable products type
														'key'           => '_min_variation_sale_price',
														'value'         => 0,
														'compare'       => '>',
														'type'          => 'numeric'
													)
												);
						}
						if( $cat_filter_rule === 'match' && $tag_filter_rule === 'match' ) {
							$args['tax_query'] = array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_visibility',
									'field' => 'name',
									'terms' => 'exclude-from-catalog',
									'operator' => 'NOT IN',
								),
								array(
									'relation' => 'OR',
									array(
										'taxonomy' => 'product_cat',
										'terms' => $product_categories,
										'operator' => 'IN',
									),
									array(
										'taxonomy' => 'product_tag',
										'terms' => $product_tags,
										'operator' => 'IN',
									)
								)
							);
						} else if( $cat_filter_rule === 'match' && $tag_filter_rule === 'exclude' ) {
							$args['tax_query'] = array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_cat',
									'terms' => $product_categories,
									'operator' => 'IN',
								),
								array(
									'taxonomy' => 'product_tag',
									'terms' => $product_tags,
									'operator' => 'NOT IN',
								),
								array(
									'taxonomy' => 'product_visibility',
									'field' => 'name',
									'terms' => 'exclude-from-catalog',
									'operator' => 'NOT IN',
								),
							);
						} else if( $cat_filter_rule === 'exclude' && $tag_filter_rule === 'match' ) {
							$args['tax_query'] = array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_visibility',
									'field' => 'name',
									'terms' => 'exclude-from-catalog',
									'operator' => 'NOT IN',
								),
								array(
									'relation' => 'OR',
									array(
										'taxonomy' => 'product_cat',
										'terms' => $product_categories,
										'operator' => 'NOT IN',
									),
									array(
										'taxonomy' => 'product_tag',
										'terms' => $product_tags,
										'operator' => 'IN',
									)
								)
							);
						} else if( $cat_filter_rule === 'exclude' && $tag_filter_rule === 'exclude' ) {
							$args['tax_query'] = array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_cat',
									'terms' => $product_categories,
									'operator' => 'NOT IN',
								),
								array(
									'taxonomy' => 'product_tag',
									'terms' => $product_tags,
									'operator' => 'NOT IN',
								),
								array(
									'taxonomy' => 'product_visibility',
									'field' => 'name',
									'terms' => 'exclude-from-catalog',
									'operator' => 'NOT IN',
								),
							);
						} 
						if( isset( $exclude_products ) && !empty( $exclude_products ) ) {
							$args['post__not_in'] = $exclude_products;
						}
						if( isset( $exclude_current_product ) && $exclude_current_product == 'yes' ) {
							$args['post__not_in'][] = $post->ID;
						}
						if( isset( $offset ) && !empty( $offset ) ) {
							$args['offset'] = $offset;
						}

						if( $cat_filter_rule === 'match' && $tag_filter_rule === 'match' && $filter_by === 'featured' ) {
							$args['tax_query'] = array(
								'relation' => 'AND',
								array(
									'relation' => 'OR',
									array(
										'taxonomy' => 'product_cat',
										'terms' => $product_categories,
										'operator' => 'IN',
									),
									array(
										'taxonomy' => 'product_tag',
										'terms' => $product_tags,
										'operator' => 'IN',
									),
								),					
								array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_visibility',
										'field' => 'name',
										'terms'    => 'featured',
									), 
									array(
										'taxonomy' => 'product_visibility',
										'field' => 'name',
										'terms' => 'exclude-from-catalog',
										'operator' => 'NOT IN',
									),
								)
							);
						}
						
						if( $cat_filter_rule === 'match' && $tag_filter_rule === 'exclude' && $filter_by === 'featured' ) {
							$args['tax_query'] = array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_visibility',
									'field' => 'name',
									'terms'    => 'featured',
								), 
								array(
									'taxonomy' => 'product_visibility',
									'field' => 'name',
									'terms' => 'exclude-from-catalog',
									'operator' => 'NOT IN',
								),
								array(
									'taxonomy' => 'product_cat',
									'terms' => $product_categories,
									'operator' => 'IN',
								),
								array(
									'taxonomy' => 'product_tag',
									'terms' => $product_tags,
									'operator' => 'NOT IN',
								)
							);
						}

						if( $cat_filter_rule === 'exclude' && $tag_filter_rule === 'match' && $filter_by === 'featured' ) {
							$args['tax_query'] = array(
								'relation' => 'AND',
								array( 
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_visibility',
										'field' => 'name',
										'terms'    => 'featured',
									), 
									array(
										'taxonomy' => 'product_visibility',
										'field' => 'name',
										'terms' => 'exclude-from-catalog',
										'operator' => 'NOT IN',
									),
								),
								array(
									'relation' => 'OR',
									array(
										'taxonomy' => 'product_cat',
										'terms' => $product_categories,
										'operator' => 'NOT IN',
									),
									array(
										'taxonomy' => 'product_tag',
										'terms' => $product_tags,
										'operator' => 'IN',
									)
								)
							);
						}

						if( $cat_filter_rule === 'exclude' && $tag_filter_rule === 'exclude' && $filter_by === 'featured' ) {
							$args['tax_query'] = array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_visibility',
									'field' => 'name',
									'terms'    => 'featured',
								), 
								array(
									'taxonomy' => 'product_visibility',
									'field' => 'name',
									'terms' => 'exclude-from-catalog',
									'operator' => 'NOT IN',
								),
								array(
									'taxonomy' => 'product_cat',
									'terms' => $product_categories,
									'operator' => 'NOT IN',
								),
								array(
									'taxonomy' => 'product_tag',
									'terms' => $product_tags,
									'operator' => 'NOT IN',
								)
							);
						}

					} else {
						$args = array(
							'post_type' 		=> 'product',
							'posts_per_page'	=> $products_no,
							'post__in'			=> empty( $manual_products ) ? [0] : $manual_products,
						);
						
						if( $filter_by === 'none' || $filter_by === 'sale' ) {
							$args['tax_query'] = array(
													array(
														'taxonomy' => 'product_visibility',
														'field' => 'name',
														'terms' => 'exclude-from-catalog',
														'operator' => 'NOT IN',
													)
												);
						}
						if( $filter_by === 'featured' ) {
							$args['tax_query'] = array(
													'relation' => 'AND',
													array(
														'taxonomy' => 'product_visibility',
														'field' => 'name',
														'terms'    => 'featured',
													), 
													array(
														'taxonomy' => 'product_visibility',
														'field' => 'name',
														'terms' => 'exclude-from-catalog',
														'operator' => 'NOT IN',
													)
												);
						}
						if( $filter_by === 'sale' ) {
							$args['meta_query'] = array(
													'relation' => 'OR',
													array( // Simple products type
														'key'           => '_sale_price',
														'value'         => 0,
														'compare'       => '>',
														'type'          => 'numeric'
													),
													array( // Variable products type
														'key'           => '_min_variation_sale_price',
														'value'         => 0,
														'compare'       => '>',
														'type'          => 'numeric'
													)
												);
						}
					}

					switch( $order_by ) {
						case 'date':
							$args['orderby'] 	= 'date';
							$args['order'] 		= $order;
							break;
						case 'title':
							$args['orderby'] 	= 'title';
							$args['order'] 		= $order;
							break;
						case 'price':
							$args['orderby'] 	= 'meta_value_num';
							$args['meta_key'] 	= '_price';
							$args['order'] 		= $order;
							break;
						case 'popularity':
							$args['orderby'] 	= 'meta_value_num';
							$args['meta_key'] 	= 'total_sales';
							$args['order'] 		= $order;
							break;
						case 'rating':
							$args['orderby'] 	= 'meta_value_num';
							$args['meta_key'] 	= '_wc_average_rating';
							$args['order'] 		= $order;
							break;
						case 'random':
							$args['orderby'] = 'rand';
							break;
						case 'menu-order':
							$args['orderby'] 	= 'menu_order title';
							$args['order'] 		= $order;
							break;
					}

	                $products_loop = new \WP_Query( $args );
	                if ( $products_loop->have_posts() ) {
	                	?>
	                	<div class="bew-elements-widgets bew-product-list-widget-container woocommerce" <?php echo $this->get_column_attr($settings , 1, 1, 1); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
            				<div class="bew-product-widget <?php echo esc_attr($wrapper_classes); ?>">
            					<ul class="products">
            						<?php while ( $products_loop->have_posts() ) : $products_loop->the_post(); ?>
			                			<?php
			                			global $product;

										// Ensure visibility.
										if ( empty( $product ) || ! $product->is_visible() ) {
											return;
										}
										?>
										<li <?php wc_product_class( '', $product ); ?>>
											<div class="product-inner <?php echo esc_attr( $image_class ); ?>">
												<figure class="woo-product-image">
													<?php
													do_action( 'bew_woo_widget_quickview_content' );

													woocommerce_template_loop_product_link_open();

													do_action( 'bew_woo_widget_product_hover_image' );

													woocommerce_show_product_loop_sale_flash();
													woocommerce_template_loop_product_thumbnail();
													woocommerce_template_loop_product_link_close();

													do_action( 'bew_woo_widget_quickview_icon' );
													?>
												</figure>
												<div class="product-inner-contents">
													<?php 
													woocommerce_template_loop_product_link_open();
													woocommerce_template_loop_product_title();

													do_action( 'bew_woo_widget_zero_rating' );

													woocommerce_template_loop_rating();
													woocommerce_template_loop_price();
													woocommerce_template_loop_product_link_close();
													?>
													<div class="button-cart_button">
														<?php
														woocommerce_template_loop_add_to_cart();
														?>
													</div>
												</div>
											</div>
											<?php do_action( 'bew_woo_widget_sale_countdown' ); ?>
										</li>
		                    		<?php endwhile; ?>
			                    </ul>
							</div>
      					</div>
      				<?php
	                } else {
	                	?>
	                	<div class="bew-error">
	                		<?php echo esc_html__( 'No products found. Please verify that the WooCommerce plugin is active and there are products.', 'bosa-elementor-for-woocommerce' ); ?>
	                	</div>
	                	<?php
	                }
	                \wp_reset_postdata();
	            ?>
	<?php

	}
}