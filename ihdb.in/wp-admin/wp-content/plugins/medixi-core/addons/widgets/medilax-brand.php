<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Client Logo Widget .
 *
 */
class Medilax_Client_Logo_Widget extends Widget_Base {

	public function get_name() {
		return 'medilaxclientlogo';
	}

	public function get_title() {
		return esc_html__( 'Medilax Client Logo', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'client_logo_section',
			[
				'label' 	=> esc_html__( 'Client Logo', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'section_style',
			[
				'label' 	=> esc_html__( 'Section Style', 'medilax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> esc_html__( 'Style One', 'medilax' ),
					'2' 		=> esc_html__( 'Style Two', 'medilax' ),
					'3' 		=> esc_html__( 'Style Three', 'medilax' ),
				],
			]
		);

		$this->add_control(
			'slide_to_show',
			[
				'label' 		=> esc_html__( 'Slide To Show', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 0,
						'max' 			=> 10,
						'step' 			=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'client_logo',
			[
				'label' 	=> esc_html__( 'Client Logo', 'medilax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'logos',
			[
				'label' 		=> esc_html__( 'Client Logos', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
				]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> esc_html__( 'Client Logo Control', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'bg_color',
			[
				'label' 		=> esc_html__( 'Background Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-brand-wrapper' => 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['section_style'] == '1' ){
			$class = 'brand-wrap';
		}elseif( $settings['section_style'] == '2' ){
			$class = 'brand-wrap2';
		}else{
			$class = 'brand-wrap3';
		}

		echo '<section class="vs-brand-wrapper">';
			echo '<div class="container">';
				echo '<div class="'.$class.'">';

					echo '<div class="row vs-carousel" data-slide-show="'.esc_attr( $settings['slide_to_show']['size'] ).'" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2">';
						foreach( $settings['logos'] as $singlelogo ) {
							echo '<div class="col-auto text-center">';
								echo '<div class="brand">';
									echo medixi_img_tag( array(
											'url'	=> esc_url( $singlelogo['client_logo']['url'] )
										) );
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</section>';
	}

}