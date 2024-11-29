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
        exit();
    }

    if( class_exists( 'ReduxFramework' ) ) {
        $medixi404title     = medixi_opt( 'medixi_fof_title' );
        $medixi404subtitle  = medixi_opt( 'medixi_fof_subtitle' );
        $medixi404btntext   = medixi_opt( 'medixi_fof_btn_text' );
        $medixi_404_image   = medixi_opt( 'medixi_404_image','url' );
    } else {
        $medixi404title     = __( 'Oops! That page can\'t be found', 'medixi' );
        $medixi404subtitle  = __( 'Unfortunately, something went wrong and this page does not exist. Try using the search or return to the previous page.', 'medixi' );
        $medixi404btntext   = __( 'Go Back Home', 'medixi');
        $medixi_404_image   = get_template_directory_uri().'/assets/img/error.png';
    }

    // get header
    get_header();
    echo '<section class="vs-error-wrapper space">';
        echo '<div class="container">';
            echo '<div class="error-content text-center">';
                echo '<h2 class="h1 mt-n3">'.esc_html( $medixi404title ).'</h2>';
                echo '<div class="row justify-content-center">';
                    
                    echo '<div class="col-md-8 col-lg-7 col-xl-5">';
                        echo '<p class="px-xl-2 mb-4 pb-xl-2">'.esc_html( $medixi404subtitle ).'</p>';
                        echo '<a href="'.esc_url( home_url('/') ).'" class="vs-btn style2">'.esc_html( $medixi404btntext ).'</a>';
                    echo '</div>';

                    if( ! empty( $medixi_404_image ) ){
                        echo '<div class="col-xl-10 mt-3 mt-lg-0">';
                            echo medixi_img_tag( array(
                                    'url'       => esc_url( $medixi_404_image ),
                                ) );
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</section>';
    //footer
    get_footer();