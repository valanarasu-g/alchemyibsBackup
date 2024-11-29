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
class Medilax_List_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxlist';
	}

	public function get_title() {
		return __( 'Medilax List', 'medilax' );
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
				'label' 		=> __( 'List Title', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'description', [
				'label' 		=> __( 'List Description', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'icon_class', [
				'label' 		=> __( 'Icon Class', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'default' 		=> __( 'fal fa-check-circle', 'medilax' ),
			]
        );

		$this->add_control(
			'medilax_list',
			[
				'label' 		=> __( 'List Content', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Advice Exchange -', 'medilax' ),
						'description' 	=> __( ' To exchange practical advice and experience in implementing admission avoidance.', 'medilax' ),
					],
					[
						'title' 		=> __( 'Integration -', 'medilax' ),
						'description' 	=> __( 'To integrate HaH services with specialty services on the platform here', 'medilax' ),
					],
					[
						'title' 		=> __( 'Raising Awareness -', 'medilax' ),
						'description' 	=> __( 'To exchange practical advice and experience in implementing admission avoidance.', 'medilax' ),
					],
					[
						'title' 		=> __( 'Research -', 'medilax' ),
						'description' 	=> __( 'To further develop evidence-based specialist services for people who require', 'medilax' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'list_style_section',
			[
				'label' => __( 'List Style', 'medilax' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'list_icon_color',
			[
				'label' 	=> __( 'List Icon Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .list-style1 li > i:first-child' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'list_title_color',
			[
				'label' 	=> __( 'List Title Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .list-style1 .title' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'list_title_typography',
				'label' 	=> __( 'List Title Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .list-style1 .title',
			]
		);

        $this->add_control(
			'list_description_color',
			[
				'label' 	=> __( 'List Title Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.list-style1 li' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'list_description_typography',
				'label' 	=> __( 'List Title Typography', 'medilax' ),
                'selector' 	=> '{{WRAPPER}} .list-style1 li',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		
		echo '<ul class="list-style1">';
			foreach( $settings['medilax_list'] as $single_data  ){
				echo '<li>';
					echo '<i class="'.esc_attr( $single_data['icon_class'] ).'"></i>';
					echo '<span class="title">'.esc_html( $single_data['title'] ).'</span>';
					echo esc_html( $single_data['description'] );
				echo '</li>';
			}
		echo '</ul>';

	}
}