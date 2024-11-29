<?php
    /**
     * Class For Builder
     */
    class MedilaxBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'medilax_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'medilax-core',MEDILAX_PLUGDIRURI.'assets/js/medilax-core.js',array( 'jquery' ),'1.0',true );
		}


        public function medilax_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'medilax_header_option',
                [
                    'label'     => __( 'Header Option', 'medilax' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
			
			
            $page->add_control(
                'medilax_header_style',
                [
                    'label'     => __( 'Header Option', 'medilax' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'medilax' ),
    					'header_builder'       => __( 'Header Builder', 'medilax' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);
			
            $page->add_control(
                'medilax_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'medilax' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->medilax_header_choose_option(),
                    'condition' => [ 'medilax_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'medilax_footer_option',
                [
                    'label'     => __( 'Footer Option', 'medilax' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'medilax_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'medilax' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'medilax' ),
    				'label_off'     => __( 'No', 'medilax' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'medilax_footer_style',
                [
                    'label'     => __( 'Footer Style', 'medilax' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'medilax' ),
    					'footer_builder'       => __( 'Footer Builder', 'medilax' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'medilax_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'medilax_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'medilax' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->medilax_footer_choose_option(),
                    'condition' => [ 'medilax_footer_style' => 'footer_builder','medilax_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Medixi Builder', 'medilax' ),
            	esc_html__( 'Medixi Builder', 'medilax' ),
				'manage_options',
				'medilax',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('medilax', esc_html__('Footer Builder', 'medilax'), esc_html__('Footer Builder', 'medilax'), 'manage_options', 'edit.php?post_type=medilax_footer_build');
			add_submenu_page('medilax', esc_html__('Header Builder', 'medilax'), esc_html__('Header Builder', 'medilax'), 'manage_options', 'edit.php?post_type=medilax_header_build');
			add_submenu_page('medilax', esc_html__('Tab Builder', 'medilax'), esc_html__('Tab Builder', 'medilax'), 'manage_options', 'edit.php?post_type=medilax_tab_build');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','medilax' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'medilax' ),
				'singular_name'      => __( 'Footer', 'medilax' ),
				'menu_name'          => __( 'Medixi Footer Builder', 'medilax' ),
				'name_admin_bar'     => __( 'Footer', 'medilax' ),
				'add_new'            => __( 'Add New', 'medilax' ),
				'add_new_item'       => __( 'Add New Footer', 'medilax' ),
				'new_item'           => __( 'New Footer', 'medilax' ),
				'edit_item'          => __( 'Edit Footer', 'medilax' ),
				'view_item'          => __( 'View Footer', 'medilax' ),
				'all_items'          => __( 'All Footer', 'medilax' ),
				'search_items'       => __( 'Search Footer', 'medilax' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'medilax' ),
				'not_found'          => __( 'No Footer found.', 'medilax' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'medilax' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'medilax_footer_build', $args );

			$labels = array(
				'name'               => __( 'Header', 'medilax' ),
				'singular_name'      => __( 'Header', 'medilax' ),
				'menu_name'          => __( 'Medixi Header Builder', 'medilax' ),
				'name_admin_bar'     => __( 'Header', 'medilax' ),
				'add_new'            => __( 'Add New', 'medilax' ),
				'add_new_item'       => __( 'Add New Header', 'medilax' ),
				'new_item'           => __( 'New Header', 'medilax' ),
				'edit_item'          => __( 'Edit Header', 'medilax' ),
				'view_item'          => __( 'View Header', 'medilax' ),
				'all_items'          => __( 'All Header', 'medilax' ),
				'search_items'       => __( 'Search Header', 'medilax' ),
				'parent_item_colon'  => __( 'Parent Header:', 'medilax' ),
				'not_found'          => __( 'No Header found.', 'medilax' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'medilax' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'medilax_header_build', $args );

			$labels = array(
				'name'               => __( 'Tab', 'medilax' ),
				'singular_name'      => __( 'Tab', 'medilax' ),
				'menu_name'          => __( 'Medixi Header Builder', 'medilax' ),
				'name_admin_bar'     => __( 'Tab', 'medilax' ),
				'add_new'            => __( 'Add New', 'medilax' ),
				'add_new_item'       => __( 'Add New Tab', 'medilax' ),
				'new_item'           => __( 'New Header', 'medilax' ),
				'edit_item'          => __( 'Edit Tab', 'medilax' ),
				'view_item'          => __( 'View Tab', 'medilax' ),
				'all_items'          => __( 'All Header', 'medilax' ),
				'search_items'       => __( 'Search Tab', 'medilax' ),
				'parent_item_colon'  => __( 'Parent Tab:', 'medilax' ),
				'not_found'          => __( 'No Header found.', 'medilax' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'medilax' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'medilax_tab_build', $args );
		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'medilax_footer_build' == $post->post_type || 'medilax_header_build' == $post->post_type || 'medilax_tab_build' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function medilax_footer_choose_option(){

			$medilax_post_query = new WP_Query( array(
				'post_type'			=> 'medilax_footer_build',
				'posts_per_page'	    => -1,
			) );

			$medilax_builder_post_title = array();
			$medilax_builder_post_title[''] = __('Select a Footer','Medilax');

			while( $medilax_post_query->have_posts() ) {
				$medilax_post_query->the_post();
				$medilax_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $medilax_builder_post_title;

		}
		
		public function medilax_header_choose_option(){

			$medilax_post_query = new WP_Query( array(
				'post_type'			=> 'medilax_header_build',
				'posts_per_page'	    => -1,
			) );

			$medilax_builder_post_title = array();
			$medilax_builder_post_title[''] = __('Select a Header','Medilax');

			while( $medilax_post_query->have_posts() ) {
				$medilax_post_query->the_post();
				$medilax_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $medilax_builder_post_title;

        }

    }

    $builder_execute = new MedilaxBuilder();