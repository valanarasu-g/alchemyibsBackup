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

    medixi_setPostViews( get_the_ID() );

    ?>
    <div <?php post_class(); ?> >
    <?php
        if( class_exists('ReduxFramework') ) {
            $medixi_post_details_title_position = medixi_opt('medixi_post_details_title_position');
        } else {
            $medixi_post_details_title_position = 'header';
        }

        $allowhtml = array(
            'p'         => array(
                'class'     => array()
            ),
            'span'      => array(),
            'a'         => array(
                'href'      => array(),
                'title'     => array()
            ),
            'br'        => array(),
            'em'        => array(),
            'strong'    => array(),
            'b'         => array(),
        );

            // Blog Post Thumbnail
            do_action( 'medixi_blog_post_thumb' );

            
            echo '<div class="blog-content">';
                // Blog Post Meta
                do_action( 'medixi_blog_post_meta' );
                
                if( $medixi_post_details_title_position != 'header' ) {
                    echo '<h2 class="blog-title h3">'.wp_kses( get_the_title(), $allowhtml ).'</h2>';
                }

                if( get_the_content() ){

                    the_content();
                    // Link Pages
                    medixi_link_pages();
                }
            echo '</div>';

            if( class_exists('ReduxFramework') ) {
                $medixi_post_details_share_options = medixi_opt('medixi_post_details_share_options');
            } else {
                $medixi_post_details_share_options = false;
            }
            
            $medixi_post_tag = get_the_tags();
            
            if( ! empty( $medixi_post_tag ) || ( function_exists( 'medixi_social_sharing_buttons' ) || $medixi_post_details_share_options ) ){
                echo '<div class="share-links clearfix  ">';
                    echo '<div class="row align-items-xl-center justify-content-between gy-4">';
                    
                        if( is_array( $medixi_post_tag ) && ! empty( $medixi_post_tag ) ){
                            if( count( $medixi_post_tag ) > 1 ){
                                $tag_text = __( 'Tags:', 'medixi' );
                            }else{
                                $tag_text = __( 'Tag:', 'medixi' );
                            }
                            echo '<div class="col-md-auto d-sm-flex align-items-center">';
                            echo '<span class="share-links-title">'.$tag_text.'</span>';

                                echo '<div class="tagcloud">';
                                    foreach( $medixi_post_tag as $tags ){
                                        echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }

                        /**
                        *
                        * Hook for Blog Details Share Options
                        *
                        * Hook medixi_blog_details_share_options
                        *
                        * @Hooked medixi_blog_details_share_options_cb 10
                        *
                        */
                        do_action( 'medixi_blog_details_share_options' );

                    echo '</div>';
                echo '</div>';
            }
        echo '</div>';

        /**
        *
        * Hook for Blog Details Author Bio
        *
        * Hook medixi_blog_details_author_bio
        *
        * @Hooked medixi_blog_details_author_bio_cb 10
        *
        */
        do_action( 'medixi_blog_details_author_bio' );

        /**
        *
        * Hook for Blog Details Comments
        *
        * Hook medixi_blog_details_comments
        *
        * @Hooked medixi_blog_details_comments_cb 10
        *
        */
        do_action( 'medixi_blog_details_comments' );