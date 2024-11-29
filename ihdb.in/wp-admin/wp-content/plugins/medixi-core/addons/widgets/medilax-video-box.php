<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Video Box Widget .
 *
 */
class Medilax_Video_Box_Widget extends Widget_Base {

	public function get_name() {
		return 'medilaxvideobox';
	}

	public function get_title() {
		return __( 'Video Box', 'medilax' );
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
				'label'		 	=> __( 'Video Box', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'video_url',
			[
				'label'     => esc_html__( 'Link', 'medilax' ),
				'type'      => Controls_Manager::URL,
				'options'   => [ 'url' ],
				'default'   => [
					'url'           => '#',
				],
				'label_block' => true,
			]
		);
        $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Title', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Outstanding Care for Local People', 'medilax' )
			]
        );
        $this->add_control(
			'video_img',
			[
				'label'     => __( 'Upload an Image', 'medilax' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				]
			]
		);

        $this->end_controls_section();

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

        $this->start_controls_section(
			'video_btn_style_section',
			[
				'label' 	=> __( 'Video Button Style', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> ['video_btn' => 'yes']
			]
		);

		$this->add_control(
			'video_btn_color',
			[
				'label' 	=> __( 'Video Button Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'video_btn_hover_color',
			[
				'label' 	=> __( 'Video Button Hover Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'video_btn_background_color',
			[
				'label' 	=> __( 'Video Button Background Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'background-color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'video_btn_background_hover_color',
			[
				'label' 	=> __( 'Video Button Background Hover Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'background-color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'video_btn_ripple_effect_color',
			[
				'label' 		=> __( 'Video Button Ripple Effect Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:after,{{WRAPPER}} .play-btn:before' => 'background-color: {{VALUE}}!important;',
                ]
			]
        );

		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
        echo '<div class="video-box wow fadeInUp" data-wow-delay="0.3s">';
            echo '<div class="video-thumb" data-overlay="theme3" data-opacity="7">';
                echo medixi_img_tag( array(
                    'url' => esc_url( $settings['video_img']['url'] ),
                ) );
            echo '</div>';
            echo '<div class="video-content">';
                echo '<a href="'.esc_url( $settings['video_url']['url'] ).'" class="play-btn popup-video style4"><i class="fas fa-play"></i></a>';
                if( ! empty( $settings['section_title'] ) ){
                    echo '<h3 class="video-title"><a class="text-inherit popup-video" href="'.esc_url( $settings['video_url']['url'] ).'">'.esc_html( $settings['section_title'] ).'</a></h3>';
                }
            echo '</div>';
        echo '</div>';

	}
}