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
    exit;
}

 // theme option callback
function medixi_opt( $id = null, $url = null ){
    global $medixi_opt;

    if( $id && $url ){

        if( isset( $medixi_opt[$id][$url] ) && $medixi_opt[$id][$url] ){
            return $medixi_opt[$id][$url];
        }
    }else{
        if( isset( $medixi_opt[$id] )  && $medixi_opt[$id] ){
            return $medixi_opt[$id];
        }
    }
}


// theme logo
function medixi_theme_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="'.esc_url( $siteUrl ).'">';
        $siteLogo .= medixi_img_tag( array(
            "class" => "img-fluid",
            "url"   => esc_url( wp_get_attachment_image_url( $custom_logo_id, 'full') )
        ) );
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif( !medixi_opt('medixi_text_title') && medixi_opt('medixi_site_logo', 'url' )  ){

        $siteLogo = '<img class="img-fluid" src="'.esc_url( medixi_opt('medixi_site_logo', 'url' ) ).'" alt="'.esc_attr__( 'logo', 'medixi' ).'" />';
        return '<a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses_post( $siteLogo ).'</a>';


    }elseif( medixi_opt('medixi_text_title') ){
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( medixi_opt('medixi_text_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}

// custom meta id callback
function medixi_meta( $id = '' ){
    $value = get_post_meta( get_the_ID(), '_medixi_'.$id, true );
    return $value;
}


// Blog Date Permalink
function medixi_blog_date_permalink() {
    $year  = get_the_time('Y');
    $month_link = get_the_time('m');
    $day   = get_the_time('d');
    $link = get_day_link( $year, $month_link, $day);
    return $link;
}

//audio format iframe match
function medixi_iframe_match() {
    $audio_content = medixi_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}


//Post embedded media
function medixi_embedded_media( $type = array() ){
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );


    if( in_array( 'audio' , $type) ){
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }

    }else{
        if( count( $embed ) > 0 ){
            $output = $embed[0];
        }else{
           $output = '';
        }
    }
    return $output;
}


// WP post link pages
function medixi_link_pages(){
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'medixi' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'medixi' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


// Data Background image attr
function medixi_data_bg_attr( $imgUrl = '' ){
    return 'data-bg-img="'.esc_url( $imgUrl ).'"';
}

// image alt tag
function medixi_image_alt( $url = '' ){
    if( $url != '' ){
        // attachment id by url
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag
        $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
        if( $image_alt ){
            return $image_alt ;
        }else{
            $filename = pathinfo( esc_url( $url ) );
            $alt = str_replace( '-', ' ', $filename['filename'] );
            return $alt;
        }
    }else{
       return;
    }
}


// Flat Content wysiwyg output with meta key and post id

function medixi_get_textareahtml_output( $content ) {
    global $wp_embed;

    $content = $wp_embed->autoembed( $content );
    $content = $wp_embed->run_shortcode( $content );
    $content = wpautop( $content );
    $content = do_shortcode( $content );

    return $content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function medixi_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'medixi_pingback_header' );


// Excerpt More
function medixi_excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'medixi_excerpt_more' );


// medixi comment template callback
function medixi_comment_callback( $comment, $args, $depth ) {
        $add_below = 'comment';
    ?>
    <li <?php comment_class( array('vs-comment') ); ?>>
        <div id="comment-<?php comment_ID() ?>" class="vs-post-comment">
            <?php
                if( get_avatar( $comment, 100 )  ) :
            ?>
            <!-- Author Image -->
            <div class="author-img">
                <?php
                    if ( $args['avatar_size'] != 0 ) {
                        echo get_avatar( $comment, 100 );
                    }
                ?>
            </div>
            <!-- Author Image -->
            <?php
                endif;
            ?>
            <!-- Comment Content -->
            <div class="comment-content">
                <div class="comment-top">
                    <div class="comment-author">
                        <h4 class="name h5"><?php echo esc_html( ucwords( get_comment_author() ) ); ?></h4>
                        <span class="commented-on mb-10"> <?php printf( esc_html__('%1$s', 'medixi'), get_comment_date() ); ?> </span>
                    </div>
                    
                </div>
                <?php comment_text(); ?>
                <div class="reply_and_edit">
                    <?php
                        $reply_text = '<i class="fas fa-reply"></i>'.esc_html__( 'Reply', 'medixi' ).'';
                        $edit_reply_text = '<i class="far fa-pencil-alt"></i>'.esc_html__( 'Edit', 'medixi' ).'';
                        comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 3, 'max_depth' => 5, 'reply_text' => $reply_text ) ) );
                    ?>

                    <span class="comment-edit-link pl-10"><?php edit_comment_link( $edit_reply_text, '  ', '' ); ?></span>
                </div>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'medixi' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Comment Content -->
