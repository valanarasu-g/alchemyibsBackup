<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "medixi_opt";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }


    $alowhtml = array(
        'p' => array(
            'class' => array()
        ),
        'span' => array()
    );


    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Medixi Options', 'medixi' ),
        'page_title'           => esc_html__( 'Medixi Options', 'medixi' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'medixi' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'medixi' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'medixi' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'medixi' )
        )
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'medixi' );
    Redux::set_help_sidebar( $opt_name, $content );



    // -> START General Fields

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'medixi' ),
        'id'               => 'medixi_general',
        'customizer_width' => '450px',
        'icon'             => 'el el-cog',
        'fields'           => array(
            array(
                'id'       => 'medixi_theme_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Theme Color', 'medixi' )
            ),
            array(
                'id'       => 'medixi_secondary_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Secondary Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Secondary Theme Color', 'medixi' )
            ),
            array(
                'id'       => 'medixi_map_apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Map Api Key', 'medixi' ),
                'subtitle' => esc_html__( 'Set Map Api Key', 'medixi' ),
            ),
            
            array(
                'id'          => 'title_typography',
                'type'        => 'typography', 
                'title'       => __( 'Title Typography', 'medixi' ),
                'google'      => true, 
                'font-backup' => true,
                'output'      => array('
                    h1, h2, h3, h4, h5, h6,.h1, .h2, .h3, .h4, .h5, .h6,ul.wp-block-latest-posts a,
                    .related-products-title,
                    .review-form .comment-respond .blog-inner-title,
                    .woocommerce-Reviews-title,
                    .sec-subtitle3,
                    .sec-subtitle2,
                    .font-title,
                    .widgettitle,
                    .sidebar-area .wp-block-group__inner-container > h2,
                    .widget_search .wp-block-search__label:not(.screen-reader-text),
                    .widget_title,
                    .widget_recent_entries ul li > a,
                    .header-links li,
                    .breadcumb-menu li,
                    .breadcumb-menu a,
                    .breadcumb-menu span,
                    .share-links-title,
                    .blog-single .blog-inner-author,
                    .woocommerce-Reviews .form-title,
                    .woocommerce-grouped-product-list.group_table .quantity label,
                    .product-tag1,
                    .cart_table td:before,
                    .cart_table th,
                    .tinv-wishlist th,
                    .tinv-wishlist td.product-name,
                    .tinv-wishlist .social-buttons > span
                '),
                'units'       =>'px',
                'subtitle'    => __('Typography option with each property can be called individually.', 'medixi'),
            ),
            array(
                'id'          => 'body_typography',
                'type'        => 'typography', 
                'title'       => __( 'Body Typography', 'medixi' ),
                'google'      => true, 
                'font-backup' => true,
                'output'      => array('
                    body,
                    label,
                    .vs-btn,
                    .font-body,
                    .widget_rss ul cite,
                    .main-menu a,
                    .vs-pagination span,
                    .vs-pagination a,
                    .vs-product .added_to_cart,
                    .cart_table .cart-productname,
                    p
                '),
                'units'       =>'px',
                'subtitle'    => __('Typography option with each property can be called individually.', 'medixi'),
            ),
        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Back To Top', 'medixi' ),
        'id'               => 'medixi_backtotop',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'medixi_display_bcktotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Back To Top Button', 'medixi' ),
                'subtitle' => esc_html__( 'Switch On to Display back to top button.', 'medixi' ),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'medixi' ),
                'off'      => esc_html__( 'Disabled', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_custom_bcktotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Custom Back To Top Button', 'medixi' ),
                'subtitle' => esc_html__( 'If you select "Disabled", it will show default design for "back to top" button.', 'medixi' ),
                'default'  => false,
                'on'       => esc_html__( 'Enabled', 'medixi' ),
                'off'      => esc_html__( 'Disabled', 'medixi' ),
                'required' => array('medixi_display_bcktotop','equals','1'),
            ),
            array(
                'id'       => 'medixi_custom_bcktotop_icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom Back To Top Button Icon', 'medixi'),
                'subtitle' => esc_html__( 'Write Icon Class Here', 'medixi'),
                'required' => array( 'medixi_custom_bcktotop', 'equals', '1' ),
            ),
            array(
                'id'       => 'medixi_bcktotop_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Back To Top Button Background Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Back to top button Background Color.', 'medixi' ),
                'required' => array('medixi_display_bcktotop','equals','1'),
                'output'   => array( 'background-color' =>'.scrollToTop' ),
            ),
            array(
                'id'       => 'medixi_bcktotop_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Back To Top Icon Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Back to top Icon Color.', 'medixi' ),
                'required' => array('medixi_display_bcktotop','equals','1'),
                'output'   => array( '.scrollToTop i' ),
            ),
            array(
                'id'       => 'medixi_bcktotop_border_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Back To Top Button Border Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Back to top button border Color.', 'medixi' ),
                'required' => array('medixi_display_bcktotop','equals','1'),
                'output'   => array( 'border-color' =>'.border-before-theme:before' ),
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Preloader', 'medixi' ),
        'id'               => 'medixi_preloader',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'medixi_display_preloader',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'medixi' ),
                'subtitle' => esc_html__( 'Switch Enabled to Display Preloader.', 'medixi' ),
                'default'  => true,
                'on'       => esc_html__('Enabled','medixi'),
                'off'      => esc_html__('Disabled','medixi'),
            ),
        )
    ));

    /* End General Fields */

    /* Admin Lebel Fields */
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Admin Label', 'medixi' ),
        'id'                => 'medixi_admin_label',
        'customizer_width'  => '450px',
        'subsection'        => true,
        'fields'            => array(
            array(
                'title'     => esc_html__( 'Admin Login Logo', 'medixi' ),
                'subtitle'  => esc_html__( 'It belongs to the back-end of your website to log-in to admin panel.', 'medixi' ),
                'id'        => 'medixi_admin_login_logo',
                'type'      => 'media',
            ),
            array(
                'title'     => esc_html__( 'Custom CSS For admin', 'medixi' ),
                'subtitle'  => esc_html__( 'Any CSS your write here will run in admin.', 'medixi' ),
                'id'        => 'medixi_theme_admin_custom_css',
                'type'      => 'ace_editor',
                'mode'      => 'css',
                'theme'     => 'chrome',
                'full_width'=> true,
            ),
        ),
    ) );

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'medixi' ),
        'id'               => 'medixi_header',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card',
        'fields'           => array(
            array(
                'id'       => 'medixi_header_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"   => esc_html__('Prebuilt','medixi'),
                    "2"      => esc_html__('Header Builder','medixi'),
                ),
                'title'    => esc_html__( 'Header Options', 'medixi' ),
                'subtitle' => esc_html__( 'Select header options.', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_header_select_options',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     => array(
                    'post_type'     => 'medilax_header_build'
                ),
                'title'    => esc_html__( 'Header', 'medixi' ),
                'subtitle' => esc_html__( 'Select header.', 'medixi' ),
                'required' => array( 'medixi_header_options', 'equals', '2' )
            ),
            array(
                'id'       => 'medixi_header_topbar_switcher',
                'type'     => 'switch',
                'default'  => '0',
                'on'       => esc_html__( 'Show', 'medixi' ),
                'off'      => esc_html__( 'Hide', 'medixi' ),
                'title'    => esc_html__( 'Header Topbar?', 'medixi' ),
                'subtitle' => esc_html__( 'Control Header Topbar By Show Or Hide System.', 'medixi'),
                'required' => array( 'medixi_header_options', 'equals', '1' )
            ),
            array(
                'id'       => 'medixi_topbar_address',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Office Address', 'medixi' ),
                'subtitle' => esc_html__( 'Write Office Address Here', 'medixi' ),
                'required' => array( 'medixi_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'medixi_topbar_offcie_hour',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Office Hour', 'medixi' ),
                'subtitle' => esc_html__( 'Write Office Hour Here', 'medixi' ),
                'required' => array( 'medixi_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'medixi_language_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'medixi' ),
                'off'      => esc_html__( 'Hide', 'medixi' ),
                'title'    => esc_html__( 'Language?', 'medixi' ),
                'subtitle' => esc_html__( 'Show Or Hide Language Switcher?', 'medixi'),
                'required' => array( 'medixi_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'medixi_search_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'medixi' ),
                'off'      => esc_html__( 'Hide', 'medixi' ),
                'title'    => esc_html__( 'Search?', 'medixi' ),
                'subtitle' => esc_html__( 'Show Or Hide Search Switcher?', 'medixi'),
                'required' => array( 'medixi_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'medixi_header_topbar_social_icon_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'medixi' ),
                'off'      => esc_html__( 'Hide', 'medixi' ),
                'title'    => esc_html__( 'Header Social Icon?', 'medixi' ),
                'subtitle' => esc_html__( 'Click Show To Display Social Icon?', 'medixi'),
                'required' => array( 'medixi_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'medixi_header_social_icon_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Social Icon Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Header Social Icon Color', 'medixi' ),
                'output'   => array( 'color'    =>  '.header-social li a i' ),
                'required' => array( 'medixi_header_topbar_social_icon_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'medixi_topbar_section_divider',
                'type'     => 'divide',
            ),

            array(
                'id'       => 'medixi_header_wishlist_icon_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'medixi' ),
                'off'      => esc_html__( 'Hide', 'medixi' ),
                'title'    => esc_html__( 'Header Wishlist?', 'medixi' ),
                'subtitle' => esc_html__( 'Click Show To Display Wishlist?', 'medixi'),
            ),
            array(
                'id'       => 'medixi_header_cart_icon_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'medixi' ),
                'off'      => esc_html__( 'Hide', 'medixi' ),
                'title'    => esc_html__( 'Header Cart?', 'medixi' ),
                'subtitle' => esc_html__( 'Click Show To Display Cart?', 'medixi'),
            ),
            array(
                'id'       => 'medixi_btn_text',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Button Text', 'medixi' ),
                'subtitle' => esc_html__( 'Set Button Text', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_btn_url',
                'type'     => 'text',
                'title'    => esc_html__( 'Button URL?', 'medixi' ),
                'subtitle' => esc_html__( 'Set Button URL Here', 'medixi' ),
            ),
        ),
    ) );
    // -> START Header Logo
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Logo', 'medixi' ),
        'id'               => 'medixi_header_logo_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'medixi_site_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'medixi' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your site logo for header ( recommendation png format ).', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_site_logo_dimensions',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Dimensions (Width/Height).', 'medixi'),
                'output'   => array('.header-logo .logo img'),
                'subtitle' => esc_html__('Set logo dimensions to choose width, height, and unit.', 'medixi'),
            ),
            array(
                'id'       => 'medixi_site_logomargin_dimensions',
                'type'     => 'spacing',
                'mode'     => 'margin',
                'output'   => array('.header-logo .logo img'),
                'units_extended' => 'false',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Top and Bottom Margin.', 'medixi'),
                'left'     => false,
                'right'    => false,
                'subtitle' => esc_html__('Set logo top and bottom margin.', 'medixi'),
                'default'            => array(
                    'units'           => 'px'
                )
            ),
            array(
                'id'       => 'medixi_text_title',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Text Logo', 'medixi' ),
                'subtitle' => esc_html__( 'Write your logo text use as logo ( You can use span tag for text color ).', 'medixi' ),
            )
        )
    ) );
    // -> End Header Logo

    // -> START Header Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Menu', 'medixi' ),
        'id'               => 'medixi_header_menu_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'medixi_header_menu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Menu Color', 'medixi' ),
                'output'   => array( 'color'    =>  '.menu-style1 > ul > li > a' ),
            ),
            array(
                'id'       => 'medixi_header_menu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Hover Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Menu Hover Color', 'medixi' ),
                'output'   => array( 'color'    =>  '.menu-style1 > ul > li > a:hover' ),
            ),
            array(
                'id'       => 'medixi_header_submenu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Submenu Color', 'medixi' ),
                'output'   => array( 'color'    =>  '.main-menu ul li ul.sub-menu li a' ),
            ),
            array(
                'id'       => 'medixi_header_submenu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Hover Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Submenu Hover Color', 'medixi' ),
                'output'   => array( 'color'    =>  '.main-menu ul li ul.sub-menu li a:hover' ),
            ),
            array(
                'id'       => 'medixi_header_submenu_icon_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Icon Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Submenu Icon Color', 'medixi' ),
                'output'   => array( 'color'    =>  '.main-menu ul li ul.sub-menu li a:after' ),
            ),
            array(
                'id'       => 'medixi_header_submenu_border_top_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Border Top Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Submenu Border Top Color', 'medixi' ),
                'output'   => array( 'border-top-color'    =>  '.main-menu ul.sub-menu' ),
            ),
        )
    ) );
    // -> End Header Menu

     // -> START Mobile Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Offcanvas', 'medixi' ),
        'id'               => 'medixi_offcanvas_panel',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'medixi_offcanvas_panel_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Offcanvas Panel Background', 'medixi' ),
                'output'   => array('.sidemenu-wrapper .sidemenu-content'),
                'subtitle' => esc_html__( 'Set Offcanvas Panel Background Color', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_offcanvas_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Offcanvas Title Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Offcanvas Title color.', 'medixi' ),
                'output'   => array( '.sidemenu-content h3.sidebox-title' )
            ),
        )
    ) );
    // -> End Mobile Menu

    // -> START Blog Page
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog', 'medixi' ),
        'id'         => 'medixi_blog_page',
        'icon'  => 'el el-blogger',
        'fields'     => array(

            array(
                'id'       => 'medixi_blog_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'medixi' ),
                'subtitle' => esc_html__( 'Choose blog layout from here. If you use this option then you will able to change three type of blog layout ( Default Left Sidebar Layour ). ', 'medixi' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','medixi'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'medixi_blog_grid',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Post Column', 'medixi' ),
                'subtitle' => esc_html__( 'Select your blog post column from here. If you use this option then you will able to select three type of blog post layout ( Default Two Column ).', 'medixi' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','medixi'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/1column.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2column.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3column.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'medixi_blog_page_title_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__('Show','medixi'),
                'off'      => esc_html__('Hide','medixi'),
                'title'    => esc_html__('Blog Page Title', 'medixi'),
                'subtitle' => esc_html__('Control blog page title show / hide. If you use this option then you will able to show / hide your blog page title ( Default Setting Show ).', 'medixi'),
            ),
            array(
                'id'       => 'medixi_blog_page_title_setting',
                'type'     => 'button_set',
                'title'    => esc_html__('Blog Page Title Setting', 'medixi'),
                'subtitle' => esc_html__('Control blog page title setting. If you use this option then you can able to show default or custom blog page title ( Default Blog ).', 'medixi'),
                'options'  => array(
                    "predefine"   => esc_html__('Default','medixi'),
                    "custom"      => esc_html__('Custom','medixi'),
                ),
                'default'  => 'predefine',
                'required' => array("medixi_blog_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'medixi_blog_page_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Custom Title', 'medixi'),
                'subtitle' => esc_html__('Set blog page custom title form here. If you use this option then you will able to set your won title text.', 'medixi'),
                'required' => array('medixi_blog_page_title_setting','equals','custom')
            ),
            array(
                'id'            => 'medixi_blog_postExcerpt',
                'type'          => 'slider',
                'title'         => esc_html__('Blog Posts Excerpt', 'medixi'),
                'subtitle'      => esc_html__('Control the number of characters you want to show in the blog page for each post.. If you use this option then you can able to control your blog post characters from here ( Default show 10 ).', 'medixi'),
                "default"       => 46,
                "min"           => 0,
                "step"          => 1,
                "max"           => 100,
                'resolution'    => 1,
                'display_value' => 'text',
            ),
            array(
                'id'       => 'medixi_blog_readmore_setting',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Read More Text Setting', 'medixi' ),
                'subtitle' => esc_html__( 'Control read more text from here.', 'medixi' ),
                'options'  => array(
                    "default"   => esc_html__('Default','medixi'),
                    "custom"    => esc_html__('Custom','medixi'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'       => 'medixi_blog_custom_readmore',
                'type'     => 'text',
                'title'    => esc_html__('Read More Text', 'medixi'),
                'subtitle' => esc_html__('Set read moer text here. If you use this option then you will able to set your won text.', 'medixi'),
                'required' => array('medixi_blog_readmore_setting','equals','custom')
            ),
            array(
                'id'       => 'medixi_blog_title_color',
                'output'   => array( '.vs-blog .blog-title a'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Blog Title Color.', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_blog_title_hover_color',
                'output'   => array( '.vs-blog .blog-title a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Hover Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Blog Title Hover Color.', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_blog_contant_color',
                'output'   => array( '.blog-content p'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Excerpt / Content Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Blog Excerpt / Content Color.', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_blog_read_more_button_color',
                'output'   => array( '.blog-content .link-btn'),
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Read More Button Color.', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_blog_read_more_button_hover_color',
                'output'   => array( '.blog-content .link-btn:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Hover Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Read More Button Hover Color.', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_blog_pagination_color',
                'output'   => array( '.pagination li a,.pagination a i'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Color', 'medixi'),
                'subtitle' => esc_html__('Set Blog Pagination Color.', 'medixi'),
            ),
            array(
                'id'       => 'medixi_blog_pagination_active_color',
                'output'   => array( '.pagination li span.current'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Active Color', 'medixi'),
                'subtitle' => esc_html__('Set Blog Pagination Active Color.', 'medixi'),
                'required'  => array('medixi_blog_pagination', '=', '1')
            ),
            array(
                'id'       => 'medixi_blog_pagination_hover_color',
                'output'   => array( '.pagination li a:hover,.pagination a i:hover'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Hover Color', 'medixi'),
                'subtitle' => esc_html__('Set Blog Pagination Hover Color.', 'medixi'),
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Blog Page', 'medixi' ),
        'id'         => 'medixi_post_detail_styles',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'medixi_blog_single_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'medixi' ),
                'subtitle' => esc_html__( 'Choose blog single page layout from here. If you use this option then you will able to change three type of blog single page layout ( Default Left Sidebar Layour ). ', 'medixi' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','medixi'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'medixi_post_details_title_position',
                'type'     => 'button_set',
                'default'  => 'header',
                'options'  => array(
                    'header'        => esc_html__('On Header','medixi'),
                    'below'         => esc_html__('Below Thumbnail','medixi'),
                ),
                'title'    => esc_html__('Blog Post Title Position', 'medixi'),
                'subtitle' => esc_html__('Control blog post title position from here.', 'medixi'),
            ),
            array(
                'id'       => 'medixi_post_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Details Custom Title', 'medixi'),
                'subtitle' => esc_html__('This title will show in Breadcrumb title.', 'medixi'),
                'required' => array('medixi_post_details_title_position','equals','below')
            ),
            array(
                'id'       => 'medixi_display_post_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'medixi' ),
                'subtitle' => esc_html__( 'Switch On to Display Tags.', 'medixi' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','medixi'),
                'off'       => esc_html__('Disabled','medixi'),
            ),
            array(
                'id'       => 'medixi_post_details_share_options',
                'type'     => 'switch',
                'title'    => esc_html__('Share Options', 'medixi'),
                'subtitle' => esc_html__('Control post share options from here. If you use this option then you will able to show or hide post share options.', 'medixi'),
                'on'        => esc_html__('Show','medixi'),
                'off'       => esc_html__('Hide','medixi'),
                'default'   => '0',
            ),
            array(
                'id'       => 'medixi_post_details_author_desc_trigger',
                'type'     => 'switch',
                'title'    => esc_html__('Biography Info', 'medixi'),
                'subtitle' => esc_html__('Control biography info from here. If you use this option then you will able to show or hide biography info ( Default setting Show ).', 'medixi'),
                'on'        => esc_html__('Show','medixi'),
                'off'       => esc_html__('Hide','medixi'),
                'default'   => '0',
            ),
            array(
                'id'       => 'medixi_post_details_post_navigation',
                'type'     => 'switch',
                'title'    => esc_html__('Post Navigation', 'medixi'),
                'subtitle' => esc_html__('Control post navigation from here. If you use this option then you will able to show or hide post navigation ( Default setting Show ).', 'medixi'),
                'on'        => esc_html__('Show','medixi'),
                'off'       => esc_html__('Hide','medixi'),
                'default'   => true,
            ),
            array(
                'id'       => 'medixi_post_details_related_post',
                'type'     => 'switch',
                'title'    => esc_html__('Related Post', 'medixi'),
                'subtitle' => esc_html__('Control related post from here. If you use this option then you will able to show or hide related post ( Default setting Show ).', 'medixi'),
                'on'        => esc_html__('Show','medixi'),
                'off'       => esc_html__('Hide','medixi'),
                'default'   => false,
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Meta Data', 'medixi' ),
        'id'         => 'medixi_common_meta_data',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'medixi_blog_meta_icon_color',
                'output'   => array( '.blog-meta span i'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Meta Icon Color', 'medixi'),
                'subtitle' => esc_html__('Set Blog Meta Icon Color.', 'medixi'),
            ),
            array(
                'id'       => 'medixi_blog_meta_text_color',
                'output'   => array( '.blog-meta a,.blog-meta span'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Text Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Blog Meta Text Color.', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_blog_meta_text_hover_color',
                'output'   => array( '.blog-meta a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Hover Text Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Blog Meta Hover Text Color.', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_display_post_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Date', 'medixi' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Date.', 'medixi' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','medixi'),
                'off'       => esc_html__('Disabled','medixi'),
            ),
            array(
                'id'       => 'medixi_display_post_views',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Views', 'medixi' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Views.', 'medixi' ),
                'default'  => true,
                'on'        => esc_html__( 'Enabled', 'medixi'),
                'off'       => esc_html__( 'Disabled', 'medixi'),
            ),
            array(
                'id'       => 'medixi_display_post_comment',
                'type'     => 'switch',
                'title'    => esc_html__( 'Comment Count', 'medixi' ),
                'subtitle' => esc_html__( 'Switch On to Display Comment Count.', 'medixi' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','medixi'),
                'off'       => esc_html__('Disabled','medixi'),
            ),
            array(
                'id'       => 'medixi_display_post_category',
                'type'     => 'switch',
                'title'    => esc_html__( 'Category', 'medixi' ),
                'subtitle' => esc_html__( 'Switch On to Display Category.', 'medixi' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','medixi'),
                'off'       => esc_html__('Disabled','medixi'),
            ),
        )
    ));

    /* End blog Page */

    // -> START Page Option
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page', 'medixi' ),
        'id'         => 'medixi_page_page',
        'icon'  => 'el el-file',
        'fields'     => array(
            array(
                'id'       => 'medixi_page_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Select layout', 'medixi' ),
                'subtitle' => esc_html__( 'Choose your page layout. If you use this option then you will able to choose three type of page layout ( Default no sidebar ). ', 'medixi' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','medixi'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'medixi_page_layoutopt',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Settings', 'medixi'),
                'subtitle' => esc_html__('Set page sidebar. If you use this option then you will able to set three type of sidebar ( Default no sidebar ).', 'medixi'),
                //Must provide key => value pairs for options
                'options' => array(
                    '1' => esc_html__( 'Page Sidebar', 'medixi' ),
                    '2' => esc_html__( 'Blog Sidebar', 'medixi' )
                 ),
                'default' => '1',
                'required'  => array('medixi_page_sidebar','!=','1')
            ),
            array(
                'id'       => 'medixi_page_title_switcher',
                'type'     => 'switch',
                'title'    => esc_html__('Title', 'medixi'),
                'subtitle' => esc_html__('Switch enabled to display page title. Fot this option you will able to show / hide page title.  Default setting Enabled', 'medixi'),
                'default'  => '1',
                'on'        => esc_html__('Enabled','medixi'),
                'off'       => esc_html__('Disabled','medixi'),
            ),
            array(
                'id'       => 'medixi_page_title_tag',
                'type'     => 'select',
                'options'  => array(
                    'h1'        => esc_html__('H1','medixi'),
                    'h2'        => esc_html__('H2','medixi'),
                    'h3'        => esc_html__('H3','medixi'),
                    'h4'        => esc_html__('H4','medixi'),
                    'h5'        => esc_html__('H5','medixi'),
                    'h6'        => esc_html__('H6','medixi'),
                ),
                'default'  => 'h1',
                'title'    => esc_html__( 'Title Tag', 'medixi' ),
                'subtitle' => esc_html__( 'Select page title tag. If you use this option then you can able to change title tag H1 - H6 ( Default tag H1 )', 'medixi' ),
                'required' => array("medixi_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'medixi_allHeader_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Title Color', 'medixi' ),
                'subtitle' => esc_html__( 'Set Title Color', 'medixi' ),
                'output'   => array( 'color' => '.breadcumb-title' ),
            ),
            array(
                'id'       => 'marino_allHeader_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background', 'marino' ),
                'output'   => array('.breadcumb-wrapper'),
                'subtitle' => esc_html__( 'Setting page header background. If you use this option then you will able to set Background Color, Background Image, Background Repeat, Background Size, Background Attachment, Background Position.', 'marino' ),
            ),
            array(
                'id'       => 'medixi_enable_breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__( 'Breadcrumb Hide/Show', 'medixi' ),
                'subtitle' => esc_html__( 'Hide / Show breadcrumb from all pages and posts ( Default settings hide ).', 'medixi' ),
                'default'  => '1',
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'medixi_allHeader_breadcrumbtextcolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Color', 'medixi' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text color here.If you user this option then you will able to set page breadcrumb color.', 'medixi' ),
                'required' => array("medixi_page_title_switcher","equals","1"),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li a' ),
            ),
            array(
                'id'       => 'medixi_allHeader_breadcrumbtextactivecolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Active Color', 'medixi' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text active color here.If you user this option then you will able to set page breadcrumb active color.', 'medixi' ),
                'required' => array( "medixi_page_title_switcher", "equals", "1" ),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li:last-child' ),
            ),
            array(
                'id'       => 'medixi_allHeader_dividercolor',
                'type'     => 'color',
                'output'   => array( 'color'=>'.breadcumb-wrapper .breadcumb-content ul li:after' ),
                'title'    => esc_html__( 'Breadcrumb Divider Color', 'medixi' ),
                'subtitle' => esc_html__( 'Choose breadcrumb divider color.', 'medixi' ),
            ),
        ),
    ) );
    /* End Page option */

    // -> START 404 Page

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 Page', 'medixi' ),
        'id'         => 'medixi_404_page',
        'icon'       => 'el el-ban-circle',
        'fields'     => array(
            array(
               'id'       => 'medixi_404_image',
               'type'     => 'media',
               'compiler' => true,
               'title'    => esc_html__( '404 Image', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_fof_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Title', 'medixi' ),
                'subtitle' => esc_html__( 'Set Page Title', 'medixi' ),
                'default'  => esc_html__( '404', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_fof_subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Subtitle', 'medixi' ),
                'subtitle' => esc_html__( 'Set Page Subtitle ', 'medixi' ),
                'default'  => esc_html__( 'The page you\'ve requested is not available.', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_fof_btn_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Button Text', 'medixi' ),
                'subtitle' => esc_html__( 'Set Button Text ', 'medixi' ),
                'default'  => esc_html__( 'Return To Home', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_fof_text_color',
                'type'     => 'color',
                'output'   => array( '.vs-error-wrapper h2' ),
                'title'    => esc_html__( 'Title Color', 'medixi' ),
                'subtitle' => esc_html__( 'Pick a title color', 'medixi' ),
                'validate' => 'color'
            ),
            array(
                'id'       => 'medixi_fof_subtitle_color',
                'type'     => 'color',
                'output'   => array( '.vs-error-wrapper p' ),
                'title'    => esc_html__( 'Subtitle Color', 'medixi' ),
                'subtitle' => esc_html__( 'Pick a subtitle color', 'medixi' ),
                'validate' => 'color'
            ),
            array(
                'id'       => 'medixi_fof_btn_color',
                'type'     => 'color',
                'output'   => array( '.vs-btn.gradient-btn' ),
                'title'    => esc_html__('Button Color', 'medixi'),
                'subtitle' => esc_html__('Pick Button Color', 'medixi'),
                'validate' => 'color'
            ),
            array(
                'id'       => 'medixi_fof_btn_color_hover',
                'type'     => 'color',
                'output'   => array( '.vs-btn.gradient-btn:hover' ),
                'title'    => esc_html__( 'Button Hover Color', 'medixi'),
                'subtitle' => esc_html__( 'Pick Button Hover Color', 'medixi'),
                'validate' => 'color'
            ),
        ),
    ) );

    /* End 404 Page */
    // -> START Woo Page Option

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Woocommerce Page', 'medixi' ),
        'id'         => 'medixi_woo_page_page',
        'icon'  => 'el el-shopping-cart',
        'fields'     => array(
            array(
                'id'       => 'medixi_woo_shoppage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Set Shop Page Sidebar.', 'medixi' ),
                'subtitle' => esc_html__( 'Choose shop page sidebar', 'medixi' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','medixi'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'medixi_woo_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Column', 'medixi' ),
                'subtitle' => esc_html__( 'Set your woocommerce product column.', 'medixi' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '2' => array(
                        'alt' => esc_attr__('2 Columns','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('3 Columns','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '4' => array(
                        'alt' => esc_attr__('4 Columns','medixi'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '5' => array(
                        'alt' => esc_attr__('5 Columns','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/5col.png')
                    ),
                    '6' => array(
                        'alt' => esc_attr__('6 Columns','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),
                    '5' => array(
                        'alt' => esc_attr__('5 Columns','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/5col.png')
                    ),
                    '6' => array(
                        'alt' => esc_attr__('6 Columns','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),),
                'default'  => '3'
            ),
			array(
                'id'       => 'medixi_woo_product_perpage',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Per Page', 'medixi' ),
				'default' => '10'
            ),
            array(
                'id'       => 'medixi_woo_singlepage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Single Page sidebar', 'medixi' ),
                'subtitle' => esc_html__( 'Choose product single page sidebar.', 'medixi' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','medixi'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'medixi_product_details_title_position',
                'type'     => 'button_set',
                'default'  => 'below',
                'options'  => array(
                    'header'        => esc_html__('On Header','medixi'),
                    'below'         => esc_html__('Below Thumbnail','medixi'),
                ),
                'title'    => esc_html__('Product Details Title Position', 'medixi'),
                'subtitle' => esc_html__('Control product details title position from here.', 'medixi'),
            ),
            array(
                'id'       => 'medixi_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'medixi' ),
                'default'  => esc_html__( 'Shop Details', 'medixi' ),
                'required' => array('medixi_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'medixi_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'medixi' ),
                'default'  => esc_html__( 'Shop Details', 'medixi' ),
                'required' => array('medixi_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'medixi_woo_relproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related product Hide/Show', 'medixi' ),
                'subtitle' => esc_html__( 'Hide / Show related product in single page (Default Settings Show)', 'medixi' ),
                'default'  => '1',
                'on'       => esc_html__('Show','medixi'),
                'off'      => esc_html__('Hide','medixi')
            ),
			array(
                'id'       => 'medixi_woo_relproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products number', 'medixi' ),
                'subtitle' => esc_html__( 'Set how many related products you want to show in single product page.', 'medixi' ),
                'default'  => 3,
                'required' => array('medixi_woo_relproduct_display','equals',true)
            ),

            array(
                'id'       => 'medixi_woo_related_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Related Product Column', 'medixi' ),
                'subtitle' => esc_html__( 'Set your woocommerce related product column.', 'medixi' ),
                'required' => array('medixi_woo_relproduct_display','equals',true),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','medixi'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'medixi_woo_upsellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Upsell product Hide/Show', 'medixi' ),
                'subtitle' => esc_html__( 'Hide / Show upsell product in single page (Default Settings Show)', 'medixi' ),
                'default'  => '1',
                'on'       => esc_html__('Show','medixi'),
                'off'      => esc_html__('Hide','medixi'),
            ),
            array(
                'id'       => 'medixi_woo_upsellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Upsells products number', 'medixi' ),
                'subtitle' => esc_html__( 'Set how many upsells products you want to show in single product page.', 'medixi' ),
                'default'  => 3,
                'required' => array('medixi_woo_upsellproduct_display','equals',true),
            ),

            array(
                'id'       => 'medixi_woo_upsell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Upsells Product Column', 'medixi' ),
                'subtitle' => esc_html__( 'Set your woocommerce upsell product column.', 'medixi' ),
                'required' => array('medixi_woo_upsellproduct_display','equals',true),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','medixi'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'medixi_woo_crosssellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross sell product Hide/Show', 'medixi' ),
                'subtitle' => esc_html__( 'Hide / Show cross sell product in single page (Default Settings Show)', 'medixi' ),
                'default'  => '1',
                'on'       => esc_html__( 'Show', 'medixi' ),
                'off'      => esc_html__( 'Hide', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_woo_crosssellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Cross sell products number', 'medixi' ),
                'subtitle' => esc_html__( 'Set how many cross sell products you want to show in single product page.', 'medixi' ),
                'default'  => 3,
                'required' => array('medixi_woo_crosssellproduct_display','equals',true),
            ),

            array(
                'id'       => 'medixi_woo_crosssell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Cross sell Product Column', 'medixi' ),
                'subtitle' => esc_html__( 'Set your woocommerce cross sell product column.', 'medixi' ),
                'required' => array( 'medixi_woo_crosssellproduct_display', 'equals', true ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','medixi'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','medixi'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','medixi'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
        ),
    ) );

    /* End Woo Page option */
    // -> START Gallery
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Gallery', 'medixi' ),
        'id'         => 'medixi_gallery_widget',
        'icon'       => 'el el-gift',
        'fields'     => array(
            array(
                'id'          => 'medixi_gallery_image_widget',
                'type'        => 'slides',
                'title'       => esc_html__('Add Gallery Image', 'medixi'),
                'subtitle'    => esc_html__('Add gallery Image and url.', 'medixi'),
                'show'        => array(
                    'title'          => false,
                    'description'    => false,
                    'progress'       => false,
                    'icon'           => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => true,
                ),
            ),
        ),
    ) );
    // -> START Subscribe
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Subscribe', 'medixi' ),
        'id'         => 'medixi_subscribe_page',
        'icon'       => 'el el-eject',
        'fields'     => array(

            array(
                'id'       => 'medixi_subscribe_apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp API Key', 'medixi' ),
                'subtitle' => esc_html__( 'Set mailchimp api key.', 'medixi' ),
            ),
            array(
                'id'       => 'medixi_subscribe_listid',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp List ID', 'medixi' ),
                'subtitle' => esc_html__( 'Set mailchimp list id.', 'medixi' ),
            ),
        ),
    ) );

    /* End Subscribe */

    // -> START Social Media

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social', 'medixi' ),
        'id'         => 'medixi_social_media',
        'icon'      => 'el el-globe',
        'desc'      => esc_html__( 'Social', 'medixi' ),
        'fields'     => array(
            array(
                'id'          => 'medixi_social_links',
                'type'        => 'slides',
                'title'       => esc_html__('Social Profile Links', 'medixi'),
                'subtitle'    => esc_html__('Add social icon and url.', 'medixi'),
                'show'        => array(
                    'title'          => true,
                    'description'    => true,
                    'progress'       => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => false,
                ),
                'placeholder'   => array(
                    'icon'          => esc_html__( 'Icon (example: fa fa-facebook) ','medixi'),
                    'title'         => esc_html__( 'Social Icon Class', 'medixi' ),
                    'description'   => esc_html__( 'Social Icon Title', 'medixi' ),
                ),
            ),
        ),
    ) );

    /* End social Media */


    // -> START Footer Media
    Redux::setSection( $opt_name , array(
       'title'            => esc_html__( 'Footer', 'medixi' ),
       'id'               => 'medixi_footer',
       'desc'             => esc_html__( 'medixi Footer', 'medixi' ),
       'customizer_width' => '400px',
       'icon'              => 'el el-photo',
   ) );

   Redux::setSection( $opt_name, array(
       'title'      => esc_html__( 'Pre-built Footer / Footer Builder', 'medixi' ),
       'id'         => 'medixi_footer_section',
       'subsection' => true,
       'fields'     => array(
            array(
               'id'       => 'medixi_footer_builder_trigger',
               'type'     => 'button_set',
               'default'  => 'prebuilt',
               'options'  => array(
                   'footer_builder'        => esc_html__('Footer Builder','medixi'),
                   'prebuilt'              => esc_html__('Pre-built Footer','medixi'),
               ),
               'title'    => esc_html__( 'Footer Builder', 'medixi' ),
            ),
            array(
               'id'       => 'medixi_footer_builder_select',
               'type'     => 'select',
               'required' => array( 'medixi_footer_builder_trigger','equals','footer_builder'),
               'data'     => 'posts',
               'args'     => array(
                   'post_type'     => 'medilax_footer_build'
               ),
               'on'       => esc_html__( 'Enabled', 'medixi' ),
               'off'      => esc_html__( 'Disable', 'medixi' ),
               'title'    => esc_html__( 'Select Footer', 'medixi' ),
               'subtitle' => sprintf( wp_kses_post('First make your footer from footer custom types then select it from here. To make footer <a href="%sedit.php?post_type=medilax_footer_build" target="_blank">Click Here</a>', 'medixi' ) , esc_url( admin_url() ) )
            ),
            array(
               'id'       => 'medixi_footerwidget_enable',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Widget', 'medixi' ),
               'default'  => 0,
               'on'       => esc_html__( 'Enabled', 'medixi' ),
               'off'      => esc_html__( 'Disable', 'medixi' ),
               'required' => array( 'medixi_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
               'id'       => 'medixi_footer_background',
               'type'     => 'background',
               'title'    => esc_html__( 'Footer Background', 'medixi' ),
               'subtitle' => esc_html__( 'Set footer background.', 'medixi' ),
               'output'   => array( '.footer-wrapper' ),
               'required' => array( 'medixi_footerwidget_enable','=','1' ),
            ),
            array(
               'id'       => 'medixi_footer_widget_title_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Title Color', 'medixi' ),
               'required' => array('medixi_footerwidget_enable','=','1'),
               'output'   => array( '.footer-layout1 .footer-widget h3.widget_title' ),
           ),
           array(
               'id'       => 'medixi_footer_widget_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Text Color', 'medixi' ),
               'required' => array( 'medixi_footerwidget_enable','=','1' ),
               'output'   => array( '.footer-layout1 .footer-wid-wrap .widget_contact p' ),
           ),
           array(
               'id'       => 'medixi_footer_widget_anchor_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Anchor Color', 'medixi' ),
               'required' => array('medixi_footerwidget_enable','=','1'),
               'output'   => array( '.footer-layout1 .footer-wid-wrap .widget_contact p a,.footer-layout1 .footer-wid-wrap .widget-links ul li a' ),
           ),
           array(
               'id'       => 'medixi_footer_widget_anchor_hov_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Anchor Hover Color', 'medixi' ),
               'required' => array('medixi_footerwidget_enable','=','1'),
               'output'   => array( '.footer-layout1 .footer-wid-wrap .widget_contact p a:hover,.footer-layout1 .footer-wid-wrap .widget-links ul li a:hover' ),
           ),
           array(
               'id'       => 'medixi_disable_footer_top',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Top?', 'medixi' ),
               'default'  => 0,
               'on'       => esc_html__('Enabled','medixi'),
               'off'      => esc_html__('Disable','medixi'),
               'required' => array('medixi_footer_builder_trigger','equals','prebuilt'),
            ),
           array(
               'id'       => 'medixi_footer_top_logo',
               'type'     => 'media',
               'url'      => true,
               'title'    => esc_html__( 'Footer Top Logo', 'medixi' ),
               'required' => array('medixi_disable_footer_top','=','1'),
            ),

           array(
               'id'       => 'medixi_disable_footer_bottom',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Bottom?', 'medixi' ),
               'default'  => 1,
               'on'       => esc_html__('Enabled','medixi'),
               'off'      => esc_html__('Disable','medixi'),
               'required' => array('medixi_footer_builder_trigger','equals','prebuilt'),
            ),
             array(
               'id'       => 'medixi_footer_bottom_background',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Bottom Background Color', 'medixi' ),
               'required' => array( 'medixi_disable_footer_bottom','=','1' ),
               'output'   => array( 'background-color'   =>   '.footer-wrapper .copyright' ),
            ),
            array(
               'id'       => 'medixi_copyright_text',
               'type'     => 'text',
               'title'    => esc_html__( 'Copyright Text', 'medixi' ),
               'subtitle' => esc_html__( 'Add Copyright Text', 'medixi' ),
               'default'  => sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>',date('Y'),esc_url('#'),__( 'Medixi.','medixi' ),esc_url('#'),__( 'Vecuro', 'medixi' ) ),
               'required' => array( 'medixi_disable_footer_bottom','equals','1' ),
            ),
            array(
               'id'       => 'medixi_footer_copyright_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Copyright Text Color', 'medixi' ),
               'subtitle' => esc_html__( 'Set footer copyright text color', 'medixi' ),
               'required' => array( 'medixi_disable_footer_bottom','equals','1'),
               'output'   => array( '.footer-wrapper .copyright p' ),
            ),
            array(
               'id'       => 'medixi_footer_copyright_acolor',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Copyright Ancor Color', 'medixi' ),
               'subtitle' => esc_html__( 'Set footer copyright ancor color', 'medixi' ),
               'required' => array( 'medixi_disable_footer_bottom','equals','1'),
               'output'   => array( '.footer-wrapper .copyright p a' ),
            ),
            array(
               'id'       => 'medixi_footer_copyright_a_hover_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Copyright Ancor Hover Color', 'medixi' ),
               'subtitle' => esc_html__( 'Set footer copyright ancor Hover color', 'medixi' ),
               'required' => array( 'medixi_disable_footer_bottom','equals','1'),
               'output'   => array( '.footer-wrapper .copyright p a:hover' ),
            ),

       ),
   ) );


    /* End Footer Media */

    // -> START Custom Css
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Css', 'medixi' ),
        'id'         => 'medixi_custom_css_section',
        'icon'  => 'el el-css',
        'fields'     => array(
            array(
                'id'       => 'medixi_css_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__('CSS Code', 'medixi'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'medixi'),
                'mode'     => 'css',
                'theme'    => 'monokai',
            )
        ),
    ) );

    /* End custom css */



    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'medixi' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'medixi' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'medixi' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }