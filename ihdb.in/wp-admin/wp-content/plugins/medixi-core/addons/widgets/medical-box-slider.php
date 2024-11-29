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
class Medilax_Medical_Slider_Widget extends Widget_Base {

	public function get_name() {
		return 'medilaxmedicalslider';
	}

	public function get_title() {
		return esc_html__( 'Medical Slider Box', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'medical_box_slider',
			[
				'label' 	=> esc_html__( 'Medical Box', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
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
			'medical_logo',
			[
				'label' 	=> esc_html__( 'Medical Logo', 'medilax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'medical_box_text',
			[
				'label' 	=> esc_html__( 'Medical Box Text', 'medilax' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Childerns Hospital', 'medilax' ),
			]
        );

        $repeater->add_control(
			'medical_link',
			[
				'label' 		=> esc_html__( 'Link', 'medilax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'medilax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
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
						'medical_logo'          => Utils::get_placeholder_image_src(),
                        'medical_box_text'      => esc_html__( 'Childern’s Hospital', 'medilax' ),
					],
					[
						'medical_logo'          => Utils::get_placeholder_image_src(),
                        'medical_box_text'      => esc_html__( 'Brown Diabetes Center', 'medilax' ),
					],
					[
						'medical_logo'          => Utils::get_placeholder_image_src(),
                        'medical_box_text'      => esc_html__( 'Neuroscience Institute', 'medilax' ),
					],
					[
						'medical_logo'          => Utils::get_placeholder_image_src(),
                        'medical_box_text'      => esc_html__( 'Heart & Vascular Institute', 'medilax' ),
					],
					[
						'medical_logo'          => Utils::get_placeholder_image_src(),
                        'medical_box_text'      => esc_html__( 'Heart & Moliculer Institute', 'medilax' ),
					],
					[
						'medical_logo'          => Utils::get_placeholder_image_src(),
                        'medical_box_text'      => esc_html__( 'Appolo Heart Hospital', 'medilax' ),
					],
				]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> esc_html__( 'General Style', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .medical-box__title' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'title_color_hover',
			[
				'label' 		=> esc_html__( 'Title Color On Hover', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .medical-box__title a:hover' => 'color: {{VALUE}};',
				],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> __( 'Title Typography', 'medilax' ),
				'selector' 		=> '{{WRAPPER}} .medical-box__title'
			]
		);

        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<section class="vs-brand-wrapper">';
            echo '<div class="container">';
                echo '<div class="row medical-carousel" data-slide-show="'.esc_attr( $settings['slide_to_show']['size'] ).'" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2">';
                    foreach( $settings['logos'] as $singlelogo ) {
                        echo '<div class="medical-box">';
                            echo '<div class="medical-box__img">';
                                echo '<a href="'.esc_url( $singlelogo['medical_link']['url'] ).'">';
                                    echo medixi_img_tag( array(
                                        'url'   => $singlelogo['medical_logo']['url'],
                                    ) );
                                echo '</a>';
                            echo '</div>';
                            echo '<h3 class="medical-box__title">';
                                echo '<a href="'.esc_url( $singlelogo['medical_link']['url'] ).'" class="text-inherit" tabindex="0">'.esc_html( $singlelogo['medical_box_text'] ).'</a>';
                            echo '</h3>';
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</section>';
	}

}