<?php
}

//body class
add_filter( 'body_class', 'medixi_body_class' );
function medixi_body_class( $classes ) {
    if( class_exists('ReduxFramework') ) {
        $medixi_blog_single_sidebar = medixi_opt('medixi_blog_single_sidebar');
        if( ($medixi_blog_single_sidebar != '2' && $medixi_blog_single_sidebar != '3' ) || ! is_active_sidebar('medixi-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
    } else {
        if( !is_active_sidebar('medixi-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
    }
    return $classes;
}


function medixi_footer_global_option(){

    // Medixi Widget Enable Disable
    if( class_exists( 'ReduxFramework' ) && ( is_active_sidebar( 'medixi-footer-1' ) || is_active_sidebar( 'medixi-footer-2' ) || is_active_sidebar( 'medixi-footer-3' ) || is_active_sidebar( 'medixi-footer-4' ) ) ){
        $medixi_footer_widget_enable = medixi_opt( 'medixi_footerwidget_enable' );
    }else{
        $medixi_footer_widget_enable = '';
    }

    // Medixi Footer Top Enable Disable
    if( class_exists( 'ReduxFramework' ) ){
        $medixi_footer_top_active = medixi_opt( 'medixi_disable_footer_top' );
    }else{
        $medixi_footer_top_active = '1';
    }

    // Medixi Footer Bottom Enable Disable
    if( class_exists( 'ReduxFramework' ) ){
        $medixi_footer_bottom_active = medixi_opt( 'medixi_disable_footer_bottom' );
    }else{
        $medixi_footer_bottom_active = '1';
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
            'title'     => array(),
            'class'     => array(),
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
    );
    if( $medixi_footer_widget_enable == '1' || $medixi_footer_top_active == '1'  || $medixi_footer_bottom_active == '1' ){

        echo '<div class="footer-wrapper footer-layout1">';
            if( $medixi_footer_top_active == '1' ){
                echo '<div class="container">';
                    echo '<div class="footer-top">';
                        echo '<div class="row align-items-center justify-content-between">';
                            echo '<div class="col-sm-6 col-md-auto text-center text-sm-start">';
                                echo '<div class="footer1-logo bg-white">';
                                echo '<a href="'.esc_url( home_url( ) ).'">';
                                    echo medixi_img_tag( array(
                                        "url"   => esc_url( medixi_opt( 'medixi_footer_top_logo','url' ) ),
                                        
                                    ) );
                                echo '</a>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class=" col-sm-6 col-md-auto pt-20 pt-sm-0 pb-20 pb-sm-0 text-center text-sm-end">';
                                echo '<div class="footer-social">';

                                    $medixi_social_icon = medixi_opt( 'medixi_social_links' );
                                    if( ! empty( $medixi_social_icon ) && isset( $medixi_social_icon ) ){
                                        foreach( $medixi_social_icon as $social_icon ){
                                            if( ! empty( $social_icon['title'] ) ){
                                                echo '<a href="'.esc_url( $social_icon['url'] ).'"><i class="'.esc_attr( $social_icon['title'] ).'"></i></a>';
                                            }
                                        }
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            if( ( is_active_sidebar( 'medixi-footer-1' ) || is_active_sidebar( 'medixi-footer-2' ) || is_active_sidebar( 'medixi-footer-3' ) || is_active_sidebar( 'medixi-footer-4' ) ) ) :

                echo '<div class="widget-area">';
                    echo '<div class="container">';
                        echo '<div class="row justify-content-between">';

                            if( is_active_sidebar( 'medixi-footer-1' ) ) :
                                echo '<div class="col-md-6 col-lg-3 col-xl-3">';
                                    dynamic_sidebar( 'medixi-footer-1' );
                                echo '</div>';
                            endif;

                            if( is_active_sidebar( 'medixi-footer-2' ) ) :
                                echo '<div class="col-md-6 col-lg-auto col-xl-auto">';
                                    dynamic_sidebar( 'medixi-footer-2' );
                                echo '</div>';
                            endif;

                            if( is_active_sidebar( 'medixi-footer-3' ) ) :
                                echo '<div class="col-md-6 col-lg-3">';
                                    dynamic_sidebar( 'medixi-footer-3' );
                                echo '</div>';
                            endif;

                            if( is_active_sidebar( 'medixi-footer-4' ) ) :
                                echo '<div class="col-md-6 col-lg-3 col-xl-3">';
                                    dynamic_sidebar( 'medixi-footer-4' );
                                echo '</div>';
                            endif;

                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            endif;
            if( $medixi_footer_bottom_active == '1' ){
                echo '<div class="copyright">';
                    echo '<div class="container">';
                        echo '<div class="row align-items-center justify-content-between">';
                            echo '<div class="col-auto text-center text-md-end">';
                                if( ! empty( medixi_opt( 'medixi_copyright_text' ) ) ){
                                    echo '<p class="mb-0 text-white">'.wp_kses( medixi_opt( 'medixi_copyright_text' ), $allowhtml ).'</p>';
                                }
                            echo '</div>';
                            echo '<div class="col-auto d-none d-md-block">';
                                if( has_nav_menu( 'footer-menu' ) ){
                                    echo '<div class="footer-bottom-menu-show">';
                                        wp_nav_menu( array(
                                            "theme_location"    => 'footer-menu',
                                            "container"         => '',
                                            "menu_class"        => 'footer-bottom-menu'
                                        ) );
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        echo '</div>';
    }
}

function medixi_social_icon(){
    $medixi_social_icon = medixi_opt( 'medixi_social_links' );
    if( ! empty( $medixi_social_icon ) && isset( $medixi_social_icon ) ){
        foreach( $medixi_social_icon as $social_icon ){
            if( ! empty( $social_icon['title'] ) ){
                echo '<a href="'.esc_url( $social_icon['url'] ).'"><i class="'.esc_attr( $social_icon['title'] ).'"></i></a>';
            }
        }
    }
}

// global header
function medixi_global_header_option() {
    medixi_global_header();

    echo '<div class="header-wrapper header-layout2">';

    medixi_header_topbar();
    
    if( class_exists( 'ReduxFramework' ) ){
        $medixi_wishlist_show         = medixi_opt( 'medixi_header_wishlist_icon_switcher' );
        $medixi_cart_show             = medixi_opt( 'medixi_header_cart_icon_switcher' );
    }else{
        $medixi_wishlist_show         = '';
        $medixi_cart_show             = '';
    }
    if( class_exists( 'ReduxFramework' ) ){
        echo '<div class="sticky-wrap">';
            echo '<div class="sticky-active">';
                echo '<!-- Header Main -->';
                echo '<div class="header-main py-3 py-lg-0">';
                    echo '<div class="container position-relative">';
                        echo '<div class="row align-items-center justify-content-between">';
                            echo '<div class="col-auto d-flex">';
                                echo '<div class="header2-logo">';
                                    echo medixi_theme_logo();
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="col-auto">';

                                if( has_nav_menu( 'primary-menu' ) ) {
                                    echo '<nav class="main-menu menu-style2 d-none d-lg-block">';
                                        wp_nav_menu( array(
                                            "theme_location"    => 'primary-menu',
                                            "container"         => '',
                                            "menu_class"        => ''
                                        ) );
                                    echo '</nav>';
                                }

                                echo '<button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>';

                            echo '</div>';
                            echo '<div class="col-auto d-none d-xl-block">';
                                echo '<div class="header2-btn">';

                                    if( class_exists( 'TInvWL_Admin_TInvWL' ) && $medixi_wishlist_show ){
                                        echo do_shortcode('[ti_wishlist_products_counter]');
                                    }

                                    if( class_exists( 'woocommerce' ) && $medixi_cart_show ){
                                        $count = WC()->cart->cart_contents_count;
                                        echo '<a href="#" class="icon-btn has-badge sideMenuToggler"><i class="fal fa-shopping-cart"></i><span class="badge">'.esc_html( $count ).'</span></a>';
                                    }

                                    if( ! empty( medixi_opt( 'medixi_btn_text' ) ) ){
                                        echo '<a href="'.esc_url(medixi_opt( 'medixi_btn_url' )).'" class="vs-btn style2">'.esc_html(medixi_opt( 'medixi_btn_text' )).'<i class="fal fa-calendar-alt"></i></a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }else{
        echo '<!-- Sticky Active -->';
        echo '<div class="sticky-wrap">';
            echo '<div class="sticky-active">';
                echo '<!-- Header Main -->';
                echo '<div class="header-main py-3 py-lg-0">';
                    echo '<div class="container position-relative">';
                        echo '<div class="row align-items-center justify-content-between">';
                            echo '<div class="col-auto d-flex">';
                                echo '<div class="header2-logo">';
                                    echo medixi_theme_logo();
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="col-auto">';
                                if( has_nav_menu( 'primary-menu' ) ) {
                                    echo '<nav class="main-menu menu-style2 d-none d-lg-block">';
                                        wp_nav_menu( array(
                                            "theme_location"    => 'primary-menu',
                                            "container"         => '',
                                            "menu_class"        => ''
                                        ) );
                                    echo '</nav>';
                                }
                            echo '</div>';
                            echo '<div class="col-auto d-none d-xl-block">';
                                echo '<div class="header2-btn">';
                                    echo '<button type="submit" class="icon-btn searchBoxTggler"><i class="far fa-search"></i></button>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    echo '</div>';
}

// medixi woocommerce breadcrumb
function medixi_woo_breadcrumb( $args ) {
    return array(
        'delimiter'   => '',
        'wrap_before' => '<div class="breadcumb-menu-wrap container" data-sec-pos="top-half" data-pos-for="#breadcumbwrap"><ul class="breadcumb-menu">',
        'wrap_after'  => '</ul></div>',
        'before'      => '<li>',
        'after'       => '</li>',
        'home'        => _x( 'Home', 'breadcrumb', 'medixi' ),
    );
}

add_filter( 'woocommerce_breadcrumb_defaults', 'medixi_woo_breadcrumb' );

function medixi_custom_search_form( $class ) {
    echo '<!-- Search Form -->';
    echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'" class="'.esc_attr( $class ).'">';
        echo '<label class="searchIcon">';
            echo medixi_img_tag( array(
                "url"   => esc_url( get_theme_file_uri( '/assets/img/search-2.svg' ) ),
                "class" => "svg"
            ) );
            echo '<input value="'.esc_html( get_search_query() ).'" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'medixi').'">';
        echo '</label>';
    echo '</form>';
    echo '<!-- End Search Form -->';
}



//Fire the wp_body_open action.
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

//Remove Tag-Clouds inline style
add_filter( 'wp_generate_tag_cloud', 'medixi_remove_tagcloud_inline_style',10,1 );
function medixi_remove_tagcloud_inline_style( $input ){
   return preg_replace('/ style=("|\')(.*?)("|\')/','',$input );
}

function medixi_setPostViews( $postID ) {
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    }else{
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function medixi_getPostViews( $postID ){
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return __( '0', 'medixi' );
    }
    return $count;
}


/* This code filters the Categories archive widget to include the post count inside the link */
add_filter( 'wp_list_categories', 'medixi_cat_count_span' );
function medixi_cat_count_span( $links ) {
    $links = str_replace('</a> (', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter( 'get_archives_link', 'medixi_archive_count_span' );
function medixi_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="category-number">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

// Medixi Default Header
if( ! function_exists( 'medixi_global_header' ) ){
    function medixi_global_header(){

        // Mobile Menu

        echo '<div class="vs-menu-wrapper">';
            echo '<div class="vs-menu-area text-center">';
                echo '<button class="vs-menu-toggle"><i class="fal fa-times"></i></button>';
                echo '<div class="mobile-logo">';
                    echo medixi_theme_logo();
                echo '</div>';
                echo '<form class="mobile-menu-form" action="'.esc_url( home_url( '/' ) ).'">';
                    echo '<input name="s" value="'.get_search_query().'" type="text" class="mobile-menu-form" placeholder="'.esc_attr__( 'Search....', 'medixi' ).'">';
                    echo '<button type="submit"><i class="fas fa-search"></i></button>';
                echo '</form>';

                if( has_nav_menu( 'primary-menu' ) ){
                    echo '<div class="vs-mobile-menu">';
                        wp_nav_menu( array(
                            "theme_location"    => 'primary-menu',
                            "container"         => '',
                            "menu_class"        => ''
                        ) );
                    echo '</div>';
                }

            echo '</div>';
        echo '</div>';

        // Search Popup
        echo '<div class="popup-search-box d-none d-lg-block">';
            echo '<button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>';
            echo '<form action="'.esc_url( home_url( '/' ) ).'">';
                echo '<input name="s" value="'.get_search_query().'" type="text" class="border-theme" placeholder="'.esc_attr__( 'What are you looking for', 'medixi' ).'">';
                echo '<button type="submit"><i class="fal fa-search"></i></button>';
            echo '</form>';
        echo '</div>';

        // Offcanvas Menu

        if( class_exists( 'woocommerce' ) ){
            global $woocommerce;
            if( ! empty( $woocommerce->cart->cart_contents_count ) ){
                echo '<div class="sidemenu-wrapper d-none d-lg-block  ">';
                    echo '<div class="sidemenu-content">';
                        echo '<button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>';
                        echo '<div class="widget widget_shopping_cart woocommerce-mini-cart-content">';
                            echo '<h3 class="widget_title">'.esc_html__( 'Shopping Cart', 'medixi' ).'</h3>';
                            echo '<div class="woocommerce-mini-cart-content widget_shopping_cart_content ">';
                                woocommerce_mini_cart();
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        }
    }
}

if( ! function_exists( 'medixi_header_topbar' ) ){
    function medixi_header_topbar(){
        if( class_exists( 'ReduxFramework' ) ){
            $medixi_show_header_topbar = medixi_opt( 'medixi_header_topbar_switcher' );
            $medixi_language_show      = medixi_opt( 'medixi_language_switcher' );
            $medixi_search_show        = medixi_opt( 'medixi_search_switcher' );
            $medixi_show_social_icon   = medixi_opt( 'medixi_header_topbar_social_icon_switcher' );
        }else{
            $medixi_show_header_topbar = '';
            $medixi_language_show      = '';
            $medixi_search_show        = '';
            $medixi_show_social_icon   = '';
        }

        if( $medixi_show_header_topbar ){
            $allowhtml = array(
                'a'    => array(
                    'href' => array(),
                    'class' => array()
                ),
                'u'    => array(
                    'class' => array()
                ),
                'span' => array(
                    'class' => array()
                ),
                'i'    => array(
                    'class' => array()
                )
            );

            echo '<div class="header-top bg-title py-2 d-none d-md-block">';
                echo '<div class="container py-1">';
                    echo '<div class="row justify-content-center justify-content-xl-between">';
                        echo '<div class="col-auto">';
                            echo '<ul class="header-top-info list-unstyled m-0">';
                                if( ! empty( medixi_opt( 'medixi_topbar_address' ) ) ){
                                    echo '<li><i class="far fa-map-marker-alt"></i>'.esc_html( medixi_opt( 'medixi_topbar_address' ) ).'</li>';
                                }
                                if( ! empty( medixi_opt( 'medixi_topbar_offcie_hour' ) ) ){
                                    echo '<li><i class="far fa-clock"></i>'.esc_html( medixi_opt( 'medixi_topbar_offcie_hour' ) ).'</li>';
                                }
                            echo '</ul>';
                        echo '</div>';
                        echo '<div class="col-auto d-none d-xl-block">';
                            echo '<ul class="head-top-links text-end">';

                                if( class_exists( 'GTranslate' ) && $medixi_language_show ){
                                    echo '<li>';
                                        echo '<!-- Dropdown -->';
                                        echo '<a class="dropdown-toggle" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fal fa-globe"></i>
                                        </a>';
                                        echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">';
                                            echo do_shortcode('[gtranslate]');
                                        echo '</ul>';
                                    echo '</li>';
                                }

                                if( $medixi_show_social_icon ){
                                    echo '<li>';
                                        echo '<ul class="header-social">';
                                            medixi_social_icon();
                                        echo '</ul>';
                                    echo '</li>';
                                }

                                if( $medixi_search_show ){
                                    echo '<li>';
                                        echo '<button type="submit" class="header-search-btn searchBoxTggler">'.esc_html__('Search', 'medixi').'<i class="far fa-search"></i></button>';
                                    echo '</li>';
                                }
                            echo '</ul>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }
}

// Add Extra Class On Comment Reply Button
function medixi_custom_comment_reply_link( $content ) {
    $extra_classes = 'replay-btn';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'medixi_custom_comment_reply_link', 99);

// Add Extra Class On Edit Comment Link
function medixi_custom_edit_comment_link( $content ) {
    $extra_classes = 'replay-btn';
    return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $extra_classes, $content);
}

add_filter('edit_comment_link', 'medixi_custom_edit_comment_link', 99);


function medixi_post_classes( $classes, $class, $post_id ) {
    if ( get_post_type() === 'post' ) {
        if( ! is_single() ){
            $classes[] = "vs-blog blog-single";
        }else{
            $classes[] = "vs-blog blog-single";
        }
    }elseif( get_post_type() === 'product' ){
        // Return Class
    }elseif( get_post_type() === 'page' ){
        $classes[] = "page--item";
    }
    
    return $classes;
}
add_filter( 'post_class', 'medixi_post_classes', 10, 3 );