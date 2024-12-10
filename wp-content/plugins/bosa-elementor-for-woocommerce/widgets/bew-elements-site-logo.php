<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class BEW_Site_Logo extends BEW_Settings {

	public function get_name(){
		return 'bew-elements-site-logo';
	}

	public function get_title(){
		return __('Site Logo', 'bosa-elementor-for-woocommerce');
	}

	public function get_icon(){
		return 'bew-widget eicon-site-logo';
	}

	public function get_keywords(){
		return [ 'bew', 'site', 'bew logo', 'logo', 'site logo' ];
	}

	protected function register_controls(){

		$this->start_controls_section(
			'bew_site_logo',
			[
				'label' => __( 'Content', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_item_visibility( 'custom_image_switcher', esc_html__( 'Custom Image', 'bosa-elementor-for-woocommerce' ), esc_html__( 'Yes', 'bosa-elementor-for-woocommerce' ), esc_html__( 'No', 'bosa-elementor-for-woocommerce' ), $default="no" );

		$this->add_control(
			'site_logo_custom_image',
			[
				'label'     => __( 'Add Image', 'bosa-elementor-for-woocommerce' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'custom_image_switcher' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'    => 'site_logo_size',
				'default' => 'medium',
			]
		);

		$this->add_responsive_control(
			'site_logo_alignment',
			[
				'label'              => __( 'Alignment', 'bosa-elementor-for-woocommerce' ),
				'type'               => Controls_Manager::CHOOSE,
				'options'            => [
					'left'   => [
						'title' => __( 'Left', 'bosa-elementor-for-woocommerce' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'bosa-elementor-for-woocommerce' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'bosa-elementor-for-woocommerce' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'            => 'center',
				'selectors'          => [
					'{{WRAPPER}} .bew-site-logo' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'site_logo_link',
			[
				'label'   => __( 'Link', 'bosa-elementor-for-woocommerce' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Default', 'bosa-elementor-for-woocommerce' ),
					'none'    => __( 'None', 'bosa-elementor-for-woocommerce' ),
					'custom'  => __( 'Custom URL', 'bosa-elementor-for-woocommerce' ),
				],
			]
		);

		$this->add_control(
			'site_logo_custom_link',
			[
				'label'       => __( 'Link', 'bosa-elementor-for-woocommerce' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'bosa-elementor-for-woocommerce' ),
				'condition'   => [
					'site_logo_link' => 'custom',
				],
				'show_label'  => false,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_site_logo_image',
			[
				'label' => __( 'Logo', 'bosa-elementor-for-woocommerce' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'site_logo_width',
			[
				'label'              => __( 'Width', 'bosa-elementor-for-woocommerce' ),
				'type'               => Controls_Manager::SLIDER,
				'default'            => [
					'unit' => '%',
				],
				'tablet_default'     => [
					'unit' => '%',
				],
				'mobile_default'     => [
					'unit' => '%',
				],
				'size_units'         => [ '%', 'px', 'vw' ],
				'range'              => [
					'%'  => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors'          => [
					'{{WRAPPER}} .bew-site-logo img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->get_border_attr( 'site_logo_border', '.bew-site-logo img' );

		$this->get_border_radius( 'site_logo_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.bew-site-logo img', 'border-radius' );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 			=> 'site_logo_focus_box_shadow',
				'selector' 		=> '{{WRAPPER}} .bew-site-logo img',
			]
		);

		$this->get_padding( 'site_logo_image_padding', '.bew-site-logo img' );

		$this->add_control(
			'hr1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->start_controls_tabs( 'image_effects' );

		$this->start_controls_tab(
			'normal',
			[
				'label' => __( 'Normal', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->add_control(
			'site_logo_opacity',
			[
				'label'     => __( 'Opacity', 'bosa-elementor-for-woocommerce' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bew-site-logo img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'hover',
			[
				'label' => __( 'Hover', 'bosa-elementor-for-woocommerce' ),
			]
		);
		$this->add_control(
			'site_logo_opacity_hover',
			[
				'label'     => __( 'Opacity', 'bosa-elementor-for-woocommerce' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bew-site-logo a:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	public function site_image_url( $size ) {
		$settings = $this->get_settings_for_display();

		if ( ! empty( $settings['site_logo_custom_image']['url'] ) ) {
			$logo = wp_get_attachment_image_src( $settings['site_logo_custom_image']['id'], $size, true );
		} else {
			$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), $size, true );
		}
		if ( is_array( $logo ) && !empty( $logo ) ) {
			return $logo[0];
		}
		return false;
	}

	/**
	 * Retrieve Site Logo widget link URL.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @param array $settings returns settings.
	 * @return array|string|false An array/string containing the link URL, or false if no link.
	 */
	private function get_link_url( $settings ) {
		if ( 'none' === $settings['site_logo_link'] ) {
			return false;
		}

		if ( 'custom' === $settings['site_logo_link'] ) {
			if ( empty( $settings['site_logo_custom_link']['url'] ) ) {
				return false;
			}
			return $settings['site_logo_custom_link'];
		}
	}

	protected function render(){
		$link     = '';
		$settings 		= $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'bew-site-logo' );

		$size 			= $settings['site_logo_size_size'];

		if ( 'custom' !== $size ) {
			$image_size = $size;
		}else {
			require_once ELEMENTOR_PATH . 'includes/libraries/bfi-thumb/bfi-thumb.php';

			$image_dimension = $settings['site_logo_size_custom_dimension'];

			$image_size = [
				// Defaults sizes.
				0           => null, // Width.
				1           => null, // Height.

				'bfi_thumb' => true,
				'crop'      => true,
			];

			$has_custom_size = false;
			if ( ! empty( $image_dimension['width'] ) ) {
				$has_custom_size = true;
				$image_size[0]   = $image_dimension['width'];
			}

			if ( ! empty( $image_dimension['height'] ) ) {
				$has_custom_size = true;
				$image_size[1]   = $image_dimension['height'];
			}

			if ( ! $has_custom_size ) {
				$image_size = 'full';
			}
		}

		if ( 'default' === $settings['site_logo_link'] ) {
			$link = site_url();
			$this->add_render_attribute( 'site_logo_custom_link', 'href', $link );
		} else {
			$link = $this->get_link_url( $settings );

			if ( $link ) {
				$this->add_link_attributes( 'site_logo_custom_link', $link );
			}
		}

		$image_url = $this->site_image_url( $image_size );

		if ( site_url() . '/wp-includes/images/media/default.svg' === $image_url || false === $image_url ) {
			$image_url = site_url() . '/wp-content/plugins/elementor/assets/images/placeholder.png';
		} else {
			$image_url = $image_url;
		}

		$alt_text = Control_Media::get_image_alt( $settings['site_logo_custom_image'] );
		$alt_text = empty( $alt_text ) ? 'default-logo' : esc_attr( $alt_text );
		?>
			<div <?php $this->print_render_attribute_string( 'wrapper' ); ?>>	
				<?php if ( $link ) { ?>
					<a <?php $this->print_render_attribute_string( 'site_logo_custom_link' ); ?>>
				<?php } ?>
						<img class="bew-site-logo-img" src="<?php echo esc_url( $image_url) ; ?>" alt="<?php echo esc_attr( $alt_text ); ?>"/>
				<?php if ( $link ) { ?>
					</a>
				<?php } ?>
			</div> 
		<?php
	}
}
