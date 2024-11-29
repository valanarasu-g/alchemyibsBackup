<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Section Title Widget .
 *
 */
class Medilax_Section_Title_Widget extends Widget_Base {

	public function get_name() {
		return 'medilaxsectiontitle';
	}

	public function get_title() {
		return __( 'Section Title', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Section Title', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'medilax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'medilax' ),
					'2' 		=> __( 'Style Two', 'medilax' ),
					'3' 		=> __( 'Style Three', 'medilax' ),
					'4' 		=> __( 'Style Four', 'medilax' ),
				],
			]
		);

		$this->add_control(
			'section_icon',
			[
				'label' 	=> __( 'Icon Class', 'medilax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __( 'flaticon-ecg', 'medilax' ),
				'condition'     => [
                    'title_style'    => '2'
                ],
			]
		);
		
        $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Title', 'medilax' )
			]
        );
        $this->add_control(
			'section_title_tag',
			[
				'label' 	=> __( 'Title Tag', 'medilax' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				],
				'default' => 'h2',
			]
        );

        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Section Subtitle', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Subtitle', 'medilax' ),
                'condition'	=> ['title_style' => '1']
			]
        );

        $this->add_control(
			'section_subtitle_tag',
			[
				'label' 	=> __( 'Subitle Tag', 'medilax' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'p'  => 'P',
					'span'  => 'span',
				],
				'default' 	=> 'span',
				'condition'	=> ['section_subtitle!' => '']
			]
		);

		$this->add_control(
			'section_description',
			[
				'label' 	=> __( 'Section Description', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Description', 'medilax' )
			]
        );

		$this->add_control(
			'title_bottom_icon',
			[
				'label'     => __( 'Upload an Image Icon', 'medilax' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'	=> [ 'title_style' => '4' ]
			]
		);

        $this->add_responsive_control(
			'section_title_align',
			[
				'label' 		=> __( 'Alignment', 'medilax' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'medilax' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'medilax' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'medilax' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 	=> 'left',
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Section Title Style', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'section_wrapper_margin',
			[
				'label' 		=> __( 'Section Wrapper Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'section_wrapper_padding',
			[
				'label' 		=> __( 'Section Wrapper Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'after'
			]
		);

        $this->add_control(
			'section_title_color',
			[
				'label' 	=> __( 'Section Title Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title-selector' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'section_title!'    => ''
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Section Title Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .title-selector',
                'condition' => [
                    'section_title!'    => ''
                ]
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Section Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_title!'    => ''
                ]
			]
        );

        $this->add_responsive_control(
			'section_title_padding',
			[
				'label' 		=> __( 'Section Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' 	=> [
                    'section_title!'    => ''
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .title-selector',
				'condition' => [
                    'section_title!'    => ''
                ],
                'separator' => 'after'
			]
		);

		$this->add_control(
			'section_subtitle_color',
			[
				'label' 		=> __( 'Section Subtitle Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'color: {{VALUE}}!important',
                ],
                'condition' 	=> [
                    'section_subtitle!'    => ''
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_subtitle_typography',
				'label' 	=> __( 'Section Subtitle Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .subtitle-selector',
                'condition' => [
                    'section_subtitle!'    => ''
                ],
			]
        );

        $this->add_responsive_control(
			'section_subtitle_margin',
			[
				'label' 		=> __( 'Section Subtitle Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_subtitle!'    => ''
                ],
			]
        );
		$this->add_control(
			'section_description_color',
			[
				'label' 	=> __( 'Section Description Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title .desc' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'section_description!'    => ''
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_description_typography',
				'label' 	=> __( 'Section Description Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .section-title .desc',
                'condition' => [
                    'section_description!'    => ''
                ],
			]
        );

        $this->add_responsive_control(
			'section_description_margin',
			[
				'label' 		=> __( 'Section Description Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .section-title .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' 	=> [
                    'section_description!'    => ''
                ],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
        $this->add_render_attribute( 'wrapper', 'class', 'section-title' );
		
        echo '<!-- Section Title -->';
        echo '<div class="container">';
	        echo '<div class="row justify-content-center">';
		        echo '<div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">';
					echo '<div '.$this->get_render_attribute_string( 'wrapper' ).' >';

						if( $settings['title_style'] == '1' ){
							if( !empty( $settings['section_subtitle'] ) ) {
								echo '<'.esc_attr($settings['section_subtitle_tag']).' class="h3 text-theme sec-subtitle subtitle-selector">'.wp_kses_post( $settings['section_subtitle'] ).'</'.esc_attr($settings['section_subtitle_tag']).'>';
							}
						}elseif( $settings['title_style'] == '2' ){
							if( ! empty( $settings['section_icon'] ) ){
								echo '<div class="sec-icon"><i class="'.esc_attr( $settings['section_icon'] ).'"></i></div>';
							}
						}

						if( ! empty( $settings['section_title'] ) ) {
			            	echo '<'.esc_attr($settings['section_title_tag']).' class="h1 title-selector">'.wp_kses_post( $settings['section_title'] ).'</'.esc_attr($settings['section_title_tag']).'>';
						}

						if( ! empty( $settings['section_description'] ) ){
							echo medixi_paragraph_tag( array(
								'text'	=> wp_kses_post( $settings['section_description'] ),
								'class' => 'desc',
							) );
						}
						if( $settings['title_style'] == '4' ){
							if( !empty( $settings['title_bottom_icon'] ) ) {
								echo medixi_img_tag( array(
									'url'	=> esc_url( $settings['title_bottom_icon']['url'] ),
								) );
							}
						}
			        echo '</div>';
		        echo '</div>';
	        echo '</div>';
	        echo '<!-- End Section Title -->';
        echo '</div>';
	}
}