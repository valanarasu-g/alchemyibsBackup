<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Blog Widget .
 *
 */
class Medilax_Blog_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxblog';
	}

	public function get_title() {
		return esc_html__( 'Medilax Blog', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'blog_section',
			[
				'label' 	=> esc_html__( 'Blog', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'blog_style',
			[
				'label' 		=> __( 'Blog Style', 'medilax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'medilax' ),
					'two' 			=> __( 'Style Two', 'medilax' ),
					'three' 		=> __( 'Style Three', 'medilax' ),
				],
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' 		=> esc_html__( 'Post Per Page', 'medilax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 0,
						'max' 			=> 10,
						'step' 			=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 6,
				],
			]
		);

		$this->add_control(
			'title_length',
			[
				'label' 		=> esc_html__( 'Title Length', 'medilax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 0,
						'max' 			=> 20,
						'step' 			=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
			]
		);

        $this->add_control(
			'blog_post_order',
			[
				'label' 		=> esc_html__( 'Order', 'medilax' ),
                'type' 			=> Controls_Manager::SELECT,
                'options'   	=> [
                    'ASC'   		=> esc_html__( 'ASC', 'medilax' ),
                    'DESC'   		=> esc_html__( 'DESC', 'medilax' ),
                ],
                'default'  		=> 'DESC'
			]
        );

        $this->add_control(
            'blog_btn_title', [
                'label' 		=> esc_html__( 'Button Text', 'medilax' ),
                'type' 			=> Controls_Manager::TEXT,
                'label_block' 	=> true,
                'default' 		=> esc_html__( 'Read More', 'medilax' ),
            ]
        );

		$this->end_controls_section();

		/*-----------------------------------------general styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'Genaral', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
                'condition'		=> [ 'blog_style' =>  'one' ],
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'medilax' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .blog-card .blog-content',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .blog-card',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_hover_shadow',
				'label' 	=> __( 'Box Hover Shadow', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .blog-card:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .blog-card .blog-content',
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
					'{{WRAPPER}} .blog-card .blog-content' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------category styling------------------------------------*/

		$this->start_controls_section(
			'category_styling',
			[
				'label' 	=> __( 'Category Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
                'condition'		=> [ 'blog_style' =>  'one' ],
			]
        );

        $this->add_control(
			'cat_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card .blog-meta .cat-style i'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'cat_icon_size',
			[
				'label' 		=> __( 'Icon Size', 'medilax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 2,
						'max' 			=> 30,
						'step' 			=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} .blog-card .blog-meta .cat-style i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'cat_color',
			[
				'label' 		=> __( 'Category Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card .blog-meta .cat-style'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'cat_hvr_color',
			[
				'label' 		=> __( 'Category Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card .blog-meta .cat-style:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'cat_typography',
		 		'label' 		=> __( 'Category Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .blog-card .blog-meta .cat-style'
			]
		);
        $this->end_controls_section();

        /*-----------------------------------------authore styling------------------------------------*/

		$this->start_controls_section(
			'auth_styling',
			[
				'label' 	=> __( 'Author Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'auth_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card .blog-meta .auth-style i'	=> 'color: {{VALUE}}!important;',
				],
                'condition'		=> [ 'blog_style' =>  'one' ],
			]
        );
        $this->add_control(
			'auth_icon_size',
			[
				'label' 		=> __( 'Icon Size', 'medilax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 2,
						'max' 			=> 30,
						'step' 			=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} .blog-card .blog-meta .auth-style i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
                'condition'		=> [ 'blog_style' =>  'one' ],
			]
		);
        $this->add_control(
			'auth_color',
			[
				'label' 		=> __( 'Author Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card .blog-meta .auth-style,{{WRAPPER}} .blog-auth-name'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'auth_hvr_color',
			[
				'label' 		=> __( 'Author Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card .blog-meta .auth-style:hover,{{WRAPPER}} .blog-auth-name a:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'auth_typography',
		 		'label' 		=> __( 'Author Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .blog-card .blog-meta .auth-style,{{WRAPPER}} .blog-auth-name'
			]
		);
        $this->end_controls_section();

        /*-----------------------------------------title styling------------------------------------*/

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'blog_title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog-wrapper .vs-blog .blog-title a'	=> 'color: {{VALUE}}',
				],
			]
        );
        $this->add_control(
			'blog_title_hover_color',
			[
				'label' 		=> __( 'Title Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog-wrapper .vs-blog .blog-title a:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_responsive_control(
			'blog_title_align',
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
					'justify' 	=> [
						'title' 		=> __( 'Justify', 'medilax' ),
						'icon' 			=> 'eicon-text-align-justify',
					],
				],
				'default' 	=> 'left',
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog-wrapper .vs-blog .blog-title' => 'text-align: {{VALUE}};',
                ]
			]
		);

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'blog_title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-blog-wrapper .vs-blog .blog-title a'
			]
		);

        $this->add_responsive_control(
			'blog_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog-wrapper .vs-blog .blog-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'blog_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog-wrapper .vs-blog .blog-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Button styling------------------------------------*/

		$this->start_controls_section(
			'button_styling',
			[
				'label' 	=> __( 'Button Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
                'condition'		=> [ 'blog_style' =>  'one' ],
			]
        );

        $this->add_control(
			'blog_button_color',
			[
				'label' 		=> __( 'Button Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog-wrapper .vs-blog .link-btn'	=> 'color: {{VALUE}}',
				],
			]
        );
        $this->add_control(
			'blog_button_hover_color',
			[
				'label' 		=> __( 'Button Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog-wrapper .vs-blog .link-btn:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .vs-blog-wrapper .vs-blog .link-btn::before'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'blog_button_typography',
		 		'label' 		=> __( 'Button Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-blog-wrapper .vs-blog .link-btn'
			]
		);
		$this->add_responsive_control(
			'blog_btn_align',
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
					'{{WRAPPER}} .vs-blog-wrapper .vs-blog .link-btn' => 'text-align: {{VALUE}};',
                ]
			]
		);
		$this->add_responsive_control(
			'blog_btn_margin',
			[
				'label' 		=> __( 'Button Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog-wrapper .vs-blog .link-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'blog_btn_padding',
			[
				'label' 		=> __( 'Button Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog-wrapper .vs-blog .btn-align' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		global $post;

    	$blogs = new \WP_Query(array(
			'posts_per_page' => $settings['posts_per_page']['size'],
			'post_type'		 => 'post',
			'order' 		 => $settings['blog_post_order']
		 ));
		 
    	$length = $settings['title_length']['size'];

		echo '<section class="vs-blog-wrapper">';
	        echo '<div class="container">';
	            echo '<div class="row vs-carousel wow fadeIn" data-wow-delay="0.3s" data-slide-show="3">';
	            	while ( $blogs->have_posts() ) { $blogs->the_post();

	            		$categories = get_the_category();
	            		$author_url = get_avatar_url( get_the_author_meta( 'ID' ) , 56 );

		                echo '<div class="col-xl-4">';
							if( $settings['blog_style'] == 'one' ){
								echo '<div class="vs-blog blog-card">';
									if( has_post_thumbnail() ){
										echo '<div class="blog-img">';
											echo '<a href="'.esc_url( get_permalink() ).'">';
												the_post_thumbnail('medilax_387x310');
											echo '</a>';
											echo '<div class="blog-date">';
												echo '<div class="day">'.get_the_date('d').'</div>';
												echo get_the_date('M Y');
											echo '</div>';
										echo '</div>';
									}

									echo ' <div class="blog-content">';
										echo '<div class="blog-meta">';
											echo '<a class="cat-style" href=" '. esc_url( get_category_link( $categories[0]->term_id ) ) . '"><i class="far fa-folder"></i>';
												echo esc_html( $categories[0]->name );
											echo '</a>';
											echo '<a class="auth-style" href="'.get_the_permalink().'"><i class="fal fa-user"></i>'.get_the_author().'</a>';
										echo '</div>';
										echo '<h3 class="blog-title h5"><a href="'.get_the_permalink().'">'.wp_trim_words( wp_kses_post( get_the_title() ), $length, '' ).'</a></h3>';
										echo ' <div class="btn-align">';
											echo '<a href="'.get_the_permalink().'" class="link-btn">'.esc_html($settings['blog_btn_title']).'<i class="far fa-long-arrow-right"></i></a>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							}elseif( $settings['blog_style'] == 'two' ) {
								echo '<div class="vs-blog blog-style1">';
									if( has_post_thumbnail() ){
										echo '<div class="blog-img">';
											the_post_thumbnail('medilax_417x228');
										echo '</div>';
									}
									echo '<div class="blog-content">';

										echo '<a href="'.esc_url( medixi_blog_date_permalink() ).'" class="blog-date">';
											echo get_the_date('M d, Y');
										echo '</a>';

										echo '<h3 class="blog-title h4"><a href="'.esc_url( get_permalink() ).'">'.wp_trim_words( wp_kses_post( get_the_title() ), $length, '' ).'</a></h3>';
										echo '<div class="blog-bottom">';
											echo '<div class="blog-avater">';
												echo get_avatar( get_the_author_meta( 'ID' ), 42 );
											echo '</div>';
											echo '<p class="blog-auth-name">by<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" class="text-inherit">'. get_the_author().'</a></p>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							}else{
								echo '<div class="vs-blog blog-style2">';
									if( has_post_thumbnail() ){
										echo '<div class="blog-img">';
											echo '<a href="'.get_permalink().'">';
												the_post_thumbnail('medilax_405x275');
											echo '</a>';
										echo '</div>';
									}

									echo '<div class="blog-content">';
										echo '<a href="'.esc_url( medixi_blog_date_permalink() ).'" class="blog-date">';
											echo get_the_date('M d, Y');
										echo '</a>';
										echo '<h3 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.wp_trim_words( wp_kses_post( get_the_title() ), $length, '' ).'</a></h3>';

										echo '<p class="blog-text">'.wp_trim_words( wp_kses_post( get_the_content() ), '12', '' ).'</p>';

										echo '<a href="'.esc_url( get_permalink() ).'" class="blog-btn"><i class="far fa-angle-right"></i></a>';

									echo '</div>';
								echo '</div>';
							}
		                echo '</div>';
	                }
	                wp_reset_postdata();
	            echo '</div>';
	        echo '</div>';
	    echo '</section>';
	}

}