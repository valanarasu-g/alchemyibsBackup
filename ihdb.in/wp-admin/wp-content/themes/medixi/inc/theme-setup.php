<?php
/**
 * @Packge     : Medixi
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://themeforest.net/user/vecuro_themes
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'medixi_setup' ) ){
    function medixi_setup() {

        // content width
        $GLOBALS['content_width'] = apply_filters( 'medixi_content_width', 751 );

        // language file
		load_theme_textdomain( 'medixi', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// title tag
		add_theme_support( 'title-tag' );

		// post thumbnails
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in three locations.
        register_nav_menus( array(
            'primary-menu'      => esc_html__( 'Primary Menu', 'medixi' ),
            'footer-menu'       => esc_html__( 'Footer Menu', 'medixi' ),
            'mobile-menu'       => esc_html__( 'Mobile Menu', 'medixi' ),
        ) );

		//support html5
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style'
			)
		);


        // support post format
        add_theme_support( 'post-formats', array( 'audio', 'video' ) );

		// Custom logo
		add_theme_support( 'custom-logo' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'assets/css/style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// support woocommerce
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );

	}
}
add_action( 'after_setup_theme', 'medixi_setup' );