<?php
/**
 * @Packge     : Medixi
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://themeforest.net/user/vecuro_themes
 *
 */


// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit;
}

function medixi_widgets_init() {

    if( class_exists('ReduxFramework') ) {
        $medixi_sidebar_widget_title_heading_tag = medixi_opt('medixi_sidebar_widget_title_heading_tag');
    } else {
        $medixi_sidebar_widget_title_heading_tag = 'h3';
    }

    //sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'medixi' ),
        'id'            => 'medixi-blog-sidebar',
        'description'   => esc_html__( 'Add Blog Sidebar Widgets Here.', 'medixi' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget_title">',
        'after_title'   => '</h3>',
    ) );

    // page sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'medixi' ),
        'id'            => 'medixi-page-sidebar',
        'description'   => esc_html__( 'Add Page Sidebar Widgets Here.', 'medixi' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget_title">',
        'after_title'   => '</h3>',
    ) );
    if( class_exists( 'ReduxFramework' ) ){
        // footer widgets register
        register_sidebar( array(
           'name'          => esc_html__( 'Footer One', 'medixi' ),
           'id'            => 'medixi-footer-1',
           'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Two', 'medixi' ),
           'id'            => 'medixi-footer-2',
           'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Three', 'medixi' ),
           'id'            => 'medixi-footer-3',
           'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Four', 'medixi' ),
           'id'            => 'medixi-footer-4',
           'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Offcanvas Sidebar', 'medixi' ),
           'id'            => 'medixi-offcanvas',
           'before_widget' => '<div id="%1$s" class="widget %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
    }

}

add_action( 'widgets_init', 'medixi_widgets_init' );