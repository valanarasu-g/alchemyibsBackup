<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * FAQ Widget .
 *
 */
class Medilax_Faq_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxfaq';
	}

	public function get_title() {
		return __( 'Medilax FAQ', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'chose_us_content',
			[
				'label'		=> __( 'FAQ','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);


		$repeater = new Repeater();

        $repeater->add_control(
			'title', [
				'label' 		=> __( 'Accordion Title', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'description', [
				'label' 		=> __( 'Accordion Description', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'faq',
			[
				'label' 		=> __( 'FAQ Content', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for', 'medilax' ),
						'description' 	=> __( 'Professionally impact distributed data via value-added experiences. Proacti incentivize 24/365 applications whereas turnkey total linkage. whiteboard multifunctional channels with interoperable value.', 'medilax' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
			]
		);
		
		$this->end_controls_section();

		/*-----------------------------------------general styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'Genaral', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'border_color',
			[
				'label' 		=> __( 'Border Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion .accordion-item' => 'border-top: 1px solid {{VALUE}}!important;',
					'{{WRAPPER}} .vs-accordion .accordion-item:last-child' => 'border-bottom: 1px solid {{VALUE}}!important;',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion .accordion-button.collapsed::before' => 'color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' 		=> __( 'Icon Background Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion .accordion-button.collapsed::before' => 'background-color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' 		=> __( 'Icon Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion .accordion-button::before' => 'color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_control(
			'icon_hover_bg_color',
			[
				'label' 		=> __( 'Icon Background Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion .accordion-button::before' => 'background-color: {{VALUE}}!important;',
				],
			]
		);

        $this->end_controls_section();

		//-----------------------faq ques settings-----------------------//

		$this->start_controls_section(
			'faq_ques_style_section',
			[
				'label' => __( 'Question Style', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'faq_question_color',
			[
				'label' 	=> __( 'Faq Question Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-accordion .accordion-button' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_question_typography',
				'label' 	=> __( 'Faq Question Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .vs-accordion .accordion-button',
			]
		);

        $this->add_responsive_control(
			'faq_question_margin',
			[
				'label' 		=> __( 'Faq Question Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_question_padding',
			[
				'label' 		=> __( 'Faq Question Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
		$this->end_controls_section();


		//-----------------------faq ans settings-----------------------//

		$this->start_controls_section(
			'faq_ans_style_section',
			[
				'label' => __( 'Question Style', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'faq_answer_color',
			[
				'label' 		=> __( 'Faq Answer Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion p' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_answer_typography',
				'label' 	=> __( 'Faq Answer Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .vs-accordion p',
			]
        );

        $this->add_responsive_control(
			'faq_answer_margin',
			[
				'label' 		=> __( 'Faq Answer Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_answer_padding',
			[
				'label' 		=> __( 'Faq Answer Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		
		echo '<div class="vs-accordion accordion" id="vsaccordion">';
			$i = 0;
			foreach( $settings['faq'] as $single_data  ){

				$i++;
				$attr2  = ($i == 1) ? 'show' : '';
				$expend = ($i == 1) ? 'true' : 'false';
				$col    = ($i == 1) ? '' : 'collapsed';

				echo '<div class="accordion-item">';
					if( ! empty( $single_data['title'] ) ){
						echo '<h2 class="accordion-header">';
				            echo '<button class="accordion-button '.esc_attr( $col ).'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.esc_attr( $i ).'" aria-expanded="'.esc_attr( $expend ).'" aria-controls="collapse'.esc_attr( $i ).'">'.esc_html( $single_data['title'] ).'</button>';
				        echo '</h2>';
					}
					if( ! empty( $single_data['description'] ) ){
						echo '<div id="collapse'.esc_attr( $i ).'" class="accordion-collapse collapse '.esc_attr( $attr2 ).'" data-bs-parent="#vsaccordion">';
				            echo '<div class="accordion-body">';
				                echo '<p>'.esc_html( $single_data['description'] ).'</p>';
				            echo '</div>';
				        echo '</div>';
					}
				echo '</div>';
			}
		echo '</div>';

	}
}