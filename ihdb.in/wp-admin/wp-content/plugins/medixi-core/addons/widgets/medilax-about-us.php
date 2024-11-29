<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * About Us Widget .
 *
 */
class Medilax_AboutUs_Widget extends Widget_Base{

	public function get_name() {
		return 'aboutus';
	}

	public function get_title() {
		return __( 'Medilax About Us', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label'     => __( 'About Us', 'medilax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'about_us_style',
			[
				'label' 		=> __( 'About Us Style', 'medilax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'medilax' ),
					'two' 			=> __( 'Style Two', 'medilax' ),
					'three' 		=> __( 'Style Three', 'medilax' ),
					'four' 			=> __( 'Style Four', 'medilax' ),
					'five' 			=> __( 'Style Five', 'medilax' ),
				],
			]
		);

		$this->add_control(
			'about_image',
			[
				'label'     => __( 'About Image', 'medilax' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'about_shape',
			[
				'label'     => __( 'About Shape', 'medilax' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'about_us_style' =>  ['two', 'five']  ]
			]
		);

		$this->add_control(
			'video_url',
			[
				'label'         => __( 'Video Url?', 'medilax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Set Video Url' , 'medilax' ),
				'label_block'   => true,
				'condition'		=> [ 'about_us_style' =>  ['one','three', 'four']  ],
			]
		);

		$this->add_control(
			'more_options',
			[
				'label' => __( 'Additional Informations', 'medilax' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'dr_box_title',
            [
				'label'         => __( 'Title', 'medilax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'About Us Title' , 'medilax' ),
				'label_block'   => true,
				'condition'		=> [ 'about_us_style' =>  ['two', 'five']  ]
			]
		);
        $this->add_control(
			'dr_box_short_desc',
            [
				'label'         => __( 'Short Description', 'medilax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'About Description' , 'medilax' ),
				'label_block'   => true,
				'condition'		=> [ 'about_us_style' =>  ['two', 'five']  ]
			]
		);

		$this->add_control(
			'counter_number',
            [
				'label'         => __( 'Counter Number', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '5' , 'medilax' ),
				'label_block'   => true,
				'condition'		=> [ 'about_us_style' =>  'three' ],

			]
		);
		$this->add_control(
			'counter_number_text',
            [
				'label'         => __( 'Counter Number Text', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Year Experience' , 'medilax' ),
				'label_block'   => true,
				'condition'		=> [ 'about_us_style' =>  'three' ],

			]
		);


		$this->end_controls_section();

		//---------------------------------------------Right Content---------------------------------------------//

		$this->start_controls_section(
			'right_content',
			[
				'label'     => __( 'Right Content', 'medilax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'about_subtitle',
            [
				'label'         => __( 'About Subtitle', 'medilax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'About Us Subtitle' , 'medilax' ),
				'label_block'   => true,
				'condition'		=> [ 'about_us_style!' =>  'one' ],

			]
		);
		$this->add_control(
			'about_title',
            [
				'label'         => __( 'About Title', 'medilax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'About Us Title' , 'medilax' ),
				'label_block'   => true,
			]
		);
        $this->add_control(
			'about_description',
            [
				'label'         => __( 'About Description', 'medilax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'About Description' , 'medilax' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'about_features',
            [
				'label'         => __( 'About Features', 'medilax' ),
				'type'          => Controls_Manager::WYSIWYG,
				'default'       => __( 'About Features' , 'medilax' ),
				'label_block'   => true,
                'condition'		=> [ 'about_us_style' =>  [ 'two', 'three', 'four' ] ],
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' 	=> __( 'Button Text', 'medilax' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'medilax' ),
                'condition'		=> [ 'about_us_style' =>  [ 'two', 'three', 'four', 'five' ] ],
			]
        );

        $this->add_control(
			'btn_link',
			[
				'label' 	=> __( 'Link', 'medilax' ),
				'type' 		=> Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'medilax' ),
				'show_external' => true,
				'default' 	=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
                'condition'		=> [ 'about_us_style' =>  [ 'two', 'three', 'four', 'five' ] ],
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
            'icon_type',
            [
                'label'     => esc_html__('Select Your Icon Type', 'medilax'),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'flaticon'     => esc_html__('Theme own Flat Icon', 'medilax'),
                    'image_icon'   => esc_html__('Custom Icon', 'medilax'),
                    'fontawesome'  => esc_html__('Fontawesome', 'medilax'),
                ],
                'default' => 'flaticon',
            ]
        );
        $repeater->add_control(
            'flaticon',
            [
                'name'       => 'flaticon',
                'label'      => esc_html__('Icon', 'medilax'),
                'type'       => Controls_Manager::ICON,
                'options'    => medilax_flaticons(),
                'include'    => medilax_include_flaticons(),
                'condition'  => [
                    'icon_type' => 'flaticon',
                ],
            ]
        );
        $repeater->add_control(
            'fontawesome',
            [
                'label'     => __( 'Fontawesome', 'medilax' ),
                'type'      => Controls_Manager::ICONS,
                'default'   => [
                    'value'     => 'fab fa-facebook-f',
                    'library'   => 'solid',
                ],
                'condition'  => [
                    'icon_type' => 'fontawesome',
                ],
            ]
        );

        $repeater->add_control(
            'image_icon',
            [
                'label'     => __( 'Image icon', 'medilax' ),
                'type'      => Controls_Manager::MEDIA,
                'condition' => [
                    'icon_type' => 'image_icon'
                ],
            ]
        );

        $repeater->add_control(
			'title', [
				'label' 		=> __( 'Title', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'medilax' ),
				'rows' 		=> 2,
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'description', [
				'label' 		=> __( 'Description', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 3,
				'default' 		=> __( 'Customer' , 'medilax' ),
				'label_block' 	=> true,
			]
        );
		$this->add_control(
			'features',
			[
				'label' 		=> __( 'Features Content', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Safe Cleaning Supplies', 'medilax' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'about_us_style' =>  [ 'five']  ]
			]
		);

		$this->end_controls_section();

		//---------------------------------------------Rating Area---------------------------------------------//

		$this->start_controls_section(
			'rating',
			[
				'label'     => __( 'Rating Area', 'medilax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'about_us_style' =>  'one' ],
			]
        );

        $this->add_control(
			'about_rating',
            [
				'label'         => __( 'Rating', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '4.8' , 'medilax' ),
				'label_block'   => true,
			]
		);

		$this->add_control(
			'about_rating_desc',
            [
				'label'         => __( 'Rating Content', 'medilax' ),
				'type'          => Controls_Manager::WYSIWYG,
				'default'       => '<span class="fw-bold text-decoration-underline text-title">'.esc_html__('Hospite Overall Rating,', 'medilax').'</span> '.esc_html__('based', 'medilax').' <br> '.esc_html__('on 8126 reviews.', 'medilax').'',
				'label_block'   => true,
			]
		);

		$this->add_control(
			'rating_shape',
			[
				'label'     => __( 'Rating Shape', 'medilax' ),
				'type'      => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();

        //---------------------------------------------Contact Area---------------------------------------------//

		$this->start_controls_section(
			'contact',
			[
				'label'     => __( 'Contact Area', 'medilax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'about_us_style' =>  ['three', 'two'] ],
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
		$this->add_control(
			'contact_email',
            [
				'label'         => __( 'Title', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Need help? Contact Us' , 'medilax' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'contact_email_url',
            [
				'label'         => __( 'Email', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'info@yourdomain.com' , 'medilax' ),
				'label_block'   => true,
			]
		);
		
		$this->end_controls_section();

		/*-----------------------------------------video button styling------------------------------------*/

		$this->start_controls_section(
			'video_btn_styling',
			[
				'label' 	=> __( 'Play Button Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'about_us_style' =>  ['one','three', 'four']  ],
			]
        );
        $this->add_control(
			'video_btn_color',
			[
				'label' 	=> __( 'Video Button Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'video_btn_hover_color',
			[
				'label' 	=> __( 'Video Button Hover Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'video_btn_background_color',
			[
				'label' 	=> __( 'Video Button Background Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'background-color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'video_btn_background_hover_color',
			[
				'label' 	=> __( 'Video Button Background Hover Color', 'medilax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'background-color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'video_btn_ripple_effect_color',
			[
				'label' 		=> __( 'Video Button Ripple Effect Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:after,{{WRAPPER}} .play-btn:before' => 'background-color: {{VALUE}}!important;',
                ]
			]
        );


        $this->end_controls_section();

        /*-----------------------------------------subtitle styling------------------------------------*/

		$this->start_controls_section(
			'subtitle_styling',
			[
				'label' 	=> __( 'Subtitle Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'about_us_style!' =>  'one' ],
			]
        );

        $this->add_control(
			'about_subtitle_color',
			[
				'label' 		=> __( 'Subtitle Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper .sec-subtitle'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'about_subtitle_typography',
		 		'label' 		=> __( 'Subtitle Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-about-wrapper .sec-subtitle'
			]
		);

        $this->add_responsive_control(
			'about_subtitle_margin',
			[
				'label' 		=> __( 'Subtitle Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper .sec-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'about_subtitle_padding',
			[
				'label' 		=> __( 'Subtitle Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper .sec-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
			'about_title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper h2'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'about_title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-about-wrapper h2'
			]
		);

        $this->add_responsive_control(
			'about_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'about_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Description styling------------------------------------*/

		$this->start_controls_section(
			'desc_description',
			[
				'label' 	=> __( 'Description Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'about_desc',
			[
				'label' 		=> __( 'Description Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper .about-content .desc'	=> 'color: {{VALUE}}!important;',

				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'about_desc_typography',
		 		'label' 		=> __( 'Description Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-about-wrapper .about-content .desc',
			]
		);

        $this->add_responsive_control(
			'about_desc_margin',
			[
				'label' 		=> __( 'Description Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper .about-content .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'about_desc_padding',
			[
				'label' 		=> __( 'Description Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-about-wrapper .about-content .desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->end_controls_section();

        /*-----------------------------------------title styling------------------------------------*/

		$this->start_controls_section(
			'features_title_styling',
			[
				'label' 	=> __( 'Features Title Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'about_us_style' =>  ['three', 'five']  ],
			]
        );

        $this->add_control(
			'features_title_color',
			[
				'label' 		=> __( 'Title Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .features-content h3'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_title_typography',
		 		'label' 		=> __( 'Title Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .features-content h3'
			]
		);

        $this->add_responsive_control(
			'features_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .features-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'features_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .features-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Description styling------------------------------------*/

		$this->start_controls_section(
			'fetures_desc_styling',
			[
				'label' 	=> __( 'Features Content Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'about_us_style' =>  ['three', 'five']  ],
			]
        );

        $this->add_control(
			'features_desc_color',
			[
				'label' 		=> __( 'Content Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .features-content p'	=> 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'features_desc_typography',
		 		'label' 		=> __( 'Content Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .features-content p'
			]
		);

        $this->add_responsive_control(
			'features_desc_margin',
			[
				'label' 		=> __( 'Content Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .features-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'features_desc_padding',
			[
				'label' 		=> __( 'Content Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .features-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Experience Box styling------------------------------------*/

		$this->start_controls_section(
			'exp_box',
			[
				'label' 	=> __( 'Experience Box Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'about_us_style' =>  'three' ],
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 		=> 'exp_box_bg_clr',
				'label' 	=> __( 'Box Background', 'medilax' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .exp-box-bottom',
			]
		);

        $this->add_control(
			'exp_counter',
			[
				'label' 		=> __( 'Counter Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .exp-box-bottom .counter'	=> 'color: {{VALUE}}!important;',

				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'exp_counter_typography',
		 		'label' 		=> __( 'Counter Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .exp-box-bottom .counter',
			]
		);
		$this->add_control(
			'exp_options',
			[
				'label' => __( 'Counter Title', 'medilax' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'exp_txt',
			[
				'label' 		=> __( 'Content Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .exp-box-bottom p'	=> 'color: {{VALUE}}!important;',

				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'exp_txt_typography',
		 		'label' 		=> __( 'Content Typography', 'medilax' ),
		 		'selector' 		=> '{{WRAPPER}} .exp-box-bottom p',
			]
		);

        $this->add_responsive_control(
			'exp_txt_margin',
			[
				'label' 		=> __( 'Content Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .exp-box-bottom p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'exp_txt_padding',
			[
				'label' 		=> __( 'Content Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .exp-box-bottom p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'condition'		=> [ 'about_us_style' =>  ['four']  ],
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

		echo '<!-----------------------Start About us Area----------------------->';
		if( $settings['about_us_style'] == 'one' ){
			echo '<section class="vs-about-wrapper">';
				echo '<div class="container">';
					echo '<div class="row ">';
						echo '<div class="col-lg-6 mb-30 mb-lg-0">';
						if( $settings['about_image']['url'] ){
							echo '<div class="about-img1 wow fadeInUp" data-wow-delay="0.3s">';
								echo medixi_img_tag( array(
									'url'	=> esc_url( $settings['about_image']['url'] ),
									'class' => 'w-100'
								) );
								if( ! empty( $settings['video_url'] ) ){
			                        echo '<a href="'.esc_url( $settings['video_url'] ).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
								}
							echo '</div>';
						}
						echo '</div>';
						echo '<div class="col-lg-6 align-self-center">';
							echo '<div class="about-content ps-xl-5 ms-xl-2">';
								if( ! empty( $settings['about_title'] ) ){
									echo '<h2 class="h1 mt-n2 mb-3 pb-1">'.wp_kses_post( $settings['about_title'] ).'</h2>';
								}
								if( ! empty( $settings['about_description'] ) ){
									echo '<p class="desc">'. htmlspecialchars_decode(esc_html( $settings['about_description'] )).'</p>';
								}
								if( ! empty( $settings['about_rating'] && $settings['about_rating_desc'] ) ){
									echo '<div class="about-rating d-flex align-items-center">';
										if( ! empty( $settings['rating_shape']['url'] ) ){
											echo medixi_img_tag( array(
												'url'	=> esc_url( $settings['rating_shape']['url'] ),
												'class' => 'shape'
											) );
										}
										echo '<span class="total text-theme h2 mb-0 mr-20 font-body">'.esc_html( $settings['about_rating'] ).'</span>';

										echo '<p class="rating-text mb-0">'. htmlspecialchars_decode(esc_html( $settings['about_rating_desc'] )).'</p>';
									echo '</div>';
								}
								if( ! empty( $settings['contact_title'] ) ){
									echo '<p class="fs-20 text-title con-title fw-medium mb-1">'.esc_html( $settings['contact_title'] ).'</p>';
								}
								echo '<p class="about-call-text fw-bold h4 text-theme font-body mb-0">';
								if( ! empty( $settings['contact_phone'] ) ){
									echo '<a href="tel:'.esc_attr($settings['contact_phone']).'">'.esc_html( $settings['contact_phone'] ).'</a> ';
								}

								echo esc_html__( '[or]', 'medilax' );

								if( ! empty( $settings['contact_email'] ) ){
									echo ' <a href="mailto:'.esc_attr($settings['contact_email_url']).'">'.esc_html( $settings['contact_email'] ).'</a>';
								}
								echo '</p>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</section>';
        }elseif( $settings['about_us_style'] == 'two' ){
			echo '<section class="vs-about-wrapper position-relative">';
				if( $settings['about_shape']['url'] ){
					echo '<div class="icon-shape3">';
						echo medixi_img_tag( array(
							'url'	=> esc_url( $settings['about_shape']['url'] )
						) );
					echo '</div>';
				}
				echo '<div class="container">';
					echo '<div class="row flex-row-reverse">';
						if( ! empty( $settings['about_image']['url'] ) ){
							echo '<div class="col-lg-6 mb-40 mb-lg-0 align-self-end">';
								echo '<div class="about-img2 position-relative">';
									echo '<img src="'.esc_url( $settings['about_image']['url'] ).'" alt="'.esc_html__('Medilax', 'medilax').'" class="wow fadeIn" data-wow-delay="0.3s">';

									if( ! empty( $settings['dr_box_title'] && $settings['dr_box_short_desc'] ) ){
										echo '<div class="doctor-box position-absolute end-0 top-50 translate-middle-y wow fadeIn" data-wow-delay="0.3s">';
											echo '<span class="icon-btn style3"><i class="fal fa-user"></i></span>';
											echo '<p class="h6 mb-1">'.wp_kses_post( $settings['dr_box_title'] ).'</p>';
											echo '<p class="mb-0 fs-xs">'.wp_kses_post( $settings['dr_box_short_desc'] ).'</p>';
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
						}
						echo '<div class="col-lg-6 align-self-center mb-20 mb-lg-0">';
							echo '<div class="about-content mb-50">';
								if( ! empty( $settings['about_subtitle'] ) ){
									echo '<span class="sec-subtitle text-theme h3 mb-2 mb-sm-0">'.esc_html( $settings['about_subtitle'] ).'</span>';
								}
								if( ! empty( $settings['about_title'] ) ){
									echo '<h2 class="h1 mb-3">'.wp_kses_post( $settings['about_title'] ).'</h2>';
								}
								if( ! empty( $settings['about_description'] ) ){
									echo '<div class="row">';
										echo '<div class="col-xl-10">';
											echo '<p class="mb-4 desc">'.wp_kses_post( $settings['about_description'] ).'</p>';
										echo '</div>';
									echo '</div>';
								}
								if( ! empty( $settings['about_features'] ) ){
									echo '<div class="media-style1">';
										echo wp_kses_post( $settings['about_features'] );
									echo '</div>';
								}
								if( ! empty( $settings['btn_text'] ) ){
									echo '<a href="'.esc_url( $settings['btn_link']['url'] ).'" class="vs-btn">'.esc_html( $settings['btn_text'] ).'</a>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</section>';
        }elseif( $settings['about_us_style'] == 'three' ){
			echo '<section class="vs-about-wrapper space">';
				echo '<div class="container">';
					echo '<div class="row flex-row-reverse">';
						if( ! empty( $settings['about_image']['url'] ) ){
						echo '<div class="col-lg-6 mb-40 mb-lg-0">';
							echo '<div class="vs-surface wow" data-wow-delay="0.3s">';
								echo '<div class="about-img3 position-relative">';
									echo medixi_img_tag( array(
										'url'	=> esc_url( $settings['about_image']['url'] ),
										'class' => 'w-100'
									) );
									if( ! empty( $settings['video_url'] ) ){
				                        echo '<a href="'.esc_url( $settings['video_url'] ).'" class="popup-video play-btn style2 position-center"><i class="fas fa-play"></i></a>';
									}
									echo '<div class="exp-box-bottom">';
										if( ! empty( $settings['counter_number'] ) ){
											echo '<div class="exp-year text-theme">';
												echo '<span class="counter">'.esc_html( $settings['counter_number'] ).'</span>+';
											echo '</div>';
										}
										if( ! empty( $settings['counter_number_text'] ) ){
											echo '<p class="exp-text text-title mb-0">'.esc_html( $settings['counter_number_text'] ).'</p>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						}
						echo '<div class="col-lg-6 align-self-center">';
							echo '<div class="about-content mb-2 ">';
								if( ! empty( $settings['about_subtitle'] ) ){
									echo '<span class="sec-subtitle text-theme h3 mb-2 mb-sm-0">'.esc_html( $settings['about_subtitle'] ).'</span>';
								}
								echo '<div class="row">';
									if( ! empty( $settings['about_title'] ) ){
										echo '<div class="col-xl-10">';
											echo '<h2 class="h1 mb-3">'. htmlspecialchars_decode(esc_html( $settings['about_title'] )).'</h2>';
										echo '</div>';
									}
									if( ! empty( $settings['about_description'] ) ){
										echo '<div class="col-xl-10">';
											echo '<p class="mb-4 desc">'. htmlspecialchars_decode(esc_html( $settings['about_description'] )).'</p>';
										echo '</div>';
									}

								echo '</div>';
								if( ! empty( $settings['about_features'] ) ){
									echo '<div class="media-style1">';
										echo wp_kses_post( $settings['about_features'] );
									echo '</div>';
								}
								if( ! empty( $settings['btn_text'] ) ){
									echo '<a href="'.esc_url( $settings['btn_link']['url'] ).'" class="vs-btn">'.esc_html( $settings['btn_text'] ).'</a>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</section>';
        }elseif( $settings['about_us_style'] == 'four' ){
        	echo '<section class="vs-about-wrapper">';
				echo '<div class="container">';
					echo '<div class="row ">';
						echo '<div class="col-lg-6 mb-30 mb-lg-0">';
						if( $settings['about_image']['url'] ){
							echo '<div class="about-img1 wow fadeInUp" data-wow-delay="0.3s">';
								echo medixi_img_tag( array(
									'url'	=> esc_url( $settings['about_image']['url'] ),
									'class' => 'w-100'
								) );
								if( ! empty( $settings['video_url'] ) ){
			                        echo '<a href="'.esc_url( $settings['video_url'] ).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
								}
							echo '</div>';
						}
						echo '</div>';
						echo '<div class="col-lg-6 align-self-center">';
							echo '<div class="about-content content-box ps-xl-5 ms-xl-2">';
								if( ! empty( $settings['about_title'] ) ){
									echo '<h2 class="h1 mt-n2 mb-3 pb-1">'.wp_kses_post( $settings['about_title'] ).'</h2>';
								}
								if( ! empty( $settings['about_description'] ) ){
									echo '<p class="desc">'. htmlspecialchars_decode(esc_html( $settings['about_description'] )).'</p>';
								}
								if( ! empty( $settings['about_features'] ) ){
									echo '<div class="media-style1">';
										echo wp_kses_post( $settings['about_features'] );
									echo '</div>';
								}
								if( ! empty($settings['btn_text'] ) ){
									echo '<div class="col-auto">';
										echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="vs-btn style2">'.esc_html($settings['btn_text']).'<i class="fal fa-long-arrow-right"></i></a>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</section>';
        }else{
        	echo '<section class="vs-about-wrapper position-relative">';
				if( $settings['about_shape']['url'] ){
					echo '<div class="icon-shape3">';
						echo medixi_img_tag( array(
							'url'	=> esc_url( $settings['about_shape']['url'] )
						) );
					echo '</div>';
				}
				echo '<div class="container">';
					echo '<div class="row flex-row-reverse">';
						if( ! empty( $settings['about_image']['url'] ) ){
							echo '<div class="col-lg-6 mb-40 mb-lg-0 ">';
								echo '<div class="about-img2 position-relative">';
									echo '<img src="'.esc_url( $settings['about_image']['url'] ).'" alt="'.esc_html__('Medilax', 'medilax').'" class="wow fadeIn" data-wow-delay="0.3s">';

									if( ! empty( $settings['dr_box_title'] && $settings['dr_box_short_desc'] ) ){
										echo '<div class="doctor-box position-absolute end-0 top-50 translate-middle-y wow fadeIn" data-wow-delay="0.3s">';
											echo '<span class="icon-btn style3"><i class="fal fa-user"></i></span>';
											echo '<p class="h6 mb-1">'.esc_html( $settings['dr_box_title'] ).'</p>';
											echo '<p class="mb-0 fs-xs">'.esc_html( $settings['dr_box_short_desc'] ).'</p>';
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
						}
						echo '<div class="col-lg-6 align-self-center mb-20 mb-lg-0">';
							echo '<div class="about-content mb-50">';
								if( ! empty( $settings['about_subtitle'] ) ){
									echo '<span class="sec-subtitle text-theme h3 mb-2 mb-sm-0">'.esc_html( $settings['about_subtitle'] ).'</span>';
								}
								if( ! empty( $settings['about_title'] ) ){
									echo '<h2 class="h1 mb-3">'.wp_kses_post( $settings['about_title'] ).'</h2>';
								}
								if( ! empty( $settings['about_description'] ) ){
									echo '<div class="row">';
										echo '<div class="col-xl-10">';
											echo '<p class="mb-4 desc">'.esc_html( $settings['about_description'] ).'</p>';
										echo '</div>';
									echo '</div>';
								}
								echo '<div class="features-content">';
								foreach( $settings['features'] as $data ) {
									echo '<div class="d-flex ">';
										if( $data['icon_type'] == 'flaticon' ) {
		                                    echo '<span class="text-theme icon-3x">';
		                                            echo '<i class="'.esc_attr( $data['flaticon'] ).'"></i>';
		                                    echo '</span>';
		                                }elseif( $data['icon_type'] == 'fontawesome' ) {
		                                    echo '<span class="text-theme icon-3x">';
		                                            \Elementor\Icons_Manager::render_icon( $data['fontawesome'], [ 'aria-hidden' => 'true' ] );
		                                    echo '</span>';
		                                }elseif( $data['icon_type'] == 'image_icon' ){
		                                    
		                                    echo '<div class="img-icon">';
		                                        echo '<img src="'.esc_url($data['image_icon']['url']).'" alt="'.esc_html__( 'Icon', 'medilax' ).'">';
		                                    echo '</div>';
		                                }
										echo '<div class="media-body">';
											if( ! empty( $data['title'] ) ){
												echo '<h3 class="h5">'.esc_html( $data['title'] ).'</h3>';
											}
											if(!empty($data['description'])){
												echo '<p class="fs-xs">'.htmlspecialchars_decode(esc_html( $data['description'] )).'</p>';
											}
										echo '</div>';
									echo '</div>';
								}
								echo '</div>';
								if( ! empty( $settings['btn_text'] ) ){
									echo '<a href="'.esc_url( $settings['btn_link']['url'] ).'" class="vs-btn style2 mt-4">';
										echo esc_html( $settings['btn_text'] );
										echo '<i class="fal fa-long-arrow-right"></i>';
									echo '</a>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</section>';
        }
        echo '<!-----------------------End About us Area----------------------->';
	}
}