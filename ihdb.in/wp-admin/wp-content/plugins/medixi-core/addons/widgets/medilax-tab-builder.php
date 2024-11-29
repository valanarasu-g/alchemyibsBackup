<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Icon Box Widget .
 *
 */
class Medilax_About_Tab extends Widget_Base {

	public function get_name() {
		return 'medilaxabout';
	}

	public function get_title() {
		return __( 'Tab Builder', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

    public function get_keywords() {
		return [ 'about', 'team', 'medilax' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_about',
			[
				'label'		 	=> __( 'Tab Box', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        /*  --------------- Repeater Section ---------------*/
        $about_repeater = new Repeater();

		$about_repeater->add_control(
			'tab_text',
			[
				'label' 	    => __( 'Tab Text', 'medilax' ),
                'type' 		    => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Call and Try to Speak Clearly', 'medilax' ),
			]
        );

		$about_repeater->add_control(
			'tab_number',
			[
				'label' 	    => __( 'Tab Number', 'medilax' ),
                'type' 		    => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __(  '1.', 'medilax' ),
			]
        );

		
        $about_repeater->add_control(
			'medilax_about_builder',
			[
				'label'     => __( 'Select Content', 'medilax' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->medilax_tab_build(),
				'default'	=> ''
			]
		);
        $this->add_control(
			'about_repeater',
			[
				'label' 		=> __( 'Tab Box', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $about_repeater->get_controls(),
				'default' 		=> [
					[
						'tab_text'  => __( 'Call and Try to Speak Clearly', 'medilax' ),
					],
					[
						'tab_text'  => __( 'Known The Location', 'medilax' ),
					],
					[
						'tab_text'  => __( 'Follow the instructions', 'medilax' ),
					],
					[
						'tab_text'  => __( 'Stay with the patient', 'medilax' ),
					],
				],
				'title_field' 	=> '{{{ tab_text }}}',
			]
		);
        $this->end_controls_section();

		 /*  --------------- Title Style ---------------*/
		 $this->start_controls_section(
			'heading_title',
			[
				'label'		 	=> __( 'Tab Title', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => __('Color', 'medilax'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_background_color',
            [
                'label'     => __('Background Color', 'medilax'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-name' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> __( 'Typography', 'medilax' ),
				'selector' 		=> '{{WRAPPER}} .match-name',
			]
		);
        $this->end_controls_section();
        /*  --------------- End Title Style ---------------*/



		/*  --------------- Box Style Section ---------------*/
        $this->start_controls_section(
			'match_box_style',
			[
				'label'		 	=> __( 'Box', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs( 'box_tabs' );
		/*  ---- Normal Tab -----*/
		$this->start_controls_tab(
			'box_tab_normal',
			[
				'label' => esc_html__( 'Normal', 'medilax' ),
			],
		);


        $this->add_control(
            'box_bg_color',
            [
                'label'     => __('Background Color', 'medilax'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-tab2 button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => __('Border', 'medilax'),
                'selector' => '{{WRAPPER}}   .about-tab2 button',
            ]
		);

		
        $this->add_responsive_control(
			'box_margin',
			[
				'label' 		=> __( 'Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}}  .about-tab2 button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        $this->add_responsive_control(
			'box_padding',
			[
				'label' 		=> __( 'Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}}  .about-tab2 button' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        $this->end_controls_tab();

        /*  ---- Hover Tab -----*/
		$this->start_controls_tab(
			'box_tab_hover',
			[
				'label' => esc_html__( 'Hover', 'medilax' ),
			],
		);
        $this->add_control(
            'box_bg_hover_color',
            [
                'label'     => __('Background Color', 'medilax'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-tab2 button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'box_border_hover',
            [
                'label'     => __('Border Color', 'medilax'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .team-nav1 .slick-current .about-tab2 button, {{WRAPPER}} .team-nav1 .about-tab2 button:hover' => 'border-color: {{VALUE}}'
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();


	}


    public function medilax_tab_build(){

		$medilax_post_query = new WP_Query( array(
			'post_type'				=> 'medilax_tab_build',
			'posts_per_page'	    => -1,
		) );

		$medilax_tab_builder_title_title = array();
		$medilax_tab_builder_title_title[''] = __( 'Select a Title', 'medilax' );

		while( $medilax_post_query->have_posts() ) {
			$medilax_post_query->the_post();
			$medilax_tab_builder_title_title[ get_the_ID() ] =  get_the_title();
		}
		wp_reset_postdata();
		return $medilax_tab_builder_title_title;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		$about_repeaters = $settings['about_repeater'];

        echo '<div class="row text-center text-md-start wow fadeInUp" data-wow-delay="0.3s">';
            echo '<div class="col-12 order-2 order-xxl-1">';
                echo '<div class="tab-content" id="nav-tabContent">';
                    $x = 0;
                    foreach( $about_repeaters as $about_repeater ){
                        if( $x == 0 ){
                            $active = 'show active';
                        }else{
                            $active = '';
                        }
                        if( ! empty( $about_repeater['medilax_about_builder'] ) ){
                            echo '<div class="tab-pane fade  '.$active.'" id="nav-tab'.$x.'" role="tabpanel" aria-labelledby="nav-tab'.$x.'-nav">';
                                $elementor = \Elementor\Plugin::instance();
                                echo $elementor->frontend->get_builder_content_for_display( $about_repeater['medilax_about_builder'] );
                            echo '</div>';
                        }
                        $x++;
                    }
                echo '</div>';
            echo '</div>';
            echo '<div class="col-12 order-1 order-xxl-2">';
                echo '<div class="nav about-tab2" id="nav-tab" role="tablist">';
                $x = 0;
                foreach( $about_repeaters as $about_repeater ){
                    if( $x == 0 ){
                        $active = 'active';
                        $area = 'true';
                    }else{
                        $active = '';
                        $area = '';
                    }
                    echo '<button class="nav-link '.$active.'" id="nav-tab'.$x.'-nav" data-bs-toggle="tab" data-bs-target="#nav-tab'.$x.'" type="button" role="tab" aria-controls="nav-tab'.$x.'" aria-selected="'.$area.'"><span class="tab-no">'.esc_html( $about_repeater['tab_number'] ).'</span><span class="tab-text">'.esc_html( $about_repeater['tab_text'] ).'</span></button>';
                    
                    $x++;
                }
                echo '</div>';
            echo '</div>';
        echo '</div>';
	}
}