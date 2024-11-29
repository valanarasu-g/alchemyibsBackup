<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Content Header Widget .
 *
 */
class Medilax_Contetn_Header_Widget extends Widget_Base {

	public function get_name() {
		return 'medilaxcontentheader';
	}

	public function get_title() {
		return __( 'Content Header', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_Header_section',
			[
				'label'		 	=> __( 'Content Header', 'medilax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
			
        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Subtitle', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Subtitle', 'medilax' )
			]
        );
        $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Title', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Title', 'medilax' )
			]
        );
		$this->add_control(
			'section_description',
			[
				'label' 	=> __( 'Section Description', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Description', 'medilax' )
			]
        );

        $this->end_controls_section();

		//------------------------------Subtitle Styling------------------------------//

        $this->start_controls_section(
			'subtitle_style_section',
			[
				'label' => __( 'Subtitle Style', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'subtitle_color',
			[
				'label' 	=> __( 'Subtitle Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content-header .text-theme' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'subtitle_typography',
				'label' 	=> __( 'Subtitle Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .content-header .text-theme',
			]
		);

		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( 'Subtitle Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .content-header .text-theme' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( 'Subtitle Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .content-header .text-theme' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'after'
			]
		);

        
        $this->end_controls_section();

        //------------------------------Subtitle Styling------------------------------//

        $this->start_controls_section(
			'title_style_section',
			[
				'label' => __( 'Title Style', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content-header .h1' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .content-header .h1',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .content-header .h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .content-header .h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'after'
			]
		);
        $this->end_controls_section();

        //------------------------------Description Styling------------------------------//

        $this->start_controls_section(
			'desc_style_section',
			[
				'label' => __( 'Description Style', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'desc_color',
			[
				'label' 	=> __( 'Description Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content-header p' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( 'Description Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .content-header p',
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> __( 'Description Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .content-header p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> __( 'Description Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .content-header p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'after'
			]
		);
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		
        echo '<!-- Start Content Header-->';
        echo '<div class="content-header">';
	        if( !empty( $settings['section_subtitle'] ) ) {
		        echo '<span class="h3 text-theme sec-subtitle mb-2 mb-md-0">' . htmlspecialchars_decode(esc_html( $settings['section_subtitle'] )) . '</span>';
		    }
		    if( !empty( $settings['section_title'] ) ) {
		        echo '<h2 class="h1">' . htmlspecialchars_decode(esc_html( $settings['section_title'] )) . '</h2>';
		    }
		    if( ! empty( $settings['section_description'] ) ){
		        echo '<p class="pe-xl-5">' . htmlspecialchars_decode(esc_html( $settings['section_description'] )) . '</p>';
		    }
	    echo '</div>';
	    echo '<!--End Content Header-->';
	}
}