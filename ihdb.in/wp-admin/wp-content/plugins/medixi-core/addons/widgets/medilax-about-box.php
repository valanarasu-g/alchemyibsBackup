<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * About Us Widget .
 *
 */
class Medilax_AboutBox extends Widget_Base{

	public function get_name() {
		return 'aboutbox';
	}

	public function get_title() {
		return __( 'Medilax About Box', 'medilax' );
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
				'label'     => __( 'About Us', 'medilax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		
		$this->add_control(
			'box_title',
            [
				'label'         => __( 'Title', 'medilax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Call and Try to Speak Clearly' , 'medilax' ),
				'label_block'   => true,
			]
		);
        $this->add_control(
			'description_text',
            [
				'label'         => __( 'Description Text', 'medilax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Set Description Text' , 'medilax' ),
				'label_block'   => true,

			]
		);
		$this->add_control(
			'counter_number',
            [
				'label'         => __( 'Counter Number', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '1' , 'medilax' ),
				'label_block'   => true,

			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'about_title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-box3 .about-title'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'about_title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .about-box3 .about-title'
			]
		);

        $this->add_responsive_control(
			'about_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-box3 .about-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'about_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-box3 .about-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Description styling------------------------------------*/

		$this->start_controls_section(
			'desc_description',
			[
				'label' 	=> __( 'Description Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'about_desc',
			[
				'label' 		=> __( 'Description Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-box3 .about-text'	=> 'color: {{VALUE}}!important;',

				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'about_desc_typography',
		 		'label' 		=> __( 'Description Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .about-box3 .about-text',
			]
		);

        $this->add_responsive_control(
			'about_desc_margin',
			[
				'label' 		=> __( 'Description Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-box3 .about-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'about_desc_padding',
			[
				'label' 		=> __( 'Description Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-box3 .about-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->end_controls_section();

 

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<div class="about-box3">';
            if( ! empty( $settings['counter_number'] ) ){
                echo '<span class="about-number">'.esc_html( $settings['counter_number'] ).'</span>';
            }
            if( ! empty( $settings['box_title'] ) ){
                echo '<h3 class="about-title">'.esc_html( $settings['box_title'] ).'</h3>';
            }
            if( ! empty( $settings['description_text'] ) ){
                echo '<p class="about-text">'.esc_html( $settings['description_text'] ).'</p>';
            }
        echo '</div>';
	}
}