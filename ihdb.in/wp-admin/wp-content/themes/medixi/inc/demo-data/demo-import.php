<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : medixi
 * @version   : 1.0
 * @Author    : Vecuro
 * @Author URI: https://themeforest.net/user/vecuro_themes
 */

// demo import file
function medixi_import_files() {

	$demoImg = '<img src="'. MEDIXI_DEMO_DIR_URI  .'screen-image.jpg" alt="'.esc_attr__('Demo Preview Imgae','medixi').'" />';

    return array(
        array(
            'import_file_name'             => esc_html__('Medixi Demo','medixi'),
            'local_import_file'            =>  MEDIXI_DEMO_DIR_PATH  . 'medixi-demo.xml',
            'local_import_widget_file'     =>  MEDIXI_DEMO_DIR_PATH  . 'medixi-widgets-demo.json',
            'local_import_redux'           => array(
                array(
                    'file_path'   =>  MEDIXI_DEMO_DIR_PATH . 'redux_options_demo.json',
                    'option_name' => 'medixi_opt',
                ),
            ),
            'import_notice' => $demoImg,
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'medixi_import_files' );

// demo import setup
function medixi_after_import_setup() {
	// Assign menus to their locations.
	$main_menu   	= get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$footer_menu  	= get_term_by( 'name', 'Footer Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary-menu'   => $main_menu->term_id,
			'footer-menu'    => $footer_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id 	= get_page_by_title( 'Home One' );
	$blog_page_id  	= get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

    if( class_exists( 'LS_Sliders' ) ){
		include LS_ROOT_PATH.'/classes/class.ls.importutil.php';
		new LS_ImportUtil( MEDIXI_DEMO_DIR_PATH  . 'slider/Medixi-Slider-5.zip');
		new LS_ImportUtil( MEDIXI_DEMO_DIR_PATH  . 'slider/Medixi-Slider-4.zip');
		new LS_ImportUtil( MEDIXI_DEMO_DIR_PATH  . 'slider/Medixi-Slider-3.zip');
		new LS_ImportUtil( MEDIXI_DEMO_DIR_PATH  . 'slider/Medixi-Slider-2.zip');
		new LS_ImportUtil( MEDIXI_DEMO_DIR_PATH  . 'slider/Medixi-Slider-1.zip');
	}

}
add_action( 'pt-ocdi/after_import', 'medixi_after_import_setup' );


//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function medixi_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Medixi Demo Import' , 'medixi' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'medixi' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'medixi-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'medixi_import_plugin_page_setup' );

// Enqueue scripts
function medixi_demo_import_custom_scripts(){
	if( isset( $_GET['page'] ) && $_GET['page'] == 'medixi-demo-import' ){
		// style
		wp_enqueue_style( 'medixi-demo-import', MEDIXI_DEMO_DIR_URI.'css/medixi.demo.import.css', array(), '1.0', false );
	}
}
add_action( 'admin_enqueue_scripts', 'medixi_demo_import_custom_scripts' );