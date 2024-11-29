<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Medilax Tab Widget .
 *
 */
class Medilax_Tab_Widget extends Widget_Base {

	public function get_name() {
		return 'medilaxtab';
	}

	public function get_title() {
		return __( 'Medilax Tab', 'medilax' );
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
				'label'		 	=> __( 'Medilax Tab', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'label' 	=> __( 'Tab Title', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Relax', 'medilax' )
            ]
        );

        $repeater->add_control(
            'tab_description',
            [
                'label' 	=> __( 'Tab Description', 'medilax' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( 'As part of a new partnership with Sensync, an immersive wellness company founded by Adam Gazzaley, Ph.D., and Alex Theory, Ph.D., The Vessel helps guests reset their brains with a host of customized.', 'medilax' )
            ]
        );

		$this->add_control(
			'tabs',
			[
				'label' 		=> __( 'Medilax Tab', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'tab_title' => __( '100% Confidential', 'medilax' ),
					],
					[
						'tab_title' => __( 'Full Satisfaction', 'medilax' ),
					],
				]
			]
		);

        $this->end_controls_section();

         /*-----------------------------------------general styling------------------------------------*/

        $this->start_controls_section(
            'general_styling',
            [
                'label'         => __( 'Button', 'medilax' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-tab-nav .vs-btn'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .about-tab-nav .vs-btn::after'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_hover_color',
			[
				'label' 		=> __( 'Button Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-tab-nav .vs-btn:hover'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_active_color',
			[
				'label' 		=> __( 'Button Active Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-tab-nav .vs-btn.active'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .about-tab-nav .vs-btn::after'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'          => 'box_shadow',
                'label'         => __( 'Button Shadow', 'medilax' ),
                'selector'     => '{{WRAPPER}} .about-tab-nav .vs-btn',
            ]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'btn_txt_typography',
		 		'label' 		=> __( 'Button Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .about-tab-nav .vs-btn'
			]
		);
		$this->add_control(
			'btn_txt_color',
			[
				'label' 		=> __( 'Text Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-tab-nav .vs-btn'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .about-tab-nav .vs-btn.active'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_txt_hover_color',
			[
				'label' 		=> __( 'Text Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-tab-nav .vs-btn:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( ! empty( $settings['tabs'] ) ){
            $x = 1;
            echo '<div class="vs-accordion-wrapper">';
                echo '<ul class="nav about-tab-nav mb-3 mb-xl-4 mt-xl-4 pb-3 pt-4" id="myTab" role="tablist">';
                    foreach( $settings['tabs'] as $tab_title ){
                        if( $x == '1' ){
                            $active_class   = "active";
                            $area_selected  = "true";
                        }else{
                            $active_class   = "";
                            $area_selected  = "false";
                        }
                        echo '<li class="nav-item" role="presentation">';
					        echo '<button class="nav-link vs-btn '.esc_attr( $active_class ).'" id="menu'.esc_attr( $x ).'-tab" data-bs-toggle="tab" data-bs-target="#menu'.esc_attr( $x ).'" type="button" role="tab" aria-controls="menu'.esc_attr( $x ).'" aria-selected="'.esc_attr( $area_selected ).'">'.esc_html( $tab_title['tab_title'] ).'</button>';
					    echo '</li>';
                        $x++;
                        if( $x==3 ){
                        	break;
                        }
                    }
                echo '</ul>';
                echo '<div class="tab-content" id="aboutTab">';
                $x = 1;
                    foreach( $settings['tabs'] as $tab_title ){
                        if( $x == '1' ){
                            $active_class   = "show active";
                            $area_selected  = "true";
                        }else{
                            $active_class   = "";
                            $area_selected  = "false";
                        }
                        echo '<div class="tab-pane fade '.esc_attr( $active_class ).'" id="menu'.esc_attr( $x ).'" role="tabpanel" aria-labelledby="menu'.esc_attr( $x ).'-tab">'.wp_kses_post( $tab_title['tab_description'] ).'</div>';
                        $x++;
                        if( $x==3 ){
                        	break;
                        }
                    }
                echo '</div>';
            echo '</div>';
        }
	}
}