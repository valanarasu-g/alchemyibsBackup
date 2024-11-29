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


    // preloader hook function
    if( ! function_exists( 'medixi_preloader_wrap_cb' ) ) {
        function medixi_preloader_wrap_cb() {
            $preloader_display              =  medixi_opt('medixi_display_preloader');

            if( class_exists('ReduxFramework') ){
                if( $preloader_display ){
                    echo '<div class="preloader">';
                        echo '<button class="vs-btn preloaderCls">'.esc_html__( 'Cancel Preloader', 'medixi' ).'</button>';
                        echo '<div class="preloader-inner">';
                            echo '<svg width="88px" height="108px" viewBox="0 0 54 64">';
                                echo '<defs></defs>';
                                echo '<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">';
                                    echo '<path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2" stroke-width="2"></path>';
                                echo '</g>';
                            echo '</svg>';
                        echo '</div>';
                    echo '</div>';
                }
            }else{
                echo '<div class="preloader  ">';
                    echo '<button class="vs-btn preloaderCls">'.esc_html__( 'Cancel Preloader', 'medixi' ).'</button>';
                    echo '<div class="preloader-inner">';
                        echo '<svg width="88px" height="108px" viewBox="0 0 54 64">';
                            echo '<defs></defs>';
                            echo '<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">';
                                echo '<path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2" stroke-width="2"></path>';
                            echo '</g>';
                        echo '</svg>';
                    echo '</div>';
                echo '</div>';
            }
        }
    }

    // Header Hook function
    if( !function_exists('medixi_header_cb') ) {
        function medixi_header_cb( ) {
            get_template_part('templates/header');
            get_template_part('templates/header-menu-bottom');
        }
    }

    // back top top hook function
    if( ! function_exists( 'medixi_back_to_top_cb' ) ) {
        function medixi_back_to_top_cb( ) {
            $backtotop_trigger = medixi_opt('medixi_display_bcktotop');
            $custom_bcktotop   = medixi_opt('medixi_custom_bcktotop');
            $custom_bcktotop_icon   = medixi_opt('medixi_custom_bcktotop_icon');
            if( class_exists( 'ReduxFramework' ) ) {
                if( $backtotop_trigger ) {
                    if( $custom_bcktotop ) {
                        echo '<!-- Back to Top Button -->';
                        echo '<a href="'.esc_url('#').'" class="scrollToTop scroll-bottom  style2">';
                            echo '<i class="'.esc_attr( $custom_bcktotop_icon ).'"></i>';
                        echo '</a>';
                        echo '<!-- End of Back to Top Button -->';
                    } else {
                        echo '<!-- Back to Top Button -->';
                        echo '<a href="'.esc_url('#').'" class="scrollToTop scroll-bottom  style2">';
                            echo '<i class="fas fa-arrow-alt-up"></i>';
                        echo '</a>';
                        echo '<!-- End of Back to Top Button -->';
                    }
                }
            }

        }
    }

    // Blog Start Wrapper Function
    if( !function_exists('medixi_blog_start_wrap_cb') ) {
        function medixi_blog_start_wrap_cb() {
            echo '<section class="vs-blog-wrapper space-top space-md-bottom">';
                echo '<div class="container">';
                    if( is_active_sidebar( 'medixi-blog-sidebar' ) ){
                        $medixi_gutter_class = 'gutters-40';
                    }else{
                        $medixi_gutter_class = '';
                    }
                    echo '<div class="row '.esc_attr( $medixi_gutter_class ).'">';
        }
    }

    // Blog End Wrapper Function
    if( !function_exists('medixi_blog_end_wrap_cb') ) {
        function medixi_blog_end_wrap_cb() {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // Blog Column Start Wrapper Function
    if( !function_exists('medixi_blog_col_start_wrap_cb') ) {
        function medixi_blog_col_start_wrap_cb() {
            if( class_exists('ReduxFramework') ) {
                $medixi_blog_sidebar = medixi_opt('medixi_blog_sidebar');
                if( $medixi_blog_sidebar == '2' && is_active_sidebar('medixi-blog-sidebar') ) {
                    echo '<div class="col-lg-8 order-lg-last">';
                } elseif( $medixi_blog_sidebar == '3' && is_active_sidebar('medixi-blog-sidebar') ) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }

            } else {
                if( is_active_sidebar('medixi-blog-sidebar') ) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }
        }
    }
    // Blog Column End Wrapper Function
    if( !function_exists('medixi_blog_col_end_wrap_cb') ) {
        function medixi_blog_col_end_wrap_cb() {
            echo '</div>';
        }
    }

    // Blog Sidebar
    if( !function_exists('medixi_blog_sidebar_cb') ) {
        function medixi_blog_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $medixi_blog_sidebar = medixi_opt('medixi_blog_sidebar');
            } else {
                $medixi_blog_sidebar = 2;
            }
            if( $medixi_blog_sidebar != 1 && is_active_sidebar('medixi-blog-sidebar') ) {
                // Sidebar
                get_sidebar();
            }
        }
    }


    if( !function_exists('medixi_blog_details_sidebar_cb') ) {
        function medixi_blog_details_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $medixi_blog_single_sidebar = medixi_opt('medixi_blog_single_sidebar');
            } else {
                $medixi_blog_single_sidebar = 4;
            }
            if( $medixi_blog_single_sidebar != 1 ) {
                // Sidebar
                get_sidebar();
            }
        }
    }

    // Blog Pagination Function
    if( !function_exists('medixi_blog_pagination_cb') ) {
        function medixi_blog_pagination_cb( ) {
            get_template_part('templates/pagination');
        }
    }

    // Blog Content Function
    if( !function_exists('medixi_blog_content_cb') ) {
        function medixi_blog_content_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $medixi_blog_grid = medixi_opt('medixi_blog_grid');
            } else {
                $medixi_blog_grid = '1';
            }

            if( $medixi_blog_grid == '1' ) {
                $medixi_blog_grid_class = 'col-lg-12';
            } elseif( $medixi_blog_grid == '2' ) {
                $medixi_blog_grid_class = 'col-sm-6';
            } else {
                $medixi_blog_grid_class = 'col-lg-4 col-sm-6';
            }

            echo '<div class="row">';
                if( have_posts() ) {
                    while( have_posts() ) {
                        the_post();
                        echo '<div class="'.esc_attr($medixi_blog_grid_class).'">';
                            get_template_part('templates/content',get_post_format());
                        echo '</div>';
                    }
                    wp_reset_postdata();
                } else{
                    get_template_part('templates/content','none');
                }
            echo '</div>';
        }
    }

    // footer content Function
    if( !function_exists('medixi_footer_content_cb') ) {
        function medixi_footer_content_cb( ) {

            if( class_exists('ReduxFramework') && did_action( 'elementor/loaded' )  ){
                if( is_page() || is_page_template('template-builder.php') ) {
                    $post_id = get_the_ID();

                    // Get the page settings manager
                    $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

                    // Get the settings model for current post
                    $page_settings_model = $page_settings_manager->get_model( $post_id );

                    // Retrieve the Footer Style
                    $footer_settings = $page_settings_model->get_settings( 'medilax_footer_style' );

                    // Footer Local
                    $footer_local = $page_settings_model->get_settings( 'medilax_footer_builder_option' );

                    // Footer Enable Disable
                    $footer_enable_disable = $page_settings_model->get_settings( 'medilax_footer_choice' );

                    if( $footer_enable_disable == 'yes' ){
                        if( $footer_settings == 'footer_builder' ) {
                            // local options
                            $medixi_local_footer = get_post( $footer_local );
                            echo '<footer>';
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $medixi_local_footer->ID );
                            echo '</footer>';
                        } else {
                            // global options
                            $medixi_footer_builder_trigger = medixi_opt('medixi_footer_builder_trigger');
                            if( $medixi_footer_builder_trigger == 'footer_builder' ) {
                                echo '<footer>';
                                $medixi_global_footer_select = get_post( medixi_opt( 'medixi_footer_builder_select' ) );
                                $footer_post = get_post( $medixi_global_footer_select );
                                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                                echo '</footer>';
                            } else {
                                // wordpress widgets
                                medixi_footer_global_option();
                            }
                        }
                    }
                } else {
                    // global options
                    $medixi_footer_builder_trigger = medixi_opt('medixi_footer_builder_trigger');
                    if( $medixi_footer_builder_trigger == 'footer_builder' ) {
                        echo '<footer>';
                        $medixi_global_footer_select = get_post( medixi_opt( 'medixi_footer_builder_select' ) );
                        $footer_post = get_post( $medixi_global_footer_select );
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                        echo '</footer>';
                    } else {
                        // wordpress widgets
                        medixi_footer_global_option();
                    }
                }
            } else {
                echo '<div class="footer-wrapper footer-layout1">';
                    echo '<div class="copyright">';
                        echo '<div class="container">';
                            echo '<div class="col-auto text-center">';
                                echo '<p class="mb-0 text-white">'.sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>',date('Y'),esc_url('#'),__( 'Medixi.','medixi' ),esc_url('#'),__( 'Vecuro', 'medixi' ) ).'</p>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

        }
    }

    // blog details wrapper start hook function
    if( !function_exists('medixi_blog_details_wrapper_start_cb') ) {
        function medixi_blog_details_wrapper_start_cb( ) {
            echo '<section class="vs-blog-wrapper blog-details space-top space-md-bottom">';
                echo '<div class="container">';
                    if( is_active_sidebar( 'medixi-blog-sidebar' ) ){
                        $medixi_gutter_class = 'gutters-40';
                    }else{
                        $medixi_gutter_class = '';
                    }
                    echo '<div class="row '.esc_attr( $medixi_gutter_class ).'">';
        }
    }

    // blog details column wrapper start hook function
    if( !function_exists('medixi_blog_details_col_start_cb') ) {
        function medixi_blog_details_col_start_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $medixi_blog_single_sidebar = medixi_opt('medixi_blog_single_sidebar');
                if( $medixi_blog_single_sidebar == '2' && is_active_sidebar('medixi-blog-sidebar') ) {
                    echo '<div class="col-lg-8 order-last">';
                } elseif( $medixi_blog_single_sidebar == '3' && is_active_sidebar('medixi-blog-sidebar') ) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }

            } else {
                if( is_active_sidebar('medixi-blog-sidebar') ) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }
        }
    }

    // blog details post meta hook function
    if( !function_exists('medixi_blog_post_meta_cb') ) {
        function medixi_blog_post_meta_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $medixi_display_post_date      =  medixi_opt('medixi_display_post_date');
                $medixi_display_post_views     =  medixi_opt('medixi_display_post_views');
                $medixi_display_post_comment   =  medixi_opt('medixi_display_post_comment');
            } else {
                $medixi_display_post_date      = '1';
                $medixi_display_post_views     = '';
                $medixi_display_post_comment   = '1';
            }

            echo '<!-- Blog Meta -->';
            echo '<div class="blog-meta">';
                if( $medixi_display_post_views ){
                    echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="fal fa-eye"></i>';
                    echo medixi_getPostViews( get_the_ID() );
                    echo esc_html__( ' Views', 'medixi' );
                    echo '</a>';
                }
                
                if( $medixi_display_post_comment ){
                    if( get_comments_number() == 1 ){
                        $comment_text = __( ' Comment', 'medixi' );
                    }else{
                        $comment_text = __( ' Comments', 'medixi' );
                    }
                    echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="far fa-comments"></i>'.esc_html( get_comments_number() ).''.$comment_text.'</a>';
                }

                if( $medixi_display_post_date ){
                    echo '<a href="'.esc_url( medixi_blog_date_permalink() ).'"><i class="fal fa-calendar-alt"></i>';
                        echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
                    echo '</a>';
                }
            echo '</div>';
        }
    }

    // blog details share options hook function
    if( !function_exists('medixi_blog_details_share_options_cb') ) {
        function medixi_blog_details_share_options_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $medixi_post_details_share_options = medixi_opt('medixi_post_details_share_options');
            } else {
                $medixi_post_details_share_options = false;
            }
            if( function_exists( 'medixi_social_sharing_buttons' ) && $medixi_post_details_share_options ) {
                echo '<div class="col-md-auto d-sm-flex align-items-center">';
                echo '<span class="share-links-title">'.__( 'Social Network:', 'medixi' ).'</span>';
                    echo '<ul class="blog-social">';
                        echo medixi_social_sharing_buttons();
                    echo '</ul>';
                    echo '<!-- End Social Share -->';
                echo '</div>';
            }
        }
    }
    
    // blog details author bio hook function
    if( !function_exists('medixi_blog_details_author_bio_cb') ) {
        function medixi_blog_details_author_bio_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $postauthorbox =  medixi_opt( 'medixi_post_details_author_desc_trigger' );
            } else {
                $postauthorbox = '1';
            }
            if( !empty( get_the_author_meta('description')  ) && $postauthorbox == '1' ) {
                echo '<!-- Post Author -->';
                echo '<div class="blog-author bg-smoke d-md-flex">';
                    echo '<!-- Author Thumb -->';
                    echo '<div class="media-image mb-3 mb-md-0 mr-30 align-self-center">';
                        echo medixi_img_tag( array(
                            "url"   => esc_url( get_avatar_url( get_the_author_meta('ID'), array(
                            "size"  => 150
                            ) ) ),
                        ) );
                    echo '</div>';
                    echo '<!-- End of Author Thumb -->';
                    echo '<div class="media-body">';
                        echo '<p class="author-degi text-theme mb-0">'.esc_html__( 'Written by', 'medixi' ).'</p>';
                        echo medixi_heading_tag( array(
                            "tag"   => "h3",
                            "text"  => medixi_anchor_tag( array(
                                "text"  => esc_html( ucwords( get_the_author() ) ),
                                "url"   => esc_url( get_author_posts_url( get_the_author_meta('ID') ) )
                            ) ),
                            'class' => 'author-name text-reset',
                        ) );

                        if( ! empty( get_the_author_meta('description') ) ) {
                            echo '<p class="author-text mb-0">';
                                echo esc_html( get_the_author_meta('description') );
                            echo '</p>';
                        }

                        $medixi_social_icons = get_user_meta( get_the_author_meta('ID'), '_medixi_social_profile_group',true );

                        if( is_array( $medixi_social_icons ) && !empty( $medixi_social_icons ) ) {
                            echo '<div class="d-flex gap-2 text-white">';
                            foreach( $medixi_social_icons as $singleicon ) {
                                if( ! empty( $singleicon['_medixi_social_profile_icon'] ) ) {
                                    echo '<a class="icon-btn3 size-40" href="'.esc_url( $singleicon['_medixi_lawyer_social_profile_link'] ).'"><i class="fab '.esc_attr( $singleicon['_medixi_social_profile_icon'] ).'"></i></a>';
                                }
                            }
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
                echo '<!-- End of Post Author -->';
            }

        }
    }

    // Blog Details Comments hook function
    if( !function_exists('medixi_blog_details_comments_cb') ) {
        function medixi_blog_details_comments_cb( ) {
            if ( ! comments_open() ) {
                echo '<div class="blog-comment-area">';
                    echo medixi_heading_tag( array(
                        "tag"   => "h3",
                        "text"  => esc_html__( 'Comments are closed', 'medixi' ),
                        "class" => "inner-title"
                    ) );
                echo '</div>';
            }

            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
    }

    // Blog Details Column end hook function
    if( !function_exists('medixi_blog_details_col_end_cb') ) {
        function medixi_blog_details_col_end_cb( ) {
            echo '</div>';
        }
    }

    // Blog Details Wrapper end hook function
    if( !function_exists('medixi_blog_details_wrapper_end_cb') ) {
        function medixi_blog_details_wrapper_end_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page start wrapper hook function
    if( !function_exists('medixi_page_start_wrap_cb') ) {
        function medixi_page_start_wrap_cb( ) {
            if( is_page( 'cart' ) ){
                $section_class = "vs-cart-wrapper space-top space-md-bottom";
            }elseif( is_page( 'checkout' ) ){
                $section_class = "vs-checkout-wrapper space-top space-md-bottom";
            }elseif( is_page('wishlist') ){
                $section_class = "space-top space-md-bottom";
            }else{
                $section_class = "space-top space-md-bottom";
            }
            echo '<section class="'.esc_attr( $section_class ).'">';
                echo '<div class="container">';
                    echo '<div class="row">';
        }
    }

    // page wrapper end hook function
    if( !function_exists('medixi_page_end_wrap_cb') ) {
        function medixi_page_end_wrap_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page column wrapper start hook function
    if( !function_exists('medixi_page_col_start_wrap_cb') ) {
        function medixi_page_col_start_wrap_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $medixi_page_sidebar = medixi_opt('medixi_page_sidebar');
            }else {
                $medixi_page_sidebar = '1';
            }
            if( $medixi_page_sidebar == '2' && is_active_sidebar('medixi-page-sidebar') ) {
                echo '<div class="col-lg-8 order-last">';
            } elseif( $medixi_page_sidebar == '3' && is_active_sidebar('medixi-page-sidebar') ) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-12">';
            }

        }
    }

    // page column wrapper end hook function
    if( !function_exists('medixi_page_col_end_wrap_cb') ) {
        function medixi_page_col_end_wrap_cb( ) {
            echo '</div>';
        }
    }

    // page sidebar hook function
    if( !function_exists('medixi_page_sidebar_cb') ) {
        function medixi_page_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $medixi_page_sidebar = medixi_opt('medixi_page_sidebar');
            }else {
                $medixi_page_sidebar = '1';
            }

            if( class_exists('ReduxFramework') ) {
                $medixi_page_layoutopt = medixi_opt('medixi_page_layoutopt');
            }else {
                $medixi_page_layoutopt = '3';
            }

            if( $medixi_page_layoutopt == '1' && $medixi_page_sidebar != 1 ) {
                get_sidebar('page');
            } elseif( $medixi_page_layoutopt == '2' && $medixi_page_sidebar != 1 ) {
                get_sidebar();
            }
        }
    }

    // page content hook function
    if( !function_exists('medixi_page_content_cb') ) {
        function medixi_page_content_cb( ) {
            if(  class_exists('woocommerce') && ( is_woocommerce() || is_cart() || is_checkout() || is_page('wishlist') || is_account_page() )  ) {
                echo '<div class="woocommerce--content">';
            } else {
                echo '<div class="page--content clearfix">';
            }

                the_content();

                // Link Pages
                medixi_link_pages();

            echo '</div>';
            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

        }
    }

    if( !function_exists('medixi_blog_post_thumb_cb') ) {
        function medixi_blog_post_thumb_cb( ) {
            if( get_post_format() ) {
                $format = get_post_format();
            }else{
                $format = 'standard';
            }

            $medixi_post_slider_thumbnail = medixi_meta( 'post_format_slider' );

            if( !empty( $medixi_post_slider_thumbnail ) ){
                echo '<div class="blog-img vs-carousel" data-arrows="true" data-slide-show="1" data-next-arrow="far fa-arrow-right" data-prev-arrow="far fa-arrow-left">';
                    foreach( $medixi_post_slider_thumbnail as $single_image ){
                        echo medixi_img_tag( array(
                            'url'   => esc_url( $single_image )
                        ) );
                    }
                echo '</div>';
            }elseif( has_post_thumbnail() && $format == 'standard' ) {
                echo '<!-- Post Thumbnail -->';
                echo '<div class="blog-img">';
                    if( ! is_single() ){
                        echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                    }

                    the_post_thumbnail();

                    if( ! is_single() ){
                        echo '</a>';
                    }
                echo '</div>';
                echo '<!-- End Post Thumbnail -->';
            }elseif( $format == 'video' ){
                if( has_post_thumbnail() && ! empty ( medixi_meta( 'post_format_video' ) ) ){
                    echo '<div class="blog-video blog-image">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            the_post_thumbnail();
                        if( ! is_single() ){
                            echo '</a>';
                        }
                        echo '<a href="'.esc_url( medixi_meta( 'post_format_video' ) ).'" class="play-btn overlay-center popup-video">';
                          echo '<i class="fas fa-play"></i>';
                        echo '</a>';
                    echo '</div>';
                }elseif( ! has_post_thumbnail() && ! is_single() ){
                    echo '<div class="blog-video">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            echo medixi_embedded_media( array( 'video', 'iframe' ) );
                        if( ! is_single() ){
                            echo '</a>';
                        }
                    echo '</div>';
                }
            }elseif( $format == 'audio' ){
                $medixi_audio = medixi_meta( 'post_format_audio' );
                if( ! empty( $medixi_audio ) ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $medixi_audio );
                    echo '</div>';
                }elseif( ! is_single() ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $medixi_audio );
                    echo '</div>';
                }
            }

        }
    }

    // blog details post meta hook function
    if( !function_exists('medixi_blog_post_meta_cb') ) {
        function medixi_blog_post_meta_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $medixi_display_post_date =  medixi_opt('medixi_display_post_date');
                $medixi_display_post_views =  medixi_opt('medixi_display_post_views');
                $medixi_display_post_comment =  medixi_opt('medixi_display_post_comment');

            } else {
                $medixi_display_post_date = '1';
                $medixi_display_post_views = '';
                $medixi_display_post_comment = '1';
            }

            echo '<!-- Blog Meta -->';
            echo '<div class="blog-meta text-primary3 mb-30">';
                if( $medixi_display_post_views ){
                    echo '<span><i class="far fa-eye"></i>';
                    echo medixi_getPostViews( get_the_ID() );
                        echo esc_html__( ' Views', 'medixi' );
                    echo '</span>';
                }
                if( $medixi_display_post_comment ){
                    echo '<span><a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="fal fa-comments"></i>';
                        echo esc_html( get_comments_number() );
                        if( get_comments_number() == '1' ){
                            echo esc_html__( ' Comment', 'medixi' );
                        }else{
                            echo esc_html__( ' Comments', 'medixi' );
                        }
                    echo '</a></span>';
                }
                if( $medixi_display_post_date ){
                    echo '<span><a href="'.esc_url( medixi_blog_date_permalink() ).'"><i class="fal fa-calendar-alt"></i>';
                        echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
                    echo '</a></span>';
                }
            echo '</div>';

        }
    }

    if( !function_exists('medixi_blog_post_content_cb') ) {
        function medixi_blog_post_content_cb( ) {
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
            if( class_exists( 'ReduxFramework' ) ) {
                $medixi_excerpt_length          = medixi_opt( 'medixi_blog_postExcerpt' );
                $medixi_display_post_category   = medixi_opt( 'medixi_display_post_category' );
            } else {
                $medixi_excerpt_length          = '48';
                $medixi_display_post_category   = '1';
            }

            if( class_exists( 'ReduxFramework' ) ) {
                $medixi_blog_admin = medixi_opt( 'medixi_blog_post_author' );
                $medixi_blog_readmore_setting_val = medixi_opt('medixi_blog_readmore_setting');
                if( $medixi_blog_readmore_setting_val == 'custom' ) {
                    $medixi_blog_readmore_setting = medixi_opt('medixi_blog_custom_readmore');
                } else {
                    $medixi_blog_readmore_setting = __( 'Read More', 'medixi' );
                }
            } else {
                $medixi_blog_readmore_setting = __( 'Read More', 'medixi' );
                $medixi_blog_admin = true;
            }
            echo '<!-- blog-content -->';

                do_action( 'medixi_blog_post_thumb' );
                
                echo '<div class="blog-content">';
                    // Blog Post Meta
                    do_action( 'medixi_blog_post_meta' );
                    
                    echo '<!-- Post Title -->';
                    echo '<h2 class="blog-title h3"><a href="'.esc_url( get_permalink() ).'">'.wp_kses( get_the_title( ), $allowhtml ).'</a></h2>';
                    echo '<!-- End Post Title -->';
                    echo '<!-- Post Summary -->';
                        echo medixi_paragraph_tag( array(
                            "text"  => wp_kses( wp_trim_words( get_the_excerpt(), $medixi_excerpt_length, '' ), $allowhtml ),
                            "class" => 'blog-text',
                        ) );

                        if( !empty( $medixi_blog_readmore_setting ) ){
                            echo '<!-- Button -->';
                                echo '<a href="'.esc_url( get_permalink() ).'" class="link-btn">'.esc_html( $medixi_blog_readmore_setting ).'<i class="fal fa-long-arrow-right mr-2 ml-0"></i></a>';
                            echo '<!-- End Button -->';
                        }
                    echo '<!-- End Post Summary -->';
                echo '</div>';
            echo '<!-- End Post Content -->';
        }
    }