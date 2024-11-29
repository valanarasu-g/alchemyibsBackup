<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Events Widget .
 *
 */
class Medilax_Events_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxevent';
	}

	public function get_title() {
		return __( 'Medilax Events', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'events_content',
			[
				'label'		=> __( 'Events','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
            'event_image',
            [
                'label'     => __( 'Image icon', 'medilax' ),
                'type'      => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
			'event_date_text', [
				'label' 		=> __( 'Event Date text', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'medilax' ),
				'rows' 		    => 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'event_date_icon', [
				'label' 		=> __( 'Event Icon', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'fal fa-calendar-alt' , 'medilax' ),
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
			'title', [
				'label' 		=> __( 'Event Name', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Medico-legal conference 2023' , 'medilax' ),
				'rows' 		    => 2,
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
			'event_date', [
				'label' 		=> __( 'Event Date', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '12/08/2024' , 'medilax' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'event_location', [
				'label' 		=> __( 'Event Location', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 3,
				'default' 		=> __( 'BMA House Tavistock Square London WC1H 9JP' , 'medilax' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'event_location_icon', [
				'label' 		=> __( 'Event Location Icon', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'fal fa-map-marker-alt' , 'medilax' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'event_details_link', [
				'label' 		=> __( 'Event Details Link', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'medilax' ),
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'events',
			[
				'label' 		=> __( 'Events Content', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Safe Cleaning Supplies', 'medilax' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
			]
		);

		$this->end_controls_section();
        
        $this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'General Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'events_date_color',
			[
				'label' 		=> __( 'Event Date Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .event-style1 .event-date'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'events_date_box_bg_color',
			[
				'label' 		=> __( 'Event Date Box Bg Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .event-style1 .event-counter ul'	=> 'background-color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'events_location_text_color',
			[
				'label' 		=> __( 'Event Location Text Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .event-style1 .event-location'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'events_title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .event-style1 .event-title'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'events_title_hover_color',
			[
				'label' 		=> __( 'Title Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .event-style1 .event-title a:hover'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'events_title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .event-style1 .event-title'
			]
		);

        $this->add_responsive_control(
			'events_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .event-style1 .event-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'events_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .event-style1 .event-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

 

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        echo '<section class="event-style1 event-vs-carousel">';
            foreach ( $settings['events'] as $events ){
                echo '<div>';
                    echo '<div class="event-inner">';
                        if( ! empty( $events['event_image'] ) ){
                            echo '<div class="event-img" data-bg-src="'.esc_url( $events['event_image']['url'] ).'"></div>';
                        }
                        echo '<div class="event-content">';

                            echo '<span class="event-date">';
                                if( ! empty( $events['event_date_icon'] ) ){
                                    echo '<i class="'.esc_html( $events['event_date_icon'] ).'"></i>';
                                }
                                
                                if( ! empty( $events['event_date_text'] ) ){
                                    echo esc_html( $events['event_date_text'] );
                                }
                            echo '</span>';

                            echo '<h3 class="event-title"><a href="'.esc_url( $events['event_details_link'] ).'">'.esc_html( $events['title'] ).'</a></h3>';
                            echo '<div class="event-counter">';
                                echo '<ul class="offer-counter" data-offer-date="'.esc_attr( $events['event_date'] ).'">';
                                    echo '<li>';
                                        echo '<div class="day count-number ">00</div>';
                                        echo '<span class="count-name  fs-md">'.esc_html__( 'Days','medilax' ).'</span>';
                                    echo '</li>';
                                    echo '<li>';
                                        echo '<div class="hour count-number ">00</div>';
                                        echo '<span class="count-name  fs-md">'.esc_html__( 'Hours','medilax' ).'</span>';
                                    echo '</li>';
                                    echo '<li>';
                                        echo '<div class="minute count-number ">00</div>';
                                        echo '<span class="count-name  fs-md">'.esc_html__( 'Mins','medilax' ).'</span>';
                                    echo '</li>';
                                    echo '<li>';
                                        echo '<div class="seconds count-number ">00</div>';
                                        echo '<span class="count-name  fs-md">'.esc_html__( 'Secs','medilax' ).'</span>';
                                    echo '</li>';
                                echo '</ul>';
                            echo '</div>';
                            
                            echo '<p class="event-location">';
                                if( ! empty( $events['event_location_icon'] ) ){
                                    echo '<i class="'.esc_html( $events['event_location_icon'] ).'"></i>';
                                }
                                if( ! empty( $events['event_location'] ) ){
                                    echo esc_html( $events['event_location'] );
                                }
                            echo '</p>';

                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        echo '</section>';

	}
}