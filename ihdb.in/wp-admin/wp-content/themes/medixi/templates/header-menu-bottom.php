<?php
/**
 * @Packge     : Marino
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit();
    }

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( medixi_meta('page_breadcrumb_area') ) ) {
            $medixi_page_breadcrumb_area  = medixi_meta('page_breadcrumb_area');
        } else {
            $medixi_page_breadcrumb_area = '1';
        }
    }else{
        $medixi_page_breadcrumb_area = '1';
    }

    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sub'       => array(),
        'sup'       => array(),
    );

    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $medixi_page_breadcrumb_area == '1' ) {
            echo '<!-- Page title -->';
            echo '<div class="breadcumb-wrapper background-image">';
                echo '<div class="container z-index-common">';
                    echo '<div class="breadcumb-content">';
                        if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {
                            if( medixi_meta('page_breadcrumb_settings') == 'page' ) {
                                $medixi_page_title_switcher = medixi_meta('page_title');
                            } elseif( medixi_opt('medixi_page_title_switcher') == true ) {
                                $medixi_page_title_switcher = medixi_opt('medixi_page_title_switcher');
                            }else{
                                $medixi_page_title_switcher = '1';
                            }
                        } else {
                            $medixi_page_title_switcher = '1';
                        }

                        if( $medixi_page_title_switcher == '1' ){
                            if( class_exists( 'ReduxFramework' ) ){
                                $medixi_page_title_tag    = medixi_opt('medixi_page_title_tag');
                            }else{
                                $medixi_page_title_tag    = 'h1';
                            }

                            if( defined( 'CMB2_LOADED' )  ){
                                if( !empty( medixi_meta('page_title_settings') ) ) {
                                    $medixi_custom_title = medixi_meta('page_title_settings');
                                } else {
                                    $medixi_custom_title = 'default';
                                }
                            }else{
                                $medixi_custom_title = 'default';
                            }

                            if( $medixi_custom_title == 'default' ) {
                                echo medixi_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $medixi_page_title_tag ),
                                        "text"  => esc_html( get_the_title( ) ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                echo medixi_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $medixi_page_title_tag ),
                                        "text"  => esc_html( medixi_meta('custom_page_title') ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }

                        }
                        
                        
                        echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<!-- End of Page title -->';
            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {

                if( medixi_meta('page_breadcrumb_settings') == 'page' ) {
                    $medixi_breadcrumb_switcher = medixi_meta('page_breadcrumb_trigger');
                } else {
                    $medixi_breadcrumb_switcher = medixi_opt('medixi_enable_breadcrumb');
                }

            } else {
                $medixi_breadcrumb_switcher = '1';
            }
            if( $medixi_breadcrumb_switcher && (  is_page() || is_page_template( 'template-builder.php' ) )) {
                medixi_breadcrumbs(
                    array(
                        'breadcrumbs_classes' => 'nav',
                    )
                );
            }
        }
    } else {
        echo '<!-- Page title -->';
        echo '<div class="breadcumb-wrapper background-image">';
            echo '<div class="container z-index-common">';
                echo '<div class="breadcumb-content">';
                    if( class_exists( 'ReduxFramework' )  ){
                        $medixi_page_title_switcher  = medixi_opt('medixi_page_title_switcher');
                    }else{
                        $medixi_page_title_switcher = '1';
                    }

                    if( $medixi_page_title_switcher ){
                        if( class_exists( 'ReduxFramework' ) ){
                            $medixi_page_title_tag    = medixi_opt('medixi_page_title_tag');
                        }else{
                            $medixi_page_title_tag    = 'h1';
                        }
                        if( class_exists('woocommerce') && is_shop() ) {
                            echo medixi_heading_tag(
                                array(
                                    "tag"   => esc_attr( $medixi_page_title_tag ),
                                    "text"  => wp_kses( woocommerce_page_title( false ), $allowhtml ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif ( isset($_GET['view']) && ( $_GET['view'] == 'student' || $_GET['view'] == 'instructor' ) ) {
                            echo medixi_heading_tag(
                                array(
                                    "tag"   => esc_attr( $medixi_page_title_tag ),
                                    "text"  => __( 'Profile', 'medixi' ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif ( is_archive() ){
                            echo medixi_heading_tag(
                                array(
                                    "tag"   => esc_attr( $medixi_page_title_tag ),
                                    "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif ( is_home() ){
                            $medixi_blog_page_title_setting = medixi_opt('medixi_blog_page_title_setting');
                            $medixi_blog_page_title_switcher = medixi_opt('medixi_blog_page_title_switcher');
                            $medixi_blog_page_custom_title = medixi_opt('medixi_blog_page_custom_title');
                            if( class_exists('ReduxFramework') ){
                                if( $medixi_blog_page_title_switcher ){
                                    echo medixi_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $medixi_page_title_tag ),
                                            "text"  => !empty( $medixi_blog_page_custom_title ) && $medixi_blog_page_title_setting == 'custom' ? esc_html( $medixi_blog_page_custom_title) : esc_html__( 'Blog', 'medixi' ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }else{
                                echo medixi_heading_tag(
                                    array(
                                        "tag"   => "h1",
                                        "text"  => esc_html__( 'Blog', 'medixi' ),
                                        'class' => 'breadcumb-title',
                                    )
                                );
                            }
                        }elseif( is_search() ){
                            echo medixi_heading_tag(
                                array(
                                    "tag"   => esc_attr( $medixi_page_title_tag ),
                                    "text"  => esc_html__( 'Search Result', 'medixi' ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif( is_404() ){
                            echo medixi_heading_tag(
                                array(
                                    "tag"   => esc_attr( $medixi_page_title_tag ),
                                    "text"  => esc_html__( '404 PAGE', 'medixi' ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif( is_singular( 'courses' ) ){
                            echo medixi_heading_tag(
                                array(
                                    "tag"   => "h1",
                                    "text"  => esc_html__( 'Course Details', 'medixi' ),
                                    'class' => 'breadcumb-title',
                                )
                            );
                        }elseif( is_singular( 'product' ) ){
                            $posttitle_position  = medixi_opt('medixi_product_details_title_position');
                            $postTitlePos = false;
                            if( class_exists( 'ReduxFramework' ) ){
                                if( $posttitle_position && $posttitle_position != 'header' ){
                                    $postTitlePos = true;
                                }
                            }else{
                                $postTitlePos = false;
                            }

                            if( $postTitlePos != true ){
                                echo medixi_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $medixi_page_title_tag ),
                                        "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                if( class_exists( 'ReduxFramework' ) ){
                                    $medixi_post_details_custom_title  = medixi_opt('medixi_product_details_custom_title');
                                }else{
                                    $medixi_post_details_custom_title = __( 'Shop Details','medixi' );
                                }

                                if( !empty( $medixi_post_details_custom_title ) ) {
                                    echo medixi_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $medixi_page_title_tag ),
                                            "text"  => wp_kses( $medixi_post_details_custom_title, $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }
                        }else{
                            $posttitle_position  = medixi_opt('medixi_post_details_title_position');
                            $postTitlePos = false;
                            if( is_singular( 'post' ) ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }
                            }
                            if( is_singular( 'product' ) ){
                                $posttitle_position  = medixi_opt('medixi_product_details_title_position');
                                $postTitlePos = false;
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }
                            }

                            if( $postTitlePos != true ){
                                echo medixi_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $medixi_page_title_tag ),
                                        "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                if( class_exists( 'ReduxFramework' ) ){
                                    $medixi_post_details_custom_title  = medixi_opt('medixi_post_details_custom_title');
                                }else{
                                    $medixi_post_details_custom_title = __( 'Blog Details','medixi' );
                                }

                                if( !empty( $medixi_post_details_custom_title ) ) {
                                    echo medixi_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $medixi_page_title_tag ),
                                            "text"  => wp_kses( $medixi_post_details_custom_title, $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }
                        }
                    }
                    
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<!-- End of Page title -->';
        if( class_exists('ReduxFramework') ) {
            $medixi_breadcrumb_switcher = medixi_opt( 'medixi_enable_breadcrumb' );
        } else {
            $medixi_breadcrumb_switcher = '1';
        }
        if( $medixi_breadcrumb_switcher == '1' ) {
            medixi_breadcrumbs(
                array(
                    'breadcrumbs_classes' => 'nav',
                )
            );
        }
    }