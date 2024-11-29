<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Facility Slider Widget .
 *
 */
class Medilax_Facility_Slider extends Widget_Base {

	public function get_name() {
		return 'medilaxfacilityslider';
	}

	public function get_title() {
		return esc_html__( 'Facility Slider', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'facility_slider_image_section',
			[
				'label' 	=> esc_html__( 'Facility Slider', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

        
        $repeater->add_control(
			'title_text', [
				'label' 		=> __( 'Title Text', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Service Area' , 'medilax' ),
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
			'subtitle_Text', [
				'label' 		=> __( 'Subtitle Text', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Town 25 United State' , 'medilax' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'facility_slider_image',
			[
				'label' 	=> esc_html__( 'Facility Slider Image', 'medilax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'logos',
			[
				'label' 		=> esc_html__( 'Facility Sliders', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title_text'                  => __( 'Service Area' , 'medilax' ),
						'subtitle_text'               => __( 'Town 25 United State' , 'medilax' ),
						'facility_slider_image'       => Utils::get_placeholder_image_src(),
					],
					[
                        'title_text'                    => __( 'Facilities' , 'medilax' ),
                        'subtitle_text'                 => __( '65,000 sqft' , 'medilax' ),
                        'facility_slider_image'         => Utils::get_placeholder_image_src(),
					],
					[
						'title_text'                    => __( 'Units' , 'medilax' ),
						'subtitle_text'                 => __( '350 Units' , 'medilax' ),
						'facility_slider_image'         => Utils::get_placeholder_image_src(),
					],
					[
						'title_text'                    => __( 'Staff' , 'medilax' ),
						'subtitle_text'                 => __( '140k Member' , 'medilax' ),
						'facility_slider_image'         => Utils::get_placeholder_image_src(),
					],
					[
						'title_text'                    => __( 'Annual Calls' , 'medilax' ),
						'subtitle_text'                 => __( '240 Million' , 'medilax' ),
						'facility_slider_image'         => Utils::get_placeholder_image_src(),
					],
					[
						'title_text'                    => __( 'Students' , 'medilax' ),
						'subtitle_text'                 => __( '22 Million' , 'medilax' ),
						'facility_slider_image'         => Utils::get_placeholder_image_src(),
					],
				]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> esc_html__( 'Facility Slider Control', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'slide_to_show',
			[
				'label' 		=> esc_html__( 'Slide To Show', 'medilax' ),
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
					'size' => 6,
				],
			]
		);

        $this->add_control(
			'bg_color',
			[
				'label' 		=> esc_html__( 'Icon Background Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .facility-style1 .facility-icon' => 'background-color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'bg_color_hover',
			[
				'label' 		=> esc_html__( 'Icon Background Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .facility-style1:hover .facility-icon' => 'background-color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .facility-style1 .facility-title' => 'background-color: {{VALUE}};',
				],
			]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 			=> 'title_typography',
                'label' 		=> __( 'Title Typography', 'medilax' ),
                'selector' 		=> '{{WRAPPER}} .facility-style1 .facility-title'
            ]
        );
        $this->add_control(
			'subtitle_color',
			[
				'label' 		=> esc_html__( 'Subtitle Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .facility-style1 .facility-text' => 'background-color: {{VALUE}};',
				],
			]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 			=> 'subtitle_typography',
                'label' 		=> __( 'Subtitle Typography', 'medilax' ),
                'selector' 		=> '{{WRAPPER}} .facility-style1 .facility-text'
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="facility-slider">';
            echo '<div class="container z-index-common">';
                echo '<div class="row facility-img-slider wow fadeInUp" data-wow-delay="0.4s" data-slide-to-show="'.esc_attr( $settings['slide_to_show']['size'] ).'">';
                    foreach( $settings['logos'] as $singlelogo ) {
                        echo '<div class="col-xl-2">';
                            echo '<div class="facility-style1">';
                                if( ! empty( $singlelogo['facility_slider_image']['url'] ) ){
                                    echo '<div class="facility-icon">';
                                        echo medixi_img_tag( array(
                                            'url'	=> esc_url( $singlelogo['facility_slider_image']['url'] )
                                        ) );
                                    echo '</div>';
                                }
                                if( ! empty( $singlelogo['title_text'] ) ){
                                    echo '<h3 class="facility-title">'.esc_html( $singlelogo['title_text'] ).'</h3>';
                                }
                                if( ! empty( $singlelogo['subtitle_text'] ) ){
                                    echo '<p class="facility-text">'.esc_html( $singlelogo['subtitle_text'] ).'</p>';
                                }
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
	}
}