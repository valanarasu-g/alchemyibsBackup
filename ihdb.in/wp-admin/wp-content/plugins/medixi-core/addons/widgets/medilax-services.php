<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Service Widget .
 *
 */
class Medilax_Service_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxservices';
	}

	public function get_title() {
		return __( 'Medilax Service', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label'     => __( 'Service', 'medilax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'service_style',
			[
				'label' 		=> __( 'Service Style', 'medilax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'medilax' ),
					'two' 			=> __( 'Style Two', 'medilax' ),
					'three' 		=> __( 'Style Three', 'medilax' ),
					'four' 			=> __( 'Style Four', 'medilax' ),
					'five' 			=> __( 'Style Five', 'medilax' ),
					'six' 			=> __( 'Style Six', 'medilax' ),
				],
			]
		);

		$this->add_control(
			'slide_to_show',
			[
				'label' 		=> __( 'Slide To Show', 'medilax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 2,
						'max' 			=> 8,
						'step' 			=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'condition'		=> [ 'service_style!' =>  'three' ],
			]
		);

		$this->add_control(
			'post_count',
			[
				'label' 		=> __( 'No of Post to show', 'medilax' ),
                'type' 			=> Controls_Manager::NUMBER,
                'min' 			=> 2,
				'max' 			=> 15,
				'step' 			=> 1,
			]
        );

        $this->add_control(
			'service_post_order',
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
            'shape_image',
            [
                'label'         => __( 'Service Post Background Shape Image', 'medilax' ),
                'type'          => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url( 'images/sr-shape.png', __FILE__ )
                ],
                'condition'		=> [ 'service_style' =>  'one' ],
            ]
        );

        $this->add_control(
            'service_btn_title', [
                'label' 		=> esc_html__( 'Button Text', 'medilax' ),
                'type' 			=> Controls_Manager::TEXT,
                'label_block' 	=> true,
                'default' 		=> esc_html__( 'Read More', 'medilax' ),
                'condition'		=> [ 'service_style' =>  ['two','three'] ],
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
		$this->add_control(
			'bg_color',
			[
				'label' 	=> __( 'Box Background Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-card' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .service-box' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .service-thumb .sr-body' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .service-style1 .service-overlay' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'medilax' ),
				'selectors' 	=> ['{{WRAPPER}} .service-card','{{WRAPPER}} .service-box','{{WRAPPER}} .service-thumb','{{WRAPPER}} .service-style1']
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
					'{{WRAPPER}} .service-card' => 'border-radius: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .service-box' => 'border-radius: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .service-thumb' => 'border-radius: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .service-style1' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'condition'		=> [ 'service_style!' =>  'three' ],
			]
		);
		$this->add_control(
			'more_options',
			[
				'label' 		=> __( 'Border Settings', 'medilax' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition'		=> [ 'service_style' =>  'two' ],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' 			=> 'border_color',
				'label' 		=> __( 'Border ', 'plugin-domain' ),
				'selector' 		=> '{{WRAPPER}} .service-box',
				'condition'		=> [ 'service_style' =>  'two' ],
			]
		);

		$this->add_control(
			'more_options2',
			[
				'label' 		=> __( 'Border Hover Settings', 'medilax' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition'		=> [ 'service_style' =>  'two' ],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' 			=> 'border_hover_color',
				'label' 		=> __( 'Border Hover Color', 'plugin-domain' ),
				'selector' 		=> '{{WRAPPER}} .service-box:hover',
				'condition'		=> [ 'service_style' =>  'two' ],
			]
		);


		$this->end_controls_section();

		/*-----------------------------------------Thumbnail styling------------------------------------*/
		$this->start_controls_section(
			'image_styling',
			[
				'label' 		=> __( 'Thumbnail Settings', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'service_style!' =>  'three' ],
			]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 			=> 'img_hover2',
				'label' 		=> __( 'Thumbnail Overlay', 'plugin-domain' ),
				'types' 		=> [ 'classic', 'gradient' ],
				'selector' 		=> '{{WRAPPER}} .service-card .sr-img::before',
				'condition'		=> [ 'service_style' =>  'one' ],

			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 			=> 'img_hover1',
				'label' 		=> __( 'Thumbnail Overlay', 'plugin-domain' ),
				'types' 		=> [ 'classic', 'gradient' ],
				'selector' 		=> '{{WRAPPER}} .service-box .sr-img:before',
				'condition'		=> [ 'service_style' =>  'two' ],

			]
		);

		$this->end_controls_section();

		/*-----------------------------------------readmore Icon styling------------------------------------*/
		$this->start_controls_section(
			'icon_styling',
			[
				'label' 		=> __( 'Icon Settings', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'readmore_options',
			[
				'label' 		=> __( 'Readmore Icon Settings', 'medilax' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition'		=> [ 'service_style!' =>  'three' ],
			]
		);

        $this->add_control(
			'readmore_icon_color',
			[
				'label' 	=> __( 'Icon Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-btn.style2 i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .icon-btn.style4 i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .service-style1 .service-btn i' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style!' =>  'three' ],
			]
		);
		$this->add_control(
			'readmore_icon_bg_color',
			[
				'label' 	=> __( 'Icon Background Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-btn.style2 i' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .icon-btn.style4 i' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .service-style1 .service-btn i' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style!' =>  'three' ],
			]
		);

		$this->add_control(
			'readmore_icon_hover_color',
			[
				'label' 	=> __( 'Icon Hover Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-card:hover .icon-btn i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .icon-btn.style4 i:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .service-style1 .service-btn:hover i' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style!' =>  'three' ],
			]
		);
		$this->add_control(
			'readmore_icon_hover_bg_color',
			[
				'label' 	=> __( 'Icon Hover Background Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-card:hover .icon-btn i' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .icon-btn.style4 i:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .service-style1 .service-btn:hover i' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style!' =>  'three' ],
			]
		);


		/*-----------------------------------------main Icon styling------------------------------------*/

		$this->add_control(
			'icon_options',
			[
				'label' 		=> __( 'Icon Settings', 'medilax' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition'		=> [ 'service_style!' =>  'six' ],
			]
		);

        $this->add_control(
			'icon_color',
			[
				'label' 	=> __( 'Icon Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-card .sr-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .service-box .sr-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .service-thumb:hover .sr-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label' 	=> __( 'Icon Background Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-card .sr-icon i' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .service-box .sr-icon i' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style!' =>  'three' ],
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' 	=> __( 'Icon Hover Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-card:hover .sr-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .service-box:hover .sr-icon i' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style!' =>  'three' ],
			]
		);
		$this->add_control(
			'icon_hover_bg_color',
			[
				'label' 	=> __( 'Icon Hover Background Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-card:hover .sr-icon i' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .service-box:hover .sr-icon i' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style!' =>  'three' ],
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
			'service_title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-wrapper h3'	=> 'color: {{VALUE}}',
				],
			]
        );
        $this->add_control(
			'service_title_hover_color',
			[
				'label' 		=> __( 'Title Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-wrapper a:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'service_title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-service-wrapper h3'
			]
		);

        $this->add_responsive_control(
			'service_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-wrapper h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'service_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-wrapper h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Description styling------------------------------------*/

		$this->start_controls_section(
			'desc_description',
			[
				'label' 	=> __( 'Content Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'service_desc',
			[
				'label' 		=> __( 'Content Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-wrapper p'	=> 'color: {{VALUE}}!important;',

				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'service_desc_typography',
		 		'label' 		=> __( 'Content Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-service-wrapper p',
			]
		);

        $this->add_responsive_control(
			'service_desc_margin',
			[
				'label' 		=> __( 'Content Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-wrapper p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'service_desc_padding',
			[
				'label' 		=> __( 'Content Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-wrapper p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		
		global $post;
		
    	$services = new \WP_Query(array(
			'posts_per_page' =>	$settings['post_count'],
			'post_type' 	 => 'medilax_service',
			'order' 		 => $settings['service_post_order']
		));
		
		echo '<!-----------------------Start Service Area----------------------->';
		if( $settings['service_style'] == 'one' ){
			echo '<section class="vs-service-wrapper">';
				echo '<div class="container">';
					echo '<div class="row vs-carousel" data-arrows="false" data-slide-show="'.esc_attr( $settings['slide_to_show']['size'] ).'">';
						while ($services->have_posts()) { $services->the_post();
    						$short_desc	= medixi_meta( 'short_descriptons' );

    						$type 		= medixi_meta( 'icon-type' );
                            $options 	= medixi_flat_icon_options();
                            $icon 		= medixi_meta('f-icon');
                            $image 		= wp_get_attachment_image_src( medixi_meta('custom-icon_id'), 'full' );

							echo '<div class="col-xl-4">';
								echo '<div class="service-card mb-30">';
									echo '<div class="sr-body">';
										echo '<h3 class="h4 sr-title mb-2 mb-md-4"><a class="text-reset" href="'.esc_url( get_the_permalink() ).'">'.get_the_title().'</a></h3>';
										if( ! empty( $short_desc ) ){
											echo '<p class="sr-text fs-xs">'.esc_html( $short_desc ).'</p>';
										}
									echo '</div>';
									echo '<div class="sr-icons">';
		                                echo '<a href="'.esc_url( get_the_permalink() ).'" class="icon-btn style2" tabindex="0"><i class="far fa-long-arrow-right"></i></a>';
										if( $type == 'custom' && ! empty( $image )) {
											echo '<div class="img-icon">';
												echo medixi_img_tag( array(
						                            'url'   => esc_url( $image[0] ),
						                            'class' => 'w-100',
						                        ) );
					                        echo '</div>';
										}elseif( $type == 'flat_icon' ){
											echo '<span class="sr-icon">';
												echo '<i class="'.esc_attr( $icon ).' fa-4x"></i>';
											echo '</span>';
										}
		                            echo '</div>';
									echo '<div class="sr-img">';
										if( ! empty( $settings['shape_image']['url'] ) ){
											echo '<div class="position-absolute start-0 end-0 top-0">';
											echo medixi_img_tag( array(
					                            'url'   => esc_url( $settings['shape_image']['url'] ),
					                            'class' => 'w-100',
					                        ) );
											echo '</div>';
										}
										if( has_post_thumbnail() ){
											the_post_thumbnail();
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
						wp_reset_postdata();
					echo '</div>';
				echo '</div>';
			echo '</section>';
        }elseif( $settings['service_style'] == 'two' ){
        	echo '<section class="vs-service-wrapper">';
		        echo '<div class="container">';
		            echo '<div class="row vs-carousel wow fadeIn" data-wow-delay="0.3s" data-slide-show="'.esc_attr( $settings['slide_to_show']['size'] ).'" data-arrows="true">';
		            	while ($services->have_posts()) { $services->the_post();
    						$short_desc	= medixi_meta( 'short_descriptons' );

    						$type = medixi_meta( 'icon-type' );
                            $options = medixi_flat_icon_options();
                            $icon = medixi_meta('f-icon');
                            $image = wp_get_attachment_image_src( medixi_meta('custom-icon_id'), 'full' );

			                echo '<div class="col-xl-4 mb-25">';
			                    echo '<div class="service-box ">';
			                    	if(has_post_thumbnail()) :
			                    		echo '<div class="sr-img">';
										the_post_thumbnail('medilax_347x318');
										echo '</div>';
									endif;

			                        echo '<div class="sr-icon">';
										if( $type == 'custom' && ! empty( $image )) {
											echo '<div class="img-icon">';
												echo medixi_img_tag( array(
						                            'url'   => esc_url( $image[0] ),
						                            'class' => 'w-100',
						                        ) );
					                        echo '</div>';
										}elseif($type == 'flat_icon'){
											echo '<i class="'.esc_attr( $icon ).' fa-4x"></i>';
										}
									echo '</div>';
			                        echo '<div class="sr-content">';
			                            echo '<h3 class="h4"><a class="text-reset" href="'.esc_url( get_the_permalink() ).'">'.get_the_title().'</a></h3>';
			                            if(!empty($short_desc)){
											echo '<p class="fs-xs">'.esc_html( $short_desc ).'</p>';
										}
			                        echo '</div>';

			                        echo ' <div class="btn-align">';
		                            	echo '<a href="'.get_the_permalink().'" class="link-btn">'.esc_html($settings['service_btn_title']).'<i class="far fa-long-arrow-right"></i></a>';
		                            echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }
		                
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
        }elseif( $settings['service_style'] == 'three' ){
        	echo '<section class="vs-service-wrapper">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                while ($services->have_posts()) { $services->the_post();
    						$short_desc	= medixi_meta( 'short_descriptons' );

    						$type = medixi_meta( 'icon-type' );
                            $options = medixi_flat_icon_options();
                            $icon = medixi_meta('f-icon');
                            $image = wp_get_attachment_image_src( medixi_meta('custom-icon_id'), 'full' );
			                echo '<div class="col-md-6 col-xl-4">';
			                    echo '<div class="service-thumb">';
			                        if(has_post_thumbnail()) :
			                    		echo '<div class="sr-img">';
											the_post_thumbnail('medilax_387x355');
										echo '</div>';
									endif;
			                        echo '<div class="sr-body">';
			                        	if( $type == 'custom' && !empty( $image )) {
		                                    echo '<div class="img-icon">';
		                                        echo medixi_img_tag( array(
		                                            'url'   => esc_url( $image[0] ),
		                                            'class' => 'w-100',
		                                        ) );
		                                    echo '</div>';
		                                }elseif( $type == 'flat_icon' ){
		                                    echo '<span class="sr-icon">';
		                                        echo '<i class="'.esc_attr( $icon ).' fa-3x"></i>';
		                                    echo '</span>';
		                                }
		                                echo '<h3 class="h4 sr-title "><a class="text-reset" href="'.esc_url( get_the_permalink() ).'">'.get_the_title().'</a></h3>';
			                            if( ! empty( $short_desc ) ){
		                                    echo '<p class="sr-text">'.esc_html( $short_desc ).'</p>';
		                                }
										echo '<a href="'.get_the_permalink().'" class="link-btn">'.esc_html( $settings['service_btn_title'] ).'<i class="fal fa-long-arrow-right"></i></a>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
		                }
		                wp_reset_postdata();
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
        }elseif( $settings['service_style'] == 'four' ){
        	echo '<div class="vs-service-wrapper">';
	        	echo '<div class="container service_grid_container">';
				    echo '<div class="row vs-carousel2 wow fadeInUp" data-wow-delay="0.3s" data-arrows="true" data-slide-show="'.esc_attr( $settings['slide_to_show']['size'] ).'">';
				    	while ($services->have_posts()) { $services->the_post();
							$short_desc	= medixi_meta( 'short_descriptons' );

							$type = medixi_meta( 'icon-type' );
	                        $options = medixi_flat_icon_options();
	                        $icon = medixi_meta('f-icon');
	                        $image = wp_get_attachment_image_src( medixi_meta('custom-icon_id'), 'full' );
					        echo '<div class="col-xl-3 col-lg-4 col-md-6">';
					            echo '<div class="service_grid">';
					                echo '<div class="service_grid_img">';
					                    if( has_post_thumbnail() ) :
											the_post_thumbnail();
										endif;
					                echo '</div>';
					                echo '<div class="service_grid_content">';
					                    echo '<h3 class="service_grid_title"><a class="text-reset" href="'.esc_url( get_the_permalink() ).'">'.get_the_title().'</a></h3>';
					                    if( ! empty( $short_desc ) ){
						                    echo '<p class="service_grid_text">'.esc_html( $short_desc ).'</p>';
						                }
					                    echo '<a href="'.get_the_permalink().'" class="vs-btn service_grid_btn">'.esc_html__('Read More', 'medilax').'</a>';
					                echo '</div>';
					            echo '</div>';
					        echo '</div>';
				        }
						wp_reset_postdata();
				    echo '</div>';
				echo '</div>';
			echo '</div>';
        }elseif( $settings['service_style'] == 'five' ){
			echo '<div class="vs-service-wrapper">';
	        	echo '<div class="container">';
				    echo '<div class="row vs-carousel2 wow fadeInUp" data-wow-delay="0.3s" data-arrows="true" data-slide-show="'.esc_attr( $settings['slide_to_show']['size'] ).'">';
				    	while ( $services->have_posts() ) {
							$services->the_post();
							$short_desc	= medixi_meta( 'short_descriptons' );

							$type 		= medixi_meta( 'icon-type' );
							$options 	= medixi_flat_icon_options();
							$icon 		= medixi_meta('f-icon');
							$image 		= wp_get_attachment_image_src( medixi_meta('custom-icon_id'), 'full' );
							
							echo '<div class="col-xl-4 mb-25">';
			                    echo '<div class="service-box ">';
									if( has_post_thumbnail() ){
				                        echo '<div class="sr-img">';
											the_post_thumbnail( 'medilax_347x200', array( 'class'	=> 'w-100' ) );
				                        echo '</div>';
									}
									if( $type == 'custom' && !empty( $image )) {
										echo '<div class="img-icon">';
											echo medixi_img_tag( array(
												'url'   => esc_url( $image[0] ),
												'class' => 'w-100',
											) );
										echo '</div>';
									}elseif( $type == 'flat_icon' ){
										echo '<span class="sr-icon">';
											echo '<i class="'.esc_attr( $icon ).'"></i>';
										echo '</span>';
									}
			                        echo '<div class="sr-content">';
			                            echo '<h3 class="h4"><a class="text-reset" href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a></h3>';
										if( ! empty( $short_desc ) ){
				                            echo '<p class="fs-xs">'.esc_html( $short_desc ).'</p>';
										}
			                        echo '</div>';
			                        echo '<a href="'.esc_url( get_permalink() ).'" class="icon-btn style4"><i class="far fa-long-arrow-alt-right"></i></a>';
			                    echo '</div>';
			                echo '</div>';
				        }
						wp_reset_postdata();
				    echo '</div>';
				echo '</div>';
			echo '</div>';
		}elseif( $settings['service_style'] == 'six' ){
			echo '<div class="vs-service-wrapper">';
				echo '<div class="container container-style2">';
					echo '<div class="row gx-20 vs-carousel2 wow fadeInUp" data-wow-delay="0.4s" data-slide-show="'.esc_attr( $settings['slide_to_show']['size'] ).'">';
						while ( $services->have_posts() ) {
							$services->the_post();
							
							$short_desc	= medixi_meta( 'short_descriptons' );
							echo '<div class="col-xl-auto">';
								echo '<div class="service-style1">';
									if( has_post_thumbnail() ){
										echo '<div class="service-img">';
											the_post_thumbnail('medilax_302x526');
										echo '</div>';
									}
									echo '<div class="service-overlay"></div>';

									echo '<h3 class="service-flip-title">'.esc_html( get_the_title() ).'</h3>';

									echo '<div class="service-content">';
										echo '<h3 class="service-title"><a href="'.get_permalink().'">'.esc_html( get_the_title() ).'</a></h3>';
										if( ! empty( $short_desc ) ){
											echo '<p class="service-text">'.esc_html( $short_desc ).'</p>';
										}
									echo '</div>';
									echo '<a href="'.get_permalink().'" class="service-btn"><i class="far fa-plus"></i></a>';
								echo '</div>';
							echo '</div>';
						}
						wp_reset_postdata();
					echo '</div>';
					echo '<div class="slide-nav1" id="slidenav1"></div>';
				echo '</div>';
			echo '</div>';
		}
	}
}