<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 *
 * Megamenu Widget .
 *
 */
class Medilax_Header_Menu extends Widget_Base {

	public function get_name() { 
		return 'medilaxheadermenu';
	}

	public function get_title() {
		return __( 'Header Menu', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'header_style',
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
			'hotline_text',
			[
				'label' 		=> __( 'Hotline Text', 'medilax' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'condition'		=> [ 'header_style' => [ '2' ] ],
			]
		);

		$this->add_control(
			'more_options',
			[
				'label' 	=> esc_html__( 'Set Your Style From Style Tab', 'medilax' ),
				'type' 		=> Controls_Manager::HEADING,
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'menu_top_level_menu_item_style_section',
			[
				'label' 	=> __( 'Top Level Menu Items', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'top_level_menu_alignment',
			[
				'label' 	=> __( 'Menu Alignment', 'medilax' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'left' 		=> [
						'title' 	=> __( 'Left', 'medilax' ),
						'icon' 		=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' 	=> __( 'Center', 'medilax' ),
						'icon' 		=> 'fa fa-align-center',
					],
					'right' 	=> [
						'title' 	=> __( 'Right', 'medilax' ),
						'icon' 		=> 'fa fa-align-right',
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu' => 'text-align: {{VALUE}} !important;',
				],
				'toggle' 		=> true,
			]
		);

        $this->add_control(
			'top_level_menu_color',
			[
				'label' 		=> __( 'Menu Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu > ul > li > a' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_control(
			'top_level_menu_hover_color',
			[
				'label' 			=> __( 'Menu Hover Color', 'medilax' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu > ul > li > a:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_control(
			'top_level_menu_bg_color',
			[
				'label' 			=> __( 'Menu Background Color', 'medilax' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu > ul > li > a' => 'background-color: {{VALUE}} !important;',
                ]
			]
		);

		$this->add_control(
			'top_level_menu_hover_bg_color',
			[
				'label' 		=> __( 'Menu Hover Background Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu > ul > li > a:hover' => 'background-color: {{VALUE}} !important;',
                ]
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography',
				'label' 		=> __( 'Menu Typography', 'medilax' ),
                'selector' 		=> '{{WRAPPER}} .main-menu > ul > li > a',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography_hover',
				'label' 		=> __( 'Menu Typography Hover', 'medilax' ),
                'selector' 		=> '{{WRAPPER}} .main-menu > ul > li > a:hover',
			]
		);

        $this->add_responsive_control(
			'top_level_menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu > ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
        );

        $this->add_responsive_control(
			'top_level_menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'top_level_menu_border',
				'label' 	=> __( 'Border', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .main-menu > ul > li > a',
			]
		);

		$this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['header_style'] == '1' ){
            if( has_nav_menu( 'primary-menu' ) ){
                echo '<nav class="main-menu menu-style3 d-none d-lg-block">';
                    wp_nav_menu( array(
                        "theme_location"    => 'primary-menu',
                        "container"         => '',
                        "menu_class"        => ''
                    ) );
                echo '</nav>';
            }
        }else{
            echo '<div class="header-layout5">';
				echo '<div class="sticky-wrap">';
					echo '<div class="sticky-active">';
						echo '<div class="menu-area">';
							echo '<div class="header-shape1"></div>';
							echo '<div class="container-xl">';
								echo '<div class="row align-items-center justify-content-between">';
									echo '<div class="col">';
										echo '<nav class="main-menu menu-style4 d-none d-lg-block">';
											wp_nav_menu( array(
												"theme_location"    => 'primary-menu',
												"container"         => '',
												"menu_class"        => ''
											) );
										echo '</nav>';
									echo '</div>';
									if( ! empty( $settings['hotline_text'] ) ){
										echo '<div class="col-auto">';
											echo wp_kses_post( $settings['hotline_text'] );
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
            echo '</div>';
        }
	}
}