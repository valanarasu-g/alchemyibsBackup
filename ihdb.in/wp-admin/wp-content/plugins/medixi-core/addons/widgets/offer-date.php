<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Offer Date Widget .
 *
 */
class Medilax_Offer_Date_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxofferdate';
	}

	public function get_title() {
		return __( 'Offer Date', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'offer_date',
			[
				'label'		=> __( 'Offer Date Countdown','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'date', [
				'label' 		=> __( 'Offer End Date With Time', 'medilax' ),
				'type' 			=> Controls_Manager::DATE_TIME,
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );

		$this->end_controls_section();

		/*-----------------------------------------Title styling------------------------------------*/

        $this->start_controls_section(
            'counter_styling',
            [
                'label'     => __( 'Counter Styling', 'medilax' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'time_color',
            [
                'label'         => __( 'Counter Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .offer-counter .count-number' => 'color: {{VALUE}}!important;',

                ],
            ]
        );
        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 'time_typography',
                'label'         => __( 'Counter Typography', 'medilax' ),
                'selector'      => '{{WRAPPER}} .offer-counter .count-number',
            ]
        );

        $this->add_control(
            'time_text_color',
            [
                'label'         => __( 'Text Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .offer-counter .count-name' => 'color: {{VALUE}}!important;',

                ],
            ]
        );
        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 'time_text_typography',
                'label'         => __( 'Text Typography', 'medilax' ),
                'selector'      => '{{WRAPPER}} .offer-counter .count-name',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$offer_date_end = $settings['date'];
		$replace 	= array('-');
		$with 		= array('/');

		$date 	= str_replace( $replace, $with, $offer_date_end );
		echo '<!-----------------------Start Offer Date Area----------------------->';
			echo '<ul class="offer-counter counter-list list-unstyled" data-offer-date="'.esc_attr($date).'">';
                echo '<li>';
                    echo '<div class="day count-number "></div>';
                    echo '<span class="count-name  fs-md">'.esc_html('Days', 'medilax').'</span>';
                echo '</li>';
                echo '<li>';
                    echo '<div class="hour count-number "></div>';
                    echo '<span class="count-name  fs-md">'.esc_html('Hours', 'medilax').'</span>';
                echo '</li>';
                echo '<li>';
                    echo '<div class="minute count-number "></div>';
                    echo '<span class="count-name  fs-md">'.esc_html('Minutes', 'medilax').'</span>';
                echo '</li>';
				echo '<li>';
					echo '<div class="seconds count-number "></div>';
					echo '<span class="count-name">'.esc_html( 'Seconds', 'medilax' ).'</span>';
				echo '</li>';
            echo '</ul>';
           
		echo '<!------------------------End Offer Date Area------------------------>';
	}
}