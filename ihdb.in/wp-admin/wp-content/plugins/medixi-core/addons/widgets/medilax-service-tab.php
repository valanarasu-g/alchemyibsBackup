<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
use \Elementor\Utils;
/**
 *
 * Medilax Tab Widget .
 *
 */
class Medilax_Service_Tab_Widget extends Widget_Base {

	public function get_name() {
		return 'medilaxservicetab';
	}

	public function get_title() {
		return __( 'Medilax Service Tab', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Medilax Service Tab', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'icon',
			[
				'label'     => __( 'Upload an Image Icon', 'medilax' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				]
			]
		);

        $repeater->add_control(
            'tab_title',
            [
                'label' 	=> __( 'Tab Title', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Excellent infection prevention', 'medilax' )
            ]
        );

        $repeater->add_control(
            'tab_description',
            [
                'label' 	=> __( 'Tab Description', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Lorem ipsum dolor sit amet, conse ctetur adipiscing eliteiusmod tempor incididunt', 'medilax' )
            ]
        );

        $repeater->add_control(
			'service_url',
			[
				'label'     => esc_html__( 'Link', 'medilax' ),
				'type'      => Controls_Manager::URL,
				'options'   => [ 'url', 'is_external', 'nofollow' ],
				'default'   => [
					'url'           => '#',
					'is_external'   => true,
					'nofollow'      => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' 		=> __( 'Medilax Service Tab', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'tab_title'         => __( 'Excellent infection prevention', 'medilax' ),
						'tab_description'   => __( 'Lorem ipsum dolor sit amet, conse ctetur adipiscing eliteiusmod tempor incididunt', 'medilax' ),
					],
					[
						'tab_title'         => __( 'Health patients comprehensive', 'medilax' ),
						'tab_description'   => __( 'From its medieval origins to the digital era , learn everything there is to know', 'medilax' ),
					],
					[
						'tab_title'         => __( 'Pediatric Hematology Oncology', 'medilax' ),
						'tab_description'   => __( 'Creation timelines for the standard lorem ipsum passage vary, with some citing the', 'medilax' ),
					],
					[
						'tab_title'         => __( 'Care Pediatric & Medicine', 'medilax' ),
						'tab_description'   => __( 'Letraset\'s dry-transfer sheets, and later entered the digital world via Aldus', 'medilax' ),
					],
					[
						'tab_title'         => __( 'Labor & Delivery: The Birthplace', 'medilax' ),
						'tab_description'   => __( 'Some claim lorem ipsum threatens to promote design over content, while others defend', 'medilax' ),
					],
					[
						'tab_title'         => __( 'Urogynecology & Pelvic Health', 'medilax' ),
						'tab_description'   => __( 'Generally, lorem ipsum is best suited to keeping templates from looking bare or', 'medilax' ),
					],
				]
			]
		);

        $this->end_controls_section();

         /*-----------------------------------------general styling------------------------------------*/

        $this->start_controls_section(
            'general_styling',
            [
                'label'         => __( 'General', 'medilax' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'tab_btn_color',
			[
				'label' 		=> __( 'Tab Button Background Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-circle__menu li a'	=> 'background-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'tab_btn_color_hover',
			[
				'label' 		=> __( 'Tab Button Background Hover Color ', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-circle__menu li a:hover'	=> 'background-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'btn_active_color',
			[
				'label' 		=> __( 'Tab Button Active Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-circle__menu li a.active'	=> 'background-color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'rounded_bg_color',
			[
				'label' 		=> __( 'Round Background Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-circle__center'	=> 'background-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-circle__title a'	=> 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'title_hover_color',
			[
				'label' 		=> __( 'Title Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-circle__title a:hover'	=> 'color: {{VALUE}};',
				],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> __( 'Description Typography', 'medilax' ),
				'selector' 		=> '{{WRAPPER}} .service-circle__title'
			]
		);
        $this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Description Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-circle__text'	=> 'color: {{VALUE}};',
				],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'desc_typography',
				'label' 		=> __( 'Description Typography', 'medilax' ),
				'selector' 		=> '{{WRAPPER}} .service-circle__text'
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( ! empty( $settings['tabs'] ) ){
            echo '<div class="service-circle wow fadeInUp" data-wow-delay="0.4s">';
                echo '<div class="service-circle__lines">';
                    echo '<div class="line"></div>';
                    echo '<div class="line"></div>';
                    echo '<div class="line"></div>';
                    echo '<div class="line"></div>';
                echo '</div>';
                echo '<nav class="service-circle__menu">';
                    echo '<ul>';
                    $x = 1;
                    foreach( $settings['tabs'] as $tab_title ){
                        if( $x == '1' ){
                            $active_class   = "active";
                        }else{
                            $active_class   = "";
                        }
                        echo '<li class="'.$active_class.'">';
                            echo '<a href="'.esc_url( $tab_title['service_url']['url'] ).'"><img src="'.esc_url( $tab_title['icon']['url'] ).'" alt="'.esc_attr__( 'icon', 'medilax' ).'"></a>';
                        echo '</li>';
						$x++;
                    }
                    echo '</ul>';
                echo '</nav>';
                echo '<div class="service-circle__center">';
                    $x = 1;
                    foreach( $settings['tabs'] as $tab_title ){
                        if( $x == '1' ){
                            $active_class   = "active";
                        }else{
                            $active_class   = "";
                        }
                        echo '<div class="service-circle__item '.$active_class.'">';
                            echo '<h3 class="service-circle__title h4">';
                                echo '<a href="'.esc_url( $tab_title['service_url']['url'] ).'">'.esc_html( $tab_title['tab_title'] ).'</a>';
                            echo '</h3>';
                            echo '<p class="service-circle__text">'.esc_html( $tab_title['tab_description'] ).'</p>';
                        echo '</div>';
						$x++;
                    }
                echo '</div>';
            echo '</div>';
        }
	}
}