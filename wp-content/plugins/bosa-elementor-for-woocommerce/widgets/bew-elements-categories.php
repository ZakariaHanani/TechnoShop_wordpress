<?php

namespace Elementor;

class BEW_Categories extends BEW_Settings {
	
	public function get_name() {
		return 'bew-elements-product-categories';
	}
	
	public function get_title() {
		return __( 'Woo - Categories', 'bosa-elementor-for-woocommerce' );
	}
	
	public function get_icon() {
		return 'bew-widget eicon-product-categories';
	}

	public function get_keywords() {
		return [ 'bew', 'categories', 'bew categories', 'woo', 'woo categories', 'bosa' ];
	}
	
	public function get_categories() {
		return [ 'bosa-elementor-for-woocommerce' ];
	}

    protected function register_controls() {

		$this->start_controls_section(
			'bew_elements_product_categories',
			[
				'label' => __( 'Content', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->get_items_no_res( 'column_no', esc_html__( 'Number of Columns', 'bosa-elementor-for-woocommerce' ), 6 );

		$this->add_control(
			'categories_no',
			[
				'label' => esc_html__( 'Number of Categories', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
			]
		);

		$this->add_control(
			'image_size',
			[
				'label' 		=> __( 'Image Size', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'medium',
				'options' 		=> $this->get_img_sizes(),
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
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
					'{{WRAPPER}} .product-category h3.woocommerce-loop-category__title' => 'text-align: {{VALUE}};',
				],
				'default' => 'center',
				'toggle' => true,
			]
		);

		$this->get_item_visibility( 'categories_products_equal_heights', esc_html__( 'Equal Heights', 'bosa-elementor-for-woocommerce' ), esc_html__( 'Yes', 'bosa-elementor-for-woocommerce' ), esc_html__( 'No', 'bosa-elementor-for-woocommerce' ), $default="no" );		

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_product_categories_query',
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
				'default' => 'show-all',
				'options' => [
					'show-all'  => esc_html__( 'Show All', 'bosa-elementor-for-woocommerce' ),
					'manual-selection' => esc_html__( 'Manual Selection', 'bosa-elementor-for-woocommerce' ),
					'by-parent' => esc_html__( 'By Parent', 'bosa-elementor-for-woocommerce' ),
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
				'default' => $this->get_woocommerce_uncategorized_id(),
				'options' => $this->_woocommerce_category(),
				'condition' => [
					'source' => 'manual-selection',
				],
			]
		);

		$this->add_control(
			'parent',
			[
				'label' => esc_html__( 'Parent', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => $this->_woocommerce_category( true ),
				'condition' => [
					'source' => 'by-parent',
				],
			]
		);

		$this->add_control(
			'hide_empty',
			[
				'label' => esc_html__( 'Hide Empty', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bosa-elementor-for-woocommerce' ),
				'label_off' => esc_html__( 'Hide', 'bosa-elementor-for-woocommerce' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'order_by',
			[
				'label' => esc_html__( 'Order By', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'name',
				'options' => [
					'name'  => esc_html__( 'Name', 'bosa-elementor-for-woocommerce' ),
					'slug' => esc_html__( 'Slug', 'bosa-elementor-for-woocommerce' ),
					'description' => esc_html__( 'Description', 'bosa-elementor-for-woocommerce' ),
					'count' => esc_html__( 'Count', 'bosa-elementor-for-woocommerce' ),
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
			'bew_elements_product_categories_item_style',
			[
				'label' => __( 'Item', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_normal_color( 'bg_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories li.product .product-wrapper', 'background-color' );

		$this->get_border_attr( 'item_border', '.bew-elements-product-categories li.product .product-wrapper' );

		$this->get_border_radius( 'item_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories li.product .product-wrapper', 'border-radius' );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_box_shadow',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product'
			]
		);

		$this->get_margin( 'item_margin', '.bew-elements-product-categories li.product' );

		$this->get_padding( 'item_padding', '.bew-elements-product-categories li.product' );

        $this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_product_categories_image_style',
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
					'{{WRAPPER}} ul.products li a .products-cat-image img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'image_normal_filters',
				'selector' => '{{WRAPPER}} ul.products li a .products-cat-image img',
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
					'{{WRAPPER}} ul.products li a:hover .products-cat-image img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'image_hover_filters',
				'selector' => '{{WRAPPER}} ul.products li a:hover .products-cat-image img',
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
					'{{WRAPPER}} ul.products li a .products-cat-image img' => 'transition-duration: {{SIZE}}s;',
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

		$this->get_border_attr( 'img_border', '.bew-elements-product-categories li.product img' );

		$this->get_border_radius( 'img_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories li.product img', 'border-radius' );

		$this->get_margin( 'img_margin', '.bew-elements-product-categories li.product img' );

		$this->get_padding( 'img_padding', '.bew-elements-product-categories li.product img' );

		$this->end_controls_section();

        $this->start_controls_section(
			'bew_elements_product_categories_title_style',
			[
				'label' => __( 'Title', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->get_normal_color( 'title_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.product-category h3.woocommerce-loop-category__title', 'color' );

		$this->get_normal_color( 'hov_title_color', esc_html__( 'Hover Color', 'bosa-elementor-for-woocommerce' ), '.product-category:hover h3.woocommerce-loop-category__title', 'color' );

		$this->get_title_typography('title_typography', '.product-category h3.woocommerce-loop-category__title');

		$this->get_margin( 'title_margin', 'li.product .woocommerce-loop-category__title' );

		$this->get_padding( 'title_padding', 'li.product .woocommerce-loop-category__title' );

		$this->end_controls_section();

	}

	protected function render() {
        $settings       	        = $this->get_settings_for_display();
		$source						= $settings['source'];
		$parent 					= $settings['parent'];
		$hide_empty					= ( $settings['hide_empty'] == 'yes' ) ? false : true ;
		$order_by					= $settings['order_by'];
		$order						= $settings['order'];
		$product_category_ids   	= $settings['product_categories'] ? $settings['product_categories'] : [];
		$categories_no 				= $settings['categories_no'];
		
		// Image size
		$img_size 					= $settings['image_size'];
		$img_size 					= $img_size ? $img_size : 'woocommerce_thumbnail';

		if( $source == 'show-all' ) {
			$cat_args 					= array(
											'taxonomy'   => 'product_cat',
											'orderby'    => $order_by,
											'order'      => $order,
											'hide_empty' => $hide_empty,
											'include'	 => 'all',
											'number'	 => $categories_no,
										);
		} else if( $source == 'manual-selection' ) {
			$cat_args 					= array(
											'taxonomy'   => 'product_cat',
											'orderby'    => $order_by,
											'order'      => $order,
											'hide_empty' => $hide_empty,
											'include'	 => $product_category_ids,
											'number'     => $categories_no,
										);
		} else {
			$cat_args 					= array(
											'taxonomy'   => 'product_cat',
											'orderby'    => $order_by,
											'order'      => $order,
											'hide_empty' => $hide_empty,
											'parent'	 => $parent,
											'number'     => $categories_no,
										);
		}
		$product_categories_final = [];
		$product_categories = get_terms( $cat_args );
		if( is_array( $product_categories ) && !empty( $product_categories ) ){
			foreach( $product_categories as $product_category ) {
				array_push( $product_categories_final, $product_category->term_id );
			}
		}
		$cat_classes = '';
		if('yes' === $settings['categories_products_equal_heights']) {
			$cat_classes = 'bew-match-height-categories';
		}
	?>

		
            <?php
            $count = 0; 
            if( !empty( $product_categories_final ) ) {
            	?>
            	<section class="bew-elements-widgets bew-elements-product-categories woocommerce" <?php echo $this->get_column_attr($settings); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
					<ul class="products <?php echo esc_attr($cat_classes); ?>">
		                <?php
		                foreach ( $product_categories_final as $key ) {          
		                    $thumbnail_id = get_term_meta( $key, 'thumbnail_id', true );
		                    if( $thumbnail_id ) {
		                        $image = wp_get_attachment_image_src( $thumbnail_id, $img_size, true );
		                    }else {
		                        $image[0] = wc_placeholder_img_src();
		                    }
		                    $term = get_term_by( 'id', $key, 'product_cat' );
		                    if( !$term || ( $source == 'manual-selection' && $term->count == 0 && $hide_empty != false ) ) continue;
		                    $term_link = get_term_link($term);
		                    $term_name = $term->name;
		                    $sub_count =  apply_filters( 'woocommerce_subcategory_count_html', ' (' . $term->count . ') ', $term);
		            		?>
			            	<li class="product-category product">
			                    <div class="product-wrapper">
			                        <a href="<?php echo esc_url( $term_link ); ?>">
			                            <div class="products-cat-wrap">
			                                <div class="products-cat-image <?php print_r( $thumbnail_id ); ?>">    
			                                    <img class="categoryimage" src="<?php echo esc_url( $image[0] ); ?>">
			                                </div>
			                                <div class="products-cat-info">
			                                    <h3 class="woocommerce-loop-category__title">
			                                        <?php echo esc_html($term_name); ?>
			                                        <span class="count"><?php echo esc_html( $sub_count );  ?></span>
			                                    </h3>
			                                </div>
			                            </div>
			                        </a>            
			                    </div>         
			                </li>
		            	<?php } ?>
            		</ul>
      			</section>
      		<?php
            }else{
            	?>
            	<div class="bew-error">
            		<?php echo esc_html__( 'No categories found. Please verify that the WooCommerce plugin is active and there are product categories.', 'bosa-elementor-for-woocommerce' ); ?>
            	</div>
            <?php } ?>
	<?php

	}
	
}