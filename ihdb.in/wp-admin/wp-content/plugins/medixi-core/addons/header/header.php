<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Header Widget .
 *
 */
class Medilax_Header extends Widget_Base {

	public function get_name() {
		return 'medilaxheader';
	}
	public function get_title() {
		return __( 'Header', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax_header_elements' ];
	}
	protected function _register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'header_style',
			[
				'label' 	=> __( 'Style', 'medilax' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'1' => __( 'Style One', 'medilax' ),
					'2' => __( 'Style Two', 'medilax' ),
				],
				'default' => '1',
			]
        );


		$this->add_control(
			'show_top_bar',
			[
				'label' 		=> __( 'Show Top Bar?', 'medilax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'medilax' ),
				'label_off' 	=> __( 'Hide', 'medilax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'location',

			[
				'label' 		=> __( 'Office Location', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '36D Street Brooklyn, New York', 'medilax' ),
				'condition'		=> [ 'show_top_bar' => [ 'yes' ] ],
			]
		);

		$this->add_control(
			'opening_time',

			[
				'label' 		=> __( 'Opening Time', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Mon - Fri: 8:00 am - 7:00 pm', 'medilax' ),
				'condition'		=> [ 'show_top_bar' => [ 'yes' ] ],
			]
		);

		$this->add_control(
			'contact_email',
			[
				'label' 		=> __( 'Contact Email', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'example@domain.com', 'medilax' ),
				'condition'		=> [ 'show_top_bar' => [ 'yes' ], 'header_style!' => ['1'] ],
			]
		);

		$this->add_control(
			'show_language',
			[
				'label' 		=> __( 'Show Language?', 'medilax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'medilax' ),
				'label_off' 	=> __( 'Hide', 'medilax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'show_top_bar' => [ 'yes' ] ],
			]
		);

		$this->add_control(
			'show_search_icon',
			[
				'label' 		=> __( 'Show Search Icon?', 'medilax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'medilax' ),
				'label_off' 	=> __( 'Hide', 'medilax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'show_top_bar' => [ 'yes' ] ],

			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' 	=> __( 'Social Icon', 'medilax' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'medilax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'medilax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(

			'social_icon_list',
			[
				'label' 		=> __( 'Social Icon', 'medilax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => __( 'Add Social Icon','medilax' ),
					],
				],
				'condition'		=> [ 'show_top_bar' => [ 'yes' ] ],
			]
		);

		//---------------------------Main Menu Controls---------------------------//

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(

			'logo_image',

			[
				'label' 		=> __( 'Upload Logo', 'medilax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'hotline_subtext',
			[
				'label' 		=> __( 'Hotline Sub Text', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Call Anytime', 'medilax' ),
				'condition'		=> [ 'header_style' => [ '2' ] ],

			]
		);
		$this->add_control(
			'hotline',
			[
				'label' 		=> __( 'Hotline Number', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '669 2568 2596', 'medilax' ),
				'condition'		=> [ 'header_style' => [ '2' ] ],

			]
		);

		$this->add_control(
			'hr1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'show_search',
			[
				'label' 		=> __( 'Show Search?', 'medilax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'medilax' ),
				'label_off' 	=> __( 'Hide', 'medilax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'show_offcanvas',
			[
				'label' 		=> __( 'Show Offcanvas?', 'medilax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'medilax' ),
				'label_off' 	=> __( 'Hide', 'medilax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' 		=> __( 'Button Text', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Appointment', 'medilax' ),
				'condition'		=> [ 'header_style' => [ '1' ] ],

			]
		);
		$this->add_control(
			'button_url',
			[
				'label' 		=> __( 'Button Url?', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '#', 'medilax' ),
				'condition'		=> [ 'header_style' => [ '1' ] ],

			]
		);

		$this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'show_header_notice',
			[
				'label' 		=> __( 'Show Header Notice?', 'medilax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'medilax' ),
				'label_off' 	=> __( 'Hide', 'medilax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'header_notice',
			[
				'label' 		=> __( 'Header Notice', 'medilax' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> '<span class="text-theme"><i class="fas fa-exclamation-circle me-2"></i>'.esc_html__('Notice:', 'medilax').'</span><p class="text-white mb-0">'.esc_html__('Compellingly enhance web-enabled outsourcing after innovative.', 'medilax').'</p><a class="text-theme text-decoration-underline">'.esc_html__('Get More Info', 'medilax').'</a>',
				'condition'		=> [ 'show_header_notice' => [ 'yes' ] ],
			]
		);



		$menus = $this->medilax_menu_select();

		if( !empty( $menus ) ){

	        $this->add_control(
				'medilax_menu_select',
				[
					'label'     	=> __( 'Select Medilax Menu', 'medilax' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'medilax' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		}else {
			$this->add_control(
				'no_menu',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'medilax' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'medilax' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),

					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}

        $this->end_controls_section();
       //-----------------------------------Topbar Styling-------------------------------------//
        $this->start_controls_section(
			'topbar_styling',
			[
				'label'     => __( 'Topbar Styling', 'medilax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'show_top_bar' => [ 'yes'] ],
			]
        );

        $this->add_control(

			'topbar_background_color',
			[

				'label'     => __( 'Background Color', 'medilax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-wrapper .bg-title' => 'background-color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_control(

			'topbar_content_color',
			[

				'label'     => __( 'Topbar Content Color', 'medilax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-top-info li' => 'color: {{VALUE}}!important;',
                ],
			]
        );


        $this->add_group_control(
			Group_Control_Typography::get_type(),

			[
				'name'      => 'topbar_content_typography',
				'label'     => __( 'Content Typography', 'medilax' ),
                'selector'  => '{{WRAPPER}} .header-top-info li',
			]
        );

        $this->add_control(
			'topbar_icon_color',
			[
				'label'     => __( 'Social Icon Color', 'medilax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'topbar_icon_hover_color',
			[
				'label'     => __( 'Social Icon Hover Color', 'medilax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a:hover' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->end_controls_section();

        //-----------------------------------Menubar Styling-------------------------------------//
        $this->start_controls_section(
			'menubar_styling',
			[
				'label'     => __( 'Menubar Styling', 'medilax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'show_top_bar' => [ 'yes'] ],
			]
        );

        $this->add_control(
			'phone_color',
			[
				'label'     => __( 'Phone Color', 'medilax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .media-body a' => 'color: {{VALUE}}!important',
                ],
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );
        $this->add_control(
			'phone_hvr_color',
			[
				'label'     => __( 'Phone Hover Color', 'medilax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .media-body a:hover' => 'color: {{VALUE}}!important',
                ],
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),

			[
				'name'      => 'phone_typography',
				'label'     => __( 'Phone Typography', 'medilax' ),
                'selector'  => '{{WRAPPER}} .media-body a',
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );

        $this->add_control(
			'phone_icon_color',
			[
				'label'     => __( 'Phone Icon Color', 'medilax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .phone-box .box-icon' => 'color: {{VALUE}}!important',
                ],
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );

        $this->add_control(
			'icon_bg_color',
			[
				'label'     => __( 'Icon Background Color', 'medilax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .phone-box .box-icon' => 'background-color: {{VALUE}}!important',
                ],
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );
        $this->add_control(
			'icon_shake_color',
			[
				'label'     => __( 'Icon Shake Color', 'medilax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .phone-box .box-icon::after,
					 {{WRAPPER}} .phone-box .box-icon::before' => 'background-color: {{VALUE}}!important',
                ],
                'condition'		=> [ 'header_style' =>  ['two' ]  ],
			]
        );

        $this->add_control(
			'top_level_menu_color',
			[
				'label' 		=> __( 'Menu Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_color',
			[
				'label' 			=> __( 'Menu Hover Color', 'medilax' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul > li > a:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography',
				'label' 		=> __( 'Menu Typography', 'medilax' ),
                'selector' 		=> '{{WRAPPER}} .main-menu ul > li > a',
			]
		);

        $this->add_responsive_control(
			'top_level_menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
        );

        $this->add_responsive_control(
			'top_level_menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
		);

		$this->add_control(
			'top_level_menu_height',
			[
				'label' 		=> __( 'Height', 'medilax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 	=> [
					'px' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max'	=> 500
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-menu ul > li > a' => 'height: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}} !important;'
                ]
			]
		);

		$this->end_controls_section();

		//-----------------------------------menu bottom notice Styling-------------------------------------//
        $this->start_controls_section(
			'notice_styling',
			[
				'label'     => __( 'Notice Box Styling', 'medilax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'show_header_notice' => [ 'yes'] ],
			]
        );

		$this->add_control(
			'notice_color',
			[
				'label' 		=> __( 'Background Color', 'medixi' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-notice' => 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} [data-overlay="title"]::before' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

		//-----------------------------------wishlist Styling-------------------------------------//
        $this->start_controls_section(
			'wishlist_styling',
			[
				'label'     => __( 'Wishlist Styling', 'medilax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'wishlist_icon_color',
			[
				'label' 		=> __( 'Wishlist Icon Color', 'medixi' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wishlist_products_counter i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wishlist_icon_color_hover',
			[
				'label' 		=> __( 'Wishlist Icon Color On Hover', 'medixi' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wishlist_products_counter:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wishlist_icon_background_color',
			[
				'label' 		=> __( 'Wishlist Icon Background Color', 'medixi' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wishlist_products_counter.icon-btn i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wishlist_icon_background_color_hover',
			[
				'label' 		=> __( 'Wishlist Icon Background Color Hover', 'medixi' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wishlist_products_counter.icon-btn:hover i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wishlist_count_background',
			[
				'label' 		=> __( 'Wishlist Count Background Color', 'medixi' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wishlist_products_counter .badge' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->end_controls_section();

		//-----------------------------------wishlist Styling-------------------------------------//
        $this->start_controls_section(
			'cart_styling',
			[
				'label'     => __( 'Cart Styling', 'medilax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'cart_icon_color',
			[
				'label' 		=> __( 'Cart Icon Color', 'medixi' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart-btn i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'cart_icon_hover_color',
			[
				'label' 		=> __( 'Cart Icon Hover Color', 'medixi' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart-btn:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'cart_icon_backgroound_color',
			[
				'label' 		=> __( 'Cart Icon background Color', 'medixi' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart-btn i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'cart_icon_backgroound_hover_color',
			[
				'label' 		=> __( 'Cart Icon Background Hover Color', 'medixi' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart-btn:hover i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'cart_count_backgroound_color',
			[
				'label' 		=> __( 'Cart Count Background Color', 'medixi' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart-btn .badge' => 'background-color: {{VALUE}}',
				],
				'separator'		=> 'after',
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


	public function medilax_menu_select(){

	    $medilax_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu', 'medilax' );
	    foreach( $medilax_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		$medilax_avaiable_menu   = $this->medilax_menu_select();

		if( ! $medilax_avaiable_menu ){
			return;
		}

		$args = [
			'menu' 			=> $settings['medilax_menu_select'],
			'menu_class' 	=> 'medilax-menu',
			'container' 	=> '',
		];

        if( $settings['header_style'] == '1' ) {
        	echo '<div class="header-wrapper header-layout2">';

        	if( $settings['show_top_bar'] == 'yes' ){
		        echo '<!-- Header Top -->';
		        echo '<div class="header-top bg-title py-2 d-none d-md-block">';
		            echo '<div class="container py-1">';
		                echo '<div class="row justify-content-center justify-content-xl-between">';
		                    echo '<div class="col-auto">';
		                        echo '<ul class="header-top-info list-unstyled m-0">';
		                        	if( ! empty( $settings['location'] ) ){
			                            echo '<li><i class="far fa-map-marker-alt"></i>'.esc_html($settings['location']).'</li>';
			                        }
			                        if( ! empty( $settings['opening_time'] ) ){
			                            echo '<li><i class="far fa-clock"></i>'.esc_html($settings['opening_time']).'</li>';
			                        }
									

		                       	echo '</ul>';
		                    echo '</div>';
		                    echo '<div class="col-auto d-none d-xl-block">';
		                        echo '<ul class="head-top-links text-end">';
		                            if( ! empty( $settings['social_icon_list'] ) ){
			                            echo '<li>';
			                                echo '<ul class="header-social">';
			                                    foreach( $settings['social_icon_list'] as $social_icon ){

													$social_target 		= $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';

													$social_nofollow 	= $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

					                            	echo '<li><a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

														\Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

													echo '</a></li>';
												}
			                                echo '</ul>';
			                            echo '</li>';
			                        }
									if( class_exists( 'GTranslate' ) && $settings['show_language'] == 'yes' ){
			                            echo '<li>';
	                                        echo '<!-- Dropdown -->';
	                                        echo '<a class="dropdown-toggle" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fal fa-globe"></i>';
	                                            echo esc_html__( 'Language', 'medilax' );
	                                        echo '</a>';
	                                        echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">';
	                                        	echo '<li>';
	                                            	echo do_shortcode('[gtranslate]');
	                                            echo '</li>';
	                                        echo '</ul>';
	                                    echo '</li>';
			                        }
									if( $settings['show_search_icon'] == 'yes' ){
									   echo '<li>';
										   echo '<button type="submit" class="header-search-btn searchBoxTggler">'.esc_html__('Search', 'medilax').'<i class="far fa-search"></i></button>';
									   echo '</li>';
								   }
		                        echo '</ul>';
		                    echo '</div>';
		               echo ' </div>';
		            echo '</div>';
		        echo '</div>';
		    }
		        echo '<!-- Sticky Active -->';
		        echo '<div class="sticky-wrap">';
		            echo '<div class="sticky-active">';
		                echo '<!-- Header Main -->';
		                echo '<div class="header-main py-3 py-lg-0">';
		                    echo '<div class="container position-relative">';
		                        echo '<div class="row align-items-center justify-content-between">';
		                        	if( ! empty( $settings['logo_image']['url'] ) ){
			                            echo '<div class="col-auto d-flex">';
			                                echo '<div class="header2-logo">';
			                                    echo '<a href="'.esc_url( home_url( '/' ) ).'">';
			                                    echo medixi_img_tag( array(
													'url'	=> esc_url( $settings['logo_image']['url'] ),
													'class' => 'logo-img',
												) );
			                                    echo '</a>';
			                                echo '</div>';
			                            echo '</div>';
			                        }
		                            echo '<div class="col-auto">';
		                                echo '<nav class="main-menu menu-style2 d-none d-lg-block">';
		                                    if( ! empty( $settings['medilax_menu_select'] ) ){
												wp_nav_menu( $args );
											}
		                                echo '</nav>';
		                                echo '<button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>';
		                            echo '</div>';
		                            echo '<div class="col-auto d-none d-xl-block">';
		                                echo '<div class="header2-btn">';
											if( $settings['show_search'] == 'yes' ){
												echo '<a href="#" class="icon-btn style3 searchBoxTggler"><i class="far fa-search"></i></a>';
											}
											if( $settings['show_offcanvas'] == 'yes' ){
												echo '<a href="#" class="icon-btn style3 sideMenuToggler"><i class="far fa-bars"></i></a>';
											}
		                                    if( ! empty( $settings['button_text'] ) ){
		                                        echo '<a href="'.esc_url($settings['button_url']).'" class="vs-btn style2">'.esc_html($settings['button_text']).'</a>';
		                                    }
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        if( $settings['show_header_notice'] == 'yes' && $settings['header_notice'] !== '' ){
			        echo '<!-- Header Notice -->';
			        echo '<div class="header-note  d-none d-xl-block">';
				        echo '<div class="note-inner">';
				            echo '<div class="container container-style1">';
				                echo  wp_kses_post( $settings['header_notice'] );
				            echo '</div>';
				        echo '</div>';
			        echo '</div>';
			    }
		    echo '</div>';
        } elseif( $settings['header_style'] == '2' ) {
			echo '<div class="header-wrapper header-layout1">';

			if( $settings['show_top_bar'] == 'yes' ){
		        echo '<!-- Header Top -->';
		        echo '<div class="header-top bg-title py-2 d-none d-md-block">';
		            echo '<div class="container container-style1 py-1">';
		                echo '<div class="row justify-content-center justify-content-xl-between">';
		                    echo '<div class="col-auto">';
		                        echo '<ul class="header-top-info list-unstyled m-0">';
		                        	if( ! empty( $settings['contact_email'] ) ){
			                            echo '<li><i class="far fa-envelope"></i><a href="'.esc_url( 'mailto:'.$settings['contact_email'] ).'" class="text-reset">'.esc_html($settings['contact_email']).'</a></li>';
			                        }

		                            if( ! empty( $settings['location'] ) ){
			                            echo '<li><i class="far fa-map-marker-alt"></i>'.esc_html($settings['location']).'</li>';
			                        }

			                        if( ! empty( $settings['opening_time'] ) ){
			                            echo '<li><i class="far fa-clock"></i>'.esc_html($settings['opening_time']).'</li>';
			                        }

		                        echo '</ul>';
		                    echo '</div>';
		                    echo '<div class="col-auto d-none d-xl-block">';
		                        echo '<ul class="head-top-links text-end">';
		                            if( ! empty( $settings['social_icon_list'] ) ){
			                            echo '<li>';
			                                echo '<ul class="header-social">';
			                                    foreach( $settings['social_icon_list'] as $social_icon ){

													$social_target 		= $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';

													$social_nofollow 	= $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

					                            	echo '<li><a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

														\Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

													echo '</a></li>';
												}
			                                echo '</ul>';
			                            echo '</li>';
			                        }
									if( class_exists( 'GTranslate' ) && $settings['show_language'] == 'yes' ){
			                            echo '<li>';
	                                        echo '<!-- Dropdown -->';
	                                        echo '<a class="dropdown-toggle" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fal fa-globe"></i>';
	                                            echo esc_html__( 'Language', 'medilax' );
	                                        echo '</a>';
	                                        echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">';
	                                        	echo '<li>';
	                                            	echo do_shortcode('[gtranslate]');
	                                            echo '</li>';
	                                        echo '</ul>';
	                                    echo '</li>';
			                        }
			                        if( $settings['show_search_icon'] == 'yes' ){
			                            echo '<li>';
			                                echo '<button type="submit" class="header-search-btn searchBoxTggler">'.esc_html__('Search', 'medilax').'<i class="far fa-search"></i></button>';
			                            echo '</li>';
			                        }
		                        echo '</ul>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    }
		        echo '<!-- Sticky Active -->';
		        echo '<div class="sticky-wrap">';
		            echo '<div class="sticky-active">';
		                echo '<!-- Header Main -->';
		                echo '<div class="header-main">';
		                    echo '<div class="container container-style1 position-relative">';
		                        echo '<div class="row align-items-center justify-content-between">';
		                            echo '<div class="col-auto">';
		                            	if( ! empty( $settings['logo_image']['url'] ) ){
			                                echo '<div class="header1-logo">';
			                                    echo '<a href="'.esc_url( home_url( '/' ) ).'">';
			                                    echo medixi_img_tag( array(
													'url'	=> esc_url( $settings['logo_image']['url'] ),
													'class' => 'logo-img',
												) );
			                                    echo '</a>';
			                                echo '</div>';
				                        }
		                            echo '</div>';
		                            echo '<div class="col text-end text-lg-center">';
                                        echo '<nav class="main-menu menu-style1 d-none d-lg-block">';
                                            if( ! empty( $settings['medilax_menu_select'] ) ){
												wp_nav_menu( $args );
											}
                                        echo '</nav>';
	                                    echo '<button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>';
		                            echo '</div>';
                                    echo '<div class="col-auto gap-3 d-none d-lg-flex">';
										if( $settings['show_search'] == 'yes' ){
                                        	echo '<a href="#" class="icon-btn style3 searchBoxTggler"><i class="far fa-search"></i></a>';
										}
										if( $settings['show_offcanvas'] == 'yes' ){
											echo '<a href="#" class="icon-btn style3 sideMenuToggler"><i class="far fa-bars"></i></a>';
										}
                                    echo '</div>';
									echo '<div class="col-auto d-none-xxxl">';
										$hotline 		= $settings['hotline'];
										$replace        = array(' ','-',' - ');
										$with           = array('','','');
										$hoturl         = str_replace( $replace, $with, $hotline );
										if( ! empty( $settings['hotline'] ) ){
										   echo '<div class="header-call phone-box d-flex align-items-center style2">';
											    echo '<a href="tel:'.esc_attr( $hoturl ).'">';
												    echo '<span class="box-icon"><i class="fas fa-phone-alt"></i></span>';
											    echo '</a>';
											    echo '<div class="media-body">';
													if( ! empty( $settings['hotline_subtext'] ) ){
												   		echo '<span class="fs-xs text-title">'.esc_html( $settings['hotline_subtext'] ).'</span>';
													}
												    echo '<p class="h4 fw-bold lh-1 mb-0"><a href="tel:'.esc_url( $hoturl ).'">'.esc_html( $settings['hotline'] ).'</a></p>';
											    echo '</div>';
										    echo '</div>';
									    }
									echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        if( $settings['show_header_notice'] == 'yes' && $settings['header_notice'] !== '' ){
			        echo '<!-- Header Notice -->';
					echo '<div class="header-note  d-none d-xl-block">';
				        echo '<div class="note-inner">';
				            echo '<div class="container container-style1">';
				                echo  wp_kses_post( $settings['header_notice'] );
				            echo '</div>';
				        echo '</div>';
			        echo '</div>';
			    }
		    echo '</div>';
        }

		// Mobile Menu

        echo '<div class="vs-menu-wrapper">';
            echo '<div class="vs-menu-area text-center">';
                echo '<button class="vs-menu-toggle"><i class="fal fa-times"></i></button>';
                echo '<div class="mobile-logo">';
                    echo medixi_theme_logo();
                echo '</div>';
                echo '<form class="mobile-menu-form" action="'.esc_url( home_url( '/' ) ).'">';
                    echo '<input name="s" value="'.get_search_query().'" type="text" class="mobile-menu-form" placeholder="'.esc_attr__( 'Search....', 'medilax' ).'">';
                    echo '<button type="submit"><i class="fas fa-search"></i></button>';
                echo '</form>';

                if( has_nav_menu( 'mobile-menu' ) ){
                    echo '<div class="vs-mobile-menu">';
                        wp_nav_menu( array(
                            "theme_location"    => 'mobile-menu',
                            "container"         => '',
                            "menu_class"        => ''
                        ) );
                    echo '</div>';
                }

            echo '</div>';
        echo '</div>';

        // Search Popup
        echo '<div class="popup-search-box d-none d-lg-block">';
            echo '<button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>';
            echo '<form action="'.esc_url( home_url( '/' ) ).'">';
                echo '<input name="s" value="'.get_search_query().'" type="text" class="border-theme" placeholder="'.esc_attr__( 'What are you looking for', 'medilax' ).'">';
                echo '<button type="submit"><i class="fal fa-search"></i></button>';
            echo '</form>';
        echo '</div>';

        // Offcanvas Menu
		if( is_active_sidebar( 'medixi-offcanvas' ) ){
			echo '<div class="sidemenu-wrapper d-none d-lg-block  ">';
		        echo '<div class="sidemenu-content">';
		            echo '<button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>';
		           dynamic_sidebar( 'medixi-offcanvas' );
		        echo '</div>';
		    echo '</div>';
		}
	}
}