<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Middle Box Widget .
 *
 */
class Medilax_Middle_Box_Widget extends Widget_Base {

	public function get_name() {
		return 'medilaxmiddlebox';
	}

	public function get_title() {
		return __( 'Middle Box', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'Header_section',
			[
				'label'		 	=> __( 'Middle Box', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
			
        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Subtitle', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Subtitle', 'medilax' )
			]
        );
        $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Title', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Title', 'medilax' )
			]
        );
        $this->add_control(
			'icon',
			[
				'label'     => __( 'Upload an Image Icon', 'medilax' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'general',
			[
				'label' => __( 'Genaral', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' 	=> __( 'Background Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bg-theme' => 'background-color: {{VALUE}}!important',
                ],
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
                    '{{WRAPPER}} .vs-middle-box' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'          => 'box_shadow',
                'label'         => __( 'Box Shadow', 'medilax' ),
                'selector'     	=> '{{WRAPPER}} .vs-middle-box',
            ]
        );


		$this->end_controls_section();

		//------------------------------Subtitle Styling------------------------------//

        $this->start_controls_section(
			'subtitle_style_section',
			[
				'label' => __( 'Subtitle Style', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'subtitle_color',
			[
				'label' 	=> __( 'Subtitle Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .media-body span' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'subtitle_typography',
				'label' 	=> __( 'Subtitle Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .media-body span',
			]
		);

		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( 'Subtitle Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .media-body span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( 'Subtitle Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .media-body span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'after'
			]
		);

        
        $this->end_controls_section();

        //------------------------------Title Styling------------------------------//

		$this->start_controls_section(
			'title_style_section',
			[
				'label' => __( 'Title Style', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .media-body h4' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .media-body h4',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .media-body h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .media-body h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'after'
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		
        echo '<!------------------ Start Middle Box Area------------------->';
			echo '<div class="vs-middle-box d-md-flex text-center text-md-start bg-theme">';
				if(!empty($settings['icon']['url'])){
					echo '<div class="media-icon mb-20 mb-md-0 mr-20">';
					echo medixi_img_tag( array(
                            'url'       => esc_url( $settings['icon']['url'] ),
                        ) );
					echo '</div>';
				}
				echo '<div class="media-body align-self-center">';
					if(!empty($settings['section_subtitle'])){
						echo '<span class="text-white fs-xs">'.esc_html($settings['section_subtitle']).'</span>';
					}
					if(!empty($settings['section_title'])){
						echo '<h4 class="text-white mb-0">'.esc_html($settings['section_title']).'</h4>';
					}
				echo '</div>';
			echo '</div>';		
	    echo '<!---------------End Middle Box Area---------------->';
	}
}