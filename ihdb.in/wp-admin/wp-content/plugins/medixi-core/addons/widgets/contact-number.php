<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Contact Number Widget .
 *
 */
class Medilax_Contact_Number_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxcontactnumber';
	}

	public function get_title() {
		return __( 'Contact Number', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'contact',
			[
				'label'     => __( 'Contact Area', 'medilax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'contact_title',
            [
				'label'         => __( 'Title', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Need help? Contact Us' , 'medilax' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'contact_phone',
            [
				'label'         => __( 'Phone', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '(625)-1251-6677' , 'medilax' ),
				'label_block'   => true,
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Contact Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'counter_title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-title'	=>'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'counter_title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .contact-title'
			]
		);

        $this->add_responsive_control(
			'counter_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .contact-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'counter_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .contact-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'number_styling',
			[
				'label' 	=> __( 'Number Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'contact_number_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-number'	=>'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'contact_number_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .contact-number'
			]
		);

        $this->add_responsive_control(
			'contact_number_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .contact-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'contact_number_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .contact-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<!-----------------------Start Contact Number Area----------------------->';
			if( ! empty( $settings['contact_title'] ) ){
				echo '<h4 class="pt-2 mb-2 contact-title">'.esc_html( $settings['contact_title'] ).'</h4>';
			}
			if( ! empty( $settings['contact_phone'] ) ){

					$phone 		= $settings['contact_phone'];
					$replace 	= array(' ','-',' - ', '(', ')');
					$with 		= array('','','' ,'' ,'');
					$mobileurl 	= str_replace( $replace, $with, $phone );

		        echo '<h4 class="h3 font-theme2 mb-0 contact-number"><a href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html( $phone ).'</a></h4>';
		    }  
		echo '<!------------------------End Contact Number Area------------------------>';
	}
}
