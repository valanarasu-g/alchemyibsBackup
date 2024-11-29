<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Features Widget .
 *
 */
class Medilax_Features_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxfeatures';
	}

	public function get_title() {
		return __( 'Medilax Features', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'chose_us_content',
			[
				'label'		=> __( 'Features','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'features_style',
			[
				'label' 		=> __( 'Features Style', 'medilax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'medilax' ),
					'two' 			=> __( 'Style Two', 'medilax' ),
					'three' 		=> __( 'Style Three', 'medilax' ),
					'four' 			=> __( 'Style Four', 'medilax' ),
					'five' 			=> __( 'Style Five', 'medilax' ),
				],
			]
		);
		$repeater = new Repeater();

        $repeater->add_control(
            'icon_type',
            [
                'label'     => esc_html__('Select Your Icon Type', 'medilax'),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'flaticon'     => esc_html__('Theme own Flat Icon', 'medilax'),
                    'image_icon'   => esc_html__('Custom Icon', 'medilax'),
                    'fontawesome'  => esc_html__('Fontawesome', 'medilax'),
                ],
                'default' => 'flaticon',
            ]
        );
        $repeater->add_control(
            'flaticon',
            [
                'name'       => 'flaticon',
                'label'      => esc_html__('Icon', 'medilax'),
                'type'       => Controls_Manager::ICON,
                'options'    => medilax_flaticons(),
                'include'    => medilax_include_flaticons(),
                'condition'  => [
                    'icon_type' => 'flaticon',
                ],
            ]
        );
        $repeater->add_control(
            'fontawesome',
            [
                'label'     => __( 'Fontawesome', 'medilax' ),
                'type'      => Controls_Manager::ICONS,
                'default'   => [
                    'value'     => 'fab fa-facebook-f',
                    'library'   => 'solid',
                ],
                'condition'  => [
                    'icon_type' => 'fontawesome',
                ],
            ]
        );

        $repeater->add_control(
            'image_icon',
            [
                'label'     => __( 'Image icon', 'medilax' ),
                'type'      => Controls_Manager::MEDIA,
                'condition' => [
                    'icon_type' => 'image_icon'
                ],
            ]
        );

        $repeater->add_control(
			'title', [
				'label' 		=> __( 'Title', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'medilax' ),
				'rows' 		=> 2,
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'description', [
				'label' 		=> __( 'Description', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 3,
				'default' 		=> __( 'Customer' , 'medilax' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'details_url', [
				'label' 		=> __( 'Details Url', 'medilax' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( '#' , 'medilax' ),
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'features',
			[
				'label' 		=> __( 'Features Content', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Safe Cleaning Supplies', 'medilax' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
			]
		);

		$this->add_control(
            'feature_bg',
            [
                'label'     => __( 'Image icon', 'medilax' ),
                'type'      => Controls_Manager::MEDIA,
                'condition' => [
                    'features_style' => 'four'
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
			'features_title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper h3'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-about-wrapper h3'
			]
		);

        $this->add_responsive_control(
			'features_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'features_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Description styling------------------------------------*/

		$this->start_controls_section(
			'desc_styling',
			[
				'label' 	=> __( 'Content Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );



        $this->add_control(
			'features_desc_color',
			[
				'label' 		=> __( 'Content Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper p'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_desc_typography',
		 		'label' 		=> __( 'Content Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-about-wrapper p'
			]
		);

        $this->add_responsive_control(
			'features_desc_margin',
			[
				'label' 		=> __( 'Content Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'features_desc_padding',
			[
				'label' 		=> __( 'Content Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
 

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if( $settings['features_style'] == 'one' ){
			echo '<section class="vs-about-wrapper">';
				echo '<div class="container">';
					echo '<div class="row">';
						echo '<div class="align-self-center">';
							echo '<div class="row pt-3">';
								foreach( $settings['features'] as $data ) {
									echo '<div class="col-sm-6 col-lg-5 col-xl-6">';
										echo '<div class="d-flex mb-20">';
											if( $data['icon_type'] == 'flaticon' ) {
			                                    echo '<span class="text-theme icon-3x mr-20">';
			                                            echo '<i class="'.esc_attr( $data['flaticon'] ).'"></i>';
			                                    echo '</span>';
			                                }elseif( $data['icon_type'] == 'fontawesome' ) {
			                                    echo '<span class="text-theme icon-3x mr-20">';
			                                            \Elementor\Icons_Manager::render_icon( $data['fontawesome'], [ 'aria-hidden' => 'true' ] );
			                                    echo '</span>';
			                                }elseif( $data['icon_type'] == 'image_icon' ){
			                                    $icon = wp_get_attachment_image_src( $data['image_icon']['url'], 'medilax_70X70' );
												if( ! empty( $icon ) ){
													echo '<div class="img-icon">';
														echo '<img src="'.esc_url($icon[0]).'" alt="'.esc_html__( 'Icon', 'medilax' ).'">';
													echo '</div>';
												}
			                                }
											echo '<div class="media-body">';
												if( ! empty( $data['title'] ) ){
													echo '<h3 class="h5 mb-2 pb-1">'.esc_html( $data['title'] ).'</h3>';
												}
												if(!empty($data['description'])){
													echo '<p class="mb-0 fs-xs">'.htmlspecialchars_decode(esc_html( $data['description'] )).'</p>';
												}
											echo '</div>';
										echo '</div>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</section>';
		}elseif( $settings['features_style'] == 'two' ){
			echo '<div class="col-lg-9 col-xl-11 col-xxl-12">';
                echo '<div class="row justify-content-center justify-content-xl-start">';
                	foreach( $settings['features'] as $data ) {
	                    echo '<div class="col-sm-6 col-xxl-6 mb-30">';
	                        echo '<div class="feaures-mark text-center text-md-start">';
	                        	if( $data['icon_type'] == 'flaticon' ) {
                                    echo '<span class="mark-icon">';
                                            echo '<i class="'.esc_attr( $data['flaticon'] ).'"></i>';
                                    echo '</span>';
                                }elseif( $data['icon_type'] == 'fontawesome' ) {
                                    echo '<span class="mark-icon">';
                                            \Elementor\Icons_Manager::render_icon( $data['fontawesome'], [ 'aria-hidden' => 'true' ] );
                                    echo '</span>';
                                }elseif( $data['icon_type'] == 'image_icon' ){
                                    $icon = wp_get_attachment_image_src( $data['image_icon']['url'], 'medilax_70X70' );
                                    echo '<div class="mark-icon img-icon">';
                                        echo '<img src="'.esc_url($icon[0]).'" alt="'.esc_html__( 'Icon', 'medilax' ).'">';
                                    echo '</div>';
                                }
                                if( ! empty( $data['title'] ) ){
		                            echo '<h3 class="mark-title h6 mb-1 ">'.esc_html( $data['title'] ).'</h3>';
		                        }
		                        if(!empty($data['description'])){
		                            echo '<p class="mark-text fs-xs mb-0">'.esc_html( $data['description'] ).'</p>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
		}elseif( $settings['features_style'] == 'three' ){
			echo '<section class="vs-about-wrapper">';
				foreach( $settings['features'] as $data ) {
					echo '<div class="new-features">';
						if( $data['icon_type'] == 'flaticon' ) {
                            echo '<span class="new-features-icon">';
                                    echo '<i class="'.esc_attr( $data['flaticon'] ).'"></i>';
                            echo '</span>';
                        }elseif( $data['icon_type'] == 'fontawesome' ) {
                            echo '<span class="new-features-icon">';
                                    \Elementor\Icons_Manager::render_icon( $data['fontawesome'], [ 'aria-hidden' => 'true' ] );
                            echo '</span>';
                        }elseif( $data['icon_type'] == 'image_icon' ){
                            $icon = wp_get_attachment_image_src( $data['image_icon']['url'], 'medilax_70X70' );
                            echo '<div class="img-icon">';
                                echo '<img src="'.esc_url($data['image_icon']['url']).'" alt="'.esc_html__( 'Icon', 'medilax' ).'">';
                            echo '</div>';
                        }
						echo '<div class="media-body">';
							if( ! empty( $data['title'] ) ){
								echo '<h3 class="new-features-title">'.esc_html( $data['title'] ).'</h3>';
							}
							if( ! empty($data['description'] ) ){
								echo '<p class="new-features-text">'.htmlspecialchars_decode(esc_html( $data['description'] )).'</p>';
							}
						echo '</div>';
					echo '</div>';
				}
			echo '</section>';
		}elseif( $settings['features_style'] == 'four' ){
			echo '<section class="vs-about-wrapper">';
				echo '<div class="container">';
					echo '<div class="row vs-feature-carousel" data-slide-to-show="3">';
						foreach( $settings['features'] as $data ) {
							echo '<div class="col-xl-4 feature-style1">';
								echo '<div class="feature-body">';

									echo '<div class="feature-content">';
										if( ! empty( $data['title'] ) ){
											echo '<h3 class="feature-title"><a href="'.esc_url( $data['details_url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
										}
										if( ! empty($data['description'] ) ){
											echo '<p class="feature-text">'.esc_html( $data['description'] ).'</p>';
										}
									echo '</div>';

									if( $data['icon_type'] == 'flaticon' ) {
										echo '<span class="new-features-icon">';
												echo '<i class="'.esc_attr( $data['flaticon'] ).'"></i>';
										echo '</span>';
									}elseif( $data['icon_type'] == 'fontawesome' ) {
										echo '<span class="new-features-icon">';
												\Elementor\Icons_Manager::render_icon( $data['fontawesome'], [ 'aria-hidden' => 'true' ] );
										echo '</span>';
									}elseif( $data['icon_type'] == 'image_icon' ){
										$icon = wp_get_attachment_image_src( $data['image_icon']['url'], 'medilax_70X70' );
										echo '<div class="feature-icon" data-bg-src="'.$settings['feature_bg']['url'].'">';
											echo '<img src="'.esc_url($data['image_icon']['url']).'" alt="'.esc_html__( 'Icon', 'medilax' ).'">';
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</section>';
		}elseif( $settings['features_style'] == 'five' ){
			echo '<section class="vs-about-wrapper">';
				echo '<div class="container">';
					echo '<div class="feature-wrap1">';
						echo '<div class="row gx-2px vs-feature-carousel" data-slide-to-show="5">';
							foreach( $settings['features'] as $data ) {
								echo '<div class="col-xl-4 feature-style2">';
									echo '<div class="feature-body">';
										if( $data['icon_type'] == 'flaticon' ) {
											echo '<span class="feature-icon">';
												echo '<div class="sub-plus"><i class="fas fa-plus"></i></div>';
												echo '<i class="'.esc_attr( $data['flaticon'] ).'"></i>';
											echo '</span>';
										}elseif( $data['icon_type'] == 'fontawesome' ) {
											echo '<span class="feature-icon">';
												echo '<div class="sub-plus"><i class="fas fa-plus"></i></div>';
												\Elementor\Icons_Manager::render_icon( $data['fontawesome'], [ 'aria-hidden' => 'true' ] );
											echo '</span>';
										}elseif( $data['icon_type'] == 'image_icon' ){
											$icon = wp_get_attachment_image_src( $data['image_icon']['url'], 'medilax_70X70' );
											echo '<div class="feature-icon">';
												echo '<div class="sub-plus"><i class="fas fa-plus"></i></div>';
												echo '<img src="'.esc_url($data['image_icon']['url']).'" alt="'.esc_html__( 'Icon', 'medilax' ).'">';
											echo '</div>';
										}
										if( ! empty( $data['title'] ) ){
											echo '<h3 class="feature-title"><a href="'.esc_url( $data['details_url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
										}
										if( ! empty($data['description'] ) ){
											echo '<p class="feature-text">'.esc_html( $data['description'] ).'</p>';
										}
										if( ! empty( $data['details_url'] ) ){
											echo '<a href="'.esc_url( $data['details_url'] ).'" class="feature-btn" tabindex="-1"><i class="far fa-long-arrow-right"></i></a>';
										}
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</section>';
		}
	}
}