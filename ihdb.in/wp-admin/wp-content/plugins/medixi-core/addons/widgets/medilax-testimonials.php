<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Testimonial Widget .
 *
 */
class Medilax_Testimonial_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxtestimonials';
	}

	public function get_title() {
		return esc_html__( 'Medilax Testimonials', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'testimonial_content',
			[
				'label'		=> esc_html__( 'Testimonials','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'testimonial_style',
			[
				'label' 		=> esc_html__( 'Testimonial Style', 'medilax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> esc_html__( 'Style One', 'medilax' ),
                    'two'           => esc_html__( 'Style Two', 'medilax' ),
					'three' 		=> esc_html__( 'Style Three', 'medilax' ),
					'four' 		    => esc_html__( 'Style Four', 'medilax' ),
					'five' 		    => esc_html__( 'Style Five', 'medilax' ),
				],
			]
		);

        $this->add_control(
			'subtitle', [
				'label' 		=> esc_html__( 'Testimonial Subtitle', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'TESTIMONIALS' , 'medilax' ),
				'label_block' 	=> true,
                'condition'     => [ 'testimonial_style'    => 'four' ]
			]
        );

        $this->add_control(
			'title', [
				'label' 		=> esc_html__( 'Testimonial Title', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( '160k Patients Review' , 'medilax' ),
				'label_block' 	=> true,
                'condition'     => [ 'testimonial_style'    => [ 'four', 'five' ] ]
			]
        );

        $this->add_control(
			'facebook_url', [
				'label' 		=> esc_html__( 'Facebook URL?', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( '#' , 'medilax' ),
                'condition'     => [ 'testimonial_style'    => [ 'five' ] ]
			]
        );
        $this->add_control(
			'twitter_url', [
				'label' 		=> esc_html__( 'Twitter URL?', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( '#' , 'medilax' ),
                'condition'     => [ 'testimonial_style'    => [ 'five' ] ]
			]
        );
        $this->add_control(
			'instagram_url', [
				'label' 		=> esc_html__( 'Instagram URL?', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( '#' , 'medilax' ),
                'condition'     => [ 'testimonial_style'    => [ 'five' ] ]
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'client_name', [
				'label' 		=> esc_html__( 'Client Name', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Rosalina D. William' , 'medilax' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'client_designation', [
				'label' 		=> esc_html__( 'Client Designation', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Customer' , 'medilax' ),
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
            'feedback_title', [
                'label'         => esc_html__( 'Feedback Title', 'medilax' ),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => esc_html__( 'Feedbak Title' , 'medilax' ),
                'description'   => esc_html__( 'This Field Only for style three !!' , 'medilax' ),
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
			'rating', [
				'label' 	=> esc_html__( 'Rating', 'medilax' ),
                'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> esc_html__( 'One Star', 'medilax' ),
					'two' 			=> esc_html__( 'Two Star', 'medilax' ),
					'three' 		=> esc_html__( 'Three Star', 'medilax' ),
					'four' 			=> esc_html__( 'Four Star', 'medilax' ),
					'five' 			=> esc_html__( 'Five Star', 'medilax' ),
				],
			]
        );
        $repeater->add_control(
			'client_feedback_description', [
				'label' 		=> esc_html__( 'Client Feedback Description', 'medilax' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' , 'medilax' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'client_image',
			[
				'label' 		=> esc_html__( 'Client Image', 'medilax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );
		$this->add_control(
			'testimonials',
			[
				'label' 		=> esc_html__( 'Testimonials', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_name' 		=> esc_html__( 'Moris Jonson', 'medilax' ),
						'client_feedback_description' 	=> esc_html__( 'Uniquely strategize 2.0 portals after fully researched vortals. Quickly repurpose front-end metrics through', 'medilax' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> esc_html__( 'Rosalina D. William', 'medilax' ),
						'client_feedback' 	=> esc_html__( 'Etiam convallis elementum sapien, a aliquam turpis aliquam vitae.', 'medilax' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> esc_html__( 'Rosalina D. William', 'medilax' ),
						'client_feedback' 	=> esc_html__( 'Etiam convallis elementum sapien, a aliquam turpis aliquam vitae.', 'medilax' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
			]
		);
		
        $this->add_control(
			'bg_image',
			[
				'label' 		=> esc_html__( 'Background Image', 'medilax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
                'condition'  	=> [ 'testimonial_style' => 'five' ],
			]
        );

		$this->end_controls_section();

		/*-----------------------------------------general styling------------------------------------*/

        $this->start_controls_section(
            'general_styling',
            [
                'label'         => __( 'Genaral', 'medilax' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label'         => __( 'Box Background Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-box' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .avater-slider-box' => 'background-color: {{VALUE}}!important',
                    '{{WRAPPER}} .testi_card' => 'background-color: {{VALUE}}!important',
                    '{{WRAPPER}} .testi-box1' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'          => 'box_shadow',
                'label'         => __( 'Box Shadow', 'medilax' ),
                'selector'      => '{{WRAPPER}} .testimonial-box',
                'condition'     => ['testimonial_style' => 'one'],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'          => 'box_shadow3',
                'label'         => __( 'Box Shadow', 'medilax' ),
                'selector'     	=> '{{WRAPPER}} .testi_card',
                'condition'  	=> ['testimonial_style' => 'three'],
            ]
        );
        
        $this->add_control(
            'width',
            [
                'label'     	=> __( 'Box Radious', 'medilax' ),
                'type'      	=> Controls_Manager::SLIDER,
                'size_units' 	=> [ 'px', '%' ],
                'range' 		=> [
                    'px' 		=> [
                        'min' 		=> 0,
                        'max' 		=> 100,
                        'step' 		=> 1,
                    ],
                    '%' 		=> [
                        'min' 		=> 0,
                        'max' 		=> 100,
                    ],
                ],
                'default' 		=> [
                    'unit' 			=> '%',
                    'size' 			=> 0,
                ],
                'selectors' 	=> [
                    '{{WRAPPER}} .testimonial-box' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'condition'  	=> ['testimonial_style' => 'one'],
            ]
        );

        $this->add_control(
			'avatar_section',
			[
				'label' 		=> __( 'Avater Settings', 'plugin-name' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'          => 'box_shadow2',
                'label'         => __( 'Box Shadow', 'medilax' ),
                'selector'     	=> '{{WRAPPER}} .avater-slider-box',
                'condition'  	=> ['testimonial_style' => 'two'],
            ]
        );

        $this->add_control(
            'line_color',
            [
                'label'         => __( 'Line Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-box .avater-line' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .testimonail-desc .testi-rating::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'avater_radious',
            [
                'label'     => __( 'Avater Radious', 'medilax' ),
                'type'      => Controls_Manager::SLIDER,
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
                    '{{WRAPPER}} .testimonial-box .avater' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .avater-slider-box .avater' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .testi-nav1 .testi-avater' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'avatar_color',
            [
                'label'         => __( 'Avatar Circle Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-box .avater' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .avater-slider-box .avater' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .testi-nav1 .testi-avater:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'          => 'avatar_shadow_color',
                'label'         => __( 'Avatar Shadow Color', 'medilax' ),
                'selector'      => '{{WRAPPER}} .testimonial-box .avater',
                'condition'     => ['testimonial_style' => 'one'],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'          => 'avatar_shadow_color2',
                'label'         => __( 'Avatar Shadow Color', 'medilax' ),
                'selector'      => '{{WRAPPER}} .avater-slider-box .avater',
                'condition'     => ['testimonial_style' => 'two'],
            ]
        );
        $this->add_control(
            'rating_color',
            [
                'label'         => __( 'Rating Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .testimonail-desc .testi-rating i' => 'color: {{VALUE}}!important;',
                    '{{WRAPPER}} .testimonial-box .testi-rating' => 'color: {{VALUE}}!important;',
                    '{{WRAPPER}} .testi-box1 .testi-rating i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------Title styling------------------------------------*/

        $this->start_controls_section(
            'name_styling',
            [
                'label'     => __( 'Clinet Name Styling', 'medilax' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'name',
            [
                'label'         => __( 'Name Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-wrapper h3' => 'color: {{VALUE}}!important;',
                    '{{WRAPPER}} .testi_card h4' => 'color: {{VALUE}}!important;',
                    '{{WRAPPER}} .testi-box1 .testi-name' => 'color: {{VALUE}}!important;',

                ],
            ]
        );

        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 'name_typography',
                'label'         => __( 'Name Typography', 'medilax' ),
                'selector'      => '{{WRAPPER}} .testimonial-wrapper h3,{{WRAPPER}} .testi-box1 .testi-name',
            ]
        );

        $this->add_responsive_control(
            'name_margin',
            [
                'label'         => __( 'Name Margin', 'medilax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-wrapper h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testi_card h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testi-box1 .testi-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_padding',
            [
                'label'         => __( 'Name Padding', 'medilax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-wrapper h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testi_card h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testi-box1 .testi-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Designation styling------------------------------------*/

        $this->start_controls_section(
            'desigstyling',
            [
                'label'     => __( 'Clinet Designation Styling', 'medilax' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'designation',
            [
                'label'         => __( 'Designation Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-wrapper span,{{WRAPPER}} .testi-box1 .testi-degi' => 'color: {{VALUE}}!important;',

                ],
            ]
        );

        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 'designation_typography',
                'label'         => __( 'Designation Typography', 'medilax' ),
                'selector'      => '{{WRAPPER}} .testimonial-wrapper span,{{WRAPPER}} .testi-box1 .testi-degi',
            ]
        );

        $this->add_responsive_control(
            'designation_margin',
            [
                'label'         => __( 'Designation Margin', 'medilax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-wrapper span,{{WRAPPER}} .testi-box1 .testi-degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'designation_padding',
            [
                'label'         => __( 'Designation Padding', 'medilax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-wrapper span,{{WRAPPER}} .testi-box1 .testi-degi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Feedback styling------------------------------------*/

        $this->start_controls_section(
            'feedback_styling',
            [
                'label'     => __( 'Feedback Styling', 'medilax' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'feedback',
            [
                'label'         => __( 'Feedback Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-wrapper p,{{WRAPPER}} .testi-box1 .testi-text' => 'color: {{VALUE}}!important;',

                ],
            ]
        );

        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 'feedback_typography',
                'label'         => __( 'Feedback Typography', 'medilax' ),
                'selector'      => '{{WRAPPER}} .testimonial-wrapper p,{{WRAPPER}} .testi-box1 .testi-text',
            ]
        );

        $this->add_responsive_control(
            'feedback_margin',
            [
                'label'         => __( 'Feedback Margin', 'medilax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-wrapper p,{{WRAPPER}} .testi-box1 .testi-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'feedback_padding',
            [
                'label'         => __( 'Feedback Padding', 'medilax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-wrapper p,{{WRAPPER}} .testi-box1 .testi-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<!-----------------------Start Testimonial Area----------------------->';
		if( $settings['testimonial_style'] == 'one' ){
			echo '<div class="testimonial-wrapper">';
		        echo '<div class="container">';
		            echo '<div class="row justify-content-center">';
		                echo '<div class="col-xl-10 wow fadeIn" data-wow-delay="0.3s">';
		                    echo '<div class="row vs-carousel" data-slide-show="2"  data-arrows="true">';
				            foreach( $settings['testimonials'] as $testimonial ) {           
					            echo '<div class="col-xl-6">';
					                echo '<div class="testimonial-box mb-30">';
					                	if( ! empty( $testimonial['client_feedback_description'] ) ){
						                    echo '<div class="content">';
						                        echo '<p class="fs-md">'.wp_kses_post( $testimonial['client_feedback_description'] ).'</p>';
						                    echo '</div>';
						                }
						                if( ! empty( $testimonial['client_image']['url'] ) ){
						                    echo '<div class="author-img">';
						                        echo '<div class="avater-line"></div>';
						                        echo '<div class="avater">';
						                            echo medixi_img_tag( array(
															'url'	=> esc_url( $testimonial['client_image']['url'] )
														) );
						                        echo '</div>';
						                    echo '</div>';
						                }
					                    echo '<div class="author-info">';
					                        echo '<div class="info">';
					                        	if( ! empty( $testimonial['client_name'] ) ){
						                            echo '<h3 class="fs-20 name">'.esc_html( $testimonial['client_name'] ).'</h3>';
						                        }
						                        if( ! empty( $testimonial['client_designation'] ) ){
						                            echo '<span class="fs-xs degi text-theme">'.esc_html( $testimonial['client_designation'] ).'</span>';
						                        }
					                        echo '</div>';
					                        echo '<div class="testi-rating">';
					                            if( $testimonial['rating'] == 'one' ){
								                	echo '<i class="fas fa-star"></i>';
									                echo '<i class="far fa-star"></i>';
									                echo '<i class="far fa-star"></i>';
									                echo '<i class="far fa-star"></i>';
									                echo '<i class="far fa-star"></i>';
								                }elseif( $testimonial['rating'] == 'two' ){
								                	echo '<i class="fas fa-star"></i>';
									                echo '<i class="fas fa-star"></i>';
									                echo '<i class="far fa-star"></i>';
									                echo '<i class="far fa-star"></i>';
									                echo '<i class="far fa-star"></i>';
								                }elseif( $testimonial['rating'] == 'three' ){
								                	echo '<i class="fas fa-star"></i>';
									                echo '<i class="fas fa-star"></i>';
									                echo '<i class="fas fa-star"></i>';
									                echo '<i class="far fa-star"></i>';
									                echo '<i class="far fa-star"></i>';
								                }elseif( $testimonial['rating'] == 'four' ){
								                	echo '<i class="fas fa-star"></i>';
									                echo '<i class="fas fa-star"></i>';
									                echo '<i class="fas fa-star"></i>';
									                echo '<i class="fas fa-star"></i>';
									                echo '<i class="far fa-star"></i>';
								                }else{
								                	echo '<i class="fas fa-star"></i>';
									                echo '<i class="fas fa-star"></i>';
									                echo '<i class="fas fa-star"></i>';
									                echo '<i class="fas fa-star"></i>';
									                echo '<i class="fas fa-star"></i>';
								                }
					                        echo '</div>';
					                    echo '</div>';
					                echo '</div>';
					            echo '</div>';
					        }
					        echo '</div>';
			        	echo '</div>';
			        echo '</div>';
		    	echo '</div>';
		    echo '</div>';
        }elseif( $settings['testimonial_style'] == 'two' ){
        	echo '<div class="testimonial-wrapper">';
		        echo '<div class="container">';
		            
		            echo '<div class="position-relative">';
		                echo '<div class="d-none d-md-block bg-top-right position-absolute start-0 top-0 w-100 h-100" data-bg-src="' . esc_url( plugins_url( 'images/testimonial-shape-1.png', __FILE__ ) ) . '"></div>';
		                echo '<div class="row gx-30 mb-30 mb-lg-0">';
		                    echo '<div class="col-md-5 col-lg-4 col-xl-3 z-index-common">';
		                        echo '<div class="avater-slider-box vs-carousel" data-slide-show="1" data-md-slide-show="1" data-fade="true" data-asnavfor=".testimonail-desc-slide">';

		                        	foreach( $settings['testimonials'] as $testimonial ) { 
			                            echo '<div class="avater-slider">';
			                            	if( ! empty( $testimonial['client_image']['url'] ) ){
							                    echo '<div class="avater">';
						                            echo medixi_img_tag( array(
															'url'	=> esc_url( $testimonial['client_image']['url'] )
														) );
							                    echo '</div>';
							                }
							                if( ! empty( $testimonial['client_name'] ) ){
					                            echo '<h3 class="mb-0 h4 font-body">'.esc_html( $testimonial['client_name'] ).'</h3>';
					                        }
					                        if( ! empty( $testimonial['client_designation'] ) ){
					                            echo '<span class="fs-xs">'.esc_html( $testimonial['client_designation'] ).'</span>';
					                        }
			                           	echo '</div>';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                    echo '<div class="col-md-7 col-lg-8 col-xl-8 align-self-center">';
		                        echo '<div class="pl-30 no-pl-md mt-2 mt-md-0 position-relative">';
		                            echo '<div class="testimonail-quote">';
		                            	echo medixi_img_tag( array(
												'url'	=> esc_url( plugins_url( 'images/quote-icon.png', __FILE__ ) )
											) );
		                            echo '</div>';
		                            echo '<div class="vs-carousel testimonail-desc-slide text-center text-md-start" data-dots="true" data-slide-show="1" data-md-slide-show="1" data-asnavfor=".avater-slider-box">';
		                                
		                            	foreach( $settings['testimonials'] as $testimonial ) { 
			                                echo '<div class="testimonail-desc">';
			                                    echo '<div class="testi-rating">';
			                                        if( $testimonial['rating'] == 'one' ){
									                	echo '<i class="fas fa-star"></i>';
										                echo '<i class="far fa-star"></i>';
										                echo '<i class="far fa-star"></i>';
										                echo '<i class="far fa-star"></i>';
										                echo '<i class="far fa-star"></i>';
									                }elseif( $testimonial['rating'] == 'two' ){
									                	echo '<i class="fas fa-star"></i>';
										                echo '<i class="fas fa-star"></i>';
										                echo '<i class="far fa-star"></i>';
										                echo '<i class="far fa-star"></i>';
										                echo '<i class="far fa-star"></i>';
									                }elseif( $testimonial['rating'] == 'three' ){
									                	echo '<i class="fas fa-star"></i>';
										                echo '<i class="fas fa-star"></i>';
										                echo '<i class="fas fa-star"></i>';
										                echo '<i class="far fa-star"></i>';
										                echo '<i class="far fa-star"></i>';
									                }elseif( $testimonial['rating'] == 'four' ){
									                	echo '<i class="fas fa-star"></i>';
										                echo '<i class="fas fa-star"></i>';
										                echo '<i class="fas fa-star"></i>';
										                echo '<i class="fas fa-star"></i>';
										                echo '<i class="far fa-star"></i>';
									                }else{
									                	echo '<i class="fas fa-star"></i>';
										                echo '<i class="fas fa-star"></i>';
										                echo '<i class="fas fa-star"></i>';
										                echo '<i class="fas fa-star"></i>';
										                echo '<i class="fas fa-star"></i>';
									                }
			                                    echo '</div>';
			                                    if( ! empty( $testimonial['client_feedback_description'] ) ){
				                                    echo '<p class="mb-0 testi-text">'.wp_kses_post( $testimonial['client_feedback_description'] ).'</p>';
				                                }
			                                echo '</div>';
		                                }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
        }elseif( $settings['testimonial_style'] == 'three' ){
            echo '<div class="testimonial-wrapper">';
                echo '<div class="container">';
                    echo '<div class="row vs-testislider">';
                        foreach( $settings['testimonials'] as $testimonial ) {  
                            echo '<div class="col-md-6 col-xl-4">';
                                echo '<div class="testi_card">';
                                    if(!empty($testimonial['feedback_title'])){
                                        echo '<h3 class="testi_card_title">'.esc_html( $testimonial['feedback_title'] ).'</h3>';
                                    }
                                    if(!empty($testimonial['client_feedback_description'])){
                                        echo '<p class="testi_card_text">'.esc_html( $testimonial['client_feedback_description'] ).'</p>';
                                    }

                                    echo '<div class="testi_card_rating">';
                                        if( $testimonial['rating'] == 'one' ){
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="far fa-star"></i>';
                                            echo '<i class="far fa-star"></i>';
                                            echo '<i class="far fa-star"></i>';
                                            echo '<i class="far fa-star"></i>';
                                        }elseif( $testimonial['rating'] == 'two' ){
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="far fa-star"></i>';
                                            echo '<i class="far fa-star"></i>';
                                            echo '<i class="far fa-star"></i>';
                                        }elseif( $testimonial['rating'] == 'three' ){
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="far fa-star"></i>';
                                            echo '<i class="far fa-star"></i>';
                                        }elseif( $testimonial['rating'] == 'four' ){
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="far fa-star"></i>';
                                        }else{
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                        }
                                    echo '</div>';
                                    echo '<div class="testi_card_author">';

                                        if( ! empty( $testimonial['client_image']['url'] ) ){
                                            echo '<div class="testi_card_avater">';
                                                echo medixi_img_tag( array(
                                                        'url'   => esc_url( $testimonial['client_image']['url'] )
                                                    ) );
                                            echo '</div>';
                                        }
                                        echo '<div class="media-body">';
                                            if(!empty($testimonial['client_name'])){
                                                echo '<h4 class="testi_card_name">'.esc_html( $testimonial['client_name'] ).'</h4>';
                                            }
                                            if(!empty($testimonial['client_designation'])){
                                                echo '<span class="testi_card_degi">'.esc_html( $testimonial['client_designation'] ).'</span>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }

                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }elseif( $settings['testimonial_style'] == 'four' ){
            echo '<section class="position-relative space-top space-md-bottom">';
                echo '<div class="testi-shape1"></div>';
                echo '<div class="container">';
                    echo '<div class="row justify-content-between text-center text-lg-start">';
                        echo '<div class="col-lg-5 col-xl-4 align-self-center mb-30 wow fadeInUp" data-wow-delay="0.4s">';
                            if( ! empty( $settings['subtitle'] ) ){
                                echo '<span class="sec-subtitle2">'.esc_html( $settings['subtitle'] ).'</span>';
                            }
                            if( ! empty( $settings['title'] ) ){
                                echo '<h2 class="sec-title h1">'.wp_kses_post( $settings['title'] ).'</h2>';
                            }
                            echo '<div class="testi-nav1" id="testiavater1">';
                                foreach( $settings['testimonials'] as $testimonial ) {
                                    echo '<div>';
                                        if( ! empty( $testimonial['client_image']['url'] ) ){
                                            echo '<div class="testi-avater">';
                                                echo medixi_img_tag( array(
                                                        'url'	=> esc_url( $testimonial['client_image']['url'] )
                                                    ) );
                                            echo '</div>';
                                        }
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-lg-7 col-xl-7 mb-30 wow fadeInUp" data-wow-delay="0.3s">';
                            echo '<div class="testi-slide1" id="testibox1">';
                            foreach( $settings['testimonials'] as $testimonial ) {
                                echo '<div>';
                                    echo '<div class="testi-box1">';
                                        echo '<div class="testi-quote">';
                                            echo medixi_img_tag( array(
                                                'url'	=> esc_url( plugins_url( 'images/quote-testi.png', __FILE__ ) )
                                            ) );
                                        echo '</div>';
                                        if( ! empty( $testimonial['client_feedback_description'] ) ){
                                            echo '<span class="testi-text">'.wp_kses_post( $testimonial['client_feedback_description'] ).'</span>';
                                        }
                                        if( ! empty( $testimonial['client_name'] ) ){
                                            echo '<h4 class="testi-name">'.esc_html( $testimonial['client_name'] ).'</h4>';
                                        }
                                        if( ! empty( $testimonial['client_designation'] ) ){
                                            echo '<span class="testi-degi">'.esc_html( $testimonial['client_designation'] ).'</span>';
                                        }
                                        echo '<span class="testi-rating">';
                                            if( $testimonial['rating'] == 'one' ){
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="far fa-star"></i>';
                                                echo '<i class="far fa-star"></i>';
                                                echo '<i class="far fa-star"></i>';
                                                echo '<i class="far fa-star"></i>';
                                            }elseif( $testimonial['rating'] == 'two' ){
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="far fa-star"></i>';
                                                echo '<i class="far fa-star"></i>';
                                                echo '<i class="far fa-star"></i>';
                                            }elseif( $testimonial['rating'] == 'three' ){
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="far fa-star"></i>';
                                                echo '<i class="far fa-star"></i>';
                                            }elseif( $testimonial['rating'] == 'four' ){
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="far fa-star"></i>';
                                            }else{
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="fas fa-star"></i>';
                                                echo '<i class="fas fa-star"></i>';
                                            }
                                        echo '</span>';
                                    echo '</div>';
                                echo '</div>';
                            }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }elseif( $settings['testimonial_style'] == 'five' ){
            echo '<section class="testi-wrap1  ">';
                if( ! empty( $settings['bg_image'] ) ){
                    echo '<div class="testi-shape2" data-bg-src="'.esc_url(  $settings['bg_image']['url'] ).'"></div>';
                }
                echo '<div class="container">';
                    echo '<div class="row flex-row-reverse">';
                        echo '<div class="col-lg-6 col-xl align-self-center mb-40 mb-lg-0 wow fadeInUp" data-wow-delay="0.3s">';
                            if( ! empty( $settings['title'] ) ){
                                echo '<h2 class="social-bars-title h3">'.esc_html( $settings['title'] ).'</h2>';
                            }
                            echo '<div class="social-bars">';
                                if( ! empty( $settings['facebook_url'] ) ){
                                    echo '<a class="facebook" href="'.esc_url( $settings['facebook_url'] ).'">'.esc_html__( 'Facebook', 'medilax' ).'<i class="fab fa-facebook"></i></a>';
                                }
                                if( ! empty( $settings['twitter_url'] ) ){
                                    echo '<a class="twitter" href="'.esc_url( $settings['twitter_url'] ).'">'.esc_html__( 'Twitter', 'medilax' ).'<i class="fab fa-twitter"></i></a>';
                                }
                                if( ! empty( $settings['instagram_url'] ) ){
                                    echo '<a class="instagram" href="'.esc_url( $settings['instagram_url'] ).'">'.esc_html__( 'instagram', 'medilax' ).'<i class="fab fa-instagram"></i></a>';
                                }
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-lg-6 col-xl-auto">';
                            echo '<div class="testi-style1">';
                                echo '<div class="vs-carousel" data-slide-show="1" data-md-slide-show="1" data-fade="true" data-arrows="true" data-append-arrows="#testi-arrows" data-prev-arrow="far fa-long-arrow-left" data-next-arrow="far fa-long-arrow-right" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true" data-md-arrows="true" data-sm-arrows="true" data-xs-arrows="true">';
                                    foreach( $settings['testimonials'] as $testimonial ) {
                                        echo '<div>';
                                            echo '<div class="testi-body">';
                                                echo '<div class="testi-icon">';
                                                    echo '<div class="sub-plus"><i class="fas fa-plus"></i></div>';
                                                    echo medixi_img_tag( array(
                                                        'url'	=> esc_url( plugins_url( 'images/quote-testi-2.png', __FILE__ ) )
                                                    ) );
                                                echo '</div>';
                                                if( ! empty( $testimonial['client_feedback_description'] ) ){
                                                    echo wp_kses_post( $testimonial['client_feedback_description'] );
                                                }
                                                if( ! empty( $testimonial['client_name'] ) ){
                                                    echo '<h3 class="testi-name">'.esc_html( $testimonial['client_name'] ).'</h3>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                echo '</div>';
                                echo '<div class="testi-arrows" id="testi-arrows"></div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
        echo '<!-----------------------End Testimonial Area----------------------->';
	}
}