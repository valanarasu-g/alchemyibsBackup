<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Image with Video Widget .
 *
 */
class Medilax_Image_Widget extends Widget_Base {

	public function get_name() {
		return 'medilaximage';
	}

	public function get_title() {
		return __( 'Medilax Image with Video', 'medilax' );
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
				'label' 	=> __( 'Image', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'image_style',
			[
				'label' 		=> __( 'Image Style', 'medilax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'medilax' ),
					'2' 			=> __( 'Style Two', 'medilax' ),
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
			]
		);

        $this->add_control(
			'image_two',
			[
				'label' 		=> __( 'Choose Image', 'medilax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'image_style' => '2' ]
			]
		);


		$this->add_control(
			'video_btn',
			[
				'label' 		=> __( 'Video Button', 'medilax' ),
				'type' 			=> Controls_Manager::SWITCHER,
                'label_on' 		=> __( 'Yes', 'medilax' ),
				'label_off' 	=> __( 'No', 'medilax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);

		$this->add_control(
			'video_link',
			[
				'label' 		=> __( 'Video Link', 'medilax' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( 'https://your-link.com', 'medilax' ),
				'default' 		=> [
					'url' => '#',
				],
				'condition'	=> ['video_btn' => 'yes']
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

		
		echo '<div class="vs-surface wow animated" data-wow-delay="0.3s">';
			if( $settings['image_style'] == '1' ){
				if( !empty( $settings['image']['url'] ) ) {
					echo medixi_img_tag( array(
						'url'	=> esc_url( $settings['image']['url'] ),
						'class'	=> 'w-100'
					) );
					if( !empty( $settings['video_btn'] == 'yes' && !empty( $settings['video_link']['url'] ) ) ) {
						echo '<a href="'.esc_url( $settings['video_link']['url'] ).'" class="play-btn popup-video style2 position-center"><i class="fas fa-play"></i></a>';
					}
				}
			}else{
				echo '<div class="about-img2">';
					echo '<div class="img-3"></div>';
					if( !empty( $settings['image']['url'] ) ) {
						echo '<div class="img-1">';
							echo medixi_img_tag( array(
								'url'	=> esc_url( $settings['image']['url'] ),
							) );
						echo '</div>';
					}
					echo '<div class="img-2">';
						if( ! empty( $settings['image_two']['url'] ) ) {
							echo medixi_img_tag( array(
								'url'	=> esc_url( $settings['image_two']['url'] ),
							) );
						}
						if( ! empty( $settings['video_link']['url'] ) ){
							echo '<a href="'.esc_url( $settings['video_link']['url'] ).'" class="play-btn style4 popup-video"><i class="fas fa-play"></i></a>';
						}
					echo '</div>';
				echo '</div>';
			}
		echo '</div>';
	}
}