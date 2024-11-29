<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Coupon Code Widget .
 *
 */
class Medilax_Coupon_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxcouponcode';
	}

	public function get_title() {
		return __( 'Coupon Code', 'medilax' );
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
				'label'		=> __( 'Coupon Code','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'title', [
				'label' 		=> __( 'Title', 'medilax' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
        );
        $this->add_control(
			'code', [
				'label' 		=> __( 'Code', 'medilax' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
        );

		$this->end_controls_section();
 		
 		$this->start_controls_section(
			'coupon_box',
			[
				'label' => __( 'Coupon Box Styling', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'coupon_btn_shadow',
				'label' 	=> __( 'Button Shadow', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .vs-code-box',
			]
		);

		$this->add_control(
			'box_border_color',
			[
				'label' 		=> __( 'Box Border Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-code-box'	=> 'border: 2px solid {{VALUE}}!important',
					'{{WRAPPER}} .vs-code-box:before'	=> 'background-color:{{VALUE}}!important',
				],
			]
        );

        $this->add_control(
			'box_title_color',
			[
				'label' 		=> __( 'Title', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-code-box'	=> 'color:{{VALUE}}!important',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'box_title_color_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-code-box'
			]
		);

		/*-----------------------------------------Coupon styling------------------------------------*/

		$this->add_control(
			'Coupon_hr',
			[
				'type' 			=> Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'coupon_color',
			[
				'label' 		=> __( 'Coupon Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-code-box .text-theme'	=> 'color:{{VALUE}}!important',
				],
			]
        );
         $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'coupon_color_typography',
		 		'label' 		=> __( 'Coupon Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-code-box'
			]
		);
		$this->add_responsive_control(
			'box_coupon_margin',
			[
				'label' 		=> __( 'Coupon Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-code-box .text-theme' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'box_coupon_padding',
			[
				'label' 		=> __( 'Coupon Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-code-box .text-theme' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Coupon Area----------------------->';
			echo '<div class="vs-code-box mt-20">';
                if(!empty( $settings['title'] )){ echo $settings['title']; }
                if(!empty( $settings['code'] ))	{ echo '<span class="text-theme">'.$settings['code'].'</span>'; }
            echo '</div>'; 
		echo '<!------------------------End Coupon Area------------------------>';
	}
}