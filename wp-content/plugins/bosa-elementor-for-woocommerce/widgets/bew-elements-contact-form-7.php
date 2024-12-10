<?php

namespace Elementor;

class BEW_Contact_Form_7 extends BEW_Settings {

	public function get_name() {
		return 'bew-elements-contact-form-7';
	}
	
	public function get_title() {
		return __( 'Contact Form 7', 'bosa-elementor-for-woocommerce' );
	}
	
	public function get_icon() {
		return 'bew-widget eicon-form-horizontal';
	}

	public function get_keywords() {
		return [ 'bew', 'contact', 'form', '7', 'contact form 7', 'bew contact form 7', 'bosa' ];
	}
	
	public function get_categories() {
		return [ 'bosa-elementor-for-woocommerce' ];
	}

    protected function register_controls() {

		$this->start_controls_section(
			'bew_elements_contact_form_7',
			[
				'label' => __( 'Form', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->add_control(
			'bew_contact_form',
			[
				'label' => __( 'Select Form', 'bosa-elementor-for-woocommerce' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $this->_contact_form_list(),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_label_style',
			[
				'label' => __( 'Label', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'show_label',
			[
				'label' => esc_html__( 'Show Label', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bosa-elementor-for-woocommerce' ),
				'label_off' => esc_html__( 'Hide', 'bosa-elementor-for-woocommerce' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->get_normal_color( 'label_color', esc_html__('Color', 'bosa-elementor-for-woocommerce'), '.bew-elements-contact-forms form p label', 'color' );

        $this->get_title_typography( 'label_typography', '.bew-elements-contact-forms form p label' );

		$this->add_control(
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
					'{{WRAPPER}} .bew-elements-contact-forms form p label' => 'text-align: {{VALUE}};',
				],
				'default' => 'left',
				'toggle' => true,
			]
		);

		$this->add_control(
			'not_valid_notices_heading',
			[
				'label' => esc_html__( 'Not Valid Notices', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->get_normal_color( 'not_valid_notices_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-contact-forms form p .wpcf7-not-valid-tip', 'color' );

		$this->get_title_typography( 'not_valid_notices_typography', esc_html__( 'Typography', 'bosa-elementor-for-woocommerce' ), '.bew-elements-contact-forms form p .wpcf7-not-valid-tip' );

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_inputs_textareas_style',
			[
				'label' => __( 'Inputs and Textareas', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'input_textarea_tabs'
		);

		$this->start_controls_tab(
			'normal_tab',
			[
				'label' => esc_html__( 'Normal', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'normal_background',
				'label' => esc_html__( 'Background', 'bosa-elementor-for-woocommerce' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpcf7 .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-radio)',
			]
		);

		$this->get_normal_color('txt_color', esc_html__('Color', 'bosa-elementor-for-woocommerce'), '.wpcf7 .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-radio)', 'color');

		$this->end_controls_tab();

		$this->start_controls_tab(
			'hover_tab',
			[
				'label' => esc_html__( 'Hover', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hover_background',
				'label' => esc_html__( 'Background', 'bosa-elementor-for-woocommerce' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpcf7 .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-radio):hover',
			]
		);

		$this->get_normal_color('txt_hover_color', esc_html__('Color', 'bosa-elementor-for-woocommerce'), '.wpcf7 .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-radio):hover', 'color');

		$this->get_normal_color('border_hover_color', esc_html__('Border Color', 'bosa-elementor-for-woocommerce'), '.wpcf7 .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-radio):hover', 'border-color');

		$this->end_controls_tab();

		$this->start_controls_tab(
			'focus_tab',
			[
				'label' => esc_html__( 'Focus', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'focus_background',
				'label' => esc_html__( 'Background', 'bosa-elementor-for-woocommerce' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpcf7 .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-radio):focus',
			]
		);

		$this->get_normal_color('txt_focus_color', esc_html__('Color', 'bosa-elementor-for-woocommerce'), '.wpcf7 .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-radio):focus', 'color');

		$this->get_normal_color('border_focus_color', esc_html__('Border Color', 'bosa-elementor-for-woocommerce'), '.wpcf7 .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-radio):focus', 'border-color');

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->get_title_typography('txt_typography', '.wpcf7-text, .wpcf7-textarea');

		$this->add_control(
			'inputs_placeholder_color',
			[
				'label' => __('Placeholder Color', 'etww'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7 .wpcf7-form .wpcf7-form-control::-webkit-input-placeholder' => 'color: {{VALUE}}',
					'{{WRAPPER}} .wpcf7 .wpcf7-form .wpcf7-form-control::-moz-placeholder' => 'color: {{VALUE}}',
					'{{WRAPPER}} .wpcf7 .wpcf7-form .wpcf7-form-control:-ms-input-placeholder' => 'color: {{VALUE}}',
				],
			]
		);

		$this->get_border_attr( 'txt_border', '.wpcf7-text, .wpcf7-textarea' );

		$this->get_border_radius( 'txt_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.wpcf7-text, .wpcf7-textarea', 'border-radius' );

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'bosa-elementor-for-woocommerce' ),
				'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-radio)',
			]
		);

		$this->get_margin( 'txt_margin', '.wpcf7 .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-radio)' );

		$this->get_padding( 'txt_padding', '.wpcf7 .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-radio)' );

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_button_style',
			[
				'label' => __( 'Submit Button', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'button_tabs'
		);

		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color('btn_color', esc_html__('Text Color', 'bosa-elementor-for-woocommerce'), '.wpcf7 input.wpcf7-submit', 'color');

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'normal_button_background',
				'label' => esc_html__( 'Background', 'bosa-elementor-for-woocommerce' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpcf7 input.wpcf7-submit',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color('hov_btn_color', esc_html__('Text Color', 'bosa-elementor-for-woocommerce'), '.wpcf7 input.wpcf7-submit:hover', 'color');

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hover_button_background',
				'label' => esc_html__( 'Background', 'bosa-elementor-for-woocommerce' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpcf7 input.wpcf7-submit:hover',
			]
		);

		$this->get_normal_color('hov_btn_border_color', esc_html__('Border Color', 'bosa-elementor-for-woocommerce'), '.wpcf7 input.wpcf7-submit:hover', 'border-color');

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_focus_tab',
			[
				'label' => esc_html__( 'Focus', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color('focus_btn_color', esc_html__('Text Color', 'bosa-elementor-for-woocommerce'), '.wpcf7 input.wpcf7-submit:focus', 'color');

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'focus_button_background',
				'label' => esc_html__( 'Background', 'bosa-elementor-for-woocommerce' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpcf7 input.wpcf7-submit:focus',
			]
		);

		$this->get_normal_color('focus_btn_border_color', esc_html__('Border Color', 'bosa-elementor-for-woocommerce'), '.wpcf7 input.wpcf7-submit:focus', 'border-color');

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->get_title_typography( 'submit_btn_typography', '.wpcf7 input.wpcf7-submit' );

		$this->get_border_attr( 'btn_border', '.wpcf7-submit' );

		$this->get_border_radius( 'btn_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.wpcf7-submit', 'border-radius' );

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'bosa-elementor-for-woocommerce' ),
				'selector' => '{{WRAPPER}} input.wpcf7-submit',
			]
		);

		$this->get_margin( 'btn_margin', '.wpcf7-submit' );

		$this->get_padding( 'btn_padding', '.wpcf7-submit' );

		$this->add_control(
			'button_fullwidth',
			[
				'label' => __('Full Width Button', 'bosa-elementor-for-woocommerce'),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'return_value' => 'block',
				'selectors' => [
					'{{WRAPPER}} .wpcf7 input.wpcf7-submit' => 'display: {{VALUE}}; width: 100%;',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_alerts_style',
			[
				'label' => __( 'Alerts', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'alerts_typography',
				'selector' => '{{WRAPPER}} .wpcf7 div.wpcf7-response-output',
				
			]
		);

		$this->get_border_attr( 'alerts_border', '.wpcf7 div.wpcf7-response-output' );

		$this->get_border_radius( 'alerts_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-response-output', 'border-radius' );

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'alerts_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'bosa-elementor-for-woocommerce' ),
				'selector' => '{{WRAPPER}} div.wpcf7-response-output',
			]
		);

		$this->get_margin( 'alerts_margin', 'div.wpcf7-response-output' );

		$this->get_padding( 'alerts_padding', 'div.wpcf7-response-output' );

		$this->add_control(
			'alerts_align',
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
					'{{WRAPPER}} .wpcf7 div.wpcf7-response-output' => 'text-align: {{VALUE}};',
				],
				'default' => 'center',
				'toggle' => true,
			]
		);

		$this->add_control(
			'sent_success_heading',
			[
				'label' => esc_html__( 'Sent Success', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->get_normal_color( 'sent_success_bg_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-mail-sent-ok', 'background-color' );

		$this->get_normal_color( 'sent_success_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-mail-sent-ok', 'color' );

		$this->get_normal_color( 'sent_success_border_color', esc_html__( 'Border Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-mail-sent-ok', 'border-color' );

		$this->add_control(
			'sent_error_heading',
			[
				'label' => esc_html__( 'Sent Error', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->get_normal_color( 'sent_error_bg_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-mail-sent-ng', 'background-color' );

		$this->get_normal_color( 'sent_error_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-mail-sent-ng', 'color' );

		$this->get_normal_color( 'sent_error_border_color', esc_html__( 'Border Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-mail-sent-ng', 'border-color' );

		$this->add_control(
			'not_valid_heading',
			[
				'label' => esc_html__( 'Not Valid', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->get_normal_color( 'not_valid_bg_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-validation-errors', 'background-color' );

		$this->get_normal_color( 'not_valid_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-validation-errors', 'color' );

		$this->get_normal_color( 'not_valid_border_color', esc_html__( 'Border Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-validation-errors', 'border-color' );

		$this->add_control(
			'spam_blocked_heading',
			[
				'label' => esc_html__( 'Spam Blocked', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->get_normal_color( 'spam_blocked_bg_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-spam-blocked', 'background-color' );

		$this->get_normal_color( 'spam_blocked_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-spam-blocked', 'color' );

		$this->get_normal_color( 'spam_blocked_border_color', esc_html__( 'Border Color', 'bosa-elementor-for-woocommerce' ), '.wpcf7 div.wpcf7-spam-blocked', 'border-color' );

		$this->end_controls_section();

	}

	protected function render() {
        $settings       	= $this->get_settings_for_display();   
		$contact_form_title = get_the_title($settings['bew_contact_form']);
		$label_class = $settings['show_label'] == 'yes' ? 'bew-show-label' : 'bew-hide-label';

		$short_code_handle 	=  '[contact-form-7 id="'.$settings['bew_contact_form'].'" title="'.$contact_form_title.'"]';
	?>

		<section class="bew-elements-widgets bew-elements-contact-forms <?php echo esc_attr( $label_class); ?>">
			<?php  if( !empty( $settings['bew_contact_form'] )): echo do_shortcode($short_code_handle); endif; ?>
    	</section>
	
	<?php

	}
	
}