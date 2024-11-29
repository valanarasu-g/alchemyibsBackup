<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
/**
 *
 * Header Widget .
 *
 */
class Medilax_Header_Search extends Widget_Base {

	public function get_name() {
		return 'medilaxheadersearch';
	}
	public function get_title() {
		return __( 'Header Search', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax_header_elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Search', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'search_style',
			[
				'label' 	=> __( 'Style', 'medilax' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'1' => __( 'Style One', 'medilax' ),
					'2' => __( 'Style Two', 'medilax' ),
				],
				'default' => '1',
			]
        );

		$this->add_control(
			'search_text',
			[
				'label' 		=> __( 'Search Text', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Search Keyword', 'medilax' ),
				'condition'		=> [ 'search_style' => [ '1' ] ],
			]
		);

		$this->add_control(
			'placeholder_text',
			[
				'label' 		=> __( 'Placeholder Text', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'What are you looking for', 'medilax' ),
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'search_styling',
			[
				'label'     => __( 'Search Styling', 'medilax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'text_color',
			[
				'label' 		=> __( 'Text Color', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .search-btn2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_color_hover',
			[
				'label' 		=> __( 'Text Color Hover', 'foodelio' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .search-btn2:hover' => 'color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

    }


	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['search_style'] == '1' ){
			echo '<button class="search-btn2 searchBoxTggler"><i class="far fa-search"></i>'.esc_html( $settings['search_text'] ).'</button>';

			// Search Popup
			echo '<div class="popup-search-box d-none d-lg-block">';
				echo '<button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>';
				echo '<form action="'.esc_url( home_url( '/' ) ).'">';
					echo '<input name="s" value="'.get_search_query().'" type="text" class="border-theme" placeholder="'.esc_attr( $settings['placeholder_text'] ).'">';
					echo '<button type="submit"><i class="fal fa-search"></i></button>';
				echo '</form>';
			echo '</div>';
		}else{
			echo '<form action="'.esc_url( home_url( '/' ) ).'" class="find-form1">';
				echo '<div class="form-group">';
					echo '<input name="s" type="text" placeholder="'.esc_attr( $settings['placeholder_text'] ).'" class="form-control">';
					echo '<button type="submit"><i class="far fa-search"></i></button>';
				echo '</div>';
			echo '</form>';
		}
	}
}