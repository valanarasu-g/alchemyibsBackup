<?php 
/**
 * @Packge     : Medixi
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://themeforest.net/user/vecuro_themes
 *
 */
 
	// Block direct access
	if( ! defined( 'ABSPATH' ) ){
		exit();
	}

	/**
	* Hook for preloader
	*/
	add_action( 'medixi_preloader_wrap', 'medixi_preloader_wrap_cb', 10 );

	/**
	* Hook for offcanvas cart
	*/
	add_action( 'medixi_main_wrapper_start', 'medixi_main_wrapper_start_cb', 10 );

	/**
	* Hook for Header
	*/
	add_action( 'medixi_header', 'medixi_header_cb', 10 );
	
	/**
	* Hook for Blog Start Wrapper
	*/
	add_action( 'medixi_blog_start_wrap', 'medixi_blog_start_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column Start Wrapper
	*/
    add_action( 'medixi_blog_col_start_wrap', 'medixi_blog_col_start_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'medixi_blog_col_end_wrap', 'medixi_blog_col_end_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'medixi_blog_end_wrap', 'medixi_blog_end_wrap_cb', 10 );
	
	/**
	* Hook for Blog Pagination
	*/
    add_action( 'medixi_blog_pagination', 'medixi_blog_pagination_cb', 10 );
    
    /**
	* Hook for Blog Content
	*/
	add_action( 'medixi_blog_content', 'medixi_blog_content_cb', 10 );
    
    /**
	* Hook for Blog Sidebar
	*/
	add_action( 'medixi_blog_sidebar', 'medixi_blog_sidebar_cb', 10 );
    
    /**
	* Hook for Blog Details Sidebar
	*/
	add_action( 'medixi_blog_details_sidebar', 'medixi_blog_details_sidebar_cb', 10 );

	/**
	* Hook for Blog Details Wrapper Start
	*/
	add_action( 'medixi_blog_details_wrapper_start', 'medixi_blog_details_wrapper_start_cb', 10 );

	/**
	* Hook for Blog Details Post Meta
	*/
	add_action( 'medixi_blog_post_meta', 'medixi_blog_post_meta_cb', 10 );

	/**
	* Hook for Blog Details Post Share Options
	*/
	add_action( 'medixi_blog_details_share_options', 'medixi_blog_details_share_options_cb', 10 );

	/**
	* Hook for Blog Details Post Author Bio
	*/
	add_action( 'medixi_blog_details_author_bio', 'medixi_blog_details_author_bio_cb', 10 );

	/**
	* Hook for Blog Details Tags and Categories
	*/
	add_action( 'medixi_blog_details_tags_and_categories', 'medixi_blog_details_tags_and_categories_cb', 10 );

	/**
	* Hook for Blog Deatils Comments
	*/
	add_action( 'medixi_blog_details_comments', 'medixi_blog_details_comments_cb', 10 );

	/**
	* Hook for Blog Deatils Column Start
	*/
	add_action('medixi_blog_details_col_start','medixi_blog_details_col_start_cb');

	/**
	* Hook for Blog Deatils Column End
	*/
	add_action('medixi_blog_details_col_end','medixi_blog_details_col_end_cb');

	/**
	* Hook for Blog Deatils Wrapper End
	*/
	add_action('medixi_blog_details_wrapper_end','medixi_blog_details_wrapper_end_cb');
	
	/**
	* Hook for Blog Post Thumbnail
	*/
	add_action('medixi_blog_post_thumb','medixi_blog_post_thumb_cb');
    
	/**
	* Hook for Blog Post Content
	*/
	add_action('medixi_blog_post_content','medixi_blog_post_content_cb');
	
    
	/**
	* Hook for Blog Post Excerpt And Read More Button
	*/
	add_action('medixi_blog_postexcerpt_read_content','medixi_blog_postexcerpt_read_content_cb');
	
	/**
	* Hook for footer content
	*/
	add_action( 'medixi_footer_content', 'medixi_footer_content_cb', 10 );
	
	/**
	* Hook for main wrapper end
	*/
	add_action( 'medixi_main_wrapper_end', 'medixi_main_wrapper_end_cb', 10 );
	
	/**
	* Hook for Back to Top Button
	*/
	add_action( 'medixi_back_to_top', 'medixi_back_to_top_cb', 10 );

	/**
	* Hook for Page Start Wrapper
	*/
	add_action( 'medixi_page_start_wrap', 'medixi_page_start_wrap_cb', 10 );

	/**
	* Hook for Page End Wrapper
	*/
	add_action( 'medixi_page_end_wrap', 'medixi_page_end_wrap_cb', 10 );

	/**
	* Hook for Page Column Start Wrapper
	*/
	add_action( 'medixi_page_col_start_wrap', 'medixi_page_col_start_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'medixi_page_col_end_wrap', 'medixi_page_col_end_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'medixi_page_sidebar', 'medixi_page_sidebar_cb', 10 );

	/**
	* Hook for Page Content
	*/
	add_action( 'medixi_page_content', 'medixi_page_content_cb', 10 );