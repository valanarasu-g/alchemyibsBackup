<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
/**
 *
 * Header Widget .
 *
 */
class Medilax_Header_Info extends Widget_Base {

	public function get_name() {
		return 'medilaxheaderinfo';
	}

	public function get_title() {
		return __( 'Header Info', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax_header_elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'headerinfo_section',
			[
				'label' 	=> __( 'Header Info', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'info_icon',
			[
				'label' 		=> __( 'Info Icon', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'fas fa-mobile-android-alt', 'medilax' ),
			]
		);

		$this->add_control(
			'info_label_text',
			[
				'label' 		=> __( 'Info Label text', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'hotline emergency', 'medilax' ),
			]
		);

		$this->add_control(
			'phone_number',
			[
				'label' 		=> __( 'Phone Number', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '+89(0) 1256 2156', 'medilax' ),
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'info_styling',
			[
				'label'     => __( 'Info Styling', 'medilax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'info_bg_color',
			[
				'label' 		=> __( 'Info Background Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infobox-style1' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infobox-style1 .infobox-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'label_text',
			[
				'label' 		=> __( 'Label Text Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infobox-style1 .infobox-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'phone_number_color',
			[
				'label' 		=> __( 'Number Text Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infobox-style1 .infobox-link' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'phone_number_color_hover',
			[
				'label' 		=> __( 'Number Text Color Hover', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infobox-style1 .infobox-link:hover' => 'color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

    }


	protected function render() {

        $settings = $this->get_settings_for_display();

        $phone          = ( !empty( $settings['phone_number'] ) ) ? $settings['phone_number'] : "";

        $replace        = array(' ','-',' - ');
        $with           = array('','','');
        $mobileurl      = str_replace( $replace, $with, $phone );

		echo '<div class="infobox-style1">';
            if( ! empty( $settings['info_icon'] ) ){
                echo '<div class="infobox-icon"><i class="'.esc_attr( $settings['info_icon'] ).'"></i></div>';
            }
            echo '<div class="media-body">';
                if( ! empty( $settings['info_label_text'] ) ){
                    echo '<span class="infobox-label">'.esc_html( $settings['info_label_text'] ).'</span>';
                }
                if( ! empty( $phone ) ){
                    echo '<a href="tel:'.esc_attr( $mobileurl ).'" class="infobox-link">'.esc_html( $phone ).'</a>';
                }
            echo '</div>';
        echo '</div>';

	}
}