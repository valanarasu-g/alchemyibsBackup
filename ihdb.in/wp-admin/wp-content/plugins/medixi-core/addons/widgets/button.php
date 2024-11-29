<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Button Widget .
 *
 */
class Medilax_Button_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxbutton';
	}

	public function get_title() {
		return __( 'Medilax Button', 'medilax' );
	}

	public function get_icon() {
		return ' eicon-button';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'button_content',
			[
				'label'		=> __( 'Button','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'button_icon',
			[
				'label' 	=> __( 'Button Icon Class', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2, 
			]
        );
		$this->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'medilax' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Button Text', 'medilax' ),
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Link', 'medilax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'medilax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$this->add_responsive_control(
			'btn_align',
			[
				'label' 		=> __( 'Alignment', 'medilax' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'medilax' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'medilax' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'medilax' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 	=> 'left',
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .btn-align' => 'text-align: {{VALUE}};',
                ]
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
				'selector' 	=> '{{WRAPPER}} .vs-btn',
			]
		);

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn:hover'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn:hover i'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-btn'
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Text Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_text_hvr_color',
			[
				'label' 		=> __( 'Text Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-btn:hover i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'wrapper', 'class', 'btn-align' );
		echo '<!-----------------------Start Button Area----------------------->';
				echo '<div '.$this->get_render_attribute_string( 'wrapper' ).' >';
					if( ! empty( $settings['button_text'] ) ){
						if(!empty( $settings['button_icon'] )){
		            		$attr = '<i class="'.esc_attr($settings['button_icon']).'"></i>';
		            	}else{
		            		$attr = ''; 
		            	}
	                    echo '<a href="'.esc_url($settings['button_link']['url']).'" class="vs-btn style2">'.esc_html($settings['button_text']).''.$attr.'</a>';
	                }
	            echo '</div>';
		echo '<!-----------------------End Button Area----------------------->';
	}
}