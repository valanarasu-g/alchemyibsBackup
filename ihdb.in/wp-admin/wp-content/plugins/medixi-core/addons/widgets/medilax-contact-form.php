<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Contact Form Widget .
 *
 */
class Medilax_Contact_Form_Widget extends Widget_Base {

	public function get_name() {
		return 'medilaxcontactform';
	}

	public function get_title() {
		return __( 'Contact Form', 'medilax' );
	}


	public function get_icon() {
		return 'eicon-code';
    }
    

	public function get_categories() {
		return [ 'medilax' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'form_section',
			[
				'label' => __( 'Contact Form', 'medilax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
        
		$this->add_control(
			'form_style',
			[
				'label' 	=> __( 'Form Style', 'medilax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'one',
				'options' 	=> [
					'one'  		=> __( 'Style One', 'medilax' ),
					'two' 		=> __( 'Style Two', 'medilax' ),
					'three' 	=> __( 'Style Three', 'medilax' ),
				],
			]
		);
        $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Title', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Title', 'medilax' ),
			]
        );
        $this->add_control(
			'section_description',
			[
				'label' 	=> __( 'Short Description', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Write Description', 'medilax' ),
			]
        );
        $this->add_control(
			'contact_number',
			[
				'label' 	=> __( 'Contact Number', 'medilax' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '0088123456789', 'medilax' ),
                'condition'		=> [ 'form_style' =>  'two' ],
			]
        );
        $this->add_control(
			'contact_form_shortcode',
			[
				'label' 	=> __( 'Form Shortcode', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2
			]
        );

        $this->end_controls_section();

		
        $this->start_controls_section(
			'contact_form',
			[
				'label' 		=> __( 'General', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'form_color',
			[
				'label' => __( 'Form Background Color', 'medilax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .form-wrap1' => 'background-color: {{VALUE}}!important',
					'{{WRAPPER}} .form-wrap3' => 'background-color: {{VALUE}}!important',
				],
			]
        );

        $this->end_controls_section();

        /*----------------------------------------Title styling------------------------------------*/


        $this->start_controls_section(
			'form_title_styling',
			[
				'label' 	=> __( 'Title Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'form_title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .form-wrap1 h2'	=>'color: {{VALUE}}',
					'{{WRAPPER}} .form-wrap3 h3'	=>'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'form_title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .form-wrap1 h2'
			]
		);

        $this->add_responsive_control(
			'form_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .form-wrap1 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .form-wrap3 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'form_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .form-wrap1 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .form-wrap3 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*----------------------------------------Desc styling------------------------------------*/


        $this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Description Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'form_desc_color',
			[
				'label' 		=> __( 'Description Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .form-wrap1 p'	=>'color: {{VALUE}}',
					'{{WRAPPER}} .form-wrap3 p'	=>'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'form_desc_typography',
		 		'label' 		=> __( 'Description Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .form-wrap1 p'
			]
		);

        $this->add_responsive_control(
			'form_desc_margin',
			[
				'label' 		=> __( 'Description Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .form-wrap1 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .form-wrap3 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'form_desc_padding',
			[
				'label' 		=> __( 'Description Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .form-wrap1 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .form-wrap3 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();


        /*-----------------------------------------video button styling------------------------------------*/

		$this->start_controls_section(
			'video_btn_styling',
			[
				'label' 	=> __( 'Phone Button Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'form_style' =>  ['two']  ],
			]
        );
        $this->add_control(
			'video_btn_color',
			[
				'label' 	=> __( 'Button Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ripple-icon.style2 i' => 'color: {{VALUE}};',
                ]
			]
        );

		$this->add_control(
			'video_btn_hover_color',
			[
				'label' 	=> __( 'Button Hover Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ripple-icon.style2:hover i' => 'color: {{VALUE}}!important;',
                ]
			]
        );

		$this->add_control(
			'video_btn_background_color',
			[
				'label' 	=> __( 'Button Background Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ripple-icon.style2 i' => 'background-color: {{VALUE}}!important;',
                ]
			]
		);

		$this->add_control(
			'video_btn_background_hover_color',
			[
				'label' 	=> __( 'Button Background Hover Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ripple-icon.style2:hover i' => 'background-color: {{VALUE}}!important;',
                ]
			]
		);

		$this->add_control(
			'video_btn_ripple_effect_color',
			[
				'label' 		=> __( 'Button Ripple Effect Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ripple-icon.style2:after,{{WRAPPER}} .ripple-icon.style2:before' => 'background-color: {{VALUE}}!important;',
                ]
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

        $this->add_responsive_control(
			'btn_margin',
			[
				'label' 		=> __( 'Button Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'btn_padding',
			[
				'label' 		=> __( 'Button Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		echo '<!-- Contact Form -->';
		if( $settings['form_style'] !== 'three' ){
			if( $settings['form_style'] == 'one' ){
				$extra_class = 'shadow-none rounded-3';
				$bg_class 	 = '';
			}elseif( $settings['form_style'] == 'two' ){
				$extra_class = 'bg-white';
				$bg_class 	 = 'bg-title';
			}
			echo '<div class="form-wrap1  overflow-hidden '.esc_attr( $extra_class ).'">';
				echo '<div class="form-title-box '.$bg_class.'">';
					echo '<div class="row justify-content-between align-items-center">';
                        echo '<div class="col-auto">';
							if( ! empty($settings['section_title'])){
								echo '<h2 class="form-title">'. esc_html( $settings['section_title'] ).'</h2>';
							}
							if( ! empty($settings['section_description'] ) ){
								echo '<p class="form-text">'. esc_html( $settings['section_description'] ).'</p>';
							}
						echo '</div>';
						if( ! empty( $settings['contact_number'] ) ){
							$phone = $settings['contact_number'];
							$replace 	= array(' ','-',' - ', '(', ')');
							$with 		= array('','','' ,'' ,'');
							$mobileurl 	= str_replace( $replace, $with, $phone );

							echo '<div class="col-auto d-none d-sm-block">';
	                            echo '<a href="'.esc_attr( 'tel:'.$mobileurl ).'" class="ripple-icon style2"><i class="fas fa-phone"></i></a>';
	                        echo '</div>';
	                    }
					echo '</div>';
				echo '</div>';
				if( ! empty( $settings['contact_form_shortcode'] ) ){
                    echo do_shortcode($settings['contact_form_shortcode']);
                }
			echo '</div>';
		}else{
			echo '<div class="form-wrap3">';
				echo '<div class="form-title">';
					if(!empty($settings['section_title'])){
		                echo '<h3 class="mt-n2 fls-n2 mb-0">'.esc_html( $settings['section_title'] ).'</h3>';
		            }
		            if(!empty($settings['section_description'])){
		                echo '<p class="text-theme mb-4">'.esc_html( $settings['section_description'] ).'</p>';
		            }
	           	echo '</div>';

	           	if(!empty($settings['contact_form_shortcode'])){
                    echo do_shortcode($settings['contact_form_shortcode']);
                }
			echo '</div>';
		}
		echo '<!-- Contact Form end -->';
	}
}