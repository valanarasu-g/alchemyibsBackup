<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Service info Widget .
 *
 */
class Medilax_Service_Info_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxserviceinfo';
	}

	public function get_title() {
		return __( 'Medilax Service Informations', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'service_info_section',
			[
				'label'     => __( 'Service Informations', 'medilax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'treatment_name',
			[
				'label' 	=> __( 'Treatment Nmae', 'medilax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'placeholder' => __( 'Type Treatment Name here', 'medilax' ),
			]
		);
		$this->add_control(
			'duration',
			[
				'label' 	=> __( 'Treatment Durations', 'medilax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'placeholder' => __( 'Type Treatment Durations here', 'medilax' ),
			]
		);
		$this->add_control(
			'dr_name',
			[
				'label' 	=> __( 'Specialist Name', 'medilax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'placeholder' => __( 'Type Dr. Name here', 'medilax' ),
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' 	=> __( 'Button Text', 'medilax' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'medilax' )
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
			]
		);
		$this->end_controls_section();

		/*-----------------------------------------general styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'Genaral', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'medilax' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .service-bar',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .service-bar',
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
					'{{WRAPPER}} .service-bar' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		/*-----------------------------------------treatment styling------------------------------------*/

		$this->start_controls_section(
			'treatment_heading_styling',
			[
				'label' 	=> __( 'Treatment Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'treatment_heading_color',
			[
				'label' 		=> __( 'Header Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .trt-head'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'treatment_heading_typography',
		 		'label' 		=> __( 'Header Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .service-bar .trt-head'
			]
		);

        $this->add_responsive_control(
			'treatment_heading_margin',
			[
				'label' 		=> __( 'Header Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .trt-head' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'treatment_heading_padding',
			[
				'label' 		=> __( 'Header Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .trt-head' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_control(
			'more_options',
			[
				'label' 		=> __( 'Treatment Types', 'medilax' ),
				'type' 			=> Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

        $this->add_control(
			'treatment_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .treatment'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'treatment_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .service-bar .treatment'
			]
		);

        $this->add_responsive_control(
			'treatment_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .treatment' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'treatment_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .treatment' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------duration styling------------------------------------*/

		$this->start_controls_section(
			'duration_heading_styling',
			[
				'label' 	=> __( 'Duration Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'duration_heading_color',
			[
				'label' 		=> __( 'Header Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .trt-dur'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'duration_heading_typography',
		 		'label' 		=> __( 'Header Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .service-bar .trt-dur'
			]
		);

        $this->add_responsive_control(
			'duration_heading_margin',
			[
				'label' 		=> __( 'Header Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .trt-dur' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'duration_heading_padding',
			[
				'label' 		=> __( 'Header Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .trt-dur' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_control(
			'durations_options',
			[
				'label' 		=> __( 'Time Duration Settings', 'medilax' ),
				'type' 			=> Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

        $this->add_control(
			'duration_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .durations'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'duration_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .service-bar .durations'
			]
		);

        $this->add_responsive_control(
			'duration_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .durations' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'duration_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .durations' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------name styling------------------------------------*/

		$this->start_controls_section(
			'dr_name_heading_styling',
			[
				'label' 	=> __( 'Dr. Name Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'dr_name_heading_color',
			[
				'label' 		=> __( 'Header Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .dr-name'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'dr_name_heading_typography',
		 		'label' 		=> __( 'Header Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .service-bar .dr-name'
			]
		);

        $this->add_responsive_control(
			'dr_name_heading_margin',
			[
				'label' 		=> __( 'Header Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .dr-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'dr_name_heading_padding',
			[
				'label' 		=> __( 'Header Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .dr-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_control(
			'name_options',
			[
				'label' 		=> __( 'Dr. Name Settings', 'medilax' ),
				'type' 			=> Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

        $this->add_control(
			'name_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .name'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'name_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .service-bar .name'
			]
		);

        $this->add_responsive_control(
			'name_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'name_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'btn_shadow',
				'label' 	=> __( 'Button Shadow', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .service-bar .vs-btn',
			]
		);

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .vs-btn'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .service-bar .vs-btn i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .vs-btn:hover'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .service-bar .vs-btn:hover i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .service-bar .vs-btn'
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Text Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .vs-btn'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .service-bar .vs-btn i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_text_hvr_color',
			[
				'label' 		=> __( 'Text Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-bar .vs-btn:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .service-bar .vs-btn:hover i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<!-----------------------Start Service info Area----------------------->';
		echo '<div class="row justify-content-center">';
			echo '<div class="col-xl-11 col-xxl-10 ">';
				echo '<div class="service-bar">';
					echo '<div class="row justify-content-between align-items-center gy-4 text-center text-lg-start">';
						if(!empty($settings['treatment_name'])) {
							echo '<div class="col-sm-6 col-lg-auto">';
								echo '<span class="trt-head fs-xs">'.esc_html__( 'Treatment Name', 'medilax' ).'</span>';
								echo '<h2 class="treatment h5 mb-0">'.esc_html( $settings['treatment_name'] ).'</h2>';
							echo '</div>';
						}
						if(!empty($settings['duration'])) {
							echo '<div class="col-sm-6 col-lg-auto">';
								echo '<span class="trt-dur fs-xs">'.esc_html__( 'Time Duration', 'medilax' ).'</span>';
								echo '<h2 class="durations h5 mb-0">'.esc_html( $settings['duration'] ).'</h2>';
							echo '</div>';
						}
						if(!empty($settings['dr_name'])) {
							echo '<div class="col-sm-6 col-lg-auto">';
								echo '<span class="fs-xs dr-name">'.esc_html__( 'Doctor Name', 'medilax' ).'</span>';
								echo '<h2 class="h5 mb-0 name">'.esc_html( $settings['dr_name'] ).'</h2>';
							echo '</div>';
						}
						if(!empty($settings['btn_text'])){
							echo '<div class="col-sm-6 col-lg-auto">';
								echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="vs-btn style2">'.esc_html($settings['btn_text']).'</a>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
        echo '<!-----------------------End Service Info Area----------------------->';
	}
}