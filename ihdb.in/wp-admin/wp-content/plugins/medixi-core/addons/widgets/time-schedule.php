<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Time Schedule Widget .
 *
 */
class Medilax_Schedule_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxtimeschedule';
	}

	public function get_title() {
		return __( 'Time Schedule', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'time_schedule_content',
			[
				'label'		=> __( 'Time Schedule','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'title', [
				'label' 		=> __( 'Title', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'My Time Schedule' , 'medilax' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
        $this->add_control(
			'phone', [
				'label' 		=> __( 'Contact Number', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '(669) 2568 2596' , 'medilax' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );

		$repeater = new Repeater();

        $repeater->add_control(
			'day', [
				'label' 		=> __( 'Day', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Mon - Fri:' , 'medilax' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'time', [
				'label' 		=> __( 'Time', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '8.00 am - 8.00 pm' , 'medilax' ),
				'label_block' 	=> true,
			]
        );
		$this->add_control(
			'schedules',
			[
				'label' 		=> __( 'Schedules', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Mon - Fri:', 'medilax' ),
					],
				],
				'title_field' 	=> '{{{ day }}}',
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
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'medilax' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .team-schedule',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .team-schedule',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .team-schedule',
			]
		);
		$this->add_control(
			'width',
			[
				'label' 	=> __( 'Box Radious', 'medilax' ),
				'type' 		=> Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .team-schedule' => 'border-radius: {{SIZE}}{{UNIT}};',
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
				'selector' 	=> '{{WRAPPER}} .vs-btn.style2',
			]
		);

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2 i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2:hover'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2:hover i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-btn.style2'
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Text Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2 i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_text_hvr_color',
			[
				'label' 		=> __( 'Text Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.style2:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn.style2:hover i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->end_controls_section();
 

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Time Schedule Area----------------------->';
			echo '<div class="team-schedule wow fadeInUp" data-wow-delay="0.3s">';
				if( ! empty( $settings['title'] ) ){
					echo '<h3 class="h4 border-title">'.esc_html( $settings['title'] ).'</h3>';
				}

				echo '<table class="team-schedule-table">';
					echo '<tbody>';
						foreach( $settings['schedules'] as $data ) {
							echo '<tr>';
								if( ! empty( $data['day'] ) ){
									echo '<td>'.esc_html( $data['day'] ).'</td>';
								}
								if( ! empty( $data['time'] ) ){
									echo '<td>'.esc_html( $data['time'] ).'</td>';
								}
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';
				if( ! empty( $settings['phone'] ) ){
					$phone 		= $settings['phone'];
					$replace 	= array(' ','-',' - ', '(', ')');
					$with 		= array('','','' ,'' ,'');
					$mobileurl 	= str_replace( $replace, $with, $phone );

					echo '<a href="'.esc_attr( 'tel:'.$mobileurl ).'" class="vs-btn style2"><i class="fal fa-phone-alt"></i>'.esc_html( $phone ).'</a>';
				}
			echo '</div>';
		echo '<!------------------------End Time Schedule Area------------------------>';
	}
}