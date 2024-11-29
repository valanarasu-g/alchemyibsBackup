<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Work Process Widget .
 *
 */
class Medilax_Work_Process_Widget extends Widget_Base{

	public function get_name() {
		return 'workprocessing';
	}

	public function get_title() {
		return esc_html__( 'Medilax Work Processing', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'work_processing_content',
			[
				'label'		=> esc_html__( 'Work Process','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);


        $repeater = new Repeater();	

        $repeater->add_control(
			'title',
			[
				'label' 	=> esc_html__( 'Title', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Medilax - Work Process Title', 'medilax' ),
			]
        );


        $repeater->add_control(
			'desc',
			[
				'label' 	=> esc_html__( 'Content', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Medilax - Work Process Content', 'medilax' ),
			]
        );

        $repeater->add_control(
			'icon',
			[
				'label' 	=> esc_html__( 'Flat Icon Class', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'flaticon-cleaning', 'medilax' ),
			]
        );

        $repeater->add_control(
			'btn_txt',
			[
				'label' 	=> esc_html__( 'Read More Text', 'medilax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Read More', 'medilax' ),
			]
        );

        $repeater->add_control(
			'btn_link',
			[
				'label' 		=> esc_html__( 'Link', 'medilax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'medilax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$repeater->add_control(
			'shape',
			[
				'label' 		=> esc_html__( 'Shape', 'medilax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

		$this->add_control(
			'work_process',
			[
				'label' 		=> esc_html__( 'Work Process', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' => esc_html__( 'Account & Check In', 'medilax' ),
					],
					[
						'title' => esc_html__( 'Choose Category', 'medilax' ),
					],
				],
				'title_field'   => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------Title styling------------------------------------*/

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> esc_html__( 'Title Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'process_title',
			[
				'label' 		=> esc_html__( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-work-process .heading4,
					 {{WRAPPER}} .process-layout5 .process-title,
					 {{WRAPPER}} .process-marked .process-title'	=> 'color: {{VALUE}} !important;'
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'process_title_typography',
		 		'label' 		=> esc_html__( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-work-process .heading4,
		 						    {{WRAPPER}} .process-layout5 .process-title,
		 						    {{WRAPPER}} .process-marked .process-title'
			]
		);

        $this->add_responsive_control(
			'process_title_margin',
			[
				'label' 		=> esc_html__( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-work-process .heading4,
					 {{WRAPPER}} .process-layout5 .process-title,
					 {{WRAPPER}} .process-marked .process-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->add_responsive_control(
			'process_title_padding',
			[
				'label' 		=> esc_html__( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-work-process .heading4,
					 {{WRAPPER}} .process-layout5 .process-title,
					 {{WRAPPER}} .process-marked .process-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->end_controls_section();

        /*---------------------------------------Description styling----------------------------------*/

		$this->start_controls_section(
			'desc_styling',
			[
				'label' 	=> esc_html__( 'Description Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'process_desc',
			[
				'label' 		=> esc_html__( 'Description Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-work-process .text,
					 {{WRAPPER}} .process-layout5 .process-text,
					 {{WRAPPER}} .process-marked .process-text'	=> 'color: {{VALUE}} !important;'
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'process_desc_typography',
		 		'label' 		=> esc_html__( 'Description Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-work-process .text,{{WRAPPER}} .process-layout5 .process-text,{{WRAPPER}} .process-marked .process-text'
			]
		);

        $this->add_responsive_control(
			'process_desc_margin',
			[
				'label' 		=> esc_html__( 'Description Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-work-process .text, 
					 {{WRAPPER}} .process-layout5 .process-text,
					 {{WRAPPER}} .process-marked .process-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'process_desc_padding',
			[
				'label' 		=> esc_html__( 'Description Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-work-process .text, 
					 {{WRAPPER}} .process-layout5 .process-text,
					 {{WRAPPER}} .process-marked .process-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();


        /*-----------------------------------------Number styling------------------------------------*/

		$this->start_controls_section(
			'number_styling',
			[
				'label' 	=> esc_html__( 'Number Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'process_number',
			[
				'label' 		=> esc_html__( 'Number Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .work-process-number .number'		=> 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .vs-work-process .text-primary3'	=> 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .work-process-top .text-white'		=> 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .process-layout5 .process-number'	=> 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .process-marked .process-number'	=> 'color: {{VALUE}} !important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'process_number_typography',
		 		'label' 		=> esc_html__( 'Number Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .work-process-number .number, {{WRAPPER}}.vs-work-process .text-primary3,{{WRAPPER}}.work-process-top .text-white, {{WRAPPER}} .process-layout5 .process-number, {{WRAPPER}} .process-marked .process-number'
			]
		);

        $this->add_responsive_control(
			'process_number_margin',
			[
				'label' 		=> esc_html__( 'Number Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .work-process-number .number'		=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .vs-work-process .text-primary3' 	=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .work-process-top .text-white' 	=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .process-layout5 .process-number' 	=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .process-marked .process-number' 	=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'process_number_padding',
			[
				'label' 		=> esc_html__( 'Number Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .work-process-number .number' 		=> 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<!-----------------------Start Work Process Area----------------------->';

			echo '<section class="vs-work-process">';
				echo '<div class="container">';
					echo '<div class="row gx-0">';
						$i = 0;
						foreach ($settings['work_process'] as $single_process) {
							$i++;
							$value = str_pad($i, 2, "0", STR_PAD_LEFT);
							echo '<div class="process-nth col-md-6 col-lg-4 col-xl-4">';
								echo '<div class="process-marked">';
									if(!empty($single_process['shape']['url'])) {
										echo '<div class="process-shape">';
											echo medixi_img_tag( array(
	                                            'url'       => esc_url( $single_process['shape']['url'] ),
	                                        ) );
										echo '</div>';
									}
									echo '<div class="process-icon">';
										if(!empty($single_process['icon'])) {
											echo '<i class="'.esc_attr($single_process['icon']).'"></i>';
										}
										echo '<span class="process-number">'.esc_html( $value ).'</span>';
									echo '</div>';
									echo '<div class="process-content">';
										if(!empty($single_process['title'])) {
											echo '<h3 class="process-title">'.esc_html( $single_process['title'] ).'</h3>';
										}
										if(!empty($single_process['desc'])) {
											echo '<p class="process-text">'.esc_html( $single_process['desc'] ).'</p>';
										}
									echo '</div>';

									if( !empty( $single_process['btn_link']['url'] ) ){
										$target 	= $single_process['btn_link']['is_external'] ? ' target="_blank"' : '';
										$nofollow 	= $single_process['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

										echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $single_process['btn_link']['url'] ).'" class="link-btn">'.esc_html($single_process['btn_txt']).'<i class="far fa-arrow-right"></i></a>';
									}
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</section>';
		echo '<!-----------------------End Work Process Area----------------------->';
	}
}