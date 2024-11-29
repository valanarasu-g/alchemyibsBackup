<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Doctor Single Image Widget .
 *
 */
class Medilax_Doctor_Image_Widget extends Widget_Base {

	public function get_name() {
		return 'medilaxdoctorimage';
	}

	public function get_title() {
		return __( 'Doctor Image With Info', 'medilax' );
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
				'label' 	=> __( 'Doctor Image  With Info', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'doctor_img_style',
			[
				'label' 		=> __( 'Image Style', 'medilax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'medilax' ),
					'two' 			=> __( 'Style Two', 'medilax' ),
				],
			]
		);

        $this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'medilax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'doctor_img_style' =>  ['one', 'two']  ],
			]
		);
		$this->add_control(
			'name',
			[
				'label' 	=> __( 'Name', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Doctor Name', 'medilax' ),
                'rows'      => 2,
                'condition'		=> [ 'doctor_img_style' =>  'two' ],
			]
        );
        $this->add_control(
			'designation',
			[
				'label' 	=> __( 'Designation', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Consultant', 'medilax' ),
                'rows'      => 2,
                'condition'		=> [ 'doctor_img_style' =>  'two' ],
			]
        );
		$this->add_control(
			'image_shape',
			[
				'label' 		=> __( 'Choose a Shape Image', 'medilax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'doctor_img_style' =>  ['one']  ],
			]
		);

        $repeater = new Repeater();
		$repeater->add_control(
			'social_icon',
			[
				'label' 	=> __( 'Social Icon', 'medilax' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'medilax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'medilax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(

			'social_icon_list',
			[
				'label' 		=> __( 'Social Icon', 'clianio' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => __( 'Add Social Icon','clianio' ),
					],
				],
				'condition'		=> [ 'doctor_img_style' =>  ['one']  ],
			]
		);
		
		$this->add_control(
			'button_text',
            [
				'label'         => __( 'Button Text?', 'medilax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Set Button Text' , 'medilax' ),
				'label_block'   => true,
				'condition'		=> [ 'doctor_img_style' =>  ['one']  ],
			]
		);
		
        $this->add_control(
			'button_url',
            [
				'label'         => __( 'Button Url?', 'medilax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '#' , 'medilax' ),
				'label_block'   => true,
				'condition'		=> [ 'doctor_img_style' =>  ['one']  ],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'dr_info',
			[
				'label' => __( 'General', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .member-header .member-angle-links a'	=> 'color: {{VALUE}}!important',
				],
				'condition'		=> [ 'doctor_img_style' =>  ['one']  ],
			]
        );
        $this->add_control(
			'icon_bg_color',
			[
				'label' 		=> __( 'Icon Background Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .member-header .member-angle-links a'	=> 'background-color: {{VALUE}}!important',
				],
				'condition'		=> [ 'doctor_img_style' =>  ['one']  ],
			]
        );
        $this->add_control(
			'icon_hover_color',
			[
				'label' 		=> __( 'Icon Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .member-angle-links .middle-icon i:hover, .member-angle-links a:hover'	=> 'color: {{VALUE}}!important',
				],
				'condition'		=> [ 'doctor_img_style' =>  ['one']  ],
			]
        );
        $this->add_control(
			'icon_bg_hover_color',
			[
				'label' 		=> __( 'Icon Background Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .member-angle-links .middle-icon i:hover, .member-angle-links a:hover'	=> 'background-color: {{VALUE}}!important',
				],
				'condition'		=> [ 'doctor_img_style' =>  ['one']  ],
			]
        );
        $this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Link Text Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .certifate-link'	=> 'color: {{VALUE}}!important',
				],
				'condition'		=> [ 'doctor_img_style' =>  ['one']  ],
			]
        );
        $this->add_control(
			'btn_text_hover_color',
			[
				'label' 		=> __( 'Link Text Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .member-header a:hover'	=> 'color: {{VALUE}}!important',
				],
				'condition'		=> [ 'doctor_img_style' =>  ['one']  ],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'btn_text_typography',
		 		'label' 		=> __( 'Link Text Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .certifate-link',
		 		'condition'		=> [ 'doctor_img_style' =>  ['one']  ],
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' 		=> __( 'Name Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .media-body .name'	=> 'color: {{VALUE}}!important',
				],
				'condition'		=> [ 'doctor_img_style' =>  ['two']  ],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'name_typography',
		 		'label' 		=> __( 'Name Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .media-body .name',
		 		'condition'		=> [ 'doctor_img_style' =>  ['two']  ],
			]
		);
		$this->add_responsive_control(
			'name_margin',
			[
				'label' 		=> __( 'Name Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .media-body .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'		=> [ 'doctor_img_style' =>  ['two']  ],
			]
        );

        $this->add_responsive_control(
			'name_padding',
			[
				'label' 		=> __( 'Name Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .media-body .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'		=> [ 'doctor_img_style' =>  ['two']  ],
			]
        );
        $this->add_control(
			'name_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'desig_color',
			[
				'label' 		=> __( 'Designation Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .media-body .text-theme'	=> 'color: {{VALUE}}!important',
				],
				'condition'		=> [ 'doctor_img_style' =>  ['two']  ],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'desig_typography',
		 		'label' 		=> __( 'Designation Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .media-body .text-theme',
		 		'condition'		=> [ 'doctor_img_style' =>  ['two']  ],
			]
		);
		$this->add_responsive_control(
			'desig_margin',
			[
				'label' 		=> __( 'Designation Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .media-body .text-theme' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'		=> [ 'doctor_img_style' =>  ['two']  ],
			]
        );

        $this->add_responsive_control(
			'desig_padding',
			[
				'label' 		=> __( 'Designation Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .media-body .text-theme' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'		=> [ 'doctor_img_style' =>  ['two']  ],
			]
        );
        $this->end_controls_section();




	}

	protected function render() {

        $settings = $this->get_settings_for_display();

    	if( $settings['doctor_img_style'] == 'one' ){
			echo '<div class="member-header mb-40 overflow-hidden rounded-3 position-relative">';
				if(!empty($settings['image']['url'])){
					echo '<div class="member-details-img">';
					echo medixi_img_tag( array(
							'url'	=> esc_url( $settings['image']['url'] ),
							'class' => 'w-100',
						) );
					echo '</div>';
				}
				echo '<div class="member-angle-links">';
					if(!empty($settings['image_shape']['url'])){
						echo '<div class="shape">';
						echo medixi_img_tag( array(
								'url'	=> esc_url( $settings['image_shape']['url'] ),
							) );
						echo '</div>';
					}
					echo '<span class="middle-icon"><i class="fas fa-share-alt"></i></span>';

					$i = 0;
					foreach( $settings['social_icon_list'] as $social_icon ){
						$i++;

						$social_target 		= $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
						$social_nofollow 	= $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
	                	echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';
							\Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );
						echo '</a>';

						if($i == 4 ){
							break;
						}
					}
				echo '</div>';
				if( ! empty( $settings['button_text'] ) ){
	                echo '<a href="'.esc_url( $settings['button_url'] ).'" class="certifate-link">'.esc_html( $settings['button_text'] ).'<i class="far fa-chevron-circle-right"></i></a>';
				}
			echo '</div>';
		}else{
			echo '<div class="d-flex author-box align-items-center">';
				if(!empty($settings['image']['url'])){
					echo '<div class="avater-small mr-20">';
					echo medixi_img_tag( array(
							'url'	=> esc_url( $settings['image']['url'] )
						) );
					echo '</div>';
				}
                echo '<div class="media-body">';
                	if( ! empty( $settings['name'] ) ){
	                    echo '<h4 class="name h5 text-uppercase mb-0">'.esc_html( $settings['name'] ).'</h4>';
	                }
	                if( ! empty( $settings['designation'] ) ){
	                    echo '<span class="fs-xs text-theme lh-1">'.esc_html( $settings['designation'] ).'</span>';
	                }
               	echo '</div>';
            echo '</div>';
		}
	}
}