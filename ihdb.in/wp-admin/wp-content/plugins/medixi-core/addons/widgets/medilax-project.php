<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Project Widget .
 *
 */
class Medilax_Project_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxproject';
	}

	public function get_title() {
		return __( 'Medilax Project', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'project_content',
			[
				'label'		=> __( 'Project','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'project_style',
			[
				'label' 		=> __( 'Project Style', 'medilax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'medilax' ),
					'two' 			=> __( 'Style Two', 'medilax' ),
				],
			]
		);


        $this->add_control(
			'project_post_order',
			[
				'label' 		=> __( 'Order', 'medilax' ),
                'type' 			=> Controls_Manager::SELECT,
                'options'   	=> [
                    'ASC'   		=> __( 'ASC', 'medilax' ),
                    'DESC'   		=> __( 'DESC', 'medilax' ),
                ],
                'default'  		=> 'DESC'
			]
        );

        $this->add_control(
			'all_text',
			[
				'label'     => __( 'All filter label', 'medilax' ),
				'type'      => Controls_Manager::TEXT,
				'default' 	=> __( 'All', 'medilax' ),
				'condition'	=> [ 'project_style' => 'two' ],
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
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .icon-btn.style4 i' => 'color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' 		=> __( 'Icon Background Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .icon-btn.style4 i' => 'background-color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' 		=> __( 'Icon Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .icon-btn.style4 i:hover' => 'color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_control(
			'icon_hover_bg_color',
			[
				'label' 		=> __( 'Icon Background Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .icon-btn.style4 i:hover' => 'background-color: {{VALUE}}!important;',
				],
			]
		);
		$this->add_control(
			'icon_shadow_color',
			[
				'label' 		=> __( 'Icon Shadow Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .vs-project-box .icon-btn i' => 'box-shadow: 0px 10px 30px 0px {{VALUE}}!important;',
				],
			]
		);
		$this->add_control(
			'icon_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'box_bg_color',
			[
				'label' 		=> __( 'Content Background Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-box .project-content' => 'background-color: {{VALUE}}!important;',
				],
			]
		);

        $this->end_controls_section();

        /*-----------------------------------------Categori styling------------------------------------*/

		$this->start_controls_section(
			'cat_styling',
			[
				'label' 	=> __( 'Category Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'cat_color',
			[
				'label' 		=> __( 'Category Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .project-cat'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'cat_typography',
		 		'label' 		=> __( 'Category Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-project-wrapper .project-cat'
			]
		);

        $this->add_responsive_control(
			'cat_margin',
			[
				'label' 		=> __( 'Category Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .project-cat' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'cat_padding',
			[
				'label' 		=> __( 'Category Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .project-cat' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Filter Button styling------------------------------------*/

		$this->start_controls_section(
			'btn_styling',
			[
				'label' 	=> __( 'Filter Button Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'project_style' =>  ['two']  ],
			]
        );

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .vs-btn.style4'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_hover_color',
			[
				'label' 		=> __( 'Button Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .vs-btn.style4:hover'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_active_color',
			[
				'label' 		=> __( 'Button Active Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .vs-btn.style4.active'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_shadow_color',
			[
				'label' 		=> __( 'Button Shadow Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .vs-btn.style4'	=> 'box-shadow: 0px 15px 42.75px 2.25px {{VALUE}}!important;',
				],
			]
        );

        $this->add_control(
			'btn_txt_color',
			[
				'label' 		=> __( 'Button Text Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .vs-btn.style4'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_txt_hover_color',
			[
				'label' 		=> __( 'Button Text Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper .vs-btn.style4:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'btn_txt_typography',
		 		'label' 		=> __( 'Button Text Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-project-wrapper .vs-btn.style4'
			]
		);
        $this->end_controls_section();

        /*-----------------------------------------Title styling------------------------------------*/

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper h4'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-project-wrapper h4'
			]
		);

        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-project-wrapper h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		global $post;

    	$project = new \WP_Query(array('posts_per_page' => -1, 'post_type' => 'medilax_project','order' => $settings['project_post_order'] ));

    	echo '<!-----------------------Start Project Area----------------------->';
    	if( $settings['project_style'] == 'one' ){

			echo '<section class="vs-project-wrapper">';
				echo '<div class="container">';
		            echo '<div class="row vs-carousel" data-slide-show="3">';
		                while ($project->have_posts()) {
							$project->the_post();
		                	$img_url = get_the_post_thumbnail_url( get_the_ID(),'full' );

			                echo '<div class="col-xl-4">';
			                    echo '<div class="vs-project-box mb-30">';
			                    	if(has_post_thumbnail( )) {
				                        echo '<div class="project-img">';
				                            echo medixi_img_tag( array(
													'url'	=> esc_url( $img_url ),
													'class' => 'w-100',
												));
				                        echo '</div>';
				                    }
			                        echo '<div class="project-content">';

			                        	$terms = wp_get_post_terms($post->ID, 'project_category', array("fields" => "names"));
										$i = 0;
										foreach( (array)$terms as $term){
											$i++;
											echo '<span class="project-cat fs-xs">' . esc_html($term) . '</span>';
											if($i == 1){
												break;
											}
										}
			                            echo '<h4 class="project-name">'.get_the_title().'</h4>';
			                            echo '<a href="'.esc_url ($img_url ).'" class="icon-btn style4 popup-image"><i class="fal fa-eye"></i></a>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
		                }
		            echo '</div>';
	            echo '</div>';
		    echo '</section>';
		}else{
			echo '<section class="vs-project-wrapper">';
		        echo '<div class="container z-index-common">';
		            echo '<div class="project-menu text-center mb-40 filter-menu-active ">';
		            	$text = !empty( $settings['all_text'] ) ? $settings['all_text'] : esc_html__( 'All Works', 'medilax' );
		                echo '<button data-filter="*" class="vs-btn style4 active">' .esc_html( $text ). '</button>';

		                $categories = get_terms('project_category');
                        foreach( (array)$categories as $categorie){
                            $cat_name = $categorie->name;
                            $cat_slug = $categorie->slug;
                            echo '<button class="vs-btn style4" data-filter=".' . esc_attr($cat_slug) . '">' . esc_attr($cat_name) . '</button>';
                        }
		            echo '</div>';
		            echo '<div class="row justify-content-center filter-active">';
		            	while ($project->have_posts()) { $project->the_post();
		            		$img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		            		$cat_slug = '';
                            $cats = get_the_terms( get_the_ID(), 'project_category');

                            if(is_array($cats)) {
                                foreach ( $cats as $cat ) {
                                    $cat_slug .= $cat->slug.' ';
                                }
                            }

			                echo '<div class="col-md-6 col-xl-4 filter-item '.esc_attr( $cat_slug ).'">';
			                    echo '<div class="vs-project-box mb-30">';
			                    	if(has_post_thumbnail( )) {
				                        echo '<div class="project-img">';
				                            echo medixi_img_tag( array(
													'url'	=> esc_url( $img_url ),
													'class' => 'w-100',
												));
				                        echo '</div>';
				                    }
			                        echo '<div class="project-content">';

			                        	$terms = wp_get_post_terms($post->ID, 'project_category', array("fields" => "names"));
										$i = 0;
										foreach( (array)$terms as $term){
											$i++;
											echo '<span class="project-cat fs-xs">' . esc_html($term) . '</span>';
											if($i == 1){
												break;
											}
										}
			                            echo '<h4 class="project-name">'.get_the_title().'</h4>';
			                            echo '<a href="'.esc_url($img_url).'" class="icon-btn style4 popup-image"><i class="fal fa-eye"></i></a>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }
			            wp_reset_postdata();
		            echo '</div>';
		       echo ' </div>';
		    echo '</section>';
		}
		echo '<!-----------------------End Project Area----------------------->';
	}
}