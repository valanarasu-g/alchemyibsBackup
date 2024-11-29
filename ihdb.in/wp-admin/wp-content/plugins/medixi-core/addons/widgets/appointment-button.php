<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Appointment Button Widget .
 *
 */
class Appointment_Button_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxappointmentbutton';
	}

	public function get_title() {
		return __( 'Appointment Button', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'appointment_button_section',
			[
				'label'     => __( 'Button Informations', 'medilax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'desc',
			[
				'label' 	=> __( 'Note Text', 'medilax' ),
				'type' 		=> Controls_Manager::WYSIWYG,
				'default' 	=>'<i class="fal fa-exclamation-circle text-theme me-2"></i> '.esc_html__('Delivering tomorrow’s health care for your family.', 'medilax').' <a href="#"><strong>'.esc_html__('View Doctor’s Timetable', 'medilax').'</strong><i class="far fa-long-arrow-right ms-2"></i></a>',
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' 	=> __( 'Button Text', 'medilax' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'medilax' )
			]
        );

        $this->add_control(
			'btn_link',
			[
				'label' 	=> __( 'Link', 'medilax' ),
				'type' 		=> Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'medilax' ),
				'show_external' => true,
				'default' 	=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->end_controls_section();

		/*-----------------------------------------button styling------------------------------------*/

		$this->start_controls_section(
			'button_styling',
			[
				'label' 	=> __( 'Button Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'btn_shadow',
				'label' 	=> __( 'Button Shadow', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .appointment-button .vs-btn',
			]
		);

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .appointment-button .vs-btn'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .appointment-button .vs-btn i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .appointment-button .vs-btn:hover'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .appointment-button .vs-btn:hover i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .appointment-button .vs-btn'
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Text Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .appointment-button .vs-btn'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .appointment-button .vs-btn i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_text_hvr_color',
			[
				'label' 		=> __( 'Text Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .appointment-button .vs-btn:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .appointment-button .vs-btn:hover i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<!-----------------------Start Appointment Button Area----------------------->';
		echo '<div class="appointment-button">';
			echo '<div class="container">';
				echo '<div class="row justify-content-center justify-content-lg-between align-items-center pt-30 no-pt-sm">';
					if(!empty($settings['desc'])) {
						echo '<div class="col-auto mb-30 mb-lg-0">';
							echo '<div class="notice-bar fs-xs bg-white text-center">';
								echo wp_kses_post( $settings['desc'] );
							echo '</div>';
						echo '</div>';
					}
					if(!empty($settings['btn_text'])){
						echo '<div class="col-auto">';
							echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="vs-btn style2">'.esc_html($settings['btn_text']).'<i class="fal fa-long-arrow-right"></i></a>';
						echo '</div>';
					}
				echo '</div>';
			echo '</div>';
		echo '</div>';

        echo '<!-----------------------End Appointment Button Area----------------------->';
	}
}