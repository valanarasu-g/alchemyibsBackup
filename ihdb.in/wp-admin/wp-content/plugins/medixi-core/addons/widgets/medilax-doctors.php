<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Doctors Widget .
 *
 */
class Medilax_Doctors_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxdoctors';
	}

	public function get_title() {
		return __( 'Medilax Doctors', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'doctor_section',
			[
				'label'     => __( 'Doctors', 'medilax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'doctors_style',
			[
				'label' 		=> __( 'Doctor Style', 'medilax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'medilax' ),
					'two' 			=> __( 'Style Two', 'medilax' ),
					'three' 		=> __( 'Style Three', 'medilax' ),
					'four' 			=> __( 'Style Four', 'medilax' ),
				],
			]
		);

		$this->add_control(
			'post_count',
			[
				'label' 		=> __( 'No of Post to show', 'medilax' ),
                'type' 			=> Controls_Manager::NUMBER,
                'min' 			=> 1,
				'step' 			=> 1,
			]
        );

		$this->add_control(
			'data-slide-show',
			[
				'label' 		=> __( 'Slide To Show', 'medilax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 2,
						'max' 			=> 12,
						'step' 			=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'condition'		=> [ 'doctors_style' =>  ['one','four']  ],
			]
		);

		$this->add_control(
			'show_arrows',
			[
				'label' 		=> esc_html__( 'Show Arrows', 'medilax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> esc_html__( 'Show', 'medilax' ),
				'label_off' 	=> esc_html__( 'Hide', 'medilax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'doctors_style' =>  ['one','four']  ],
			]
		);

        $this->add_control(
			'doctor_post_order',
			[
				'label' 		=> __( 'Order', 'medilax' ),
                'type' 			=> Controls_Manager::SELECT,
                'options'   	=> [
                    'ASC'   		=> __( 'ASC', 'medilax' ),
                    'DESC'   		=> __( 'DESC', 'medilax' ),
                ],
                'default'  		=> 'DESC'
			]
        );
		$this->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Title', 'medilax' ),
                'condition'		=> [ 'doctors_style' =>  'three' ],
			]
        );
		$this->add_control(
			'description',
			[
				'label' 	=> __( 'Short Description', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Description', 'medilax' ),
                'condition'		=> [ 'doctors_style' =>  'three' ],
			]
        );
        $this->add_control(
			'btn_text',
			[
				'label' 	=> __( 'Button Text', 'medilax' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'medilax' ),
                'condition'		=> [ 'doctors_style' =>  'three' ],
			]
        );

        $this->add_control(
			'btn_link',
			[
				'label' 	=> __( 'Link', 'medilax' ),
				'type' 		=> Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'medilax' ),
				'show_external' => true,
				'default' 	=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition'		=> [ 'doctors_style' =>  'three' ],
			]
		);

		$this->add_control(
			'note_text',
			[
				'label' 	=> __( 'Bottom Note Text', 'medilax' ),
				'type' 		=> Controls_Manager::WYSIWYG,
				'default' => __( '<i class="fal fa-exclamation-circle text-theme me-2"></i> Delivering tomorrow’s health care for your family. <a href="#"><strong>View Doctor’s Timetable</strong><i class="far fa-long-arrow-right ms-2"></i></a>', 'medilax' ),
				'condition'		=> [ 'doctors_style' =>  'three' ],
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------general styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'Genaral', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'doctors_style!' =>  'three' ],
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'medilax' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .team-card',
			]
		);

        $this->add_control(
			'box_hover_color',
			[
				'label' 		=> __( 'Hover Bottom Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-card::before'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .team-card',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_hover_shadow',
				'label' 	=> __( 'Box Hover Shadow', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .team-card:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .team-card',
			]
		);
		$this->add_control(
			'width',
			[
				'label' 	=> __( 'Box Radious', 'medilax' ),
				'type' 		=> Controls_Manager::SLIDER,
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
				'default' => [
					'unit' => '%',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .team-card' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

		 /*-----------------------------------------heading styling------------------------------------*/

		$this->start_controls_section(
			'heading_styling',
			[
				'label' 	=> __( 'Heading Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'doctors_style' =>  'three' ],
			]
        );
        $this->add_control(
			'section_title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-layout2 .section-title h2'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'section_title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .team-layout2 .section-title h2',

			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-layout2 .section-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
           
			]
        );

        $this->add_responsive_control(
			'section_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-layout2 .section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
           
			]
        );
        $this->add_control(
			'team_hr',
			[
				'type' =>Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'section_desc_color',
			[
				'label' 		=> __( 'Description Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-layout2 .section-title p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'section_desc_typography',
		 		'label' 		=> __( 'Description Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .team-layout2 .section-title p',

			]
		);

        $this->add_responsive_control(
			'section_desc_margin',
			[
				'label' 		=> __( 'Description Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-layout2 .section-title p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
           
			]
        );

        $this->add_responsive_control(
			'section_desc_padding',
			[
				'label' 		=> __( 'Description Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-layout2 .section-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
           
			]
        );

        $this->add_control(
			'team_bg_hr',
			[
				'type' =>Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' 		=> __( 'Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .bg-theme'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->end_controls_section();


        /*-----------------------------------------title styling------------------------------------*/

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper h3'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-team-wrapper h3'
			]
		);

        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------designation styling------------------------------------*/

		$this->start_controls_section(
			'designation_styling',
			[
				'label' 	=> __( 'Designation Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'designation_color',
			[
				'label' 		=> __( 'Designation Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .degi'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'designation_typography',
		 		'label' 		=> __( 'Designation Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-team-wrapper .degi'
			]
		);

        $this->add_responsive_control(
			'designation_margin',
			[
				'label' 		=> __( 'Designation Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'designation_padding',
			[
				'label' 		=> __( 'Designation Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .degi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------content styling------------------------------------*/

		$this->start_controls_section(
			'content_styling',
			[
				'label' 	=> __( 'Content Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'doctors_style!' =>  ['three']  ],
			]
        );

        $this->add_control(
			'content_color',
			[
				'label' 		=> __( 'Content Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .desc'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'content_typography',
		 		'label' 		=> __( 'Content Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-team-wrapper .desc'
			]
		);

        $this->add_responsive_control(
			'content_margin',
			[
				'label' 		=> __( 'Content Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'content_padding',
			[
				'label' 		=> __( 'Content Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------phone styling------------------------------------*/

		$this->start_controls_section(
			'phone_styling',
			[
				'label' 	=> __( 'Phone Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'doctors_style!' =>  ['three']  ],
			]
        );

        $this->add_control(
			'phone_color',
			[
				'label' 		=> __( 'Phone Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .phone'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'phone_hover_color',
			[
				'label' 		=> __( 'Phone Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .phone:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'phone_typography',
		 		'label' 		=> __( 'Phone Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-team-wrapper .phone'
			]
		);

        $this->add_responsive_control(
			'phone_margin',
			[
				'label' 		=> __( 'Phone Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .phone' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'phone_padding',
			[
				'label' 		=> __( 'Phone Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .phone' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------email styling------------------------------------*/

		$this->start_controls_section(
			'email_styling',
			[
				'label' 	=> __( 'Email Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'doctors_style!' =>  ['three']  ],
			]
        );

        $this->add_control(
			'email_color',
			[
				'label' 		=> __( 'Email Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .phone'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'email_hover_color',
			[
				'label' 		=> __( 'Email Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .email:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'email_typography',
		 		'label' 		=> __( 'Email Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-team-wrapper .phone'
			]
		);

        $this->add_responsive_control(
			'email_margin',
			[
				'label' 		=> __( 'Email Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .phone' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'email_padding',
			[
				'label' 		=> __( 'Email Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-wrapper .phone' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------button styling------------------------------------*/

		$this->start_controls_section(
			'button_styling',
			[
				'label' 	=> __( 'Button Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'doctors_style' =>  ['three']  ],
			]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'btn_shadow',
				'label' 	=> __( 'Button Shadow', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .vs-btn.style2',
			]
		);

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2 i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2:hover'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2:hover i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-btn.style2'
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Text Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2 i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_text_hvr_color',
			[
				'label' 		=> __( 'Text Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2:hover i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		global $post;

    	$doctors = new \WP_Query(array(
			'posts_per_page' 	=> $settings['post_count'], 
			'post_type' 		=> 'medilax_doctors',
			'order' 			=> $settings['doctor_post_order']
		));
		
		$show_arrows = $settings['show_arrows'] ? 'true' : 'false';

		if( $settings['doctors_style'] == 'one' || $settings['doctors_style'] == 'two' ){
			echo '<section class="vs-team-wrapper">';
				echo '<div class="container">';
					if( $settings['doctors_style'] == 'one' ){
						echo '<div class="row vs-carousel wow fadeIn" data-wow-delay="0.3s" data-slick-arrows="'.esc_attr( $show_arrows ).'" data-slide-show="'.esc_attr( $settings['data-slide-show']['size'] ).'" data-lg-slide-show="3">';
					}else{
						echo '<div class="row ">';
					}
					while ( $doctors->have_posts() ) {
						$doctors->the_post();
						$medilax_doctors_social_icons	= medixi_meta( 'doctor_social_profile_group' );
						$phone = medixi_meta( 'doctor_phone' );
						$email = medixi_meta( 'doctor_email' );
						$desc  = medixi_meta( 'short_descripton' );

						$email 			= is_email( $email );
						$replace 		= array(' ','-',' - ');
						$with 			= array('','','');
						$emailurl 		= str_replace( $replace, $with, $email );
						$mobileurl 	    = str_replace( $replace, $with, $phone );

						if( $settings['doctors_style'] == 'one' ){
							echo '<div class="col-xl-4 mb-30">';
						}else{
							echo '<div class="col-md-6 col-xl-4 mb-30 wow fadeInUp" data-wow-delay="0.3s">';
						}
							echo '<div class="team-card">';
								if( has_post_thumbnail( ) ) {
									echo '<div class="team-head">';
										the_post_thumbnail();
										if( is_array( $medilax_doctors_social_icons ) && !empty( $medilax_doctors_social_icons ) ) {
											echo '<div class="team-card-links">';
												echo '<div class="team-social">';
													foreach( $medilax_doctors_social_icons as $singleicon ) {
														if( ! empty( $singleicon['_medixi_doctor_social_profile_icon'] ) ) {
						                                    echo '<a href="'.esc_url( $singleicon['_medixi_doctor_social_profile_link'] ).'"><i class="fab '.esc_attr( $singleicon['_medixi_doctor_social_profile_icon'] ).'"></i></a>';
						                                }
													}
												echo '</div>';
											echo '</div>';
										}
									echo '</div>';
								}
								echo '<div class="team-body">';
									echo '<h3 class="h4 mb-0"><a href="'.esc_url( get_the_permalink() ).'" class="text-reset">'.get_the_title().'</a></h3>';

									$terms = wp_get_post_terms($post->ID, 'doctors_category', array("fields" => "names"));
									$i = 0;
									foreach( (array)$terms as $term){
										$i++;
										echo '<p class="fs-xs degi text-theme mb-2">' . esc_html($term) . '</p>';
										if($i == 1){
											break;
										}
									}
									if( ! empty( $desc ) ){
										echo '<p class="desc fs-xs">'.esc_html( $desc ).'</p>';
									}
									echo '<div class="">';
										if( ! empty( $phone ) ){
											echo '<p class="fs-xs team-info"><i class="fal fa-phone text-theme"></i><a class="text-reset phone" href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html( $phone ).'</a></p>';
										}
										if( ! empty( $email ) ){
											echo '<p class="fs-xs team-info"><i class="fal fa-envelope text-theme"></i><a class="text-reset email" href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html( $email ).'</a></p>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					wp_reset_postdata();
					echo '</div>';
				echo '</div>';
			echo '</section>';
		}elseif( $settings['doctors_style'] == 'three' ){
			echo '<section class="vs-team-wrapper team-layout2 space">';
				echo '<div class="container">';
					echo '<div class="row gx-30 justify-content-center">';

						echo '<div class="col-md-9 col-lg-7 col-xl-5 wow fadeIn" data-wow-delay="0.3s">';
							echo '<div class="section-title mb-xl-4 text-center  text-xl-start">';
								if(!empty($settings['title'])){
								echo '<h2 class="h1 text-white">'.esc_html($settings['title']).'</h2>';
								}
								if(!empty($settings['description'])){
								echo '<p class="text-white mb-35">'.esc_html($settings['description']).'</p>';
								}
								if(!empty($settings['btn_text'])){
									echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="vs-btn style2">'.esc_html($settings['btn_text']).'<i class="far fa-calendar-alt"></i></a>';
								}

							echo '</div>';
						echo '</div>';

						echo '<div class="col-xl-1"></div>';
						while ($doctors->have_posts()) { $doctors->the_post();
							echo '<div class="col-xl-3 col-lg-4 col-md-6">';
								echo '<div class="team-box mb-30">';
								if(has_post_thumbnail( )) {
									echo '<div class="team-img">';
										the_post_thumbnail();
									echo '</div>';
								}
									echo '<div class="team-content bg-theme">';
										echo '<h3 class="name h4 text-white mb-0"><a class="text-reset" href="'.esc_url( get_the_permalink() ).'">'.get_the_title().'</a></h3>';
										$terms = wp_get_post_terms($post->ID, 'doctors_category', array("fields" => "names"));
										$i = 0;
										foreach( (array)$terms as $term){
											$i++;
											echo '<span class="degi fs-sm text-white">' . esc_html($term) . '</span>';
											if($i == 1){
												break;
											}
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}

					echo '</div>';
					if(!empty($settings['note_text'])) {
						echo '<div class="text-center">';
							echo '<div class="notice-bar fs-xs bg-white mt-30 text-center">';
								echo '<p class="text-title">'.wp_kses_post( $settings['note_text'] ).'</p>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
			echo '</section>';
		}else{
			echo '<section class="vs-team-wrapper">';
				echo '<div class="container">';
					echo '<div class="row vs-carousel wow fadeIn" data-wow-delay="0.3s" data-slick-arrows="'.esc_attr( $show_arrows ).'" data-slide-show="'.esc_attr( $settings['data-slide-show']['size'] ).'" data-lg-slide-show="3">';
						while ( $doctors->have_posts() ) {
							$doctors->the_post();
							$medilax_doctors_social_icons	= medixi_meta( 'doctor_social_profile_group' );
							$desc  = medixi_meta( 'short_descripton' );

							echo '<div class="col-xl-4 team-style1">';
								echo '<div class="team-img">';
									the_post_thumbnail();
									echo '<div class="team-shape"></div>';
								echo '</div>';

								echo '<div class="team-content">';
									echo '<h3 class="team-name"><a href="'.esc_url( get_the_permalink() ).'" class="text-reset">'.get_the_title().'</a></h3>';
									if( ! empty( $desc ) ){
										echo '<span class="team-degi">'.esc_html( $desc ).'</span>';
									}
									echo '<div class="team-links">';
										if( is_array( $medilax_doctors_social_icons ) && !empty( $medilax_doctors_social_icons ) ) {
											foreach( $medilax_doctors_social_icons as $singleicon ) {
												if( ! empty( $singleicon['_medixi_doctor_social_profile_icon'] ) ) {
													echo '<a href="'.esc_url( $singleicon['_medixi_doctor_social_profile_link'] ).'"><i class="fab '.esc_attr( $singleicon['_medixi_doctor_social_profile_icon'] ).'"></i></a>';
												}
											}
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
						wp_reset_postdata();
					echo '</div>';
				echo '</div>';
			echo '</section>';
		}
	}
}