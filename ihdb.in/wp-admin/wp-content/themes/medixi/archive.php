<?php
/**
 * @Packge     : Medixi
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://themeforest.net/user/vecuro_themes
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}   
    // Header
    get_header();

    /**
    * 
    * Hook for Blog Start Wrapper
    *
    * Hook medixi_blog_start_wrap
    *
    * @Hooked medixi_blog_start_wrap_cb 10
    *  
    */
    do_action( 'medixi_blog_start_wrap' );

    /**
    * 
    * Hook for Blog Column Start Wrapper
    *
    * Hook medixi_blog_col_start_wrap
    *
    * @Hooked medixi_blog_col_start_wrap_cb 10
    *  
    */
    do_action( 'medixi_blog_col_start_wrap' );

    /**
    * 
    * Hook for Blog Content
    *
    * Hook medixi_blog_content
    *
    * @Hooked medixi_blog_content_cb 10
    *  
    */
    do_action( 'medixi_blog_content' );

    /**
    * 
    * Hook for Blog Pagination
    *
    * Hook medixi_blog_pagination
    *
    * @Hooked medixi_blog_pagination_cb 10
    *  
    */
    do_action( 'medixi_blog_pagination' ); 

    /**
    * 
    * Hook for Blog Column End Wrapper
    *
    * Hook medixi_blog_col_end_wrap
    *
    * @Hooked medixi_blog_col_end_wrap_cb 10
    *  
    */
    do_action( 'medixi_blog_col_end_wrap' ); 

    /**
    * 
    * Hook for Blog Sidebar
    *
    * Hook medixi_blog_sidebar
    *
    * @Hooked medixi_blog_sidebar_cb 10
    *  
    */
    do_action( 'medixi_blog_sidebar' );     
        
    /**
    * 
    * Hook for Blog End Wrapper
    *
    * Hook medixi_blog_end_wrap
    *
    * @Hooked medixi_blog_end_wrap_cb 10
    *  
    */
    do_action( 'medixi_blog_end_wrap' );

    //footer
    get_footer();